@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Register Client</h4>

@stop

@section('pagecomment')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Register Client</li>
</ol>
@stop


@section('content')

@include('admin.layouts.error')


<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-0 header-title">Register Client</h4>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Register Clients!</strong> Here you can register Clients
                </div>

                <div class="p-1">

                   

                    <!-- Tab panes -->
                <div class="button-group text-center pb-2">
                    <button class="btn btn-primary" id="individual" onclick="individual()"> Individual</button>
                    <button class="btn btn-success" id="group"  onclick="group()"> Group</button>
                </div>

                

                            <div class=" p-4" style="display:none" id="formShow1">

                          
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h4 class="text-center card-title text-white"> <i class="fas fa-user-plus text-white"></i>  Individual Client </h4>                               
                                    </div>
        

                                    <div class="card-body p-2">

                                        <form action="{{ route('clients.store')}}" method="post"  id="createClientForm">

                                            {{ csrf_field()}}

                                            <div class="row">


                                                 <div class="col-6">

                                                    <div class="form-group">
                                                        <label for="fullName">Full Name</label>
                                                        <input type="text" name="fullName" id="fullName" required  data-parsley-trigger="keyup" class="form-control" placeholder="Enter Client Name" >
                                                        <div id="exists"> 
                                                        </div>
                                                    </div>
                                                
                                                    
                                                    <div class="form-group">
                                                        <label for="pcontact">Primary Contact (Begin with Country Code like(256))</label>
                                                        <input type="text" name="pcontact" required id="" class="form-control" placeholder="Enter Primary Contact" data-parsley-type="digits"  data-parsley-trigger="keyup" data-parsley-maxlength="12" data-parsley-minlength="12">
                                                    </div>
                
                                                    
                                                    <div class="form-group">
                                                        <label for="otherContact">Other Contact (Begin with Country Code like(256))</label>
                                                        <input type="text" name="otherContact"   id="" class="form-control" placeholder="Enter other Contact" data-parsley-type="digits"  data-parsley-trigger="keyup" data-parsley-maxlength="12" data-parsley-minlength="12">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email">Client Email</label>
                                                        <input type="email" name="email"   id="" class="form-control" data-parsley-type="email" data-parsley-trigger="keyup" placeholder="Enter Client Email" >
                                                    </div>


                                                  
                                           </div>


                                           <div class="col-6">

                                                    
                                                <div class="form-group">
                                                    <label for="address">Client Address</label>
                                                    <input type="text" name="address" id="" required class="form-control" placeholder="Enter client address"  >
                                                </div>



                                                 

                                                    <div class="form-group">
                                                                                  
                                                       <input type="hidden" name="clientType" value="1">
                                                    </div>

                                                
                                                    <div class="form-group">
                                                        <label for="about">What Conclusions have you made with the Client</label>                                        
                                                        <textarea class="form-control tiny" name="about" id="" rows="3" placeholder="About client" ></textarea>
                                                    </div>

                                                    </div>

                                                </div>  
                                
                                                <div class="form-group">                  
                                                    <button type="submit" name="submit"  class="btn btn-primary btn-block">Register Individual</button>                  
                                                </div>

                                        </form>

                                       
                                    </div>

                                </div>

                             </div>


                    
                    
                    <div class=" p-4" style="display:none" id="formShow2">

                        <div class="card">

                            <div class="card-header bg-primary">
                                <h4 class="text-center card-title text-white"> <i class="fas fa-users text-white"></i>  Company/Organisation </h4>                               
                            </div>

                            <div class="card-body p-2">

                                <form action="{{ route('clients.store')}}" method="post"  id="createClientForm">

                                    {{ csrf_field()}}
            
                                    <div class="row">
            
            
                                        <div class="col-6">
            
                                                <div class="form-group">
                                                    <label for="fullName">Full Name</label>
                                                    <input type="text" name="fullName" id="fullName" required  data-parsley-trigger="keyup" class="form-control" placeholder="Enter Client Name" >
                                                    <div id="exists"> 
                                                    </div>
                                                </div>
                                            
                                                
                                                <div class="form-group">
                                                    <label for="pcontact">Primary Contact (Begin with Country Code like(256))</label>
                                                    <input type="text" name="pcontact" required id="" class="form-control" placeholder="Enter Primary Contact" data-parsley-type="digits"  data-parsley-trigger="keyup" data-parsley-maxlength="12" data-parsley-minlength="12">
                                                </div>
            
                                                
                                                <div class="form-group">
                                                    <label for="otherContact">Other Contact (Begin with Country Code like(256))</label>
                                                    <input type="text" name="otherContact"   id="" class="form-control" placeholder="Enter other Contact" data-parsley-type="digits"  data-parsley-trigger="keyup" data-parsley-maxlength="12" data-parsley-minlength="12">
                                                </div>
            
                                                <div class="form-group">
                                                    <label for="email">Client Email</label>
                                                    <input type="email" name="email"    id="" class="form-control" data-parsley-type="email" data-parsley-trigger="keyup" placeholder="Enter Client Email" >
                                                </div>
            
            
            
                                       </div>
            
            
                                       <div class="col-6">


                                                 
                                        
                                            <div class="form-group">
                                                <label for="address">Client Address</label>
                                                <input type="text" name="address" id="" required class="form-control" placeholder="Enter client address" data-parsley-pattern="[a-zA-Z]+$" data-parsley-trigger="keyup">
                                            </div>
            
            
                                              
            
            
                                               
                                                <div class="form-group">
                                                                                                  
                                                    <input type="hidden" name="clientType" value="2">
                                                 </div>
            
                                            
                                                <div class="form-group">
                                                    <label for="about">What Conclusions have you made with the Client</label>                           
                                                    <textarea class="form-control tiny" name="about" id="" rows="3" placeholder="About client" ></textarea>
                                                </div>
            
                                                
                
            
                                                </div>
            
                                            </div> 
                                            
                                            <div class="form-group">                  
                                                <button type="submit" name="submit"  class="btn btn-primary btn-block">Register Company/Group</button>                  
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