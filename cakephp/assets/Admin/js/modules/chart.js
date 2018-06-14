import Chart from 'chart.js';
var ctx = $("#myChart");

var nb_res_day = function () {
    var tmp = null;
    $.ajax({
        'async': false,
        'type': "POST",
        'global': false,
        'dataType': 'json',
        'url': "/admin/r-res/get-nb-res-chart",
        'data': { 'request': "", 'target': 'arrange_url', 'method': 'method_target' },
        'success': function (data) {
            tmp = data;
        }
    });
    return tmp;
}();

var nb_pers_day = function () {
    var tmp2 = null;
    $.ajax({
        'async': false,
        'type': "POST",
        'global': false,
        'dataType': 'json',
        'url': "/admin/r-res/get-nb-pers-chart",
        'data': { 'request': "", 'target': 'arrange_url', 'method': 'method_target' },
        'success': function (data) {
            tmp2 = data;
        }
    });
    return tmp2;
}()

var days = function () {
    var tmp3 = null;
    $.ajax({
        'async': false,
        'type': "POST",
        'global': false,
        'dataType': 'json',
        'url': "/admin/r-res/get-days",
        'data': { 'request': "", 'target': 'arrange_url', 'method': 'method_target' },
        'success': function (data) {
            tmp3 = data;
        }
    });
    return tmp3;
}();

var myChart = new Chart(ctx, {

	type: 'line',
    data: {
        labels: days,
        datasets: [{
            label: 'Nombre de réservations',
            data: nb_res_day,
            fill: false,
            backgroundColor: [ 'rgba(54, 162, 235, 0.2)' ],
            borderColor: [ 'rgba(42, 63, 84, 0.7)' ],
            pointHoverRadius: 7,
            pointHoverBackgroundColor: 'rgba(54, 162, 235, 0.2)',
            pointHoverBorderColor: 'rgba(42, 63, 84, 1)'
        },
        {
            label: 'Nombre de personnes',
            data: nb_pers_day,
            fill: false,
            backgroundColor: [ 'rgba(75, 192, 192, 0.2)' ],
            borderColor: [ 'rgba(75, 192, 192, 0.7)' ],
            pointHoverRadius: 7,
            pointHoverBackgroundColor: 'rgba(75, 192, 192, 0.7)',
            pointHoverBorderColor: 'rgba(75, 192, 192, 1)'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});