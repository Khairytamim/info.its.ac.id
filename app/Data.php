<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';
    protected $primaryKey = 'id_data';
    public $timestamps = true;
    public $incrementing = false;

    public function jawaban()
    {
    	return $this->belongsTo('App\Jawaban', 'id_jawaban');
    }
}
