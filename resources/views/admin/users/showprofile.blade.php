@extends('admin.layouts.master')

    @section('page')

       <h4 class="page-title">  User Profile</h4>

    @stop

    @section('pagecomment')

            <ol class="breadcrumb">
                <li class="breadcrumb-item active"> User Profile</li>
            </ol>
    @stop


@section('content')


        <div class="row">
             <div class="col-lg-12">
                <div class="card m-b-20">
                    <div class="card-body">

                         <h4 class="mt-0 header-title">View Profile </h4>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>User Profile!</strong> Here you can view your User Profile
                            </div>

                        <div class="p-2">


                            <div class="row">



                                <div class="col-lg-4 col-md-4 col-sm-12 border-right">

                                     <div class="m-auto d-block text-center">

                                        <img src="{{$user->profile->avatar}}" class="img img-fluid img-thumbnail rounded-circle " style="height:200px;width:200px;" alt="Profile Image">
                                      
                                     <hr>

                                     <h4>{{$user->firstname}} {{$user->lastname}}</h4>

                                    
                                    
                                    </div>

                                    
                                  


                                </div>



                                <div class="col-lg-8 col-md-8 col-sm-12">

                                    <div class="d-block text-right">

                                        <a href="{{ route('user.profile')}}" class="btn btn-primary">  <i class="fas fa-edit"></i>  Edit Profile</a>

                                    </div>

                                   
                                        <br>

                                   <div class="row">

                                            <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="name">Username</label>
                                                        <input type="text" name="name"  disabled value="{{ $user->name }}" class="form-control form-control-lg">
                                                    </div>

                                            </div>

                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label for="name">Previlages</label>

                                                    @if($user->admin == 1)

                                                    <input type="text"  disabled value="Administrator" class="form-control form-control-lg" >

                                                    @else 

                                                    <input type="text"  disabled value="Not Administrator" class="form-control form-control-lg" >



                                                    @endif
                                                   
                                                </div>

                                        </div>

                                       
                                   </div>

                                    <div class="form-group">
                                        <label for="email">User Email</label>
                                        <input type="text" name="email" id="" disabled class="form-control form-control-lg" value="{{ $user->email }}" >
                                    </div>


                                    <div class="form-group">
                                        <label for="aboout">About</label>
                                        <input type="text" name="about"  disabled value="{{  strip_tags($user->profile->about) }}" class="form-control form-control-lg" placeholder="Enter Full Name" data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup">
                                    </div>




                                  

                                    
                                </div>

                            </div>

                            

                                  

                                



                                </div>

                            </div>


                        </div>



                    </div> <!-- end col -->


                </div>


@endsection