<head>
  <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
</head>

<form method="POST" action="{{ route('login') }}">
  @csrf
 
  @if(session('message'))
   <div class="alert alert-success">
    <strong>Success!</strong> {{ session('message') }}
  </div>
  @endif
    
  <h1>Employer Log in</h1>
    <div class="inset">
    <p>
      <label for="email" ">EMAIL ADDRESS</label>
      <input type="email" class=" @error('email') is-invalid @enderror" id=email name="email" value="{{ old('email') }}" name="email" id="email">
       @error('email')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
  @enderror
    </p>
    <p>
      <label for="password">PASSWORD</label>
      <input type="password" name="password" id="password" class="  @error('password') is-invalid @enderror" id="password">
      @error('password')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </p>
    {{-- <p>
      <input type="checkbox" name="remember" id="remember">
      <label for="remember">Remember me </label>
    </p> --}}
    </div>
    <p class="p-container">
      <span>
        <a class="btn btn-link btn-dark" href="{{ route('register') }}">
          New Account!!Register Here.
        </a>
      </span>
     
    </p>
    <p class="p-container">
      <span>
        <a class="btn btn-link btn-dark" href="{{ route('password.request') }}">
          Forgot password ?
        </a>
      </span>
      <input type="submit" name="go" id="go" value="Log in">
    </p>
  </form>