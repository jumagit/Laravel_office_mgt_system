@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Add/Tag More Project</h4>

@stop

@section('pagecomment')
<ol class="breadcrumb">
    <li class="breadcrumb-item active"> Add/Tag More Project</li>
</ol>
@stop


@section('content')

@include('admin.layouts.error')


<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-0 header-title"> Add/Tag More  Project</h4>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong> Add/Tag More Project!</strong> Here you can  Add More Projects
                </div>

                <div class="p-1">
                    <form action="{{ route('client.project.update',['id'=>$client->id]) }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field()}}


                        <div class="row">

                            <div class="col-6">

                                <div class="form-group">
                                    <label for="fullName">Firstname </label>
                                <input type="text" name="fullName" disabled value="{{$client->fullName}}" class="form-control"
                                        placeholder="Enter Full Names">
                                </div>

                               


                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="email" name="email" disabled value="{{$client->email}}" class="form-control"
                                        placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="address">Client Address </label>
                                    <input type="text" name="address" disabled value="{{$client->address}}" class="form-control"
                                        placeholder="Enter Client Address">
                                </div>


                             
                               

                                

                            



                            </div>


                            <div class="col-6">


                                {{-- <div class="form-group">
                                    <label for="project_id">Your Current Project</label>
                                    <select name="project_id" class="form-control" disabled>
                                        @foreach($projects as $project)
  
                                                <option value="{{ $project->id }}"

                                                    @if($client->project_id == $project->id)                                       
                                                        selected                                        
                                                    @endif  >

                                                {{$project->projectName}}
                                            </option>
                                            
                                       @endforeach
                                    </select>
                                </div> --}}


                                <div class="form-group">
                                    <label for="project_id"> Projects</label>
                                    <select class="select2 form-control select2-multiple" name="project_id[]" multiple="multiple" data-placeholder="~~ Select More Project ~~">
                                     
                                        @foreach ($projects as $project)

                                                <option 

                                                        @foreach($client->projects as $t)
                                                                @if($project->id == $t->id)                             
                                                                selected 
                                                                @endif                             
                                                        @endforeach
                                                
                                                        value="{{$project->id}}"  > {{ $project->projectName}}
                                                </option>
                                           
                                        @endforeach

                                    </select>

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