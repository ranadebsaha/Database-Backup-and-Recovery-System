<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DBRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container p-4">
      <div class="m-3">
                    <a class="bg-primary text-white p-2" href="{{url('/')}}">Register</button>
                    <a class="ml-2 bg-primary text-white p-2" href="{{url('/admin')}}">Admin</a>
</div>
                    <div
        class="table-responsive"
      >
        <table
          class="table table-primary"
        >
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Address</th>
              <th scope="col">City</th>
              <th scope="col">Zip Code</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr class="">
              <td scope="row">{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->address}}</td>
              <td>{{$user->city}}</td>
              <td>{{$user->zipcode}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</div>
      
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>