<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
  background-image: url('https://www.hdcarwallpapers.com/walls/2012_ford_mustang_boss_302-wide.jpg');
  weight: 900px;
  height: 800px;
  filter: blur(5px);
  -webkit-filter: blur(5px);
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
  margin-left: 120px;
  margin-right: 20px;
  margin-top: 300px;
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
<a href="{{ route('user.login') }}" class="btn btn-success btn-sm" style="font-size: 30px">Log in sebagai Customer</a>
<a href="{{ route('pengemudi.login') }}" class="btn btn-warning btn-sm" style="font-size: 30px">Log in sebagai Driver</a>
<a href="{{ route('karyawan.login') }}" class="btn btn-danger btn-sm" style="font-size: 30px">Log in sebagai Karyawan</a>
</div>
</body>
</html>

