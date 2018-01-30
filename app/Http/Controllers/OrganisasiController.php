<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Organisasi;
use Uuid;

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

    public function index()
    {
        $this->setActive('organisasi');
        $this->setTitle('organisasi');

        return view('konten.index', $this->data);
    }

    public function update(Request $request)
    {
        // $update = Organisasi::find(1);
        // $update->visi = $request->visi;
        // $update->misi = $request->misi;


        // $file = $request->photos;
                     
        // if ($file) {
        //     $filename = 'organisasi/'. Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
        //     Storage::disk('public')->put($filename, File::get($file));
        //     $update->organigram = "storage/$filename";

        // }

        // $update->save();


        // return back()->with('status', 'Sukses');
    }
}
