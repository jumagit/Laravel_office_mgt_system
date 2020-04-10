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
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/datepicker3.css')}}">


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
                    All copyrights reserved to Nugsoft Technologies</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    @yield('script')


    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    {{-- <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{asset('assets/js/waves.min.js')}}"></script>
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/money/number.js')}}"></script>
    <script src="{{asset('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    {{-- <script type="text/javascript" src="{{asset('js/functions.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script> --}}




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
//declaring variables

// //project exists


//th show the original Price on select

           $('#project_id').on('change', function() {
                var html = "";
                var priceDate = $('#date').attr('value');
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '{{ URL::route('ksearch')}}',
                    data: {
                        'id': $value
                    },
                    success: function(data) {
                        html += '  <div class="form-group">';
                        html += '     <label for="projectPrice">Original Project Price</label>';
                        html += '    <input type="text" name="projectPrice" id="projectPrice" value="' + data.price + '"  class="form-control"  placeholder="Enter Project Price" >';
                        html += '   </div>';

                        $('#price').append(html);
                    },
                    fail: function() {
                        alert('Failed');
                    }
                });
            });


            //check if client exists

            
// //user exists 

$('#firstname').on('keyup', function() {
    $('#result').show();
    $value = $(this).val();
    $.ajax({
        type: 'get',
        url: '{{ URL::route('usearch')}}',
        data: {
            'firstname': $value
        },
        success: function(data) {
            $('tbody').html(data).show('fast');
        },
        fail: function() {

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
        data: {
            'fullName': $value
        },
        success: function(data) {
            $('#exists').html(data).show('fast');
        },
        fail: function() {

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
        data: {
            'projectType': $value
        },
        success: function(data) {
            $('#cat_exists').html(data).show('fast');
        },
        fail: function() {

            $('#cat_exists').html("");
        }
    });




//    //checking if  project exists         
//    $('#result').css('display', 'none');
//         $('#search').on('keyup', function() {

//             alert('me');

//         //     $value = $(this).val();
//         //     $.ajax({
//         //         type: 'get',
//         //         url: '{{ URL::route('psearch')}}',
//         //         data: {
//         //             'search': $value
//         //         },
//         //         success: function(data) {
//         //             $('#pexists').css('display', 'block');
//         //             $('#pexists').html(data).show('fast');
//         //         },
//         //         fail: function() {

//         //             $('#pexists').css('display', 'none');
//         //         }
//         //     });
//         });



    </script>




</body>

</html>