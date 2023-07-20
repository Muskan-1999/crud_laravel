<head>
  <link rel="stylesheet" href="{{asset('assets/css/register.css')}}">
</head>
<div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter your name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
         
         <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" class="form-control" name="password_confirmation" >
          </div>
        </div>
       <div class="button">
          <div class="btn-group" style="width:100%">
            <button style="width:50%" type="submit">Register</button>
            <button style="width:50%"><a href="{{ route('login') }}" class="btn btn-success btn-sm">Login Here!</a></button>
          </div>
        </div>
        </div>
      </form>
    </div>
  </div>
