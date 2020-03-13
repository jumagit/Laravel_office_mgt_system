<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Profile;

use Session;

use App\Mail\SignupConfirmMail;

use Illuminate\Support\Facades\Mail;

use Auth;

use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User;
        return view('admin.users.index')->with('users', $user::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);
        

        $data = Array(

            'name' => $request['name'],
            'password' => $request['password'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],

        );

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'added_by' => Auth::User()->id
        ]);


        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar'  => '/uploads/avatars/1.PNG'
        ]);

        $to_name = 'Mukoova Juma';
        $to_email = 'mukoovajumag8@gmail.com';
        

        Mail::send('emails.user-confirm', $data,function($message) use ($to_name, $to_email) {

            $message->to($to_email, $to_name)->subject('Sales Notification');
            $message->from('mukoovajuma183@gmail.com','Sales Notification');

        });

        // Mail::to('mukoovajuma183@gmail.com')->send( new SignupConfirmMail($data));




        Session::flash('success','Successifully registered New User');

        return redirect()->route('users');

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
        $user = User::find($id);

        return view('admin.users.edit')->with('user', $user);


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
              
     
        
    $user = User::find($id);

    $this->validate($request, [
            'name' => 'required|max:20',
            'email'    =>'required|string|email|max:255|unique:users',
            'firstname'=> 'required|max:60',
            'lastname' => 'required|max:60',
          
    ]); 
        
        
        //dd($request->all());
        
   
        $user->name = $request->name;
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->password = bcrypt($request->password);
        $user->added_by = Auth::User()->id;

        $user->save();
        
         Session::flash('success','User Successifully Updated');

          return redirect()->route('users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        
        Session::flash('info','User Successfully Trashed');

        return redirect()->route('users');

    }


    public function trashed(){

        $user = User::onlyTrashed()->get();

        return view('admin.users.trashed')->with('users', $user);
    }


    public function kill($id){

        $user = User::withTrashed()->where('id', $id)->first();

        $user->profile->delete();

        $user->forceDelete();
         
        Session::flash('info','User Permanently Deleted');

        return redirect()->route('users');
        
    }


    public function restore($id){

    $user = User::withTrashed()->where('id',$id)->first();


    $user->restore();


    Session::flash('info','User successifully Restored');

    return redirect()->route('users');
        

    }



    //Make admin route

    public function admin( $id){

        $user = User::find($id);

        $user->admin = 1;

        $user->save();

        Session::flash('info', 'Administration Previlages given Successifully');

        return redirect()->route('users');

    }


        //Make Not Admin route

        public function notAdmin( $id){

            $user = User::find($id);
    
            $user->admin = 0;
    
            $user->save();
    
            Session::flash('success', 'Administration Previlages Revoked Successifully');
    
            return redirect()->route('users');
    
        }



        public function search(Request $request){

            if($request->ajax())
                {
                $output="";
    
                $users=DB::table('users')->where('firstname','LIKE','%'.$request->firstname."%")->get();
    
                    if($users)
                    {
                        foreach ($users as $key => $user) {
                        $output.='<tr>'.
                        '<td>'.$user->id.'</td>'.
                        '<td>'.$user->firstname.'</td>'.
                        '<td>'.$user->lastname.'</td>'.
                        '<td>'.'Already Exists'.'</td>'.
                        
                        '</tr>';
                        }
                    return Response($output);
                    }
           }
    
        }

    


        








    //methods end here
}
