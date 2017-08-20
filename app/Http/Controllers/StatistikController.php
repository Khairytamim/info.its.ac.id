<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use DB;
// use Carbon\Carbon;
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

    	$this->data['pertanyaan'] = Pertanyaan::select('*', DB::raw('DATEDIFF(DATE(tanggal_tipe),DATE(created_at)) as respon_1'))->whereNotNull('status_email')->get();
         
    	return view('admin.statistik.index', $this->data);
    }

    public function respon(Request $request)
    {
        $respon1=0;
        $respon2=0;
        $jumlahrespon1=0;
        $jumlahrespon2=0;

    	$pertanyaan = Pertanyaan::select('*', DB::raw('DATEDIFF(DATE(tanggal_tipe),DATE(created_at)) as respon_1'))->whereNotNull('status_email')->get();

        $pertanyaan = $pertanyaan->map(function ($value) {
            if($value->tipe != null && $value->id_jawaban == null) $value->status = 'IN PROGRESS';
            else if($value->tipe != null && $value->id_jawaban != null) $value->status = 'DONE';
            else if($value->tipe == null && $value->id_jawaban == null) $value->status = 'PENDING';
            else $value->status = 'OTHER';

            return $value;
        });

    	foreach ($pertanyaan as $key => $value) {
            if(!is_null($value->respon_1))
            {
                $jumlahrespon1++;
                $respon1 = $respon1 + $value->respon_1;
            } 
    		
            if(!is_null($value->id_jawaban)){
                $jumlahrespon2++;
                $respon2 = $respon2 + $value->jawaban->created_at->diffInDays($value->created_at);
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
