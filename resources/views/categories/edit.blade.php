@extends('layouts.app')
@section('content')
<div class="h3 text-center">EDIT CATEGORY </div>

<form action="{{route('category.update',$category->id)}}"  method="post" enctype="multipart/form-data" class="col-10 m-auto">
  @csrf
  @method('put')
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
        <label for="name" class="form-label">Category Name</label>
        <input type="text" name="category_name" id="category_name" 
        placeholder="Enter your Name" class="form-control
        @error('category_name') is-invalid @enderror"  value="{{old('category_name',$category->category_name)}}">
        @error('category_name')
        <p class="invalid-feedback">{{$message}}</p>
        @enderror
      </div>
    </div>
    <div class="text-center my-2">
      <button class="btn btn-primary">Save Changes</button>
   </div>
    </div>
</div>
</form>
@endsection