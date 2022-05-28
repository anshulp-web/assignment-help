<!-- Header include here.... -->
<?php include 'layout/header.php' ?>

<!-- Enquiry form here.... -->
<div class="erp_contact_main_wrapper float_left">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="erp_regit_top_cont_wrapper float_left">
						<h2>Job <span>opportunity</span></h2>
						<p>Please fill out the form below.</p>
					</div>
				</div>
				<div class="col-md-6 col-xl-6">
				<div class="erp_contact_form_left_wrapper float_left">
                    <?php
                    if ($this->session->flashdata('enquiry_error')) {

                        echo "<div class='alert alert-danger alert-dismissible fade show red' role='alert'>
                        <h6 style='color:white;text-align:center;'>All fields are required!!</h6>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }
                    if ($this->session->flashdata('img_error')) {

                        echo "<div class='alert alert-danger alert-dismissible fade show red' role='alert'>
                        <h6 style='color:white;text-align:center;'>Only jpg,png,pdf extension accepted.And Image size not more than 400kb!</h6>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }
                    if ($this->session->flashdata('success')) {

                        echo "<div class='alert alert-success alert-dismissible fade show green' role='alert'>
                        <h6 style='color:white;text-align:center;'>Send successfully!</h6>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }
                    ?>
                    <form id="job_opt_form" action="<?php echo base_url('job_opt_form/index') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="erp_regis_field_wrapper float_left">
                                    <input type="text" placeholder="Enter Name" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="erp_regis_field_wrapper float_left">
                                    <input type="email" placeholder="Your Email" name="email" id="email">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="erp_regis_field_wrapper float_left">
                                    <input type="number" placeholder="Enter whatsapp number" name="wh_number" id="wh_number">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="erp_regis_field_wrapper float_left">
                                    <input type="text" placeholder="Your City" name="city" id="city">
                                </div>
                            </div>

							<div class="col-md-6">
								<div class="erp_regis_field_wrapper float_left">
									<input type="text" placeholder="Qualification" name="qualification" id="qualification">
								</div>
							</div>
							<div class="col-md-6">
                                <div class="erp_regis_field_wrapper float_left">
                                    <input type="text" placeholder="Area of specialization" name="specialization" id="specialization">
                                </div>
                            </div>
                            
                                <div class="col-md-12">
									<div class="erp_regis_field_wrapper float_left">
									   <label for="">Upload your CV</label>
										<input type="file"  id="cv_img" name="cv_img">
                            			</div>
								</div>
								<div class="col-md-12">
									<div class="erp_regis_field_wrapper float_left">
									    <label for="">Upload sampel paper</label>
										<input type="file"  id="smp_img" name="smp_img" class="">
                                        
									</div>
								</div>
								<div class="col-md-6">
									<div class="erp_btn erp_login_btn erp_contact_btn">
										<input type="submit" value="submit">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6 align-self-center d-none d-sm-none d-md-none d-lg-none d-xl-block">
					<div class="erp_contact_img_right_wrapper float_left">
						<img src="<?php echo base_url() ?>assets/images/contact_img.png" alt="img">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- webanajmandi inner banner End -->
<!-- Footer included here... -->
<?php include 'layout/footer.php' ?>