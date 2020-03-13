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
                    
                        <h4 class="text-muted font-18 m-b-2 text-center">Free Register</h4>
                        <p class="text-muted text-center">Get your free Nugsoft account now.</p>
                 
                    <form class="form-horizontal m-t-10" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" ">Name</label>                         
                                <input id="name" type="text" class="form-control" placeholder="Enter Username" name="name" value="{{ old('name') }}" required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" placeholder="Enter Email Address" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" >Password</label>

                                <input id="password" type="password" placeholder="Enter Password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" >Confirm Password</label>

                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                        </div>

                       
                            <div class="form-group row m-t-10">

                                <div class="col-6 text-left">
                                <a href="{{ route('login')}}" class="btn btn-success w-md waves-effect waves-light" type="submit">Login Instead</a>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-10 m-b-10">
                                    <p class="font-14 text-muted mb-0">By registering you agree to the Nugsoft <a href="#" class="text-primary">Terms of Use</a></p>
                                </div>
                            </div>
                        
                    </form>
                </div>

            </div>
        </div>

       
    </div>
@endsection