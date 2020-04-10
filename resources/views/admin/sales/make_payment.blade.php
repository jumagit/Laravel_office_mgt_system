@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Make Payment</h4>

@stop

@section('pagecomment')
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Make Payment</li>
        </ol>
@stop


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Make Payment</h4>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Make Payment!</strong> Here you can Make Payment
                     </div>

                    <div class="p-1">

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

                            </div>
                        </div>

                      

                    </div> 
                </div>


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


