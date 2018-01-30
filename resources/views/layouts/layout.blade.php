<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Informasi Publik ITS</title>

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="{{url('/admindist/dist/css/sweetalert.css')}}"> --}}
        <link href="https://cdn.jsdelivr.net/sweetalert2/5.3.8/sweetalert2.css" rel="stylesheet"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
{{--         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 --}}


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-weight: 100;
                margin: 0;
                position: relative;
                overflow: auto;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 74px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body style="background-image:url({{ URL::asset('bg.png') }}); background-repeat: repeat;background-size: 100%">
      <!-- Navigation -->
      <div class="section-menu">
            <nav class="navbar navbar-default">
                <div class="container container-header">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href={{URL::to('/')}}>
                            <img src="{{url('/img/icons/logo-its.png')}}" class="logo">
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="clearfix">
                            <ul id="menu-secondary-menu" class="nav navbar-nav secondary-top-menu">
                                @foreach($menus as $menu)
                                <li><a href={{route('menu.index', ['menu' => $menu->id])}}>{{$menu->nama}}</a></li>
                                @endforeach
                                <li class="login hidden-xs">
                                    <a href={{URL::to('/admin')}}>
                                        <img src="{{url('/img/icons/logo-login.png')}}" class="logo">

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        @yield('content')
        <!--footer start from here-->
        <!--footer-->
        <div class="section_footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-xs-5">
                            <img src="{{url('/img/logo.png')}}" class="logo-in-footer">
                        </div>
                        <div class="col-sm-3 col-xs-7">
                            <p>Rektorat Building 1st Floor
                            <br>Kampus ITS, Jalan Raya ITS, Keputih, Sukolilo, Keputih, Surabaya
                            <br>Jawa Timur 60117, Indonesia</p>
                        </div>
                        <div class="col-sm-3 col-xs-4 border-right-white-in-mobile">
                            <div class="footer-top-content border-left-white">
                                <div class="menu-footer-top-menu-container">
                                    <ul class="menu">
                                        <li>Kontak Kami</li>
                                        <li style="font-size: 12px">(031) 456-7890</li>
                                        <a style="padding: 6px; font-weight: normal; font-size: 12px" href="mailto:fikry.labsky08@gmail.com" class="btn btn-primary btn-block">Developed By</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-4 border-right-white-in-mobile">
                            <div class="footer-top-content border-left-white">
                                <div class="title-footer padding-left-35 text-center">
                                    Temukan Kami :
                                </div>
                                <ul class="sosmed">
                                    <li>
                                        <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/logo-youtube.png')}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/logo-instagram.png')}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/logo-facebook.png')}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/twitter.png')}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/logo-medsos-A.png')}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <a href="#" target="_blank">
                                            <img src="{{url('/img/icons/logo-line.png')}}">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-4">
                            <div class="footer-top-content border-left-white">
                                <a href="https://www.lapor.go.id/" target="_blank"><img style="width: 100%" src="http://info.its.ac.id/logo/lapor.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            Copyright © Informasi Publik ITS 2017
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer start from here-->
        <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        {{-- <script src="{{url('/admindist/dist/js/sweetalert.min.js')}}"></script> --}}
        <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.8/sweetalert2.js"></script>
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
        @yield('js')
        
    </body>
</html>
