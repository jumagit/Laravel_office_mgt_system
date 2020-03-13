@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> View All Trashed Users</h4>

@stop

@section('pagecomment')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Users</li>
</ol>
@stop


@section('content')  

   
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
            
                <h4 class="mt-0 header-title">View All Trashed Users</h4>
            
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>View Trashed Users!</strong> Here you can view all Trashed Users
             </div>
                
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>lastname</th>
                        <th>Username</th>
                        <th>Email Address</th>  
                        
                        <th><i class="mdi mdi-delete"></i></th>
                        <th><i class="fas fa-undo"></i></th>
                    
                    </tr>
                    </thead>


                    <tbody>

                    @if($users->count() > 0)

                      @foreach($users as $user)

                                <tr>
                                    <td>{{$user->firstname }} </td>
                                    <td>{{$user->lastname }} </td>
                                    <td>{{$user->name }} </td>
                                    <td>{{$user->email}}</td>                       
                                    <td><a href="{{ route('user.restore',['id'=>$user->id]) }}" class="btn btn-primary"> <i class="fas fa-undo"></i></a></td>                                  
                                    <td><a href="{{ route('user.kill',['id'=>$user->id]) }}" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>  </td>
                                  
                                </tr>

                        @endforeach

                    @else

                    <tr>

                        <th colspan="12" class="text-center">
                           No Trashed users Found
                        </th>
    
                    </tr>



                    @endIf

                 
                   
                  
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

  

@endsection