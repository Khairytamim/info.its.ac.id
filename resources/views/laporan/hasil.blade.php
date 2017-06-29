@extends('layouts.layout')
@section('content')
<style type="text/css">
	#custom-search-input{
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
    margin: 0 10vw;
	}

	#custom-search-input input{
	    border: 0;
	    box-shadow: none;
	}

	#custom-search-input button{
	    margin: 2px 0 0 0;
	    background: none;
	    box-shadow: none;
	    border: 0;
	    color: #666666;
	    padding: 0 8px 0 10px;
	    border-left: solid 1px #ccc;
	}

	#custom-search-input button:hover{
	    border: 0;
	    box-shadow: none;
	    border-left: solid 1px #ccc;
	}

	#custom-search-input .glyphicon-search{
	    font-size: 23px;
	}
</style>
<div class="top-left links">
    <a href="{{ url('/') }}" style="padding: 0 5px; display: block;width: 6vw;">Informasi Publik ITS</a>
</div>
<div class="top-right links">
    <a href="{{ route('tanyakan') }}" style="padding: 5px">Tanyakan</a>
    <a href="#" style="padding: 5px">Organisasi</a>
</div>
<div class="container" style="padding-top: 15vh; padding-bottom: 15vh">
	<div class="content">
        <div class="row">
    		<h2>Informasi Publik ITS</h2>
            <div id="custom-search-input">
	        	<form action="{{ route('searchlaporan') }}" method="post">
	                <div class="input-group col-md-12">
	                    <input type="text" class="form-control input-lg" placeholder="Ranking ITS" />
	                    <span class="input-group-btn">
	                        <button class="btn btn-info btn-lg" type="button">Cari</button>
	                    </span>
	                </div>
	        	</form>
            </div>
        </div>
		<div class="row" style="border-bottom: solid 1px #ccc;">
			<div >
				<div class="col-md-12">
					<h3>Judul Data / Isi Data</h3>
				</div>
				<div class="col-md-12">
					<p>Link Data</p>
				</div>
			</div>
		</div>
		<div class="row" style="border-bottom: solid 1px #ccc;">
			<div >
				<div class="col-md-12">
					<h3>Judul Data / Isi Data</h3>
				</div>
				<div class="col-md-12">
					<p>Link Data</p>
				</div>
			</div>
		</div>
		<div class="row" style="border-bottom: solid 1px #ccc;">
			<div >
				<div class="col-md-12">
					<h3>Judul Data / Isi Data</h3>
				</div>
				<div class="col-md-12">
					<p>Link Data</p>
				</div>
			</div>
		</div>
		<div class="row" style="border-bottom: solid 1px #ccc;">
			<div >
				<div class="col-md-12">
					<h3>Judul Data / Isi Data</h3>
				</div>
				<div class="col-md-12">
					<p>Link Data</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection