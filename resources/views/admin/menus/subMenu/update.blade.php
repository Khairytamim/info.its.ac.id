@extends('layouts.adminlayout')

@section('content')
	<div class="row">
        <div class="col-md-12">
          {!! Breadcrumbs::render('subMenu', $subMenu) !!}
        </div>
        <div class="col-md-12">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Sub Menu</h3>
              {{-- <div class="pull-right"> --}}

                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalFile"><span class="fa fa-plus"></span> Menus</button> --}}
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalURL"><span class="fa fa-plus"></span> URL</button> --}}
                
              {{-- </div> --}}
            </div>
            <div class="box-body">
              <form action="{{route('admin.subMenu.update', ['subMenu' => $subMenu->id])}}" method="POST">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Menu</label>
                          <p>{{$subMenu->menu->nama}}</p>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama</label>
                          <input class="form-control"  placeholder="Enter name" name="nama" value="{{$subMenu->nama}}" type="text">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Banner Photo</label>
                          <input class="form-control"  placeholder="Enter link" name="photo_path" value="{{$subMenu->photo_path}}" type="text">
                        </div>                        
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Textarea</label>
                      <textarea class="form-control" rows="10" placeholder="Enter ..."></textarea>
                    </div>
                  </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>{{csrf_field()}}</form>
            </div>
          </div>
         
        </div>
        
        
        <!-- /.box-footer-->
    </div>
    <div class="modal fade" id="myModalFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">File</h4>
            </div>
            <div class="modal-body">
              <form action="{{route('admin.subMenu.add', ['menu' => $subMenu->id])}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input class="form-control"  placeholder="Enter name" name="nama" type="text">
                </div>
                {{csrf_field()}}
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button></form>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('js')

@endsection