<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <title>Kelola Promo</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top:50px">
                <h4>{{$Title}} Promo</h4>
                <hr>

                @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success')}}</div>
            @endif
            @if(Session::get('fail'))
                <div class="alert alert-danger">{{ Session::get('fail')}}</div>
            @endif
                <form action="{{route('update')}}" method="post">
                    @csrf
                    <input type="hidden" name="cid" value="{{ $Info->id }}">
                    <div class="form-group">
                          <label for="jenis">Jenis Promo</label>
                          <input type="text" class="form-control" name="jenis" placeholder="masukan jenis promo" value="{{ $Info->jenis }}">
                          <span class="text-danger">@error('jenis'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="keterangan">Keterangan Promo</label>
                          <input type="text" class="form-control" name="keterangan" placeholder="masukan keterangan promo" value="{{ $Info->keterangan }}">
                          <span class="text-danger">@error('keterangan'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="total">Total Diskon</label>
                          <input type="text" class="form-control" name="total" placeholder="masukan total diskon" value="{{ $Info->total }}">
                          <span class="text-danger">@error('total'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="status">Status Promo</label>
                          <input type="text" class="form-control" name="status" placeholder="masukan status promo" value="{{ $Info->status }}">
                          <span class="text-danger">@error('status'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="kode">Kode Promo</label>
                          <input type="text" class="form-control" name="kode" placeholder="masukan kode promo" value="{{ $Info->kode }}">
                          <span class="text-danger">@error('kode'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:blue;margin-top:20px" onclick="return confirm('Anda yakin ingin mengubah data ini?')">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>