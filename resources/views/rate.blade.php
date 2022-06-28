<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Driver</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-modal-content w3-animate-zoom">
<div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-2" style="margin-top:50px">
                <h4>Tambah Rating</h4>
                <hr>
                @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success')}}</div>
                @endif
                @if(Session::get('fail'))
                <div class="alert alert-danger">{{ Session::get('fail')}}</div>
                @endif
                <form action="{{route('update.rating')}}" method="post">
                    @csrf
                    <input type="hidden" name="cid" value="{{ $Info->id }}">
                    <div class="form-group">
                          <label for="driver">Nama Driver</label>
                          <input type="text" class="form-control" name="driver" placeholder="masukan harga sewa" value="{{ $Info->driver }}" readonly="readonly">
                          <span class="text-danger">@error('driver'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="telp_driver">No.telp Driver</label>
                          <input type="text" class="form-control" name="telp_driver" placeholder="masukan harga sewa" value="{{ $Info->telp_driver }}" readonly="readonly">
                          <span class="text-danger">@error('telp_driver'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="tarif_driver">Tarif Driver Per Hari</label>
                          <input type="text" class="form-control" name="tarif_driver" placeholder="masukan harga sewa" value="{{ $Info->tarif_driver }}" readonly="readonly">
                          <span class="text-danger">@error('tarif_driver'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="rating_driver">Rating Driver</label>
                          <input type="text" class="form-control" name="rating_driver" placeholder="masukan rating driver" value="{{ $Info->rating_driver }}">
                          <span class="text-danger">@error('rating_driver'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:blue;margin-top:20px" onclick="return confirm('Anda yakin ingin memberikan rating ini?')">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>