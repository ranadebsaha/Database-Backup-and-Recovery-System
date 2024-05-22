<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBRS</title>
</head>
<body>
<div class="container p-4">
@if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                    @endif
      <div class="m-3">
                    <a class="bg-primary text-white p-2" href="{{url('/')}}">Backup</a>
                    <a class="ml-2 bg-danger text-white p-2" href="{{url('/logout')}}">Logout</a>
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
              <th scope="col">Action</th>
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
              <td><a href="{{url('/delete')}}/{{$user->id}}">Delete</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</div>
</body>
</html>