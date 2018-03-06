<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menus;
use App\SubMenus;
use Uuid;

class MenusController extends Controller
{
	public function adminIndex(Request $request)
	{
        $this->setActive('menu');
        $this->setTitle('menu');
        $this->data['menus'] = Menus::get(); 
		return view('admin.menus.index', $this->data);
	}

    public function menusIndex(Menus $menu)
    {
        $this->setActive('menu');
        $this->setTitle('menu');
        $this->data['menu'] = $menu;
        // dd($menu->subMenus);
        return view('konten.index', $this->data);
    }

    public function submenusIndex(Menus $menu, SubMenus $subMenu)
    {
        $this->setActive('menu');
        $this->setTitle('menu');
        $this->data['menu'] = $menu;
        $this->data['subMenu'] = $subMenu;
        // dd($menu->subMenus);
        return view('subkonten.index', $this->data);
    }

    public function add(Request $request)
    {
    	$menu = New Menus;
    	$menu->id = str_slug($request->nama, '-');
        $menu->nama = $request->nama;
    	$menu->save();

    	return back()->with('sukses', 'Berhasil menambahkan menu');
    }

    public function delete(Request $request)
    {
        SubMenus::where('menu_id', $request->id)->delete();
        Menus::where('id', $request->id)->delete();

        return back()->with('status', 'Menu dan Submenunya Berhasil Dihapus!');
    }

    public function update(Menus $menu, Request $request)
    {
        $old_id = $menu->id;
        $menu->id = str_slug($request->nama, '-');
        $menu->nama = $request->nama;
        $menu->photo_path = $request->photo_path;
    	$menu->konten = $request->konten;
    	$menu->save();

        SubMenus::where('menu_id', $old_id)->update(['menu_id' => $menu->id]);

    	return redirect()->route('admin.menu.subMenu.index', ['menu' => $menu->id])->with('sukses', 'Berhasil update menu');
    }

    public function adminSubMenusIndex(Menus $menu)
    {
        $this->setActive('menu');
        $this->setTitle('menu');
        $this->data['menu'] = $menu;
        return view('admin.menus.subMenu.index', $this->data);
    }
}
