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
              <form id="show_student" class="form-horizontal toggleForm" action="{{ route('register')}}" method="post">
                  @csrf
                  <div class="form-group">
                      <label for="username">User Name <span class="text-danger">*</span></label>
                      <input type="text" name="username" id="username" placeholder="Enter Your Phone Number" autocomplete="off"
                             class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                      <span class="spin"></span>
                      @error('username')
                      <strong class="text-danger">{{ $errors->first('username') }}</strong>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label class="form-label" for="full_name">Full Name</label>
                      <div class="d-flex">
                          <input type="text" name="full_name" id="full_name" placeholder="Enter Your full_name"
                                 class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name') }}" required>
                          <span class="mt-1 "><i class="fa fa-duotone fa-envelope icon login-icon"></i></span>
                      </div>

                      <span class="spin"></span>
                      @error('full_name')
                      <strong class="text-danger">{{ $errors->first('full_name') }}</strong>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="phone">Phone <span class="text-danger">*</span></label>
                      <input type="number" name="phone" id="phone" placeholder="Enter Your Phone Number" autocomplete="off"
                             class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                      <span class="spin"></span>
                      @error('phone')
                      <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label class="form-label" for="email">Email</label>
                      <div class="d-flex">
                          <input type="text" name="email" id="email" placeholder="Enter Your email"
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

                  <div class="form-group">
                      <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                      <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Your Password" autocomplete="off"
                             class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
                      <span class="spin"></span>
                      @error('password_confirmation')
                      <strong class="text-danger">{{ $errors->first('password_confirmation') }}</strong>
                      @enderror
                  </div>




                  <div style="text-align: center" class="row mt-3">
                      <div class="text-right d-flex justify-content-center">
                          <button class="btn btn-success text-center w-full" type="submit">Register</button>
                      </div>
                  </div>
              </form>
          </div>

      </div>
  </div>

@endsection


