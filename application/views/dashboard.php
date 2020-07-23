<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>MRCB Admin Dashboard</title>
    <link rel="apple-touch-icon" href="<?=base_url()?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Main Menu-->

    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">

        <!-- BEGIN: Header-->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav bookmark-icons">
                                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo.png" style="height: 25px;"></a></li>
                            </ul>
                        </div>
                        <ul class="nav navbar-nav float-right">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                                <div class="search-input">
                                    <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="input" type="text" placeholder="Input keywords..." tabindex="-1" data-search="template-list" />
                                    <div class="search-input-close"><i class="feather icon-x"></i></div>
                                    <ul class="search-list"></ul>
                                </div>
                            </li>
                            <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin' && $_SESSION['logged_in'] === true) { ?>
                                <?php
                                    $new_data_count = 0;

                                    foreach ($data_leads as $key => $value) {  
                                        $date = new DateTime($value->submitted_at);
                                        $day = $date->format('d');
                                        if ($day == date('d')) {
                                            $new_data_count ++;
                                        }
                                    }

                                    foreach ($data_vips as $key => $value) {  
                                        $date = new DateTime($value->submitted_at);
                                        $day = $date->format('d');
                                        if ($day == date('d')) {
                                            $new_data_count ++;
                                        }
                                    }

                                    foreach ($data_rewards as $key => $value) {  
                                        $date = new DateTime($value->submitted_at);
                                        $day = $date->format('d');
                                        if ($day == date('d')) {
                                            $new_data_count ++;
                                        }
                                    }
                                ?>
                            <li class="dropdown dropdown-notification nav-item">
                                <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                    <i class="ficon feather icon-bell"></i>
                                    <?php
                                        if ($new_data_count > 0) {
                                    ?>
                                    <span class="badge badge-pill badge-primary badge-up"><?php echo $new_data_count ?></span>
                                    <?php
                                        }
                                    ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                    <li class="dropdown-menu-header">
                                        <div class="dropdown-header m-0 p-2">
                                            <span class="notification-title white"><?php echo $new_data_count ?> New Submit(s)</span>
                                        </div>
                                    </li>
                                <?php
                                    $new_item_count = 0;
                                    $submitted = 0;

                                    foreach ($data_leads as $key => $value) {  
                                        $submitted = new DateTime($value->submitted_at);
                                        $day = $submitted->format('d');
                                        if ($day == date('d')) {
                                            $new_item_count ++;
                                            if ($new_item_count <= 5) {
                                ?> 
                                    <li class="scrollable-container media-list">
                                        <a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left">
                                                    <i class="feather icon-plus-square font-medium-5 primary"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="primary media-heading">A new lead form submit!</h6><small class="notification-text"><?php echo $value->title; ?></small>
                                                </div>
                                                <small>
                                                    <time class="media-meta"><?php echo $submitted->format('Y-m-d H:i:s'); ?></time>
                                                </small>
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                            }
                                        }
                                    }

                                    foreach ($data_vips as $key => $value) {  
                                        $submitted = new DateTime($value->submitted_at);
                                        $day = $submitted->format('d');
                                        if ($day == date('d')) {
                                            $new_item_count ++;
                                            if ($new_item_count <= 5) {
                                ?>
                                    <li class="scrollable-container media-list">
                                        <a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left">
                                                    <i class="feather icon-plus-square font-medium-5 primary"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="primary media-heading">A new vip form submit!</h6><small class="notification-text"><?php echo $value->name; ?></small>
                                                </div>
                                                <small>
                                                    <time class="media-meta"><?php echo $submitted->format('Y-m-d H:i:s'); ?></time>
                                                </small>
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                            }
                                        }
                                    }

                                    foreach ($data_rewards as $key => $value) {  
                                        $submitted = new DateTime($value->submitted_at);
                                        $day = $submitted->format('d');
                                        if ($day == date('d')) {
                                            $new_item_count ++;
                                            if ($new_item_count <= 5) {
                                ?>
                                    <li class="scrollable-container media-list">
                                        <a class="d-flex justify-content-between" href="javascript:void(0)">
                                            <div class="media d-flex align-items-start">
                                                <div class="media-left">
                                                    <i class="feather icon-plus-square font-medium-5 primary"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="primary media-heading">A new reward form submit!</h6><small class="notification-text"><?php echo $value->name; ?></small>
                                                </div>
                                                <small>
                                                    <time class="media-meta"><?php echo $submitted->format('Y-m-d H:i:s'); ?></time>
                                                </small>
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                        }
                                    }
                                }
                                ?>
                                    <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Check all submits</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                            <li class="dropdown dropdown-user nav-item">
                                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?php echo $_SESSION['username'] ?></span><span class="user-status">Available</span></div><span><img class="round" src="<?=base_url()?>app-assets/images/users/<?php echo $_SESSION['avatar'] ?>" alt="avatar" height="40" width="40" /></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="feather icon-user"></i> Edit Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) ?>
                                    <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="feather icon-power"></i> Logout</a>
                                    <?php ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END: Header-->

        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-justified col-sm-4" id="myTab2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just" aria-selected="true">Leads</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just" aria-selected="true">VIPs</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="rewards-tab-justified" data-toggle="tab" href="#rewards-just" role="tab" aria-controls="rewards-just" aria-selected="true">Rewards</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content pt-1">
                                            <div class="tab-pane active" id="home-just" role="tabpanel" aria-labelledby="home-tab-justified">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="mb-0">Today's Submits</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin' && $_SESSION['logged_in'] === true) { ?>
                                                            <div class="table-responsive datatable-submits">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <table class="table table-hover-animation">
                                                                            <thead class="thead-dark">
                                                                                <tr>
                                                                                    <th>ID</th>
                                                                                    <th>Title</th>
                                                                                    <th>Name</th>
                                                                                    <th>Contact No</th>
                                                                                    <th>Email</th>
                                                                                    <th>Area</th>
                                                                                    <th>Project</th>
                                                                                    <th>Size Range</th>
                                                                                    <th>Starting Price</th>
                                                                                    <th>PIC</th>
                                                                                    <th>Submitted At</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                                foreach($data_leads as $key => $value) {  
                                                                                    $date = new DateTime($value->submitted_at);
                                                                                    $day = $date->format('d');
                                                                                    if ($day == date('d')) {
                                                                            ?>  
                                                                                    <tr>
                                                                                        <td><?= $value->id ?></td>
                                                                                        <td><?= $value->title ?></td>
                                                                                        <td><?= $value->name ?></td>
                                                                                        <td><?= $value->contact_no ?></td>
                                                                                        <td><?= $value->email ?></td>
                                                                                        <td><?= $value->area ?></td>
                                                                                        <td><?= $value->project ?></td>
                                                                                        <td><?= $value->size_range ?></td>
                                                                                        <td><?= $value->starting_price ?></td>
                                                                                        <td><?= $value->pic ?></td>
                                                                                        <td><?= $value->submitted_at ?></td>
                                                                                    </tr>  
                                                                            <?php   
                                                                                    }
                                                                                }
                                                                            ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                        WE ARE SORRY. YOU HAVE NO PERMISSION TO SEE THE CONTENTS.
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Submits</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin' && $_SESSION['logged_in'] === true) { ?>
                                                            <div class="table-responsive datatable-submits">
                                                                <table class="table table-hover-animation zero-configuration">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Title</th>
                                                                            <th>Name</th>
                                                                            <th>Contact No</th>
                                                                            <th>Email</th>
                                                                            <th>Area</th>
                                                                            <th>Project</th>
                                                                            <th>Size Range</th>
                                                                            <th>Starting Price</th>
                                                                            <th>PIC</th>
                                                                            <th>Submitted At</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                        foreach($data_leads as $key => $value) {  
                                                                    ?>  
                                                                        <tr>
                                                                            <td><?= $value->id ?></td>
                                                                            <td><?= $value->title ?></td>
                                                                            <td><?= $value->name ?></td>
                                                                            <td><?= $value->contact_no ?></td>
                                                                            <td><?= $value->email ?></td>
                                                                            <td><?= $value->area ?></td>
                                                                            <td><?= $value->project ?></td>
                                                                            <td><?= $value->size_range ?></td>
                                                                            <td><?= $value->starting_price ?></td>
                                                                            <td><?= $value->pic ?></td>
                                                                            <td><?= $value->submitted_at ?></td>
                                                                        </tr>  
                                                                    <?php  
                                                                        }
                                                                    ?>    
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        <?php } else { ?>
                                                        WE ARE SORRY. YOU HAVE NO PERMISSION TO SEE THE CONTENTS.
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-justified">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="mb-0">Today's Submits</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin' && $_SESSION['logged_in'] === true) { ?>
                                                            <div class="table-responsive datatable-submits">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <table class="table table-hover-animation">
                                                                            <thead class="thead-dark">
                                                                                <tr>
                                                                                    <th>ID</th>
                                                                                    <th>Name / Company Name</th>
                                                                                    <th>IC Number / Company Registration Number</th>
                                                                                    <th>Phone Number</th>
                                                                                    <th>Email Address</th>
                                                                                    <th>Tria Seputeh</th>
                                                                                    <th>VIVO</th>
                                                                                    <th>The Sentral Residences</th>
                                                                                    <th>Kalista</th>
                                                                                    <th>Alstonia</th>
                                                                                    <th>Sentral Suites</th>
                                                                                    <th>SIDEC</th>
                                                                                    <th>Q Sentral</th>
                                                                                    <th>Submitted At</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                                foreach($data_vips as $key => $value) {  
                                                                                    $date = new DateTime($value->submitted_at);
                                                                                    $day = $date->format('d');
                                                                                    if ($day == date('d')) {
                                                                            ?>  
                                                                                    <tr>
                                                                                        <td><?= $value->id ?></td>
                                                                                        <td><?= $value->name ?></td>
                                                                                        <td><?= $value->ic ?></td>
                                                                                        <td><?= $value->phone ?></td>
                                                                                        <td><?= $value->email ?></td>
                                                                                        <td class="text-center">
                                                                                        <?php 
                                                                                        if ($value->tria_seputeh == 1) {
                                                                                            echo '<i class="fa fa-check"></i>';
                                                                                        } else {
                                                                                            echo '<i class="fa fa-close"></i>';
                                                                                        }
                                                                                        ?></td>
                                                                                        <td class="text-center">
                                                                                        <?php 
                                                                                        if ($value->vivo == 1) {
                                                                                            echo '<i class="fa fa-check"></i>';
                                                                                        } else {
                                                                                            echo '<i class="fa fa-close"></i>';
                                                                                        }
                                                                                        ?></td>
                                                                                        <td class="text-center">
                                                                                        <?php 
                                                                                        if ($value->the_sentral_residences == 1) {
                                                                                            echo '<i class="fa fa-check"></i>';
                                                                                        } else {
                                                                                            echo '<i class="fa fa-close"></i>';
                                                                                        }
                                                                                        ?></td>
                                                                                        <td class="text-center">
                                                                                        <?php 
                                                                                        if ($value->kalista == 1) {
                                                                                            echo '<i class="fa fa-check"></i>';
                                                                                        } else {
                                                                                            echo '<i class="fa fa-close"></i>';
                                                                                        }
                                                                                        ?></td>
                                                                                        <td class="text-center">
                                                                                        <?php 
                                                                                        if ($value->alstonia == 1) {
                                                                                            echo '<i class="fa fa-check"></i>';
                                                                                        } else {
                                                                                            echo '<i class="fa fa-close"></i>';
                                                                                        }
                                                                                        ?></td>
                                                                                        <td class="text-center">
                                                                                        <?php 
                                                                                        if ($value->sentral_suites == 1) {
                                                                                            echo '<i class="fa fa-check"></i>';
                                                                                        } else {
                                                                                            echo '<i class="fa fa-close"></i>';
                                                                                        }
                                                                                        ?></td>
                                                                                        <td class="text-center">
                                                                                        <?php 
                                                                                        if ($value->sidec == 1) {
                                                                                            echo '<i class="fa fa-check"></i>';
                                                                                        } else {
                                                                                            echo '<i class="fa fa-close"></i>';
                                                                                        }
                                                                                        ?></td>
                                                                                        <td class="text-center">
                                                                                        <?php 
                                                                                        if ($value->q_sentral == 1) {
                                                                                            echo '<i class="fa fa-check"></i>';
                                                                                        } else {
                                                                                            echo '<i class="fa fa-close"></i>';
                                                                                        }
                                                                                        ?></td>
                                                                                        <td><?= $value->submitted_at ?></td>
                                                                                    </tr>  
                                                                            <?php   
                                                                                    }
                                                                                }
                                                                            ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                        WE ARE SORRY. YOU HAVE NO PERMISSION TO SEE THE CONTENTS.
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Submits</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin' && $_SESSION['logged_in'] === true) { ?>
                                                            <div class="table-responsive datatable-submits">
                                                                <table class="table table-hover-animation zero-configuration">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Name / Company Name</th>
                                                                            <th>IC Number / Company Registration Number</th>
                                                                            <th>Phone Number</th>
                                                                            <th>Email Address</th>
                                                                            <th>Tria Seputeh</th>
                                                                            <th>VIVO</th>
                                                                            <th>The Sentral Residences</th>
                                                                            <th>Kalista</th>
                                                                            <th>Alstonia</th>
                                                                            <th>Sentral Suites</th>
                                                                            <th>SIDEC</th>
                                                                            <th>Q Sentral</th>
                                                                            <th>Submitted At</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                        foreach($data_vips as $key => $value) {  
                                                                    ?>  
                                                                        <tr>
                                                                            <td><?= $value->id ?></td>
                                                                            <td><?= $value->name ?></td>
                                                                            <td><?= $value->ic ?></td>
                                                                            <td><?= $value->phone ?></td>
                                                                            <td><?= $value->email ?></td>
                                                                            <td class="text-center">
                                                                             <?php 
                                                                             if ($value->tria_seputeh == 1) {
                                                                                echo '<i class="fa fa-check"></i>';
                                                                             } else {
                                                                                echo '<i class="fa fa-close"></i>';
                                                                             }
                                                                             ?></td>
                                                                            <td class="text-center">
                                                                            <?php 
                                                                             if ($value->vivo == 1) {
                                                                                echo '<i class="fa fa-check"></i>';
                                                                             } else {
                                                                                echo '<i class="fa fa-close"></i>';
                                                                             }
                                                                             ?></td>
                                                                            <td class="text-center">
                                                                            <?php 
                                                                             if ($value->the_sentral_residences == 1) {
                                                                                echo '<i class="fa fa-check"></i>';
                                                                             } else {
                                                                                echo '<i class="fa fa-close"></i>';
                                                                             }
                                                                             ?></td>
                                                                            <td class="text-center">
                                                                            <?php 
                                                                             if ($value->kalista == 1) {
                                                                                echo '<i class="fa fa-check"></i>';
                                                                             } else {
                                                                                echo '<i class="fa fa-close"></i>';
                                                                             }
                                                                             ?></td>
                                                                            <td class="text-center">
                                                                            <?php 
                                                                             if ($value->alstonia == 1) {
                                                                                echo '<i class="fa fa-check"></i>';
                                                                             } else {
                                                                                echo '<i class="fa fa-close"></i>';
                                                                             }
                                                                             ?></td>
                                                                            <td class="text-center">
                                                                            <?php 
                                                                             if ($value->sentral_suites == 1) {
                                                                                echo '<i class="fa fa-check"></i>';
                                                                             } else {
                                                                                echo '<i class="fa fa-close"></i>';
                                                                             }
                                                                             ?></td>
                                                                            <td class="text-center">
                                                                            <?php 
                                                                             if ($value->sidec == 1) {
                                                                                echo '<i class="fa fa-check"></i>';
                                                                             } else {
                                                                                echo '<i class="fa fa-close"></i>';
                                                                             }
                                                                             ?></td>
                                                                            <td class="text-center">
                                                                            <?php 
                                                                             if ($value->q_sentral == 1) {
                                                                                echo '<i class="fa fa-check"></i>';
                                                                             } else {
                                                                                echo '<i class="fa fa-close"></i>';
                                                                             }
                                                                             ?></td>
                                                                            <td><?= $value->submitted_at ?></td>
                                                                        </tr>  
                                                                    <?php  
                                                                        }
                                                                    ?>    
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        <?php } else { ?>
                                                        WE ARE SORRY. YOU HAVE NO PERMISSION TO SEE THE CONTENTS.
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="rewards-just" role="tabpanel" aria-labelledby="rewards-tab-justified">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="mb-0">Today's Submits</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin' && $_SESSION['logged_in'] === true) { ?>
                                                            <div class="table-responsive datatable-submits">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <table class="table table-hover-animation">
                                                                            <thead class="thead-dark">
                                                                                <tr>
                                                                                    <th>ID</th>
                                                                                    <th>Name</th>
                                                                                    <th>Contact No</th>
                                                                                    <th>Email</th>
                                                                                    <th>Answer</th>
                                                                                    <th>Submitted At</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                                foreach($data_rewards as $key => $value) {  
                                                                                    $date = new DateTime($value->submitted_at);
                                                                                    $day = $date->format('d');
                                                                                    if ($day == date('d')) {
                                                                            ?>  
                                                                                    <tr>
                                                                                        <td><?= $value->id ?></td>
                                                                                        <td><?= $value->name ?></td>
                                                                                        <td><?= $value->contact_no ?></td>
                                                                                        <td><?= $value->email ?></td>
                                                                                        <td>
                                                                                        <?php 
                                                                                        if ($value->is_correct == 1) {
                                                                                            echo '<i class="fa fa-check"></i>';
                                                                                        } else {
                                                                                            echo '<i class="fa fa-close"></i>';
                                                                                        }
                                                                                        ?></td>
                                                                                        <td><?= $value->submitted_at ?></td>
                                                                                    </tr>  
                                                                            <?php   
                                                                                    }
                                                                                }
                                                                            ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                        WE ARE SORRY. YOU HAVE NO PERMISSION TO SEE THE CONTENTS.
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Submits</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin' && $_SESSION['logged_in'] === true) { ?>
                                                            <div class="table-responsive datatable-submits">
                                                                <table class="table table-hover-animation zero-configuration">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Name</th>
                                                                            <th>Contact No</th>
                                                                            <th>Email</th>
                                                                            <th>Answer</th>
                                                                            <th>Submitted At</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                        foreach($data_rewards as $key => $value) {  
                                                                            $date = new DateTime($value->submitted_at);
                                                                            $day = $date->format('d');
                                                                            if ($day == date('d')) {
                                                                    ?>  
                                                                            <tr>
                                                                                <td><?= $value->id ?></td>
                                                                                <td><?= $value->name ?></td>
                                                                                <td><?= $value->contact_no ?></td>
                                                                                <td><?= $value->email ?></td>
                                                                                <td>
                                                                                <?php 
                                                                                if ($value->is_correct == 1) {
                                                                                    echo '<i class="fa fa-check"></i>';
                                                                                } else {
                                                                                    echo '<i class="fa fa-close"></i>';
                                                                                }
                                                                                ?></td>
                                                                                <td><?= $value->submitted_at ?></td>
                                                                            </tr>  
                                                                    <?php   
                                                                            }
                                                                        }
                                                                    ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        <?php } else { ?>
                                                        WE ARE SORRY. YOU HAVE NO PERMISSION TO SEE THE CONTENTS.
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a class="text-bold-800 grey darken-2" href="https://mrcbland.com.my/">MRCB Land,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block"></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="<?=base_url()?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?=base_url()?>app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="<?=base_url()?>app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?=base_url()?>app-assets/js/core/app-menu.js"></script>
    <script src="<?=base_url()?>app-assets/js/core/app.js"></script>
    <script src="<?=base_url()?>app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?=base_url()?>app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <script src="<?=base_url()?>app-assets/js/scripts/datatables/datatable.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>