<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class dashboardController extends Controller
{
    public function index(){
        return view(
            'partials.dashboard',
            [
                "title" => "Dashboard"
            ],
            [
                'user' => User::where('level', '=', '1')->count(),
                
                'petugas' => DB::table('petugas')->count(),
                'villa' => DB::table('villas')->count(),
                // 'datasiswa' => DB::table('siswas')->where('siswas.userID',  Auth::user()->id)->get(),
            ],

        );
    }
}
