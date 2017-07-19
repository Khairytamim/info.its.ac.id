<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi | INFO ITS</title>
<!--     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css"> -->
    
  
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{url('/admindist/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/admindist/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{url('/admindist/css/jquery-ui.css')}}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="https://use.fontawesome.com/a50b71a92d.js"></script> -->

    <link rel="stylesheet" href="{{url('/admindist/plugins/datatables/dataTables.bootstrap.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/admindist/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('/admindist/dist/css/skins/_all-skins.min.css')}}">
    <!-- /admindist/plugins/iCheck/flat/blue.css -->
    <link rel="stylesheet" href="{{url('/admindist/plugins/iCheck/flat/blue.css')}}">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
      @yield('gaya')
    
  </head>
  <body class="skin-blue sidebar-mini" style="height: auto; min-height: 100%;">
    <!-- Site wrapper -->
    <div class="wrapper" style="height: auto; min-height: 100%;">
    

      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <span class="logo-mini"><b>INFOR</b></span>
          <span class="logo-lg"><b>INFO</b>ITS</span>
        </a>

      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
      </nav>

      </header>

      <!-- =============================================== -->

      <aside class="main-sidebar">
        <section class="sidebar" style="height: auto;">
        
          @if(Auth::check())
            <div class="user-panel">
              <div class="pull-left image">
                <img href="#" src="{{url('/admindist/dist/img/default-avatar.png')}}" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p><a>{{Auth::user()->name}}</a></p>

                <a ><i class="fa fa-circle text-success"></i> Online</a>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"></i> Logout</a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </div>
            </div>
          @endif
          <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
        
        
            {{-- <li id="aktifjadwal" class="treeview">
              <a href="">
                <i class="fa fa-calendar-check-o"></i> <span>Jadwal</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="anakjadwal" class=""><a href=""><i class="fa fa-circle-o"></i>Input</a></li>
                <!-- <li id="anakhari" class=""><a href=""><i class="fa fa-circle-o"></i>Hari</a></li>
                <!-- <li id="anakjam" class=""><a href=""><i class="fa fa-circle-o"></i>Jam</a></li> -->
                <li id="anakruangan" class=""><a href=""><i class="fa fa-circle-o"></i>Ruangan</a></li>
              </ul>
            </li>  --}}
            <li class="" id="aktifmailbox">
              <a href="{{route('mailbox')}}"><i class="fa fa-envelope-o"></i> <span>Mailbox</span></a>
            </li>
            <li class="" id="aktiforganisasi">
              <a href="{{route('adminorganisasi')}}"><i class="fa fa-users"></i> <span>Organisasi</span></a>
            </li>
            <li class="" id="aktifusers">
              <a href="{{route('users')}}"><i class="fa fa-user"></i> <span>User</span></a>
            </li>
        
            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>

          

    <div class="content-wrapper">
      <section class="content">
        @yield('content')
      </section>
    </div>

    <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright © 2017 <a href="#">Informasi Publik ITS</a>.</strong> All rights
    reserved.
  </footer>

  </div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<script src="{{url('/admindist/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="{{url('/admindist/plugins/jQueryUI/jquery-ui.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('/admindist/js/moment.js')}}"></script>
<script src="{{url('/admindist/bootstrap/js/bootstrap.js')}}"></script>

<script src="{{url('/admindist/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/admindist/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script src="{{url('/admindist/js/bootstrap-datetimepicker.min.js')}}"></script>

<!-- SlimScroll -->
<script src="{{url('/admindist/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('/admindist/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('/admindist/dist/js/app.min.js')}}"></script>
<!-- <script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.2/socket.io.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="{{url('/admindist/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{url('/admindist/dist/js/demo.js')}}"></script>
<script type="text/javascript">
  $(function () {
    $('#aktif{{$active}}').toggleClass('active');
  });
  $(function () {
    $('#anak{{$page_title}}').toggleClass('active');
  });
</script>

  @yield('js')
</body>
</html>
