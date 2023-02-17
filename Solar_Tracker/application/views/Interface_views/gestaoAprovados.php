<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Gestão Utilizadores</h4>
        <p class="card-category"> Aqui consegue controlar todos os users</p>
        <ul class="nav nav-tabs" data-tabs="tabs" style="float: right !important;">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('PaginasUtilizador/gestaoUtilizador');?>">
              <i class="material-icons">person_outline</i> Ativos
                <div class="ripple-container"></div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('PaginasUtilizador/gestaoEliminados');?>">
              <i class="material-icons">person_remove</i> Eliminados
                <div class="ripple-container"></div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo base_url('PaginasUtilizador/gestaoAprovados');?>">
              <i class="material-icons">person_add</i> Por aprovar
                <div class="ripple-container"></div>
            </a>
          </li>
        </ul>
      </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
                <?php
                  $array = array();
                  $resultadosSQL = $this->db->get('registados');
                  $contador = 0;
                  if ($resultadosSQL->num_rows() == 0){
                    echo "Não existem utilizadores por aprovar.";
                  }
                  else{ ?>
                        <thead class=" text-primary">
                      <!-- ID -->       
                      <th>ID</th>
                      <!-- Nome -->      
                      <th>Nome</th>
                      <!-- Email -->      
                      <th>Email</th>
                      <!-- Tipo -->     
                      <th>Tipo De Utilizador</th>
                      <!-- Ações -->   
                      <th style="text-align: center !important;">Ações</th>
                    </thead>
                    <tbody> <?php
                    foreach($resultadosSQL->result_array() as $detalhesEmpresa) {
                      if (intval($this->session->userdata('idUser')) == intval($detalhesEmpresa['idUser'])){
                        echo '<tr style="background-color:#fcfcd4 !important">';
                      }
                      else{
                        echo '<tr>';
                      }
                ?>
                  <!-- ID -->      
                  <td class = "circle">
                    <?php echo $detalhesEmpresa['idUser'];?>
                  </td>     
                  <!-- Nome -->       
                  <td>
                    <?php echo $detalhesEmpresa['nomeUser'];?>
                  </td>    
                  <!-- Email -->    
                  <td>
                    <?php echo $detalhesEmpresa['emailUser'];?>
                  </td>  
                  <!-- Tipo Utilizador -->  
                  <td>
                    <?php 
                    if($detalhesEmpresa['permissaoUser']==1) { echo "Administrador"; } else echo "Utilizador"; 
                    ?>
                  </td> 
                  <!-- Ações -->
                  <td class="td-actions" style="text-align: center !important;">
                    <?php if (intval($this->session->userdata('idUser')) != intval($detalhesEmpresa['idUser'])){
                            if($detalhesEmpresa['permissaoUser']!=1) {       
                    ?>
                    <button type="button" class="btn btn-success" style="width: 30px;" data-toggle="modal" data-target="#myModal<?php echo $contador; ?>">
                    <i class="material-icons">check_circle</i>
                    </button>
                    <div class="modal fade" id="myModal<?php echo $contador;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title">Aceitar novo usuário</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                          </div>
                          <div class="modal-body">
                            Tem a certeza que pretende aprovar o utilizador <?php echo $detalhesEmpresa['nomeUser'] ?>?
                          </div>
                          <div class="modal-footer">
                            <a href="<?php echo base_url('crud/aprovar_utilizador/' . $detalhesEmpresa['idUser']); ?>"><button type="button" class="btn btn-success btn-simple">Aprovar</button></a>
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Cancelar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } } ?>
                  </td>
                </tr>
                <?php
                    $contador++;
                  } }
                ?>
              </tbody>
                      </tbody>
                    </table>
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
</body>
</html>