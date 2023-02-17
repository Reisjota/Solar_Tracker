
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Editar Perfil</h4>
                  <p class="card-category">Completa o teu perfil</p>
                </div>
                <div class="card-body">
                  <?php
                      $attributes = array( 'id'=>'form_perfil', 'class' =>'validate-form');  // Criação do Form com os seguintestes atributos 
                      echo form_open_multipart('crud/alterarPerfilUtilizador', $attributes); // Criação da Tag Form  com a action = users/loginBD
                      $this->form_validation->set_error_delimiters('', '');
                  ?>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="">Nome de utilizador</label>
                          <input type="text" name='nomeUser' class="form-control" value="<?php echo $this->session->userdata('nomeUser');?>">
                        </div>
                        <p style="color: red; margin-top: -20px; margin-bottom: 50px;"><?php echo form_error('nomeUser'); ?></p>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="">Email</label>
                          <input type="email"  name='emailUser' class="form-control" value="<?php echo $this->session->userdata('emailUser');?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="">Primeiro Nome</label>
                          <input type="text" name='primeironomeUser' class="form-control" value="<?php echo $this->session->userdata('primeironomeUser');?>">
                        </div>
                        <p style="color: red; margin-bottom: 50px;"><?php echo form_error('primeironomeUser'); ?></p>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="">Último Nome</label>
                          <input type="text" name='ultimonomeUser' class="form-control" value="<?php echo $this->session->userdata('ultimonomeUser');?>">
                        </div>
                        <p style="color: red; margin-bottom: 50px;"><?php echo form_error('ultimonomeUser'); ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="">Morada</label>
                          <input type="text" name='moradaUser' class="form-control" value="<?php echo $this->session->userdata('moradaUser');?>">
                        </div>
                        <p style="color: red; margin-bottom: 50px;"><?php echo form_error('moradaUser'); ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="">Cidade</label>
                          <input type="text" name='cidadeUser' class="form-control" value="<?php echo $this->session->userdata('cidadeUser');?>">
                        </div>
                        <p style="color: red; margin-bottom: 50px;"><?php echo form_error('cidadeUser'); ?></p>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="">País</label>
                          <input type="text" name='paisUser' class="form-control" value="<?php echo $this->session->userdata('paisUser');?>">
                        </div>
                        <p style="color: red; margin-bottom: 50px;"><?php echo form_error('paisUser'); ?></p>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="">Código Postal</label>
                          <input type="text" name='codigopostalUser' class="form-control" value="<?php echo $this->session->userdata('codigopostalUser');?>">
                        </div>
                        <p style="color: red; margin-bottom: 50px;"><?php echo form_error('codigopostalUser'); ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Descrição</label>
                          <div class="form-group">
                            <textarea class="form-control" rows="5" id="myTextarea" name="textarea"><?php echo $this->session->userdata('descricaoUser');?></textarea>
                          </div>
                          <p style="color: red; margin-bottom: 50px;"><?php echo form_error('textarea'); ?></p>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Atualizar perfil</button>
                    <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="<?php echo $this->session->userdata('fotoUser'); ?>" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"><?php if($this->session->userdata('permi')==1) { echo "Administrador"; } else if($this->session->userdata('permi')==2) echo "Fundador"; else echo "Utilizador"; 
                    ?></h6>
                  <h4 class="card-title"><?php echo $this->session->userdata('nomeUser');?></h4>
                  <p class="card-description">
                    Bem-vindo(a) <?php echo $this->session->userdata('nomeUser') ?>, aqui poderás consultar e alterar as informações pessoais associadas à tua conta!
                  </p>
                </div>
                <div class="card-foot">
                  <div style="text-align: center; width; 100%; margin-bottom: 30px;">
                    <div class="validate-input" data-validate="Coloca a tua foto de perfil">
                      <input type="file" name="userfile" id="real-file" hidden="hidden"/>
                      <button type="button" id="custom-button" class="btn btn-primary">Escolhe a tua foto de perfil</button>
                    </div>
                    <?php if ($this->session->flashdata('errosValidacaoFoto')) echo '<p style="color: red; margin-bottom: 50px;">' . $this->session->flashdata("errosValidacaoFoto") . '</p>'; else echo '<span style="display: inline-block; color: #555555;" id="custom-text" style="color: white;">Ainda não existe ficheiro selecionado</span>'; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php
              echo form_close();
            ?>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/core/jquery.min.js'); ?>"></script>
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
  <script>
		const realFileBtn = document.getElementById("real-file");
		const customBtn = document.getElementById("custom-button");
		const customTxt = document.getElementById("custom-text");

		customBtn.addEventListener("click", function() {
		realFileBtn.click();
		});

		realFileBtn.addEventListener("change", function() {
		if (realFileBtn.value) {
			customTxt.innerHTML = realFileBtn.value.match(
			/[\/\\]([\w\d\s\.\-\(\)]+)$/
			)[1];
		} else {
			customTxt.innerHTML = "No file chosen, yet.";
		}
		});
	</script>
  <script>
    document.getElementById("myTextarea").value = "<?php echo $this->session->userdata('descricaoUser');?>";
    $(document).ready(function() {
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