<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
     public function trans()
    {
        return $this->belongsTo(villa::class, 'villaID', 'id');
    }
    public function pembeli()
    {
        return $this->belongsTo(pembeli::class, 'pembeliID', 'id');
    }
}
