@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Crud</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
   
    <div class="container ">
    <div class="d-flex justify-content-between  py-3">
    <div class="h4">Edit Employee</div>
    <div><a href="{{route('employees.index')}}" class="btn btn-primary">Back</a></div>
    </div>
    <form action="{{route('employees.update',$employee->id)}}"  method="post" enctype="multipart/form-data">
      @csrf
      @method('put')
    <div class="card border-0 shadow-lg">
        <div class="card-body">



@if(Session::has('error'))
<div class="alert alert-danger">
{{Session::get('error')}}
</div>
@endif

          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" 
            placeholder="Enter your Name" class="form-control
            @error('email') is-invalid @enderror"  value="{{old('name',$employee->name)}}">
            @error('name')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">Email Id</label>
            <input type="email" name="email" id="email" 
            placeholder="Enter your email" class="form-control
            @error('email') is-invalid @enderror"  value="{{old('email',$employee->email)}}">
            @error('email')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea type="text" name="address" id="address" cols="30" rows="4"
            placeholder="Enter Your Address" class="form-control"
            >{{old('address',$employee->address)}}</textarea>
          </div> 
          
        <div class="mb-3">
            <label for="image" class="form-label"></label>
            <input type="file" name="image" class="@error('image') is-invalid @enderror"  >
            @error('image')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
            @if($employee->image !='' && file_exists(public_path().'/uploads/employees/'.$employee->image))
            <img src="{{url('/uploads/employees/'.$employee->image)}}"  height="100" width="100" class="rounded-circle">
            @endif
        </div>

      </div>
    </div>
    <button class="btn btn-primary">Save Changes</button>
</form>
</div>
@endsection