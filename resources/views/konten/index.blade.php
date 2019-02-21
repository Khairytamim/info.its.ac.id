@extends('layouts.layout')
@section('content')
<header class="header-img" style="background:url({{$menu->photo_path}});background-size:cover;background-position: center;">
 <div class="container">
    <div class="row">
       <div class="col-sm-4">
          <div class="headtitle">
             {{-- <h1 class="title">{{$menu->nama}}</h1> --}}
          </div>
       </div>
    </div>
 </div>
</header>
<div class="container container-page-its" style="padding-left: 0; padding-right: 0; padding-top: 30px">
 <section class="vc_section vc_custom_1504082602155">
    <div class="vc_row wpb_row vc_row-fluid">
    	@if(count($menu->subMenus) > 0)
       <div class="col-left-padding-50 wpb_column column_container col-md-8" style="padding-left: 0">
          <div class="vc_column-inner ">
             <div class="wpb_wrapper">
                <div class="path-group ">
                   <div class="path">
                      <h3 class="title" style="padding-left: 15px; padding-right: 15px; margin-top: 0">{{$menu->nama}}</h3>
                      <div class="row">
                      	@foreach($menu->subMenus->sortBy('created_at') as $subMenus)
                         <div class="col-md-6">
                            <ul>
                               <li style="padding-left: 15px; padding-right: 15px"><a href={{route('submenu.index', ['menu' => $menu->id, 'subMenu' => $subMenus->id])}} target=" _blank" style="font-size: 16px; font-weight: bolder;">{{str_limit($subMenus->nama, 25, '...')}}<i class="fa fa-chevron-circle-right" aria-hidden="true" style="margin-left: 10px; float: right;"></i></a></li>
                            </ul>
                         </div>
                        @endforeach
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       @endif
       <div class="col-right-padding-50 wpb_column column_container 
       @if(count($menu->subMenus) > 0)col-md-4 @else col-md-10 col-md-offset-1 @endif" style="padding-right: 0; padding-left: 0">
          <div class="vc_column-inner ">
             <div class="wpb_wrapper">
                @if(count($menu->subMenus) == 0)
                <div class="path-group">
                  <div class="path">
                    <h3 class="title" style="padding-left: 15px; padding-right: 15px; margin-top: 0">{{$menu->nama}}</h3>
                  </div>
                </div>
                @endif
                <div class="box-form-program">
                   {{-- <h3 class="title">Tahukah Kamu?</h3> --}}
                   {!!html_entity_decode($menu->konten)!!}
                </div>
                {{-- <div class="box-carousel ">
                   <div class="item">
                      <img class="lazy lazy-hidden" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-lazy-type="image" data-lazy-src="https://www.its.ac.id/wp-content/uploads/2017/08/pic_bem-its-1024x683.jpg"/>
                      <noscript><img src="https://www.its.ac.id/wp-content/uploads/2017/08/pic_bem-its-1024x683.jpg"/></noscript>
                      <p><a href="#"  target="">Kegiatan Gerigi Mahasiswa Baru ITS</a></p>
                   </div>
                   <div class="item">
                      <img class="lazy lazy-hidden" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-lazy-type="image" data-lazy-src="https://www.its.ac.id/wp-content/uploads/2017/08/video-pasca-sarjana-its.jpg"/>
                      <noscript><img src="https://www.its.ac.id/wp-content/uploads/2017/08/video-pasca-sarjana-its.jpg"/></noscript>
                      <p><a href="https://youtu.be/_6POoRX3oxI"  target=" _blank">Video Profil Mahasiswa Pascasarjana ITS</a></p>
                   </div>
                   <div class="item">
                      <img class="lazy lazy-hidden" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-lazy-type="image" data-lazy-src="https://www.its.ac.id/wp-content/uploads/2017/08/video-fak-vokasi-its.jpg"/>
                      <noscript><img src="https://www.its.ac.id/wp-content/uploads/2017/08/video-fak-vokasi-its.jpg"/></noscript>
                      <p><a href="https://youtu.be/WsYBEigLIm4"  target=" _blank">Hardiknas 2017: Profil Fakultas Vokasi ITS</a></p>
                   </div>
                </div>
                <div  class="box-event ">
                   <h3 class="title">ACARA MENDATANG</h3>
                   <ul>
                      <li><strong>29</strong><a href="https://www.its.ac.id/agenda/international-guest-lecture-nanomaterial/" title="International Guest Lecture on Nanomaterial">International Guest Lecture on Nanomaterial</a></li>
                      <li><strong>18</strong><a href="https://www.its.ac.id/agenda/international-seminar-chemistry-2018/" title="International Seminar on Chemistry 2018">International Seminar on Chemistry 2018</a></li>
                      <li><strong>30</strong><a href="https://www.its.ac.id/agenda/implementation-science-halal-testing-purposes-dna-protein-based-methods/" title="Implementation of Science for Halal Testing Purposes by DNA and Protein-Based Methods">Implementation of Science for Halal Testing Purposes by DNA and Protein-Based Methods</a></li>
                   </ul>
                   <div class="clear" style="clear:both;"></div>
                   <div class="read-more"><a href="https://www.its.ac.id/agenda_categories/agenda/">Selengkapnya</a></div>
                </div>
                <div class="box-help ">
                   <h3 class="title">Dukung kami!</h3>
                   <p>Silakan klik tautan di bawah untuk mendukung.
                   <div class="btn-help">
                      <a href="#">
                      Dukung!
                      </a>
                   </div>
                </div> --}}
             </div>
          </div>
       </div>
    </div>
 </section>
</div>
@endsection