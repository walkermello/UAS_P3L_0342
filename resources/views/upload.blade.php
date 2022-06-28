<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Bukti Bayar</title>

</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                  <h4 style="text-align:center">Bukti Pembayaran</h4><hr>
                  <form action="{{ route('update.bayar') }}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                    <input type="hidden" name="cid" value="{{ $Info->id }}">
                    <div class="form-group" style="margin-top:20px">
                          <label for="bukti_bayar">Upload Bukti Bayar</label>
                          <br>
                          <input type="file" name="bukti_bayar" class="form-control" id="bukti_bayar" />
                          <span class="text-danger">@error('foto'){{ $message }} @enderror</span>
                    </div>
                    <button style="width:355px;margin-top:20px" type="submit" class="btn btn-primary" style="background-color:blue;margin-top:20px" onclick="return confirm('Anda yakin ingin mengupload data ini?')">Upload</button>
                  </form>
            </div>
        </div>
    </div>
</body>
</html>