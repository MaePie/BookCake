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

var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [ '1', '2', '3', '4', '5' ],
    datasets: [
      {
        label: 'A',
        yAxesGroup: 'A',
        data: [ 100, 96, 84, 76, 69 ]
      },
      {
        label: 'B',
        yAxesGroup: 'B',
        data: [ 15, 120, 89, 91, 43 ]
      }
    ]
  },
  options: {
    yAxes: [
      {
        name: 'A',
        type: 'linear',
        position: 'left',
        scalePositionLeft: true
      },
      {
        name: 'B',
        type: 'linear',
        position: 'right',
        scalePositionLeft: false,
        min: 0,
        max: 1
      }
    ]
  }
});