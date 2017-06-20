@extends('layouts.layout')

@section('content')
<div class="content" id="content">
    <div class="title m-b-md" id="title" style="margin: 2vw">
        Informasi Publik ITS
    </div>

    <div class="links" id="links">
        <a href="{{ route('trending') }}">Trending</a>
        <a href="{{ route('tanyakan') }}">Tanyakan</a>
        <a href="#">Laporan</a>
        <a href="{{ url('organisasi/view') }}">Organisasi</a>
    </div>

    <div class="container" style="padding: 0 5vh">
        <h4 align="justify">Ini merupakan website dari Institut Teknologi Sepuluh Nopember yang membantu masyarakat luas apabila ada pertanyaan mengenai ITS yang belum terjawab.</h4>
    </div>
</div>
@endsection
@section('js')
@endsection
