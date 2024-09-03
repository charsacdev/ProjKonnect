$(document).ready(function(){
     Chart.register(ChartDataLabels);
     var yearlyData = [4000, 8000, 7000, 9500, 2600, 7500, 1000, 8000, 6500, 4000, 3000, 10000];
     var yearlyLabel = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];


     // barChart(yearlyData, yearlyLabel, 'userChart', 'User');

     
     function barChart(data, label, idName, labelName) {
          idName.height = 'auto';

          new Chart(idName, {
               type: 'bar',
               data: {
                    defaultFontFamily: 'Poppins',
                    labels: label,
                    datasets: [
                         {
                              label: labelName,
                              data: data,
                              borderColor: '#D80450',
                              borderWidth: "0",
                              borderRadius: 0,
                              barThickness: 30,
                              hoverBackgroundColor: '#000000',
                              backgroundColor: '#00b14f',
                              tension: 0.5,
                              fill: false,
                         }
                    ]
               },
               options: {
                    plugins: {
                          datalabels: {
                              display: false,
                          },
                         legend: {
                              display: true,
                              position: 'bottom'
                         }
                    },
                    scales:  {
                         y: {
                              grid: {
                                   borderDash: [5, 5],
                                   zeroLineBorderDash: [5, 5],
                                   zeroLineColor: '#fff',
                                   zeroLineWidth: 0
                              },
                              beginAtZero: true
                         },
                         x: {
                              grid: {
                                   zeroLineColor: 'transparent',
                                   zeroLineWidth: 0,
                                   display: false,
                              },
                              barPercentage: 0.2
                         },
                    },
               }
          });
     }

     // // Task Progress Chart 
     // var data =  [75, 25];
     // var label = ['Done', 'Pending'];
     // pieChart(data, label, 'progressChart')
     
     // // Course Progress Chart 
     // var data =  [70, 30];
     // var label = ['Completed', 'uncompleted'];
     // pieChart(data, label, 'courseProgressChart')
     
   
     function pieChart(data, label, idName) {
          idName.height = 'auto';

          new Chart(idName, {
               type: 'pie',
               data: {
                    defaultFontFamily: 'Poppins',
                    labels: label,
                    datasets: [
                         {
                              data: data,
                              borderColor: '#D80450',
                              backgroundColor:  [
                                   '#007CFE', // Green
                                   'transparent', // Orange
                                   '#f97066', // Red
                               ],
                               borderColor: 'white',
                               borderWidth: 0,
                              tension: 0.5,
                              fill: false,
                         }
                    ],
               },
               options: {
                    plugins: {
                         datalabels: {
                              display: true,
                              color: 'white', 
                              formatter: function(value, context) {
                                  return value + '%';
                              }
                          },
                         legend: {
                              display: false,
                              position: 'bottom'
                         },
                         tooltip: {
                              callbacks: {
                                  label: function(context) {
                                      var label = context.label || '';
                                      var value = context.formattedValue || '';
                                      return label + ': ' + value + '%';
                                  }
                              }
                          }
                    }
               }
          });
     }












});