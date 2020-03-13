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
{{-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> --}}
{{ Html::script('assets/js/jquery.min.js')  }}
{{ Html::script('assets/js/bootstrap.bundle.min.js')  }}
{{ Html::script('assets/js/jquery.slimscroll.js')  }}
{{ Html::script('assets/js/waves.min.js')  }}
{{ Html::script('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')  }}
{{ Html::script('assets/plugins/parsleyjs/parsley.min.js') }}


   <!-- Required datatable js -->
{{ Html::script('assets/plugins/datatables/jquery.dataTables.min.js')  }}
{{ Html::script('assets/plugins/datatables/dataTables.bootstrap4.min.js')  }}


   <!-- toastr alerts  -->
{{ Html::script('assets/plugins/toastr/toastr.min.js')  }}
{{ Html::script('assets/plugins/sweet-alert2/sweetalert2.min.js') }}


   <!-- Datatable init js -->
{{-- {{ Html::script('assets/pages/datatables.init.js')  }} --}}



{{ Html::script('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')  }}
{{ Html::script('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')  }}

<!-- App js -->
{{ Html::script('assets/js/app.js')  }}

{{-- date time picker --}}

{{ Html::script('assets/plugins/daterangepicker/daterangepicker.js')  }}
{{ Html::script('assets/plugins/datepicker/bootstrap-datepicker.js')  }}

{{-- date and date range picker--}}




{{-- editor --}}
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

{{-- {{ Html::script('assets/plugins/tinymce/tinymce.min.js') }} --}}

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

<script>


             
  $(document).ready(function(){

  

  //project exists
    // $('#result').hide();
     
  
      $('#search').on('keyup', function() {
           $('#result').show();
           $value = $(this).val();
           $.ajax({
           type: 'get',
           url: '{{ URL::route('psearch')}}',
           data: { 'search': $value },
           success: function(data) {
               $('tbody').html(data).show('fast');
           },
           fail:function(){
  
             $('tbody').html("");
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


      //search client 






     

  
  
  });





 
          
 </script>





</body>

</html>