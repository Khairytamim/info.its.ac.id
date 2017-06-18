<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    protected $table = 'organisasi';
    protected $primaryKey = 'id_organisasi';
    public $timestamps = false;
    public $incrementing = false;
}
