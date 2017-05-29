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
                                <a href="#">Itracked Admin Profile</a>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
  
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                        	<div class="organization_form">
                            <h3 class="page-title">Profile
                    </h3>
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
                                    <form class="form-horizontal"  action="<?php echo $base_url; ?>profile/index" method="post" id="profile" name="profile">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">First Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" placeholder="First Name" class="form-control spinner" value="<?php if (!empty($admin[0]['frist_name'])) echo $admin[0]['frist_name']; ?>" name="first_name" id="first_name"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Last Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" placeholder="Last name" class="form-control spinner" value="<?php if (!empty($admin[0]['last_name'])) echo $admin[0]['last_name']; ?>" name="last_name" id="last_name"></div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">
                                                    <input type="test" placeholder="Email" class="form-control spinner" name="email" id="email" value="<?php if (!empty($admin[0]['email'])) echo $admin[0]['email']; ?>"></div>
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
                    $("#profile").validate({
                        errorClass: 'customErrorClass',
                        rules: {
                            first_name: {
                                required: true

                            },
                            last_name: {
                                required: true

                            },
                            email: {
                                required: true,
                                email: true
                            },
                        },
                        messages: {
                            first_name:{
                                required: "<font color=\"red\">Please enter first name.</font> " 
                            },
                            last_name: {
                                required: "<font color=\"red\">Please enter last name.</font> "

                            },
                            email: {
                                required: "<font color=\"red\">Please enter email.</font> ",
                                email: "<font color=\"red\">Please enter a valid email.</font> "
                                
                            }
                        }
                    });
                });
            </script>

