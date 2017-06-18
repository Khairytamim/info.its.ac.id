<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    protected $primaryKey = 'id_jawaban';
    public $timestamps = true;
    public $incrementing = false;
}
