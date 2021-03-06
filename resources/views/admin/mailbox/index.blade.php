@extends('layouts.adminlayout')


@section('gaya')
<style type="text/css">
  .pagination{
    display: block;
    margin: 0px;
  }
  .clickable-row :hover {
    cursor: pointer;
  }
</style>

@endsection
@section('content')

        <div class="row">
        <div class="col-md-3">
    <!-- <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a> -->

    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Folders</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      {{-- Folders --}}
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li class="" id="aktifdalemmailbox"><a href="{{route('mailbox')}}"><i class="fa fa-inbox"></i> Inbox</a></li>
          <li class="" id="aktifdalemsent"><a href="{{route('sent')}}"><i class="fa fa-envelope-o"></i> Sent</a></li>
          @if(Auth::user()->hak == 'approver')
          <li class="" id="aktifdalemkonfirmasi"><a href="{{route('confirmation')}}"><i class="fa fa-check"></i> Confirmation</a></li>
          @endif
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /. box -->
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Labels</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      {{-- Labels --}}  
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li class="" id="aktiftipepublik"><a href="{{route('label')}}?name=Publik" ><i class="fa fa-circle-o text-light-blue"></i> Publik</a></li>
          <li class="" id="aktiftipekondisional"><a href="{{route('label')}}?name=Kondisional" ><i class="fa fa-circle-o text-yellow"></i> Kondisional</a></li>
          <li class="" id="aktiftiperahasia"><a href="{{route('label')}}?name=Rahasia" ><i class="fa fa-circle-o text-red"></i> Rahasia</a></li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              {{-- <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div> --}}
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  {{-- @isset($pertaanyaan) --}}
                  @if($pertanyaan->count() == 0)
                    <tr>
                      <td colspan="5"><center>Tidak ada Pertanyaan</center></td>
                    </tr>
                    
                  @endif
                  @foreach($pertanyaan as $value)

                    <tr class='clickable-row' data-href='{{route('readmail')}}?mail_id={{$value->id_pertanyaan}}'>
                      <td >
                          @if($value->tipe_layanan == 'info')
                          <h5>Permohonan Informasi dan Dokumentasi</h5>
                          @elseif($value->tipe_layanan == 'keberatan')
                          <h5>Pengajuan Keberatan</h5>
                          @elseif($value->tipe_layanan == 'gratifikasi')
                          <h5>Pengaduan Gratifikasi dan Pungli</h5>
                          @else
                          -
                          @endif
                      </td>
                      <td>{{$value->tipe == null ? 
                      '-' : $value->tipe}}</td>
                      {{-- <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td> --}}
                      <td class="mailbox-name"><a href="#">{{$value->nama_penanya}}</a></td>
                      @php $tanyaan = explode(" ", $value->pertanyaan); @endphp
                      <td class="mailbox-subject"><b>{{$value->judul_pertanyaan}}</b> - {{implode(' ', array_splice($tanyaan, 0, 5))}}
                      </td>
                      <td class="mailbox-attachment"></td>
                      <td class="mailbox-date">{{$value->created_at->timezone('Asia/Jakarta')}}</td>
                      {{-- <td class="mailbox-date"><a href="{{route('readmail')}}?mail_id={{$value->id_pertanyaan}}">View</a></td> --}}
                    </tr>
                  @endforeach
                  {{-- @endisset --}}
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            @if($pertanyaan->links() != '')
              <div class="box-footer ">
                
                  <!-- Check all button -->
                  
                  <!-- /.btn-group -->
                  <div class="pull-right">
                  {{-- @isset($pertaanyaan) --}}
                    {{ $pertanyaan->links() }}
                    {{-- @endisset --}}
                    <!-- /.btn-group -->
                  </div>
                  <!-- /.pull-right -->
                
              </div>
            @endif
            
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
   


    
@endsection

@section('js')

<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
  $(function () {
    $('#aktifdalem{{$active}}').toggleClass('active');
  });
  jQuery(document).ready(function($) {
      $(".clickable-row").click(function() {
          window.location = $(this).data("href");
      });
  });
  
</script>
@endsection


