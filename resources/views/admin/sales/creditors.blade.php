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
            
                <h4 class="mt-0 header-title">View Creditors</h4>
            
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>View  Creditor Sales!</strong> Here you can view all Creditor Clients
             </div>
                
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>                      
                    <tr>
                         <th>No</th>
                        <th>Project Sold </th>
                        <th>Client Name </th>
                        <th>Amount  Paid </th>
                        <th>Balance</th>
                        <th>Made by </th>
                        <th>P Made on </th>
                        <th>Next p. Date</th>
      
                        <th> <button disabled="disabled" class="btn btn-primary"> <i class="fas fa-credit-card"></i> Pay</button></th>
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
                            <td><a href="{{ route('sale.payment',['id'=>$sale->id]) }}">{{$sale->client->fullName}}</a></td> 
                           
                            <td> {{ $sale->amount_paid}} </td>
                            <td> {{ $sale->balance}} </td> 
                            <td>{{ $sale->user->name}}</td>
                            <td>{{ $sale->created_at->toFormattedDateString()}}</td>
                            <td>{{$sale->nextPDate}}</td>

                            <td>

                                <button type="button" 
                                class="btn btn-primary waves-effect waves-light" 
                                data-toggle="modal" data-target="#bs-example-modal-center-{{ $sale->id }}"> <i class="fas fa-credit-card"></i> Pay
                                </button>
    
                                        <div class="modal fade " id="bs-example-modal-center-{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"> 
                                            <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                            <h5 class="modal-title text-white mt-0">Make Paymentt</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                            <div class="modal-body p-2">

                                                                <form action="{{ route('sale.update',['id'=>$sale->id])}}" method="post"  id="salesCreateForm">

                                                                    {{csrf_field()}}
                                        
                                                                
                                        
                                                                            <div class="row">
                                    
                                    
                                    
                                                                                    <div class="col-6">                                
                                            
                                                                                                <div class="form-group">
                                                                                                    <label for="project_id">Project Name</label>
                                                                                                    <input type="text" name="project_id" id="" class="form-control" disabled value="{{ $sale->project->projectName}}">
                                                                                                    <input type="hidden"  value="{{$sale->project->id}}"> 
                                                                                                </div>
                                                                                                
                                                                                                <div class="form-group">
                                                                                                    <label for="client_id">Client Name</label>
                                                                                                    <input type="text" name="client_id" id="" class="form-control" disabled value="{{ $sale->client->fullName}}">
                                                                                                    <input type="hidden"  value="{{$sale->client->id}}">                                         
                                                                                                </div>
                                                
                                                                                                <div class="form-group">
                                                                                                                                    
                                                                                                <input type="hidden" name="id" value="{{ $sale->id}}">
                                                                                                </div>
                                                                                                
                                                                                                <div class="form-group">
                                                                                                    <label for="amount_paid">Amount Paid</label>
                                                                                                    <input type="text" name="amount_paid"  class="form-control " 
                                                                                                    id="amount_paid"  data-type="currency"  onkeyup="nextBalance(this.value);"  required  placeholder="Enter Amount Paid" >
                                                                                                </div>                                
                                                                                    </div>
                                    
                                    
                                                                                    <div class="col-6">
                                        
                                                                                                <div class="form-group">
                                                                                                    <label for="balance">Balance</label>
                                                                                                <input type="text" name="balance" id="balance" data-type="currency" class="form-control "   value="{{$sale->balance}}">
                                                                                                </div>
                                                
                                                                                                
                                                                                                <div class="form-group"  >
                                                                                                    <label for="newBalance"> New Balance</label>
                                                                                                    <input type="text" name="newBalance" id="newBalance" data-type="currency" class="form-control "   value="">
                                                                                                </div>
                                                            
                                                
                                                                                                <div class="form-group">
                                                                                                    <label for="nextPDate">Next Payment Date</label>
                                                                                                    <input type="text" name="nextPDate"  id="date" class="form-control date" placeholder="Next Payment  Date"  >
                                                                                                </div> 
                                                                                    
                                        
                                                                                    </div>
                                    
                                    
                                                                            </div>
                                
                                                                        {{-- row ends --}}
                                
                                                                            <div class="form-group">
                                    
                                                                                <button type="submit" class="btn btn-primary btn-block">Make Payment </button>
                                    
                                                                            </div>
                                                                            
                                                                        
                                                                </form>                        
                                                    
                                                            </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                            </td>
                            
                           
                        </tr>
                        
                            
                        @endforeach

                        @else 
                       
                        <tr>

                            <th colspan="5" class="text-center">
                            No Creditors Found
                            </th>
        
                        </tr>

                            
                    @endif

                  
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<script>


    function commasOff(amount){

      amount = amount.replace(/\,/g,'');
        
      amount = parseInt(amount);

      return amount;
      
    }

    function nextBalance(amountPaid) {

          var balance, newBalance;

           balance =  document.getElementById('balance').value;                    

           balance =   commasOff(balance);                               

           amountPaid =   commasOff(amountPaid); 

          newBalance = balance-amountPaid;

          document.getElementById('newBalance').value = newBalance;

    }
</script>


  

@endsection