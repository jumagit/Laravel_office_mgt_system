@extends('admin.layouts.master')

@section('page')
<h4 class="page-title">Dashboard</h4>

@stop

    @section('pagecomment')
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Welcome to nugsoft_cms Dashboard</li>
        </ol>
    @stop


@section('content')



    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <h6 class="text-uppercase verti-label text-white-50">Projects</h6>
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Projects</h6>
                                <h3 class="mb-3 mt-0">{{ $project->count() }}</h3>
                                <div class="col-sm-12">
                                    <a href="{{ route('projects')}}" class="btn btn-light text-info"> <i class="fas fa-cog"></i>  View Details</a> 
                                    </div>
                                </div>
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-cube-outline display-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <h6 class="text-uppercase verti-label text-white-50">Users</h6>
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Users</h6>
                                <h3 class="mb-3 mt-0">{{ $user->count() }}</h3>
                                <div class="col-sm-12">
                                    <a href="{{ route('users')}}" class="btn btn-light text-info"> <i class="fas fa-cog"></i>  View Details</a> 
                                    </div>
                                </div>
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-account-multiple display-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <h6 class="text-uppercase verti-label text-white-50">Clients</h6>
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Clients</h6>
                                    <h3 class="mb-3 mt-0">{{ $client->count() }}</h3>

                                    <div class="col-sm-12">
                                        <a href="{{ route('clients')}}" class="btn btn-light text-info"> <i class="fas fa-cog"></i>  View Details</a> 
                                        </div>
                                   
                                </div>
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-account-group display-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <h6 class="text-uppercase verti-label text-white-50">Sales</h6>
                                <div class="text-white">
                                    <h6 class="text-uppercase mt-0 text-white-50">Sales</h6>
                                <h3 class="mb-3 mt-0">{{  $sale->count() }}</h3>
                                <div class="col-sm-12">
                                <a href="{{ route('sales')}}" class="btn btn-light text-info"> <i class="fas fa-cog"></i>  View Details</a> 
                                </div>
                                   
                                </div>
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-briefcase-check display-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

           
            
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 border-right">
                                    <h4 class="mt-0 header-title mb-4">Sales Report</h4>
                                    <canvas id="canvas" height="280" width="600">
                                      
                                    </canvas>
                                </div>

                                <div class="col-xl-6 ">
                                    <h4 class="mt-0 header-title mb-4">Yearly</h4>
                                    <canvas id="canvas1" height="280" width="600"></canvas>
                                </div>
                            
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end col -->
                
              
            </div>
            <!-- end row -->
         
            <!-- end row -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Latest Trasaction</h4>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                      <tr>
                                        <th >Id</th>
                                        <th >Sold To</th>
                                        <th colspan="2">Details</th>
                                        <th >Made by</th>
                                        <th>Created </th>
                                        <th >Status</th>
                                        <th  >Edit</th>
                                       
                                      </tr>
                                    </thead>
                                    <tbody>


                                        @if ($transactions->count() > 0)


                                        @foreach ($transactions as $transaction)

                                        <tr>
                                           
                                            <td>
                                               {{$transaction->id}}
                                            </td>


                                            <td>
                                                {{ $transaction->client->fullName}}

                                            </td>

                                            <td>

                                                {{$transaction->activity}}

                                            </td>

                                            <td></td>

                                            <td>
                                                {{$transaction->user->name}}

                                            </td>

                                            
                                            <td>
                                                {{$transaction->created_at->diffForHumans()}}
                                            </td>

                                            <td>

                                                @if($transaction->sale->payment_status = 0)

                                                       <span class="badge badge-success">Creditor</span>

                                                @elseif($transaction->sale->payment_status = 1) 

                                                       <span class="badge badge-danger">Debtor</span>


                                                @else 

                                                       <span class="badge badge-primary">Nil</span>

                                                @endif
                                                
                                            
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                </div>
                                            </td>
                                          </tr>


                                            
                                        @endforeach

                                        @else 
                       
                                        <tr>
                
                                            <th colspan="5" class="text-center">
                                            No  Transactions  Found so far
                                            </th>
                        
                                        </tr>
                


                                        @endif
                                    
                                      
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Latest Order</h4>
                            <div class="table-responsive order-table">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                        <th scope="col">(#) Id</th>                                       
                                        <th scope="col">Transaction Id</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Amount Recieved</th>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">Transaction Date</th>
                                                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($sale_details->count() > 0)

                                        @foreach ($sale_details as $sale_detail)
                                       
                                        <tr>
                                             <td scope="row">{{ $loop->iteration }}</td>
                                             <td>{{$sale_detail->transaction_id}}</td>
                                             <td>{{$sale_detail->sale->project->projectName}}</td>
                                             <td>{{$sale_detail->amount}}</td>
                                             <td>{{$sale_detail->sale->client->fullName}}</td> 
                                             <td>{{$sale_detail->created_at}}</td>                                            
                                        </tr>
                                        @endforeach

                                        @else 
                                       
                                        <tr>
                
                                            <th colspan="5" class="text-center">
                                            No Recent Sales Found
                                            </th>
                        
                                        </tr>
                                            
                                    @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end page content-->

</div>
   
@stop


