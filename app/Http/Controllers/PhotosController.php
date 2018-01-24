<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photos;
use Uuid;
use Validator;
use Storage;
use File;
class PhotosController extends Controller
{
    public function index()
    {
        $this->data['fotos'] = Photos::paginate(12);
        // dd($this->data['foto']);
        $this->setActive('photos');
        $this->setTitle('photos');
        return view('admin.photos.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'photos' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator, 'gagalTambah')
                        ->withInput();
        }
        if($request->hasFile('photos')){
	        $galeri = New Photos;
	        $galeri->id = Uuid::generate(4);
	        
	        $file = $request->photos;
	        if ($file) {
	            // dd(File::type($file));
	            $filename = 'photos/' . $galeri->id . '.' . $file->getClientOriginalExtension();
	            Storage::disk('public')->put($filename, File::get($file));
	            $galeri->path = "storage/$filename";
	        }
	        $galeri->save();
        }
        else{
            return back()->with('gagal', 'Data Gagal diupload');
        }

        return back()->with('status', 'Foto Berhasil Diupload!');
    }
}
