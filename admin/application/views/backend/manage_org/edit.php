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
                        <h3 class="page-title">Organization Registration 
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
                                <form class="form-horizontal" method="post" id="myfrm" action="<?php echo $base_url; ?>manageorg/edit/<?php echo base64_encode($det[0]['org_seq_no']).'/'; ?><?php echo base64_encode($det[0]['add_seq_no']); ?>">
                                    <div class="form-body">
                                        <!--                                            <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Organization Id</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" placeholder="Enter ID" class="form-control spinner" name="ordid" id="ordid"> </div>
                                                                                    </div>-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Organization Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter name" class="form-control spinner" name="orgname" id="orgname" value="<?php echo $det[0]['org_name'];?>"> </div>
                                            <input type="hidden" name="org" value="<?php echo base64_encode($det[0]['add_seq_no']); ?>">
                                             <input type="hidden" name="idd" value="<?php echo base64_encode($det[0]['org_seq_no']); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Phone Number</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter Phone No." class="form-control spinner" name="phno" id="phno" value="<?php echo $det[0]['phone'];?>"></div>
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
                                            <label class="col-md-3 control-label">Website</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter website" class="form-control spinner" name="website" id="website" value="<?php echo $det[0]['website_url'];?>"></div>
                                                 <input type="hidden" placeholder="Enter website" class="form-control spinner" name="add_seq_no" id="add_seq_no" value="<?php echo $det[0]['add_seq_no'];?>">
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
                                            <label class="col-md-3 control-label">Type Of Organization</label>
                                            <div class="col-md-9">
<!--                                                    <input type="text" placeholder="Enter type of organization" class="form-control spinner" >-->
                                                <select class="form-control spinner" name="type" id="type">
<!--                                                    <input type="text"  class="form-control spinner" ></div>-->
                                                    <option value="">Enter type of organization</option>
                                                    <?php foreach ($detl as $key => $value) { ?>
                                                        <option value='<?php echo $value['id']; ?>'><?php echo $value['type']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Organization Authorization No</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter organization authorization no." class="form-control spinner" name="authno" id="authno" value="<?php echo $det[0]['org_auth_no'];?>"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Emergency Contact Name </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter emergency contact name" class="form-control spinner" name="emgname" id="emgname" value="<?php echo $det[0]['sp_contact_name'];?>"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Emergency contact person role </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter emergency contact person role" class="form-control spinner" name="role" id="role" value="<?php echo $det[0]['sp_contact_role'];?>"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Emergency contact primary number </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter emergency contact primary number" class="form-control spinner" name="primary" id="primary" value="<?php echo $det[0]['sp_contact_no1'];?>"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Emergency contact secondary number </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter emergency contact secondary number" class="form-control spinner" name="secondary" id="secondary" value="<?php echo $det[0]['sp_contact_no2'];?>"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Emergency contact tertiary number </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter emergency contact tertiary number" class="form-control spinner" name="tertiary" id="tertiary" value="<?php echo $det[0]['sp_contact_no3'];?>"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Registration Start Date</label>
                                            <div class="col-md-9">
                                                <input class="form-control form-control-inline input-medium date-picker" type="text" placeholder="Enter start date" name="start_date" id="start_date" value="<?php echo $det[0]['reg_start_date'];?>">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Registration End Date</label>
                                            <div class="col-md-9">
                                                <input class="form-control form-control-inline input-medium date-picker" type="text" placeholder="Enter end date" name="end_date" id="end_date" value="<?php echo $det[0]['reg_end_date'];?>">

                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label class="col-md-3 control-label">Liecense Fee Paid</label>
                                            <div class="col-md-9">
                                                <div class="checkbox-list">
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox1" value="yes" name="lisence"> Yes -->
                                                    <input type="radio" name="lisence" value="yes" <?php if($det[0]['lisence_fee_paid'] == "yes") echo 'checked';?>> Yes
  
                                                    </label>
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox2" value="no" name="lisence"> No -->
                                                     <input type="radio" name="lisence" value="no"  <?php if($det[0]['lisence_fee_paid'] == "no") echo 'checked';?>> No</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Remarks</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control spinner" name="remarks" id="remarks"><?php echo $det[0]['remarks_notes'];?></textarea></div>
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
                orgname: {
                    required: true
                },
                phno: {
                    required: true,
                    number: true,
                    minlength: 11
                },
                mobno: {
                    required: true,
                    number: true,
                    minlength: 11  
                },
                
                email: {
                    required: true
                },
                website: {
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
                     minlength: 7 
                },
                authno: {
                    required: true
                },
                type: {
                    required: true
                },
                primary: {
                    required: true,
                    number: true,
                    minlength: 11 
                },
                secondary: {
                    required: true,
                    number: true,
                    minlength: 11 
                },
                tertiary: {
                    required: true,
                    number: true,
                    minlength: 11 
                },
                start_date: {
                    required: true
                },
                end_date: {
                    required: true
                },
                inlineCheckbox1: {
                    required: true
                },
                inlineCheckbox2: {
                    required: true
                },
                remarks: {
                    required: true
                },
                emgname: {
                    required: true
                },
                role: {
                    required: true
                },
                lisence: {
                    required: true,
                    maxlength: 1
                }

            },
            messages: {
                orgname: {
                    required: "<font color=\"red\">Please enter organization.</font> "
                },
                phno: {
                    required: "<font color=\"red\">Please enter phone no.</font> ",
                    number: "<font color=\"red\">Please enter numbers only</font> ",
                    minlength: "<font color=\"red\">Phone number must be of 11 digits</font> " 
                },
                mobno: {
                    required: "<font color=\"red\">Please enter mobile no.</font> ",
                    number: "<font color=\"red\">Please enter numbers only</font> ",
                    minlength: "<font color=\"red\">Mobile number must be of 11 digits</font> " 
                },
                email: {
                    required: "<font color=\"red\">Please enter email.</font> "
                },
                website: {
                    required: "<font color=\"red\">Please enter website.</font> "
                },
                house: {
                    required: "<font color=\"red\">Please enter house no.</font> "
                },
                street: {
                    required: "<font color=\"red\">Please enter street no.</font> "
                },
                state: {
                    required: "<font color=\"red\">Please enter state.</font> "
                },
                city: {
                    required: "<font color=\"red\">Please enter city</font> "
                },
                county: {
                    required: "<font color=\"red\">Please enter county</font> "
                },
                postal: {
                    required: "<font color=\"red\">Please enter postal</font> ",
                    number: "<font color=\"red\">Please enter numbers only</font> ",
                    minlength: "<font color=\"red\">Mobile number must be of 7 digits</font> "
                },
                authno: {
                    required: "<font color=\"red\">Please enter authorization no.</font> "
                },
                type: {
                    required: "<font color=\"red\">Please enter type</font> "
                },
                primary: {
                    required: "<font color=\"red\">Please enter primary no.</font> ",
                    number: "<font color=\"red\">Please enter numbers only</font> ",
                   minlength: "<font color=\"red\">Primary number must be of 11 digits</font> "  
                },
                secondary: {
                    required: "<font color=\"red\">Please enter secondary no.</font> ",
                    number: "<font color=\"red\">Please enter numbers only</font> ",
                   minlength: "<font color=\"red\">Secondary number must be of 11 digits</font> "  
                },
                tertiary: {
                    required: "<font color=\"red\">Please enter tertiary no.</font> ",
                    number: "<font color=\"red\">Please enter numbers only</font> ",
                    minlength: "<font color=\"red\">Tertiary number must be of 11 digits</font> "  
                },
                start_date: {
                    required: "<font color=\"red\">Please enter start date</font> "
                },
                end_date: {
                    required: "<font color=\"red\">Please enter end date</font> "
                },
             
                remarks: {
                    required: "<font color=\"red\">Please enter remarks.</font> "
                },
                emgname: {
                    required: "<font color=\"red\">Please enter emergenct contact person name</font> "
                },
                role: {
                    required: "<font color=\"red\">Please enter contact person role</font> "
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
