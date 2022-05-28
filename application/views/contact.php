<?php
include 'layout/header.php';
?>

<!-- Enquiry form here.... -->
<div class="erp_contact_main_wrapper float_left">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="erp_regit_top_cont_wrapper float_left">

                    <h2>Enquiry <span>Form</span></h2>
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
                    <form id="enquiry_form" action="<?php echo base_url('enquiry_form/index') ?>" method="POST" enctype="multipart/form-data">
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
                                    <input type="number" placeholder="Your Number" name="mo_number" id="mo_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="erp_regis_field_wrapper float_left">
                                    <input type="number" placeholder="Whatsapp Number" name="wh_number" id="wh_number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="erp_regis_field_wrapper float_left">
                                    <input type="text" placeholder="University/College" name="cl_nm" id="cl_nm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="erp_regis_field_wrapper float_left">
                                    <input type="text" placeholder="Country" name="country" id="country">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="erp_regis_field_wrapper float_left">
                                    <input type="text" placeholder="Course" id="course" name="course">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="erp_regis_field_wrapper float_left">
                                    <textarea name="message" id="message" rows="4" placeholder="GIve us more details..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="erp_regis_field_wrapper float_left">
                                    <label for="">Upload your assignment</label>
                                    <input type="file"  id="assignments" name="img_url" id="img_url" required>
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
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
<!-- webanajmandi contact detail inx End -->
<?php include 'layout/footer.php' ?>