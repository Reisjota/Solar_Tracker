<!DOCTYPE html>
<html lang="en">
<head>
	<title>Solar Tracker</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .container-login100{
            background-image: url('<?php echo base_url('assets/images/bg-01.jpg') ?>') !important;
            z-index: -2;
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
<!--===============================================================================================-->
</head>
<body style="overflow: hidden;">
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/bg-01.jpg');">
			<div class="wrap-login100"  style="margin-top: -6% !important;">
				<?php
                    $attributes = array( 'id'=>'form_login', 'class' =>'validate-form');  // Criação do Form com os seguintestes atributos 
                    echo form_open('crud/loginBD', $attributes); // Criação da Tag Form  com a action = users/loginBD
                ?>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Formato inválido.">
						<input class="input100" type="text" name="email" placeholder="Email do utilizador" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password">
						<input class="input100" type="password" name="pass" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<p style="color: red !important;">
						<?php
							echo $this->session->flashdata('errosValidacaoLogin');
							echo $this->session->flashdata('utilizadorNaoEncontrado');
							echo $this->session->flashdata('utilizadorRegistado');
							echo $this->session->flashdata('encontrouEmail');
						?>
					</p>

					<div class="container-login100-form-btn" style="margin-top: 40px; margin-bottom: -20px;">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
					<div class="text-center p-t-90" style="padding-top: 20px !important;">
						<a class="txt1" href="<?php echo base_url('PaginaInicio/paginaAlterarPassword'); ?>">
							Esqueceu-se da password?
						</a>
					</div>
					<div class="text-center p-t-90" style="padding-top: 30px !important;">
						<a class="txt1" href="<?php echo base_url('PaginaInicio/paginaRegistar'); ?>">
							É um novo membro? Crie um conta!
						</a>
					</div>
					<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/daterangepicker/moment.min.js')?>"></script>
	<script src="<?php echo base_url('assets/vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/vendor/countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/js/main.js')?>"></script>

</body>
</html>