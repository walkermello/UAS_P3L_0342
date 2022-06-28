<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atur Aset</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">      
</head>
<body>
    <div class="container">
        <div class="row">
            
            <h4 style="margin-left:40%;font-size:30px">Tambah Aset</h4><hr>

            @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success')}}</div>
            @endif
            @if(Session::get('fail'))
                <div class="alert alert-danger">{{ Session::get('fail')}}</div>
            @endif
                <form action="adding" method="post">
                    @csrf
                    <div class="form-group">
                          <label for="no_ktp">No.KTP</label>
                          <input type="text" class="form-control" name="no_ktp" placeholder="masukan no.ktp">
                          <span class="text-danger">@error('no_ktp'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="name">Nama Aset</label>
                          <input type="text" class="form-control" name="name" placeholder="masukan nama aset">
                          <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="type">Tipe Aset</label>
                          <input type="text" class="form-control" name="type" placeholder="masukan tipe aset">
                          <span class="text-danger">@error('type'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="transmisi">Transmisi</label>
                          <input type="text" class="form-control" name="transmisi" placeholder="masukan transmisi aset">
                          <span class="text-danger">@error('transmisi'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="gas">Bahan Bakar</label>
                          <input type="text" class="form-control" name="gas" placeholder="masukan bahan bakar aset">
                          <span class="text-danger">@error('gas'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="color">Warna</label>
                          <input type="text" class="form-control" name="color" placeholder="masukan warna aset">
                          <span class="text-danger">@error('color'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="capacity">Kapasitas</label>
                          <input type="text" class="form-control" name="capacity" placeholder="masukan kapasitas aset">
                          <span class="text-danger">@error('capacity'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="facility">Fasilitas</label>
                          <input type="text" class="form-control" name="facility" placeholder="masukan fasilitas aset">
                          <span class="text-danger">@error('facility'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="plat">No.Plat</label>
                          <input type="text" class="form-control" name="plat" placeholder="masukan no.plat aset">
                          <span class="text-danger">@error('plat'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="stnk">STNK</label>
                          <input type="text" class="form-control" name="stnk" placeholder="masukan no.stnk aset">
                          <span class="text-danger">@error('stnk'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="kategori">Kategori</label>
                          <input type="text" class="form-control" name="kategori" placeholder="masukan kategori aset">
                          <span class="text-danger">@error('kategori'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="kontrak_mulai">Kontrak Mulai</label>
                          <input type="text" class="form-control" name="kontrak_mulai" placeholder="masukan kontrak mulai aset">
                          <span class="text-danger">@error('kontrak_mulai'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="kontrak_selesai">Kontrak Selesai</label>
                          <input type="text" class="form-control" name="kontrak_selesai" placeholder="masukan kontrak_selesai aset">
                          <span class="text-danger">@error('kontrak_selesai'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="service">Tanggal Service Terakhir</label>
                          <input type="text" class="form-control" name="service" placeholder="masukan tanggal service terakhir kali aset">
                          <span class="text-danger">@error('service'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="bagasi">Volume Bagasi</label>
                          <input type="text" class="form-control" name="bagasi" placeholder="masukan volume bagasi aset">
                          <span class="text-danger">@error('bagasi'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="harga">Harga</label>
                          <input type="text" class="form-control" name="harga" placeholder="masukan harga aset">
                          <span class="text-danger">@error('harga'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="status">Status</label>
                          <input type="text" class="form-control" name="status" placeholder="masukan status aset">
                          <span class="text-danger">@error('status'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:blue;margin-top:20px">Tambah</button>
                </form>
                <br>

                <table class="table table-hover">
                    <thead>
                        <th>No.KTP</th>
                        <th>Nama Aset</th>
                        <th>Tipe Aset</th>
                        <th>Transmisi</th>
                        <th>Bahan Bakar</th>
                        <th>Warna</th>
                        <th>Kapasitas</th>
                        <th>Fasilitas</th>
                        <th>No.Plat</th>
                        <th>STNK</th>
                        <th>Kategori</th>
                        <th>Kontrak Mulai</th>
                        <th>Kontrak Selesai</th>
                        <th>Tanggal Service Terakhir</th>
                        <th>Volume Bagasi</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                        <tr>
                            <td>{{ $item->no_ktp}}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->type}}</td>
                            <td>{{ $item->transmisi}}</td>
                            <td>{{ $item->gas}}</td>
                            <td>{{ $item->color}}</td>
                            <td>{{ $item->capacity}}</td>
                            <td>{{ $item->facility}}</td>
                            <td>{{ $item->plat}}</td>
                            <td>{{ $item->stnk}}</td>
                            <td>{{ $item->kategori}}</td>
                            <td>{{ $item->kontrak_mulai}}</td>
                            <td>{{ $item->kontrak_selesai}}</td>
                            <td>{{ $item->service}}</td>
                            <td>{{ $item->bagasi}}</td>
                            <td>{{ $item->harga}}</td>
                            <td>{{ $item->status}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="hapus/{{ $item->id }}" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
                                    <a href="ubah/{{ $item->id }}" class="btn btn-primary btn-xs" style="margin-top: 10px">Update</a>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>