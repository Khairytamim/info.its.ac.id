<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;

use App\Pertanyaan;
use Uuid;
use App\Mail\AddPertanyaan;
use Mail;
use Validator;

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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required',
            'judul' => 'required',
            'pertanyaan' => 'required',
            'ktp' => 'required|images|max:5000',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator, 'gagalTambah')
                        ->withInput();
        }
        
        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $request->nama;
        $create->alamat_penanya = $request->alamat;
        $create->nohp_penanya = $request->kontak;
        $create->email_penanya = $request->email;
        $create->judul_pertanyaan = $request->judul;
        $create->pertanyaan = $request->pertanyaan;
        
                     
        if ($request->hasFile('ktp')) {
            $file = $request->ktp;
            $filename = 'ktp/'. Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($file));
            $create->ktp = "storage/$filename";

        }

        $create->save();

        Mail::to($request->email)->send(new AddPertanyaan($create->id_pertanyaan));


        return back()->with('status', 'Silahkan Cek Email/Spam Pada Email');
    }

    public function list()
    {
        $this->setActive('list');
        $this->setTitle('list');
        $this->data['pertanyaan'] = Pertanyaan::get();

        return view('admin.mailbox.index', $this->data);
    }
}
