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
                        <h3 class="page-title">Venue Edit
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
                               

                                        <form class="form-horizontal" method="post" id="myfrm" action="<?php echo $base_url; ?>managevenue/edit/<?php echo base64_encode($det[0]['ven_seq_no']).'/'; ?><?php echo base64_encode($det[0]['add_seq_no']); ?>">
                                    <div class="form-body">
                                        <!--                                            <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Organization Id</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" placeholder="Enter ID" class="form-control spinner" name="ordid" id="ordid"> </div>
                                                                                    </div>-->
                                      
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Venue Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter venue name" class="form-control spinner" name="venue_name" id="venue_name" value="<?php echo $det[0]['ven_name'];?>">
                                            <input type="hidden" name="orgid" value="<?php 
                                            $userSession = $this->session->userdata;
                                            echo base64_encode($userSession['admin_data'][0]['org_seq_no'])?>"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Phone Number</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter Phone No." class="form-control spinner" name="phno" id="phno" value="<?php echo $det[0]['phone'];?>"></div>
                                                   <input type="hidden" name="org" value="<?php echo base64_encode($det[0]['add_seq_no']); ?>">
                                             <input type="hidden" name="idd" value="<?php echo base64_encode($det[0]['ven_seq_no']); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Mobile Number</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter Mobile No." class="form-control spinner" name="mobno" id="mobno" value="<?php echo $det[0]['mobile_cell'];?>"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" placeholder="Enter email" class="form-control spinner" name="email" id="email" value="<?php echo $det[0]['email'];?>"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Enter house name/number</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter address house name/number" class="form-control spinner" name="house" id="house" value="<?php echo $det[0]['house_name_number'];?>"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Address street Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter street name" class="form-control spinner" name="street" id="street" value="<?php echo $det[0]['street_name'];?>"></div>
                                        </div>
                                        <!--                                            <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Country</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" placeholder="Enter Country" class="form-control spinner" name="country" id="country"></div>
                                                                                    </div>-->
                                        <!--                                             <div class="form-group">
                                                                                        <label class="col-md-3 control-label">State</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" placeholder="Enter State" class="form-control spinner" name="state" id="state"></div>
                                                                                    </div>-->
<!--                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Address town</label>
                                            <div class="col-md-9">
                                                <select class="form-control spinner" name="city" id="city">
                                                    <input type="text"  class="form-control spinner" ></div>
                                                    <option value="">Enter city</option>
                                                    <?php foreach ($dets as $key => $value) { ?>
                                                        <option value='<?php echo $value['id']; ?>'><?php echo $value['city_name']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Address county</label>
                                            <div class="col-md-9">
                                                    <input type="text" placeholder="Enter country" class="form-control spinner" name="county" id="county">
                                                <select class="form-control spinner" name="county" id="county">
                                                    <input type="text"  class="form-control spinner" ></div>
                                                    <option value="">Enter County</option>

                                                </select>
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Postcode</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter postal code" class="form-control spinner" name="postal" id="postal" value="<?php echo $det[0]['postal_code'];?>">
                                            </div>    
                                        </div>
                                        

                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Contact Reference No.</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter contact reference" class="form-control spinner" name="contact" id="contact" value="<?php echo $det[0]['contact_ref_no']; ?>">
                                            </div>    
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Remarks</label>
                                            <div class="col-md-9">
                                                <textarea placeholder="Enter remarks" class="form-control spinner" name="remarks" id="remarks"><?php echo $det[0]['remarks_notes'];?></textarea></div>
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
               venue_name: {
                    required: true
                },
                phno: {
                    required: true,
                    number: true,
                    maxlength: 11,
                    minlength: 11 
                },
                mobno: {
                    required: true,
                    number: true,
                    maxlength: 11,
                    minlength: 11  
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
                    number: true,
                    minlength: 7,
                    maxlength: 7
                },
                
                contact: {
                    required: true,
                     number: true,
                     maxlength: 11,
                     minlength: 11    
                },
                
                 remarks: {
                    required: true
                }

            },
            messages: {
                venue_name: {
                    required: "<font color=\"red\">Please enter venue.</font> "
                },
                phno: {
                    required: "<font color=\"red\">Please enter phone no.</font> ",
                    number: "<font color=\"red\">Please enter number only</font> ",
                    maxlength: "<font color=\"red\">Phone number cannot be more than 11 digits</font> ",
                    minlength: "<font color=\"red\">Phone number must of 11 digits</font> "
                },
                mobno: {
                    required: "<font color=\"red\">Please enter mobile no.</font> ",
                    number: "<font color=\"red\">Please enter number only</font> ",
                    minlength: "<font color=\"red\">Mobile number must of 11 digits</font> ",
                    maxlength: "<font color=\"red\">Mobile number cannot be more than 11 digits</font> "   
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
                    required: "<font color=\"red\">Please enter postal code.</font> ",
                    number: "<font color=\"red\">Please enter number only</font> ",
                    minlength: "<font color=\"red\">Postal code must be of 7 characters.</font> ", 
                    maxlength: "<font color=\"red\">Postal cannot be more than 7 characters.</font> "
                },
                contact: {
                    required: "<font color=\"red\">Please enter contact no.</font> ",
                    number: "<font color=\"red\">Postal enter number only.</font> ",
                    minlength: "<font color=\"red\">Phone number must of 11 digits</font> ",
                    maxlength: "<font color=\"red\">Contact number cannot be more than 11 digits</font> "  
                },
                
                remarks: {
                    required: "<font color=\"red\">Please enter remarks.</font> "
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
