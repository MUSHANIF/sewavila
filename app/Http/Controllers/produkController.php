<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\villa;
class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  villa::with([
            'jns'
        ])->where('name','like',"%".$cari."%")->get();
        return view('petugas.produk.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas =  DB::table('jnsvillas')->get();
        return view('petugas.produk.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $model = new villa;
      
        $model->jnsID = $request->jnsID;
        $model->name = $request->name;
        $model->harga = $request->harga;
        $model->stok = $request->stok;
        $model->image = $request->image;
        $model->deskripsi = $request->deskripsi;
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/villa';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $model['image'] = "$profileImage";
        }


        $validasi = Validator::make($data, [
            'name' => 'required|max:255|unique:villas',
           
            'harga' => 'required|max:15',
            'stok' => 'required',
           
            'deskripsi' => 'required|max:255',

        ]);
        if ($validasi->fails()) {
            return redirect()->route('produk.create')->withInput()->withErrors($validasi);
        }
       
        $model->save();

        toastr()->success('Berhasil di buat!', 'Sukses');
        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas1 =  DB::table('jnsvillas')->get();
        $datas = villa::find($id);
        return view('petugas.produk.ubah',compact('datas','datas1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $model = villa::findOrFail($id);
      
        $model->jnsID = $request->jnsID;
        $model->name = $request->name;
      
        $model->harga = $request->harga;
        $model->stok = $request->stok;

        $model->deskripsi = $request->deskripsi;
       


        $validasi = Validator::make($data, [
            'name' => 'required|max:255',
           
            'harga' => 'required|max:15',
            'stok' => 'required',
          
            'deskripsi' => 'required|max:255',

        ]);
        if ($validasi->fails()) {
            return redirect()->route('produk.edit', $id)->withInput()->withErrors($validasi);
        }
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/villa';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $model['image'] = "$profileImage";
        }
        $model->save();

        toastr()->success('Berhasil di ubah!', 'Sukses');
        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kantin = villa::find($id);
        $kantin->delete();
        toastr()->info('Berhasil di hapus!', 'Sukses');
        return redirect('produk');
    }
}
