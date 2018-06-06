<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $table = 'menus';
	public $incrementing = false;

	public function subMenus()
	{
		return $this->hasMany('App\SubMenus', 'menu_id');
	}
}
