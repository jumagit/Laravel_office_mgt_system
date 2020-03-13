<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

use Auth;

use Session;

class SettingsController extends Controller
{
    public function index(){

        return view('admin.settings.index')->with('settings',Setting::first());
    }

    public function update(Request $request){

        $this->validate(request(), [

            'company_contact'        => 'required',
            'company_address'        => 'required',
            'company_email'          => 'required|email',
            'company_logo'           =>'required',
            'company_name'           => 'required',
            'company_description'    => 'required'
            
        ]);

        $settings = Setting::first();


        
        if($request->hasFile('company_logo')){

            $company_logo = $request->company_logo;

            $featured_new_name = time() . $company_logo->getClientOriginalName();

            $company_logo->move('uploads/avatars', $featured_new_name);

            $settings->company_logo = '/uploads/avatars/'.$featured_new_name;
           
        }

        $settings->company_name = request()->company_name;
        $settings->company_contact = request()->company_contact;
        $settings->company_email = request()->company_email;
        $settings->company_address = request()->company_address;
        $settings->company_description = request()->company_description;
        $settings->user_id  = Auth::User()->id;
        $settings->save();

        Session::flash('success','Application  settings have been Updated');

        return redirect()->back();




    }
}
