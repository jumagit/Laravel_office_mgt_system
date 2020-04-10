<?php

namespace App\Http\Controllers;

use App\Project;

use Session;

use App\Category;

use App\Client;

use App\Cdetail;

use App\Ctype;

use Auth;

use \PDF;

use DB;



use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexmain()
    {
        $client = new Client;
        $clients = $client::all();
        return view('admin.clients.index')->with('clients', $clients);
    }

    public function index()
    {       
        return view('admin.clients.searchClient');
    }

    public function active(){
        $cdetail = Cdetail::find(1);
    }

    //printing method

    public function export_pdf($id)
  {
    // Fetch all customers from database

    $data = Client::find($id);

    $total = 0;

    foreach($data->sales as $sale){

        $total += $sale->amount_sold;
    }


    $pdf = PDF::loadView('admin.clients.clientPdf',  [
        'data' => $data,
        'total' => $total,
       
    ]);
    
    // return $pdf->stream('PDF');
    // $pdf->setPaper('A4');

    return $pdf->download('sales.pdf');


   
 }


 public function project_tag($id){

    $client = Client::find($id);
    
    return view('admin.clients.addMore')->with('projects', Project::all())
                                        ->with('client', $client);

 }


 public function update_project(Request $request, $id){

    $client = Client::find($id);

    $client->prospective = 1;
    
    $client->projects()->sync($request->project_id);

    Session::flash('success','A Projects have Added Successfully');

    return redirect()->route('clients');


 }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

     
        
       
        return view('admin.clients.create');
                                           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fullName'=>'required',           
            'address'=>'required',
            'clientType'=>'numeric', 
            'pcontact'=>'required|numeric',
            'email'=>'email',
            'otherContact'=>'',                
            'about'=>'required',
        ]);


         $client = Client::create([

            'fullName'       => $request->fullName, 
            'address'        => $request->address,
            'pcontact'       => '+'.$request->pcontact,
            'otherContact'   => '+'.$request->otherContact,                    
            'email'          => $request->email,
            'about'          => $request->about,
            'user_id'        =>Auth::user()->id,
        ]);

        $cdetails = Cdetail::create([

            'client_id'          =>$client->id,
            'ctype_id'        =>$request->clientType,           
            'user_id'            =>Auth::user()->id,
        ]);

        Session::flash('success','A new Client has been created successfully');

        return redirect()->back();
    }




    public function searchClient(Request $request){


        if($request->ajax()){

            $output = '';


            $link = 'client/create';

            $link2 = 'clients/main';


            $link3 = 'clients/project/tag';

            $query = $request->get('query');

            if($query != '')  {
                $data=DB::table('clients')->where('fullName', 'like', '%'.$query.'%')->get();
            }else{
                $data=DB::table('clients')->orderBy('id', 'desc')->get();
            }

            $total_row = $data->count();

            if($total_row > 0){

                foreach ($data as $client) {
                                    $output.=' <table id="example1" class="table table-hover table-striped">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Full Names</th>  
                                            <th>Primary Contact</th> 
                                            <th>Client Email</th>
                                        </tr>
                                    </thead>
                    
                    
                                    <tbody>
                
                                            <tr>
                                                <td>'.$client->fullName.'</td>
                                                <td>'.$client->pcontact.'</td> 
                                                <td>'.$client->email.'</td>
                                                <td><a href='.$link3.'/'.$client->id.' class="btn btn-primary" >Add Project</a></td>
                                               
                                        
                                            </tr>
                                    </tbody>
                                 </table>';

                }


            }else{
                $output = "
                <tr>
                 <td  class='text-center' colspan='5'>No Data Found <a href=".$link." class='btn btn-primary'>Register Client Instead</a> | <a href=".$link2." class='btn btn-primary'>View All Clients</a></td>
                </tr>
                ";
               
            }


            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
               );

               echo json_encode($data);

        }
    }


    



    public function search(Request $request){

        if($request->ajax())
            {
            $output="";

            $clients=DB::table('clients')->where('fullName','LIKE','%'.$request->fullName."%")->get();

                if($clients->count() > 0)
                {
                    foreach ($clients as $key => $client) {
                    $output.='<div class=" card-body p-2 text-danger">'
                    .$client->fullName . " | " . 'Already Exists'.
                   
                    '</div>';
                    }
                return Response($output);
                }
       }

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
        $client = Client::find($id);
        $category = Category::all();

        return view('admin.clients.edit')->with('client',$client)                                       
                                       -> with('projects',Project::all()); 
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
        $this->validate($request, [
            'fullName'=>'required',           
            'address'=>'required',
            'clientType'=>'required',            
            'pContact'=>'required|numeric',
            'email'=>'required|email',
            'otherContact'=>'required|numeric',
            'project_id'=>'required|numeric',            
            'about'=>'required',
            

        ]);


        $client = Client::find($id);

        if($request->hasFile('featured')){

            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/clients', $featured_new_name);

            $client->featured = 'uploads/clients/'.$featured_new_name;
        }

       

        $client->fullName = $request->fullName;        
        $client->address = $request->address;
        $client->clientType = $request->clientType;
        $client->otherContact = $request->otherContact;
        $client->primaryContact = $request->primaryContact;
        $client->email = $request->email;
        $client->about = $request->about;
        $client->startDate = $request->startDate;

        $client->save();

        $client->projects()->sync($request->project_id);

        Session::flash('success','A Client has been successifully Updated');

        return redirect()->route('clients');





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client =  Client::find($id);

        $client->delete();

        Session::flash('info','You have successifully Deleted a Client');

        return redirect()->route('clients');
    }
}
