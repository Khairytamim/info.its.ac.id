<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $primaryKey = 'id_pertanyaan';
    public $timestamps = true;
    public $incrementing = false;


    public function jawaban()
    {
    	return $this->hasOne('App\Jawaban', 'id_pertanyaan');
    }

    public function data()
    {
    	return $this->hasMany('App\Data', 'id_pertanyaan');
    }
}
