<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            position: relative;
            margin: auto;
        }
        .invoice{
           margin-top:120px;

        }
        .logo{
            height: 90px;
            width:150px;
            text-align: center;
        }
        
        .information {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 98%;
            margin: auto;
           

            padding: 10px;
            
            background-color: #ffffff;
            display: block;
            color: gray;
            text-align: center;
        }

        .informations{
            position: absolute;
             bottom: 0;
             background-color: #431124;
             color:#ffffff;
             padding: 12px;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;

        }

        .informations td,
        .informations th {
            font-weight: bolder;
            font-size: 12px;
            text-transform: uppercase;
           
        }
        
        #status {
            color: green;
            border: 2px solid red;
            padding: 10px;
            background-color: aqua;
        }
        
        .headr {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            color: red;
            position: relative;
        }
        
        .information td,
        .information th {
            font-weight: bolder;
            text-transform: uppercase;
            text-align: left;
        }
        
        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 12px;
        }
        
        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        #customers tr:hover {
            background-color: #ddd;
        }
        
        #customers th {
            padding-top: 14px;
            padding-bottom: 14px;
            text-transform: uppercase;
            text-align: left;
            background-color: gray;
            color: white;
        }
    </style>
</head>

<body>

    <div class="information" style="padding-bottom:5px;border-bottom:3px solid gray">
        <table>
            <tr>
                <td align="left" style="width:37%;">

                    <div class="left">
                      

                            <table>

                                <tr>
                                <td>Address - {{$data->address}}</td>                               
                                </tr>
                               
                                <tr>
                                    <td><small> {{$data->email}}</td>                               
                                </tr>
                                <tr>
                                <td><small> Contact - {{$data->pcontact}}</small></span></td>                               
                                </tr>
                             
    
                            </table>
                    

                    </div>


                </td>

                <td align="center" style="width: 23%;">
                    <img src="uploads/avatars/nugsoft-image-300x130.png" alt="Logo" class="logo" />
                </td>

                <td align="left" style="width: 40%;">
                    <div class="right">
                        <table>

                            <tr>
                                <td>1KM off Kampala-Gayaza High way, Kyanja, Kampala</td>                               
                            </tr>
                           
                            <tr>
                                <td>Email: info@nugsoft.com</td>                               
                            </tr>
                            <tr>
                                <td><small> +256 777043887/+256 706397621</small></span></td>                               
                            </tr>
                         

                        </table>
                       
                        


                    </div>
                </td>
            </tr>

        </table>
    </div>
    <br>
    <br>

    <div class="invoice">

    
   
        <h2 class="headr" style="text-align: center;text-transform: uppercase;"> Invoice Details For {{ $data->fullName}}</h2>
    

       

   

    <table id="customers" >
     

        <tr>
            <th>Project Sold</th>
            <th>Amount Paid</th>
            <th>Balance</th>
            <th>Next.P.Date</th>
        </tr>

        
        @if($data->sales()->count()> 0) 
        
        @foreach ($data->sales as $sale)
        
        <tr>

            <td> {{ $sale->project->projectName }} </td>

            <td> {{$sale->amount_paid}} </td>

            <td>{{ $sale->balance}}</td>
            <td>{{ $sale->nextPDate}}</td>

        </tr>

        @endforeach 
        
        @endif

       
        


        <tfoot>
            <tr>
                <td colspan="2"></td>
                <td align="left">Total</td>
                <td align="left" class="gray" style="color:black;">

                    @php
                        
                        $total = 0;

                    @endphp
                    @foreach ($data->sales as $sale)

                    @php
                        $total += $sale->amount_paid;
                    @endphp

                   
            
                    @endforeach 

                    {{$total}}

                </td>
            </tr>
        </tfoot>

    </table>



    <div class="informations" >
        <table width="100%">
            <tr>
                <td align="left" style="width: 70%;">
                    &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
                </td>
                <td align="right" style="width: 30%;">
                    Let's do I.T for You.
                </td>
            </tr>

        </table>

    </div>

</body>

</html>