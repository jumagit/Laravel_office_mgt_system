@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Search Clients</h4>

@stop

@section('pagecomment')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Search Clients</li>
</ol>
@stop


@section('content')  

   
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
            
                <h4 class="mt-0 header-title">Search Clients</h4>
            
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Search Clients!</strong> Here you can Search Clients
             </div>


           
           
                <div class="form-group">

                    <input type="text" class="form-control form-control-lg" name="search_client" id="search_client" placeholder=" Here you can Members if they exist in the Database" style="border:2px solid lightblue"><br>
                    
                </div>
        
                
              
        
                <div id="resultss">
                
                  
                </div>


                
              
           
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

  

@endsection