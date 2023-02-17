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
        .container-login100{
            background-image: url('<?php echo base_url('assets/images/bg-01.jpg') ?>') !important;
            z-index: -2;
		}
        body {
          overflow: hidden !important;
        }
    </style>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.ico'); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/iconic/css/material-design-iconic-font.min.css'); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animate/animate.css'); ?>"/>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/css-hamburgers/hamburgers.min.css'); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animsition/css/animsition.min.css'); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/select2/select2.min.css'); ?>"/>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/daterangepicker/daterangepicker.css'); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/util.css'); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>"/>
  </head>
  <body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" style="font-family: font-family: 'Raleway', sans-serif !important;" href="">Solar Tracker</a>
      </div>
    </nav>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/bg-01.jpg');">
			<div class="wrap-login100"  style="margin-top: -6% !important;">
				<?php
                    $attributes = array( 'id'=>'form_login', 'class' =>'validate-form');  // Criação do Form com os seguintestes atributos 
                    echo form_open('crud/alterarpass/'.$idUser.'', $attributes); // Criação da Tag Form  com a action = users/loginBD
                ?>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Alterar Password
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Formato inválido.">
						<input class="input100" type="password" name="password" placeholder="Password nova" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password">
						<input class="input100" type="password" name="cpassword" placeholder="Confirmar password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<p style="color: green">
						<?php
							echo $this->session->flashdata('sucessoEmail');
						?>
					</p>
					<p style="color: red;">
						<?php
							echo $this->session->flashdata('errosValidacaoRegisto');
							echo $this->session->flashdata('erroEmail');
						?>
					</p>

					<div class="container-login100-form-btn" style="margin-top: 40px; margin-bottom: -20px;">
						<button class="login100-form-btn" type="submit">
							Confirmar
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="<?php echo base_url('PaginaInicio/paginaEntrar'); ?>">
							Inicie sessão!
						</a>
					</div>
					<?php echo form_close(); ?>
			</div>
		</div>
	</div>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.easing.1.3.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.animateNumber.min.js'); ?>"></script>
    

    <script src="<?php echo base_url('assets/js/main_.js'); ?>"></script>