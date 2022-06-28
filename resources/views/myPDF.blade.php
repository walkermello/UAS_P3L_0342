<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <style>

    body {
    font-family: Arial, Helvetica, sans-serif;
    }

    h1{
        text-align: center;
        font-weight: bold;
    }
    </style>
</head>
<body>
<h1>Atma Rental</h1>
    <p style="text-align:center">{{ $date }}</p>
    <hr style="width:100%"></hr>
    <br>
    <br>
    <p> Nama Pembeli &nbsp;&nbsp;&nbsp;&nbsp;: {{$Info->nama_customer}}</p>
    <p> Tanggal Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$Info->tgl_mulai}}</p>
    <p> Tanggal Selesai &nbsp;&nbsp;: {{$Info->tgl_selesai}}</p>
    <p> Mobil &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$Info->mobil}}</p>
    <p> Harga Sewa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp.{{$Info->harga_sewa}}</p>
    <p> Nama Driver &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$Info->driver}}</p>
    <p> Tarif Driver &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$Info->tarif_driver}}</p>
    <p> Sub Total &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$Info->sub_total}}</p>
    <br>
    <br>
    <hr style="width:100%; text-align:center;"></hr>
    <br>
<h5 style="text-align: center">Terima Kasih<br></br><br>
Telah Menyewa Mobil Di Atma Rental
</h5>
</body>
</html>