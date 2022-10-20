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
       $udin =  DB::table('villas')->paginate(3);
       $home  = DB::table('villas')->where('jnsID',1)->Orwhere('id',5)->paginate(2);
        return view('welcome', compact('datas','udin','home'));
    }
     
}
