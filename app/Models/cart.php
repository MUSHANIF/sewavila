<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    public function vila()
    {
        return $this->belongsTo(villa::class, 'villaid', 'id');
    }
}
