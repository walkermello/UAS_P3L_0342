<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <title>Edit Transaksi</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top:50px">
                <h4>{{$Title}} Transaksi</h4>
                <hr>

                @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success')}}</div>
            @endif
            @if(Session::get('fail'))
                <div class="alert alert-danger">{{ Session::get('fail')}}</div>
            @endif
                <form action="{{route('update.transaksi')}}" method="post">
                    @csrf
                    <input type="hidden" name="cid" value="{{ $Info->id }}">
                    <div class="form-group">
                          <label for="ktp">No. KTP</label>
                          <input type="text" class="form-control" name="ktp" placeholder="masukan no.ktp" value="{{ $Info->ktp }}">
                          <span class="text-danger">@error('ktp'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="tgl_mulai">Tanggal Mulai Sewa</label>
                          <input type="text" class="form-control" name="tgl_mulai" placeholder="masukan tanggal selesai sewa" value="{{ $Info->tgl_mulai }}">
                          <span class="text-danger">@error('tgl_mulai'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="tgl_selesai">Tanggal Selesai Sewa</label>
                          <input type="text" class="form-control" name="tgl_selesai" placeholder="masukan tanggal selesai sewa" value="{{ $Info->tgl_selesai }}">
                          <span class="text-danger">@error('tgl_selesai'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="metode_pembayaran">Metode Pembayaran</label>
                          <input type="text" class="form-control" name="metode_pembayaran" placeholder="masukan metode pembayaran" value="{{ $Info->metode_pembayaran }}">
                          <span class="text-danger">@error('metode_pembayaran'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:blue;margin-top:20px" onclick="return confirm('Anda yakin ingin mengubah data ini?')">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>