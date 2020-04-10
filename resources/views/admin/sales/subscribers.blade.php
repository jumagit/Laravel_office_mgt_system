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
            
                <h4 class="mt-0 header-title">View Subscribers</h4>
            
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>View Subscribers!</strong> Here you can view all Subscribers
             </div>
                
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>                      
                    <tr>
                        <th>id</th>
                        <th>Project Name</th>
                        <th> C Name</th>
                        {{-- <th>Bill Type</th> --}}
                        <th>Charge Type</th>
                        <th>Agreed Amount</th>
                        <th>G.P</th>
                        <th>Effective Date</th>
                        <th>Next D 4 Charge P</th>
                        
                        <th><button  class="btn btn-primary"> <i class="fas fa-credit-card"></i> Pay</button></th>
                    </tr>
                    </thead>


                    <tbody>

                        @if ($charges->count() > 0)

                        @foreach ($charges as $charge)

                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>
                             
                                @if (  $charge->sale->project()->count() > 0)
                                     {{ $charge->sale->project->projectName}} 
                                @else
                                    No Project
                                @endif
                            
                            </td> 
                            <td>
                                @if (  $charge->sale->client()->count() > 0)
                               
                                 <a href=" {{ route('client.subscription',['id'=>$charge->id])}}"> {{ $charge->sale->client->fullName}} </a>
                                @else
                                    No Client
                                @endif
                            
                            </td> 
                           
                           {{-- <td>
                                @if($charge->billType == 1)
                                PrePaid
                                @elseif($charge->billType == 2)
                                Post Paid
                                @endif
                            </td> --}}
                           <td >
                               @if($charge->chargeType == 1)
                                 Monthly
                               @elseif($charge->chargeType == 12)
                                 Annually
                               @endif
                            </td>
                           <td>{{ $charge->agreedAmount}}</td>
                           <td>{{ $charge->gracePeriod}}Month(s)</td>
                           <td>{{ $charge->effectiveDate}}</td>
                           <td>{{ $charge->enpDate}}</td> 
                           <td>

                            <button type="button" 
                            class="btn btn-primary waves-effect waves-light" 
                            data-toggle="modal" data-target="#bs-example-modal-center-{{ $charge->id }}"> <i class="fas fa-credit-card"></i> Pay</button>

                            <div class="modal fade " id="bs-example-modal-center-{{$charge->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"> 
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white mt-0">Make a Subscription Payment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body p-2">
            
                                <form action=" {{ route('income.store',['id'=>$charge->id])}}" method="post"  id="chargesCreateForm">
            
                                    {{csrf_field()}}
            
                                
            
                                    <div class="row">  
                                                <div class="col-6">
                                                        <div class="form-group">
                                                          <label for="project_id">Project Name</label>
                                                            @if (  $charge->sale->project()->count()  > 0)
                                                            <input type="text" name="project_id" id="" class="form-control" disabled value=" {{ $charge->sale->project->projectName}}">
                                                             
                                                            @else
                                                                No Project
                                                            @endif
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="client_id">Client Name</label>
                                                            <input type="text" name="client_id" id="" class="form-control" disabled value="{{ $charge->sale->client->fullName}}">
                                                            <input type="hidden"  value="{{$charge->sale->client->id}}">                                         
                                                        </div>
            
                                                        <div class="form-group">                                                                                          
                                                        <input type="hidden" name="id" value="{{ $charge->id}}">
                                                       </div>

                                                       <div class="form-group">                                                                                          
                                                        <input type="hidden" name="nextPDate" id="nextPDate" value="{{ $charge->enpDate}}">
                                                       </div>

                                                       <div class="form-group">
                                                        <label for="months">Months Paid For</label>
                                                        <input type="number" name="months" id="months" onkeyup="subscription(this.value),serviceEndDateM(this.value)" placeholder="Enter Number of Months" class="form-control">                                                       
                                                      </div>
            
                                                        <script>


                                                            function clean(amount){
                                                                amount= amount.replace(/\,/g,'');                                           
                                                                amount=parseInt(amount);
                                                                return amount;                                                                
                                                            }

                                                            function subscription(months){
                                                                var months, charge, subscription_fee;
                                                                months = document.getElementById('months').value;
                                                                charge = clean(document.getElementById('balance').value); 
                                                                subscription_fee = months * charge;
                                                                document.getElementById('income').value = subscription_fee;
                                                            }

                                                            function date_format(datem){
                                                                var date,time;
                                                                date = datem.getFullYear()+'-'+(datem.getMonth()+1)+'-'+datem.getDate();
                                                                time = datem.getHours() + ":" + datem.getMinutes() + ":" + datem.getSeconds();
                                                                datem = date+ " " +time;
                                                                return datem;
                                                            }

                                                           
                                                                
                                                            function serviceEndDateM(months){

                                                                var months = document.getElementById('months').value;
                                                                var date = document.getElementById('nextPDate').value;
                                                                var days;
                                                                days = months * 30;
                                                                var SED = new Date(date);
                                                                SED.setDate(SED.getDate() + days);                                                                  
                                                                document.getElementById('serviceEndDate').value =  date_format(SED);

                                                                return;

                                                            }


                                                      

                                                           

                                                        </script>
            
                                                </div>
            
            
                                                  <div class="col-6">

                                                      <div class="form-group">
                                                        <label for="income">Amount Subscribed</label>
                                                        <input type="text" name="income"  class="form-control " 
                                                        id="income"  data-type="currency"    required  placeholder="Enter Amount Paid" >
                                                      </div>
            
                                                        <div class="form-group">
                                                          <label for="balance">Monthly Subscription</label>
                                                        <input type="text" name="balance" id="balance" data-type="currency" class="form-control "   value="{{$charge->agreedAmount}}">
                                                        </div>


                                                     
            
                                                      
                    
            
                                                        <div class="form-group">
                                                          <label for="serviceEndDate">Service End Date</label>
                                                        <input type="text" name="serviceEndDate"  id="serviceEndDate" class="form-control" placeholder="Service End Date"  >
                                                        </div> 
                                            
            
                                                  </div>
            
            
                                              </div>
            
                                                {{-- row ends --}}
            
                                                <div class="form-group">
            
                                                  <button type="submit" class="btn btn-primary btn-block">Subscribe </button>
            
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
                            No Subscribers Found
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