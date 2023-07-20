@extends('layouts.app')
@section('content')

<div class="container ">
    <div class="d-flex justify-content-between  py-3">
    <div class="h4">EDIT PRODUCT</div>
    <div><a href="{{route('products.index')}}" class="btn btn-primary">Back</a></div>
    </div>

    <form action="{{route('products.update',$product->id)}}" method="post"   enctype="multipart/form-data">
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
              <label for="name" class="form-label">Name<i class="text-danger">****</i></label>
              <input type="text" name="name" id="name" 
              placeholder="Enter your Name" class="form-control
              @error('name') is-invalid @enderror"   value="{{old('name',$product->name)}}" >
              @error('name')
              <p class="invalid-feedback">{{$message}}</p>
              @enderror
              <strong id="error1" class="text-danger"></strong>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" id="description" cols="30" rows="4"
                placeholder="Enter Description" class="form-control" "
                >{{old('address',$product->description)}}</textarea>
              </div> 
              
              <div class="mb-3">
                <label for="">Choose Category<i class="text-danger-bold">****</i></label>
                <select name="category" id="categoryId" class="form-control @error('category') is-invalid @enderror" onchange="changeSubCategory()">
                 <option value="">select</option>
                    @foreach(App\Models\Category::all() as $key=> $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
               </select>
             @error('category')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
          </div>

            <div class="form-group">
                <label for="">Choose Subcategory<i class="text-danger-bold">*****</i></label>
                <select name="subcategory" id="subcategory"
                    class="form-control @error('subcategory') is-invalid @enderror">
                    <option value="">select</option>
                </select>
                @error('subcategory')
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>

        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Save Details</button>
</form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript">
            function changeSubCategory(){
            var catId = document.getElementById('categoryId').value;
            $.ajax({
                            url: '/subcatgories/' + catId,
                            type: "GET",
                            // dataType: "json",
                            success: function (res) {
                                var select = document.getElementById("subcategory");
                                select.innerHTML = "";
                                res.data.forEach(element => {
                                var option1 = document.createElement("option");
                                option1.value = element.id;
                                option1.text = element.name;
                                select.appendChild(option1);
                                });
                            }

                        })
            
        }
        </script>
@endsection