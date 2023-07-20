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

    
    <div class="container ">
    <div class="d-flex justify-content-between  py-3">
    <div class="h4">CREATE CATEGORY</div>
    <div><a href="{{route('category.index')}}" class="btn btn-primary">Back</a></div>
    </div>
   <form action="{{route('category.store')}}"  method="post" enctype="multipart/form-data">
      @csrf
    <div class="card border-0 shadow-lg">
        <div class="card-body">
          <div class="mb-3">
            <label for="name" class="form-label">Category Name <i class="text-danger">****</i></label>
            <input type="text" name="category_name" id="category_name" 
            placeholder="Enter your Category" class="form-control
            @error('category_name') is-invalid @enderror" onblur="val1()">
            @error('category_name')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
            <strong id="error1" class="text-danger"></strong>
            </div>
          </div>
    </div>
    <button class="btn btn-primary">Save Details</button>
</form>
</div>
@endsection