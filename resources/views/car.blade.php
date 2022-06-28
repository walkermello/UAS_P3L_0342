<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brosur</title>
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
  background-image: url('https://hdqwalls.com/download/ultimate-supercars-k6-1920x1080.jpg');
  height: 800px;
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
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); 
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
                <h2 style="margin-left:45%;color:white">Daftar Mobil</h2>
                <br>
                <br>
                @foreach ($cars as $item)
                    <div class="column">
                    <div class="card">
                        <img src="https://t3.ftcdn.net/jpg/02/68/55/60/360_F_268556012_c1WBaKFN5rjRxR2eyV33znK4qnYeKZjm.jpg" alt="Avatar" style="width:30%">
                            <h4><b>{{ $item->name }}</b></h4>
                            <p>{{ $item->type }}</p>
                            <p>{{ $item->transmisi }}</p>
                            <p>{{ $item->gas }}</p>
                            <p>{{ $item->color }}</p>
                            <p>{{ $item->bagasi }}</p>
                            <p>{{ $item->facility }}</p>
                            <p>Rp.{{ $item->harga }}</p>
                        <a href="book/{{ $item->id }}" class="btn btn-primary btn-sm">BOOK</a>
                    </div>
                    </div>
                @endforeach
                </div>
</div>
</body>
</html>