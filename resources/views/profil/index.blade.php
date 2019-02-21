<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">
    @include('components.navbar')
    @include('components.header')
    @include('profil.deskripsi')
    @include('profil.pejabat')
    @include('profil.tugaspokok')
    @include('components.footer')

</body>
</html>
@include('components.script')