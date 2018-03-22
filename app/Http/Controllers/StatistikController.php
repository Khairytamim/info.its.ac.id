<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use DB;
use Carbon\Carbon;
use Response;
class StatistikController extends Controller
{
	public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$this->setActive('statistik');
    	$this->setTitle('statistik');

    	
        $pertanyaan = Pertanyaan::with(['jawaban'])->whereNotNull('status_email')->get();
         
        $pertanyaan = $pertanyaan->map(function ($value) {
            $value->respon_1 = $value->created_at->diffInDays($value->tanggal_tipe);
            return $value;
        });
        $this->data['pertanyaan'] = $pertanyaan;
    	
        return view('admin.statistik.index', $this->data);
    }

    public function respon(Request $request)
    {
        $respon1=0;
        $respon2=0;
        $jumlahrespon1=0;
        $jumlahrespon2=0;

    	$pertanyaan = Pertanyaan::with(['jawaban'])->whereNotNull('status_email')->get();

        $pertanyaan = $pertanyaan->map(function ($value) {
            if($value->tipe != null && $value->id_jawaban == null) $value->status = 'IN PROGRESS';
            else if($value->tipe != null && $value->id_jawaban != null) $value->status = 'DONE';
            else if($value->tipe == null && $value->id_jawaban == null) $value->status = 'PENDING';
            else $value->status = 'OTHER';
            $value->respon_1 = $value->created_at->diffInDays($value->tanggal_tipe);
            return $value;
        });

    	foreach ($pertanyaan as $key => $value) {
            // if($value->status == 'PENDING' || $value->tipe == 'OTHER') continue;

            if(!is_null($value->respon_1))
            {
                $jumlahrespon1++;
                $respon1 = $respon1 + $value->respon_1;
            } 
    		$jawaban = $value->jawaban->where('status_jawaban', 1)->sortBy('created_at')->first();
            if($jawaban != null){
                $jumlahrespon2++;
                // $datepertanyaan = Carbon::parse($value->created_at);
                // $datepertanyaan->hour = 0;
                // $datepertanyaan->minute = 0;
                // $datepertanyaan->second = 0;

                // $datejawaban = Carbon::parse($value->jawaban->created_at);
                // $datejawaban->hour = 0;
                // $datejawaban->minute = 0;
                // $datejawaban->second = 0;
                // respon2 = respon2 + value
                // dd();
                if($jawaban->tgl_konfirmasi == null)
                    $respon2 = $respon2 + $value->created_at->diffInDays($jawaban->updated_at);
                else 
                    $respon2 = $respon2 + $value->created_at->diffInDays($jawaban->tgl_konfirmasi);
            }
    	}

      
        if($jumlahrespon2 == 0) $this->data['avgrespon2'] = 0;
        else $this->data['avgrespon2'] = $respon2/$jumlahrespon2;

        if($jumlahrespon1 == 0) $this->data['avgrespon1'] = 0;
        else $this->data['avgrespon1'] = $respon1/$jumlahrespon1;

        $this->data['jumlahpertanyaan'] = $pertanyaan->count();
        $this->data['publik'] = $pertanyaan->where('tipe', 'Publik')->count();
        $this->data['kondisional'] = $pertanyaan->where('tipe', 'Kondisional')->count();
        $this->data['in_progress'] = $pertanyaan->where('status', 'IN PROGRESS')->count();
        $this->data['done'] = $pertanyaan->where('status', 'DONE')->count();
        $this->data['pending'] = $pertanyaan->where('status', 'PENDING')->count();
        $this->data['other'] = $pertanyaan->where('status', 'OTHER')->count();

        $this->data['rahasia'] = $pertanyaan->where('tipe', 'Rahasia')->count();
        $this->data['belum'] = $pertanyaan->where('tipe', null)->count();

        return Response::json($this->data);
    }
}
