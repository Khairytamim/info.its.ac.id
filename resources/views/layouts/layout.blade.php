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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
                font-family: 'Montserrat', sans-serif;
                font-weight: 100;
                height: 100%;
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
    <body style="background-image:url('bg.png'); background-repeat: repeat;background-size: 100%">
        @yield('content')
        <!--footer start from here-->
        <style type="text/css">
            footer { background-color:#20417f; min-height:350px; font-family: 'Open Sans', sans-serif; }
            .footerleft { margin-top:50px; padding:0 36px; }
            .logofooter { margin-bottom:10px; font-size:25px; color:#fff; font-weight:700;}

            .footerleft p { color:#fff; font-size:12px !important; font-family: 'Open Sans', sans-serif; margin-bottom:15px;}
            .footerleft p i { width:20px; color:#999;}


            .paddingtop-bottom {  margin-top:50px;}
            .footer-ul { list-style-type:none;  padding-left:0px; margin-left:2px;}
            .footer-ul li { line-height:29px; font-size:12px;}
            .footer-ul li a { color:#a0a3a4; transition: color 0.2s linear 0s, background 0.2s linear 0s; }
            .footer-ul i { margin-right:10px;}
            .footer-ul li a:hover {transition: color 0.2s linear 0s, background 0.2s linear 0s; color:#ff670f; }

            .social:hover {
                 -webkit-transform: scale(1.1);
                 -moz-transform: scale(1.1);
                 -o-transform: scale(1.1);
             }
             
             

             
             .icon-ul { list-style-type:none !important; margin:0px; padding:0px;}
             .icon-ul li { line-height:75px; width:100%; float:left;}
             .icon { float:left; margin-right:5px;}
             
             
             .copyright { min-height:40px; background-color:#000000;}
             .copyright p { text-align:left; color:#FFF; padding:10px 0; margin-bottom:0px;}
             .heading7 { font-size:21px; font-weight:700; color:#d9d6d6; margin-bottom:22px;}
             .post p { font-size:12px; color:#FFF; line-height:20px;}
             .post p span { display:block; color:#8f8f8f;}
             .bottom_ul { list-style-type:none; float:right; margin-bottom:0px;}
             .bottom_ul li { float:left; line-height:40px;}
             .bottom_ul li:after { content:"/"; color:#FFF; margin-right:8px; margin-left:8px;}
             .bottom_ul li a { color:#FFF;  font-size:12px;}
        </style>
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-6 footerleft ">
                <div class="logofooter"> Logo</div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                <p><i class="fa fa-map-pin"></i> 210, Aggarwal Tower, Rohini sec 9, New Delhi -        110085, INDIA</p>
                <p><i class="fa fa-phone"></i> Phone (India) : +91 9999 878 398</p>
                <p><i class="fa fa-envelope"></i> E-mail : info@webenlance.com</p>
                
              </div>
              <div class="col-md-2 col-sm-6 paddingtop-bottom">
                <h6 class="heading7">GENERAL LINKS</h6>
                <ul class="footer-ul">
                  <li><a href="#"> Career</a></li>
                  <li><a href="#"> Privacy Policy</a></li>
                  <li><a href="#"> Terms & Conditions</a></li>
                  <li><a href="#"> Client Gateway</a></li>
                  <li><a href="#"> Ranking</a></li>
                  <li><a href="#"> Case Studies</a></li>
                  <li><a href="#"> Frequently Ask Questions</a></li>
                </ul>
              </div>
              <div class="col-md-3 col-sm-6 paddingtop-bottom">
                <h6 class="heading7">LATEST POST</h6>
                <div class="post">
                  <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                  <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                  <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                </div>
              </div>
              <div class="col-md-3 col-sm-6 paddingtop-bottom">
                <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                  <div class="fb-xfbml-parse-ignore">
                    <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <!--footer start from here-->

        <div class="copyright">
          <div class="container">
            <div class="col-md-6">
              <p>© 2016 - All Rights with Webenlance</p>
            </div>
            <div class="col-md-6">
              <ul class="bottom_ul">
                <li><a href="#">webenlance.com</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Faq's</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Site Map</a></li>
              </ul>
            </div>
          </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
        @yield('js')
    </body>
</html>
