<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\BalasPertanyaan;
use App\Mail\TipePertanyaan;

use Illuminate\Support\Facades\Mail;
use App\Pertanyaan;
use App\Jawaban;
use Uuid;
use App\Data;
use File;
use App\Mail\NotifikasiKonfirmasi;
use Storage;
use Validator;
use Illuminate\Routing\Route;
use Carbon\Carbon;
use App\Mail\EmailNotifikasi;


class MailboxController extends Controller
{
	public function __construct(Route $route)
    {
        // $this->middleware('auth');
        if($route->getActionMethod($route)!='verifikasi') $this->middleware('auth');

    }
    public function index(Request $request)
    {
    	$this->setActive('mailbox');
    	$this->setTitle('mailbox');
    	$this->data['pertanyaan'] = Pertanyaan::whereNull('id_jawaban')->whereNotNull('status_email')->orderBy('created_at', 'DESC')->paginate(15);

        return view('admin.mailbox.index', $this->data);
    	
    }

    public function verifikasi(Request $request)
    {
        $update = Pertanyaan::find($request->verif);
        $update->status_email = 1;
        $update->save();

        Mail::to('melania.muntini@gmail.com')->cc(['ppidits@gmail.com'])->send(new EmailNotifikasi($update->id_pertanyaan));

        echo 'Email Telah Terverifikasi, Silahkan Tunggu Jawaban Lewat Inbox/Spam Email Anda';
        //return view('verifikasi.index', $this->data);

    }

    public function emailbalasan(Request $request)
    {
        

        //$this->data['pertanyaan'] = Pertanyaan::whereNotNull('id_jawaban')->paginate(10);

        //return view('admin.mailbox.index', $this->data);

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
		
        $pertanyaan = Pertanyaan::with(['jawaban'])->findOrFail($request->mail_id);
        
        if($pertanyaan->jawaban->where('status_jawaban', 1)->count() > 0)
        $this->data['cetak'] = 1;
        else $this->data['cetak'] = 0;

        $this->data['pertanyaan'] = $pertanyaan;
        // dd($this->data['pertanyaan']->jawaban);
        // dd('a');
    	return view('admin.mailbox.read', $this->data);
    }

    public function balas(Request $request)
    {   
    	if($request->link){
            foreach ($request->link as $key => $value) {
                $key1=$key+1;
                
                $result["link.$key.url"]="URL $key1 tidak sesuai format!";

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
        }
    	$id = Uuid::generate(4);

    	$create = New Jawaban;
    	$create->id_jawaban = $id;
    	$create->judul_jawaban = $request->judul_jawaban;
    	$create->id_pertanyaan = $request->id_pertanyaan;
        $create->status_jawaban = 0;
    	$create->jawaban = htmlentities($request->jawaban);
    	$create->save();

    	$update = Pertanyaan::find($request->id_pertanyaan);
    	$update->id_jawaban = $id;
        $tipe = $update->tipe;
    	$update->save();

    	$file = $request->data;

        if($file){
            foreach ($file as $key => $value) {
            // $name = UUID::generate(4);
                // echo 'aa';
                $photo = new Data;
                $iddata = UUID::generate(4);
                $filename = 'data/' . $value->getClientOriginalName();             
                if ($value) {
                    Storage::disk('public')->put($filename, File::get($value));
                }

                $photo->id_data = $iddata;
                $photo->data = "storage/$filename";

                if($tipe == 'Publik' || $tipe == 'Kondisional'){
                    $exec = '$HOME/solr-6.6.0/bin/post -c info "'.public_path($photo->data).'" -params "literal.tipe=file&literal.filename=' . urlencode($photo->data) . '&literal.ext=' . $value->getClientOriginalExtension() . '" 2>&1';
                    $output = exec($exec, $test);

                    if ($test[0] == "sh: 1: /var/www/solr-6.6.0/bin/post: not found")
                    {
                        $exec = '/home/user/solr-6.6.0/bin/post -c info "'.public_path($photo->data).'" -params "literal.tipe=file&literal.filename=' . urlencode($photo->data) . '&literal.ext=' . $value->getClientOriginalExtension() . '" 2>&1';
                        $output = exec($exec, $test);
                    }

                    // $output = exec($exec, $test);
                }
                
                // dd($exec);
                $photo->id_jawaban = $id;
                $photo->tipe = "file";
                $photo->save();


            }
        }

        $links = $request->link;

        if($links){
            foreach ($links as $link) {
                if($link == '') continue;

                $photo = new Data;
                $iddata = UUID::generate(4);
                $photo->id_data = $iddata;
                $photo->data = $link;
                $photo->id_jawaban = $id;
                if($tipe == 'Publik' || $tipe == 'Kondisional'){
                    $exec = '$HOME/solr-6.6.0/bin/post -c info '.$link.' -recursive 0 -delay 1 -params "literal.tipe=url" 2>&1';
                    $output = exec($exec, $teslink);
                    
                    if ($teslink[0] == "sh: 1: /var/www/solr-6.6.0/bin/post: not found")
                    {
                        $exec2 = '/home/user/solr-6.6.0/bin/post -c info '.$link.' -recursive 0 -delay 1 -params "literal.tipe=url&literal.url_asli=' . urlencode($link) . '" 2>&1';
                        $output2 = exec($exec2, $test);
                        // dd($test);
                    }
                }
                $photo->tipe = "link";
                $photo->save();


            }

        }

        
        // dd($request->email);
        Mail::to('melania.muntini@gmail.com')->send(new NotifikasiKonfirmasi($update->id_pertanyaan));
        

    	return back()->with('status', 'Balasan pertanyaan sudah terjawab, tunggu konfirmasi!');
    }


    public function sent(Request $request)
    {
    	$this->setActive('sent');
    	$this->setTitle('sent');

        $this->data['pertanyaan'] = Pertanyaan::join('jawaban', 'pertanyaan.id_jawaban', '=', 'jawaban.id_jawaban')->where('status_jawaban',1)->orderBy('jawaban.created_at', 'DESC')->paginate(15);

    	return view('admin.mailbox.index', $this->data);

    }

    public function label(Request $request)
    {
        $this->setActive('label');
        $this->setTitle('label');
            
        $name = $request->name;
        //echo $name;
        // $this->data['pertanyaan'] = Pertanyaan::whereNull('id_jawaban')->where('tipe',$name)->paginate(15);
      
        $this->data['pertanyaan'] = Pertanyaan::join('jawaban', 'pertanyaan.id_jawaban', '=', 'jawaban.id_jawaban')->whereNotNull('tipe')->where('tipe',$name)->orderBy('jawaban.created_at', 'DESC')->paginate(15)->withPath('label?name=Publik');
      
        return view('admin.mailbox.index', $this->data);

    }

    public function konfirmasiadd(Request $request)
    {
        $update = Jawaban::find($request->id);
        $update->status_jawaban = 1;
        $update->tgl_konfirmasi = Carbon::now();
        $update->save();
        
        
        Mail::to($update->pertanyaan->email_penanya)->send(new BalasPertanyaan($request->id, $request->jawaban));
        // dd($request->id);

        return back()->with('status', 'Pesan sudah di konfirmasi dan di kirim ke email penanya');
    }

    public function konfirmasi(Request $request)
    {
        // $this->data['tipe'] = 'kondisional'
        $this->setActive('konfirmasi');
        $this->setTitle('konfirmasi');

        $this->data['pertanyaan']= Pertanyaan::join('jawaban', 'pertanyaan.id_jawaban', '=', 'jawaban.id_jawaban')->where('status_jawaban',0)->orderBy('jawaban.created_at', 'DESC')->paginate(15);
        // dd($result);
        // dd($this->data['pertanyaan']);
        return view('admin.mailbox.index', $this->data);
        // return view('')
    }


    public function type(Request $request)
    {
        $update = Pertanyaan::find($request->id);
        // dd($update);
        // (int)$urutHari = Pertanyaan::whereDate('tanggal_jakarta', Carbon::now('Asia/Jakarta')->toDateString())->count()+1;
        (int)$urutHari = Pertanyaan::whereDate('tanggal_jakarta', 'tanggal_pertanyaan')->count()+1;
        // dd($urutTahun);
        (int)$urutTahun = Pertanyaan::whereYear('tanggal_jakarta', Carbon::now('Asia/Jakarta')->format('Y'))->count()+1;
        // (int)$urutTahun = Pertanyaan::whereYear('tanggal_jakarta', 'tanggal_pertanyaan'->format('Y'))->count()+1;
        $update->tipe = $request->tipe;
        $update->notes = htmlentities($request->notes);
        $update->tanggal_tipe = Carbon::now();
        $update->tanggal_jakarta = Carbon::now('Asia/Jakarta')->toDateTimeString();
        $update->no_surat = $urutTahun .'/'. $urutHari . '/' . $update->tanggal_pertanyaan->toDateString() .'/'. Carbon::now('Asia/Jakarta')->format('Y');
        $update->save();


        $update = Pertanyaan::find($request->id);
        
        $this->data['jawaban'] = $request->jawaban;

        Mail::to($update->email_penanya)->send(new TipePertanyaan($request->id, $request->jawaban));
        //echo "SUKSES SHOB";
        return back()->with('status', 'Pesan untuk tipe pertanyaan berhasil dikirim');
    }

    public function delete(Request $request)
    {
        if($request->id_pertanyaan){
            
                
            $messages["id_pertanyaan.required"]="id_pertanyaan dibutuhkan";
            


            //echo var_dump($result);
            $validator = Validator::make($request->all(), [
                
                'id_pertanyaan' => 'required|exists:pertanyaan,id_pertanyaan',
                
                
            ], $messages);

            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }
        }

        $pertanyaan = Pertanyaan::find($request->id_pertanyaan);
        $pertanyaan->delete();

        // dd($request->path());

        return redirect('/admin/mailbox')->with('status', 'Sukses!');
    }


}

