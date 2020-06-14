$(document).ready(function(){

  let dynamicColors = function(){
    let r = Math.floor(Math.random() * 255);
    let g = Math.floor(Math.random() * 255);
    let b = Math.floor(Math.random() * 255);
    return `rgb(${r},${g},${b})`;
  }
  $.ajax({
    url: url+'admin/chartData',
    method: 'post',
    dataType: 'json',
    data: {fetch: true},
    success: function(data){
      salesChart.data.labels = data['sales']['dates'];
      salesChart.data.datasets[0].data = data['sales']['data'];
      salesChart.update();
      for (var x in data['topseller']) {
        topChart.data.labels.push(data['topseller'][x].name);
        topChart.data.datasets[0].data.push(data['topseller'][x].count);
        topChart.data.datasets[0].backgroundColor.push(dynamicColors());
      }
      topChart.update();
    }
  });


  let topctx = document.getElementById("top_chart").getContext('2d');
  let topChart = new Chart(topctx, {
      type: 'pie',
      data: {
        labels: [],
        datasets: [{
          data: [],
          backgroundColor: [],
          label: 'Top Sellers'
        }]
      },
      options: {
        title: {
          display: true,
          text: ''
        },
        responsive: true
      }
  });

  let ctx = document.getElementById("sales_chart").getContext('2d');
  let salesChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [
          {
              label: 'Sales',
              data: [0, 0, 0, 0, 0, 0, 0],
              backgroundColor: [
                  'rgba(0, 123, 255, 0.2)',
              ],
              borderColor: [
                  'rgba(0, 123, 255, 1)',
              ],
              borderWidth: 1
          }
      ]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true,
                      callback: function(value, index, values){
                        if (parseInt(value) >= 1000) {
                          return '₱ ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }else {
                          return '₱ ' + value;
                        }
                      }
                  }
              }]
          },
          tooltips: {
            callbacks: {
              label: function(tooltipItem, data){
                if (parseInt(tooltipItem.yLabel) >= 1000) {
                  return '₱ ' + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }else {
                  return '₱ ' + tooltipItem.yLabel;
                }
              }
            }
          },
          elements: {
              line: {
                  tension: 0
              }
          }
      }
  });
});
