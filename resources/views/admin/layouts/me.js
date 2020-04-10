// $('#project_id').on('change', function() {

//     var html = "";


//     var priceDate = $('#date').attr('value');

//     $value = $(this).val();
//     $.ajax({
//         type: 'get',
//         dataType: 'json',
//         url: '{{ URL::route('ksearch')}}',
//         data: {

//             'id': $value


//         },
//         success: function(data) {
//             html += '  <div class="form-group">';
//             html += '     <label for="projectPrice">Original Project Price</label>';
//             html += '    <input type="text" name="projectPrice" id="projectPrice" value="' + data.price + '"  class="form-control"  placeholder="Enter Project Price" >';
//             html += '   </div>';

//             $('#price').append(html);
//         },
//         fail: function() {

//             alert('good');
//         }
//     });


// });
// //project exists
// $('#result').css('display', 'none');


// $('#search').on('keyup', function() {

//     $value = $(this).val();
//     $.ajax({
//         type: 'get',
//         url: '{{ URL::route('psearch')}}',
//         data: {

//             'search': $value


//         },
//         success: function(data) {
//             $('#pexists').css('display', 'block');
//             $('#pexists').html(data).show('fast');
//         },
//         fail: function() {

//             $('#pexists').css('display', 'none');
//         }
//     });
// });

// //user exists 

// $('#firstname').on('keyup', function() {
//     $('#result').show();
//     $value = $(this).val();
//     $.ajax({
//         type: 'get',
//         url: '{{ URL::route('usearch')}}',
//         data: {
//             'firstname': $value
//         },
//         success: function(data) {
//             $('tbody').html(data).show('fast');
//         },
//         fail: function() {

//             $('tbody').html("");
//         }
//     });


// });


// //clients exists

// $('#fullName').on('keyup', function() {

//     $value = $(this).val();
//     $.ajax({
//         type: 'get',
//         url: '{{ URL::route('csearch')}}',
//         data: {
//             'fullName': $value
//         },
//         success: function(data) {
//             $('#exists').html(data).show('fast');
//         },
//         fail: function() {

//             $('#exists').html("");
//         }
//     });


// });



// //project category


// $('#projectType').on('keyup', function() {

//     $value = $(this).val();
//     $.ajax({
//         type: 'get',
//         url: '{{ URL::route('catsearch')}}',
//         data: {
//             'projectType': $value
//         },
//         success: function(data) {
//             $('#cat_exists').html(data).show('fast');
//         },
//         fail: function() {

//             $('#cat_exists').html("");
//         }
//     });


// });


// //search client

// $('#resultss').hide();

// $('#search_client').on('keyup', function() {

//     var query = $(this).val();

//     if (query != "") {
//         $.ajax({
//             url: '{{ URL::route('ccsearch')}}',
//             method: 'GET',
//             data: {
//                 query: query
//             },
//             dataType: 'json',
//             success: function(data) {
//                 console.log(data);
//                 $('#resultss').html(data.table_data).show('fast');
//             }
//         });

//     }

// });


// //password validation

// var password = '';


// //password  
// $("#password").keyup(function() {

//     var vall = $(this).val();

//     if (vall == '') {

//         $("#password_error").html("<small class='text-danger'> <span class=' text-danger'></span>  Enter your password</small>");

//         password = '';

//     } else if (vall.length < 9) {

//         $("#password_error").html("<small class='text-danger'> <span class=' text-danger'></span>  Your password should be atleast 8(eight) characters</small>");

//         password = '';
//     } else {
//         $("#password_error").html("<small class='text-primary'>  You are so Awesome !!</small>");

//         password = vall;
//     }
// });

// //repassword  
// $("#repassword").keyup(function() {

//     var vall = $(this).val();

//     if (vall == '') {

//         $("#repassword_error").html("<small class='well well-sm'> <span class='glyphicon glyphicon-remove text-danger'></span> Please re-enter your password</small>");

//         repassword = '';


//     } else if (password !== vall) {

//         $("#repassword_error").html("<small class='well well-sm'> <span class='glyphicon glyphicon-remove text-danger'></span> passwords don't match</small> ");

//         repassword = '';

//     } else {
//         $("#repassword_error").html("<small class='text-primary'>  <i class='fas fa-ok'></i> Passwords match,  You are so Awesome !!</small>");

//         repassword = vall;

//     }



// });





// //projects registration validation


// $("#search").keyup(function() {

//     var vall = $(this).val();

//     if (vall == '') {

//         $("#project_name_error").html("<small class='text-danger'> <span class=' text-danger'></span>  Please Enter the project Name</small>");



//     } else {
//         $("#project_name_error").html("<small class='text-primary'>  You are so Awesome !!</small>");


//     }
// });


// //sales magic here


// });