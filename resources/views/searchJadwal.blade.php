<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Jadwal</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
       <div class="row">
          <div class="col-md-6" style="margin-top:40px">
             <h4>Search Jadwal</h4><hr>
             <form action="{{ route('web.dapatkan') }}" method="GET">
        
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
             @if(isset($jadwals))

               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>ID</th>
                           <th>Name</th>
                           <th>Hari Kerja</th>
                           <th>Shift</th>
                       </tr>
                   </thead>
                   <tbody>
                        @if(count($jadwals) > 0)
                           @foreach($jadwals as $jadwal)
                              <tr>
                                <td>{{ $jadwal->id }}</td>
                                <td>{{ $jadwal->name }}</td>
                                <td>{{ $jadwal->hari_kerja }}</td>
                                <td>{{ $jadwal->shift }}</td>
                                <td><a style="background-color: green" href="ganti/{{ $jadwal->id }}" class="btn btn-primary btn-xs">Update</a></td>
                              </tr>
                           @endforeach
                       @else
                            <tr>
                                <td><strong>No result found!</strong></td>
                            </tr>
                       @endif
                   </tbody>
               </table>
             @endif
          </div>
       </div>
    </div>
</body>
</html>