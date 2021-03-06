@extends('layouts.layout')
@section('content')
<header class="header-img" style="background:url({{$subMenu->photo_path}});background-size:cover;background-position: center;">
         <div class="container">
            <div class="row">
               <div class="col-sm-4">
                  <div class="headtitle">
                     <h1 class="title">{{$subMenu->nama}}</h1>
                  </div>
               </div>
            </div>
         </div>
      </header>
      @if($subMenu->konten != null)
      <section class="section-prospective2">
         <div class="container container-page-its">
            <div class="row">
               <div class="col-sm-12">
                  <div class="article">
                     <h1 class="title">
                        {{-- Penjelasan {{$subMenu->nama}}                         --}}
                     </h1>
                     <p>
                     <div class="vc_row wpb_row vc_row-fluid">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                           <div class="">
                              <div class="wpb_wrapper">
                                 <div class="wpb_text_column wpb_content_element " >
                                    <div class="wpb_wrapper">
                                       {!!html_entity_decode($subMenu->konten)!!}
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      @endif
      @if($subMenu->id == 'pengaduan-pungli-dan-gratifikasi')
            @include('subkonten.pengaduan')
      @elseif($subMenu->id == 'permohonan-informasi-dan-dokumentasi')
            @include('subkonten.permohonanInfo')
      @elseif($subMenu->id == 'pengajuan-keberatan')
            @include('subkonten.pengajuanKeberatan')
      @elseif($subMenu->id == 'permohonan-penyelesaian-sengketa-ke-komisi-informasi')
            @include('subkonten.sengketa')
      @elseif($subMenu->id == 'pengaduan-penyalahgunaan-wewenang')
            @include('subkonten.wewenang')
      @endif
@endsection
@section('js')
<script>
      @if ($errors->gagalTambah->any() || session('errormsg'))
      swal({
        title: "Error!",
        text: $('#errormsg').html(),
        
      });
      @endif
      @if (session('status'))
          swal("Sukses!", "Pengajuan pertanyaan Anda akan segera kami proses!", "success")
      @endif
      $("#sent").submit(function( event ) {
        // swal("Loading","done","success");
        swal('Pengajuan pertanyaan')
        swal.showLoading()
      });
</script>
@endsection