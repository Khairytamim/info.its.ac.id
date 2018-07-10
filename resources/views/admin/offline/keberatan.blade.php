<form id="sent" action="{{ route('offline.add.keberatan') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="form-group">
            <label>Alamat Tempat Tinggal</label>
            <textarea class="form-control" name="alamat" required></textarea>
        </div>
        <div class="form-group">
            <label>Nomor Telp/Handphone</label>
            <input type="tel" class="form-control" name="kontak" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
         <div class="form-group">
            <label>Identitas</label><br>
            <label class="btn btn-primary" for="my-file-selector"><input id="my-file-selector" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val().replace(/C:\\fakepath\\/i, ''));" name="ktp" required>Upload KTP/SIM/PASPOR</label>
            <span class='label label-info' id="upload-file-info"></span>
          
        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <div class="form-group">
            <label>Judul Pengajuan Keberatan</label>
            <input type="text" class="form-control" name="judul" required>
        </div>
        <div class="form-group">
            <label>Deskripsi Keberatan</label>
            <textarea id="" rows="6" name="pertanyaan" class="form-control" required></textarea>
        </div>
        <div class="form-group pull-right">
            <button type="submit" class="btn btn-primary" style="background-color: #ffcb10;border: none; color: #20417f">Submit</button>
        </div>
    </div>
</form>