<?php

namespace App\Http\Controllers;
use App\Models\villa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $datas =  DB::table('villas')->paginate(4);
        return view('welcome', compact('datas'));
    }
     
}
