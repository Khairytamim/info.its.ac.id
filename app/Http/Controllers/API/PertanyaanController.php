<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pertanyaan;
use Storage;
use File;
use Uuid;
use App\Mail\AddPertanyaan;
use Mail;
use Carbon\Carbon;
use Config;
use Validator;
use DB;

class PertanyaanController extends Controller
{
    public function createInformasi(Request $request) {
		$contents = $request->json()->all();

        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $contents['nama'];
        $create->alamat_penanya = $contents['alamat'];
        $create->nohp_penanya = $contents['kontak'];
        $create->email_penanya = $contents['email'];
        $create->judul_pertanyaan = $contents['judul'];
        $create->pertanyaan = $contents['pertanyaan'];
        $create->tipe_layanan = 'info';

		$file = $contents['ktp'];
		dd($file);
		$filename = 'ktp/' . Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
		Storage::disk('public')->put($filename, File::get($file));
		$create->ktp = "storage/$filename";
        
        $create->save();
        // Mail::to($contents['email'])->send(new AddPertanyaan($create->id_pertanyaan));
        $encodean = base64_encode($request->ktp);
        return response()->json(basename(base64_decode($encodean)), 201);
        // return response()->json($c);
        // return response()->setStatusCode(200);
    }

    public function createKeberatan(Request $request) {
        $contents = $request->json()->all();

        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $contents['nama'];
        $create->alamat_penanya = $contents['alamat'];
        $create->nohp_penanya = $contents['kontak'];
        $create->email_penanya = $contents['email'];
        $create->judul_pertanyaan = $contents['judul'];
        $create->pertanyaan = $contents['pertanyaan'];
        $create->tipe_layanan = 'keberatan';
        // if($request->hasFile('ktp')) {
        //     $file = $request->ktp;
        //     $filename = 'ktp/' . Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
        //     Storage::disk('public')->put($filename, File::get($file));
        //     $create->ktp = "storage/$filename";
        // }

        $create->save();
        Mail::to($contents['email'])->send(new AddPertanyaan($create->id_pertanyaan));

        return response()->json($contents, 201);
    }
    
    public function createSengketa(Request $request) {
        $contents = $request->json()->all();

        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $contents['nama'];
        $create->alamat_penanya = $contents['alamat'];
        $create->nohp_penanya = $contents['kontak'];
        $create->email_penanya = $contents['email'];
        $create->judul_pertanyaan = $contents['judul'];
        $create->pertanyaan = $contents['pertanyaan'];
        $create->tipe_layanan = 'sengketa';
        // if($request->hasFile('ktp')) {
        //     $file = $request->ktp;
        //     $filename = 'ktp/' . Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
        //     Storage::disk('public')->put($filename, File::get($file));
        //     $create->ktp = "storage/$filename";
        // }

        $create->save();
        Mail::to($contents['email'])->send(new AddPertanyaan($create->id_pertanyaan));

        return response()->json($contents, 201);
    }
    
    public function createWewenang(Request $request) {
        $contents = $request->json()->all();

        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $contents['nama'];
        $create->alamat_penanya = $contents['alamat'];
        $create->nohp_penanya = $contents['kontak'];
        $create->email_penanya = $contents['email'];
        $create->judul_pertanyaan = $contents['judul'];
        $create->pertanyaan = $contents['pertanyaan'];
        $create->tipe_layanan = 'wewenang';
        // if($request->hasFile('ktp')) {
        //     $file = $request->ktp;
        //     $filename = 'ktp/' . Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
        //     Storage::disk('public')->put($filename, File::get($file));
        //     $create->ktp = "storage/$filename";
        // }

        $create->save();
        Mail::to($contents['email'])->send(new AddPertanyaan($create->id_pertanyaan));

        return response()->json($contents, 201);
    }
    
    public function createPungli(Request $request) {
        $contents = $request->json()->all();

        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $contents['nama'];
        $create->alamat_penanya = $contents['alamat'];
        $create->nohp_penanya = $contents['kontak'];
        $create->email_penanya = $contents['email'];
        $create->judul_pertanyaan = $contents['judul'];
        $create->pertanyaan = $contents['pertanyaan'];
        $create->tipe_layanan = 'gratifikasi';
        // if($request->hasFile('ktp')) {
        //     $file = $request->ktp;
        //     $filename = 'ktp/' . Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
        //     Storage::disk('public')->put($filename, File::get($file));
        //     $create->ktp = "storage/$filename";
        // }

        $create->save();
        Mail::to($contents['email'])->send(new AddPertanyaan($create->id_pertanyaan));

        return response()->json($contents, 201);
    }
}
