<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use Carbon\Carbon;
use App\Pertanyaan;
use Config;
use Uuid;
use App\Mail\AddPertanyaan;
use Mail;
use Validator;
use DB;

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
            'ktp' => 'required|image|max:5000',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator, 'gagalTambah')
                        ->withInput();
        }

        
        
        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $request->nama;
        // $urutTahun = Pertanyaan::whereYear('created_at', date('Y'))->count();
        // Config::set("app.timezone","Asia/Jakarta");
        // (int)$urutHari = Pertanyaan::whereDate('tanggal_jakarta', Carbon::now('Asia/Jakarta')->toDateString())->count()+1;
        // // dd($urutTahun);
        // (int)$urutTahun = Pertanyaan::whereYear('tanggal_jakarta', Carbon::now('Asia/Jakarta')->format('Y'))->count()+1;
        // dd($urutTahun);
        // dd(date('Y-m-d'));
        // dd(Carbon::now()->toDateString());
        // $urutTahun->where
        // dd(Carbon::now('Asia/Jakarta')->toDateString());
        // dd(Carbon::now('Asia/Jakarta')->format('Y'));
        // $create->no_surat = $urutTahun .'/'. $urutHari . '/' . Carbon::now('Asia/Jakarta')->toDateString() .'/'. Carbon::now('Asia/Jakarta')->format('Y');
        // dd($create->no_surat);
        // $create->tanggal_jakarta = Carbon::now('Asia/Jakarta')->toDateTimeString();
        $create->alamat_penanya = $request->alamat;
        $create->nohp_penanya = $request->kontak;
        $create->email_penanya = $request->email;
        $create->judul_pertanyaan = $request->judul;
        $create->pertanyaan = $request->pertanyaan;
        $create->tipe_layanan = 'info';
        
                     
        if ($request->hasFile('ktp')) {
            $file = $request->ktp;
            $filename = 'ktp/'. Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($file));
            $create->ktp = "storage/$filename";

        }

        $create->save();

        Mail::to($request->email)->send(new AddPertanyaan($create->id_pertanyaan));

        // dd('a');
        return back()->with('status', 'Silahkan Cek Email/Spam Pada Email');
    }

    public function createKeberatan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required',
            'judul' => 'required',
            'pertanyaan' => 'required',
            'ktp' => 'required|image|max:5000',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator, 'gagalTambah')
                        ->withInput();
        }

        
        
        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $request->nama;
        // $urutTahun = Pertanyaan::whereYear('created_at', date('Y'))->count();
        // Config::set("app.timezone","Asia/Jakarta");
        // (int)$urutHari = Pertanyaan::whereDate('tanggal_jakarta', Carbon::now('Asia/Jakarta')->toDateString())->count()+1;
        // // dd($urutTahun);
        // (int)$urutTahun = Pertanyaan::whereYear('tanggal_jakarta', Carbon::now('Asia/Jakarta')->format('Y'))->count()+1;
        // dd($urutTahun);
        // dd(date('Y-m-d'));
        // dd(Carbon::now()->toDateString());
        // $urutTahun->where
        // dd(Carbon::now('Asia/Jakarta')->toDateString());
        // dd(Carbon::now('Asia/Jakarta')->format('Y'));
        // $create->no_surat = $urutTahun .'/'. $urutHari . '/' . Carbon::now('Asia/Jakarta')->toDateString() .'/'. Carbon::now('Asia/Jakarta')->format('Y');
        // dd($create->no_surat);
        // $create->tanggal_jakarta = Carbon::now('Asia/Jakarta')->toDateTimeString();
        $create->alamat_penanya = $request->alamat;
        $create->nohp_penanya = $request->kontak;
        $create->email_penanya = $request->email;
        $create->judul_pertanyaan = $request->judul;
        $create->pertanyaan = $request->pertanyaan;
        $create->tipe_layanan = 'keberatan';
        
                     
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

    public function createGratifikasi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required',
            'judul' => 'required',
            'pertanyaan' => 'required',
            'ktp' => 'required|image|max:5000',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator, 'gagalTambah')
                        ->withInput();
        }

        
        
        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $request->nama;
        // $urutTahun = Pertanyaan::whereYear('created_at', date('Y'))->count();
        // Config::set("app.timezone","Asia/Jakarta");
        // (int)$urutHari = Pertanyaan::whereDate('tanggal_jakarta', Carbon::now('Asia/Jakarta')->toDateString())->count()+1;
        // // dd($urutTahun);
        // (int)$urutTahun = Pertanyaan::whereYear('tanggal_jakarta', Carbon::now('Asia/Jakarta')->format('Y'))->count()+1;
        // dd($urutTahun);
        // dd(date('Y-m-d'));
        // dd(Carbon::now()->toDateString());
        // $urutTahun->where
        // dd(Carbon::now('Asia/Jakarta')->toDateString());
        // dd(Carbon::now('Asia/Jakarta')->format('Y'));
        
        // dd($create->no_surat);
        
        $create->alamat_penanya = $request->alamat;
        $create->nohp_penanya = $request->kontak;
        $create->email_penanya = $request->email;
        $create->judul_pertanyaan = $request->judul;
        $create->pertanyaan = $request->pertanyaan;
        $create->tipe_layanan = 'gratifikasi';
        
                     
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

    public function createSengketa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required',
            'judul' => 'required',
            'pertanyaan' => 'required',
            'ktp' => 'required|image|max:5000',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator, 'gagalTambah')
                        ->withInput();
        }

        
        
        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $request->nama;
        // $urutTahun = Pertanyaan::whereYear('created_at', date('Y'))->count();
        // Config::set("app.timezone","Asia/Jakarta");
        // (int)$urutHari = Pertanyaan::whereDate('tanggal_jakarta', Carbon::now('Asia/Jakarta')->toDateString())->count()+1;
        // // dd($urutTahun);
        // (int)$urutTahun = Pertanyaan::whereYear('tanggal_jakarta', Carbon::now('Asia/Jakarta')->format('Y'))->count()+1;
        // dd($urutTahun);
        // dd(date('Y-m-d'));
        // dd(Carbon::now()->toDateString());
        // $urutTahun->where
        // dd(Carbon::now('Asia/Jakarta')->toDateString());
        // dd(Carbon::now('Asia/Jakarta')->format('Y'));
        
        // dd($create->no_surat);
        
        $create->alamat_penanya = $request->alamat;
        $create->nohp_penanya = $request->kontak;
        $create->email_penanya = $request->email;
        $create->judul_pertanyaan = $request->judul;
        $create->pertanyaan = $request->pertanyaan;
        $create->tipe_layanan = 'sengketa';
        
                     
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

    public function createWewenang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required',
            'judul' => 'required',
            'pertanyaan' => 'required',
            'ktp' => 'required|image|max:5000',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator, 'gagalTambah')
                        ->withInput();
        }

        
        
        $create = new Pertanyaan;
        $create->id_pertanyaan = Uuid::generate(4);
        $create->nama_penanya = $request->nama;
        // $urutTahun = Pertanyaan::whereYear('created_at', date('Y'))->count();
        // Config::set("app.timezone","Asia/Jakarta");
        // (int)$urutHari = Pertanyaan::whereDate('tanggal_jakarta', Carbon::now('Asia/Jakarta')->toDateString())->count()+1;
        // // dd($urutTahun);
        // (int)$urutTahun = Pertanyaan::whereYear('tanggal_jakarta', Carbon::now('Asia/Jakarta')->format('Y'))->count()+1;
        // dd($urutTahun);
        // dd(date('Y-m-d'));
        // dd(Carbon::now()->toDateString());
        // $urutTahun->where
        // dd(Carbon::now('Asia/Jakarta')->toDateString());
        // dd(Carbon::now('Asia/Jakarta')->format('Y'));
        
        // dd($create->no_surat);
        
        $create->alamat_penanya = $request->alamat;
        $create->nohp_penanya = $request->kontak;
        $create->email_penanya = $request->email;
        $create->judul_pertanyaan = $request->judul;
        $create->pertanyaan = $request->pertanyaan;
        $create->tipe_layanan = 'wewenang';
        
                     
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
    public function script(){
        // $pertanyaan = Pertanyaan::select(DB::raw('date(tanggal_jakarta) as a'))->groupBy('a')->get();
        // $year = '2017';
        // $date = '';
        // $counterHarian = 0; 
        // $counterTahun = 0;
        // $pertanyaan = Pertanyaan::whereNotNull('tanggal_jakarta')->orderBy('tanggal_jakarta', "ASC")->get();
        // foreach ($pertanyaan as $key => $value) {
        //     $php_date = getdate(strtotime($value->tanggal_jakarta));
        //     $tahun =  $php_date['year'];
        //     $tanggal = date('Y-m-d', strtotime($value->tanggal_jakarta));
        //     if ($year != $tahun) $counterTahun = 0;
        //     if ($date != $tanggal) $counterHarian =0;
        //     $counterHarian++;
        //     $counterTahun++;
        //     echo $value->tanggal_jakarta.' '.$counterTahun . '/' . $counterHarian . '/'. date('Y-m-d', strtotime($value->tanggal_jakarta)) .'/'. date('Y', strtotime($value->tanggal_jakarta)) .'<br>';
        //     $value->no_surat =  $counterTahun . '/' . $counterHarian . '/'. date('Y-m-d', strtotime($value->tanggal_jakarta)) .'/'. date('Y', strtotime($value->tanggal_jakarta));
        //     $value->save();
        //     $year = $tahun;
        //     $date = $tanggal;
        //     // echo $value->tanggal_jakarta . '|' . $;
            
            
        // }
        $pertanyaan = Pertanyaan::where('tipe_layanan', 'Layanan: Permohonan Informasi dan Dokumentasi')->get();
        foreach($pertanyaan as $tanya){
            $tanya->tipe_layanan = 'info';
            $tanya->save();
        }
        // $pertanyaan = Pertanyaan::whereNotNull('tanggal_tipe')->get();
        // // $pertanyaan = Pertanyaan::get();
        // // dd($pertanyaan);
        // foreach ($pertanyaan as $key => $value) {
        //     $value->tanggal_jakarta = $value->tanggal_tipe->timezone('Asia/Jakarta');
        //     // $value->tanggal_jakarta = null;
        //     // $value->no_surat = null;
        //     $value->save();
        // }
        
        
        
    }
}
