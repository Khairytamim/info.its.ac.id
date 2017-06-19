<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class OrganisasiController extends Controller
{
	public function __construct(Route $route)
    {
        if($route->getActionMethod($route) != 'index') $this->middleware('auth');
    }

    public function adminorganisasi(Request $request)
    {
    	$this->setActive('organisasi');
    	$this->setTitle('organisasi');


    	return view('admin.organisasi.index', $this->data);
    }
}
