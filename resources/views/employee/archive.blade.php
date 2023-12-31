@extends('layouts.app')
@section('content')
   
    <div class="row my-3">
       
        
<div class="h4 col-8 px-5">Soft Delete Employees Details </div>

</div>

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

    <div class="card border-0 shadow-lg">
        <div class="card-body">
            <table class="table table-stripped">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email ID</th>
                    <th>Address</th>
                    <th></th>
                    <th></th>
                </tr>
                @if($employees->isNotEmpty())
                @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>
                        @if($employee->image !='' && file_exists(public_path().'/uploads/employees/'.$employee->image))
                        <img src="{{url('/uploads/employees/'.$employee->image)}}"  height="50" width="50" class="rounded-circle">
                        @else
                        <img src="{{url('/assets/images/no-image.png')}}"  height="50" width="50" class="rounded-circle">
                        @endif
                    </td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->address}}</td>
                    <td>
                     <form action="{{route('employees.destroy',$employee->id)}}">
                        @csrf
                        <button class="btn btn-success">Delete</button>
                    </form>
                    </td>
                    <td>
                        <a href="/restore/{{$employee->id}}" class="btn btn-success">restore</a>
                    </td>
              </tr>  
      @endforeach
@else
<td colspan="6">Record Not Found</td>
                @endif
            </table>
        </div>
    </div>
</div>
<div>
    <a href="{{route('employees.index')}}" class="btn btn-success">Back</a>
</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
