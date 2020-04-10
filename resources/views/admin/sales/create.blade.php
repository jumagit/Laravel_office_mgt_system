@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Register Sale</h4>

@stop

@section('pagecomment')
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Register Sale</li>
        </ol>
@stop


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Register Sale</h4>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Register Sales!</strong> Here you can register Sales
                     </div>

                    <div class="p-1">

                        <form action="{{ route('sales.store')}}" method="post"  id="salesCreateForm">
                            {{csrf_field()}}

                        

                            <div class="row">



                              <div class="col-6">


                                        <div class="form-group">
                                          <label for="project_id">Project Name</label>
                                          <select class="custom-select" name="project_id" id="project_id" required>
                                              <option selected>-- Select Product -- </option>
                                            @foreach ($projects as $project)

                                          <option value="{{$project->id}}">{{ $project->projectName}}  |  costs shs <b>{{ $project->projectPrice}}</b></option>
                                                
                                            @endforeach
                                          </select>
                                      </div>



                                      
                                      <div class="form-group">
                                          <label for="client_id">Client Name</label>
                                          <select class="custom-select" name="client_id" id="" required>
                                              <option selected>-- Select Client -- </option>
                                            @foreach ($clients as $client)

                                          <option value="{{$client->id}}">{{ $client->fullName}}   </option>
                                                
                                            @endforeach
                                          </select>
                                      </div>


                                      <div class="form-group" id="price" >
                                      </div>
  
                                      <div class="form-group">
                                        <label for="projectPrice">Amount Sold</label>
                                        <input type="text" name="amount_sold"  class="form-control "  
                                        data-type="currency" id="amount_sold" required data-parsley-trigger="keyup" required   placeholder="Enter Selling Price" >
                                      </div>
                                    
                                      <div class="form-group">
                                        <label for="projectPrice">Amount Paid</label>
                                        <input type="text" name="amount_paid"  class="form-control " 
                                        id="amount_paid"  data-type="currency"  onkeyup="balanceCalculation(this.value);"  required  placeholder="Enter Amount Paid" >
                                      </div>


                                      <script>
                                          function balanceCalculation(amtpaid) {
                                            var pp =  document.getElementById('amount_sold').value;

                                              pp= pp.replace(/\,/g,'');
                                           
                                              pp=parseInt(pp);

                                                var ap =  amtpaid;
                                               
                                                ap= ap.replace(/\,/g,'');
                                            
                                                ap=parseInt(ap);
                                        
                                                var balance = pp-ap;
                                      

                                             document.getElementById('balance').value = balance;

                                    }
                                      </script>




                                      <div class="form-group">
                                        <label for="balance">Balance</label>
                                        <input type="text" name="balance" id="balance" data-type="currency" class="form-control "   placeholder="Balance" >
                                      </div>


                                      
                                    <div class="form-group">
                                      <label for="nextPDate">Next Payment Date</label>
                                      <input type="text" name="nextPDate"  id="date" class="form-control date" placeholder="Next Payment  Date"  >
                                    </div>

                                     


                                      


                              </div>


                              <div class="col-6">
                                      

                                    <div class="form-group row">
                                      <label class="col-sm-6 control-label col-lg-6 mb-3">Other Charges </label>
                                      <div class="col-sm-6 col-lg-6 float-left">
                                          <div class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" id="otherNo"  checked name="otherCharges" class="custom-control-input" value="0">
                                              <label class="custom-control-label" for="otherNo">No</label>
                                          </div>

                                          <div class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" id="otherYes" name="otherCharges" class="custom-control-input" value="1">
                                              <label class="custom-control-label" for="otherYes">Yes</label>
                                          </div>

                                      </div>
                                  </div>


                                  <div  id="otherYesForm"  class=" card p-2" style="border:1px solid aqua;display:none">


                                    <div class="form-group row">
                                      <label class="col-sm-6 control-label col-lg-6 mb-3">Charge Type </label>
                                      <div class="col-sm-6 col-lg-6 float-left">
                                          <div class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" id="monthly" name="chargeType" value="1" class="custom-control-input">
                                              <label class="custom-control-label" for="monthly">Monthly</label>
                                          </div>

                                          <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="annually" name="chargeType" value="12" class="custom-control-input">
                                            <label class="custom-control-label" for="annually">Annually</label>
                                        </div>

                                      </div>
                                  </div>


                                  <div class="form-group row">
                                    <label class="col-sm-6 control-label col-lg-6 mb-3">Bill Type </label>
                                    <div class="col-sm-6 col-lg-6 float-left">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="prepaid" name="billType" value="1" class="custom-control-input">
                                            <label class="custom-control-label" for="prepaid">Prepaid</label>
                                        </div>


                                        <script>

                                         
                                            function date_format(datem){
                                                var date,time;
                                                date = datem.getFullYear()+'-'+(datem.getMonth()+1)+'-'+datem.getDate();
                                                time = datem.getHours() + ":" + datem.getMinutes() + ":" + datem.getSeconds();
                                                datem = date+ " " +time;
                                                return datem;
                                            }

                                          function effective(grace){ 

                                            var days = grace * 30; 
                                            var date = new Date();
                                            date.setDate(date.getDate() + days);                                         
                                            var effDate =   document.getElementById('date_eff');
                                             effDate.value = date_format(date);  
                                            return date;

                                          }


                                          function date_format(datem){

                                            var date = datem.getFullYear()+'-'+(datem.getMonth()+1)+'-'+datem.getDate();
                                            var time = datem.getHours() + ":" + datem.getMinutes() + ":" + datem.getSeconds();

                                            datem = date+ " " +time;
                                         
                                            return datem;
                                          }

                                          //Effective Charge Next Payment Date

                                          function npdate(grace){

                                            var effective_date = effective(grace);

                                            var chargeType, days,ENPDate;

                                            if(document.getElementById('monthly').checked){

                                            chargeType = document.getElementById('monthly').value;

                                            days = 30 * chargeType;

                                            effective_date = new Date(effective_date);

                                            effective_date.setDate(effective_date.getDate() + days);

                                         

                                            document.getElementById('ENPDate').value =  date_format(effective_date);

                                            }else if(document.getElementById('annually').checked){

                                            chargeType = document.getElementById('annually').value;

                                            days = chargeType * 30;

                                            effective_date = new Date(effective_date);

                                            effective_date.setDate(effective_date.getDate() + days);

                                            document.getElementById('ENPDate').value =  date_format(effective_date);



                                            }else{

                                            return;


                                            }

                                           







                                          }

                                         


                                          
                                        </script>

                                                  <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="postpaid" name="billType" value="2" class="custom-control-input">
                                                    <label class="custom-control-label" for="postpaid">Postpaid</label>
                                                </div>

                                              </div>
                                            </div>


                                            
                                            <div class="form-group row">
                                            <label for="grossperiod" class=" col-6">Grace Period(Months)</label>
                                                  <div class="col-6">
                                                    <input type="number" name="gracePeriod"  id="gracePeriod" class="form-control" onkeyup="effective(this.value),npdate(this.value)"  >
                                                    
                                                </div>
                                            </div>

                                          <div class="form-group row">
                                              <label for="amount" class=" col-6">Amount</label>
                                                <div class="col-6">
                                                <input type="text" name="agreedAmount"  id="agreedAmount" class="form-control " data-type="currency" placeholder="Agreed Amount"  >
                                                </div>
                                          </div>
                      
                                              
                                          <div class="form-group row">
                                              <label for="effectiveDate" class=" col-6">Effective Date</label>
                                                  <div class="col-6">
                                                  <input type="text" name="effectiveDate" id="date_eff" value="" class="form-control "  >
                                                </div>
                                          </div>

                                          <div class="form-group row">
                                            <label for="ENPDate" class=" col-6">Effective Charge Next Payment Date</label>
                                                <div class="col-6">
                                                <input type="text" name="enpDate" id="ENPDate" value="" class="form-control "  >
                                              </div>
                                        </div>

                                    </div> 

                                    {{-- coloured section ends --}}





                                            
                              </div> 
                              {{-- col-6 --}}







                                        </div>

                                        <div class="form-group">

                                          <button type="submit" class="btn btn-primary btn-block">Create Sale </button>

                                        </div>
                                        
                                        
                                      </form>

                                  
                                </div>

                            </div>
                        </div>

                      

                    </div> <!-- end col -->
                </div>
                





@endsection


