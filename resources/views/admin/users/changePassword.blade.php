        @extends('admin.layouts.master')

            @section('page')

            <h4 class="page-title">  Change Password</h4>

            @stop

            @section('pagecomment')

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"> Change Password</li>
                    </ol>
            @stop


        @section('content')


                <div class="row">


                    <div class="col-lg-12">


                        <div class="card m-b-20">


                            <div class="card-body">

                            
                                <h4 class="mt-0 header-title text-center"> <i class="mdi mdi-lock"></i> Change Password </h4>
                                                             <br>
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Change Password!</strong> Here you can change your password to a new one you can Remember
                                    </div>

                                    <div class=" p-2">

                                            <div class="row">


                                                    <div class="col-lg-6  col-md-6 offset-3 col-sm-12">

                                                              
                                                        <div class="card card-body p-4">

                                                              
                                                        <form action="{{ route('user.password.update')}}" method="POST" id="formPassword">

                                                            {{ csrf_field()}}

                                                            


                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Change your Password" >
                                                                    <span id="password_error" class="text-danger"></span>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="password-confirm" >Confirm Password</label>
                                                                    <input  type="password" class="form-control" placeholder="Confirm Password" id="repassword" name="password_confirmation" >
                                                                    <span id="repassword_error" class="text-danger"></span>
                                                                </div>
                                                                


                                                                <div class="form-group">

                                                                    <input type="submit" onclick="return confirm('Are you Sure?')" name="submit" id="submitbtn" value="Change Password" class="btn btn-primary btn-block">
                                                                    <br>
                                                                    <p id="formerror" class=" text-center text-danger font-weight-bold"></p> 

                                                                </div>


                                                        </form>                                        
                                            


                                                        </div>

                                                
                                                      
                                            
                                                    </div>
                                            
                                            
                                            </div>


    
                                            
                                    </div>

                            </div>


                        </div>



                    </div> <!-- end col -->


                </div>


@endsection