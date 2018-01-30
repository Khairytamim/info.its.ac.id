@extends('layouts.layout')
@section('content')
<header class="header-img" style="background:url('https://www.its.ac.id/wp-content/uploads/2017/10/tekkim-d3.jpg');background-size:cover;background-position: center;">
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
      <section class="section-prospective2">
         <div class="container container-page-its">
            <div class="row">
               <div class="col-sm-12">
                  <div class="article">
                     <h1 class="title">
                        Penjelasan {{$subMenu->nama}}                        
                     </h1>
                     <p>
                     <div class="vc_row wpb_row vc_row-fluid">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                           <div class="vc_column-inner ">
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
@endsection