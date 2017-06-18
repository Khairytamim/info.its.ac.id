@extends('layouts.layout')

@section('content')
<div class="content" id="content">
    <div class="title m-b-md" style="margin: 2vw">
        Informasi Publik ITS
    </div>

    <div class="links">
        <a class="fade" href="{{ route('trending') }}">Trending</a>
        <a class="fade" href="{{ route('tanyakan') }}">Tanyakan</a>
        <a class="fade" href="#">Laporan</a>
        <a class="fade" href="{{ route('organisasi') }}">Organisasi</a>
    </div>
</div>
@endsection
@section('js')
<script>
	$( ".fade" ).click(function() {
	  $( "#content" ).fadeOut( "slow", function() {
	    // Animation complete.
	  });
	});
</script>
@endsection
