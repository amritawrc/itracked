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
                        <h3 class="page-title">Event Edit
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
                               

                                        <form class="form-horizontal" method="post" id="myfrm" action="<?php echo $base_url; ?>manageevent/edit/<?php echo base64_encode($det[0]['ev_seq_no']).'/'; ?><?php echo base64_encode($det[0]['add_seq_no']); ?>">
                                    <div class="form-body">
                                        <!--                                            <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Organization Id</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" placeholder="Enter ID" class="form-control spinner" name="ordid" id="ordid"> </div>
                                                                                    </div>-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Event Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter event name" class="form-control spinner" name="event_name" id="event_name" value="<?php echo $det[0]['event_name'];?>"> 
                                               <input type="hidden" name="org" value="<?php echo base64_encode($det[0]['add_seq_no']); ?>">
                                             <input type="hidden" name="idd" value="<?php echo base64_encode($det[0]['ev_seq_no']); ?>">
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Venue Name</label>
                                            <div class="col-md-9">
                                                 <select class="form-control spinner" name="venue_name" id="venue_name">

                                                    <option value="">Select Venue</option>
                                                    <?php foreach ($ven as $key => $value) { ?>
                                                        <option value='<?php echo $value['ven_seq_no']; ?>' <?php if($det[0]['ven_id']==$value['ven_seq_no'])echo 'selected';?>><?php echo $value['ven_name']." "; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            <input type="hidden" name="orgid" value="<?php 
                                            $userSession = $this->session->userdata;
                                            echo base64_encode($userSession['admin_data'][0]['org_seq_no'])?>"> 
                                            </div>
                                        </div>
<!--
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Instructor Name</label>
                                            <div class="col-md-9">
                                                <select class="form-control spinner" name="ins" id="ins">
                                                    <input type="text"  class="form-control spinner" ></div>
                                                    <option value="">Select Instructor</option>
                                                    <?php foreach ($ins as $key => $value) { ?>
                                                       
                                                    
                                            
                                            <option value='<?php echo $value['id']; ?>'  <?php if($det[0]['ins_id']==$value['id'])echo 'selected';?>><?php echo $value['fname']." "; ?><?php echo $value['lname']; ?></option>
                                           <?php 
                                                    
                                                        }
                                                ?>   
                                                        
                                                </select>
                                            </div>
                                        </div>-->
                                        
<!--                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Group Name</label>
                                            <div class="col-md-9">
                                                
                                <select class="form-control1 spinner" multiple="multiple" id="grp" name="grp[]" required>
                                    <?php foreach ($grp as $key => $value) { ?>
                                     <option value="<?php echo $value['group_seq_no']; ?>"><?php echo $value['group_name']; ?></option>
                                      
                                        <?php 
                                    } ?>
                                    </select>
              
                                            </div>
                                        </div>
                                        -->
                                             <div class="form-group">
                                            <label class="col-md-3 control-label">Registration Start Date</label>
                                            <div class="col-md-9">
                                                <input class="form-control form-control-inline input-medium date-picker" type="text" placeholder="Enter start date" name="start_date" id="start_date" value="<?php echo date('d-m-Y',strtotime($det[0]['start_date']));?>">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Registration End Date</label>
                                            <div class="col-md-9">
                                                <input class="form-control form-control-inline input-medium date-picker" type="text" placeholder="Enter end date" name="end_date" id="end_date" value="<?php echo date('d-m-Y',strtotime($det[0]['end_date']));?>">

                                            </div>
                                        </div>
                                        
                                                 <div class="form-group">
                                            <label class="col-md-3 control-label">Cost</label>
                                            <div class="col-md-9">
                                                <input class="form-control form-control-inline input-medium" type="text" placeholder="Enter cost" name="cost" id="cost" value="<?php echo $det[0]['cost'];?>">

                                            </div>
                                        </div>
                                       
                                        <div class="form-group">

                                            <label class="col-md-3 control-label">Discount Allowed</label>
                                            <div class="col-md-9">
                                                <div class="checkbox-list">
                                                    <label class="checkbox-inline">

                                                    <input type="radio" name="dis" id="yes" value="yes" <?php if($det[0]['allow'] == "yes") echo 'checked';?> onclick="show_cont();"> Yes
  
                                                    </label>
                                                    <label class="checkbox-inline">

                                                     <input type="radio" name="dis" id="no" value="no" <?php if($det[0]['allow'] == "no") echo 'checked';?> onclick="show_con();"> No</label>
                                                </div>
                                            </div>

                                        </div>
                                      
                                        <div class="form-group" id="aa">
                                            <label class="col-md-3 control-label">Discount</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter discount" class="form-control spinner" name="discount" id="discount" value="<?php echo $det[0]['discount'];?>">
                                            </div>    
                                        </div>
                                               
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Min Age</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter age" class="form-control spinner" name="minage" id="minage" value="<?php echo $det[0]['min_age'];?>">
                                            </div>    
                                        </div>
                                          <div class="form-group" id="weightt">
                                            <label class="col-md-3 control-label">Max Age</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter age" class="form-control spinner" name="maxage" id="maxage" value="<?php echo $det[0]['max_age'];?>">
                                            </div>    
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Remarks</label>
                                            <div class="col-md-9">
                                                <textarea placeholder="Enter remarks" class="form-control spinner" name="remarks" id="remarks"><?php echo $det[0]['remarks'];?></textarea></div>
                                        </div>
                                           
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Start Meeting Point</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter start meeting point" class="form-control spinner" name="smeeting" id="smeeting" value="<?php echo $det[0]['start_meeting_point'];?>">
                                        </div>  
                                          </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">End Meeting Point</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter end meeting point" class="form-control spinner" name="emeeting" id="emeeting" value="<?php echo $det[0]['end_meeting_point'];?>">
                                            </div>
                                        </div> 
                                        
                                        
                                        <div class="form-group">
                                                      <label class="col-md-3 control-label">Status</label>
                                                      <div class="col-md-9">
                                                          <select class="form-control spinner" name="status" id="status">
                                                              <option value="">Please select Status</option>
                                                              <option <?php if ($det[0]['status1'] == 1) { ?> selected='selected' <?php } ?> value="1">Active</option>
                                                              <option <?php if ($det[0]['status1'] == 0) { ?> selected='selected' <?php } ?> value="0">Inactive</option>
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
</script>
<!-- END FOOTER -->
<script>
    $(document).ready(function (e) {
                    
        $("#myfrm").validate({
//                        errorClass: 'customErrorClass',
             rules: {
                event_name: {
                    required: true
                },
                venue_name: {
                    required: true
                },
                ins: {
                    required: true
                },
                'stud[]': {
                    required: true
                },
               
                start_date: {
                    required: true
                },
                end_date: {
                    required: true
                },
                cost: {
                    required: true
                },
                dis: {
                    required: true
                },
                
                discount: {
                    required: true
                },
                minage: {
                    required: true
                },
                maxage: {
                    required: true
                },
                 remarks: {
                    required: true
                },
                  smeeting: {
                    required: true
                },
                 emeeting: {
                    required: true
                },
                'grp[]': {
                    required: true
                },
                 status: {
                    required: true
                }
                
                
            },
            messages: {
                event_name: {
                    required: "<font color=\"red\">Please enter event name.</font> "
                },
                venue_name: {
                    required: "<font color=\"red\">Please select venue name.</font> "
                },
                ins: {
                    required: "<font color=\"red\">Please select instructor name.</font> "
                },
                'stud[]': {
                    required: "<font color=\"red\">Please select student.</font> "
                },
              
                start_date: {
                    required: "<font color=\"red\">Please enter start date.</font> "
                },
                end_date: {
                    required: "<font color=\"red\">Please enter end date.</font> "
                },
                state: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                cost: {
                    required: "<font color=\"red\">Please enter cost.</font> "
                },
                dis: {
                    required: "<font color=\"red\">Please enter dis.</font> "
                },
                discount: {
                    required: "<font color=\"red\">Please enter discount.</font> "
                },
                minage: {
                    required: "<font color=\"red\">Please enter minimum age.</font> "
                },
                maxage: {
                    required: "<font color=\"red\">Please enter maximum age.</font> "
                },
                 remarks: {
                    required: "<font color=\"red\">Please enter remarks.</font> "
                },
                  smeeting: {
                    required: "<font color=\"red\">Please enter start meeting point.</font> "
                },
                 emeeting: {
                    required: "<font color=\"red\">Please enter end meeting point.</font> "
                },
                'grp[]': {
                    required: "<font color=\"red\">Please select a group.</font> "
                },
                 status: {
                    required: "<font color=\"red\">Please select status.</font> "
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
        $('#grp').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
    });
</script>
