<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Curl;
use App\Data;
use Uuid;
use Storage;
use File;


class DataController extends Controller
{
   
    public function laporan()
    {

        return view('laporan.index');
    }

    public function search(Request $request)
    {
        // echo 'http://127.0.0.1:8983/solr/info/select?indent=on&q='.urlencode($request->cari).'&wt=json';
        // exit();
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
    public function addFile(Request $request)
    {
        $value = $request->file;

        if($value){
            
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

            if($request->tipe == 'Publik'){
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
            // $photo->id_jawaban = $id;
            $photo->tipe = "file";
            $photo->save();


            
        }
        return back()->with('status', 'Sukses');
    }


    public function addurl(Request $request)
    {
        $link = $request->url;

        $photo = new Data;
        $iddata = UUID::generate(4);
        $photo->id_data = $iddata;
        $photo->data = $link;
        // $photo->id_jawaban = $id;
        if($request->tipe == 'Publik'){
            $exec = '$HOME/solr-6.6.0/bin/post -c info '.$link.' -recursive 0 -delay 1 -params "literal.tipe=url&literal.url_asli=' . urlencode($link) . '" 2>&1';
            // dd($exec);
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

        return back()->with('status', 'Sukses!');
    }

    public function delete(Request $request)
    {
        $data = Data::find($request->id);

        if($data->tipe == 'file'){

            $path = urlencode(public_path() . '/' . $data->data);
            $response = Curl::to('http://localhost:8983/solr/info/update?stream.body=<delete><query>id:"'. $path .'"</query></delete>&commit=true')->returnResponseObject()->get();
        }
        else{
            $path = $data->data;
            $response = Curl::to('http://localhost:8983/solr/info/update?stream.body=<delete><query>url_asli:"'. $path .'"</query></delete>&commit=true')->returnResponseObject()->get();
        }

        $data->delete();

        return back()->with('status', 'Sukses!');
    }


}
