
          <?php
            $segundos = $this->painel_model->numero_registos() * 5;
            $movmin = (($this->painel_model->movimentos_verticais() + $this->painel_model->movimentos_horizontais()) * 60 ) / $segundos;
            $movminf = number_format($movmin, 2, '.', '');
            $voltinf = number_format($this->painel_model->voltagem_media(), 2, '.', '');
          ?>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">swap_vert</i>
                  </div>
                  <p class="card-category">Movimentos verticais</p>
                  <h3 class="card-title"><?php echo $this->painel_model->movimentos_verticais() ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="javascript:;" style="cursor: context-menu;">Atualizado após carregamento da página</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">swap_horiz</i>
                  </div>
                  <p class="card-category">Movimentos horizontais</p>
                  <h3 class="card-title"><?php echo $this->painel_model->movimentos_horizontais() ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="javascript:;" style="cursor: context-menu;">Atualizado após carregamento da página</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">restore</i>
                  </div>
                  <p class="card-category">Movimentos por minuto</p>
                  <h3 class="card-title"><?php echo $movminf; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i>Atualizado
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">offline_bolt</i>
                  </div>
                  <p class="card-category">Média de voltagem</p>
                  <h3 class="card-title"><?php echo $voltinf; ?> V</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i>Atualizado
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>                
                </div>
                <div class="card-body">
                  <h4 class="card-title">Movimentos</h4>
                  <p class="card-category">Verifique a comparação entre os movimentos horizontais e verticais!</p>
                </div>
                <div class="card-footer ">
                  <div class="stats">
                    Desde sempre
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                <div id="columnchart_material" style="width: 100%; height: 200px;"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Voltagem semanal</h4>
                  <p class="card-category">Consulte aqui a voltagem produzida por dia na semana atual!</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i>Esta semana
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div id="chart_div" style="width: 100%; height: 200px;"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Voltagem mensal</h4>
                  <p class="card-category">Consulte aqui a voltagem produzida por mês neste ano!</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i>Este ano
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <?php 
              $this->db->select("*");
              $this->db->from("dadosPainel");
              $this->db->limit(5);
              $this->db->order_by('idDado',"DESC");
              $query = $this->db->get();
            ?>
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <h4 class="card-title">Últimos 5 registos do painel</h4>
                  <p class="card-category">Verifique os últimos registos do seu painel</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th style="text-align: center !important; color: #ab47bc">#</th>
                      <th style="text-align: center !important; color: #ab47bc">Movimentos verticais</th>
                      <th style="text-align: center !important; color: #ab47bc">Movimentos horizontais</th>
                      <th style="text-align: center !important; color: #ab47bc">Voltagem produzida</th>
                      <th style="text-align: center !important; color: #ab47bc">Voltagem acumulada</th> 
                    </thead>
                    <tbody>
                    <?php foreach($query->result_array() as $detalhesPainel) { ?>
                      <tr>
                        <td style="text-align: center !important;"><?php echo $detalhesPainel['idDado']; ?></td>
                        <td style="text-align: center !important;"><?php echo $detalhesPainel['movimentosVerticaisRegisto']; ?></td>
                        <td style="text-align: center !important;"><?php echo $detalhesPainel['movimentosHorizontaisRegisto']; ?></td>
                        <td style="text-align: center !important;"><?php echo $detalhesPainel['voltagemPainel']; ?> V</td>
                        <?php $queryy = $this->db->query("SELECT SUM(voltagemPainel) as soma FROM dadosPainel WHERE idDado <= " . $detalhesPainel['idDado'] . ";");
                        $vacumulada = number_format(floatval($queryy->row()->soma), 2, '.', ''); ?>
                        <td style="text-align: center !important;"><?php echo $vacumulada; ?> V</td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/core/jquery.min.js'); ?>"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="<?php echo base_url('assets/js/core/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/core/bootstrap-material-design.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?php echo base_url('assets/js/plugins/moment.min.js'); ?>"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo base_url('assets/js/plugins/sweetalert2.js'); ?>"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.validate.min.js'); ?>"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.bootstrap-wizard.js'); ?>"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-selectpicker.js'); ?>"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-datetimepicker.min.js'); ?>"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js'); ?>"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-tagsinput.js'); ?>"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo base_url('assets/js/plugins/jasny-bootstrap.min.js'); ?>"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo base_url('assets/js/plugins/fullcalendar.min.js'); ?>"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?php echo base_url('assets/js/plugins/jquery-jvectormap.js'); ?>"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url('assets/js/plugins/nouislider.min.js'); ?>"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?php echo base_url('assets/js/plugins/arrive.min.js'); ?>"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url('assets/js/plugins/chartist.min.js'); ?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js'); ?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('assets/js/material-dashboard.js?v=2.1.2'); ?>" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url('assets/demo/demo.js'); ?>"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawMultSeries);

    function drawMultSeries() {
      var data = google.visualization.arrayToDataTable([
        ['Dia da semana', 'Voltagem (V)'],
        ['S', <?php echo $this->painel_model->voltagem_segunda(); ?>],
        ['T', <?php echo $this->painel_model->voltagem_terça(); ?>],
        ['Q', <?php echo $this->painel_model->voltagem_quarta(); ?>],
        ['Q', <?php echo $this->painel_model->voltagem_quinta(); ?>],
        ['S', <?php echo $this->painel_model->voltagem_sexta(); ?>],
        ['S', <?php echo $this->painel_model->voltagem_sabado(); ?>],
        ['D', <?php echo $this->painel_model->voltagem_domingo(); ?>]
      ]);

      var options = {
        legend: {position: 'none'},
        chartArea: {width: '70%'},
        hAxis: {
          title: 'Voltagem (V)',
          minValue: 0,
          textStyle: {color: "white", fontSize: 14},
          titleTextStyle: { color: 'white' }
        },
        vAxis: {
          title: 'Dia da semana',
          textStyle: {color: "white", fontSize: 12},
          titleTextStyle: { color: 'white' }
        },
        backgroundColor: 'transparent'
      };

      var chart = new google.visualization.BarChart(document.getElementById('columnchart_material'));
      chart.draw(data, options);
    }

    google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawBasic);

    function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Mês');
      data.addColumn('number', 'Voltagem');
      var today = new Date();
      var year = today.getFullYear();
      
      data.addRows([
        [new Date(year, 0), <?php echo $this->painel_model->voltagem_janeiro(); ?>],
        [new Date(year, 1), <?php echo $this->painel_model->voltagem_fevereiro(); ?>],
        [new Date(year, 2), <?php echo $this->painel_model->voltagem_março(); ?>],
        [new Date(year, 3), <?php echo $this->painel_model->voltagem_abril(); ?>],
        [new Date(year, 4), <?php echo $this->painel_model->voltagem_maio(); ?>],
        [new Date(year, 5), <?php echo $this->painel_model->voltagem_junho(); ?>],
        [new Date(year, 6), <?php echo $this->painel_model->voltagem_julho(); ?>],
        [new Date(year, 7), <?php echo $this->painel_model->voltagem_agosto(); ?>],
        [new Date(year, 8), <?php echo $this->painel_model->voltagem_setembro(); ?>],
        [new Date(year, 9), <?php echo $this->painel_model->voltagem_outubro(); ?>],
        [new Date(year, 10), <?php echo $this->painel_model->voltagem_novembro(); ?>],
        [new Date(year, 11), <?php echo $this->painel_model->voltagem_dezembro(); ?>]
      ]);

      var options = {
        legend: {position: 'none'},
        hAxis: {
          title: 'Mês',
          textStyle: {color: "white", fontSize: 12},
          titleTextStyle: { color: 'white' }
        },
        vAxis: {
          title: 'Voltagem (V)',
          textStyle: {color: "white", fontSize: 14},
          titleTextStyle: { color: 'white' }
        },
        backgroundColor: 'transparent'
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    } 

    $(document).ready(function() {

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Número', 'Movimentos'],
          ['Horizontais',     <?php echo $this->painel_model->movimentos_horizontais(); ?>],
          ['Verticais',     <?php echo $this->painel_model->movimentos_verticais(); ?>]
        ]);

        var options = {
          pieHole: 0.2,
          width: "100%",
          responsive: true,
          backgroundColor: 'transparent',
          legend: {position: 'top', alignment: 'center', textStyle: {color: "white", fontSize: 14}}
        };

        var chart = new google.visualization.PieChart(document.getElementById('chartPreferences'));
        chart.draw(data, options);
      }

     $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>