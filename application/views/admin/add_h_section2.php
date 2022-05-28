<!-- header included here... -->
<?php include 'layout/header.php' ?>

<!-- Sidebar included here... -->
<?php include 'layout/sidebar.php' ?>
<?php
if ($this->session->flashdata('form_error')) {
    echo "<div class='alert alert-danger alert-dismissible fade show red' role='alert '>
                                    <h6 style='color:white;text-align:center;'>All fields are required!</h6>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>";
}
?>
<!-- Enquiry form here.... -->
<div class="erp_contact_main_wrapper float_left">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="erp_regit_top_cont_wrapper float_left">
                    <h2>Add</h2>

                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="erp_contact_form_left_wrapper float_left" style="transform: translate(280px, 10px);">
                    <?php
                    if (isset($_GET['/'])) {
                        $data = array('id' => '');
                        echo form_open_multipart('dashboard/updating_h_section2', $data);
                    } else {
                        $data = array('id' => '');
                        echo form_open_multipart('dashboard/adding_h_section2', $data);
                    }
                    ?>


                    <div class="row">
                        <?php
                        if (isset($_GET['/'])) {
                            $id = $_GET['/'];
                            $data = array('type' => 'hidden', 'value' => $id, 'name' => 'hidden_ipt', 'id' => '');
                            echo form_input($data);

                            foreach ($record as $value) {
                                $heading = $value['heading'];
                                $content = $value['content'];
                                $img_url = $value['img_url'];
                                $status = $value['status'];
                                $image = $value['img_url'];
                            }
                        }
                        ?>

                        <div class="col-md-12">
                            <div class="erp_regis_field_wrapper float_left">
                                <?php
                                if (isset($_GET['/'])) {
                                    $data = array('type' => 'text', 'name' => 'heading', 'value' => $heading, 'placeholder' => 'Enter Section Heading');
                                    echo form_input($data);
                                } else {
                                    echo '<input type="text" placeholder="Enter Section Heading" name="heading">';
                                }
                                ?>

                            </div>
                        </div>
                        <div>
                            <?php echo form_error('heading') ?>
                        </div>
                        <div class="col-md-12">
                            <div class="erp_regis_field_wrapper float_left">
                                <?php
                                if (isset($_GET['/'])) {
                                    echo '<span>Each new field seprated by coma (,)</span>';
                                    echo "<textarea name='content'  cols='10' rows='10' placeholder='Enter Section Content'>$content</textarea>";
                                } else {
                                    echo '<span>Each new field seprated by coma (,)</span>';
                                    echo '<textarea name="content" id="" cols="10" rows="10" placeholder="Enter Section Content"></textarea>';
                                }
                                ?>

                            </div>
                        </div>
                        <div>
                            <?php echo form_error('content') ?>
                        </div>

                        <div class="col-md-12">
                            <div class="erp_regis_field_wrapper float_left">
                                <?php
                                if (isset($_GET['/'])) {
                                    echo "<input type='file' value='$image' id='assignments' name='img_url' required>";
                                }else{
                                    echo "<input type='file'  id='assignments' name='img_url' required>";
                                }
                                ?>
                                

                            </div>
                        </div>
                       
                        <?php
                        if (isset($_GET['/'])) {
                            echo '<h6 style="text-align:center;height:20px;">Old Image</h6>';
                            $base_url = base_url() . 'uploads/home-page-section2-images/' . $image;
                            echo "<input type='hidden' value='$image' name='old_img'>";
                            echo "<img src='$base_url' alt='' srcset='' width='200px' height='100px' style='margin:30px auto;'>";
                        }
                        ?>
                        <div class="col-md-12">
                            <div class="erp_regis_field_wrapper float_left">
                                <?php
                                if (isset($_GET['/'])) {
                                    echo '<select name="status" id="">
                                                     <option value=' . $status . '>' . $status . '</option>
                                                     <option value="Deactive">Deactive</option>
                                                     <option value="Active">Active</option>
                                                 </select>';
                                } else {
                                    echo '<select name="status" id="">
                                                      <option value="Deactive">Deactive</option>
                                                      <option value="Active">Active</option>
                                                  </select>';
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="erp_btn erp_login_btn erp_contact_btn">
                                <?php
                                if (isset($_GET['/'])) {

                                    echo '<input type="submit" value="Update" class="btn btn-primary">';
                                } else {
                                    echo '<input type="submit" value="Add" class="btn btn-primary">';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

            <!-- footer included here... -->
            <?php include 'layout/footer.php' ?>