@extends('layouts.adminlayout')

@section('content')
	<div class="row">
      <div class="col-md-12">
        {!! Breadcrumbs::render('menu', $menu) !!}
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
              <h3 class="box-title">Detail Menu</h3>
              {{-- <div class="pull-right"> --}}

                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalFile"><span class="fa fa-plus"></span> Menus</button> --}}
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalURL"><span class="fa fa-plus"></span> URL</button> --}}
                
              {{-- </div> --}}
            </div>
            <div class="box-body">
              <form action="{{route('admin.menu.update', ['menu' => $menu->id])}}" method="POST">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-6">
                        {{-- <div class="form-group">
                          <label for="exampleInputEmail1">Menu</label>
                          <p>{{$subMenu->menu->nama}}</p>
                        </div> --}}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama</label>
                          <input class="form-control"  placeholder="Enter name" name="nama" value="{{$menu->nama}}" type="text">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Input Banner Photo (Link)</label>
                          <input class="form-control"  placeholder="Enter link" name="photo_path" value="{{$menu->photo_path}}" type="text">
                        </div>                        
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Konten</label>
                      <textarea name="konten" class="form-control tes" rows="20" placeholder="Enter ...">{{$menu->konten}}</textarea>
                    </div>
                  </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>{{csrf_field()}}</form>
            </div>
          </div>
         
        </div>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Sub Menu</h3>
              <div class="pull-right">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalFile"><span class="fa fa-plus"></span>Tambah Sub Menu</button>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalURL"><span class="fa fa-plus"></span> URL</button> --}}
                
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      {{-- <th>path</th> --}}
                      <th>Path</th>
                      <th>Nama</th>
                      <th>Detail</th>
                      <th>Hapus</th>
                      {{-- <th>Role</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($menu->subMenus as $subMenu)
                    <tr>
                      <td>{{$subMenu->id}}</td>
                      <td id="copytarget">{{$subMenu->nama}}</td>
                      <td>
                        <a href="{{route('admin.subMenu.index', ['menu' => $subMenu->id])}}" class="btn btn-primary">Detail {{$subMenu->nama}}</a>
                      </td>
                      <td>
                        <a data-toggle="modal" data-id="{{$subMenu->id}}" data-target="#delete" class="tomboldelete btn btn-danger">Hapus {{$subMenu->nama}}</a>
                      </td>
                    </tr>
                    @endforeach
                    
                    
                  </tbody>
                </table>
              </div>
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
              <form action="{{route('admin.subMenu.add', ['menu' => $menu->id])}}" method="post" enctype="multipart/form-data">
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
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form action="{{route('admin.subMenu.delete')}}" method="POST">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            
          </div>
          <div class="modal-body">
            <div id="delmsg"></div> 
            <input type="hidden" id="id" name="id" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Iya</button>
            {{csrf_field()}}
          </div>
        </form>
        </div>
      </div>
    </div>
@endsection

@section('js')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=f3sg1vumz2lxhu0dnsl5siku8l31huewo0t2lgn6rkrjab8k"></script>
<script>
  tinymce.init({
    selector: 'textarea.tes',
    height: 400,
    theme: 'modern',
    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
    image_advtab: true,
    templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
    ],
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ],
    setup: function (editor) {
      editor.addButton('ea', {
        text: 'My button',
        icon: false,
        onclick: function () {
          editor.insertContent('&nbsp;<b>It\'s my button!</b>&nbsp;');
        }
      });
    }
  });
</script>
<script type="text/javascript">
  $(function () {
    $(document).ready(function() {
      $('.tomboldelete').on('click', function(){
        $('#id').val($(this).data('id'));
        var tr = $(this).closest('tr');
        var msg = '';
        $('#copytarget').each(function(index){
            msg = msg + ' ' +tr.find('td').eq(index).html();
          });
        $('#delmsg').html('Apakah anda yakin ingin menghapus<b>' + msg + '</b>?');

      });
    });
  });
</script>
@endsection