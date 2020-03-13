$(document).ready(function() {


    new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'morris-area-example',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [
            { year: '2008', value: 20 },
            { year: '2009', value: 10 },
            { year: '2010', value: 5 },
            { year: '2011', value: 5 },
            { year: '2012', value: 20 }
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'year',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Value']
    });




});
















// /*
//  Template Name: Agroxa - Responsive Bootstrap 4 Admin Dashboard
//  Author: Themesbrand
//  File: Dashboard init js

//  pos

//  */




// ! function($) {
//     "use strict";

//     var Dashboard = function() {};





//     //creates area chart
//     Dashboard.prototype.createAreaChart = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
//             Morris.Area({
//                 element: element,
//                 pointSize: 0,
//                 lineWidth: 0,
//                 data: data,
//                 xkey: xkey,
//                 ykeys: ykeys,
//                 labels: labels,
//                 resize: true,
//                 gridLineColor: '#eee',
//                 hideHover: 'auto',
//                 lineColors: lineColors,
//                 fillOpacity: .7,
//                 behaveLikeLine: true
//             });
//         },

//         //creates Donut chart
//         Dashboard.prototype.createDonutChart = function(element, data, colors) {
//             Morris.Donut({
//                 element: element,
//                 data: data,
//                 resize: true,
//                 colors: colors
//             });
//         },







//         Dashboard.prototype.init = function() {

//             //creating area chart
//             var $areaData = [
//                 { y: '2011', a: 0, b: 0, c: 0 },
//                 { y: '2012', a: 150, b: 45, c: 15 },
//                 { y: '2013', a: 60, b: 150, c: 195 },
//                 { y: '2014', a: 180, b: 36, c: 21 },
//                 { y: '2015', a: 90, b: 60, c: 360 },
//                 { y: '2016', a: 75, b: 240, c: 120 },
//                 { y: '2017', a: 30, b: 30, c: 30 }
//             ];
//             this.createAreaChart('morris-area-example', 0, 0, $areaData, 'y', ['a', 'b', 'c'], ['Series A', 'Series B', 'Series C'], ['#ccc', '#f5b225', '#35a989']);




//             var $donutData = [
//                 { label: "Clients", value: 12 },
//                 { label: "Projects", value: 30 },
//                 { label: "Users", value: 20 }
//             ];
//             this.createDonutChart('morris-donut-example', $donutData, ['#f0f1f4', '#35a989', '#ffe082']);











//         },
//         //init
//         $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
// }(window.jQuery),

// //initializing 
// function($) {
//     "use strict";
//     $.Dashboard.init();
// }(window.jQuery);