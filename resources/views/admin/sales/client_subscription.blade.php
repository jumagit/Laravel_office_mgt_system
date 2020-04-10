@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Subscribers</h4>

@stop

@section('pagecomment')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Subscribers</li>
</ol>
@stop


@section('content')  

   
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
            
                <h4 class="mt-0 header-title">Client Subscriptions</h4>
            
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>View  Subscribers!</strong> Here you can view all Subscriptions for <dd class="badge badge-danger f1">{{ $clientName}}</dd> 
                      
                    
                    </div>

                    <div class="row">

                                <div class="m-auto">

                                    <table class="table table-bordered " style="width:100%"">
                                        <thead class="">
                                            <tr>
                                                <th>No</th>
                                                <th>Client Name</th>
                                                <th>Amount Subscribed</th>
                                                <th>Subscription Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                                @foreach ($subscriptions as $subscription)
                                                    
                                            
                                                        <tr>
                                                            <td scope="row">{{ $loop->iteration }}</td>
                                                            <td>{{$subscription->other_charges->sale->client->fullName}}</td>
                                                            <td>{{ $subscription->income}}</td>
                                                            <td>{{ $subscription->service_end_date}}</td>
                                                        </tr>

                                                @endforeach
                                            
                                            </tbody>
                                    </table>

                                </div>


                    </div>                
               
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

  

@endsection