<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Karyawan</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
       <div class="row">
          <div class="col-md-6" style="margin-top:40px">
             <h4>Search Karyawan</h4><hr>
             <form action="{{ route('web.search') }}" method="GET">
        
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
             @if(isset($karyawans))

               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>ID</th>
                           <th>Name</th>
                           <th>Alamat</th>
                           <th>Tanggal Lahir</th>
                           <th>Email</th>
                           <th>No Telpon</th>
                           <th>Jenis Kelamin</th>
                       </tr>
                   </thead>
                   <tbody>
                        @if(count($karyawans) > 0)
                           @foreach($karyawans as $karyawan)
                              <tr>
                                <td>{{ $karyawan->id }}</td>
                                <td>{{ $karyawan->name }}</td>
                                <td>{{ $karyawan->alamat }}</td>
                                <td>{{ $karyawan->tgl_lahir }}</td>
                                <td>{{ $karyawan->email }}</td>
                                <td>{{ $karyawan->no_telp }}</td>
                                <td>{{ $karyawan->gender }}</td>
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