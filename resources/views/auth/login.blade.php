@extends('admin.layouts.front')

@section('content')




      <!-- Background -->
      <div class="account-pages"></div>
      <!-- Begin page -->
      <div class="wrapper-page">

          <div class="card">
              <div class="card-body">

                  <h3 class="text-center m-0">
                  <a href="{{ route('login')}}" class="logo logo-admin"><img src="assets/images/nuglogo.png" height="60" alt="logo"></a>
                  </h3>

                  <div class="p-2">
                      <h4 class="text-muted font-18 m-b-3 text-center">Welcome Back !</h4>
                      <p class="text-muted text-center">Sign in to continue to Nugsoft_cms.</p>
                 
                          <div class="card">
                            <p class="text-primary text-center" id="clockbox"> </p>
                          </div>
               
                    <form class="form-horizontal m-t-30" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                          <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="email"  required id="email" placeholder="Enter Email">
                              @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong class="text-danger">{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                          </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input type="password" class="form-control"  name="password" id="password" required placeholder="Enter password">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                          </div>


                        <div class="form-group row m-t-20">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light"  type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-10 row">

                            <div class="col-6 text-left m-t-10">
                                <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                            </div>
                            
                        </div>
                    </form>
                </div>

            </div>
        </div>

       
    </div>
@endsection
