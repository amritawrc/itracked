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
                        <a href="">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Itracked Admin Dashboard</a>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->

            <!-- END PAGE HEADER-->
            <div class="portlet-body">
                        	<h3 class="page-title">Manage Organization
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
                    
                                    <div class="table-toolbar">
                                        <div class="row">

                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>1 Day</th>
                                               <!-- <th>Phone No.</th> -->
                                                <th>7 Days</th>
                                                
                                                <th >9 Days</th>
                                                <th >30 Days</th>
                                                <th> 365 Days </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach ($det as $key => $value) {
                                                //print_r($value);
										?>
                                            <tr class="odd gradeX">
                                            	<td ><?php echo $value['user_type'];?></td>
                                                <td >&#163;<?php echo $value['one_day_user'];?></td>
                                                <td >&#163;<?php echo $value['seven_day_user'];?> </td>
                                                <td >&#163;<?php echo $value['nine_day_user'];?> </td>
                                                <td >&#163;<?php echo $value['30_days_user'];?> </td>
                                                <td >&#163;<?php echo $value['365_days_user'];?></td> 
                                            </tr>
                                            
                                             <?php
                                            }
                                            
                                        
                                            ?>

                                        </tbody>
                                    </table>
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

    });
</script>
