<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use Mail;
use Storage;
use File;
use Uuid;
use Validator;
use App\Mail\EmailNotifikasi;
use PDF;

class LayananOfflineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $this->setActive('offline');
        $this->setTitle('offline');
        // $this->data['request'] = $request;
        if($request->has('form')) $this->data['form'] = $request->form;
        else $this->data['form'] = 'informasi';

        // dd('a');
        return view('admin.offline.index', $this->data);
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
        $create->status_email = 1;
        $create->is_offline = 1;
        
                     
        if ($request->hasFile('ktp')) {
            $file = $request->ktp;
            $filename = 'ktp/'. Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($file));
            $create->ktp = "storage/$filename";

        }

        $create->save();
        Mail::to('melania.muntini@gmail.com')->cc(['ppidits@gmail.com'])->send(new EmailNotifikasi($create->id_pertanyaan));
        // Mail::to($request->email)->send(new AddPertanyaan($create->id_pertanyaan));

        // dd('a');
        return back()->with('status', 'Silahkan Cek Email/Spam Pada Email');
    }
    public function addGratifikasi(Request $request)
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
        $create->status_email = 1;
        $create->is_offline = 1;
        
                     
        if ($request->hasFile('ktp')) {
            $file = $request->ktp;
            $filename = 'ktp/'. Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($file));
            $create->ktp = "storage/$filename";

        }

        $create->save();

        Mail::to('melania.muntini@gmail.com')->cc(['ppidits@gmail.com'])->send(new EmailNotifikasi($create->id_pertanyaan));

        return back()->with('status', 'Silahkan Cek Email/Spam Pada Email');
    }
    public function addKeberatan(Request $request)
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
        $create->status_email = 1;
        $create->is_offline = 1;
        
                     
        if ($request->hasFile('ktp')) {
            $file = $request->ktp;
            $filename = 'ktp/'. Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($file));
            $create->ktp = "storage/$filename";

        }

        $create->save();

        Mail::to('melania.muntini@gmail.com')->cc(['ppidits@gmail.com'])->send(new EmailNotifikasi($create->id_pertanyaan));

        return back()->with('status', 'Silahkan Cek Email/Spam Pada Email');
    }

    public function cetak(Pertanyaan $pertanyaan, Request $request)
    {
        $this->data['pertanyaan'] = $pertanyaan;
        // PDF::;
        // echo html_entity_decode($pertanyaan->pertanyaan);
        // exit();
        // return view('admin.pdf.invoice', $this->data);
        $pdf = PDF::setPaper('a4', 'portrait')
        ->loadView('admin.pdf.invoice', $this->data);
        return $pdf->download($pertanyaan->no_surat, '.pdf');
    }
}
