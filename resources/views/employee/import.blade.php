@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('assets/css/import.css')}}">
  </head>
  
  <form action="{{route('import.employee')}}" method="post" enctype="multipart/form-data">
    @csrf
   
    @if(session('message'))
     <div class="alert alert-success">
       Success{{ session('message') }}
    </div>
    @endif
    @if(session('error'))
     <div class="alert alert-danger">
      <strong>ERROR !</strong> {{ session('error') }}
    </div>
    @endif
      
    <h1>IMPORT FILE</h1>
      <div class="inset">
    <p>
    <label for="excel_file" class="block- mb-2 col px-4 mx-4 text-light">File Import</label>
    <input type="file" id="excel_file" name="excel_file" class="py-2 px-4 border border-grey-100">
    @error('excel_file')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
    </p>
</div>
      <p class="p-container">
 <input type="submit"  value="Import">
      </p>
    </form>

@endsection