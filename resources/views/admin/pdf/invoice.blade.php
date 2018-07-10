{{-- 
<table>
    <tbody>
        <tr>
            <td>dsadasda</td>
            <td>:</td>
            <td>dsadsadasdasdsadsa</td>


        </tr>
        
    </tbody>
</table> --}}
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
        <td valign="top">LOGO PPID / LOGO ITS</td>
        <td align="right" valign="top">
        {{-- <h3>{{$pertanyaan->nama_penanya}}</h3> --}}
            <pre>
                {{$pertanyaan->nama_penanya}}
                {{$pertanyaan->nohp_penanya}}
                {{$pertanyaan->email_penanya}}
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
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
    <td><strong>No. {{$pertanyaan->no_surat}}</strong></td>
    </tr>

  </table>
  <hr>
  <h3>Pertanyaan</h3>
  <table width="100%">
    {{-- <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead> --}}
    <tbody>
      <tr>
        <td width="150" valign="top">Judul Pertanyaan</td>
        <td width="1" valign="top">:</td>
        <td valign="top">{{$pertanyaan->judul_pertanyaan}}</td>
      </tr>
      <tr>
            <td width="150" valign="top">Deskripsi Pertanyaan</td>
            <td width="1" valign="top">:</td>
            <td valign="top">{{$pertanyaan->pertanyaan}}</td>
        </tr>
    </tbody>
  </table>
  @foreach($pertanyaan->jawaban->sortBy('created_at') as $key => $jawaban)
  <h3>Jawaban #{{$key+1}}</h3>
  <table width="100%">
    <tbody>
        
        <tr>
        <td width="150" valign="top">Judul Jawaban</td>
        <td width="1" valign="top">:</td>
        <td valign="top">{{$jawaban->judul_jawaban}}</td>
        </tr>
        <tr>
            <td width="150" valign="top">Deskripsi Jawaban</td>
            <td width="1" valign="top">:</td>
            <td valign="top">{!!html_entity_decode($jawaban->jawaban)!!}</td>
        </tr>
        
    </tbody>
    </table>
    @endforeach
</body>
</html>
{{-- @foreach($pertanyaan->jawaban as $jawaban)
{!!html_entity_decode($jawaban->jawaban)!!}
@endforeach --}}