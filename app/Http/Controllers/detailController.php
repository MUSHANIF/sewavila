<?php

namespace App\Http\Controllers;
use App\Models\jnsvilla;
use App\Models\villa;
use App\Models\cart;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;
use Validator;

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
        'vila'])->where('userid','=', $id)->get();
        $data = cart::where('userid','=', $id)->first();
       $total = cart::where('userid', $id)->sum('jumlah');
       $stok = cart::where('userid', $id)->sum('stok');
       $status = $data->status === 0;
       return view('keranjang',compact('datas','total','stok','status'));
    }
    public function tambah(Request $request , $id)
    {
    //     $data = $request->all();
       
    //     $datas = Session::put('nama', [
    //     0 => [
    //         'jumlah'       => $request->jumlah,
    //         'tanggal'     => $request->tanggal,
           
    //     ]
    // ]);
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
    public function pembayaran($id){
        $datas =  DB::table('carts')
        ->where('userid', $id)
        ->get();
        $total = $datas->sum('stok');
        $jumlah = $datas->sum('jumlah');
        return view('pembayaran',compact('datas','total','jumlah'));
    }
    public function bayar(Request $request,$id){
        $data =  DB::table('carts')
        ->where('userid', $id)
        ->get();
        $jumlah = $data->sum('jumlah');
        $datas = cart::with([
            'vila'])->where('userid','=', $id)->get();
        $datas1 = transaksi::where('userid','=', $id)->first();
       
        
        if(  $request->total >= $jumlah  ){
        
                $model = new transaksi;
                $model->villaid = $request->villaid;
                $model->userid = $request->userid;
                $model->metode_pembayaran = $request->metode_pembayaran;
                $model->total = $request->total;
                $model->kembalian = $jumlah - $request->total;
                $model->hari = date("Y-m-d");
                $model->save();
                $metode = $datas1->metode_pembayaran;
                $kembalian = $datas1->kembalian;
                $bayar = $datas1->total;
                $hari = $datas1->hari;
                $total = $data->sum('stok');
                $cart = cart::where('userid',$id)->update(['status' => 1]);
                $pdf = PDF::loadview('bukti', compact('datas','metode','kembalian','bayar','total','jumlah','hari'));
                return $pdf->download('bukti.pdf');
                return redirect()->route('keranjang' , $id)->with('success','berhasil');
                
         }
        
            return redirect()->route('pembayaran' , $id)->with('error','kurang dana ya? haha');
         

        





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
