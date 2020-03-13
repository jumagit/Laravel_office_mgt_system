<?php

namespace App\Http\Controllers;
use App\Sale;
use App\SaleDetails;
use App\Project;
use App\Transaction;
use Session;
use Auth;
use DB;
use App\Client;
use Illuminate\Http\Request;

use App\Mail\SalesCreateMail;

use Illuminate\Support\Facades\Mail;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale = new Sale;
        $sales = $sale::orderBy('id', 'DESC')->get();
        return view('admin.sales.index')->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project;

        $projects = $project::all();
        
        $client = new Client;

        $clients = $client::all();

        
        if($projects->count() == 0 || $clients->count() == 0 ){

            Session::flash('warning', 'You cannot Sale without a project and a client');
            return redirect()->back();
        }
        return view('admin.sales.create')->with('clients', $clients)
                                         ->with('projects', $projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $amount_sold = str_replace(',', '', $request->amount_sold);
        $amount_sold = floatval($amount_sold);
        $amount_sold = intval($amount_sold, 10);
        $amount_paid = str_replace(',', '', $request->amount_paid);
        $amount_paid = floatval($amount_paid);
        $amount_paid = intval($amount_paid, 10);
        $amountToPay = str_replace(',', '', $request->amountToPay);
        $amountToPay = floatval($amountToPay);
        $amountToPay = intval($amountToPay, 10);

    


        $testB = $amount_sold - $amount_paid;
       // dd( $amount_sold,$amount_paid);

        // $this->validate($request, [
         
        //     'project_id'=>'required|numeric',   
        //     'client_id'=>'required|numeric',       
        //     'nextPDate'  =>'required',   
        //     'pricePrice' =>'required', 
        //     'balance' =>   'required',
            

        // ]);


        //calculating the balance 

        $project = Project::find($request->project_id);
       

        $sale = Sale::create([
            'project_id' => $request->project_id,
            'amount_paid' => $amount_paid,
            'client_id' => $request->client_id,
            'amount_sold' => $amount_sold,
            'payment_status' => 0,
            'nextPDate'   => $request->nextPDate,
            'user_id' => Auth::user()->id,
            'balance' =>$request->balance,
          ]);


          $sale->client->prospective = 1;

          


          
          $saledetail = SaleDetails::create([
            
            'sale_id'          =>$sale->id,
            'effectiveDate'    =>$request->effectiveDate,
            'billType'         =>$request->billType,
            'amount_to_pay'    =>$request->amount_to_pay,
            'chargeType'       =>$request->chargeType,


           
         ]);



          $transaction = Transaction::create([
             'activity'=> $sale->project->projectName. ' was sold at '. $request->get('amount_sold'),
             'sale_id' =>$sale->id,
             'client_id' =>$request->client_id,
              'user_id' => Auth::user()->id,
            
          ]);





          $data  = array(
              'projectName' => $sale->project->projectName,
              'clientName' => $sale->client->fullName,
              'amount_paid' => $amount_paid,
              'amount_sold' => $amount_sold,
              'nextPDate'   => $request->get('nextPDate'),
              'payment_status' => $request->get('payment_status'),
              'added_by' => Auth::user()->firstname,
              'sold_to'  =>$sale->client->fullName,
              'balance' =>$request->get('balance'),
              'testb'   =>$testB,
              'dateT' => date('Y-m-d H:i:s'),
          );

        

        //   Mail::to('mukoovajumag8@gmail.com')->send( new SalesCreateMail($data));

        $to_name = 'Mukoova Juma';
        $to_email = 'mukoovajumag8@gmail.com';
        

        Mail::send('emails.salesform', $data,function($message) use ($to_name, $to_email) {

            $message->to($to_email, $to_name)->subject('Sales Notification');
            $message->from('mukoovajuma183@gmail.com','Sales Notification');

        });

          Session::flash('success','A New Sale has been Created');

          return redirect()->back();
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
     * Fetch the particular company details
     * @return json response
     */
    public function chart()
    {

        $sale = new Sale;
        $sales = $sale::orderBy('id', 'DESC')->get();
      
      return response()->json($sales);
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
    public function update(Request $request, $id)
    {
        //
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


    //daily

    public function daily( $id){

        $sale = Sale::find($id);

        $sale->payment_status = 1;

        $sale->save();

        Session::flash('success', 'Payment status has Changed to Daily');

        return redirect()->route('sales');

    }


    //weekly


    public function weekly( $id){

        $sale = Sale::find($id);

        $sale->payment_status = 2;

        $sale->save();

        Session::flash('success', 'Payment status has Changed to Weekly');

        return redirect()->route('sales');

    }


    //monthly


    public function monthly( $id){

        $sale = Sale::find($id);

        $sale->payment_status = 3;

        $sale->save();

        Session::flash('success', 'Payment status has Changed to Monthly');

        return redirect()->route('sales');

    }
//yearly


public function yearly( $id){

    $sale = Sale::find($id);

    $sale->payment_status = 4;

    $sale->save();

    Session::flash('success', 'Payment status has Changed to Yearly');

    return redirect()->route('sales');

}


    //end methods
}
