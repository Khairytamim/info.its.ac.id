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
        <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
        {{-- <link rel="stylesheet" href="{{url('/admindist/dist/css/sweetalert.css')}}"> --}}
        <link href="https://cdn.jsdelivr.net/sweetalert2/5.3.8/sweetalert2.css" rel="stylesheet"/>
        {{-- <link href="{{ asset('css/search.css') }}" rel="stylesheet"/> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,300'>
        <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
        <link rel="stylesheet" href="{{asset('css/fab.css')}}">

        <style>
                /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
                html,
          body {
            width: 100%;
            height: 100%;
            overflow-x: hidden;
          }
          
          body {
            font-family: 'Roboto', sans-serif;
            color: #2d2d2d;
            letter-spacing: 0.2px;
            /* Search Active */
          }
          body.search-active {
            overflow: hidden;
          }
          body.search-active .search-input {
            opacity: 1;
            transform: none;
            pointer-events: all;
          }
          body.search-active .icon-close {
            opacity: 1;
            transform: rotate(-90deg);
          }
          body.search-active .control {
            cursor: default;
            z-index: 99;
            
          }
          body.search-active .control .btn-material {
            transform: scale(70);
            /* background-color: #013880; */
            z-index: 999;
          }
          body.search-active .control .icon-material-search {
            opacity: 0;
          }
          
          /* Close Icon */
          .icon-close {
            position: fixed;
            top: 30px;
            right: 30px;
            color: #FFF;
            cursor: pointer;
            font-size: 70px;
            opacity: 0;
            transition: all 0.3s ease-in-out;
            z-index: 999999999;
          }
          .icon-close:hover {
            transform: rotate(0);
          }
          
          /* Search Input */
          .search-input {
            height: 80px;
            position: absolute;
            top: 50%;
            left: 50px;
            margin-top: -40px;
            pointer-events: none;
            opacity: 0;
            transform: translate(40px, 0);
            transition: all 0.3s ease-in-out;
            z-index: 999999999;
          }
          .search-input input {
            color: #fff;
            font-size: 54px;
            border: 0;
            background: transparent;
            -webkit-appearance: none;
            box-sizing: border-box;
            outline: 0;
            font-weight: 200;
          }
          .search-input ::-webkit-input-placeholder {
            color: #EEE;
          }
          .search-input :-moz-placeholder {
            color: #EEE;
            opacity: 1;
          }
          .search-input ::-moz-placeholder {
            color: #EEE;
            opacity: 1;
          }
          .search-input :-ms-input-placeholder {
            color: #EEE;
          }
          
          /* Container */
          .container {
            padding-right: 50px;
            padding-left: 50px;
            position: relative;
          }
          .container.container-dark {
            background: #22313F;
            color: #FFF;
          }
          
          /* Control btn */
          .control {
            cursor: pointer;
          }
          .control .btn-material {
            position:fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            z-index: 999999999;
            /* border-radius: 100%; */
            /* box-sizing: border-box; */
            background: #013880;
            outline: 0;
            transform-origin: 50%;
            /* box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23); */
            transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
          }
          .control .btn-material:hover {
            /* box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23); */
          }
          .control .icon-material-search {
            color: #FFF;
            position: absolute;
            top: -10px;
            right: 78px;
            transition: opacity 0.3s ease-in-out;
          }
          
          /* Utilities */
          .p-y-md {
            padding-top: 2.8rem;
            padding-bottom: 2.8rem;
          }
          
          /* Typo */
          h1,
          h2 {
            font-weight: 300;
          }
          
              </style>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> --}}
{{--         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 --}}


        <!-- Styles -->
        {{-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-weight: 100;
                margin: 0;
                position: relative;
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
        </style> --}}
    </head>
    <body>

    <div class='container p-y-md'>
        <div class='control'>
            <div class="btn-material"></div>
            <a class="float">
                <i class="fa fa-search my-float"></i>
            </a>
        </div>
    </div>

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
                                {{-- <li class="control">
                                    <a class="btn-material">
                                        <img src="{{url('/img/icons/ic_search_yellow.png')}}">
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <i class='icon-close material-icons'>close</i>
        <div class='search-input'>
            <input class='input-search' placeholder='Search' type='text'>
        </div>
        @yield('content')
        
        <!--footer start from here-->
        <!--footer-->
        <div class="section_footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-xs-5">
                            <a href="https://its.ac.id"><img src="{{url('/img/logo.png')}}" class="logo-in-footer"></a>
                        </div>
                        <div class="col-sm-3 col-xs-7"> 
                            <p>Gedung Rektorat Lt.1 
                            <br>Kampus ITS Sukolilo
                            <br>Surabaya, Jawa Timur, Indonesia, 60111</p>
                        </div>
                        <div class="col-sm-3 col-xs-6 border-right-white-in-mobile">
                            <div class="footer-top-content border-left-white">
                                <div class="menu-footer-top-menu-container">
                                    <ul class="menu">
                                        <li>Kontak Kami</li>
                                        <li style="font-size: 12px">(031) 599-4251</li>
                                        {{-- <a style="padding: 6px; font-weight: normal; font-size: 12px" href="mailto:fikry.labsky08@gmail.com" class="btn btn-primary btn-block">Developed By</a> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-6 border-right-white-in-mobile">
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
                        <div class="col-sm-2 col-xs-12">
                            <div class="footer-top-content border-left-white">
                                <a href="https://www.lapor.go.id/" target="_blank"><img style="width: 100%; margin-left: 2vw; margin-top: 3vh" src="//info.its.ac.id/logo/lapor.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            Copyright © Informasi Publik ITS <?php echo date("Y"); ?>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer start from here-->
        <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
        {{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        {{-- <script src="{{url('/admindist/dist/js/sweetalert.min.js')}}"></script> --}}
        <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.8/sweetalert2.js"></script>
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootsap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
        <script src="{{ asset('js/search.js') }}"></script>
        
        @yield('js')

    </body>
</html>
