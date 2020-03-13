@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> View Client Types</h4>

@stop

@section('pagecomment')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Client Types</li>
</ol>
@stop


@section('content')  

   
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
            
                <h4 class="mt-0 header-title">View All Client Types</h4>
            
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>View Projects Categories!</strong> Here you can view all Client Types
             </div>
                
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>                      
                    <tr>

                        <th>Client Type </th>
                       
                    <th> <a href="#"></a> <i class="fas fa-edit"></i></th>
                        <th><i class="fas fa-trash-alt"></i></th>
                        
                    </tr>
                    </thead>


                    <tbody>

                        @if ($ctypes->count() > 0)

                        @foreach ($ctypes as $ctype)

                        <tr>
                            <td> {{ $ctype->name}} </td>   
                            <td> <a href="{{ route('ctype.edit',['id'=> $ctype->id])}}"><i class="fas fa-edit text-primary"></i></a></td>
                            <td> <a href="{{ route('ctype.destroy',['id'=> $ctype->id])}}" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt text-danger"></i></a></td>
                           
                        </tr>
                        
                            
                        @endforeach

                        @else 
                       
                        <tr>

                            <th colspan="5" class="text-center">
                            No Published Client Types Found
                            </th>
        
                        </tr>


                       

                       
                            
                    @endif
                   

                  

                  

            
                   
                  
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

  

@endsection