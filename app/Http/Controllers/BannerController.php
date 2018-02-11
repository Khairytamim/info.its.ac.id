<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Validator;
use Storage;
use File;

class BannerController extends Controller
{
	public function adminIndex(Request $request)
	{
        $this->setActive('banner');
        $this->setTitle('banner');
        $this->data['banners'] = Banner::get(); 
		return view('admin.banner.index', $this->data);
	}

    public function detail(Banner $banner, Request $request)
    {
        $this->setActive('banner');
        $this->setTitle('banner');
        $this->data['banner'] = $banner;
        return view('admin.banner.detail', $this->data);
    }

    // public function BannerIndex(Banner $banner)
    // {
    //     $this->setActive('banner');
    //     $this->setTitle('banner');
    //     $this->data['banner'] = $banner;
    //     // dd($banner->subBanner);
    //     return view('konten.index', $this->data);
    // }

    public function add(Request $request)
    {
    	$banner = New Banner;
    	$banner->id = str_slug($request->nama, '-');
        $banner->header = $request->nama;
    	$banner->save();

    	return back()->with('sukses', 'Berhasil menambahkan banner');
    }

    public function destroy(Banner $banner)
    {
    	$banner->delete();
    	return back()->with('sukses', 'Berhasil menghapus banner');
    }

    public function update(Banner $banner, Request $request)
    {
        $rules = [
            'header' => 'required',
            'sub_header' => 'required',
            'content' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator, 'gagalTambah')
                        ->withInput();
        }
        $banner->header = $request->header;
        $banner->sub_header = $request->sub_header;
        $banner->content = $request->content;

        if($request->hasFile('path_photo')){
            
            $file = $request->path_photo;
            if ($file) {
                // dd(File::type($file));
                $filename = 'photos/' . $banner->id . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->put($filename, File::get($file));
                $banner->path_photo = "storage/$filename";
            }
        }
        else{
            return back()->with('gagal', 'Data Gagal diupload');
        }
        // dd($banner);
        $banner->save();

        return back()->with('sukses', 'Berhasil update banner');
    }

}
