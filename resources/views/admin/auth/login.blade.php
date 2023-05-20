@extends('layouts.auth')
@section('content')
  <div class="card ">
    <div class="card-body">
      <div class="row">
        <div class="col-12 text-center"><a href="{{ route('home') }}" class="logo logo-admin">
            <img src="{{ asset('assets/text-logo.png') }}" height="80" alt="logo">
          </a></div>
      </div>
      <div class="pl-3 pr-3 pb-3">
        <div class="row">
          <div class="col-12 text-center">
            <h3 class="m-2">Login</h3>
          </div>
        </div>
        @if(session()->has('status'))
          {!! session()->get('status') !!}
        @endif
        <form class="form-horizontal" action="{{ route('login')}}" method="post">
          @csrf
          <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <div class="d-flex">
              <input type="email" name="email" id="email" placeholder="Enter Your email"
                     class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
              <span class="mt-1 "><i class="fa fa-duotone fa-envelope icon login-icon"></i></span>
            </div>

            <span class="spin"></span>
            @error('email')
            <strong class="text-danger">{{ $errors->first('email') }}</strong>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="d-flex">
              <input type="password" name="password" id="password" placeholder="Enter Your Password" autocomplete="off"
                     class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required>
              <span class="mt-1 "><i class="fa fa-regular fa-key icon login-icon"></i></span>
            </div>

            <span class="spin"></span>
            @error('password')
            <strong class="text-danger">{{ $errors->first('password') }}</strong>
            @enderror
          </div>

          <div class="form-group row m-t-20">
            <div class="col-sm-12 text-right">
           <a href="{{ route('register') }}" class="btn btn-primary mr-1 w-md waves-effect waves-light">Register</a>
              <button class="btn btn-success w-md waves-effect waves-light" type="submit">Log In</button>

            </div>
           <a href="{{ route('password.request') }}" class=" mt-3 mx-auto">Forget Password?</a>
          </div>
        </form>
      </div>

    </div>
  </div>
@endsection
