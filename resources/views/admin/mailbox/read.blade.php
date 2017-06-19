@extends('layouts.adminlayout')


@section('gaya')
<style type="text/css">
  .pagination{
    display: block;
    margin: 0px;
  }
  .table > thead > tr > th,
  .table > tbody > tr > th,
  .table > tfoot > tr > th,
  .table > thead > tr > td,
  .table > tbody > tr > td,
  .table > tfoot > tr > td {
    padding: 8px;
    padding-left: 0px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
  }
</style>
@endsection
@section('content')

<div class="row">
  <div class="col-md-3">
    <!-- <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a> -->

    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Folders</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li class="" id="aktifdalemmailbox"><a href="{{route('mailbox')}}"><i class="fa fa-inbox"></i> Inbox</a></li>
          <li class="" id="aktifdalemsent"><a href="{{route('sent')}}"><i class="fa fa-envelope-o"></i> Sent</a></li>

        </ul>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /. box -->
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Labels</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
          <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
          <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Read Mail</h3>


          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="mailbox-read-info">
              <h3>{{$pertanyaan->judul_pertanyaan}}</h3>
              <h5>From: {{$pertanyaan->nama_penanya}}{{urldecode('%3C')}}{{$pertanyaan->email_penanya}}{{urldecode('%3E')}}
                <span class="mailbox-read-time pull-right">{{$pertanyaan->created_at}}</span></h5>
              </div>
              <!-- /.mailbox-read-info -->
                  <!-- <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                        <i class="fa fa-trash-o"></i></button>
                      <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                        <i class="fa fa-reply"></i></button>
                      <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                        <i class="fa fa-share"></i></button>
                    </div>
                    /.btn-group
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                      <i class="fa fa-print"></i></button>
                    </div> -->
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                      {{$pertanyaan->pertanyaan}}
                    </div>
                    <!-- /.mailbox-read-message -->
                  </div>
                  <!-- /.box-body -->

                  <!-- /.box-footer -->
                  <div class="box-footer">
                  <!-- <div class="pull-right">
                    <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                    <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                  </div> -->

                  <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                  <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                </div>
                <!-- /.box-footer -->
              </div>
            </div>
            <div class="col-md-12">

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Reply Message</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                  <form action="{{route('balas')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input class="form-control" placeholder="To:" disabled="" value="{{$pertanyaan->nama_penanya}}{{urldecode('%3C')}}{{$pertanyaan->email_penanya}}{{urldecode('%3E')}}">
                      <input type="hidden" name="email" value="{{$pertanyaan->email_penanya}}">
                      <input type="hidden" name="id_pertanyaan" value="{{$pertanyaan->id_pertanyaan}}">

                    </div>
                    <div class="form-group">
                      @if(!is_null($pertanyaan->id_jawaban))
                        <input class="form-control" name="judul_jawaban" placeholder="Subject:" value="Re: {{$pertanyaan->judul_pertanyaan}}" disabled="">
                      @else
                      <input class="form-control" name="judul_jawaban" placeholder="Subject:" value="Re: {{$pertanyaan->judul_pertanyaan}}">
                      @endif
                      <!-- <input class="form-control" name="judul_jawaban" placeholder="Subject:" value="Re: {{$pertanyaan->judul_pertanyaan}}"> -->
                    </div>
                    <div class="form-group">
                      @if(!is_null($pertanyaan->id_jawaban))
                        {!!html_entity_decode($pertanyaan->jawaban->jawaban)!!}
                      @else
                      <textarea id="compose-textarea" name="jawaban" class="form-control" >{{$pertanyaan->jawaban->jawaban}}
                      </textarea>
                      @endif
                    </div>

                    <button title="Tambah Data Pelamar" type="button" onclick="createRow()" class="btn btn-info">
                      <span class="fa fa-plus"></span>
                    </button>
                    <table class="table table-sriped tableganteng" id="tableToModify" >
                      <thead>
                        <tr><th class="col-md-6">Link</th>

                          <th>Action</th>

                        </tr></thead>
                        <tbody id="body">
                          @if(!is_null($pertanyaan->id_jawaban) && !old('link'))
                            @php $ea = $pertanyaan->jawaban->data; @endphp
                            @foreach($ea as $value)
                            <tr>
                              <td><input class="form-control" name="link[]" type="text" value='{{$value->data}}' disabled=""></td>

                              <td><button type="button" class="btn btn-danger tombol" title="Hapus Data Pelamar"><span class="fa fa-trash"></span></button></td>
                            </tr>
                            @endforeach
                         

                          @else
                          @for ($i = 0; $i < (count(old('link')) == 0 ? 1 : count(old('link'))); $i++)
                          <tr>

                            <td><input class="form-control" name="link[]" type="text" value='{{old("link.$i") }}' ></td>

                            <td><button type="button" class="btn btn-danger tombol" title="Hapus Data Pelamar"><span class="fa fa-trash"></span></button></td>
                          </tr>
                          @endfor

                          @endif
                        </tbody>

                      </table>
                      <div class="form-group">
                      <div class="btn btn-default btn-file">
                        <i class="fa fa-paperclip"></i> Upload file
                        <input type="file" name="data[]" multiple>
                      </div>
                      
                    </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      @if(!is_null($pertanyaan->id_jawaban))
                        
                      @else
                      <div class="pull-right">
                        <!-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> -->
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                        {{csrf_field()}}
                      </form>
                      </div>

                      <a href="{{route('mailbox')}}" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
                      @endif
                      
                    </div>
                  <!-- /.box-footer -->
                </div>

              </div>
            </div>
            <!-- /. box -->
          </div>
          <!-- /.col -->
        </div>




        @endsection

        @section('js')
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=f3sg1vumz2lxhu0dnsl5siku8l31huewo0t2lgn6rkrjab8k"></script>
        @if(is_null($pertanyaan->id_jawaban))
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
        @endif

        <script type="text/javascript">
          function createRow() {

            var body =document.getElementById('body');
        var row = document.createElement('tr'); // create row node
        var col1 = document.createElement('td'); 
        var col3 = document.createElement('td'); // create second column node

        // create column node
         // create second column node
         row.appendChild(col1);
         row.appendChild(col3);



        body.appendChild(row); // append second column to row
        
        col1.innerHTML = "<input class="+'form-control'+" name="+'link[]'+" type="+'text'+" value=>";
        col3.innerHTML = "<button type='button'  class='btn btn-danger tombol'><span class='fa fa-trash'></span></button>";
         // put data in first column

        var table = document.getElementById("tableToModify"); // find table to append to
        table.appendChild(body); // append row to table
      }
      $('#tableToModify tbody').on( 'click', '.tombol', function () {
       document.getElementById('tableToModify').deleteRow($(this).closest('td').parent()[0].sectionRowIndex+1)
     });
  //      $(function () {
  //   $('#aktifdalem{{$active}}').toggleClass('active');
  // });
    </script>
    @endsection


