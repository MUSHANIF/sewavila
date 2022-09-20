<?php

namespace App\Exports;

use App\Models\transaksi;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class TransaksiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
  
    public function view(): View
    {
        return view('petugas.laporan.excel', [
            'datas' => transaksi::with([
                'trans','pembeli'
            ])->get()
        ]);
    }
}
