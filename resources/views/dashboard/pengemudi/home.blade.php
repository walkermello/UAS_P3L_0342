<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Driver Dashboard | Home</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
</head>
<body>
<nav class="navbar navbar-light bg-light" style="background-color: #9fb6d6">
<div style="margin-top:10px;font-size:20px;";>
<a class="form-inline" style="margin-left: 60%;margin-right:30px;color:black" href="edit/{{ Auth::user()->id }}">Profile</a>
<a style="margin-right:30px;color:black" href="{{ route('jadwal') }}"> Atur Jadwal </a>
<a style="margin-right:30px;color:black" href="{{ route('web.find') }}"> Cari Driver</a>
<a href="{{ route('pengemudi.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="margin-top:10px;color:black">Logout</a>
</div>
 
</nav>
        <div class="row">
                <h2 style="margin-left:38%;font-family:tahoma">DRIVER DASHBOARD</h2>
        </div>
    <div class="container" style="margin-top:100px">
        <table style="width:100%;margin-top:40px">
            <tr>
                
            </tr>
        </table>
    </div>
    <form action="{{ route('pengemudi.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
</body>
</html>