<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PPID</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td><a style="background-color: #fbc300; padding: 3px; font-weight: bolder;">LAYANAN INFORMASI PUBLIK</a><p style="font-style: italic;padding: 0 8px; font-size: 12px; color: gray; font-weight: bold;">Public Information Service</p></td>
        <td align="right">
            <img src="{{url('/img/icons/its.png')}}" width="80" height="auto">
            <img src="{{url('/img/icons/its2.png')}}" width="150" height="auto">
        </td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td>
            <p style="font-size: 20px; text-align: center; font-weight: bold; margin-bottom: 0">FORMULIR<br>PERMOHONAN INFORMASI & DOKUMENTASI</p>
            <p style="font-style: italic; text-align: center; font-size: 12px; font-weight: bold; color: gray">Information & Documentation Request Form</p>
            <p style="font-weight: bold; font-size: 14px; text-align: center;">No. {{$pertanyaan->no_surat}}</p>
        </td>
    </tr>

</table>
<table width="100%">
<tbody style="padding-bottom: 10px">
    <tr>
        <br>
        <td style="font-weight: bold;font-size: 12px;">PERSONAL IDENTITY</td>
    </tr>
    <tr>
        <td width="150" valign="top"><p style="margin: 0;font-weight: bold;font-size: 12px">Nama Lengkap</p><p style="font-style: italic; color: gray; margin: 0">Complete Name</p></td>
        <td width="1" valign="top">:</td>
        <td valign="top">{{$pertanyaan->nama_penanya}}</td>
    </tr>
    <tr>
        <td width="150" valign="top"><p style="margin: 0;font-weight: bold;font-size: 12px">Alamat tempat tinggal</p><p style="font-style: italic; color: gray; margin: 0">Address</p></td>
        <td width="1" valign="top">:</td>
        <td valign="top">
            @php                     
                $str = preg_replace( '~((?:\S*?\s){5})~', "$1\n", $pertanyaan->alamat_penanya );
                $string = explode("\n", $str);
            @endphp
            @foreach($string as $value)
            @if($value[-1] == ' ')
                @php
                    $array = str_split($value);
                    array_pop($array);
                    $array = implode($array);
                @endphp
                {{$array}}
            @else {{$value}}
            @endif
            @endforeach
        </td>
    </tr>
    <tr>
        <td width="150" valign="top"><p style="margin: 0;font-weight: bold;font-size: 12px">Nomor telp./HP</p><p style="font-style: italic; color: gray; margin: 0">Phone/Mobile number</p></td>
        <td width="1" valign="top">:</td>
        <td valign="top">{{$pertanyaan->nohp_penanya}}</td>
    </tr>
    <tr>
        <td width="150" valign="top"><p style="margin: 0;font-weight: bold;font-size: 12px">E-mail</p><p style="font-style: italic; color: gray; margin: 0">E-mail</p></td>
        <td width="1" valign="top">:</td>
        <td valign="top">{{$pertanyaan->email_penanya}}</td>
    </tr>
</tbody>
</table>
<table style="width: 100%; margin-top: 15px">
<tbody>
    <tr>
        <td style="font-weight: bold;font-size: 12px">QUESTION</td>
    </tr>
    <tr>
        <td width="150" valign="top"><p style="margin: 0;font-weight: bold;font-size: 12px">Judul Pertanyaan</p><p style="font-style: italic; color: gray; margin: 0">Title</p></td>
        <td width="1" valign="top">:</td>
        <td valign="top">{{$pertanyaan->judul_pertanyaan}}</td>
    </tr>
    <tr>
        <td width="150" valign="top"><p style="margin: 0;font-weight: bold;font-size: 12px">Pertanyaan</p><p style="font-style: italic; color: gray; margin: 0">Question</p></td>
        <td width="1" valign="top">:</td>
        <td valign="top">{{$pertanyaan->pertanyaan}}</td>
    </tr>
</tbody>
</table>
@foreach($pertanyaan->jawaban->sortBy('created_at') as $key => $jawaban)
<table style="width: 100%; margin-top: 15px">
<tbody>
    <tr>
        <td style="font-weight: bold;font-size: 12px">ANSWER #{{$key+1}}</td>
    </tr>
    <tr>
        <td width="150" valign="top"><p style="margin: 0;font-weight: bold;font-size: 12px">Judul Jawaban</p><p style="font-style: italic; color: gray; margin: 0">Title</p></td>
        <td width="1" valign="top">:</td>
        <td valign="top">{{$jawaban->judul_jawaban}}</td>
    </tr>
    <tr>
        <td width="150" valign="top"><p style="margin: 0;font-weight: bold;font-size: 12px">Jawaban</p><p style="font-style: italic; color: gray; margin: 0">Answer</p></td>
        <td width="1" valign="top">:</td>
        <td valign="top">{!!html_entity_decode($jawaban->jawaban)!!}</td>
    </tr>
</tbody>
</table>
@endforeach
<table style="width: 100%; margin-top: 70px">
<tbody>
    <tr><td>...................................................................</td></tr>
    <tr>
        <td style="font-weight: bold;font-size: 12px">Melania S Muntini</td>
    </tr>
    <tr>
        <td>Kepala Unit Protokoler, Promosi, dan Humas ITS</td>
    </tr>
    <tr><td>Surabaya, @php echo date("j F Y"); @endphp</td></tr>
</tbody>
</table>
</body>
</html>
