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
                        <a href="#">Itracked Admin Dashboard</a>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->

            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <div class="organization_form">
                        <h3 class="page-title">Select Month And Organization
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
                                <form class="form-horizontal" method="post" id="myfrm" action="<?php echo $base_url; ?>payingstu/res/">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Year</label>
                                             <div class="col-md-9">
                                                <select name="year" id="year" class="form-control">
                                                    <option value="" selected>Select Year</option>
                                                   <?php
                                                        for ($i = date('Y'); $i > 1899; $i--) {
                                                            $Year = '';
                                                            $selected = '';
                                                            if ($Year == $i)
                                                                $selected = ' selected="selected"';
                                                            echo('<option value="' . $i . '"' . $selected . '>' . $i . '</option>' . "\n");
                                                    }
                                                    ?> 
                                                </select>
                                             </div>
                                            </div> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Month</label>
                                            <div class="col-md-9">
<!--                                                    <input type="text" placeholder="Enter type of organization" class="form-control spinner" >-->
                                                <select class="form-control spinner" name="month" id="month">
<!--                                                    <input type="text"  class="form-control spinner" ></div>-->
                                                    <option value="">Select Month</option>
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                   <option value="11">November</option>
                                                    <option value="12">December</option>
                                                  
                                                </select>
                                            </div>
                                        </div>
                                        
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Organization</label>
                                            <div class="col-md-9">
<!--                                                    <input type="text" placeholder="Enter type of organization" class="form-control spinner" >-->
                                                <select class="form-control spinner" name="org" id="org">
<!--                                                    <input type="text"  class="form-control spinner" ></div>-->
                                                    <option value="">Select organization</option>
                                                    <?php foreach ($det as $key => $value) { ?>
                                                        <option value='<?php echo $value['org_seq_no']; ?>'><?php echo $value['org_name']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-actions right1">
                                            <div class="col-md-3 control-label"></div>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn green">View</button>
                                                                                              

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
                      $("#start_date").datepicker({
                            numberOfMonths: 1,
                            dateFormat: 'dd-mm-yy',
                            onSelect: function(selected) {
                              $("#end_date").datepicker("option","minDate", selected)
                            }
                        });
                        $("#end_date").datepicker({ 
                            numberOfMonths: 1,
                            dateFormat: 'dd-mm-yy',
                            onSelect: function(selected) {
                               $("#start_date").datepicker("option","maxDate", selected)
                            }
                        });
        $("#myfrm").validate({
//                        errorClass: 'customErrorClass',
            rules: {
                org: {
                    required: true
                },

                month: {
                    required: true
                    
                },
                 year: {
                    required: true
                    
                }

            },
            messages: {
                org: {
                    required: "<font color=\"red\">Please select organization.</font> "
                },

                month: {
                    required: "<font color=\"red\">Please select month</font> "
                },
                 year: {
                    required: "<font color=\"red\">Please select year</font> "
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
