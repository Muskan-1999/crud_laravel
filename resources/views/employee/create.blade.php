@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Crud</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <script src="{{{asset('assets/js/EmployeeValidation.js')}}}"></script>
  </head>
<body>
    
    <div class="container ">
    <div class="d-flex justify-content-between  py-3">
    <div class="h4">CREATE EMPLOYEE</div>
    <div><a href="{{route('employees.index')}}" class="btn btn-primary">Back</a></div>
    </div>
   <form action="{{route('employees.store')}}"  method="post" enctype="multipart/form-data">
      @csrf
    <div class="card border-0 shadow-lg">
        <div class="card-body">
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

          <div class="mb-3">
            <label for="name" class="form-label">Name <i class="text-danger">****</i></label>
            <input type="text" name="name" id="name" 
            placeholder="Enter your Name" class="form-control
            @error('name') is-invalid @enderror"  value="{{old('name')}}" onblur="val1()">
            @error('name')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
            <strong id="error1" class="text-danger"></strong>
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">Email Id<i class="text-danger">****</i></label>
            <input type="email" name="email" id="email" 
            placeholder="Enter your email" class="form-control
            @error('email') is-invalid @enderror"  value="{{old('email')}}" onblur="val2()">
            @error('email')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
            <strong id="error2" class="text-danger"></strong>
          </div>
          
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea type="text" name="address" id="address" cols="30" rows="4"
            placeholder="Enter Your Address" class="form-control"
            >{{old('address')}}</textarea>
          </div> 
          
          <div class="mb-3">
            <label for="image" class="form-label"></label>
            <input type="file" name="image" class="@error('image') is-invalid @enderror"  >
            @error('image')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>

        </div>
    </div>
    <button class="btn btn-primary">Save Details</button>
</form>
</div>
@endsection