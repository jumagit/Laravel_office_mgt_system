//parsley configurations


jQuery(document).ready(function() {











    //end password changing

    //user registration


    jQuery('#userRegisterValidation').parsley();


    //user profile 

    jQuery('#userProfileValidation').parsley();


    //create projects


    jQuery('#createProjectsForm').parsley();


    //date validation

    jQuery('.date').datepicker({

        autoclose: true,
        format: 'yyyy-mm-dd',
        todayBtn: true,
        todayHighlight: true,

    });



    jQuery('.month').datepicker({
        autoclose: true,
        format: ' MM',
        todayBtn: true,
        todayHighlight: true,

    });

    //create client form validation
    jQuery('#createClientForm').parsley();

    //create sales
    jQuery('#salesCreateForm').parsley();




    //datatables

    $('.table').DataTable();


    //multiselect

    $(".select2").select2();






















});






//tiny mice configuration

jQuery(document).ready(function() {

    if (jQuery(".tiny").length > 0) {
        tinymce.init({
            selector: "textarea.tiny",
            theme: "modern",
            height: 100,
            plugins: [

            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                { title: 'Bold text', inline: 'b' },
                { title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
                { title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
                { title: 'Example 1', inline: 'span', classes: 'example1' },
                { title: 'Example 2', inline: 'span', classes: 'example2' },
                { title: 'Table styles' },
                { title: 'Table row 1', selector: 'tr', classes: 'tablerow1' }
            ]
        });
    }


});





var APP_URL = document.getElementsByTagName('meta')._base_url.content;
var APP_CSRF = document.querySelector("meta[name='csrf-token']").content;

var url = "{{url('http://localhost:8000/admin/sales/chart')}}";
var ctx = document.getElementById('canvas').getContext('2d');

jQueryget('http://localhost:8000/admin/sales/chart', // url
    function(data, textStatus, jqXHR) { // success callback
        // console.log('status: ' + textStatus + ', data:' + data);


        var Years = new Array();
        var Labels = new Array();
        var Prices = new Array();

        //looping through the data

        data.forEach(function(data) {
            Years.push(data.yearSales);
            Labels.push(data.productName);
            Prices.push(data.productPrice);
        });


        console.log(Years)
        console.log(Labels)
        console.log(Prices)

        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: Years,
                datasets: [{
                    label: 'Infosys Price',
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 112, 215, 1)',
                        'rgba(255, 200, 86, 1)',
                        'rgba(75, 152, 162, 1)',
                        'rgba(153, 192, 215, 1)',
                        'rgba(255, 149, 114, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    data: Prices,
                    borderWidth: 1
                }]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


    });


var ctx1 = document.getElementById('canvas1').getContext('2d');

jQueryget('http://localhost:8000/admin/sales/chart', // url
    function(data, textStatus, jqXHR) { // success callback
        // console.log('status: ' + textStatus + ', data:' + data);


        var Years = new Array();
        var Labels = new Array();
        var Prices = new Array();

        //looping through the data

        data.forEach(function(data) {
            Years.push(data.yearSales);
            Labels.push(data.productName);
            Prices.push(data.productPrice);
        });


        console.log(Years)
        console.log(Labels)
        console.log(Prices)

        var chart = new Chart(ctx1, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: Years,
                datasets: [{
                    label: 'Infosys Price',
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 112, 215, 1)',
                        'rgba(255, 200, 86, 1)',
                        'rgba(75, 152, 162, 1)',
                        'rgba(153, 192, 215, 1)',
                        'rgba(255, 149, 114, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    data: Prices,
                    borderWidth: 1
                }]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


    });




//tiny mice configuration







jQuery(document).ready(function() {
        jQuery('#birthDate').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',

        });

        jQuery('#from').datepicker({
            autoclose: true,
            format: 'yyyy/mm/dd'
        });
        jQuery('#to').datepicker({
            autoclose: true,
            format: 'yyyy/mm/dd'
        });


    })
    //jQuerymaterial.init()