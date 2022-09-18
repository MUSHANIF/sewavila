<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class villa extends Model
{
    use HasFactory;
    public function jns()
    {
        return $this->belongsTo(jnsvilla::class, 'jnsID', 'id');
    }
     public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'villaID', 'id');
    }
}
