<?php

namespace App\Http\Controllers;
use App\Models\jnsvilla;
use App\Models\villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
