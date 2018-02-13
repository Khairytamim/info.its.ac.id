<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubMenus;
use App\Menus;

class SubMenusController extends Controller
{
    public function adminIndex(SubMenus $subMenu)
    {
    	$this->setActive('menu');
        $this->setTitle('menu');
    	$this->data['subMenu'] = $subMenu;
    	return view('admin.menus.subMenu.update', $this->data);
    }

    public function update(subMenus $subMenu, Request $request)
    {

    	// $subMenu = $request->konten;
    	$subMenu->konten = $request->konten;
        $subMenu->nama = $request->nama;
        $subMenu->photo_path = $request->photo_path;
    	$subMenu->save();
    	return back()->with('sukses', 'Berhasil update menu');
    }

    public function add(Menus $menu, Request $request)
    {
    	$subMenu = new SubMenus;
    	$subMenu->id = str_slug($request->nama, '-');
        $subMenu->nama = $request->nama;
        $subMenu->menu_id = $menu->id;
        $subMenu->save();
    	
    	return back()->with('sukses', 'Berhasil menambahkan sub menu');
    }

    public function delete(Request $request)
    {
        SubMenus::where('id', $request->id)->delete();

        return back()->with('status', 'Submenu Berhasil Dihapus!');
    }
}
