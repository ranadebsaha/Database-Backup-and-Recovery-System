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
        <div>
      <a class="bg-primary text-white p-2" href="{{url('/list')}}">List</button>
                    <a class="ml-2 bg-primary text-white p-2" href="{{url('/admin')}}">Admin</a>
</div>
                    <form class="row g-3" method="post" action="{{url('/')}}/">
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
                    
            @csrf
              <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="inputEmail4" value="{{old('name')}}">
    @error('name')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="inputEmail4" value="{{old('email')}}">
    @error('email')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" value="{{old('address')}}">
    @error('address')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" name="city" class="form-control" id="inputCity" value="{{old('city')}}">
    @error('city')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip Code</label>
    <input type="number" class="form-control" name="zipcode" id="inputZip" value="{{old('zipcode')}}">
    @error('zipcode')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="checkbox">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
      @error('checkbox')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>