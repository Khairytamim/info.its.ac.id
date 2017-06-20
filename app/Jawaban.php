<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    protected $primaryKey = 'id_jawaban';
    public $timestamps = true;
    public $incrementing = false;

    public function data()
    {
    	return $this->hasMany('App\Data', 'id_jawaban');
    }

    public function pertanyaan()
    {
    	return $this->hasOne('App\Pertanyaan', 'id_jawaban');
    }
}
