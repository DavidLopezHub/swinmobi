<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        if(auth()->user()->role=="Cliente"){
            return redirect('/alquileres/lista');
        }else {
            $inmuebles=Inmueble::where('user_id',auth()->user()->id)->get();
            return view('inmuebles.index',compact('inmuebles'));
        }
    }
}
