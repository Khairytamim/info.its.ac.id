<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\BalasPertanyaan;
use Illuminate\Support\Facades\Mail;
use App\Pertanyaan;
use App\Jawaban;
use Uuid;
use App\Data;
use File;
use Storage;
use Validator;

class MailboxController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
    	$this->setActive('mailbox');
    	$this->setTitle('mailbox');
    	$this->data['pertanyaan'] = Pertanyaan::whereNull('id_jawaban')->paginate(10);

        return view('admin.mailbox.index', $this->data);
    	
    }

    public function compose(Request $request)
    {
    	$this->setActive('mailbox');
    	$this->setTitle('mailbox');

    	// Mail::to('fk_joglo@yahoo.com')->send(new test('aa'));

    	return view('admin.mailbox.compose', $this->data);
    }


    public function inbox(Request $request)
    {
    	$this->data['pertanyaan'] = Pertanyaan::get();
    	
    }

    public function read(Request $request)
    {
    	$this->setActive('mailbox');
    	$this->setTitle('mailbox');
		
    	$this->data['pertanyaan'] = Pertanyaan::find($request->mail_id);

    	return view('admin.mailbox.read', $this->data);
    }

    public function balas(Request $request)
    {   
    	foreach ($request->link as $key => $value) {
            $key1=$key+1;
            
            $result["link.$key.url"]="URL $key1 tidak sesuai format!";
            // $result["nama.$key.min"]="Nama $key1 minimal 3";
            // $result["nim.$key.required"]="NIM $key1 harus diisi";
            // $result["Kota.required"]="Kota universitas harus diisi";
            // $result["ipk.$key.numeric"]="IPK $key1 yang anda masukkan belum sesuai format";
            // $result["ipk.$key.min"]="IPK $key1 harus lebih besar dari 0";
            // $result["ipk.$key.max"]="IPK $key1 harus lebih kecil dari 4";

        }

        //echo var_dump($result);
        $validator = Validator::make($request->all(), [
            
            'link.*' => 'url',
            
            
        ], $result);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
    	$id = Uuid::generate(4);

    	$create = New Jawaban;
    	$create->id_jawaban = $id;
    	$create->judul_jawaban = $request->judul_jawaban;
    	$create->id_pertanyaan = $request->id_pertanyaan;
    	$create->jawaban = $request->jawaban;
    	$create->save();

    	$update = Pertanyaan::find($request->id_pertanyaan);
    	$update->id_jawaban = $id;
    	$update->save();

    	$file = $request->data;

        if($file){
            foreach ($file as $key => $value) {
            // $name = UUID::generate(4);
                $photo = new Data;
                $iddata = UUID::generate(4);
                echo $filename = 'data/'. $id .'/'. $iddata . '.' . $value->getClientOriginalExtension();             
                if ($value) {
                    Storage::disk('public')->put($filename, File::get($value));
                }

                $photo->id_data = $iddata;

                $photo->data = "storage/$filename";
                $photo->id_jawaban = $id;
                $photo->tipe = "file";
                $photo->save();


            }
        }

        $links = $request->link;

        foreach ($links as $link) {
        	if($link == '') continue;

        	$photo = new Data;
            $iddata = UUID::generate(4);
			$photo->id_data = $iddata;
            $photo->data = $link;
            $photo->id_jawaban = $id;
            $photo->tipe = "link";
            $photo->save();


        }
    	// Mail::to($request->email)->send(new BalasPertanyaan($id));
    	
    	return back()->with('status', 'suskses');
    }


    public function sent(Request $request)
    {
    	$this->setActive('sent');
    	$this->setTitle('sent');

    	$this->data['pertanyaan'] = Pertanyaan::whereNotNull('id_jawaban')->paginate(10);

    	return view('admin.mailbox.index', $this->data);

    }


}

