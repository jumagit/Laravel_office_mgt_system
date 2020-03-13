@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> View Project Types</h4>

@stop

@section('pagecomment')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Project Categories</li>
</ol>
@stop


@section('content')  

   
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
            
                <h4 class="mt-0 header-title">View All Projects Categories</h4>
            
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>View Projects Categories!</strong> Here you can view all Registered Project Categories
             </div>
                
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>                      
                    <tr>

                        <th>Project Categories </th>
                        <th>Annually Charge </th>
                        <th><i class="fas fa-edit"></i></th>
                        <th><i class="fas fa-trash-alt"></i></th>
                        <th><i class="fas fa-eye"></i></th>
                    </tr>
                    </thead>


                    <tbody>

                        @if ($categories->count() > 0)

                        @foreach ($categories as $category)

                        <tr>
                            <td> {{ $category->projectType}} </td>   
                            <td> {{ $category->category_price}} </td>   
                            <td> <a href="{{ route('category.edit',['id'=>$category->id])}}"><i class="fas fa-edit text-primary"></i></a></td>
                            <td> <a href="{{ route('category.destroy',['id'=>$category->id])}}" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt text-danger"></i></a></td>
                            <td><i class="fas fa-eye"></i></td>
                        </tr>
                        
                            
                        @endforeach

                        @else 
                       
                        <tr>

                            <th colspan="5" class="text-center">
                            No Published Categories Found
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