<?php

namespace App\Http\Controllers;
use App\Models\jnsvilla;
use App\Models\villa;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;
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
       $total = cart::where('userid', $id)->sum('jumlah');
       $stok = cart::where('userid', $id)->sum('stok');
       return view('keranjang',compact('datas','total','stok'));
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
}
