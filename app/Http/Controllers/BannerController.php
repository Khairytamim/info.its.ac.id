<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Uuid;

class BannerController extends Controller
{
	public function adminIndex(Request $request)
	{
        $this->setActive('menu');
        $this->setTitle('menu');
        $this->data['Banner'] = Banner::get(); 
		return view('admin.Banner.index', $this->data);
	}

    public function BannerIndex(Banner $menu)
    {
        $this->setActive('menu');
        $this->setTitle('menu');
        $this->data['menu'] = $menu;
        // dd($menu->subBanner);
        return view('konten.index', $this->data);
    }

    public function add(Request $request)
    {
    	$menu = New Banner;
    	$menu->id = str_slug($request->nama, '-');
        $menu->nama = $request->nama;
    	$menu->save();

    	return back()->with('sukses', 'Berhasil menambahkan menu');
    }

    public function destroy(Banner $menu)
    {
    	$menu->delete();
    	return back()->with('sukses', 'Berhasil menghapus menu');
    }

    public function update(Banner $menu, Request $request)
    {
        $menu->konten = $request->konten;
        $menu->photo_path = $request->photo_path;
    	$menu->konten = $request->konten;
    	$menu->save();
    	return back()->with('sukses', 'Berhasil update menu');
    }

}
