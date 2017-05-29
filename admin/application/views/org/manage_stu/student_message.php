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
                        <a href="#">Organization Admin Dashboard</a>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->

            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <div class="organization_form">
                        <h3 class="page-title">Student's Panic Message
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
                                <form class="form-horizontal" method="post" id="myfrm" action="<?php echo $base_url; ?>dashboard/edit/">
                                    <div class="form-body">
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Name</label>
                                            <div class="col-md-9">
                                                <label class="col-md-3 control-label"><?php echo $det[0]['name'];?></label>

                                            </div>
                                        </div>
                                     
                                      <div class="form-group">
                                            <label class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">
                                                <label class="col-md-3 control-label"><?php echo $det[0]['email'];?></label>

                                            </div>
                                        </div>
                                    
                                    <div class="form-group">
                                            <label class="col-md-3 control-label">Phone No.</label>
                                            <div class="col-md-9">
                                                <label class="col-md-3 control-label"><?php echo $det[0]['mobile'];?></label>

                                            </div>
                                        </div>
                                    
                                    <div class="form-group">
                                            <label class="col-md-3 control-label">Message</label>
                                            <div class="col-md-9">
                                                <label class="col-md-3 control-label"><?php echo $det[0]['message'];?></label>

                                            </div>
                                        </div>    
                                        
                                        <div style="width: 100%; height: 35px; text-align: right; display:inline-block; ">
                                            <div class="col-md-3 control-label"></div>
                                            <div class="col-md-9">
                                              
                                                <a href="<?php echo $base_url; ?>managestu/studentPanic"><button type="button" class="btn green">Back</button></a>
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
<script>
    $(document).ready(function (e) {
                    
        $("#myfrm").validate({
//                        errorClass: 'customErrorClass',
            rules: {
                orgname: {
                    required: true
                },
                username: {
                    required: true
                },
                house: {
                    required: true
                },
                street:{
                    required: true
                },
                type: {
                    required: true
                },
                authno: {
                    required: true
                },
                emgname: {
                    required: true
                },
                role: {
                    required: true
                },
                primary: {
                    required: true,
                    number: true
                },
                secondary: {
                    required: true,
                    number: true
                },
                tertiary: {
                    required: true,
                    number: true
                }
              

            },
            messages: {
                orgname: {
                    required: "<font color=\"red\">Please enter organization name.</font> "
                },
                username: {
                    required: "<font color=\"red\">Please enter username.</font> "
                },
                house: {
                    required: "<font color=\"red\">Please enter house no.</font> "
                },
                street: {
                    required: "<font color=\"red\">Please enter street.</font> "
                },
                type: {
                    required: "<font color=\"red\">Please enter type of organization.</font> "
                },
               authno: {
                    required: "<font color=\"red\">Please enter authorization no.</font> "
                },
       
                primary: {
                    required: "<font color=\"red\">Please enter emergency contact primary number.</font> ",
                    number:  "<font color=\"red\">Please enter number only.</font> "
                },
                secondary: {
                    required: "<font color=\"red\">Please enter emergency contact secondary number.</font> ",
                     number:  "<font color=\"red\">Please enter number only.</font> "
                },
                tertiary: {
                    required: "<font color=\"red\">Please enter emergency contact tertiary number.</font> ",
                     number:  "<font color=\"red\">Please enter number only.</font> "
                },
              
                emgname: {
                    required: "<font color=\"red\">Please enter contact person name.</font> "
                },
                role: {
                    required: "<font color=\"red\">Please enter  contact person role.</font> "
                }

            }
        });

        $('#city').change(function () {
           
            $.ajax({
                url: BASE_URL + 'dashboard/fetch_county/',
                type: 'post',
                dataType: 'json',
                data: {country_id: $('#city').val(), state_id: this.value},
                success: function (data) {
                    $('#county').html(data);

                }
            });
        });
    });
</script>
