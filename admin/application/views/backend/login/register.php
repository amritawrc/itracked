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

    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="login.php.html">
                <img src="<?php echo $images_path; ?>assets/pages/img/itracked_logo.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form id="signupp" method="post" class="login-form"  action="<?php echo $base_url; ?>signup/submitregister">
                
                 <h4>Register</h4>
                 <?php if ($this->session->flashdata('suc_message')) { ?>
                        <div class="row-fluid">
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <span class="alert-link"><?php echo $this->session->flashdata('suc_message'); ?></span>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('err_message')) { ?>
                        <div class="row-fluid">
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <span class="alert-link"> <?php echo $this->session->flashdata('err_message'); ?></span>
                            </div> 
                        </div>
                    <?php } ?>
                <div class="control-group" id="show-input-email">
                    <div class="controls">
                        <div class="input-prepend">
<!--                            <input id="input-email-forgate-passwor" type="text" placeholder="Email" name="email" id="username" required=""/>-->
                           
                             <input class="form-control form-control-solid placeholder-no-fix" type="text" placeholder="First Name" name="firstname" id="firstname"/>
                        </div>
                    </div><br />
                    <div class="controls">
                        <div class="input-prepend">
<!--                            <input id="input-email-forgate-passwor" type="text" placeholder="Email" name="email" id="username" required=""/>-->
                           
                             <input type="text" class="form-control form-control-solid placeholder-no-fix" placeholder="Last Name" name="lastname" id="lastname"/>
                        </div>
                    </div><br />
                    <div class="controls">
                        <div class="input-prepend">
    
                            <input type="text" class="form-control form-control-solid placeholder-no-fix" placeholder="Username" name="username" id="username"/>
                            
                        </div>
                    </div><br />
                    <div class="controls">
                        <div class="input-prepend">

                              <input class="form-control form-control-solid placeholder-no-fix" type="password" placeholder="Password" name="password" id="password"/>
                            
                        </div>
                    </div>
                    <div class="space20"></div>
                </div>
                
          
                <div class="form-actions">
                   <button type="submit" id="login-btn" class="btn green uppercase">Submit</button>
                 <button type="button" id="" class="btn green uppercase" onclick='window.location.href="<?php echo $base_url; ?>login"'>Back</button>
                </div>
         
            </form>
          
        </div>
        
        <div class="copyright"> 2016 © iTracked </div>
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
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!--<script src="<?php echo $js_path; ?>assets/pages/scripts/login.min.js" type="text/javascript"></script>-->
<!--          <script src="<?php echo $js_path; ?>assets/global/plugiscripts/jquery.validate.js" type="text/javascript"></script>-->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
      <script>
           
            $(document).ready(function(e) {
                    $("#signupp").validate({
                        errorClass: 'customErrorClass',
                    rules: {
                      firstname:{
                          required: true
                      },
                      lastname:{
                          required: true
                      },
                      username:{
                          required: true
                      },
                       password:{
                          required: true
                      }
                      
                    },
                    messages: {
                     firstname:{
                         required: "<font color=\"red\">Please enter firstname.</font> "
                     },
                     lastname:{
                         required: "<font color=\"red\">Please enter lastname.</font> "
                     },
                     username:{
                         required: "<font color=\"red\">Please enter username.</font> "
                     },
                     password:{
                         required: "<font color=\"red\">Please enter password.</font> "
                     },
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