<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .container-login100{
            background-image: url('<?php echo base_url('assets/images/bg-01.jpg') ?>') !important;
            z-index: -2;
        }

		#custom-button {
			padding: 8px;
			color: #555555;
			background-color: white;
			border-radius: 5px;
			cursor: pointer;
			transition-property: all;
			transition-duration: 0.4s;
			transition-timing-function: ease;
			transition-delay: 0s;
		}

		#custom-button:hover {
			background-color: transparent;
			color: white;
		}

		#custom-text {
			margin-left: 10px;
			font-family: sans-serif;
			color: #aaa;
		}
    </style>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/favicon.ico'); ?>"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<div class="wrap-login100"   style="margin-top: -6% !important;">
				<?php
                    $attributes = array( 'id'=>'form_registo', 'class' =>'validate-form'); 
                    echo form_open_multipart('crud/registoBD', $attributes);
                ?>
					<span class="loginr100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Registo
					</span>

					<?php $this->form_validation->set_error_delimiters('', ''); ?>

					<div class="wrap-input100 validate-input" data-validate = "Coloca o teu nome.">
						<input class="input100" type="text" name="nome" placeholder="Coloca o teu nome" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<p style="color: red; margin-top: -20px; margin-bottom: 50px;"><?php echo form_error('nome'); ?></p>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Formato inválido.">
						<input class="input100" type="text" name="email" placeholder="Coloca o teu email" required>
						<span class="focus-input100" data-placeholder="&#x2709;"></span>
					</div>
					<p style="color: red; margin-top: -20px; margin-bottom: 50px;"><?php 
							echo form_error('email');
							echo $this->session->flashdata('emailRepetido');
						?></p>

					<div class="wrap-input100 validate-input" data-validate="Coloca a tua password">
						<input class="input100" type="password" name="pass" placeholder="Coloca a tua password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
					<p style="color: red; margin-top: -20px; margin-bottom: 50px;"><?php echo form_error('pass'); ?></p>

					<div class="wrap-input100 validate-input" data-validate="Repete a password">
						<input class="input100" type="password" name="cpass" placeholder="Confirma a tua password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
					<p style="color: red; margin-top: -20px; margin-bottom: 50px;"><?php echo form_error('cpass'); ?></p>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Registar
						</button>
					</div>
					<p style="color: red;">
						<? echo $this->session->flashdata('erroEmail'); ?>
					</p>
					<p style="color: green;">
						<? echo $this->session->flashdata('sucessoEmail'); ?>
					</p>
					
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

</body>
</html>