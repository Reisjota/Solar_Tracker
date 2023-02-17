<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- 
    More Templates Visit ==> Free-Template.co
    -->
    <title>Solar Tracker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Controlamos a sua energia!" />
    <meta name="keywords" content="Controlamos a sua energia!" />
    <meta name="author" content="Solar Tracker" />
    
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/open-iconic-bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/icomoon.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="icon" type="image/png" href="https://solartracker.pt/Solar_Tracker/Upload/Solar Tracker_thumbnail.png">
    <style>
      <?php if ($pagina_ativa == 'Forms/login' || $pagina_ativa == 'Forms/registo'){ ?>
        body {
          overflow: hidden !important;
        }
      <?php } ?>
    </style>
  </head>
  <body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" style="font-family: font-family: 'Raleway', sans-serif !important;" href="<?php echo base_url('home/index');?>">Solar Tracker</a>
        <button class="navbar-toggler collapsed"  style="font-family: 'Raleway', sans-serif !important;" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a style="color: rgba(255,255,255,.7); font-family: 'Raleway', sans-serif !important;" href="<?php if(($pagina_ativa) == 'Inicio_view/inicio_view') echo '#section-home'; else echo base_url('home/index');?>" class="nav-link">Página Inicial</a></li>
            <li class="nav-item"><a style="color: rgba(255,255,255,.7); font-family: 'Raleway', sans-serif !important;" href="<?php if(($pagina_ativa) == 'Inicio_view/inicio_view') echo '#section-features'; else echo base_url('home/index');?>" class="nav-link">Funcionalidades</a></li>
            <li class="nav-item"><a style="color: rgba(255,255,255,.7); font-family: 'Raleway', sans-serif !important;" href="<?php echo base_url('PaginaInicio/paginaEntrar'); ?>" class="nav-link">Entrar</a></li>
            <li class="nav-item"><a style="color: rgba(255,255,255,.7); font-family: 'Raleway', sans-serif !important;" href="<?php echo base_url('PaginaInicio/paginaRegistar'); ?>" class="nav-link">Registar</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <?php if($pagina_ativa) $this->load->view($pagina_ativa); ?>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.easing.1.3.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.animateNumber.min.js'); ?>"></script>
    

    <script src="<?php echo base_url('assets/js/main_.js'); ?>"></script>
