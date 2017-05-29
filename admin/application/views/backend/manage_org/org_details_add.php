<?php echo $header; ?>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->

<!-- END SIDEBAR -->

<style>
    .page-sidebar-menu{display: none;}
</style>

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
                <h3 class="page-title" style = " margin: 10px 0;"> Registration </h3>


            </div>
            <!-- END PAGE BAR -->

            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <div class="organization_form">
                        <span style = "width: 100%; padding:10px 0; font-size:25px; text-align: center; display:inline-block; font-weight:800">
                            <font style=" font-size:20px; font-weight:100">Organisation Name:</font> <?php echo $organisation_details['org_name']; ?>
                        </span>
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
                                <form class="form-horizontal" method="post" id="myfrm" action="<?php echo $base_url; ?>manageorg/org_add_details/<?php echo base64_encode($organisation_details['org_seq_no']); ?>">
                                    <div class="form-body">
                                        <!--                                            <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Organization Id</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" placeholder="Enter ID" class="form-control spinner" name="ordid" id="ordid"> </div>
                                                                                    </div>-->
                                        <!--<div class="form-group">-->
                                        <!--    <label class="col-md-3 control-label">Organization Name</label>-->
                                        <!--    <div class="col-md-9">-->
                                        <!--        <input type="text" placeholder="Enter name" class="form-control spinner" name="orgname" id="orgname" value="<?php echo $det[0]['org_name'];?>"> </div>-->
                                        <!--    <input type="hidden" name="org" value="<?php echo base64_encode($det[0]['add_seq_no']); ?>">-->
                                        <!--     <input type="hidden" name="idd" value="<?php echo base64_encode($det[0]['org_seq_no']); ?>">-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Phone Number</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter Phone No." class="form-control spinner" name="phno" id="phno" ></div>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label class="col-md-3 control-label">Mobile Number</label>-->
                                        <!--    <div class="col-md-9">-->
                                        <!--        <input type="text" placeholder="Enter Mobile No." class="form-control spinner" name="mobno" id="mobno" value="<?php echo $det[0]['mobile_cell'];?>"></div>-->
                                        <!--</div>-->
                                        <!--<div class="form-group">-->
                                        <!--    <label class="col-md-3 control-label">Email</label>-->
                                        <!--    <div class="col-md-9">-->
                                        <!--        <input type="email" placeholder="Enter email" class="form-control spinner" name="email" id="email" value="<?php echo $det[0]['email'];?>"></div>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Website</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter website" class="form-control spinner" name="website" id="website" ></div>
                                                 <!--<input type="hidden" placeholder="Enter website" class="form-control spinner" name="add_seq_no" id="add_seq_no" >-->
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Enter house name/number</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter address house name/number" class="form-control spinner" name="house" id="house" ></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Address street Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter street name" class="form-control spinner" name="street" id="street" ></div>
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
                                                <input type="text" placeholder="Enter postal code" class="form-control spinner" name="postal" id="postal" >
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
                                            <label class="col-md-3 control-label">Organization Reference No</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter organization authorization no." class="form-control spinner" name="authno" id="authno" ></div>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label class="col-md-3 control-label">Emergency Contact Name </label>-->
                                        <!--    <div class="col-md-9">-->
                                        <!--        <input type="text" placeholder="Enter emergency contact name" class="form-control spinner" name="emgname" id="emgname" value="<?php echo $det[0]['sp_contact_name'];?>"></div>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Emergency contact person role </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter emergency contact person role" class="form-control spinner" name="role" id="role" ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Emergency contact primary number </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter emergency contact primary number" class="form-control spinner" name="primary" id="primary" ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Emergency contact secondary number </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter emergency contact secondary number" class="form-control spinner" name="secondary" id="secondary" ></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:0">
                                            <label class="col-md-3 control-label">Emergency contact tertiary number </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter emergency contact tertiary number" class="form-control spinner" name="tertiary" id="tertiary" ></div>
                                        </div>
                                        <div class="form-group" style="padding-left: 0; padding-right: 0;">
                                            <label class="col-md-3 control-label" style="margin-top:26px;">Registration</label>
                                            <div class="col-md-9">
                                            <div class="col-md-6" style="padding-left:0; padding-right:0;">
                                                <div class="input-group date date-picker" data-date-format="dd-M-yyyy" data-date="<?php echo date("d-M-Y", strtotime(" ", strtotime(date('d-M-Y')))); ?>">
                                                    <table width="100%" align="left">
                                                        <tr>
                                                            <td width="100%">
                                                                <table width="100%">
                                                                    <tr>
                                                                        <td width="95%"><label class="control-label">From</label></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="100%">
                                                                            <input style="width:77%" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="start_date"  id="start_date" placeholder="DD-MMM-YYYY" >
                                                                            <span class="input-group-btn">
                                                                                <button class="btn default" type="button">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </button>
                                                                            </span>
<!--                                                                            <span></span>-->
                                                                            <div style=" margin:0; width:100%; display:none;" class="dob_div">   
                                                                                <div style="width: 100%; display: inline-block"><label for="duration_from" class="customErrorClass" id="duration_from-error"></label></div>
<!--                                                                                <div style="width: 100%; display: inline-block"><label id="month-error" class="customErrorClass" for="month"></label></div>
                                                                                <div style="width: 100%; display: inline-block"><label for="day" class="customErrorClass" id="day-error"></label></div>                             -->
                                                                            </div>
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>

                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                                    <div class="col-md-6" style="padding-left:0; padding-right:0;">
                                                        <div class="input-group date date-picker" data-date-format="dd-M-yyyy" data-date="<?php echo date("d-M-Y", strtotime(" ", strtotime(date('d-M-Y')))); ?>">

                                                            <table width="100%" align="left">
                                                                <tr>
                                                                    <td width="100%">
                                                                        <table width="90%" align="right">
                                                                            <tr>
                                                                                <td width="100%"><label class="control-label">To</label></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="100%">
                                                                                    <input style="width:80%" aria-describedby="datepicker-error" aria-invalid="false" aria-required="true" class="form-control" type="text" name="end_date" id="end_date" placeholder="DD-MMM-YYYY" >
                                                                                    <span class="input-group-btn">
                                                                                        <button class="btn default" type="button">
                                                                                            <i class="fa fa-calendar"></i>
                                                                                        </button>
                                                                                    </span>
                                                                                    <div style=" margin:0; width:100%; display:none;" class="dob_div">                                                              
                                                                                        <div style="width: 100%; display: inline-block"><label for="duration_to" class="customErrorClass" id="duration_to-error"></label></div>                             
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>

                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>  
                                                 </div>
                                             </div>
                                         <div class="form-group " >
                                            <label class="col-md-3 control-label">Currency of Choice(For Payment)</label>
                                            <div class="col-md-9">
                                                <select name="currency" id="currency" class="form-control spinner" style="padding:6px 1px;">
                                                <option value="">Select Currency</option>
                                                <option value="USD" >US Dollars(&#36;)</option>
                                                <option value="GBP" >Pound Sterling(&#163;)</option>
                                                <option value="EURO" >Euro(&euro;)</option>
                                            
                                            </select>  
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label class="col-md-3 control-label">License Fee Paid</label>
                                            <div class="col-md-9">
                                                <div class="checkbox-list">
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox1" value="yes" name="lisence"> Yes -->
                                                    <input type="radio" name="lisence" value="yes" checked="checked"> Yes
  
                                                    </label>
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox2" value="no" name="lisence"> No -->
                                                     <input type="radio" name="lisence" value="no"> No</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class = "col-md-3">
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <button type="button" class="btn default" name="add_banking_details" id = "add_banking_details">Add Banking Details</button>
                                                <!--<button type="button" class="btn green">Cancel</button>-->
                                            </div>
                                        </div>
                                        <div class="form-group hideShowDiv">
                                           <div class="form-group">
                                            <label class="col-md-3 control-label">Bank A/C no </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter emergency contact person role" class="form-control spinner" name="bank_ac_no" id="bank_ac_no" ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Bank Name </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter bank name" class="form-control spinner" name="bank_name" id="bank_name" ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3">Address</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control spinner" name="bank_address" id="bank_address"></textarea></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">IBAN Number </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter IBAN number" class="form-control spinner" name="iban_number" id="iban_number" ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Routing No </label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter routing no" class="form-control spinner" name="routing_no" id="routing_no" ></div>
                                        </div> 
                                        
                                     </div>
  
                                        <div class="form-group">
                                            <label class="col-md-3">Remarks</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control spinner" name="remarks" id="remarks" placeholder="Enter Remarks"></textarea></div>
                                        </div>
                                        

                                        <div class="form-actions right1">
                                            <div class="col-md-3 control-label"></div>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn default" name="org_details_add" id="org_details_add">Submit</button>
                                                <!--<button type="button" class="btn green">Cancel</button>-->
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
                        $('.hideShowDiv').hide();
                        $('#add_banking_details').click(function(){
                            $('.hideShowDiv').toggle();
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
                currency: {
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
                currency: {
                    required: "<font color=\"red\">Please enter currency of choice</font> "
                },
                postal: {
                    required: "<font color=\"red\">Please enter postal</font> ",
                    number: "<font color=\"red\">Please enter numbers only</font> ",
                    minlength: "<font color=\"red\">Postal code must be of 7 digits</font> "
                },
                authno: {
                    required: "<font color=\"red\">Please enter authorization no.</font> "
                },
                type: {
                    required: "<font color=\"red\">Please enter organisation type</font> "
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
        // $('#org_details_add').click(function(){
        //     var bank_ac_no = $this('#bank_ac_no').val();
        //     if(bank_ac_no == ''){
        //         alert(Please fill in all the details first);
                
        //     }
            
            
        // });
    });
</script>
