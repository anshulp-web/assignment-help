<!-- header included here... -->
<?php include 'layout/header.php' ?>

<?php
if ($this->session->flashdata('img_update')) {
    echo "<div class='alert alert-success alert-dismissible fade show green' role='alert'>
                                    <h6 style='color:white;text-align:center;'>Image updated successfully!</h6>
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
?>

<div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <div class="sidebar-header">
                <div class="sidebar-brand">
                    <a href="#"><?php $name = $this->session->userdata('username');
                                echo $name; ?></a>
                </div>
            </div>
            <!-- <li><a href="#home">Home Page Edit</a></li>
       <li><a href="#about">About</a></li>
       <li><a href="#events">Events</a></li>
       <li><a href="#team">Team</a></li> -->
            <li class="dropdown">
                <a href="#works" class="dropdown-toggle" data-toggle="dropdown">Home page edit <span class="caret"></span></a>
                <ul class="dropdown-menu animated fadeInLeft" role="menu">
                    <div class="dropdown-header">Edit</div>
                    <li><a href="<?php echo base_url('dashboard/slider') ?>">Slider</a></li>
                    <li><a href="#videos">Section 1</a></li>
                    <li><a href="#books">Section 2</a></li>
                </ul>
            </li>
            <!-- <li><a href="#services">Services</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="#followme">Follow me</a></li> -->
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

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
                    <h5 style="margin-bottom:15px;">Update Image</h5>
                   <?php $row_id = $_GET['/']?>
                    <img src="<?php echo base_url().'uploads/slider-images/'. $preview_image ?>" width="1110px" height="345px">
                    <form action="<?php echo base_url('dashboard/updateimg')?>" method="POST" enctype="multipart/form-data">
                        <h5 style="text-align:right;margin-top:15px;">
                            <input type="file" id="addimage" required class="btn btn-primary" name="img">
                           
                            <input type="hidden" value=" <?php echo $row_id?>" name="row_id">
                            <input type="hidden" value=" <?php echo $preview_image?>" name="old_img">
                            <input type="submit" value="Update" class="btn btn-primary" style="margin-top:5px;">
                        </h5>

                    </form>
                </div>

                <br><br>
                
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
</div>
<style>
    body {
        position: relative;
        overflow-x: hidden;
    }

    body,
    html {
        height: 100%;
    }

    .nav .open>a,
    .nav .open>a:hover,
    .nav .open>a:focus {
        background-color: white;
    }

    /*-------------------------------*/
    /*           Wrappers            */
    /*-------------------------------*/

    #wrapper {
        padding-left: 0;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #wrapper.toggled {
        padding-left: 220px;
    }

    #sidebar-wrapper {
        z-index: 1000;
        left: 220px;
        width: 0;
        height: 100%;
        margin-left: -220px;
        overflow-y: auto;
        overflow-x: hidden;
        background: #1a1a1a;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #sidebar-wrapper::-webkit-scrollbar {
        display: none;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 220px;
    }

    #page-content-wrapper {
        width: 100%;
        padding-top: 70px;
    }

    #wrapper.toggled #page-content-wrapper {
        position: absolute;
        margin-right: -220px;
    }

    /*-------------------------------*/
    /*     Sidebar nav styles        */
    /*-------------------------------*/
    .navbar {
        padding: 0;
    }

    .sidebar-nav {
        position: absolute;
        top: 0;
        width: 220px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .sidebar-nav li {
        position: relative;
        line-height: 20px;
        display: inline-block;
        width: 100%;
    }

    .sidebar-nav li:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        height: 100%;
        width: 3px;
        background-color: #1c1c1c;
        -webkit-transition: width .2s ease-in;
        -moz-transition: width .2s ease-in;
        -ms-transition: width .2s ease-in;
        transition: width .2s ease-in;

    }

    .sidebar-nav li:hover {
        background: skyblue !important;
        border-radius: 10px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .sidebar-nav li:hover:before,
    .sidebar-nav li.open:hover:before {
        width: 100%;
        -webkit-transition: width .2s ease-in;
        -moz-transition: width .2s ease-in;
        -ms-transition: width .2s ease-in;
        transition: width .2s ease-in;

    }

    .sidebar-nav li a {
        display: block;
        color: #ddd;
        text-decoration: none;
        padding: 10px 15px 10px 30px;
    }

    .sidebar-nav li a:hover,
    .sidebar-nav li a:active,
    .sidebar-nav li a:focus,
    .sidebar-nav li.open a:hover,
    .sidebar-nav li.open a:active,
    .sidebar-nav li.open a:focus {
        color: #fff;
        text-decoration: none;
        background-color: transparent;
    }

    .sidebar-header {
        text-align: center;
        font-size: 20px;
        position: relative;
        width: 100%;
        display: inline-block;
    }

    .sidebar-brand {
        height: 65px;
        position: relative;
        padding-top: 1em;
    }

    .sidebar-brand a {
        color: #ddd;
    }

    .sidebar-brand a:hover {
        color: #fff;
        text-decoration: none;
    }

    .dropdown-header {
        text-align: center;
        font-size: 1em;
        color: #ddd;
        background: #212531;
        background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
    }

    .sidebar-nav .dropdown-menu {
        position: relative;
        width: 100%;
        padding: 0;
        margin: 0;
        border-radius: 0;
        border: none;
        background-color: #222;
        box-shadow: none;
    }

    .dropdown-menu.show {
        top: 0;
    }

    /*Fontawesome icons*/


    /*-------------------------------*/
    /*       Hamburger-Cross         */
    /*-------------------------------*/

    .hamburger {
        position: fixed;
        top: 20px;
        z-index: 999;
        display: block;
        width: 32px;
        height: 32px;
        margin-left: 15px;
        background: transparent;
        border: none;
    }

    .hamburger:hover,
    .hamburger:focus,
    .hamburger:active {
        outline: none;
    }

    .hamburger.is-closed:before {
        content: '';
        display: block;
        width: 100px;
        font-size: 14px;
        color: #fff;
        line-height: 32px;
        text-align: center;
        opacity: 0;
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed:hover:before {
        opacity: 1;
        display: block;
        -webkit-transform: translate3d(-100px, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed .hamb-top,
    .hamburger.is-closed .hamb-middle,
    .hamburger.is-closed .hamb-bottom,
    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-middle,
    .hamburger.is-open .hamb-bottom {
        position: absolute;
        left: 0;
        height: 4px;
        width: 100%;
    }

    .hamburger.is-closed .hamb-top,
    .hamburger.is-closed .hamb-middle,
    .hamburger.is-closed .hamb-bottom {
        background-color: #1a1a1a;
    }

    .hamburger.is-closed .hamb-top {
        top: 5px;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed .hamb-middle {
        top: 50%;
        margin-top: -2px;
    }

    .hamburger.is-closed .hamb-bottom {
        bottom: 5px;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed:hover .hamb-top {
        top: 0;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed:hover .hamb-bottom {
        bottom: 0;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-middle,
    .hamburger.is-open .hamb-bottom {
        background-color: #1a1a1a;
    }

    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-bottom {
        top: 50%;
        margin-top: -2px;
    }

    .hamburger.is-open .hamb-top {
        -webkit-transform: rotate(45deg);
        -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
    }

    .hamburger.is-open .hamb-middle {
        display: none;
    }

    .hamburger.is-open .hamb-bottom {
        -webkit-transform: rotate(-45deg);
        -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
    }

    .hamburger.is-open:before {
        content: '';
        display: block;
        width: 100px;
        font-size: 14px;
        color: #fff;
        line-height: 32px;
        text-align: center;
        opacity: 0;
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-open:hover:before {
        opacity: 1;
        display: block;
        -webkit-transform: translate3d(-100px, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    /*-------------------------------*/
    /*            Overlay            */
    /*-------------------------------*/
</style>

<!-- footer included here... -->
<?php include 'layout/footer.php' ?>