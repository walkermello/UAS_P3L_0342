<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atur Promo</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">      
</head>
<body>
    <div class="container">
        <div class="row">
            
            <h4 style="margin-left:40%;font-size:30px">Tambah Promo</h4><hr>

            @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success')}}</div>
            @endif
            @if(Session::get('fail'))
                <div class="alert alert-danger">{{ Session::get('fail')}}</div>
            @endif
                <form action="add" method="post">
                    @csrf
                    <div class="form-group">
                          <label for="jenis">Jenis Promo</label>
                          <input type="text" class="form-control" name="jenis" placeholder="masukan jenis promo">
                          <span class="text-danger">@error('jenis'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="keterangan">Keterangan Promo</label>
                          <input type="text" class="form-control" name="keterangan" placeholder="masukan keterangan promo">
                          <span class="text-danger">@error('keterangan'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="total">Total Diskon</label>
                          <input type="text" class="form-control" name="total" placeholder="masukan total diskon">
                          <span class="text-danger">@error('total'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="status">Status Promo</label>
                          <input type="text" class="form-control" name="status" placeholder="masukan status promo">
                          <span class="text-danger">@error('status'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="kode">Kode Promo</label>
                          <input type="text" class="form-control" name="kode" placeholder="masukan kode promo">
                          <span class="text-danger">@error('kode'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:blue;margin-top:20px">Tambah</button>
                </form>
                <br>

                <table class="table table-hover">
                    <thead>
                        <th>Jenis Promo</th>
                        <th>Keterangan Promo</th>
                        <th>Total Diskon</th>
                        <th>Status Promo</th>
                        <th>Kode Promo</th>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                        <tr>
                            <td>{{ $item->jenis}}</td>
                            <td>{{ $item->keterangan}}</td>
                            <td>{{ $item->total}}</td>
                            <td>{{ $item->status}}</td>
                            <td>{{ $item->kode}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="delete/{{ $item->id }}" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
                                    <a href="update/{{ $item->id }}" class="btn btn-primary btn-xs" style="margin-top: 10px">Update</a>
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