@extends('layouts.layout')

@section('content')
<section id="top">
    <div class="intro-header">
    <div class="content" id="content" style="height: 100vh">
        <div class="intro-message" id="title" >
        <span style="margin: 2vw;border-bottom: 4px solid #20417f; color: black; font-size: 10vh">Informasi Publik ITS</span>

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
    </div>
</section>
<section id="cari" style="background: rgba(255,255,255,0.8);">
    <style type="text/css">
        #custom-search-input{
        padding: 3px;
        border: solid 1px #E4E4E4;
        border-radius: 3px;
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
    <div class="container" style="padding-top: 15vh; padding-bottom: 15vh">
        <div class="row">
            <div class="content">
                <h2 style="color: #20417f">Pencarian Data ITS</h2>
                <p><h4>Bagian ini merupakan informasi yang dapat diketahui oleh publik secara langsung. Untuk mendapatkan informasi yang diinginkan, anda dapat mengisi kotak pencarian yang sudah kami sediakan dibawah ini. Apabila informasi yang dimaksud tidak dapat ditemukan, maka anda dapat mengajukan permintaan layanan informasi melalui bagian <a href="#tanyakan">pengajuan pertanyaan</a> dengan mengikuti prosedur yang tersedia.</h4></p>
                <div id="custom-search-input" style="border-color: #ffcb10">
                    <form action="{{ route('searchlaporan') }}" method="get">
                        <div class="input-group col-md-12">
                            <input type="text" name="cari" class="form-control input-lg" placeholder="Pencarian data" />
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-lg" type="submit">
                                    Cari
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="petunjuk" style="background: rgba(255,203,16,0.8);">
    <div class="container" style="margin-top: 15vh;margin-bottom: 15vh;">
        <h2 style="font-size: 9vh">Tata Cara dan Formulir</h2>
        <p style="color: white; font-size: 18px">Permohonan dan Penyampaian Informasi Publik ITS</p>
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Tata_Cara_Memperoleh_Informasi_Publik_di_Lingkungan_ITS.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white; width: 50%; text-align: center;">Tata Cara Permohonan Informasi</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Tata_Cara_Mengajukan_Keberatan_atas_Permohonan_Informasi_Publik.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white; width: 50%; text-align: center;">Tata Cara Pengajuan Keberatan</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Tata_Cara_Pengaduan_Penyalahgunaan_Wewenang.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white; width: 50%; text-align: center;">Tata Cara Pengaduan Penyalahgunaan Wewenang</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Tata_Cara_Pengajuan_Konsekuensi.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white; width: 50%; text-align: center;">Tata Cara Pengujian Konsekuensi</p></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Form_Permohonan_Informasi.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white; width: 50%; text-align: center;">Formulir Permohonan Informasi Publik</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Form_Pengaduan_Layanan.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white; width: 50%; text-align: center;">Formulir Pengajuan Keberatan</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/Form_Keberatan_Atas_Permohonan_Informasi.docx')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white; width: 50%; text-align: center;">Formulir Keberatan Atas Permohonan Informasi Publik</p></a>
            </div>
            <div class="col-md-3 col-xs-6">
                <a href="{{url('panduan/UU_No_14_Tahun_2008.pdf')}}" target="_blank"><img src="{{ asset('logo/document.png') }}"><p style="color: white; width: 50%; text-align: center;">UU No. 14 2008</p></a>
            </div>
        </div>
    </div>
</section>
<section id="tanyakan" style="background: rgba(32,65,127,0.8);">
    <div class="container" style="margin-top: 15vh;margin-bottom: 15vh">
        <style type="text/css">
            label,h2{
                color: white;
            }
        </style>
        <h2 style="font-size: 9vh">Informasi Khusus</h2>
        @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
        <div class="row">
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
</section>
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
        $("#sent").submit(function( event ) {
          // swal("Loading","done","success");
          swal('Pengajuan pertanyaan')
          swal.showLoading()
        });
    </script>
@endsection
