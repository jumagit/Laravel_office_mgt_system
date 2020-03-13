@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> Register Project</h4>

@stop

@section('pagecomment')
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Register Project</li>
        </ol>
@stop


@section('content')

          @include('admin.layouts.error')


    <div class="row">


        <div class="col-lg-12">


            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Register Project</h4>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Register Project!</strong> Here you can register Project
                     </div>


                 


                            <form action="{{ route('projects.store')}}" method="POST"  enctype="multipart/form-data"  >

                                                  {{ csrf_field()}}

                                                    <div class="row">


                                                            <div class="col-6">
                                                              
                                                                    <div class="form-group">
                                                                      <label for="projectName">Project Name</label>
                                                                      <input type="text" id="search" name="search"  class="form-control" placeholder="Enter Project Name" required>
                                                                      <span id="project_name_error" class="text-danger"></span>                         
                                                                          <div id="pexists" class="text-danger"> 
                                                                          </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                      <label for="projectPrice">Project Price</label>
                                                                      <input type="text" name="projectPrice"  id="projectPrice" class="form-control"  required data-type="currency"   placeholder="Enter Project Amount" required>  
                                                                      <span id="project_price_error" class="text-danger"></span>
                                                                    </div>

                                                                    <div class="form-group">
                                                                      <label for="startDate">Start Date</label>
                                                                      <input type="text" name="startDate" id="date" class="form-control date" placeholder="Project Start Date"  required>
                                                                      <span id="project_price_error" class="text-danger"></span>
                                                                    </div>


                                                                    
                                                                  

                                    
                                                            </div>



                                                            <div class="col-6">

                                                                    <div class="form-group">
                                                                      <label for="category_id">  Project Type</label>
                                                                      <select name="category_id" class="form-control custom-select" required="required">
                                                                      <option value="#" disabled selected>~~ Select category Type ~~</option>
                                                                        @foreach($categories as $category)
                                                                          
                                                                      <option value="{{ $category->id }}">{{$category->projectType}}  Costing  <small class="font-weight-bold">SHS {{$category->category_price}} Monthly</small></option>
                                                        
                                                                        @endforeach
                                                                      </select>
                                                                    </div>

                                                                  
                                                                    <div class="form-group">
                                                                      <label for="status"> Project Status</label>
                                                                      <select class=" form-control custom-select" name="status" id="" required="required">
                                                                        <option selected>~~ Select Project Status ~~</option>
                                                                        <option value="1">Done</option>
                                                                        <option value="2">Progressing</option>
                                                                        <option value="3">Paused</option>
                                                                        <option value="4">Stopped</option>
                                                                      </select>
                                                                    </div>
                                          

                                                                    <div class="form-group">
                                                                      <label for="projectDescription">Project Description</label>
                                                                      <textarea type="text" name="projectDescription" id="projectDescription" required="required"  class="form-control" placeholder="Enter Project Description" rows="6" ></textarea>
                                                                    </div>


                                                            </div>


                                                    </div>

                                        {{-- row ends here --}}

                                        <input type="submit" name="submit" class="btn  btn-primary btn-block">

                                        
                              
                              
                            </form>


                      </div>


                  </div>

                

              </div> 

              
          </div>
          

    




@endsection


