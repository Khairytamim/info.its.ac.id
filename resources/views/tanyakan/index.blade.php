@extends('layouts.layout')

@section('content')
<div class="top-left links">
    <a href="{{ url('/home') }}" style="padding: 0 5px">Informasi Publik ITS</a>
</div>
<div class="top-right links">
    <a href="{{ url('/home') }}" style="padding: 0 5px">Trending</a>
    <a href="{{ url('/login') }}" style="padding: 0 5px">Tanyakan</a>
    <a href="{{ url('/register')}}" style="padding: 0 5px" >Laporan</a>
</div>
<div class="container">
<div class="row">
    <div class="content" style="margin: 0 20vw; padding-top: 5vh">
    <h2 style="font-size: 10vh">Form Pertanyaan</h2>
    @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    @endif
    <form action="{{ route('addtanyakan') }}" method="post">
    {{ csrf_field() }}
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
                <input type="number" class="form-control" name="kontak">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Pertanyaan</label>
                <textarea class="form-control" name="pertanyaan"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">TANYAKAN</button>
            </div>
    </form>
    </div>   
</div>
</div>
@endsection