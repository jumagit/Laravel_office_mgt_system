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

                                        <h4 class="mt-0 header-title">Application Settings </h4>
                                    
                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                       
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        
                                        <strong>Application Settings!</strong> Here you can Edit Application Settings
                                    
                                    </div>

                                    <div class="p-2">

                                           {{-- form --}}

                                           <form action="{{ route('settings.update')}}" method="POST" enctype="multipart/form-data" >

                                            {{ csrf_field()}}


                                            <div class="row">



                                                <div class="col-lg-6 col-md-6 col-sm-12">

                                                    <div class="form-group">
                                                        <label for="company_name">Company Name</label>
                                                        <input type="text" name="company_name"  value="{{ $settings->company_name}}" class="form-control" placeholder="Enter Site Name" >
                                                      </div>                            
                                                  
                                      
                                                      <div class="form-group">
                                                        <label for="company_logo">Company Logo</label>
                                                      <input type="file" name="company_logo" id="" class="form-control" placeholder="" >
                                                      <img src="{{$settings->company_logo}}" alt="" style="height:80px;width:100px">
                                                     
                                                      </div>
                                      
                                                      <div class="form-group">
                                                        <label for="company_address"> Company Address</label>
                                                        <input type="text" name="company_address" value="{{ $settings->company_address}}" class="form-control" placeholder="Enter Address">
                                                       
                                                      </div>

                                      


                                                </div>



                                                <div class="col-lg-6 col-md-6 col-sm-12">


                                                    
                                                  <div class="form-group">
                                                    <label for="company_contact">Company Contact</label>
                                                    <input type="text" name="company_contact"  value="{{ $settings->company_contact}}" class="form-control" placeholder="Enter Contact">
                                                   
                                                  </div>

                                                      
                                                      
                                                      <div class="form-group">
                                                        <label for="company_email">Company Email</label>
                                                        <input type="email" name="company_email"  value="{{ $settings->company_email}}" class="form-control" placeholder="Enter Email Address">
                                                       
                                                      </div>
                                      
                                                      <div class="form-group">
                                                        <label for="company_description">Company Description</label>
                                                        <textarea name="company_description" class="form-control tiny"  cols="6" rows="6">
                                                        {{ $settings->company_description}}
                                                        </textarea>
                                                       
                                                      </div>

                                                    
                                                </div>



                                            </div>
                                              
                              
                                        
                              
                                           
                              
                                          <div class="form-group">
                              
                                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update Settings">
                                          
                                          </div>
                              
                              
                                      </form>



                                    </div>

                            </div>


                        </div>



                    </div> <!-- end col -->


                </div>

            </div>

    


@endsection