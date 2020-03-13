@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Edit Transaction</h4>

@stop

@section('pagecomment')
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Edit Transaction</li>
        </ol>
@stop


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Edit Transaction</h4>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Edit Transaction!</strong> Here you can Edit a Transaction
                     </div>

                    <div class="p-1">

                        <form action="{{ route('sales.store')}}" method="post"  id="salesCreateForm">
                            {{csrf_field()}}
                            
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
                                <input type="text" name="amount_sold"  class="form-control "  id="projectPrice" onkeyup="test()" required data-parsley-trigger="keyup" required   placeholder="Enter Selling Price" >
                              </div>
                            
                             <div class="form-group">
                                <label for="projectPrice">Amount Paid</label>
                                <input type="text" name="amount_paid"  class="form-control money" id="pprice"  onkeyup="test()"  required data-parsley-trigger="keyup" placeholder="Enter Amount Paid" >
                              </div>

                              <div class="form-group">
                                <label for="nextPDate">Next Payment Date</label>
                                <input type="text" name="nextPDate"  id="date" class="form-control date" placeholder="Next Payment  Date"  required>
                            </div>
                            
                             <button type="submit" class="btn btn-primary btn-block">Add Sale </button>
                          </form>

                       
                    </div>

                </div>
            </div>

           

        </div> <!-- end col -->
    </div>
     





@endsection


