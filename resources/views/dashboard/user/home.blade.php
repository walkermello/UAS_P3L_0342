<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>User Dashboard | Home</title>
<link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
<style>
a.button {
        border: 3px solid white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        transition-duration: 0.4s;
        margin-left: 43%;
        margin-top: 50px;
        position: fixed;
        color: white;
}
a.button:hover {
        background-color: white;
        color: black;
}
.navbar{
        box-shadow: 0 0 25px 0 black;
}
#container {
  position:relative;
  height:610px;
  width:610px;
}
#container img {
  position:absolute;
  left:0;
}
section{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-position: center;
        background: url(https://www.stockinitaly.com/wp-content/uploads/2019/06/Mercedes-Benz-Wallpaper-5-1920x1200.jpg);
        background-color:rgba(0, 0, 0, 0.5);
}
h1{
        color: white;
}
</style>
</head>
<body>
        <section>
                <nav class="navbar" style="background-color: white">
                <div style="margin-top:10px;font-size:20px;";>
                        <a class="form-inline" style="margin-left: 65%;margin-right: 30px;color:black" href="edit/{{ Auth::user()->id }}">Profile</a>
                        <a class="form-inline" style="margin-right: 30px;color:black" href="{{ route('booking') }}">Histori Transaksi</a>
                        <a class="form-inline" style="margin-right: 30px;color:black" href="{{ route('promo') }}">Promo</a>
                        <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="margin-top:10px;color:black">Logout</a>
                </div>
                </nav>
                <div class="row" style="margin-top:150px">
                        <h1 style="margin-left:13%;font-family: 'Permanent Marker', cursive;font-size: 70px">WELCOME TO ATMA RENTAL</h1>
                </div>
                <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                <a href="{{ route('car') }}" class="button">Find A Car</a>
        </section>
</body>
</html>