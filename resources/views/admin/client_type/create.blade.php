@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Register Client Types</h4>

@stop

@section('pagecomment')
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">RegisterClient Types</li>
        </ol>
@stop


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Register Client Types</h4>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Register Project Type!</strong> Here you can register Client Types
                     </div>

                    <div class="p-1">

                        <form action="{{ route('ctype.store')}}" method="POST">

                            {{ csrf_field()}}
                              

                              <div class="form-group">
                                <label for="projectType">Client Type</label>
                                <input type="text" name="name" id="" class="form-control" placeholder="Enter Client Type" >
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


