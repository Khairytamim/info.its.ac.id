<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Curl;
use App\Data;

class DataController extends Controller
{
    // protected $table = 'data';
    // protected $primaryKey = 'id_data';
    // public $timestamps = true;
    // public $incrementing = false;


    public function laporan()
    {

        return view('laporan.index');
    }

    public function search(Request $request)
    {

         $response = Curl::to('http://127.0.0.1:8983/solr/info/select?indent=on&q='.urlencode($request->cari).'&wt=json')->returnResponseObject()->get();
        // 

        // $output = exec('pwd');
        $results = json_decode($response->content);
        $this->data['results'] = $results;
        // dd($results->response->docs);
       
        return view('laporan.hasil', $this->data);
    }

    public function admin(Request $request)
    {
        $this->setActive('data');
        $this->setTitle('data');

        $this->data['data'] = Data::orderBy('created_at', 'desc')->get();


        return view('admin.data.index', $this->data);
    }
}
