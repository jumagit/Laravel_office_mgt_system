<?php

namespace App\Http\Controllers;
use App\Sale;
use App\Other_charges;
use App\Other_charges_income;
use App\SaleDetails;
use App\Project;
use App\Transaction;
use Session;
use Auth;
use DB;
use \PDF;
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


    public function creditors(){

        $sale = new Sale;
        $sales = $sale::where('balance','>',0)->orderBy('id', 'DESC')->get();
        return view('admin.sales.creditors')->with('sales', $sales);

    }


    public function debtors(){

        $sale = new Sale;
        $sales = $sale::where('balance','<=',0)->orderBy('id', 'DESC')->get();
        return view('admin.sales.debtors')->with('sales', $sales);

    }


    public function subscribers(){

        $charge = new Other_charges;
        $charges = $charge::all();
        return view('admin.sales.subscribers')->with('charges', $charges);

    }

    public function client_subscription($id){

        $other_charge = Other_charges::find($id);

        $clientName = $other_charge->sale->client->fullName;

        $subscriptions = Other_charges_income::where('other_charges_id',$id)->get();        

        return view('admin.sales.client_subscription')->with('subscriptions', $subscriptions)
                                                      ->with('clientName',$clientName);
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

        function clean($amount){

            $amount =  str_replace(',', '',$amount);
            $amount =  floatval($amount);
            $amount = intval($amount, 10);
             return $amount;
         }

            $amount_sold =clean($request->amount_sold);
            $amount_paid =clean($request->amount_paid);
            $amountToPay =clean($request->amount);
            $agreedAmount =clean($request->agreedAmount);


      function generateKey($keyLength){
            $string = md5(time().mt_rand(1, 1000000));      
           return substr(str_shuffle($string), 0, $keyLength);      
       }


        $testB = $amount_sold - $amount_paid;
        //calculating the balance 
        if($request->otherCharges == 0){

            $sale = Sale::create([
                'project_id' => $request->project_id,
                'amount_paid' => $amount_paid,
                'client_id' => $request->client_id,
                'amount_sold' => $amount_sold,
                'otherCharges' =>$request->otherCharges,
                'nextPDate'   => $request->nextPDate,
                'user_id' => Auth::user()->id,
                'balance' =>$request->balance,
              ]);


              $saledetail = SaleDetails::create([
            
                'sale_id'          =>$sale->id,
                'amount'           =>$amount_paid,
                'transaction_id'   =>generateKey(10),   
             ]);

        }
        elseif($request->otherCharges == 1){



            $sale = Sale::create([
                'project_id' => $request->project_id,
                'amount_paid' => $amount_paid,
                'client_id' => $request->client_id,
                'amount_sold' => $amount_sold,
                'otherCharges' =>$request->otherCharges,
                'nextPDate'   => $request->nextPDate,
                'user_id' => Auth::user()->id,
                'balance' =>$request->balance,
              ]);


              $saledetail = SaleDetails::create([
            
                'sale_id'          =>$sale->id,
                'amount'           =>$amount_paid,
                'transaction_id'   =>generateKey(10),
              
    
               
             ]);


        
            $other_charges = Other_charges::create([
            
                'sale_id'          =>$sale->id,
                'chargeType'       =>$request->chargeType,
                'billType'         =>$request->billType,
                'agreedAmount'     =>$agreedAmount,
                'gracePeriod'      =>$request->gracePeriod,
                'effectiveDate'    =>$request->effectiveDate,
                'enpDate'          =>$request->enpDate,  
             ]);

        }else{


        }

        //   $transaction = Transaction::create([
        //      'activity'=> $sale->project->projectName. ' was sold at '. $request->get('amount_sold'),
        //      'sale_id' =>$sale->id,
        //      'client_id' =>$request->client_id,
        //       'user_id' => Auth::user()->id,
            
        //   ]);

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
        

        // Mail::send('emails.salesform', $data,function($message) use ($to_name, $to_email) {

        //     $message->to($to_email, $to_name)->subject('Sales Notification');
        //     $message->from('mukoovajuma183@gmail.com','Sales Notification');

        // });

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
        $client  = Client::find($id);
        $project = Project::find($id);

        $sale = Sale::find($id);

     
        return view('admin.sales.make_payment')->with('sale',$sale)
                                               ->with('project',$project)
                                               ->with('client', $client);

       
    }
    
    public function make_payment(Request $request, $id)
    {

        $other_charges = Other_charges::find($id);
       
        function clean($amount){

            $amount =  str_replace(',', '',$amount);
            $amount =  floatval($amount);
            $amount = intval($amount, 10);
             return $amount;
         }



         $income = clean($request->income);

         $newIncome = $income/$request->months;
        

        $other_charges->enpDate = $request->serviceEndDate;

        $other_charges->save();


        $months = $request->months;
        $months = $months+1;
        $nextPDate = $request->nextPDate;

        function SED($effectiveDate,$i){

            $effectiveDate = date('Y-m-d H:i', strtotime("+".$i." months", strtotime($effectiveDate)));
            
            return $effectiveDate;
            
            }

        for ($i=1; $i < $months; $i++) { 	


           
            $other_charges_income = Other_charges_income::create([            
                'other_charges_id' => $request->id,
                'months'           =>$i,
                'service_end_date' =>SED($nextPDate,$i),            
                'income'           => $newIncome, 
             ]);
            
        }



        
      

         Session::flash('success','Subscription has been Successful');

         return redirect()->route('sales.subscribers');

       
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

        function generateKey($keyLength){

            $string = md5(time().mt_rand(1, 1000000));
      
           return substr(str_shuffle($string), 0, $keyLength);
      
       }



        function clean($amount){

           $amount =  str_replace(',', '',$amount);
           $amount =  floatval($amount);
           $amount = intval($amount, 10);
            return $amount;
        }

        $newBalance   =  clean($request->newBalance);
        $balance      = clean($request->balance);
        $amount_paid  = clean($request->amount_paid);
       

        $sale = Sale::find($id);
       
      


        $saledetail = SaleDetails::create([
            
            'sale_id'         => $sale->id,
            'amount'          => $amount_paid,
            'transaction_id'  =>generateKey(10),
          

           
         ]);


         //sale table update

        

        
         
         $sale->balance = $newBalance;
         $sale->nextPDate = $request->nextPDate;

        //defining pdf data

        $client = $sale->client->fullName;
        $project = $sale->project->projectName;



         $data = array([
             'newBalance'  =>$newBalance,
             'balance'     =>$balance,
             'amount_paid' =>$amount_paid,
             'client'      =>$client,
             'project'     =>$project,

         
         ]);

         
         $sale->save();

         Session::flash('success','A New Payment has been Made');

        //  $pdf = PDF::loadView('admin.sales.salesPdf',  [
        //     'data' => $data,
          
           
        // ]);
        
        // // return $pdf->stream('PDF');
        // // $pdf->setPaper('A4');
    
        // return $pdf->download('sales.pdf');

         return redirect()->route('sales.creditors');

















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
