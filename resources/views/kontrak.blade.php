<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrak Aset</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 style="margin-left:45%">Daftar Mobil</h2>
                </div>
                <br>
                <br>
                <div class="card-body">
                @foreach ($query as $item)
                <div class="card">
                    <img src="https://t3.ftcdn.net/jpg/02/68/55/60/360_F_268556012_c1WBaKFN5rjRxR2eyV33znK4qnYeKZjm.jpg" alt="Avatar" style="width:30%">
                        <div class="container">
                            <h4><b>{{ $item->name }}</b></h4>
                            <p>{{ $item->type }}</p>
                            <p>{{ $item->transmisi }}</p>
                            <p>{{ $item->gas }}</p>
                            <p>{{ $item->color }}</p>
                            <p>{{ $item->bagasi }}</p>
                            <p>{{ $item->facility }}</p>
                            <p>{{ $item->harga }}</p>
                        </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>