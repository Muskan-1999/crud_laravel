@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
    <div class="container ">
    <div class="d-flex justify-content-between  py-3">
    <div class="h4">CREATE SUBCATEGORY</div>
    <div><a href="{{route('subcategory.index')}}" class="btn btn-primary">Back</a></div>
    </div>
   <form action="{{route('subcategory.store')}}"  method="post" enctype="multipart/form-data">
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
            <label for="name" class="form-label"> Name <i class="text-danger">****</i></label>
            <input type="text" name="name" id="name" 
            placeholder="Enter your Subcategory" class="form-control
            @error('name') is-invalid @enderror"  value="{{old('name')}}" onblur="val1()">
            @error('name')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
           </div>
           
           <div class="mb-3">
            <label for="category_id" class="form-label"> Category ID <i class="text-danger">****</i></label>
            <div>
            <select name="category" id="">
              <option value="">Select</option>
              @foreach ($category as $item)
                  <option value="{{$item->id}}">{{$item->category_name}}</option>
              @endforeach
            </select>
          </div>
          </div>
      </div>
    </div>
    <button class="btn btn-primary mt-2 centre">Save Details</button>
</form>
</div>
@endsection