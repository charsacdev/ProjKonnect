$(document).ready(function(){
     Chart.register(ChartDataLabels);
     var yearlyData = [4000, 8000, 7000, 9500, 2600, 7500, 1000, 8000, 6500, 4000, 3000, 10000];
     var yearlyLabel = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];


     barChart(yearlyData, yearlyLabel, 'studentChart', 'Student growth');

     var screenSize = window.innerWidth;
    
     var thickness = screenSize <= 576 ? 15 : 30;
     
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
                              borderColor: 'transparent',
                              borderWidth: "0",
                              borderRadius: 0,
                              barThickness: thickness,
                              hoverBackgroundColor: '#000000',
                              backgroundColor: '#007CFE',
                              
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
                                   borderDash: [5, 5],
                                   zeroLineBorderDash: [5, 5],
                                   zeroLineColor: '#fff',
                                   zeroLineWidth: 0
                              },
                              barPercentage: 0.2
                         },
                    },
               }
          });
     }

     var data =  [58, 28, 20];
     var label = ['Completed', 'Pending', 'Refunded'];

     
     pieChart(data, label, 'transactionsChart')
     
   
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
                                   '#12b76a', // Green
                                   '#f79009', // Orange
                                   '#f97066', // Red
                               ],
                               borderColor: 'white',
                               borderWidth: 2,
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
                              display: true,
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