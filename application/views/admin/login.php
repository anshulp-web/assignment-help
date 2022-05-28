<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title>Assignmenthelp11</title>
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicon.png">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="description" content="webanajmandi software" />
	<meta name="keywords" content="anajmandi software" />
	<meta name="author" content="evolve webinfo" />
	<meta name="MobileOptimized" content="320" />
	<!--Template style -->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/animate.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/flaticon.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/owl.theme.default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/magnific-popup.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/responsive-menu.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/responsive.css" />
</head>

<body>
	<!-- Login form here.... -->
	<?php
	if ($this->session->flashdata('error')) {
		echo "<div class='alert alert-danger alert-dismissible fade show red' role='alert'>
                                    <h6 style='color:white;text-align:center;'>Please enter vailid username and password!</h6>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>";
	}
	?>

	<div class="erp_contact_main_wrapper float_left admin_form">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-6">
					<div class="erp_contact_form_left_wrapper float_left">
						<form id="enquiry_form" action="<?php echo base_url('admin/login') ?>" method="POST">
							<div class="row">
								<div class="col-md-12">
									<div class="erp_regis_field_wrapper ">
										<input type="text" placeholder="Username" name="username" autocomplete="off">
									</div>
									<div>
										<?php echo form_error('username') ?>
									</div>
								</div>

								<div class="col-md-12">
									<div class="erp_regis_field_wrapper ">
										<input type="password" placeholder="password" name="password">
									</div>
									<div>
										<?php echo form_error('password') ?>
									</div>
								</div>

							</div>
							<div class="col-md-12">
								<div class="erp_btn erp_login_btn erp_contact_btn">
									<input type="submit" value="Login" class="input">
								</div>
							</div>
					</div>
					</form>
				</div>
			</div>

		</div>
	</div>
	</div>
	<!-- footer Wrapper End -->
	<script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/modernizr.js"></script>
	<script src="<?php echo base_url() ?>assets/js/owl.carousel.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.magnific-popup.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.countTo.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.inview.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.menu-aim.js"></script>
	<script src="<?php echo base_url() ?>assets/js/custom.js"></script>



</body>

</html>