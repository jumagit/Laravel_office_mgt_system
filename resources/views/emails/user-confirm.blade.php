


<h1>Dear <strong>{{ $firstname}}   {{ $lastname}} </strong></h1>
<br>

<p style="font-size:14px;">This is to inform you that your  <b> account has been created </b> and your <b>Credientials</b> are;
</p>
<br>

<table  style="border:1px solid black;padding:10px; font-size:20px;mmargin-bottom:12px;"  width="100%" cellspacing="2" cellpadding="2">

    <thead>
            <tr style="background-color:lightblue;color:black; border-bottom:1px solid gray;padding:20px;">

                <th width="50%">Username</th>
                <th  width="50%">Password</th>

            </tr>
        
    </thead>


    <tbody>

            <tr style="background-color:lightblue;color:black; border-bottom:1px solid gray;padding:20px;text-align:center;"  cellspacing="2" cellpadding="2">

            <td>{{ $name}}</td>
            <td>{{ $password}}</td>

            </tr>

    </tbody>
</table>

