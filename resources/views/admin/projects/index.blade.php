@extends('admin.layouts.master')

@section('page')
<h4 class="page-title"> View Projects</h4>

@stop

@section('pagecomment')
<ol class="breadcrumb">
    <li class="breadcrumb-item active">Projects</li>
</ol>
@stop


@section('content')  

   
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
            
                <h4 class="mt-0 header-title">View All Projects</h4>
            
             <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>View Projects!</strong> Here you can view all Registered Projects
             </div>
             
           
                
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Project Name </th> 
                        <th>Project Category</th>                       
                        <th>Project Description</th>                        
                        <th>Project Cost</th> 
                        <th>Start date</th>
                        <th>Project Status</th>
                        <th>Actions</th>
                        <th><i class="fas fa-edit"></i></th>
                        <th><i class="fas fa-trash-alt"></i></th>
                        <th><i class="fas fa-print"></i></th>
                    </tr>
                    </thead>


                    <tbody>

                        @if($projects->count() > 0)



                        @foreach ($projects as $project)

                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $project->projectName }} </td>
                            <td>{{ $project->category ? $project->category->projectType : 'Uncategorised'}}</td>
                            <td>{!! str_limit( $project->projectDesc , 40, '&rsaquo;') !!}</td>
                            <td>{{ $project->projectPrice }}</td>                                            
                            <td>{{ $project->startDate }}</td>
                            <td>

                               @if ($project->status == 1)
                               
                                   Done

                                @elseif($project->status == 2) 

                                   Progressing

                                @elseif($project->status == 3)

                                  Paused

                                @else

                                  Stopped

                               @endif


                            </td>

                            <td>
                                <div class="btn-group ml-1 mo-mb-2">
                                    <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        More
                                    </button>
                                    <div class="dropdown-menu">                                        
                                        <a class="dropdown-item" href="{{ route('project.pause',['id'=>$project->id])}}">Pause</a>
                                        <a class="dropdown-item" href="{{ route('project.stop',['id'=>$project->id])}}">Stop</a>
                                        <a class="dropdown-item" href="{{ route('project.progress',['id'=>$project->id])}}">Progressing</a>
                                        <a class="dropdown-item" href="{{ route('project.done',['id'=>$project->id])}}">Done</a>
                                    </div>
                                </div>
                            </td>



                            <td> <a href="{{ route('project.edit',['id'=>$project->id])}}"><i class="fas fa-edit text-primary"></i></a></td>
                            <td> <a href="{{ route('project.destroy',['id'=>$project->id])}}" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt text-danger"></i></a></td>
                            <td><i class="fas fa-print text-primary"></i></td>
                        </tr>

                             
                            
                        @endforeach


                        @else

                        <tr>

                            <th colspan="12" class="text-center">
                            No Published Projects Found
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