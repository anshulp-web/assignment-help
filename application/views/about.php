<!-- Header include here.... -->
<?php include 'layout/header.php' ?>
<div class="erp_pvf_main_wrapper float_left">
    <div class="container">
        <?php
        foreach ($a_section1 as $value1) {
        ?>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="erp_pvf_left_cont float_left">

                        <h3><?php echo $value1['heading'] ?></h3>

                        <p><span><?php echo $value1['content'] ?></span></p>

                        <br><br><br>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="erp_pvf_right_img float_left">
                        <img src="<?php echo base_url() ?>uploads/about-page-section1-images/<?php echo $value1['img_url'] ?>" alt="img">
                    </div>

                </div>

            <?php } ?>
            </div>
    </div>
</div>
<!-- Footer included here... -->
<?php include 'layout/footer.php' ?>