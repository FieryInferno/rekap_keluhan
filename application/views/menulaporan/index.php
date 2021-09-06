<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="row">


          <div class="form-group col-sm-3">
               <div class="form-group">
                    <select class="form-control js-example-basic-single" name="kendala" required="" id="kendala">
                         <option>Pilih kendala</option>
                         <option value="Belum Siap">Belum Siap</option>
                         <option value="Siap Pasang">Siap Pasang </option>
                         <option value="Rumah Kosong">Rumah Kosong</option>
                         <option value="Rumah Renovasi">Rumah Renovasi</option>
                         <option value="Rumah Kontrakan">Rumah Kontrakan</option>
                         <option value="Rumah belum ditemukan">Rumah belum ditemukan</option>
                         <option value="Minta Dicabut">Minta Dicabut </option>
                         <option value="tidak punya gadjet">tidak punya gadjet</option>
                         <option value="Tidak Ada Gas">Tidak Ada Gas</option>
                         <option value="Lain-lain">Lain-lain </option>
                    </select>
               </div>
          </div>
     </div>

     <div class="row align-right">
          <div class="card shadow mb-2 col-md6">
               <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables </h6>
               </div>
               <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-bordered" id="kendala" width="100%" cellspacing="0">
                              <thead style="text-align: center;">
                                   <tr>
                                        <th>Sektor </th>
                                        <th>Jumlah </th>
                              </thead>

                              <tbody>

                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
          <div class="container-fluid col-xl-10">
               <!-- Content Row -->
               <div class="row">

                    <div class="col-xl-8 col-lg-7">
                         <!-- Bar Chart -->
                         <div class="card shadow mb-4">
                              <div class="card-header py-3">
                                   <h6 class="m-0 font-weight-bold text-primary">Grafik</h6>
                              </div>
                              <div class="card-body">
                                   <div class="chart-bar">
                                        <canvas id="myAreaChart"></canvas>
                                   </div>
                                   <hr>
                              </div>
                         </div>

                    </div>

                    <!-- Donut Chart -->
               </div>

          </div>
          <!-- /.container-fluid -->
     </div>

</div>


</div>

<script type="text/javascript">
     $(document).ready(function() {
          // kendala();
          $("#kendala").change(function() {
               kendala();
               kendalajaringan();
          });
     });

     function kendala() {
          var kendala = $("#kendala").val();
          $.ajax({
               url: "<?= base_url('menulaporan/all') ?>",
               data: "kendala=" + kendala,
               success: function(data) {
                    $("tbody").html(data);
               }
          });
     }

     function kendalajaringan() {
          var kendalajaringan = $("#kendala").val();
          $.ajax({
               url: "<?= base_url('menulaporan/kendalajaringan') ?>",
               data: "kendala=" + kendalajaringan,
               success: function(response) {
                    a = Object.keys(response).map((key) => [key, response[key]]);
                    let label = [];
                    let isi = [];
                    for (let index = 0; index < a.length; index++) {
                         const element = a[index];
                         label.push(element[0]);
                         isi.push(element[1]);
                    }
                    $('.chartjs-size-monitor').remove();
                    $('#myAreaChart').remove();
                    $('.chart-bar').append(
                         `<canvas id="myAreaChart"></canvas>`
                    );
                    var ctx = document.getElementById("myAreaChart");
                    var myLineChart = new Chart(ctx, {
                         type: 'bar',
                         data: {
                              labels: label,
                              datasets: [{
                                   label: "Earnings",
                                   lineTension: 1,
                                   backgroundColor: ['rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                   ],
                                   borderColor: [
                                        'rgba(255,99,132,1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)'
                                   ],
                                   pointRadius: 3,
                                   pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                   pointBorderColor: "rgba(78, 115, 223, 1)",
                                   pointHoverRadius: 3,
                                   pointHoverBackgroundClor: "rgba(78, 115, 223, 1)",
                                   pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                   pointHitRadius: 10,
                                   pointBorderWidth: 2,
                                   data: isi,
                              }],
                         },
                         options: {
                              maintainAspectRatio: false,
                              layout: {
                                   padding: {
                                        left: 10,
                                        right: 25,
                                        top: 25,
                                        bottom: 0
                                   }
                              },
                              scales: {
                                   xAxes: [{
                                        time: {
                                             unit: 'date'
                                        },
                                        gridLines: {
                                             display: false,
                                             drawBorder: false
                                        },
                                        ticks: {
                                             maxTicksLimit: 20,
                                        }
                                   }],
                                   yAxes: [{
                                        ticks: {
                                             maxTicksLimit: 5,
                                             padding: 10,
                                             beginAtZero: true
                                             // Include a dollar sign in the ticks
                                             // callback: function(value, index, values) {
                                             //      return '.' + number_format(value);
                                             // }
                                        },
                                        gridLines: {
                                             color: "rgb(234, 236, 244)",
                                             zeroLineColor: "rgb(234, 236, 244)",
                                             drawBorder: false,
                                             borderDash: [2],
                                             zeroLineBorderDash: [2]
                                        }
                                   }],
                              },
                              legend: {
                                   display: false
                              },
                              tooltips: {
                                   backgroundColor: "rgb(255,255,255)",
                                   bodyFontColor: "#858796",
                                   titleMarginBottom: 10,
                                   titleFontColor: '#6e707e',
                                   titleFontSize: 14,
                                   borderColor: '#dddfeb',
                                   borderWidth: 1,
                                   xPadding: 15,
                                   yPadding: 15,
                                   displayColors: false,
                                   intersect: false,
                                   mode: 'index',
                                   caretPadding: 10,
                                   callbacks: {
                                        label: function(tooltipItem, chart) {
                                             var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                             return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                                        }
                                   }
                              }
                         }
                    });
               }
          });
     }
</script>