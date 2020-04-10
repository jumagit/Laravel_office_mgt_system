<?php

namespace App\Http\Controllers;

use App\Category;
use DB;
use Illuminate\Http\Request;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = new Category;
        $categories = $category::orderBy('id', 'DESC')->get();
        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category_price = str_replace(',', '', $request->category_price);
        $category_price = floatval($category_price);
        $category_price = intval($category_price, 10);
        $this->validate($request, [

            'projectType' => 'required',

        ]);

        $category = Category::create([

            'projectType' => $request->projectType,
            'category_price' => $category_price,

        ]);

        $category->save();

        Session::flash('success', 'Successifully registered Project Category');

        return redirect()->route('categories');

    }

    public function search(Request $request)
    {

        if ($request->ajax()) {
            $output = "";

            $categories = DB::table('categories')->where('projectType', 'LIKE', '%' . $request->projectType . "%")->get();

            if ($categories->count() > 0) {
                foreach ($categories as $category) {
                    $output .= '<div class=" card-body p-2 text-danger">'
                    . $category->projectType . " | " . 'Already Exists' .

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
        $category = Category::find($id);

        return view('admin.categories.edit')->with('category', $category);
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

        $category_price = str_replace(',', '', $request->category_price);
        $category_price = floatval($category_price);
        $category_price = intval($category_price, 10);
        $category = Category::find($id);
        $category->projectType = $request->projectType;
        $category->category_price = $request->category_price;
        $category->save();
        Session::flash('success', 'You have successifully Updated a Category');
        return redirect(route('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        foreach ($category->projects as $project) {

            $project->forceDelete();
        }

        $category->delete();

        Session::flash('warning', 'You have successifully Deleted a Category');

        return redirect()->route('categories');
    }
}
