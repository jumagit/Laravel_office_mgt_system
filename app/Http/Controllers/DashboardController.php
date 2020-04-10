<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

use App\Project;

use App\User;

use App\Sale;

use App\SaleDetails;

use App\Transaction;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $sale = Sale::all();
        $sale_details = SaleDetails::all();
        $project =  Project::all();
        $client = Client::all();
        $transaction = Transaction::all();
        return view('admin.dashboard')->with('project',$project)
                                      ->with('client', $client)
                                      ->with('sale', $sale)
                                      ->with('user', $user)
                                      ->with('sale_details', $sale_details)
                                      ->with('transactions', $transaction);
    }


    public function notfound(){

        return view('admin.errors.404');
        
    }
}
