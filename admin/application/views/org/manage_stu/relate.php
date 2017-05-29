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
                        <h3 class="page-title">Mange Student Under Event
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
                               

                                       <form class="form-horizontal" method="post" id="myfrm" action="<?php echo $base_url; ?>managestu/manage_ven_ev/">
                                    <div class="form-body">
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Event</label>
                                            <div class="col-md-9">
                                                <select class="form-control spinner" name="event" id="event">
<!--                                                    <input type="text"  class="form-control spinner" ></div>-->
                                                    <option value="">Select Event</option>
                                                    <?php foreach ($dets as $key => $value) { ?>
                                                        <option value='<?php echo $value['ev_seq_no']; ?>'><?php echo $value['event_name']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
<!--                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Venue</label>
                                            <div class="col-md-9">
                                                    <input type="text" placeholder="Enter country" class="form-control spinner" name="county" id="county">
                                                <select class="form-control spinner" name="venue" id="venue">
                                                    <input type="text"  class="form-control spinner" ></div>
                                                    <option value="">Select Venue</option>

                                                </select>
                                            </div>
                                        </div>-->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Instructor</label>
                                            <div class="col-md-9">
<!--                                                    <input type="text" placeholder="Enter country" class="form-control spinner" name="county" id="county">-->
                                                <select class="form-control spinner" name="instructor" id="instructor">
<!--                                                    <input type="text"  class="form-control spinner" ></div>-->
                                                    <option value="">Select Instructor</option>

                                                </select>
                                            </div>
                                        </div>
                                          
                                   <input type="hidden" name="orgid" value="<?php 
                                            $userSession = $this->session->userdata;
                                            echo base64_encode($userSession['admin_data'][0]['org_seq_no'])?>"> 
                                     <input type="hidden" name="stuid" value="<?php echo $det1; ?>"> 
                                        
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
      
       if (document.getElementById('out').checked) {
        document.getElementById('heightt').style.display = 'none';
        document.getElementById('weightt').style.display = 'none';
        document.getElementById('shoee').style.display = 'none';
       document.getElementById('medd').style.display = 'none'; 
        document.getElementById('diett').style.display = 'none'; 
    } 
    }
    function show_cont()
    {
        //alert("hi");
      
       if (document.getElementById('skii').checked) {
        document.getElementById('heightt').style.display = 'block';
        document.getElementById('weightt').style.display = 'block';
        document.getElementById('shoee').style.display = 'block';
       document.getElementById('medd').style.display = 'block'; 
        document.getElementById('diett').style.display = 'block'; 
    } 
    }
</script>
<!-- END FOOTER -->
<script>
    $(document).ready(function (e) {
                    
        $("#myfrm").validate({
//                        errorClass: 'customErrorClass',
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                mobno: {
                    required: true,
                    number: true
                },
                phno:{
                    required: true,
                     number: true
                },
                email: {
                    required: true
                },
           
                house: {
                    required: true
                },
                street: {
                    required: true
                },
                state: {
                    required: true
                },
                city: {
                    required: true
                },
                county: {
                    required: true
                },
                postal: {
                    required: true,
                     number: true
                },
                gender: {
                    required: true
                },
                dob: {
                    required: true
                },
                age: {
                    required: true
                },
               
                remarks: {
                    required: true
                },
                
                start_date: {
                    required: true
                },
                 end_date: {
                 required: true
                }
                
                
            },
            messages: {
                first_name: {
                    required: "<font color=\"red\">Please enter first name.</font> "
                },
                 last_name: {
                    required: "<font color=\"red\">Please enter last name.</font> "
                },
                phno: {
                    required: "<font color=\"red\">Please enter phone no.</font> ",
                    number: "<font color=\"red\">Please enter number only.</font> "
                },
                mobno: {
                    required: "<font color=\"red\">Please enter mobile no.</font> ",
                     number: "<font color=\"red\">Please enter number only.</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter email.</font> "
                },
               
                house: {
                    required: "<font color=\"red\">Please enter house no.</font> "
                },
                street: {
                    required: "<font color=\"red\">Please enter street.</font> "
                },
                state: {
                    required: "<font color=\"red\">Please enter state.</font> "
                },
                city: {
                    required: "<font color=\"red\">Please enter city.</font> "
                },
                county: {
                    required: "<font color=\"red\">Please enter county.</font> "
                },
                postal: {
                    required: "<font color=\"red\">Please enter postal.</font> ",
                    number: "<font color=\"red\">Please enter number only.</font> "
                },
                gender: {
                    required: "<font color=\"red\">Please select gender.</font> "
                },
                dob: {
                    required: "<font color=\"red\">Please enter date of birth.</font> "
                },
                age: {
                    required: "<font color=\"red\">Please enter age.</font> "
                },
                height: {
                    required: "<font color=\"red\">Please enter height.</font> "
                },
                weight: {
                    required: "<font color=\"red\">Please enter weight.</font> "
                },
                shoe: {
                    required: "<font color=\"red\">Please enter shoe size.</font> "
                },
                med: {
                    required: "<font color=\"red\">Please select medical requirement.</font> "
                },

                remarks: {
                    required: "<font color=\"red\">Please enter remarks.</font> "
                },
                diet: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                role: {
                    required: "<font color=\"red\">Please enter dietary requirements.</font> "
                },
                start_date: {
                    required: "<font color=\"red\">Please enter start date.</font> "
                },
                end_date: {
                    required: "<font color=\"red\">Please enter end date.</font> "
                }

            }
        });

        $('#event').change(function () {
           
            $.ajax({
                url: BASE_URL + 'managestu/fetch_ins/',
                type: 'post',
                dataType: 'json',
                data: {eve_id: this.value},
                success: function (data) {
                   // alert(data);
                    $('#instructor').html(data);

                }
            });
        });
    });
</script>
