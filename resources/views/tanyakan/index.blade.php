@extends('layouts.layout')

@section('content')
<div class="top-left links">
    <a href="{{ url('/') }}" style="padding: 0 5px; display: block;width: 6vw;">Informasi Publik ITS</a>
</div>
<div class="top-right links">
    <a href="#" style="padding: 5px">Laporan</a>
    <a href="{{ url('organisasi') }}" style="padding: 5px">Organisasi</a>
</div>
<div class="container" style="margin-top: 15vh;margin-bottom: 15vh">
    <div class="content">
    <h2 style="font-size: 9vh">Form Pertanyaan</h2>
    @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    @endif
    <div class="row">
    <form action="{{ route('addtanyakan') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Alamat Tempat Tinggal</label>
                <textarea class="form-control" name="alamat"></textarea>
            </div>
            <div class="form-group">
                <label>Nomor Telp/Handphone</label>
                <input type="tel" class="form-control" name="kontak">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
             <div class="form-group">
                <label class="btn btn-primary" for="my-file-selector">
                    <input id="my-file-selector" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val().replace(/C:\\fakepath\\/i, ''));">Upload KTP/SIM/PASPOR
                </label>
                <span class='label label-info' id="upload-file-info"></span>
              
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="form-group">
                <label>Judul Pertanyaan</label>
                <input type="text" class="form-control" name="judul">
            </div>
            <div class="form-group">
                <label>Pertanyaan</label>
                <textarea id="" rows="6" name="pertanyaan" class="form-control" ></textarea>
            </div>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-primary">Submit Pertanyaan</button>
            </div>
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
    selector: 'textarea#compose-textarea',
    height: 200,
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

@endsection