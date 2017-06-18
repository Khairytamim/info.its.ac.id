<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    protected $table = 'data';
    protected $primaryKey = 'id_data';
    public $timestamps = true;
    public $incrementing = false;
}
