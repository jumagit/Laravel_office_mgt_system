<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Project;

use App\Category;

use App\Client;

Use Session;

use Auth;

use DB;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = new Project();
        $projects = $project::where([
            ['status', '<=', '2'],          
        ])->orderBy('id', 'DESC')->get();
        return view('admin.projects.index')->with('projects', $projects);
    }


    public function stoppedAndPaused()
    {
        $project = new Project();
        $projects = $project::where([
            ['status', '>', '2'],          
        ])->orderBy('id', 'DESC')->get();
        return view('admin.projects.stoppedAndPaused')->with('projects', $projects);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        $categories = $category::orderBy('id','DESC')->get();

        if($categories->count() == 0 ){

            Session::flash('warning', 'You cannot create projects with no categories');
            return redirect()->back();
        }
        return view('admin.projects.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $projectPrice = str_replace(',', '', $request->projectPrice);
        $projectPrice = floatval($projectPrice);
        $projectPrice = intval($projectPrice, 10);
        $this->validate($request,[

            'search' => 'required|max:255',
           
            'category_id' =>'required|numeric', 
            'status' =>'required|numeric',
            'startDate'=>'required',           
            'projectDescription' => 'required'

        ]);

        // dd($request->all());

        $project = Project::create([

            'projectName'       => $request->search,
            'status'        => $request->status,           
            'category_id' => $request->category_id,
            'projectPrice' => $projectPrice,
            'startDate'    =>$request->startDate,
            'user_id'     => Auth::User()->id,
            'projectDesc'     => $request->projectDescription, 
        ]);   

        Session::flash('success','Successifully registered a Project');
        return redirect()->route('projects');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $category = Category::all();

        return view('admin.projects.edit')->with('project',$project)                                       
                                       -> with('categories',Category::all()); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'projectName' => 'required|max:255',
            'projectPrice' =>'required|numeric',
            'category_id' =>'required|numeric', 
            'status' =>'required|numeric',           
            'projectDescription' => 'required'

        ]);

        $project = Project::find($id);
        $project->user_id    = Auth::User()->id;
        $project->status = $request->status;
        $project->projectName = $request->projectName;
        $project->projectDesc = $request->projectDescription;
        $project->category_id = $request->category_id;
        $project->projectPrice = $request->projectPrice;

        $project->save();


        Session::flash('success','A project has been successifully Updated');

        return redirect()->route('projects');


    }


    public function ksearch(Request $request){

        if($request->ajax())
        {
       
        $project = Project::find($request->id);

        $price = $project->projectPrice;

        $monthly_charge = $project->category->category_price;
        
        $output = array(
                        'price' => $price, 
                        'monthly_charge' =>$monthly_charge
                    );
      echo json_encode($output);
            
      }


    }


    public function search(Request $request){

        if($request->ajax())
            {
            $output="";

            $projects=DB::table('projects')->where('projectName','LIKE','%'.$request->search."%")->get();

                if($projects)
                {
                    foreach ($projects as $key => $project) {
                    $output.='<tr>'.
                    '<td>'.$project->id.'</td>'.
                    '<td>'.$project->projectName.'</td>'.
                    '<td>'.$project->projectDesc.'</td>'.
                    '<td>'.'Already Exists'.'</td>'.
                    '</tr>';
                    }
                return Response($output);
                }
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project =  Project::find($id);

        $project->delete();

        Session::flash('danger','You have successifully Deleted a Project');

        return redirect()->route('projects');
    }


//done

    public function done( $id){

        $project = Project::find($id);

        $project->status = 1;

        $project->save();

        Session::flash('success', 'Project status has Changed to done');

        return redirect()->route('projects');

    }



    //progress


    public function progress( $id){

        $project = Project::find($id);
    
        $project->status = 2;
    
        $project->save();
    
        Session::flash('success', 'Project status has Changed to Progress');
    
        return redirect()->route('projects');
    
    }



//pause

public function pause( $id){

    $project = Project::find($id);

    $project->status = 3;

    $project->save();

    Session::flash('success', 'Project status has Changed to Pause');

    return redirect()->route('projects');

}



   
//pause

public function stop( $id){

    $project = Project::find($id);

    $project->status = 4;

    $project->save();

    Session::flash('success', 'Project status has Changed to Stop');

    return redirect()->route('projects');

}











    //end of methods
}
