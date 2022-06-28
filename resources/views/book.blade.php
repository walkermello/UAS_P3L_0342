<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book A Car</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
<style>

body {
  font-family: Arial, Helvetica, sans-serif;
}

.row{
      margin-left: 20%;
}
#template{
      border-radius: 20px;
      background: #80b5ff;
}
</style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 offset-md-48" style="margin-top: 45px;" id="template">
            <h2 style="margin-left:35%; text-shadow: -1px 0 black, 0 1px black, 0px 0 black, 0 -1px black; color: white;"><b>Rental Form</b></h2><hr>
            @if(Session::get('success'))
                  <div class="alert alert-success">{{ Session::get('success')}}</div>
            @endif
            @if(Session::get('fail'))
                  <div class="alert alert-danger">{{ Session::get('fail')}}</div>
            @endif
                  <form action="/tambah" method="post">
                    @csrf
                    <input type="hidden" name="cid" value="{{ $Info->id }}">
                    <input type="hidden" name="cid" value="{{ $Info3->id }}">
                    <input type="hidden" name="cid" value="{{ $Info2->id }}">
                    <div class="form-group">
                          <label for="nama_customer">Nama Customer</label>
                          <input type="text" class="form-control" name="nama_customer" placeholder="masukan nama customer" value="{{ $Info2->name }}">
                          <span class="text-danger">@error('nama_customer'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="ktp">No.Ktp</label>
                          <input type="text" class="form-control" name="ktp" placeholder="masukan no.ktp">
                          <span class="text-danger">@error('ktp'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="sim">No.SIM</label>
                          <input type="text" class="form-control" name="sim" placeholder="isikan no.sim jika memesan mobil tanpa driver">
                          <span class="text-danger">@error('sim'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="tanggal">Tanggal Transaksi</label>
                          <input type="text" class="form-control" name="tanggal" placeholder="masukan tanggal transaksi">
                          <span class="text-danger">@error('tanggal'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="tgl_mulai">Tanggal Mulai Sewa</label>
                          <input type="text" class="form-control" name="tgl_mulai" placeholder="masukan tanggal mulai sewa">
                          <span class="text-danger">@error('tgl_mulai'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="tgl_selesai">Tanggal Selesai Sewa</label>
                          <input type="text" class="form-control" name="tgl_selesai" placeholder="masukan tanggal selesai sewa">
                          <span class="text-danger">@error('tgl_selesai'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="mobil">Nama Mobil</label>
                          <input type="text" class="form-control" name="mobil" placeholder="masukan nama mobil" value="{{ $Info->name }}" readonly="readonly">
                          <span class="text-danger">@error('mobil'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="plat">No.Plat Mobil</label>
                          <input type="text" class="form-control" name="plat" placeholder="masukan no.plat" value="{{ $Info->plat }}" readonly="readonly">
                          <span class="text-danger">@error('plat'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="harga_sewa">Harga Sewa Per Hari</label>
                          <input type="text" class="form-control" name="harga_sewa" placeholder="masukan harga sewa" value="{{ $Info->harga }}" readonly="readonly">
                          <span class="text-danger">@error('harga_sewa'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="driver">Nama Driver</label>
                          <input type="text" class="form-control" name="driver" placeholder="masukan harga sewa" value="{{ $Info3->name }}" readonly="readonly">
                          <span class="text-danger">@error('driver'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="telp_driver">No.telp Driver</label>
                          <input type="text" class="form-control" name="telp_driver" placeholder="masukan harga sewa" value="{{ $Info3->no_telp }}" readonly="readonly">
                          <span class="text-danger">@error('telp_driver'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="tarif_driver">Tarif Driver Per Hari</label>
                          <input type="text" class="form-control" name="tarif_driver" placeholder="masukan harga sewa" value="{{ $Info3->harga_sewa }}" readonly="readonly">
                          <span class="text-danger">@error('tarif_driver'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="metode_pembayaran">Metode Pembayaran</label>
                          <input type="text" class="form-control" name="metode_pembayaran" placeholder="masukan metode pembayaran">
                          <span class="text-danger">@error('metode_pembayaran'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="sub_total">Sub Total</label>
                          <input type="text" class="form-control" name="sub_total" placeholder="masukan sub total pembayraan" value="{{ $Info4 }}" readonly="readonly">
                          <span class="text-danger">@error('sub_total'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <button type="submit" class="btn btn-primary" style="padding: 10px 270px;background-color: green">Submit</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>

</body>
</html>