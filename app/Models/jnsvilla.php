<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jnsvilla extends Model
{
    use HasFactory;
    public function villa()
    {
        return $this->hasMany(villa::class, 'jnsID', 'id');
    }
}
