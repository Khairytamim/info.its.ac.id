@extends('layouts.adminlayout')
@section('gaya')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('content')
	<div class="row">
      <div class="col-md-12">
        {{-- {!! Breadcrumbs::render('banner', $banner) !!} --}}
      </div>
        <div class="col-md-12">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          @if ($errors->gagalTambah->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->gagalTambah->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
        </div>
        <div class="col-md-12">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Banner</h3>
              {{-- <div class="pull-right"> --}}

                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalFile"><span class="fa fa-plus"></span> banners</button> --}}
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalURL"><span class="fa fa-plus"></span> URL</button> --}}
                
              {{-- </div> --}}
            </div>
            <div class="box-body">
              <form action="{{route('admin.banner.update', ['banner' => $banner->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-12">
                        {{-- <div class="form-group">
                          <label for="exampleInputEmail1">banner</label>
                          <p>{{$subbanner->banner->nama}}</p>
                        </div> --}}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Judul Banner</label>
                          <input class="form-control"  placeholder="Enter name" name="header" value="{{$banner->header}}" type="text">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Sub-Judul Banner</label>
                          <input class="form-control"  placeholder="Enter name" name="sub_header" value="{{$banner->sub_header}}" type="text">
                        </div> 
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Konten</label>
                          <textarea name="content" class="form-control" rows="5" placeholder="Enter ...">{{$banner->content}}</textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Update Foto</label>
                          <input id="input-b1" name="path_photo" type="file" >
                        </div>
                      </div>
                    </div>
                  </div>              
                  <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 2vh">
                            <label for="input-b1">Foto</label>
                            @if(isset($banner->path_photo))
                            <img class="img-responsive" src="{{url($banner->path_photo)}}" style="width: 100%">
                            @endif
                        </div>
                    </div>                       
                  </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>{{csrf_field()}}</form>
            </div>
          </div>
         
        </div>
        
        <!-- /.box-footer-->
    </div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<script type="text/javascript">
$(document).ready(function (){
    $("#input-b1").fileinput({
        // allowedFileExtensions : ['jpg', 'png'],
        showUpload: false
    });

}) ;
</script>
@endsection