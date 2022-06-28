<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Transaksi</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
<style>
        * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.bg-image {
  position: fixed;
  left: 0;
  right: 0;
  z-index: 1;
  display: block;
  height: 800px;
}

.column {
  float: left;
  width: 100%;
  padding: 0 10px;
}


.row {margin: 0 -5px;}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); 
  padding: 16px;
  text-align: left;
  background-color: #f1f1f1;
}

@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

.container {
  position: absolute;
  left: 0;
  right: 0;
  z-index: 9999;
  margin-left: 85px;
  margin-right: 20px;
}
.card{
  margin-bottom: 20px;
}

.card:hover{
    transform: scale(1.1);
}
</style>
</head>
<body>
<div class="bg-image"></div>
<div class="container">
                <div class="row">
                <h2 style="margin-left:40%">Histori Transaksi</h2>
                <br>
                <br>
                @foreach ($list as $item)
                    <div class="column">
                    <div class="card">
                        <h4><b>{{ $item->nama_customer }}</b></h4>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;No.KTP: {{ $item->ktp }}</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Transaksi: {{ $item->tanggal }}</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;Mobil: {{ $item->mobil }}</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;No.Plat: {{ $item->plat }}</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;Driver: {{ $item->driver }}</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;No.Telpon Driver: {{ $item->telp_driver }}</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;Metode Pembayaran: {{ $item->metode_pembayaran }}</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;Sub Total: Rp.{{ $item->sub_total }}</p>
                        <a class="btn btn-primary" style="padding: 5px 40px" href="generate-pdf/{{ $item->id }}">Cetak Nota</a>
                    </div>
                    </div>
                @endforeach
                </div>
</div>
</body>
</html>