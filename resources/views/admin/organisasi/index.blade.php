@extends('layouts.adminlayout')



@section('content')
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add About</h3>
            </div>
            <div class="box-body">
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
              <form action="{{route('updateorganisasi')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label>Visi</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="visi" id="visi"></textarea>
              </div>
              <!-- <div class="form-group">
                  <label>Date</label>
                  <input type="text" class="form-control" name="enddate" placeholder="Enter date">
              </div> -->
              <div class="form-group">
                  <label>Misi</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="misi" id="misi"></textarea>
              </div>

              <div class="form-group">
                  <label for="exampleInputFile">Organigram</label>
                  <input type="file" id="files" name="photos" />
              </div>
              <!-- <div class="form-group">
                  <label for="exampleInputFile">Photos</label>
                  <input type="file" id="exampleInputFile">
              </div> -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        <!-- /.box-footer-->
          </div>
        </div>
        
        <!-- /.box-footer-->
          </div>
        
      

      
      <!-- /.row -->
      <!-- Main row -->


          <!-- /.box -->

       
        <!-- right col -->
      
      <!-- /.row (main row) -->

   


    
@endsection

@section('js')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=f3sg1vumz2lxhu0dnsl5siku8l31huewo0t2lgn6rkrjab8k"></script>
<script type="text/javascript">
  tinymce.init({
    selector: 'textarea#visi',
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
  tinymce.init({
    selector: 'textarea#misi',
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

      