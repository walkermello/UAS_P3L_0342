<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Jadwal Pegawai</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            
            <h4 style="margin-left:40%;font-size:30px">Tambah Jadwal</h4><hr>

            @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success')}}</div>
            @endif
            @if(Session::get('fail'))
                <div class="alert alert-danger">{{ Session::get('fail')}}</div>
            @endif
                <form action="add" method="post">
                    @csrf
                    <div class="form-group">
                          <label for="name">Nama Pegawai</label>
                          <input type="text" class="form-control" name="name" placeholder="masukan nama pegawai">
                          <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="hari_kerja">Hari</label>
                          <input type="text" class="form-control" name="hari_kerja" placeholder="masukan hari kerja">
                          <span class="text-danger">@error('hari_kerja'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="shift">Shift</label>
                          <input type="text" class="form-control" name="shift" placeholder="masukan shift kerja">
                          <span class="text-danger">@error('shift'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:blue;margin-top:20px">Tambah</button>
                </form>
                  
            </div>
        </div>
    </div>

</body>
</html>