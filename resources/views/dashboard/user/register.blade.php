<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body style="background-color: #f5b278">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                  <h4>User Register</h4><hr>
                  <form action="{{ route('user.create') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @if (Session::get('success'))
                         <div class="alert alert-success">
                             {{ Session::get('success') }}
                         </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @csrf
                    <div class="form-group">
                          <label for="name">Nama</label>
                          <input type="text" class="form-control" name="name" placeholder="masukan nama" value="{{ old('name') }}">
                          <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <input type="text" class="form-control" name="alamat" placeholder="masukan alamat" value="{{ old('alamat') }}">
                          <span class="text-danger">@error('alamat'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="tgl_lahir">Tanggal Lahir</label>
                          <input type="text" class="form-control" name="tgl_lahir" placeholder="masukan tanggal lahir" value="{{ old('tgl_lahir') }}">
                          <span class="text-danger">@error('tgl_lahir'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="no_telp">No.Telpon</label>
                          <input type="text" class="form-control" name="no_telp" placeholder="masukan nomor telepon" value="{{ old('no_telp') }}">
                          <span class="text-danger">@error('no_telp'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="gender">Jenis Kelamin</label>
                          <input type="text" class="form-control" name="gender" placeholder="masukan jenis kelamin" value="{{ old('gender') }}">
                          <span class="text-danger">@error('gender'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="sim">SIM</label>
                          <input type="file" name="sim" class="form-control" id="sim" />
                          <span class="text-danger">@error('sim'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                          <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
                        <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
                    </div>
                    <a href="{{ route('user.login') }}">I already have an account</a>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>  
                  </form>
            </div>
        </div>
    </div>

</body>
</html>