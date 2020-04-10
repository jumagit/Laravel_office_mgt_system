@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Edit Transaction</h4>

@stop

@section('pagecomment')
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Edit Transaction</li>
        </ol>
@stop


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Edit Transaction</h4>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Edit Transaction!</strong> Here you can Edit a Transaction
                     </div>

                    <div class="p-1">

                        <form action="{{ route('sales.store')}}" method="post"  id="salesCreateForm">
                            {{csrf_field()}}



                               
                             
                             <button type="submit" class="btn btn-primary btn-block">Add Sale </button>
                          </form>

                    </div>

                </div>

                       
                  
            
            
          </div>

           

        </div> <!-- end col -->
    </div>
     





@endsection


