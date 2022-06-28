<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <title>Promo</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #059DC0;
}

    .column {
float: left;
width: 25%;
padding: 0 10px;
}


.row {margin: 0 -5px;}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.card {
  box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.5); 
  padding: 16px;
  text-align: center;
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
  text-align: left;
}
.card:hover{
    transform: scale(1.1);
}
</style>
</head>
<body>
<div class="container">
                <div class="row">
                <h2 style="margin-left:45%">Daftar Promo</h2>
                <br>
                <br>
                @foreach ($promos as $item)
                    <div class="column">
                    <div class="card">
                            <h4><b>{{ $item->kode }}</b></h4>
                            <p>{{ $item->jenis }}</p>
                            <p>Diskon: {{ $item->total }}</p>
                    </div>
                    </div>
                @endforeach
                </div>
</div>
</body>
</html>