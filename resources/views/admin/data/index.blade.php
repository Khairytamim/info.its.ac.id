@extends('layouts.adminlayout')



@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar User</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Path</th>
                      <th>Tipe</th>
                      {{-- <th>Role</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $value)
                      <tr>
                        <td>{{$value->id_data}}</td>
                        <td>{{$value->data}}</td>
                        <td>{{$value->tipe}}</td>
                        {{-- <td>{{$user->hak}}</td> --}}
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

      
