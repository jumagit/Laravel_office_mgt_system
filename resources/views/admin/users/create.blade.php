@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Register User</h4>

@stop

@section('pagecomment')
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Register User</li>
        </ol>
@stop


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Register User</h4>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Register User!</strong> Here you can register User
                     </div>

                    <div class="p-2">

                        <form class="form-horizontal m-t-10" method="POST" action="{{ route('user.store') }}" id="userRegisterValidation">

                            {{ csrf_field() }}


                            <div class="row">


                                <div class="col-6">

                                    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                        <label for="firstname" class="col-md-4 control-label">First Name</label> 
                                            <input id="firstname" type="text" class="form-control" name="firstname" data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup"  value="{{ old('firstname') }}" required  placeholder="Enter Username" required>
            
                                            @if ($errors->has('firstname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                            @endif  
                                            
                                               {{--table to show result--}}

                                   

                                            <table class="table table-bordered" id="result">
                                            
                                                <tbody >
                                                
                                                </tbody>
                                            </table>


                                            {{--table to show result--}}


                                    </div>


                                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                        <label for="lastname" class="col-md-4 control-label">Last Name</label>          
                                     
                                            <input id="lastname" type="text" class="form-control" name="lastname"   data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup"   value="{{ old('lastname') }}" required  placeholder="Enter Lastname" required>
            
                                            @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif
                                        
                                    </div>



                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" ">Username</label>                         
                                            <input id="name" type="text" name="name" class="form-control"   data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup"   placeholder="Enter Username" name="name" value="{{ old('name') }}" required >
            
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        
                                    </div>



                                
                                </div>


                                <div class="col-6">

                                   
            
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">E-Mail Address</label>
            
                                            <input id="email" type="email" class="form-control" placeholder="Enter Email Address" name="email"      data-parsley-type="email" data-parsley-trigger="keyup"     value="{{ old('email') }}" required>
            
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



                                
                                </div>


                            </div>
    
                            
    
                           
                                <div class="form-group row m-t-10">
    
                                    
                                    <div class="col-12 text-right">
                                        <button class="btn btn-block btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                </div>
    
                               
                            
                        </form>
                     
                    </div>

                </div>
            </div>

           

        </div> <!-- end col -->
    </div>
     





@endsection


