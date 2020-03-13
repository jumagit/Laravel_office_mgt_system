@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Edit Client</h4>

@stop

@section('pagecomment')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Edit Client</li>
</ol>
@stop


@section('content')

@include('admin.layouts.error')


<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-0 header-title">Edit Client</h4>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Edit Clients!</strong> Here you can Edit Clients
                </div>

                <div class="p-1">
                    <form action="{{ route('client.update',['id'=>$client->id]) }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field()}}


                        <div class="row">

                            <div class="col-6">

                                <div class="form-group">
                                    <label for="fullName">Firstname </label>
                                <input type="text" name="fullName" value="{{$client->fullName}}" class="form-control"
                                        placeholder="Enter Full Names">
                                </div>

                               


                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="email" name="email"  value="{{$client->email}}" class="form-control"
                                        placeholder="Enter email">
                                </div>


                                <div class="form-group">
                                    <label for="primaryContact">Primary Contact </label>
                                    <input type="text" name="primaryContact"  value="{{$client->primaryContact}}" class="form-control"
                                        placeholder="Enter Primary Contact">
                                </div>

                                <div class="form-group">
                                    <label for="otherContact">Other Contact </label>
                                    <input type="text" name="otherContact"  value="{{$client->otherContact}}" class="form-control"
                                        placeholder="Enter other Contact">
                                </div>


                                <div class="form-group">
                                  <label for="clientType">Client Type</label>
                                 <select name="clientType" id="" class="form-control">
                                    <option  value="{{$client->clientType }}" disabled selected>{{$client->clientType }}</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Company">Company</option>


                                 </select>
                                </div>

                                <div class="form-group">
                                    <label for="project_id"> Client Project</label>
                                    <select name="project_id" class="form-control">
                                        @foreach($projects as $project)
  
                                        <option value="{{ $project->id }}"
                                       
                                       
                                        @if($client->project_id == $project->id)
                                       
                                             selected
                                        
                                       @endif
                                       
                                       
                                        >{{$project->projectName}}</option>
                                       
                                       @endforeach
                                    </select>
                                </div>

                            



                            </div>


                            <div class="col-6">

                                <div class="form-group">
                                    <label for="featured">Featured Image</label>
                                    <input type="file" name="featured" id="" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="startDate">Start Date</label>
                                    <input type="text" name="startDate" id="date"   value="{{$client->startDate}}" class="form-control date" placeholder="Project Start Date" >
                                  </div>



                                <div class="form-group">
                                    <label for="address">Client Address </label>
                                    <input type="text" name="address"  value="{{$client->address}}" class="form-control"
                                        placeholder="Enter Client Address">
                                </div>

                                <div class="form-group">
                                    <label for="about">About Client</label>
                                    <textarea class="form-control tiny" name="about" id="" rows="3"
                                        placeholder="About Client"> {{$client->about}}</textarea>
                                </div>

                            </div>


                        </div>

                        <div class="form-group">

                            <input type="submit" name="submit" class="btn btn-primary btn-block"
                                value="Register Client">
                        </div>



                    </form>
                </div>

            </div>
        </div>



    </div> <!-- end col -->
</div>






@endsection