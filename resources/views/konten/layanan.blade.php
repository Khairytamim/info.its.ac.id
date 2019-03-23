@extends('layouts.layout')
@section('content')
<header class="header-img" style="background:url({{$menu->photo_path}});background-size:cover;background-position: center;">
 <div class="container">
    <div class="row">
       <div class="col-sm-4">
          <div class="headtitle">
             {{-- <h1 class="title">{{$menu->nama}}</h1> --}}
          </div>
       </div>
    </div>
 </div>
</header>
<div class="container container-page-its" style="padding-left: 0; padding-right: 0; padding-top: 30px">
 <section class="vc_section vc_custom_1504082602155">
    <div class="vc_row wpb_row vc_row-fluid">
    	@if(count($menu->subMenus) > 0)
       <div class="col-left-padding-50 wpb_column column_container col-md-4" style="padding-left: 0">
          <div class="vc_column-inner ">
             <div class="wpb_wrapper">
                <div class="path-group ">
                   <div class="path wow fadeInLeft" data-wow-delay="0.4s" >
                      <h3 class="title" style="padding-left: 15px; padding-right: 15px; margin-top: 0">{{$menu->nama}}</h3>
                      <div class="row">
                      	@foreach($menu->subMenus->sortBy('created_at') as $subMenus)
                         <div class="col-md-12">
                            <section style="padding-left: 15px; padding-right: 15px" class="test">
                                <input type="radio" name="radio" id="radio{{$loop->iteration}}" class="radio"/>
                                <label for="radio{{$loop->iteration}}">{{str_limit($subMenus->nama, 500, '...')}}<i class="fa fa-chevron-circle-right" aria-hidden="true" style="margin-left: 10px; float: right;"></i></label>
                            </section>
                         </div>
                        @endforeach
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       @endif
       <div class="col-right-padding-50 wpb_column column_container col-md-8 form-content" id="radio1" style="padding-right: 0; padding-left: 0">
            <form id="sent" action="{{ route('addtanyakan') }}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="col-sm-12 col-md-12">
                   <div class="form-group">
                       <label>Nama</label>
                       <input type="text" class="form-control" name="nama" required>
                   </div>
                   <div class="form-group">
                       <label>Alamat Tempat Tinggal</label>
                       <textarea class="form-control" name="alamat" required></textarea>
                   </div>
                   <div class="form-group">
                       <label>Nomor Telp/Handphone</label>
                       <input type="tel" class="form-control" name="kontak" required>
                   </div>
                   <div class="form-group">
                       <label>Email</label>
                       <input type="email" class="form-control" name="email" required>
                   </div>
                       <div class="form-group">
                       <label>Identitas</label><br>
                       <label class="btn btn-primary" for="my-file-selector"><input id="my-file-selector" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val().replace(/C:\\fakepath\\/i, ''));" name="ktp" required>Upload KTP/SIM/PASPOR</label>
                       <span class='label label-info' id="upload-file-info"></span>
                       
                   </div>
                   <div class="form-group">
                       <label>Judul Pertanyaan</label>
                       <input type="text" class="form-control" name="judul" required>
                   </div>
                   <div class="form-group">
                       <label>Pertanyaan</label>
                       <textarea id="" rows="6" name="pertanyaan" class="form-control" required></textarea>
                   </div>
                   <div class="form-group pull-right">
                       <button type="submit" class="btn btn-primary" style="background-color: #ffcb10;border: none; color: #20417f">Submit Pertanyaan</button>
                   </div>
               </div>
           </form>
       </div>
    </div>
 </section>
</div>
@endsection