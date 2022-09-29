<?php

namespace Database\Seeders;

use App\Models\jnsvilla;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class JnsvillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        jnsvilla::create([
            'jenis' => 'small',
           
        ]);
        jnsvilla::create([
            'jenis' => 'medium',
           
        ]);
        jnsvilla::create([
            'jenis' => 'tinggi',
           
        ]);
    }
}
