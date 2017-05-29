<?php echo $header; ?>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
       
            <!-- END SIDEBAR -->
            
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            
             <?php echo $leftmenu; ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                   
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">Change Password</a>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
  
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                        	<div class="organization_form">
                            <h3 class="page-title">Change Password
                    </h3>
                                    <?php if ($this->session->flashdata('sess_message')) { ?>
                        <div  class="pull-left label label-success" style="margin-top: -24px; margin-left: 200px"> 
                            <?php echo $this->session->flashdata('sess_message'); ?>
                        </div>
                    <?php } elseif ($this->session->flashdata('err_message')) { ?>
                        <div class="pull-left badge badge-important" style="margin-top: -24px; margin-left: 200px"> 
                            <?php echo $this->session->flashdata('err_message'); ?>
                        </div>
                    <?php } ?>
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet box purple ">
                                <div class="portlet-title">
                                    <!--<div class="caption">
                                        <i class="fa fa-gift"></i></div>
                                    <div class="tools">
                                        <a href="" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="" class="reload"> </a>
                                        <a href="" class="remove"> </a>
                                    </div>-->
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal"  action="<?php echo $base_url; ?>login/changepassword/<?php echo $code; ?>" method="post" id="change_pass" name="change_pass">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Password:</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control spinner" type="password" name="password" id="password" value="" placeholder="New password"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Confirm Password:</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control spinner"  type="password"  name="cpassword" id="cpassword" value="" placeholder="Confirm password"></div>
                                            </div>
                                            
                                           
                                            
                                        <div class="form-actions right1">
                                        	<div class="col-md-3 control-label"></div>
                                            <div class="col-md-9">
                                            <button type="submit" class="btn green">Submit</button>
                                          
                                            </div>
                                        </div>
                                    
                                </div>
                                        </form>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
        </div>
            
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php echo $footer; ?>
        <!-- END FOOTER -->
         <script type="text/javascript">
                $(document).ready(function(e) {
                    $("#change_pass").validate({
                        errorClass: 'customErrorClass',
                        rules: {
                            password: {
                                required: true,
                                maxlength: 30,
                                minlength: 8
                            },
                            cpassword: {
                                required: true,
                                maxlength: 30,
                                minlength: 8,
                                equalTo: '#password'
                            },
                        },
                        messages: {
                            password: {
                                required: "<font color=\"red\">Password field is required.</font> ",
                                minlength: "<font color=\"red\">Please enter at least 8 characters.</font> ",
                                maxlength: "<font color=\"red\">Please enter upto 30 characters.</font> "
                            },
                            cpassword: {
                                required: "<font color=\"red\">Confirm Password field is required.</font> ",
                                minlength: "<font color=\"red\">Please enter at least 8 characters.</font> ",
                                maxlength: "<font color=\"red\">Please enter upto 30 characters.</font> ",
                                equalTo: "<font color=\"red\">Please enter same value as password field.</font> "
                            }
                        }
                    });
                });
            </script>

