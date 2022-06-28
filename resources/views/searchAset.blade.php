<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Aset</title>
    <link rel="stylesheet" href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
       <div class="row">
          <div class="col-md-6" style="margin-top:40px">
             <h4>Search Aset</h4><hr>
             <form action="{{ route('web.temukan') }}" method="GET">
        
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
             @if(isset($cars))

               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>ID</th>
                           <th>Name</th>
                           <th>Type</th>
                           <th>Transmisi</th>
                           <th>Gas</th>
                           <th>Color</th>
                           <th>Capacity</th>
                           <th>Facility</th>
                           <th>Plat</th>
                       </tr>
                   </thead>
                   <tbody>
                        @if(count($cars) > 0)
                           @foreach($cars as $car)
                              <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->name }}</td>
                                <td>{{ $car->type }}</td>
                                <td>{{ $car->transmisi }}</td>
                                <td>{{ $car->gas }}</td>
                                <td>{{ $car->color }}</td>
                                <td>{{ $car->capacity }}</td>
                                <td>{{ $car->facility }}</td>
                                <td>{{ $car->plat }}</td>
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