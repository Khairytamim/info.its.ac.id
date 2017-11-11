@extends('layouts.layout')
@section('content')
<style type="text/css">
	#custom-search-input{
	    padding: 3px;
	    border: solid 1px #E4E4E4;
	    border-radius: 3px;
	    background-color: #fff;
	    box-shadow: 0px 5px 5px lightgray;
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
<div class="section">
<div class="container" style="padding-top: 15vh; padding-bottom: 5vh">
	<div class="row" style="text-align: center;">
		<h2>Informasi Publik ITS</h2>
		<div class="col-sm-10 col-sm-offset-1">
	    <div id="custom-search-input">
	    	<form action="{{ route('searchlaporan') }}" method="get">
	            <div class="input-group col-md-12">
	                <input type="text" class="form-control input-lg" name="cari" placeholder="Ranking ITS" />
	                <span class="input-group-btn">
	                    <button class="btn btn-info btn-lg" type="button">Cari</button>
	                </span>
	            </div>
	    	</form>
	    </div>
	    </div>
	</div>
</div>
<div class="row" style=";background-color: white; border-top: 1px solid lightgrey">
	<div class="container">

	</div>
</div>
</div>
@endsection