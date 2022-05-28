<!-- header included here... -->
<?php include 'layout/header.php' ?>

<?php
if ($this->session->flashdata('success')) {
    echo "<div class='alert alert-success alert-dismissible fade show green' role='alert'>
                                    <h6 style='color:white;text-align:center;'>Inserted successfully!</h6>
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
if ($this->session->flashdata('up_success')) {
    echo "<div class='alert alert-success alert-dismissible fade show green' role='alert'>
                                    <h6 style='color:white;text-align:center;'> Updated successfully!</h6>
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
                    <h5>Home page Second Section Edit</h5>
                    <!-- <form  >
                        <h6 style="text-align:right;margin-bottom:5px;">Add Image</h6>
                        <h5 style="text-align:right;margin-bottom:5px;">
                            <input type="file" id="addimage" required class="btn btn-primary" name="img">
                            <input type="submit" value="Upload" class="btn btn-primary" style="margin-top:5px;">
                        </h5> -->

                    </form>
                   
                </div>

                <br><br>
                <a href="<?php echo base_url('dashboard/add_h_section2')?>" class="btn-lg btn-primary" style="margin-bottom:10px;">Add</a>
                <div class="col-lg-8 col-lg-offset-2">

                    <table class="table">
                        <thead>
                            
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Section Heading</th>
                                <th scope="col">Section Content</th>
                                <th>Section Image</th>
                                <th scope="col">Update</th>
                                <th>Remove</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i = 0;
                        foreach ($result as $value) {
                            $i++;
                        ?>
                            <tr>
                                <td scope="row"><?php echo $i?></td>
                                <td><?php echo $value['heading']?></td>
                                <td><p style="width: 400px;"><?php echo $value['content']?></p></td>
                                <td><img src="<?php echo base_url()?>uploads/home-page-section2-images/<?php echo $value['img_url']?>" alt="image" width="200px" height="120px"></td>
                                
                                <td><a href="<?php echo base_url('dashboard/up_h_section2')?>?/=<?php echo $value['row_id']?>" class="btn btn-secondary">Update</a></td>
                                <td><a href="<?php echo base_url('dashboard/rm_h_section2')?>?/=<?php echo $value['row_id']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Remove</a></td>
                                <td><?php echo $value['status']?></td>
                                
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