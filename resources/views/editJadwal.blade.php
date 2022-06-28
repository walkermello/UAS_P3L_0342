<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <title>Edit Jadwal</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top:50px">
                <h4>Edit Jadwal</h4>
                <hr>

                @if(Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success')}}</div>
            @endif
            @if(Session::get('fail'))
                <div class="alert alert-danger">{{ Session::get('fail')}}</div>
            @endif
                <form action="{{route('ganti')}}" method="post">
                    @csrf
                    <input type="hidden" name="cid" value="{{ $Info->id }}">
                    <div class="form-group">
                          <label for="name">Nama Karyawan</label>
                          <input type="text" class="form-control" name="name" placeholder="masukan nama karyawan" value="{{ $Info->name }}">
                          <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="hari_kerja">Hari Kerja</label>
                          <input type="text" class="form-control" name="hari_kerja" placeholder="masukan hari_kerja" value="{{ $Info->hari_kerja }}">
                          <span class="text-danger">@error('hari_kerja'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                          <label for="shift">Shift</label>
                          <input type="text" class="form-control" name="shift" placeholder="masukan shift" value="{{ $Info->shift }}">
                          <span class="text-danger">@error('shift'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:blue;margin-top:20px" onclick="return confirm('Anda yakin ingin mengubah data ini?')">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>