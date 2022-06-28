<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Karyawan Dashboard | Home</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <style>
        .navbar{
            box-shadow: 0 0 25px 0 black;
        }
    </style>
</head>
<body>
<nav class="navbar" style="background-color: #white">
<div style="margin-top:10px;font-size:15px;">
<a class="form-inline" style="margin-left: 25%;margin-right:30px;color:black" href="edit/{{ Auth::user()->id }}">Profile</a>
<a style="margin-right:30px;color:black" href="{{ route('jadwal') }}"> Atur Jadwal </a>
<a style="margin-right:30px;color:black" href="{{ route('aset') }}"> Atur Aset</a>
<a style="margin-right:30px;color:black" href="{{ route('diskon') }}"> Atur Promo</a>
<a style="margin-right:30px;color:black" href="{{ route('web.search') }}"> Cari Karyawan </a>
<a style="margin-right:30px;color:black" href="{{ route('web.cari') }}"> Cari Promo </a>
<a style="margin-right:30px;color:black" href="{{ route('web.temukan') }}"> Cari Aset </a>
<a style="margin-right:30px;color:black" href="{{ route('web.dapatkan') }}"> Cari Jadwal </a>
<a style="margin-right:30px;color:black" href="{{ route('allTransaksi') }}"> Transaksi </a>
<a href="{{ route('karyawan.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="margin-top:10px;color:black">Logout</a>
</div>
 
</nav>
        <div class="row">
                <h2 style="margin-left:38%;font-family:tahoma">KARYAWAN DASHBOARD</h2>
        </div>
        <br>
        <br>
        <br>
        <strong> Shift 1 : 08:00-15:00 </strong>
        <br>
        <strong> Shift 2 : 15:00-22:00 </strong>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                </div>
            </div>
        </div>
    <form action="{{ route('karyawan.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
</body>
</html>