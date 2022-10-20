<?php

namespace App\Http\Controllers;
use App\Models\jnsvilla;
use App\Models\villa;
use App\Models\cart;
use App\Models\diskon;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;
use Validator;
use Alert;
class detailController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
     public function selengkap(Request $request)
    {
        $cari = $request->cari;
        $datas =  jnsvilla::with([
            'villa'])
        ->join('villas', 'villas.jnsID', '=', 'jnsvillas.id')
        ->where('jnsvillas.jenis','like',"%".$cari."%")
        ->Orwhere('villas.name','like',"%".$cari."%")    
        ->get();
        return view('selengkap', compact('datas'));
    }
    public function detail(Request $request, $id){
        $datas = villa::with([
            'jns'])->where('id', '=',  $id)->get();
        return view('detail',compact('datas'));
    }
    public function keranjang(Request $request,$id){
       $datas = cart::with([
        'vila'])->where('userid','=', $id)->where('status',0)->where('tanggal','=', date("Y-m-d"))->get();
        $data = cart::where('userid','=', $id)->first();
       $total = cart::where('userid', $id)->where('status',0)->where('tanggal','=', date("Y-m-d"))->sum('jumlah');
       $stok = cart::where('userid', $id)->where('status',0)->where('tanggal','=', date("Y-m-d"))->sum('stok');
    //    $status = $data->status === 0;
    // example:
    alert()->success('Info','List keranjang anda akan terhapus dalam 24 jam!')->showConfirmButton('Confirm', '#3085d6');

       return view('keranjang',compact('datas','total','stok'));
    }
    public function tambah(Request $request , $id)
    {
    $coba = villa::where('id', $id)->first();
    $coba->stok =  $coba->stok - $request->jumlah;
    $coba->save();
    $data = $request->all();
   
    $model = new cart;
    $model->villaid = $request->villa;
    $model->userid = $request->id;
    $model->name = $request->name;
    $model->jenis = $request->jenis;
    $model->stok = $request->jumlah;

    $model->jumlah =  $coba->harga*$request->jumlah;
    $model->tanggal = date("Y-m-d");
    $model->save();
    toastr()->success('Berhasil di tambah ke keranjang anda!', 'Sukses');
    return redirect()->route('keranjang', Auth::user()->id);
    }
    public function deletecart(Request $request,$id){
        $datas =  DB::table('carts')
        ->where('id', $id)
        ->first();
        $hapus = $request->hapus ;
        $prod = villa::where('id', '=', $hapus  )->first();
        villa::where('id', '=', $hapus  )->update([
            'stok' => $prod->stok + $datas->stok,
          
        ]);
        DB::table('carts')
        ->where('id', $id)
      
        ->delete();
     
        return redirect()->route('keranjang', Auth::user()->id);
    }   
    public function pembayaran(Request $request,$id){
        $datas =  DB::table('carts')
        ->where('userid', $id)->where('status',0)
        ->where('tanggal','=', date("Y-m-d"))
        ->get();
        $diskon =  diskon::where('kode', $request->redem)->first();
  
        if($request->redem === $diskon->kode ){
            $cart = cart::where('userid',$id)->where('tanggal','=', date("Y-m-d"))->update(['diskon' => $diskon->diskon]);
            $total = $datas->sum('stok');
            $jumlah = $datas->sum('jumlah') - $diskon->diskon;
            $diskons = $datas->sum('diskon');
            $totals = $datas->count();       
            toastr()->success('diskon Berhasil di pakai!', 'Sukses');
            return view('pembayaran',compact('datas','total','jumlah','diskons','totals','diskon'));                       
        }else{
            $total = $datas->sum('stok');
            $jumlah = $datas->sum('jumlah');
            $diskons = $datas->sum('diskon');
            $totals = $datas->count();
            toastr()->error('diskon kadaluarsa', 'Gagal');
            return view('pembayaran',compact('datas','total','jumlah','diskons','totals'));
        }
    }
     public function redem(Request $request,$id){
        $diskon =  diskon::where('kode', $request->redem)->first();
        $datas =  DB::table('carts')
        ->where('userid', $id)->where('status',0)
        ->where('tanggal','=', date("Y-m-d"))
        ->get();
        $total = $datas->sum('stok');
        $jumlah = $datas->sum('jumlah');
        $diskons = $datas->sum('diskon');
        $totals = $datas->count();
        return view('pembayaran',compact('datas','total','jumlah','diskons','totals','diskon'));
     }
    public function bayar(Request $request,$id){
        $data =  DB::table('carts')
        ->where('userid', $id)
        ->where('tanggal','=', date("Y-m-d"))
        ->get();
        $jumlah = $data->sum('jumlah');
        $diskon1 = $data->sum('diskon');
        $datas = cart::with([
            'vila'])->where('userid','=', $id)->where('status','=', '0')->get();
       
       
        
        if(  $request->total >= $jumlah  ){
        
                $model = new transaksi;
                $tots = $data->sum('jumlah') - $diskon1;
                $model->villaid = $request->villaid;
                $model->userid = $request->userid;
                $model->metode_pembayaran = $request->metode_pembayaran;
                $model->bayar = $request->total;
                $model->total = $tots;
                $model->kembalian = $model->bayar  -   $model->total;
                $model->hari = date("Y-m-d");
                $model->save();
                $datas1 = transaksi::where('userid','=', $id)->where('hari','=', date("Y-m-d"))->first();
                $metode = $datas1->metode_pembayaran;
                $kembali = $datas1->kembalian;
                $duit = $datas1->bayar;
                $bayar = $datas1->total;
                $hari = $datas1->hari;
                $total = $data->sum('stok');
                $diskonss = $data->sum('diskon');
                $cart = cart::where('userid',$id)->where('tanggal','=', date("Y-m-d"))->update(['status' => 1]);
                $pdf = PDF::loadview('bukti', compact('datas','metode','kembali','bayar','total','jumlah','hari','diskonss','tots','duit'));
                return $pdf->download('bukti '.date("Y-m-d").'.pdf');//bug
                if( $request->download){
                    return redirect()->route('keranjang' , $id)->with('success','berhasil');
                }
            
                
                 
                
         }else{
            $datas =  DB::table('carts')
            ->where('userid', $id)->where('status',0)
            ->where('tanggal','=', date("Y-m-d"))
            ->get();
            $diskon =  diskon::where('kode', $request->redem)->first();
            $total = $datas->sum('stok');
            $jumlah = $datas->sum('jumlah');
            $diskons = $datas->sum('diskon');
            $totals = $datas->count();
            toastr()->error('uang anda kurang!', 'Gagal');
            return view('pembayaran',compact('datas','total','jumlah','diskons','totals','diskon'));
         }
        
        
            
         

        





        // $validasi = Validator::make($data,[
        //     'metode_pembayaran'=>'required',
        //     'total'=>'required|max:255',
        // ]);
        // if($validasi->fails())
        // {
        //     return redirect()->route('pembayaran' . $id)->withInput()->withErrors($validasi);
        // }
    }
}
