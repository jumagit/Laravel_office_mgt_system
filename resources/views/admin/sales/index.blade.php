@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> View Sales</h4>

@stop

@section('pagecomment')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Project Sales</li>
</ol>
@stop


@section('content')  

   
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
            
                <h4 class="mt-0 header-title">View Sales</h4>
            
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>View Sales!</strong> Here you can view all  Sales
             </div>
                
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>                      
                    <tr>
                         <th>No</th>
                        <th>Project Sold </th>
                        <th>Sold To </th>
                        <th>Amount  Sold </th>
                        <th>Amount Paid </th>
                        <th>Made by </th>
                        <th>Sold on </th>
                        <th>Next p. Date</th>
      
                        <th><i class="fas fa-trash-alt"></i></th>
                        <th><i class="fas fa-eye"></i></th>
                    </tr>
                    </thead>


                    <tbody>

                        @if ($sales->count() > 0)

                        @foreach ($sales as $sale)

                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>
                                @if (  $sale->project()->count() > 0)
                                     {{ $sale->project->projectName}} 
                                @else
                                    No Project
                                @endif
                            
                            </td> 
                            <td><a href="{{ route('category.edit',['id'=>$sale->id])}}">{{$sale->client->fullName}}</a></td> 
                            <td> {{ $sale->amount_sold}} </td> 
                            <td> {{ $sale->amount_paid}} </td> 
                            <td>{{ $sale->user->name}}</td>
                            <td>{{ $sale->created_at->toFormattedDateString()}}</td>
                            <td>{{$sale->nextPDate}}</td>
                            
                           
                            <td> <a href="{{ route('category.destroy',['id'=>$sale->id])}}" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt text-danger"></i></a></td>
                            <td><i class="fas fa-eye"></i></td>
                        </tr>
                        
                            
                        @endforeach

                        @else 
                       
                        <tr>

                            <th colspan="5" class="text-center">
                            No Sales Found
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