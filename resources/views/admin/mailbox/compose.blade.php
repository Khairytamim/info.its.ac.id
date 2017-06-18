@extends('layouts.adminlayout')



@section('content')
      <div class="row">
        <div class="col-md-12">
          <!-- <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a> -->

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              
            </div>
            <div class="box-body">
              <form action="{{route('compose')}}" method="post">
             <textarea name="ea"></textarea>
             {{csrf_field()}}
             <button type="submit">ea</button>
             </form>
            <!-- /.box-body -->
          </div>
          
      </div>
       
   


    
@endsection

@section('js')



<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=f3sg1vumz2lxhu0dnsl5siku8l31huewo0t2lgn6rkrjab8k"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    height: 500,
    theme: 'modern',
    plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ea',
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


