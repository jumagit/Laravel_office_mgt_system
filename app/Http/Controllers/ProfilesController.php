<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.users.showprofile')->with('user', Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            
            'name'     => 'required',
            'email'    => 'required|email',
            'about'    => 'required',
           

        ]);

        $user = Auth::user();

        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatars',$avatar_new_name);
            $user->profile->avatar = '/uploads/avatars/'.$avatar_new_name;
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;       
        $user->profile->about   = $request->about;

        $user->save();

        $user->profile->save();

        

        Session::flash('success','User Profile Updated Successifully');
        return redirect()->route('users');



    }


        
    public function changepassword(){

        return view('admin.users.changePassword');
        
    }






    public function passupdate(Request $request){

        $this->validate($request,[
            'password' => 'required|min:6|confirmed' 
        ]);

        $user = Auth::user();

        $user->password = bcrypt($request->password);

        $user->save();

        Session::flash('success','You have Successifully Changed your Password!');

        Auth::logout(); // log the user out of our application

        return redirect()->route('login')
                         ->with('success', 'You have Successifully Changed your Password!');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
