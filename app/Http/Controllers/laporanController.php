<?php

namespace App\Http\Controllers;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use PDF;
use App\Exports\TransaksiExport;

class laporanController extends Controller
{
    public function index(){
        $datas =  transaksi::with([
            'trans','pembeli'
        ])->get();
        return view('petugas.laporan.index', compact('datas'));
    }
    public function excel(){
      
        return Excel::download(new TransaksiExport, 'transaksi.xlsx');
      
    }
    public function pdf(){
       $datas = transaksi::with([
        'trans','pembeli'
    ])->get();
        $pdf = PDF::loadview('petugas.laporan.pdf', compact('datas'));
        return $pdf->download('laporanpdf.pdf');
       
    }
}
