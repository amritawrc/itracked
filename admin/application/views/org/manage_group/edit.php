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
                        <h3 class="page-title">Group
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
                               

                                       <form class="form-horizontal" method="post" id="myfrm" action="<?php echo $base_url; ?>managegroup/edit/<?php echo base64_encode($det[0]['group_seq_no']); ?>">
                                    <div class="form-body">
                                        <!--                                            <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Organization Id</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" placeholder="Enter ID" class="form-control spinner" name="ordid" id="ordid"> </div>
                                                                                    </div>-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Group Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter group name" class="form-control spinner" name="group_name" id="group_name" value="<?php echo $det[0]['group_name']; ?>"> </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Group Owner Name</label>
                                            <div class="col-md-9">
                                             <input type="text" placeholder="Enter group owner name" class="form-control spinner" name="owner_name" id="owner_name" value="<?php echo $det[0]['group_owner']; ?>">
                                            <input type="hidden" name="orgid" value="<?php 
                                            $userSession = $this->session->userdata;
                                            echo base64_encode($userSession['admin_data'][0]['org_seq_no'])?>"> 
                                            </div>
                                        </div>
      
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Instructor</label>
                                            <div class="col-md-9">
                                                <select class="form-control spinner" name="ins" id="ins">
                                                    
                                                    <option value="">Select instructor</option>
                                                    <?php foreach ($ins as $key => $value) { ?>
                                                        <option <?php  if($det[0]['ins_id'] == $value['id']) { ?>  selected='selected' <?php } ?> value='<?php echo $value['id']; ?>'><?php echo $value['fname']." ".$value['lname']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                </div>
                                            </div>
                                         
                                           <div class="form-group">
                                            <label class="col-md-3 control-label">Event</label>
                                            <div class="col-md-9">
                                                <select class="form-control spinner" name="event" id="event">
                                                    
                                                    <option value="">Select Event</option>
                                                    <?php foreach ($det1 as $key => $value) { ?>
                                                        <option <?php  if($det[0]['event_id'] == $value['ev_seq_no']) { ?>  selected='selected' <?php } ?>value='<?php echo $value['ev_seq_no']; ?>'><?php echo $value['event_name']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                                </div>
                                            </div>
                                         
					<div class="form-group">
                                            <label class="col-md-3 control-label">Training Time Start</label>
                                            <div class="col-md-9">
                                               <input  type="text" class="form-control spinner timepicker timepicker-24 " value="<?php echo $det[0]['start_time']; ?>" name="training_time_start" id="training_time_start">
	                                        </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Training Time End</label>
                                            <div class="col-md-9">
                                                <input  type="text" class="form-control spinner timepicker timepicker-24 spinner" value="<?php echo $det[0]['end_time']; ?>" name="training_time_end" id="training_time_end">
                                                
                                                </div>
                                                
                                                </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Training For</label>
                                            <div class="col-md-9">
                                                <select class="form-control spinner" name="training_for" id="training_for">
                                                    
                                                    <option value="">Select Training Type</option>
                                                   
                                                    <option value='1' <?php if($det[0]['type_training']==1) echo "selected"  ?>>12 Hours</option>
                                                    <option value='2' <?php if($det[0]['type_training']==2) echo "selected"  ?>>24 Hours</option>
                                                    <option value='3' <?php if($det[0]['type_training']==3) echo "selected"  ?>>During Session</option>
                                                    
                                                </select>
                                                </div>
                                            </div>

                                        <div class="form-group">
                                                      <label class="col-md-3 control-label">Status</label>
                                                      <div class="col-md-9">
                                                          <select class="form-control spinner" name="status" id="status">
                                                              <option value="">Please select Status</option>
                                                              <option <?php if ($det[0]['status'] == 1) { ?> selected='selected' <?php } ?> value="1">Active</option>
                                                              <option <?php if ($det[0]['status'] == 0) { ?> selected='selected' <?php } ?> value="0">Inactive</option>
                                                          </select>
                                                      </div>
                                                  </div>   

                                        <div class="form-actions right1">
                                            <div class="col-md-3 control-label"></div>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn default">Submit</button>
                                                <button type="button" class="btn green">Cancel</button>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </form>
                                 </div>
                                          
                                         </div>
                                    </div>
                                
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
<script>
    function show_con()
    {
        //alert("hi");
      
       if (document.getElementById('no').checked) {
        document.getElementById('aa').style.display = 'none';
       
    } 
    }
    function show_cont()
    {
        //alert("hi");
      
       if (document.getElementById('yes').checked) {
        document.getElementById('aa').style.display = 'block';
       
        
    } 
    }
    
   
       // $('select').multipleSelect();
    
</script>
<!-- END FOOTER -->
<script>
    $(document).ready(function (e) {
                    
        $("#myfrm").validate({
//                        errorClass: 'customErrorClass',
            rules: {
                group_name: {
                    required: true
                },
                owner_name: {
                    required: true
                },
                status: {
                    required: true
                },
                ins: {
                    required: true
                },
                event: {
                    required: true
                }
                
            },
            messages: {
                  group_name: {
                    required: "<font color=\"red\">Please enter group name.</font> "
                },
                owner_name: {
                    required: "<font color=\"red\">Please enter owner name.</font> "
                },
                status: {
                    required: "<font color=\"red\">Please select status.</font> "
                },
                 ins: {
                    required: "<font color=\"red\">Please select Instructor.</font> "
                },
                 event: {
                    required: "<font color=\"red\">Please select Event.</font> "
                }


            }
        });

        $('#city').change(function () {
           
            $.ajax({
                url: BASE_URL + 'managestu/fetch_county/',
                type: 'post',
                dataType: 'json',
                data: {country_id: $('#city').val(), state_id: this.value},
                success: function (data) {
                    $('#county').html(data);

                }
            });
        });
        
        $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
    });
</script>
