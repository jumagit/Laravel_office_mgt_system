@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Edit Project</h4>

@stop

@section('pagecomment')
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Edit Project</li>
        </ol>
@stop


@section('content')

          @include('admin.layouts.error')


    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Edit Project</h4>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Edit Project!</strong> Here you can Edit Project
                     </div>

                    <div class="p-1">

                        <form action="{{ route('project.update',['id'=>$project->id])}}" method="POST">

                            {{ csrf_field()}}
                              <div class="form-group">
                                <label for="projectName">Project Name</label>
                              <input type="text" name="projectName" value="{{ $project->projectName}}" class="form-control" placeholder="Enter Project Name" >
                              </div>

                              <div class="form-group">
                                <label for="projectPrice">Project Price</label>
                                <input type="number" name="projectPrice"  value="{{ $project->projectPrice}}" class="form-control" placeholder="Enter Project Price" >
                              </div>

                              <div class="form-group">
                                <label for="startDate">Start Date</label>
                                <input type="text" name="startDate" value="{{ $project->startDate}}" class="form-control date" placeholder="Project Start Date" >
                              </div>
              
              
              
                              
                              <div class="form-group">
                                <label for="category_id">  Project Type</label>
                              <select name="category_id" class="form-control">
                              <option value="#" disabled selected> {{ $project->category->projectType}}</option>
                              @foreach($categories as $category)
                                
                              <option value="{{ $category->id }}">{{$category->projectType}}</option>
              
                              @endforeach
                              </select>
                              </div>
                              
              
                              <div class="form-group">
                                <label for="projectDescription">Project Description</label>
                                <textarea type="text" name="projectDescription" id="projectDescription" class="form-control tiny"  rows="6" >
                                    {{ $project->projectDesc }}
                                </textarea>
                              </div>
              
                          <div class="form-group">
              
                            <input type="submit" name="submit" class="btn btn-primary btn-block">
                          
                          </div>
              
              
                      </form>


                       
                    </div>

                </div>
            </div>

           

        </div> <!-- end col -->
    </div>
     





@endsection


