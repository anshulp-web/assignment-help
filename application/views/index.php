<!-- Header include here.... -->
<?php include 'layout/header.php' ?>
<style>

</style>
<!-- slider start here....-->
<div class="erp_pvf_main_wrapper float_left">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner"  data-interval="2000">
                <?php
                $i = 0;
                foreach ($slider as $value) {
                    $actives = '';
                    if ($i == 0) {
                        $actives = 'active';
                    }
                ?>
                    <div class="carousel-item  <?php echo $actives ?>" data-interval="2000">
                        <img class="d-block w-100" src="<?php echo base_url() ?>uploads/slider-images/<?php echo $value['img_url'] ?>" alt="Slide Image" style="max-width:1110px;height:345px;">
                    </div>
                <?php $i++;
                } ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- slider end here....-->
<!-- erp navigation End -->
<div class="erp_pvf_main_wrapper float_left">
    <div class="container">
        <?php
        foreach ($h_section1 as $value2) {

        ?>
            <div class="row">
                <div class="col-lg-6 col-md-12 align-self-center custom_align">
                    <div class="erp_pvf_left_cont float_left">

                        <h3><?php echo  $value2['heading'] ?></h3>

                        <p>
                            <?php echo  $value2['content'] ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="erp_pvf_right_img float_left">
                        <img src="<?php echo base_url() ?>uploads/home-page-section1-images/<?php echo $value2['img_url'] ?>" alt="img">
                    </div>
                </div>
            
            </div>
            <?php } ?>
    </div>
</div>
<!-- section two start -->
<div class="erp_pvf_main_wrapper float_left">
    <div class="container">
        <?php
        // print_r($h_section2);

        foreach ($h_section2 as $value3) {

        ?>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="erp_pvf_right_img float_left">
                        <img src="<?php echo base_url() ?>uploads/home-page-section2-images/<?php echo $value3['img_url'] ?>" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 service_offer">
                    <div class="erp_pvf_left_cont float_left">
                        <h3 style="margin-bottom:10px;"><?php echo $value3['heading'] ?></h3>
                        <?php
                        $arr_li = explode(",", $value3['content']);
                        foreach ($arr_li as $value4) {

                        ?>
                            <ul style="padding-top:10px;">
                                <li><i class="" style="padding-right:10px;color:#0d47a1;"></i><?php echo $value4 ?></li>
                            <?php } ?>
                            </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- section two end-- -->
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
                                    <input type="file" id="assignments" name="img_url" id="img_url" required>

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
<!-- webanajmandi inner banner End -->

<!-- Footer included here... -->
<?php include 'layout/footer.php' ?>