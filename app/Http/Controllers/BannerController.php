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

    public function add(Request $request)
    {
    	$banner = New Banner;
    	$banner->id = str_slug($request->nama, '-');
        $banner->header = $request->nama;
    	$banner->save();

    	return back()->with('sukses', 'Berhasil menambahkan banner');
    }

    public function delete(Request $request)
    {
        
        Banner::where('id', $request->id_banner)->delete();

        return back()->with('status', 'Banner Berhasil Dihapus!');
    }


    public function update(Banner $banner, Request $request)
    {
        // dd('a');
        $rules = [
            'header' => 'required',
            'sub_header' => 'required',
            'content' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // dd('a');
            return back()
                        ->withErrors($validator, 'gagalTambah')
                        ->withInput();
        }
        $banner->header = $request->header;
        $banner->sub_header = $request->sub_header;
        $banner->content = $request->content;

        // dd($banner);
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
            $banner->save();
            return back()->with('status', 'Data Gagal diupload');
        }
        // dd($banner);
        // dd('a');
        $banner->save();

        return back()->with('status', 'Berhasil update banner');
    }

}
