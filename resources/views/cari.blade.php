<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Promo</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
    <style>

    body {
    font-family: Arial, Helvetica, sans-serif;
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
          <div class="col-md-6" style="margin-top:40px">
             <h4>Search Karyawan</h4><hr>
             <form action="{{ route('web.cari') }}" method="GET">
        
                <div class="form-group">
                   <label >Enter keyword</label>
                   <input type="text" class="form-control" name="query" placeholder="Search here....."> 
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-primary">Search</button>
                </div>
             </form>
             <br>
             <br>
             <hr>
             <br>
             @if(isset($promos))
             <div class="container">
                <div class="row">
                @if(count($promos) > 0)
                @foreach($promos as $promo)
                    <div class="column">
                    <div class="card">
                            <h4><b>{{ $promo->kode }}</b></h4>
                            <p>{{ $promo->jenis }}</p>
                            <p>Diskon: {{ $promo->total }}</p>
                    </div>
                    </div>
                @endforeach
                @else    
                    <strong>No result found!</strong>

                @endif
                </div>
            </div>
             @endif
          </div>
       </div>
    </div>
</body>
</html>