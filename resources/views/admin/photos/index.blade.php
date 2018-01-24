@extends('layouts.adminlayout')

@section('gaya')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Galeri Foto</div>
            <div class="panel-body">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->gagalTambah->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->gagalTambah->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">
                                  {!! session('status') !!}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{route('storePhoto')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="input-b1">Upload Foto</label>
                                </div>
                                <div class="col-md-12">
                                    <input id="input-b1" name="photos" type="file" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Daftar Foto</label>
                            </div>
                            @foreach ($fotos as $foto)
                            {{-- @if()
                            @else --}}
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" href="{{url($foto->path)}}" target="blank_" style="height: 35vh; width: 35vh;"onerror="this.onerror=null;this.src='https://pbs.twimg.com/profile_images/422812562791464960/odxbCyfy_400x400.jpeg';" >
                                    <img class="img-responsive" src="{{url($foto->path)}}" style="object-fit: cover; height: 100%">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12">
                        {{ $fotos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<script type="text/javascript">
$(document).ready(function (){
    $("#input-b1").fileinput({
        // allowedFileExtensions : ['jpg', 'png'],
        showUpload: false
    });

}) ;

    
  

</script>
@endsection

