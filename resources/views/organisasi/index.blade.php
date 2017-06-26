@extends('layouts.layout')
@section('content')
<div class="top-left links">
    <a href="{{ url('/') }}" style="padding: 0 5px; display: block;width: 6vw;">Informasi Publik ITS</a>
</div>
<div class="top-right links">
    <a href="{{ route('tanyakan') }}" style="padding: 5px">Tanyakan</a>
    <a href="#" style="padding: 5px">Laporan</a>
</div>
<div class="container" style="padding-top: 15vh">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-sm-12 col-md-5" align="right">
				<h1>Koordinator PPID</h1>
			</div>
			<div class="col-sm-12 col-md-6">
				{{-- <img src="https://pbs.twimg.com/profile_images/378800000832652291/ab3c18c832dab4c08104f0a9b337a34b.jpeg" width="100%" height="100%"> --}}
			</div>
		</div>
		<div class="col-xs-12">
			<div class="col-sm-12 col-md-5" align="right">
				<h1>PPID Kementrian</h1>
			</div>
			<div class="col-sm-12 col-md-6">
				{{-- <img src="https://pbs.twimg.com/profile_images/378800000832652291/ab3c18c832dab4c08104f0a9b337a34b.jpeg" width="100%" height="100%"> --}}
			</div>
		</div>
		<div class="col-xs-12">
			<div class="col-sm-12 col-md-5" align="right">
				<h1>PPID ITS</h1>
			</div>
			<div class="col-sm-12 col-md-6">
				{{-- <img src="https://pbs.twimg.com/profile_images/378800000832652291/ab3c18c832dab4c08104f0a9b337a34b.jpeg" width="100%" height="100%"> --}}
			</div>
		</div>
	</div>
</div>
@endsection