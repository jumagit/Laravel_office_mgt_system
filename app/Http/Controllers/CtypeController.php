<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ctype;

use Session;

class CtypeController extends Controller
{
    public function index()
    {
        $ctype = new Ctype;
        $ctypes = $ctype::orderBy('id', 'DESC')->get();
        return view('admin.client_type.index')->with('ctypes', $ctypes);
    }

   public function create()
    {
        return view('admin.client_type.create');
    
    }


    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required'

        ]);

 

        $ctype = Ctype::create([

            'name' => $request->name  

        ]);


        $ctype->save();

        Session::flash('success','Successifully registered Client Type');

        return redirect()->route('ctypes');



    }

   public function edit($id)
    {
        $ctype = Ctype::find($id);

        return view('admin.client_type.edit')->with('ctype',$ctype);      
    }


    public function update(Request $request, $id)
    {
        $ctype = Ctype::find($id);
        $ctype->name = $request->name;
        $ctype->save();
        Session::flash('success','You have successifully Updated a Client Type');
        return redirect(route('ctypes'));
    }


    public function destroy($id)
    {
        $ctype =  Ctype::find($id);

        // foreach($ctype->cdetails  as $cdetail){
            
        //     $cdetail->delete();
        // }

    //    $category->project()->delete();

        $ctype->delete();

        Session::flash('danger','You have successifully Deleted a Client Type');

        return redirect()->route('ctypes');
    }



    //methods end here

}
