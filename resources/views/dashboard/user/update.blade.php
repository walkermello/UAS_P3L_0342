<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                  <h4>User Profile</h4><hr>

                    <form action="{{route('user.update')}}" method="post">

                    @csrf
                    <input type="hidden" name="cid" value="{{ $Info->id }}">
                    <div class="form-group">
                          <label for="name">Nama</label>
                          <input type="text" class="form-control" name="name" placeholder="masukan nama" value="{{ $Info->name }}">
                          <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <input type="text" class="form-control" name="alamat" placeholder="masukan alamat" value="{{ $Info->alamat }}">
                          <span class="text-danger">@error('alamat'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="tgl_lahir">Tanggal Lahir</label>
                          <input type="text" class="form-control" name="tgl_lahir" placeholder="masukan tanggal lahir" value="{{ $Info->tgl_lahir }}">
                          <span class="text-danger">@error('tgl_lahir'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="no_telp">No.Telpon</label>
                          <input type="text" class="form-control" name="no_telp" placeholder="masukan nomor telepon" value="{{ $Info->no_telp }}">
                          <span class="text-danger">@error('no_telp'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="gender">Jenis Kelamin</label>
                          <input type="text" class="form-control" name="gender" placeholder="masukan jenis kelamin" value="{{ $Info->gender }}">
                          <span class="text-danger">@error('gender'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter new password">
                          <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <a href="/user/del/{{ $Info->id }}" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete Account</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>

</body>
</html>