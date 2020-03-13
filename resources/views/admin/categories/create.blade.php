@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Register Project Category</h4>

@stop

@section('pagecomment')
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Register Project Category</li>
        </ol>
@stop


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Register Project Category</h4>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Register Project Type!</strong> Here you can register Project Type
                     </div>

                    <div class="p-1">

                        <form action="{{ route('category.store')}}" method="POST">

                            {{ csrf_field()}}

                            <div class="row">


                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="projectType">Project Type</label>
                                        <input type="text" name="projectType" id="projectType" class="form-control" placeholder="Enter Project Type" >
                                        <div id="cat_exists"> 
                                        </div>
                                    </div>
        

                                </div>


                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="category_price">Monthly/Annually Project Charge</label>
                                        <input type="text" name="category_price"  class="form-control " 
                                        id="category_price"  data-type="currency"   required  placeholder="Enter Amount Paid" >
                                      </div>
                                    
                                </div>


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


