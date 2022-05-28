<!-- header included here... -->
<?php include 'layout/header.php' ?>

<?php
if ($this->session->flashdata('img_success')) {
    echo "<div class='alert alert-success alert-dismissible fade show green' role='alert'>
                                    <h6 style='color:white;text-align:center;'>Image uploaded successfully!</h6>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>";
}
if ($this->session->flashdata('img_error')) {
    echo "<div class='alert alert-danger alert-dismissible fade show red' role='alert '>
                                    <h6 style='color:white;text-align:center;'>Only jpg,png extension accepted.And Image size not more than 400kb!</h6>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>";
}
if ($this->session->flashdata('img_update')) {
    echo "<div class='alert alert-success alert-dismissible fade show green' role='alert'>
                                    <h6 style='color:white;text-align:center;'>Image updated successfully!</h6>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>";
}
?>
<!-- Sidebar included here... -->
<?php include 'layout/sidebar.php' ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h5>Slider Images</h5>
                    
                    <form action="<?php echo base_url('dashboard/addslider') ?>" method="POST" enctype="multipart/form-data">
                        <h6 style="text-align:right;margin-bottom:5px;">Add Image</h6>
                        <h5 style="text-align:right;margin-bottom:5px;">
                            <input type="file" id="addimage" required class="btn btn-primary" name="img">
                            <input type="submit" value="Upload" class="btn btn-primary" style="margin-top:5px;">
                        </h5>

                    </form>
                </div>

                <br><br>
                <div class="col-lg-8 col-lg-offset-2">

                    <table class="table">
                        <thead>
                            
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Slider Images</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i = 0;
                        foreach ($result as $value) {
                            $i++;
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i?></th>
                                <td><?php echo $value['img_url']?></td>
                                <td><a href="<?php echo base_url('dashboard/update')?>?/=<?php echo $value['row_id']?>" class="btn btn-secondary">Change Image</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('dashboard/remove')?>?/=<?php echo $value['row_id']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Remove Image</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
</div>



<!-- footer included here... -->
<?php include 'layout/footer.php' ?>