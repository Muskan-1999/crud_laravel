@extends('layouts.app')
@section('content')
   
    <div class="row my-3">
       
<div class="h4 col-8 px-5">Users Details</div>
<div class="col px-4 mx-4 ">
    <a href="{{route('dashboard')}}" class="btn btn-success">Dashboard</a>    
</div>
  </div>

@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif

    <div class="card border-0 shadow-lg">
        <div class="card-body">
            <table class="table table-stripped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email ID</th>
                    <th>Status</th>
                </tr>
                @if($users->isNotEmpty())
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      @if($user->status=='active')
                    <a href="{{url('/status-update',$user->id)}}" class="btn 
                    btn-success">Active</a>
                         @else
                         <a href="{{url('/status-update',$user->id)}}" class="btn 
                            btn-danger">InActive</a>
                        @endif
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
        {{$users->links()}}
    </div>
</div>


@endsection

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
