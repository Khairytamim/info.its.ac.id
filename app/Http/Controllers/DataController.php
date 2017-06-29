<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    protected $table = 'data';
    protected $primaryKey = 'id_data';
    public $timestamps = true;
    public $incrementing = false;

    public function laporan()
    {
        return view('laporan.index');
    }

    public function search()
    {
        return view('laporan.hasil');
    }
}
