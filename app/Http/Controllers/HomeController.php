<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['banner'] = Banner::get();
        // dd($this->date(format)a['banner']);
        return view('welcome', $this->data);
    }

    public function profil()
    {
        return view('profil.index');
    }

    public function informasipublik()
    {
        return view('informasipublik.index');
    }

    public function hubungikami()
    {
        return view('hubungikami.index');
    }
}
