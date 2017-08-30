@extends('layouts.adminlayout')



@section('content')
      <div class="row">
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
              <h3 class="box-title">Daftar User</h3>
              <div class="pull-right">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalFile"><span class="fa fa-plus"></span> File</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalURL"><span class="fa fa-plus"></span> URL</button>
                
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Path</th>
                      <th>Tipe</th>
                      <th>Pertanyaan</th>
                      {{-- <th>Role</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $value)
                      <tr>
                        <td>{{$value->id_data}}</td>
                        <td><a href="{{url($value->data)}}">{{url($value->data)}}</a></td>
                        <td>{{$value->tipe}}</td>
                        <td>
                          @if($value->id_jawaban)
                            <a href="{{route('readmail').'?mail_id='. $value->jawaban->id_pertanyaan}}">{{$value->jawaban->id_pertanyaan}}</a>
                          @endif
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
      <!-- modal -->
      <div class="modal fade" id="myModalFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">File</h4>
            </div>
            <div class="modal-body">
              <form action="{{route('addfile')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputFile">Upload File</label>
                  <input type="file" name="file" id="exampleInputFile">
                  <p class="help-block"><i>Upload file yang diinginkan</i></p>
                </div>
                <div class="form-group">
                  {{-- <label for="exampleInputFile">Upload File</label> --}}
                  <label class="radio-inline">
                    <input type="radio" name="tipe" id="inlineRadio1" value="Publik" required> Publik
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="tipe" id="inlineRadio2" value="Kondisional"> Kondisional
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="tipe" id="inlineRadio3" value="Rahasia"> Rahasia
                  </label>
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
      <div class="modal fade" id="myModalURL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="{{route('addURL')}}" method="post" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">File</h4>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label>URL</label>
                    <input class="form-control" type="text" name="url">
                    
                  </div>
                  <div class="form-group">
                    {{-- <label for="exampleInputFile">Upload File</label> --}}
                    <label class="radio-inline">
                      <input type="radio" name="tipe" id="inlineRadio1" value="Publik" required> Publik
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="tipe" id="inlineRadio2" value="Kondisional"> Kondisional
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="tipe" id="inlineRadio3" value="Rahasia"> Rahasia
                    </label>
                  </div>
                  {{csrf_field()}}


                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
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
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>




@endsection

      
