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
        
  <div class="h4 col-8 px-5">Employees Details</div>
    <div class="col px-4 mx-4">
  <a href="{{route('employees.create')}}" class="btn btn-primary ml-5">+</a>
  <a href="{{route('dashboard')}}" class="btn btn-success">Dashboard</a>
  <a href="{{ route('import.view') }}" class="btn btn-danger"><i class="fas fa-file-import" style='font-size:24px'></i></a> 
  <a href="{{ route('export.employee') }}" class="btn btn-warning"><i class='fas fa-file-export' style='font-size:24px'></i></a>
  <a href="{{route('employees.archive')}}" class="btn btn-success"><i class="fa fa-archive" style="font-size:24px"></i></a>
</div>

</div>
<div class="card border-0 shadow-lg">
        <div class="card-body">
            <table class="table table-stripped">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email ID</th>
                    <th>Address</th>
                    <th>Action</th>
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
                     <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-success btn-sm">Edit</a>
                      <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$employee->id}}">
                        Delete
                      </button>

                      <!-- Modal -->
<div class="modal fade" id="exampleModal{{$employee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4>Do you really want to delete it</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="/employees/{{$employee->id}}" class="btn btn-primary">Yes Deleted </a>
        </div>
      </div>
    </div>
  </div>
</td>
</tr>  
@endforeach
@else
<td colspan="6">Record Not Found</td>
                @endif
            </table>
        </div>
    </div>
    
    <div>
        {{$employees->links()}}
    </div>
</div>


@endsection

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
