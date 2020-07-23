<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>MRCB Admin Login</title>
    <link rel="apple-touch-icon" href="<?=base_url()?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/vendors/css/vendors.min.css">
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
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="<?=base_url()?>app-assets/images/pages/login.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1 justify-content-center">
                                            <div class="card-title">
                                                <a class="nav-link" href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo.png" style="height: 20px;"></a><h4 class="mb-0 text-center" style="margin-top: 5px;">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <?= form_open() ?>
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" id="user-name" name="username" placeholder="Username" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Username</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="user-password" name="password" placeholder="Password" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Remember me</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="text-right"><a href="#" class="card-link">Forgot Password?</a></div>
                                                    </div>
                                                    <a href="<?= base_url('register') ?>" class="btn btn-outline-primary float-left btn-inline">Register</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text">OR</div>
                                            </div>
                                            <div class="footer-btn d-inline">
                                                <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                                <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                                <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                                <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?=base_url()?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?=base_url()?>app-assets/js/core/app-menu.js"></script>
    <script src="<?=base_url()?>app-assets/js/core/app.js"></script>
    <script src="<?=base_url()?>app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>