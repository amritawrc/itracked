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
                    <div class="organization_form2">
                        <h3 class="page-title">Event Details
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
                        <div class="defoult_form">
   
                                
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Event Name</label>
                                            <div class="col-md-9">
                                                 <label class="col-md-3 control-label"><?php echo $det[0]['event_name'];?></label>
                                               <input type="hidden" name="org" value="<?php echo base64_encode($det[0]['add_seq_no']); ?>">
                                             <input type="hidden" name="idd" value="<?php echo base64_encode($det[0]['ev_seq_no']); ?>">
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Venue Name</label>
                                            <div class="col-md-9">
                                               
                                                  <?php foreach ($ven as $key => $value) { ?>
                                                       <?php if($det[0]['ven_id']==$value['ven_seq_no']){ ?> <label class="col-md-3 control-label"> <?php echo $value['ven_name']; ?></label>
                                                  <?php }}
                                                    ?>
                                            <input type="hidden" name="orgid" value="<?php 
                                            $userSession = $this->session->userdata;
                                            echo base64_encode($userSession['admin_data'][0]['org_seq_no'])?>"> 
                                            </div>
                                        </div>

<!--                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Instructor Name</label>
                                            <div class="col-md-9">
                                              <label class="col-md-3 control-label">          <?php foreach ($ins as $key => $value) { ?>
                                           
                                          <?php if($det[0]['ins_id']==$value['ins_seq_no']) {?> <?php echo $value['first_name']." "; ?><?php echo $value['last_name']; ?>
                                           <?php 
                                                    
                                              } }
                                                ?>   
                                                   </label>
                                            </div>
                                        </div>-->
                                        
                                             <div class="form-group">
                                            <label class="col-md-3 control-label">Registration Start Date</label>
                                            <div class="col-md-9">
                                                <label class="col-md-3 control-label"><?php echo date('d-m-Y',strtotime($det[0]['start_date']));?></label>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Registration End Date</label>
                                            <div class="col-md-9">
                                               <label class="col-md-3 control-label"><?php echo date('d-m-Y',strtotime($det[0]['end_date']));?></label>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Cost</label>
                                            <div class="col-md-9">
                                               <label class="col-md-3 control-label">  <?php echo $det[0]['cost'];?></label>
                                            </div>
                                        </div>
                                    
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Min Age</label>
                                            <div class="col-md-9">
                                                <label class="col-md-3 control-label"><?php echo $det[0]['min_age'];?></label>
                                            </div>    
                                        </div>
                                          <div class="form-group" id="weightt">
                                            <label class="col-md-3 control-label">Max Age</label>
                                            <div class="col-md-9">
                                                <label class="col-md-3 control-label"><?php echo $det[0]['max_age'];?></label>
                                            </div>    
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Remarks</label>
                                            <div class="col-md-9">
                                                <label class="col-md-3 control-label"><?php echo $det[0]['remarks'];?></label>
                                                </div>
                                        </div>
                                           
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Start Meeting Point</label>
                                            <div class="col-md-9">
                                               <label class="col-md-3 control-label"><?php echo $det[0]['start_meeting_point'];?></label>
                                        </div>  
                                          </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">End Meeting Point</label>
                                            <div class="col-md-9">
                                                <label class="col-md-3 control-label"><?php echo $det[0]['end_meeting_point'];?></label>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status</label>
                                            <div class="col-md-9">
                                                <label class="col-md-3 control-label"><?php if(($det[0]['status1'])==1) echo "Active"; else echo "Inactive";?></label>
                                            </div>
                                        </div> 

                            <div style="width: 100%; height: 35px; text-align: right; display:inline-block; ">
                                            <div class="col-md-3 control-label"></div>
                                            <div class="col-md-9">
                                              
                                                <a href="<?php echo $base_url; ?>manageevent"><button type="button" class="btn green">Back</button></a>
                                            </div>
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
<style>
    
.organization_form2 {
    display: block;
    margin: 0 auto;
    width: 80%;
}

.organization_form2 .defoult_form{ margin: 0; width: 100%; padding: 20px; display: block; background: #f1f4f7}

.organization_form2 .defoult_form .form-group {
    margin-bottom: 15px;
    width: 100%;
    display: inline-block;
}
</style>
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
    });
</script>
