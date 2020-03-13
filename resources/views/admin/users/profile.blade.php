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

                         <h4 class="mt-0 header-title">User Profile </h4>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>User Profile!</strong> Here you can Edit your User Profile
                            </div>

                        <div class="p-2">

                                <form action="{{ route('user.profile.update')}}" method="POST" enctype="multipart/form-data" id="userProfileValidation">

                                {{ csrf_field()}}

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Enter Full Name" data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">User Email</label>
                                        <input type="text" name="email" id="" class="form-control" value="{{ $user->email }}" >
                                    </div>



                                    <div class="form-group">
                                            <label for="avatar">Upload New Avatar</label>
                                            <input type="file" name="avatar" id="" class="form-control" >
                                    </div>


                                    <div class="form-group">
                                            <label for="about">About You</label>
                                            <textarea name="about" cols="6" rows="6"  class="form-control tiny"  value="{{ $user->profile->about }}"  >
                                                {{ $user->profile->about }}
                                            </textarea>
                                    </div>


                                    <div class="form-group">

                                        <input type="submit" name="submit" class="btn btn-primary btn-block">
                                    
                                    </div>


                                </form>



                                </div>

                            </div>


                        </div>



                    </div> <!-- end col -->


                </div>


@endsection