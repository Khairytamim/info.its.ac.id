@extends('layouts.layout')

@section('content')
<section id="top">

    <div class="section_slider">
        <div id="carousel-example-generic" class="carousel slide caption-animate" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($i=0;$i<count($banner);$i++)
                @if($banner[$i]->path_photo!=null)
                <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class="@if($i==0) active @endif">
                    <hr class="transition-timer-carousel-progress-bar"">
                </li>
                @endif
                @endfor
            </ol>
            <div class="carousel-inner" role="listbox">
                @for($i=0;$i<count($banner);$i++)
                @if($banner[$i]->path_photo!=null)
                <div class="item full-screen  @if($i==0) active @endif" style="background-image: url('{{url($banner[$i]->path_photo)}}');">
                    <div class="carousel-caption">
                        <h3 class="animated visible fadeInUp" style="visibility: visible; ">{{$banner[$i]->header}} </h3>
                        <div class="clearfix"></div>
                        <h2 class="animated visible fadeInUp" style="visibility: visible;">{{$banner[$i]->sub_header}} </h2>
                        <div class="clearfix"></div>
                        {{-- <div class="content-carousel-caption animated visible fadeInUp" style="visibility: visible;">
                            <p>{{$banner[$i]->content}}</p>
                        </div> --}}
                    </div>
                </div>
                @endif
                @endfor
            </div>
        </div>
    </div>
    {{-- <div class="intro-header">
    <div class="content" id="content" style="height: 100vh">
        <div class="intro-message" id="title" >
        <h1 style="margin: 2vw; color: #20417f; text-shadow: none;">INFORMASI PUBLIK ITS</h1>

        <ul class="list-inline intro-social-buttons" style="margin-top: 10vh">
            <li>
                <a href="#cari" class="btn btn-primary" style="background-color: #ffcb10;border: none; color: #20417f"><span class="network-name">Informasi Umum</span></a>
            </li>
            <li>
                <a href="#tanyakan" class="btn btn-primary" style="background-color: #ffcb10;border: none; color: #20417f"><span class="network-name">Informasi Khusus</span></a>
            </li>
            <li>
                <a href="#organisasi" class="btn btn-primary" style="background-color: #ffcb10; border:none; color: #20417f"><span class="network-name">Struktur Organisasi</span></a>
            </li>
        </ul>
        </div>
    </div>
    </div> --}}
</section>
<section id="layanan" style="background: #fff;">
    <div class="container" style="padding-top: 15vh; padding-bottom: 15vh">
        <h2 style="font-size: 6vh; color: black">Layanan</h2>
        <div class="row">
            <div class="col-md-3">
                <a href="">
                    <cardblue>

                    </cardblue>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <cardblue>

                    </cardblue>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <cardblue>

                    </cardblue>
                </a>
            </div>
            <div class="col-md-3">
                <a href="">
                    <cardblue>

                    </cardblue>
                </a>
            </div>
        </div>
    </div>
</section>

<section id="prosedur" style="background: #013880;">
        <div class="container" style="padding-top: 15vh; padding-bottom: 15vh">
            <h2 style="font-size: 6vh; color: white">Prosedur</h2>
            <div class="row">
                <div class="col-md-15">
                    <a href="">
                        <cardyellow>
    
                        </cardyellow>
                    </a>
                </div>
                <div class="col-md-15">
                    <a href="">
                        <cardyellow>
    
                        </cardyellow>
                    </a>
                </div>
                <div class="col-md-15">
                    <a href="">
                        <cardyellow>
    
                        </cardyellow>
                    </a>
                </div>
                <div class="col-md-15">
                    <a href="">
                        <cardyellow>
    
                        </cardyellow>
                    </a>
                </div>
                <div class="col-md-15">
                    <a href="">
                        <cardyellow>
    
                        </cardyellow>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="quicklink" style="background: #fff;">
            <div class="container" style="padding-top: 15vh; padding-bottom: 15vh">
                <h2 style="font-size: 6vh; color: black">Quick Link</h2>
                <div class="row">
                    <div class="col-md-3">
                        <a href="">
                            <cardblue>
        
                            </cardblue>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="">
                            <cardblue>
        
                            </cardblue>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="">
                            <cardblue>
        
                            </cardblue>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="">
                            <cardblue>
        
                            </cardblue>
                        </a>
                    </div>
                </div>
            </div>
        </section>
{{-- <section id="petunjuk" style="background: rgba(255,203,16,0.8);">
    <div class="container" style="margin-top: 15vh;margin-bottom: 15vh;">
        <h2 style="font-size: 9vh">Tata Cara dan Formulir</h2>
        <p style="color: white; font-size: 18px">Permohonan dan Penyampaian Informasi Publik ITS</p>
        <center>
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Tata_Cara_Memperoleh_Informasi_Publik_di_Lingkungan_ITS.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white;">Tata Cara Permohonan Informasi</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Tata_Cara_Mengajukan_Keberatan_atas_Permohonan_Informasi_Publik.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white;  ">Tata Cara Pengajuan Keberatan</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Tata_Cara_Pengaduan_Penyalahgunaan_Wewenang.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white;  ">Tata Cara Pengaduan Penyalahgunaan Wewenang</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Tata_Cara_Pengajuan_Konsekuensi.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white;  ">Tata Cara Pengujian Konsekuensi</p></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Form_Permohonan_Informasi.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white;  ">Formulir Permohonan Informasi Publik</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Form_Pengaduan_Layanan.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white;  ">Formulir Pengajuan Keberatan</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Form_Keberatan_Atas_Permohonan_Informasi.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white;  ">Formulir Keberatan Atas Permohonan Informasi Publik</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/UU_No_14_Tahun_2008.pdf')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white;  ">UU No. 14 2008</p></a>
            </div>
        </div>
        </center>
    </div>
</section> --}}
{{-- <section id="tanyakan" style="background: rgb(32,65,127);">
    <div class="container" style="margin-top: 15vh;margin-bottom: 15vh">
        <style type="text/css">
            label,h2{
                color: white;
            }
        </style>
        <h2 style="font-size: 6vh">Formulir Permohonan Informasi dan Dokumentasi</h2>
        @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
        @if ($errors->gagalTambah->any())
        <div id="errormsg">
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->gagalTambah->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        </div>
        @endif
        <div class="row">
        <div class="article-detail">
        <form id="sent" action="{{ route('addtanyakan') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Alamat Tempat Tinggal</label>
                    <textarea class="form-control" name="alamat" required></textarea>
                </div>
                <div class="form-group">
                    <label>Nomor Telp/Handphone</label>
                    <input type="tel" class="form-control" name="kontak" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                 <div class="form-group">
                    <label>Identitas</label><br>
                    <label class="btn btn-primary" for="my-file-selector"><input id="my-file-selector" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val().replace(/C:\\fakepath\\/i, ''));" name="ktp" required>Upload KTP/SIM/PASPOR</label>
                    <span class='label label-info' id="upload-file-info"></span>
                  
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="form-group">
                    <label>Judul Pertanyaan</label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                <div class="form-group">
                    <label>Pertanyaan</label>
                    <textarea id="" rows="6" name="pertanyaan" class="form-control" required></textarea>
                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-primary" style="background-color: #ffcb10;border: none; color: #20417f">Submit Pertanyaan</button>
                </div>
            </div>
        </form>
        </div>
        </div>
    </div>
</section> --}}
<!--section id="organisasi">
    <div class="container" style="padding-top: 15vh; padding-bottom: 15vh">
        <div class="row">
            <h2>Struktur Organisasi</h2>
        </div>
        <div class="row" style="background-color: white; opacity: 0.8">
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
</section-->

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
    <script type="text/javascript">
    $(window).bind("load", function() {
        console.log('Page has been loaded')
        $('.section_slider').css({
            'opacity' : '1',
            'height' : '100%'
        })
    })
</script>
<script type="text/javascript">
    $('.container-arrow-down').click(function () {
        $("html, body").animate({ 
            scrollTop: $('.section_slider').height()
        },1000);
    });
</script>
<script type="text/javascript">
    var $item = $('.carousel .item'); 
    var $wHeight = $(window).height();
    $item.eq(0).addClass('active');
    $item.height($wHeight); 
    $item.addClass('full-screen');

    $(window).on('resize', function (){
        $wHeight = $(window).height();
        $item.height($wHeight);
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
      var percent = 0,
          crsl = $('#carousel-example-generic');
        crsl.carousel({
            interval: false,
            pause: false
        }).on('slid.bs.carousel', function () {
            toggleCaption();
        })

        $('.carousel-indicators li').on('click', function() {
            $(this).find('.transition-timer-carousel-progress-bar').closest('li').nextAll().find('.transition-timer-carousel-progress-bar').css({
                width: '0'
            });
            $(this).find('.transition-timer-carousel-progress-bar').closest('li').prevAll().find('.transition-timer-carousel-progress-bar').css({
                width: '100%'
            });
        })

        function progressBarCarousel() {
            $('.active .transition-timer-carousel-progress-bar').css({
                width: percent + '%'
            });
            percent = percent +0.5
            if (percent > 100) {
                percent = 0
                crsl.carousel('next')
                if ($('.carousel-indicators li.active').data('slide-to') == 0) {
                    $('.carousel-indicators li .transition-timer-carousel-progress-bar').css({
                        width: 0
                    });
                }
            }
        }

        function toggleCaption() {
            var h3 = crsl.find('.active').find('.carousel-caption').find('h3');
            var h2 = crsl.find('.active').find('.carousel-caption').find('h2');
            var content = crsl.find('.active').find('.carousel-caption').find('.content-carousel-caption');
            h3.addClass('animated fadeInUp').css({'visibility' : 'visible'});
            h2.addClass('animated fadeInUp').css({'visibility' : 'visible'});
            content.addClass('animated fadeInUp').css({'visibility' : 'visible'});
        }

        var barInterval = setInterval(progressBarCarousel, 40)
        var linkSlider = $('.carousel-caption h3, .carousel-caption h2, .carousel-caption .content-carousel-caption');

        linkSlider.hover(
            function() {
                clearInterval(barInterval)
            }, function(){
                barInterval = setInterval(progressBarCarousel, 40)
            }
        )
    })
</script>
@endsection
