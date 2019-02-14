<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>Info</title>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">

		<!-- animate -->
		<link rel="stylesheet" href="{{url('v2/css/animate.min.css')}}">
		<!-- bootstrap -->
		<link rel="stylesheet" href="{{url('v2/css/bootstrap.min.css')}}">
		<!-- font-awesome -->
		<link rel="stylesheet" href="{{url('v2/css/font-awesome.min.css')}}">
		<!-- google font -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700,800' rel='stylesheet' type='text/css'>
		<!-- custom -->
		<link rel="stylesheet" href="{{url('v2/css/style.css')}}">

	</head>
	<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">

		<!-- start navigation -->
		@include('components.navbar')
		<!-- end navigation -->

		<!-- start header -->
		@include('components.header')
		<!-- end header -->

		<!-- start Tentang PPID ITS -->
		@include('components.tentang')
		<!-- end Tentang PPID ITS -->

		<!-- start Formulir Permohonan Informasi Publik -->
		@include('components.formulirIP')
		<!-- end Formulir Permohonan Informasi Publik -->

		{{-- start tata cara permohonan --}}
		@include('components.tatacarapermohonan')
		<!-- end tata cara permohonan -->

		<!-- start divider -->
		@include('components.unduhaplikasi')
		<!-- end divider -->

		<!-- start Daftar Informasi Publik -->
		@include('components.daftarIP')
		<!-- end Daftar Informasi Publik -->

		<!-- start Kominfo -->
		@include('components.kominfo')
		<!-- end Kominfo -->

		<!-- start footer -->
		@include('components.footer')
		<!-- end footer -->


		<!-- jQuery -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

		<script src="{{url('v2/js/jquery.js')}}"></script>
		<!-- bootstrap -->
		<script src="{{url('v2/js/bootstrap.min.js')}}"></script>
		<!-- isotope -->
		<script src="{{url('v2/js/isotope.js')}}"></script>
		<!-- images loaded -->
   		<script src="{{url('v2/js/imagesloaded.min.js')}}"></script>
   		<!-- wow -->
		<script src="{{url('v2/js/wow.min.js')}}"></script>
		<!-- smoothScroll -->
		<script src="{{url('v2/js/smoothscroll.js')}}"></script>
		<!-- jquery flexslider -->
		<script src="{{url('v2/js/jquery.flexslider.js')}}"></script>
		<!-- custom -->
		<script src="{{url('v2/js/custom.js')}}"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('.hover').hover(function(){
				$(this).addClass('flip');
			},function(){
				$(this).removeClass('flip');
			});
		});
		</script>


	</body>
</html>