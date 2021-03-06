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
	                <input type="text" class="form-control input-lg" name="cari" />
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
		<div class="col-sm-10 col-sm-offset-1" style="margin-top: 2vh">
	      <p style="color: gray">About {{$results->response->numFound}} results  </p>
	    </div>
	 
	    @foreach($results->response->docs as $data)
	      <div class="col-sm-10 col-sm-offset-1" style="margin-bottom: 3vh">
	        <?php $array = explode('/', $data->id); ?>
	        @if($data->tipe == 'url')
	          <a href="{{$data->id}}" target="_blank" style="font-weight: bolder; color: #1a0dab; font-size: 18px">{{end($array)}}</a>
	          <p style="color: #006621; font-size: 14px; margin: 0">{{$data->id}}</p>
	        @else
	          <a href="{{url($data->filename)}}" target="_blank" style="font-weight: bolder; color: #1a0dab; font-size: 18px">{{end($array)}}</a>
	          <p style="color: #006621; font-size: 14px; margin: 0">{{url($data->filename)}}</p>
	        @endif
	        {{-- <span style="font-size: small;">The script depends on bootstrap-modal-fullscreen , bootstrap-modal-local and ... and .force-fullscreen (to place header and footer away) to the modal box.</span> --}}
	      </div>
	    @endforeach
    
	</div>
</div>
</div>
@endsection