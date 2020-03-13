@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> View Clients</h4>

@stop

@section('pagecomment')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Clients</li>
</ol>
@stop


@section('content')  

   
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
            
                <h4 class="mt-0 header-title">View All Clients</h4>
            
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>View Clients!</strong> Here you can view all Registered Clients
             </div>
                
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Full Names</th>
                        <th>Client Type</th>
                        <th>Project</th>
                        <th>Primary Contact</th>                      
                        <th>Client Address</th>
                        <th>Client Email</th>
                        <th>Registration date</th>
                        <th>Registered by</th>
                        <th><i class="fas fa-edit"></i></th>
                        <th><i class="fas fa-trash-alt"></i></th>
                       
                    </tr>
                    </thead>


                    <tbody>

                    @if($clients->count() > 0)

                      @foreach ($clients as $client)

                      <tr>
                            <td> {{ $client->fullName }} </td>
                    
                            <td>
                                @if($client->cdetail->client_status == 1)

                                Continuing

                                @else

                              One Time

                                @endif
                                
                                
                    
                            <td>
                            @if($client->projects()->count()> 0)

                             @foreach ($client->projects as $project)

                             {{ $project->projectName }}
                                 
                             @endforeach

                            @endif

                            </td>
                       
                        <td>{{ $client->pcontact }}/{{ $client->otherContact }}</td>                        
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->created_at }}</td>
                        <td>{{ $client->user->name}}</td>
                        <td> <a href="{{ route('client.edit',['id'=> $client->id])}}"><i class="fas fa-edit text-primary"></i></a></td>
                        <td><a href="{{ route('client.destroy',['id'=> $client->id])}}" onclick="return confirm('Are you Sure to do Delete Client ?')"><i class="fas fa-trash-alt text-danger"></i></a></td>
                       
                    </tr>

                     @endforeach


                     @else

                     <tr>

                        <th colspan="12" class="text-center">
                        No Clients Found
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