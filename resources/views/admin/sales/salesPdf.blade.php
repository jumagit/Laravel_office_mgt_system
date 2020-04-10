
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Nugsoft Technologies Invoice</title>
    <link rel="stylesheet" href="" media="all" />
  </head>

  <style>

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 18cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial,Trebuchet MS, Arial, Helvetica, sans-serif; 
  font-size: 14px; 
  /* font-family: Arial; */
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 120px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  /* text-align: center; */
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}


  </style>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="uploads/avatars/nugsoft-image-300x130.png">
      </div>
      <h3>INVOICE 3-2-1</h3>
      <div id="company" class="clearfix">
        <div>Nugsoft Technologies</div>
        <div>1KM off Kampala-Gayaza High way,<br />  Kyanja, Kampala</div>
        <div>+256 777043887/+256 706397621</div>
        <div><a href="http://nugsoft.com">info@nugsoft.com</a></div>
      </div>

      <div id="project">
        <div><span>PROJECT</span> Website development</div>
        <div><span>CLIENT</span> {{ $data->fullName}}</div>
        <div><span>ADDRESS</span>{{$data->address}}</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">{{$data->email}}</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">PROJECT NAME</th>
            <th class="desc">AMOUNT PAID</th>
            <th>BALANCE</th>
            <th>NEXT P.DATE</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>

               
        @if($data->sales()->count()> 0) 
        
        @foreach ($data->sales as $sale)

          <tr>
            <td class="service">{{ $sale->project->projectName }}</td>
            <td class="unit">{{$sale->amount_paid}}</td>
            <td class="unit">{{ $sale->balance}}</td>
            <td class="qty">{{ $sale->nextPDate }}</td>
            <td class="total">$1,040.00</td>
          </tr>
          @endforeach 
        
          @endif
        
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
         
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
          <td class="grand total">{{$total}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
      <i class="fa fa-align-center" aria-hidden="true"></i>
     <p style="text-align:center">Let's do I.T for You.</p>
    </footer>
  </body>
</html>