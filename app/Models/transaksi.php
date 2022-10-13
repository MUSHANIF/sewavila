<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{

    use HasFactory;
    protected $fillable = [
        'userid',
        'villaid',
        'metode_pembayaran',
        'total',
        'kembalian',
        'hari',
    ];
     public function trans()
    {
        return $this->belongsTo(villa::class, 'villaID', 'id');
    }
    public function pembeli()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }
}
