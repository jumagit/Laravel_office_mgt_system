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

             <div class=" d-block ">
             <a  class="btn btn-success float-right" href="{{ route('clients.create')}}" role="button"> <i class="fas fa-user-plus"></i> Create New Client</a>
             </div>

             <br><br>
                
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Full Names</th>
                      
                        <th>Client Type</th>                                              
                       
                        <th>Primary Contact</th>                      
                      
                        <th>Client Email</th>
                    
                        <th>Client Status</th>
                        <th><i class="fas fa-edit"></i></th>
                        <th><i class="fas fa-tag"></i> Add Project</th>
                        <th><i class="fas fa-trash-alt"></i></th>
                        <th><i class="fas fa-print"></i></th>
                       
                    </tr>
                    </thead>


                    <tbody>

                    @if($clients->count() > 0)

                      @foreach ($clients as $client)

                      <tr>
                            <td> {{ $client->fullName }} </td>

                          
                            <td>

                                @if($client->cdetail->ctype_id == 1)

                                  Individual

                                @else 

                                Group

                                @endif



                            </td>
                               
                    
                           
                       
                        <td>{{ $client->pcontact }}/{{ $client->otherContact }}</td>                        
                        
                        <td>{{ $client->email }}</td>
                        
                        <td>

                            @if ($client->prospective == 0)
                                Prospective
                            @else
                                Non-Prospective
                            @endif
                        </td>
                        <td> <a href="{{ route('client.edit',['id'=> $client->id])}}"><i class="fas fa-edit text-primary"></i></a></td>
                        <td> <a href="{{ route('client.project',['id'=> $client->id])}}" class="btn btn-success"><i class="fas fa-tag "></i> Add Project</a></td>
                        <td><a href="{{ route('client.destroy',['id'=> $client->id])}}" onclick="return confirm('Are you Sure to do Delete Client ?')"><i class="fas fa-trash-alt text-danger"></i></a></td>
                        <td><a href="{{ route('print.client',['id'=> $client->id]) }} " ><i class="fas fa-print text-success"></i></a></td>
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