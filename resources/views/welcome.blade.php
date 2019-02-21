<!DOCTYPE html>
<html lang="en">

	{{-- start head --}}
	@include('components.head')
	{{-- end head --}}

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


		<!-- start script -->
		@include('components.script')
		{{-- end script --}}

	</body>
</html>