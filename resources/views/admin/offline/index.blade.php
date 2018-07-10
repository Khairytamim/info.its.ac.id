@extends('layouts.adminlayout')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Masukkan Layanan Baru</h3>
          <div class="pull-right">
                <label style="display: inline-block;"> Pilih Form : </label>
                <select style="display: inline-block;width: auto"  class="form-control" id="tahun">
                <option value="{{route('offline.create', ['form' => 'informasi'])}}" {{$form == 'informasi' ? 'selected' : ''}}>Informasi</option>
                <option value="{{route('offline.create', ['form' => 'gratifikasi'])}}" {{$form == 'gratifikasi' ? 'selected' : ''}}>Pengaduan Gratifikasi</option>
                <option value="{{route('offline.create', ['form' => 'keberatan'])}}" {{$form == 'keberatan' ? 'selected' : ''}}>Pengajuan Keberatan</option>
                </select>
          </div>
        </div>
        <div class="box-body">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          @if($form == 'informasi')
            @include('admin.offline.informasi')
          @elseif($form == 'gratifikasi')
            @include('admin.offline.gratifikasi')
          @elseif($form == 'keberatan')
            @include('admin.offline.keberatan')
          @else
            @include('admin.offline.informasi')
          @endif
        
        </div>
    </div>
    {{-- <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar User</h3>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->hak}}</td>
                  </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
    </div> --}}
    
    <!-- /.box-footer-->
      </div>
    
  

  
  <!-- /.row -->
  <!-- Main row -->


      <!-- /.box -->

   
    <!-- right col -->
  
  <!-- /.row (main row) -->

{{-- <div class="row">
    <div class="article-detail">
    <form id="sent" action="{{ route('addtanyakan') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-sm-12 col-md-4">
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
        </div>
        <div class="col-sm-12 col-md-8">
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
    </div> --}}
@endsection
@section('js')
<script>
        $(document).ready(function(){
            $('#tahun').on('change', function(){
                // console.log($(this).val());
                document.location.href=$(this).val()
            })
        })
    </script>
@endsection