@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
<div class="content" id="content" style="background-color: white; opacity: 0.8">
    <div class="title m-b-md" id="title" style="margin: 2vw;border: 4px solid #20417f; color: black">
        Informasi Publik ITS
    </div>

    <div class="links" id="links">
        <a href="{{ route('tanyakan') }}">Tanyakan</a>
        <a href="#">Laporan</a>
        <a href="{{ url('organisasi') }}">Organisasi</a>
    </div>

    <div class="container" style="padding: 0 5vh">
        <h4 align="justify">Ini merupakan website dari Institut Teknologi Sepuluh Nopember yang membantu masyarakat luas apabila ada pertanyaan mengenai ITS yang belum terjawab.</h4>
    </div>
</div>
</div>
@endsection
@section('js')
@endsection
