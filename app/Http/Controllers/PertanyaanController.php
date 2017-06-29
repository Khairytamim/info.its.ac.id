<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;

use App\Pertanyaan;
use Uuid;
use App\Mail\AddPertanyaan;
use Mail;

class PertanyaanController extends Controller
{
    
    
    public function index()
    {
        $this->setActive('tanyakan');
        $this->setTitle('tanyakan');

        return view('tanyakan.index', $this->data);
    }

    public function add(Request $request)
    {
        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $request->nama;
        $create->alamat_penanya = $request->alamat;
        $create->nohp_penanya = $request->kontak;
        $create->email_penanya = $request->email;
        $create->judul_pertanyaan = $request->judul;
        $create->pertanyaan = $request->pertanyaan;
        $file = $request->ktp;
                     
        if ($file) {
            $filename = 'ktp/'. Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($file));
            $create->ktp = "storage/$filename";

        }

        $create->save();

        // Mail::to($request->email)->send(new AddPertanyaan($create->id_pertanyaan));


        return back()->with('status', 'Silahkan Cek Spam Pada Email');
    }

    public function list()
    {
        $this->setActive('list');
        $this->setTitle('list');
        $this->data['pertanyaan'] = Pertanyaan::get();

        return view('admin.mailbox.index', $this->data);
    }
}
