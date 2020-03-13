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

                                     


                                      


                              </div>


                              <div class="col-6">
                                      

                                    <div class="form-group row">
                                      <label class="col-sm-6 control-label col-lg-6 mb-3">Other Charges </label>
                                      <div class="col-sm-6 col-lg-6 float-left">
                                          <div class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" id="otherNo" name="otherCharges" class="custom-control-input" value="0">
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

                                          function effective(gross){ 

                                            var days = gross * 30;                                          

                                            var date = new Date();
                                            date.setDate(date.getDate() + days);
                                            var gdate = date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear();
                                            var time = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
                                            var dateTime = gdate;

                                            date = date.toGMTString();

                                            document.getElementById('date').value = date;

                                            //calling the function

                                            ECNPDate();

                                          }

                                          //Effective Charge Next Payment Date

                                          function ECNPDate(){

                                            var chargeType;

                                            var days, day, month, year,ENPDate;


                                          var effective_date = document.getElementById('date').value;

                                          //alert(effective_date);


                                          if(document.getElementById('monthly').checked){

                                            chargeType = document.getElementById('monthly').value;

                                             days = 30 * chargeType;

                                             effective_date = new Date(effective_date);

                                            effective_date.setDate(effective_date.getDate() + days);

                                            effective_date = effective_date.toGMTString();

                                            document.getElementById('ENPDate').value = effective_date;

                                          }else if(document.getElementById('annually').checked){

                                            chargeType = document.getElementById('annually').value;

                                            days = chargeType * 30;

                                            effective_date = new Date(effective_date);

                                            effective_date.setDate(effective_date.getDate() + days);

                                            effective_date = effective_date.toGMTString();


                                            document.getElementById('ENPDate').value = effective_date;



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
                                <label for="grossperiod" class=" col-6">Gross Period(Months)</label>
                                      <div class="col-6">
                                        <input type="number" name="grossperiod"  id="grossperiod" class="form-control" onkeyup="effective(this.value)"  required>
                                        
                                     </div>
                                </div>

                              <div class="form-group row">
                                  <label for="AmountToPay" class=" col-6">Amount</label>
                                    <div class="col-6">
                                    <input type="text" name="amountToPay"  id="amountToPay" class="form-control " data-type="currency" value="Agreed Amount"  required>
                                    </div>
                              </div>
          
                                  
                              <div class="form-group row">
                                  <label for="effectiveDate" class=" col-6">Effective Date</label>
                                      <div class="col-6">
                                      <input type="text" name="effectiveDate" id="date" value="" class="form-control "  required>
                                    </div>
                              </div>

                              <div class="form-group row">
                                <label for="ENPDate" class=" col-6">Effective Charge Next Payment Date</label>
                                    <div class="col-6">
                                    <input type="text" name="ENPDate" id="ENPDate" value="" class="form-control "  required>
                                  </div>
                            </div>


                                


                                
                               <div id="quaterly">


                               </div>

                               <div id="effective">


                              </div>

                                







                        </div> 


                        <div class="form-group">
                          <label for="nextPDate">Next Payment Date</label>
                          <input type="text" name="nextPDate"  id="date" class="form-control date" placeholder="Next Payment  Date"  required>
                        </div>





                                  
  

                                
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


