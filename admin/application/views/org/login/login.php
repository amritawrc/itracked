<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>iTracked</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo $css_path; ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $css_path; ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $css_path; ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $css_path; ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $css_path; ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo $css_path; ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $css_path; ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo $css_path; ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo $css_path; ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo $css_path; ?>assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="<?php echo $css_path; ?>shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="">
                <img src="<?php echo $images_path; ?>assets/pages/img/itracked_logo.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form id="loginform" method="post" class="form-vertical no-padding no-margin" action="<?php echo $base_url; ?>login/submitLogin">
                <h3 class="form-title font-green">Login</h3>
                 <?php if($this->session->flashdata('suc_message')){ ?>
                        <div class="row-fluid">
                                <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <span class="alert-link"><?php echo $this->session->flashdata('suc_message'); ?></span>
                                </div>
                        </div>
                    <?php } ?>
                    <?php if($this->session->flashdata('err_message')){ ?>
                    <div class="row-fluid">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="alert-link"> <?php echo $this->session->flashdata('err_message'); ?></span>
                        </div> 
                    </div>
                    <?php } ?>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                <div class="form-actions">
                    <button type="submit" id="login-btn" class="btn green uppercase" name="login-submit" >Login</button>

<!--                    <label class="rememberme check">-->
<!--                        <input type="checkbox" name="remember" value="1" />Remember </label>-->
                    <a href="<?php echo $base_url; ?>login/forgot" id="forget-password" class="forget-password" style="color: #337ab7; float: right;">Forgot Password?</a>
                </div>
                <!--<div class="login-options">
                    <h4>Or login with</h4>
                    <ul class="social-icons">
                        <li>
                            <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
                        </li>
                    </ul>
                </div>-->
<!--                <div class="create-account">
                    <p>
                        <a href="<?php echo $base_url; ?>signup" id="register-btn" class="uppercase">Create an account</a>
                    </p>
                </div>-->
            </form>
            <!-- END LOGIN FORM -->

<!--            <form id="forgotform" class="form-vertical no-padding no-margin hide" action="<?php echo $base_url; ?>login/forgotPassword" method="post">
     <p class="center">Enter your e-mail address below to reset your password.</p>
     <div class="control-group" id="show-input-email">
         <div class="controls">
             <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                 <input id="input-email-forgate-passwor" type="text" placeholder="Email" name="email" id="username" required=""/>
             </div>
         </div>
         <div class="space20"></div>
     </div>
     <div>
     <input type="button" id="back" class="btn btn-small login-btn" value="Back" name="submit" onclick='window.location.href="<?php echo $base_url; ?>login"'/>    
     <input type="submit" id="forget-btn" class="btn btn-small login-btn" value="Submit" name="submit" id="submit"/>
     </div>
 </form>-->


        </div>

        <div class="copyright"> 2017 © iTracked </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo $js_path; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo $js_path; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $js_path; ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo $js_path; ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo $js_path; ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo $js_path; ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo $js_path; ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo $js_path; ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $js_path; ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo $js_path; ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo $js_path; ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo $js_path; ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="<?php echo $js_path; ?>assets/global/scripts/jquery.validate.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo $js_path; ?>assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
                    $(document).ready(function(e) {
            $("#loginform").validate({
//                        errorClass: 'customErrorClass',
            rules: {
                    password:{
                      required: true
                      },
                    username:{ 
                    required: true
                    }

            },
                    messages: {
                    username:{
                    required: "<font color=\"red\">Please enter username.</font> "
                    },
                    password:{
                    required: "<font color=\"red\">Please enter password.</font> "
                    }
                    }
            });
            
               $('#loginform').keypress(function(e) {
            if (e.which == 13) {
                if ($('#loginform').validate().form()) {
                    $('#loginform').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
            });
        </script>

        <style>
            a {
                color: #fff;
            }

            a:hover {
                color: #acedff;
            }


        </style>
    </body>

</html>