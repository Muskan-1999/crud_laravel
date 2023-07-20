@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="d-flex justify-content-between  py-3">
        <div class="h4">Edit Employee</div>
        <div><a href="{{route('subcategory.index')}}" class="btn btn-primary">Back</a></div>
    </div>
    <form action="{{route('subcategory.update',$subcategory->id)}}"  method="post" enctype="multipart/form-data">
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
            @error('name') is-invalid @enderror"  value="{{old('name',$subcategory->name)}}">
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
                    <option value="{{$item->id}}" @if ($subcategory->category_id==$item->id)
                        selected
                    @endif>{{$item->category_name}}</option>  {{$item}}
                @endforeach
              </select>
            </div>
          </div>
        </div>
    </div>
    <button class="btn btn-primary">Save Changes</button>
</form>
</div>
@endsection