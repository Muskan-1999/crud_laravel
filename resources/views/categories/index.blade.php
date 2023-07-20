@extends('layouts.app')
@section('content')
<div class="row my-3">
       
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

<div class="h4 col-8 px-5">Category Details</div>
<div class="col px-4 mx-4 mb-2">
 <a href="{{route('category.create')}}" class="btn btn-primary ml-5">+</a>
  <a href="{{route('dashboard')}}" class="btn btn-success">Dashboard</a>
</div>
  
<div class="card border-0 shadow-lg">
        <div class="card-body">
            <table class="table table-stripped">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
                  @if($categories->isNotEmpty())
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>
                   <a href="{{route('category.edit',$category->id)}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{route('category.destroy',$category->id)}}" class="btn btn-success btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
           <td colspan="3">
                Record Not Found</td>
                @endif
            </table>
             
</div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
