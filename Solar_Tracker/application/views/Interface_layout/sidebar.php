<!doctype html>
<html lang="en">

<head>
  <title>Solar Tracker</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png'); ?>">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png'); ?>">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="icon" type="image/png" href="https://solartracker.pt/Solar_Tracker/Upload/Solar Tracker_thumbnail.png">
  <!-- Material Kit CSS -->
  <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.2'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/demo/demo.css'); ?>" rel="stylesheet" />
  <style>
    .notification {
      position: absolute;
      top: 175px;
      border: 1px solid #fff;
      right: 10px;
      font-size: 9px;
      background: #f44336;
      color: #fff;
      min-width: 20px;
      padding: 0 5px;
      height: 20px;
      border-radius: 10px;
      text-align: center;
      line-height: 19px;
      vertical-align: middle;
      display: block;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="<?php echo base_url('PaginasUtilizador/perfilUtilizador');?>" class="simple-text logo-mini">
          Solar
        </a>
        <a href="<?php echo base_url('PaginasUtilizador/perfilUtilizador');?>" class="simple-text logo-normal">
          Tracker
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if($paginaSelecionada == 'Interface_views/perfilUtilizador') echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url('PaginasUtilizador/perfilUtilizador');?>">
              <i class="material-icons">person</i>
              <p>Perfil</p>
            </a>
          </li>
          <li class="nav-item <?php if($paginaSelecionada == 'Interface_views/painelUtilizador') echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url('PaginasUtilizador/painelUtilizador');?>">
              <i class="material-icons">dashboard</i>
              <p>Painel</p>
            </a>
          </li>
          <?php
              if($this->session->userdata('permi')==1 || $this->session->userdata('permi')==2){

          ?>
          <li class="nav-item <?php if($paginaSelecionada == 'Interface_views/gestaoUtilizador' || $paginaSelecionada == 'Interface_views/gestaoEliminados' || $paginaSelecionada == 'Interface_views/gestaoAprovados') echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url('PaginasUtilizador/gestaoUtilizador');?>">
              <i class="material-icons">assignment</i>
              <?php
                  $array = array();
                  $resultadosSQL = $this->db->get('registados');
                  $contador = 0;
                  if ($resultadosSQL->num_rows() > 0){ ?>
                    <span class="notification"><?php echo $resultadosSQL->num_rows(); ?></span>
                  <?php } ?>
              <p>Gestão de utilizadores</p>
            </a>
          </li>
          <?php
              }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('crud/logout');?>">
              <i class="material-icons">exit_to_app</i>
              <p>Terminar Sessão</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><?php if($paginaSelecionada == 'Interface_views/perfilUtilizador') echo 'Perfil de utilizador'; else if($paginaSelecionada == 'Interface_views/painelUtilizador') echo 'Painel de utilizador'; else if($paginaSelecionada == 'Interface_views/gestaoUtilizador') echo 'Gestão de utilizadores'; ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?php echo base_url('PaginasUtilizador/perfilUtilizador');?>">Perfil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url('crud/logout');?>">Terminar Sessão</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <?php if( $paginaSelecionada ) $this->load->view($paginaSelecionada); ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>