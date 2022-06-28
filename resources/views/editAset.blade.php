<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <title>Kelola Aset</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top:50px">
                <h4>{{$Title}} Aset</h4>
                <hr>

                @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success')}}</div>
            @endif
            @if(Session::get('fail'))
                <div class="alert alert-danger">{{ Session::get('fail')}}</div>
            @endif
                <form action="{{route('update.car')}}" method="post">
                    @csrf
                    <input type="hidden" name="cid" value="{{ $Info->id }}">
                    <div class="form-group">
                          <label for="no_ktp">No.KTP</label>
                          <input type="text" class="form-control" name="no_ktp" placeholder="masukan no.ktp" value="{{ $Info->no_ktp }}">
                          <span class="text-danger">@error('no_ktp'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="name">Nama Aset</label>
                          <input type="text" class="form-control" name="name" placeholder="masukan nama aset" value="{{ $Info->name }}">
                          <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="type">Tipe Aset</label>
                          <input type="text" class="form-control" name="type" placeholder="masukan tipe aset" value="{{ $Info->type }}">
                          <span class="text-danger">@error('type'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="transmisi">Transmisi</label>
                          <input type="text" class="form-control" name="transmisi" placeholder="masukan transmisi aset" value="{{ $Info->transmisi }}">
                          <span class="text-danger">@error('transmisi'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="gas">Bahan Bakar</label>
                          <input type="text" class="form-control" name="gas" placeholder="masukan bahan bakar aset" value="{{ $Info->gas }}">
                          <span class="text-danger">@error('gas'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="color">Warna</label>
                          <input type="text" class="form-control" name="color" placeholder="masukan warna aset" value="{{ $Info->color }}">
                          <span class="text-danger">@error('color'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="capacity">Kapasitas</label>
                          <input type="text" class="form-control" name="capacity" placeholder="masukan kapasitas aset" value="{{ $Info->capacity }}">
                          <span class="text-danger">@error('capacity'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="facility">Fasilitas</label>
                          <input type="text" class="form-control" name="facility" placeholder="masukan fasilitas aset" value="{{ $Info->facility }}">
                          <span class="text-danger">@error('facility'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="plat">No.Plat</label>
                          <input type="text" class="form-control" name="plat" placeholder="masukan no.plat aset" value="{{ $Info->plat }}">
                          <span class="text-danger">@error('plat'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="stnk">STNK</label>
                          <input type="text" class="form-control" name="stnk" placeholder="masukan no.stnk aset" value="{{ $Info->stnk }}">
                          <span class="text-danger">@error('stnk'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="kategori">Kategori</label>
                          <input type="text" class="form-control" name="kategori" placeholder="masukan kategori aset" value="{{ $Info->kategori }}">
                          <span class="text-danger">@error('kategori'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="kontrak_mulai">Kontrak Mulai</label>
                          <input type="text" class="form-control" name="kontrak_mulai" placeholder="masukan kontrak mulai aset" value="{{ $Info->kontrak_mulai }}">
                          <span class="text-danger">@error('kontrak_mulai'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="kontrak_selesai">Kontrak Selesai</label>
                          <input type="text" class="form-control" name="kontrak_selesai" placeholder="masukan kontrak_selesai aset" value="{{ $Info->kontrak_selesai }}">
                          <span class="text-danger">@error('kontrak_selesai'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="service">Tanggal Service Terakhir</label>
                          <input type="text" class="form-control" name="service" placeholder="masukan tanggal service terakhir kali aset" value="{{ $Info->service }}">
                          <span class="text-danger">@error('service'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="bagasi">Volume Bagasi</label>
                          <input type="text" class="form-control" name="bagasi" placeholder="masukan volume bagasi aset" value="{{ $Info->bagasi }}">
                          <span class="text-danger">@error('bagasi'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="harga">Harga</label>
                          <input type="text" class="form-control" name="harga" placeholder="masukan harga aset" value="{{ $Info->harga }}">
                          <span class="text-danger">@error('harga'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="status">Status</label>
                          <input type="text" class="form-control" name="status" placeholder="masukan status aset" value="{{ $Info->status }}">
                          <span class="text-danger">@error('status'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:blue;margin-top:20px" onclick="return confirm('Anda yakin ingin mengubah data ini?')">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>