<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class usersuperadminController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  User::where('name','like',"%".$cari."%" )->where('level', 1)->get();
        return view('superadmin.user.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('superadmin.user.create');
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
        $model = new User;
        $password = $request->password;
        $encrypted_password = bcrypt($password);
        $model->name = $request->name;
        $model->email = $request->email;
        $model->level = $request->level;
        $model->password = $encrypted_password;
        
        $validasi = Validator::make($data,[
            'name'=>'required|max:20',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:8',
           

        ]);
        if($validasi->fails())
        {
            return redirect()->route('akunuser.create')->withInput()->withErrors($validasi);
        }
        $model->save();
        toastr()->success('Berhasil di buat!', 'Sukses');
        return redirect('akunuser');
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
         $datas = User::find($id);
        return view('superadmin.user.ubah',compact('datas'));
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
        $model = User::findOrFail($id);
      
     
        $model->name = $request->name;
        $model->email = $request->email;
     
        $validasi = Validator::make($data, [
            'name' => 'required|max:255',
           
             'email'=>'required|email|max:255',
           

        ]);
        if ($validasi->fails()) {
            return redirect()->route('akunuser.edit', $id)->withInput()->withErrors($validasi);
        }
      
        $model->save();

        toastr()->success('Berhasil di ubah!', 'Sukses');
        return redirect('/akunuser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $kantin = User::find($id);
        $kantin->delete();
        toastr()->info('Berhasil di hapus!', 'Sukses');
        return redirect('akunuser');
    }
}
