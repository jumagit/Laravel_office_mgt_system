<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Nugsoft_cms</title>
        <meta content="Admin Dashboard" name="description" />
        <meta name="_base_url" content="{{ url('/') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
      

        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        
        {{ Html::style('assets/plugins/bootstrap-md-datetimepicker/css/bootstrap-material-datetimepicker.css') }}
        {{ Html::style('assets/plugins/bootstrap-touchspin/css/$.bootstrap-touchspin.min.css') }}
        {{ Html::style('assets/plugins/select2/css/select2.min.css') }}
        {{ Html::style('assets/plugins/morris/morris.css') }}
        {{ Html::style('assets/css/bootstrap.min.css') }}
        {{ Html::style('assets/css/icons.css') }}
        {{ Html::style('assets/css/style.css') }}
        {{ Html::style('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}               
      
        {{ Html::style('assets/plugins/sweet-alert2/sweetalert2.min.css') }}
       
        {{ Html::style('assets/plugins/datepicker/datepicker3.css') }}




         <script>


              
              

                function individual(){
                        document.getElementById('formShow1').style.display="block";
                        document.getElementById('formShow2').style.display="none";
                    }

                 function group(){
                        document.getElementById('formShow2').style.display="block";
                        document.getElementById('formShow1').style.display="none";
                    }


            



         </script>


     
       
        

       

      
       
      
    </head>

    <body>

        <!-- Navigation Bar-->
       @include('admin.layouts.navbar')
        <!-- End Navigation Bar-->

        <!-- page wrapper start -->
        <div class="wrapper">
            <div class="page-title-box">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-12">
                            {{-- <div class="state-information d-none d-sm-block">
                                <div class="state-graph">
                                    <div id="header-chart-1"></div>
                                    <div class="info">Balance $ 2,317</div>
                                </div>
                                <div class="state-graph">
                                    <div id="header-chart-2"></div>
                                    <div class="info">Item Sold 1230</div>
                                </div>
                            </div> --}}
                            
                          
                                @yield('page')
                                @yield('pagecomment')
                           
                            

                        </div>
                    </div>
                </div>
                <!-- end container-fluid -->
            
            </div>
            <!-- page-title-box -->

            <div class="page-content-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
                
                <!-- end container-fluid -->
            </div>
            <!-- end page content-->

        </div>
        <!-- page wrapper end -->

      {{-- @include('admin.layouts.footer') --}}

        <!-- Footer -->
  <footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                All copyrights reserved to  Nugsoft Technologies</span>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

@yield('script')


<!-- jQuery  -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

{{ Html::script('assets/js/jquery.slimscroll.js')  }}
{{ Html::script('assets/js/waves.min.js')  }}
{{ Html::script('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')  }}
{{ Html::script('assets/plugins/parsleyjs/parsley.min.js') }}


   <!-- Required datatable js -->
{{ Html::script('assets/plugins/datatables/jquery.dataTables.min.js')  }}
{{ Html::script('assets/plugins/datatables/dataTables.bootstrap4.min.js')  }}
{{-- multiselect --}}
{{ Html::script('assets/plugins/select2/js/select2.min.js')  }}

{{ Html::script('assets/plugins/sweet-alert2/sweetalert2.min.js') }}




{{ Html::script('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')  }}
{{ Html::script('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')  }}

<!-- App js -->
{{ Html::script('assets/js/app.js')  }}



{{-- date time picker --}}

{{ Html::script('assets/plugins/datepicker/bootstrap-datepicker.js')  }}

{{-- money validation--}}

{{ Html::script('assets/plugins/money/number.js')  }}




{{-- editor --}}

{{ Html::script('assets/plugins/tinymce/tinymce.min.js') }}

{{ Html::script('assets/plugins/chart/Chart.bundle.min.js') }}

{{-- form validation using parsleys --}}


{{-- custom javascript  --}}



{{ Html::script('assets/js/custom.js') }}
{{ Html::script('assets/js/functions.js') }}




<script>

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

    

@if(Session::has('success'))


swal('Success!', '{{ Session::get('success') }}', 'success');


@endif

//info toastr

@if(Session::has('info'))

swal('Information!', '{{ Session::get('info') }}', 'info');



@endif

//warning toastr

@if(Session::has('warning'))

swal('Warning!', '{{ Session::get('warning') }}', 'warning');

@endif

//danger toastr
@if(Session::has('danger'))

swal('Deleted!', '{{ Session::get('danger') }}', 'info');

@endif







</script>

<script type="text/javascript">


             
  $(document).ready(function(){

    $('#project_id').on('change', function() {

  //calculating the effective date 

    var grossperiod  = $('#grossperiod').val();//months

    console.log(grossperiod);


    var grossadd = grossperiod * 30;

   



   

   
     var html ="";

     
     var priceDate = $('#date').attr('value');

    $value = $(this).val();
           $.ajax({
           type: 'get',
           dataType:'json',
           url: '{{ URL::route('ksearch')}}',
           data: { 
               
            'id': $value 


           },
           success: function(data) {
                            html+='  <div class="form-group">';
                            html+='     <label for="projectPrice">Original Project Price</label>';
                            html+='    <input type="text" name="projectPrice" id="projectPrice" value="'+ data.price+'"  class="form-control"  placeholder="Enter Project Price" >';
                            html+='   </div>';




                            $('#price').append(html);                        

                          
                           
                           
                           

                          
                  
           },
           fail:function(){
  
            alert('good');
           }
       });


     });
  //project exists
    $('#result').css('display','none');
     
  
      $('#search').on('keyup', function() {
        
           $value = $(this).val();
           $.ajax({
           type: 'get',
           url: '{{ URL::route('psearch')}}',
           data: { 
               
            'search': $value 


           },
           success: function(data) {
            $('#pexists').css('display','block');
               $('#pexists').html(data).show('fast');
           },
           fail:function(){
  
            $('#pexists').css('display','none');
           }
       });
   });
  
 //user exists 
  
      $('#firstname').on('keyup', function() {
        $('#result').show();
          $value = $(this).val();
              $.ajax({
              type: 'get',
              url: '{{ URL::route('usearch')}}',
              data: { 'firstname': $value },
              success: function(data) {
                  $('tbody').html(data).show('fast');
              },
              fail:function(){
  
                  $('tbody').html("");
              }
          });
  
  
      });


      //clients exists

      $('#fullName').on('keyup', function() {
   
          $value = $(this).val();
              $.ajax({
              type: 'get',
              url: '{{ URL::route('csearch')}}',
              data: { 'fullName': $value },
              success: function(data) {
                  $('#exists').html(data).show('fast');
              },
              fail:function(){
  
                  $('#exists').html("");
              }
          });
  
  
      });

      

      //project category

      
      $('#projectType').on('keyup', function() {
   
       $value = $(this).val();
       $.ajax({
       type: 'get',
       url: '{{ URL::route('catsearch')}}',
       data: { 'projectType': $value },
       success: function(data) {
           $('#cat_exists').html(data).show('fast');
       },
       fail:function(){

           $('#cat_exists').html("");
       }
   });


});


      //search client

      $('#resultss').hide();

      $('#search_client').on('keyup',function() {
      
      var query = $(this).val();

      if (query != "") {                   
                  $.ajax({
                  url: '{{ URL::route('ccsearch')}}',
                  method:'GET',
                  data:{query:query},
                  dataType:'json',            
                  success:function(data){
                      console.log(data);
                      $('#resultss').html(data.table_data).show('fast');            
                  }
              });  
                  
              }

      });

 






    

    








          //password validation

    var password = '';
    var confirmpassword = '';


    //password  
    $("#password").keyup(function() {

        var vall = $(this).val();

        if (vall == '') {

            $("#password_error").html("<small class='text-danger'> <span class=' text-danger'></span>  Enter your password</small>");

            password = '';

        } else if (vall.length < 9) {

            $("#password_error").html("<small class='text-danger'> <span class=' text-danger'></span>  Your password should be atleast 8(eight) characters</small>");

            password = '';
        } else {
            $("#password_error").html("<small class='text-primary'>  You are so Awesome !!</small>");

            password = vall;
        }
    });

    //repassword  
    $("#repassword").keyup(function() {

        var vall = $(this).val();

        if (vall == '') {

            $("#repassword_error").html("<small class='well well-sm'> <span class='glyphicon glyphicon-remove text-danger'></span> Please re-enter your password</small>");

            repassword = '';


        } else if (password !== vall) {

            $("#repassword_error").html("<small class='well well-sm'> <span class='glyphicon glyphicon-remove text-danger'></span> passwords don't match</small> ");

            repassword = '';

        } else {
            $("#repassword_error").html("<small class='text-primary'>  <i class='fas fa-ok'></i> Passwords match,  You are so Awesome !!</small>");

            repassword = vall;

        }



    });




    //filtering


//projects registration validation


$("#search").keyup(function() {

var vall = $(this).val();

if (vall == '') {

    $("#project_name_error").html("<small class='text-danger'> <span class=' text-danger'></span>  Please Enter the project Name</small>");

   

} else {
    $("#project_name_error").html("<small class='text-primary'>  You are so Awesome !!</small>");

 
}
});


//sales magic here

$('#otherYes').on('click', function(){

    $('#otherYesForm').css('display','block');

                      var html1 ="";

                      var html3 = "";


             



      });


        $('#otherNo').on('click', function(){

            $('#otherYesForm').css('display','none');


        })
















  
  
  });
          
  
          
 </script>




</body>

</html>