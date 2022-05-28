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
            <li class="dropdown">
                <a href="#works" class="dropdown-toggle" data-toggle="dropdown">Home page edit <span class="caret"></span></a>
                <ul class="dropdown-menu animated fadeInLeft" role="menu">
                    <div class="dropdown-header">Edit</div>
                    <li><a href="<?php echo base_url('dashboard/slider') ?>">Slider</a></li>
                    <li><a href="<?php echo base_url('dashboard/h_section1')?>">Section 1</a></li>
                    <li><a href="<?php echo base_url('dashboard/h_section2')?>">Section 2</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#works" class="dropdown-toggle" data-toggle="dropdown">About page edit <span class="caret"></span></a>
                <ul class="dropdown-menu animated fadeInLeft" role="menu">
                    <div class="dropdown-header">Edit</div>
                    <li><a href="<?php echo base_url('dashboard/a_section1') ?>">Section 1</a></li>
                </ul>
            </li>
            
        </ul>
        <br><br>
            <a href="<?php echo base_url('admin/logout')?>" class="btn btn-primary" style="display:block;margin: 0px auto;">Logout</a>
    </nav>
    <!-- /#sidebar-wrapper -->