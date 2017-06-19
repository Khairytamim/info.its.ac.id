<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pertanyaan;
use Uuid;

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
        $create->pertanyaan = $request->pertanyaan;
        $create->save();

        return back()->with('status', 'Sukses!');
    }

    public function list()
    {
        $this->setActive('list');
        $this->setTitle('list');
        $this->data['pertanyaan'] = Pertanyaan::get();

        return view('admin.mailbox.index', $this->data);
    }
}
