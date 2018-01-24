<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMenus extends Model
{
    protected $table = 'submenus';
	public $incrementing = false;

	public function menu()
	{
		return $this->belongsTo('App\Menus', 'menu_id');
	}
}
