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
                        <h3 class="page-title">Student Edit
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
                               

                                       <form class="form-horizontal" method="post" id="myfrm" action="<?php echo $base_url; ?>managestu/edit/<?php echo base64_encode($det[0]['stu_seq_no']).'/'; ?><?php echo base64_encode($det[0]['add_seq_no']); ?>">
                                    <div class="form-body">
                                  
                                        <!--                                            <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Organization Id</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" placeholder="Enter ID" class="form-control spinner" name="ordid" id="ordid"> </div>
                                                                                    </div>-->
                                        
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Event</label>
                                            <div class="col-md-9">
                                                <select class="form-control spinner" name="event" id="event">
<!--                                                    <input type="text"  class="form-control spinner" ></div>-->
                                                    <option value="">Select Event</option>
                                                    <?php foreach ($detss as $key => $value) { ?>
                                                        <option value='<?php echo $value['ev_seq_no']; ?>'><?php echo $value['event_name']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Group</label>
                                            <div class="col-md-9">
<!--                                                    <input type="text" placeholder="Enter country" class="form-control spinner" name="county" id="county">-->
                                                <select class="form-control spinner" name="group" id="group">
<!--                                                    <input type="text"  class="form-control spinner" ></div>-->
                                                    <option value="">Enter Group</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">First Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter first name" class="form-control spinner" name="first_name" id="first_name" value="<?php echo $det[0]['first_name'];?>"> 
                                             <input type="hidden" name="org" value="<?php echo base64_encode($det[0]['add_seq_no']); ?>">
                                             <input type="hidden" name="idd" value="<?php echo base64_encode($det[0]['stu_seq_no']); ?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Last Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter last name" class="form-control spinner" name="last_name" id="last_name" value="<?php echo $det[0]['last_name'];?>">
                                            <input type="hidden" name="orgid" value="<?php 
                                            $userSession = $this->session->userdata;
                                            echo base64_encode($userSession['admin_data'][0]['org_seq_no'])?>"> 
                                            </div>
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
<!--                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Website</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter website" class="form-control spinner" name="website" id="website" value="<?php echo $det[0]['website_url'];?>></div>
                                        </div>-->

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
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Address town</label>
                                            <div class="col-md-9">
                                                <select class="form-control spinner" name="city" id="city">
<!--                                                    <input type="text"  class="form-control spinner" ></div>-->
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
<!--                                                    <input type="text" placeholder="Enter country" class="form-control spinner" name="county" id="county">-->
                                                <select class="form-control spinner" name="county" id="county">
<!--                                                    <input type="text"  class="form-control spinner" ></div>-->
                                                    <option value="">Enter County</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Postcode</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter postal code" class="form-control spinner" name="postal" id="postal" value="<?php echo $det[0]['postal_code'];?>">
                                            </div>    
                                        </div>

                                       
                                        <div class="form-group">

                                            <label class="col-md-3 control-label">Gender</label>
                                            <div class="col-md-9">
                                                <div class="checkbox-list">
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox1" value="yes" name="lisence"> Yes -->
                                                    <input type="radio" name="gender" value="Male"  <?php if($det[0]['gender'] == "male") echo 'checked';?>> Male
  
                                                    </label>
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox2" value="no" name="lisence"> No -->
                                                     <input type="radio" name="gender" value="Female"  <?php if($det[0]['gender'] == "female") echo 'checked';?>> Female</label>
                                                </div>
                                            </div>

                                        </div>
                                               <div class="form-group">
                                            <label class="col-md-3 control-label">Date of birth</label>
                                            <div class="col-md-9">
                                                <input class="form-control form-control-inline input-medium date-picker" type="text" placeholder="Enter date of birth" name="dob" id="dob" value="<?php echo $det[0]['dob'];?>">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Age</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter age" class="form-control spinner" name="age" id="age" value="<?php echo $det[0]['age_on_return_to_uk'];?>">
                                            </div>    
                                        </div>
                                               <div class="form-group">

                                            <label class="col-md-3 control-label">Ski excursions/Outdoor excursions</label>
                                            <div class="col-md-9">
                                                <div class="checkbox-list">
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox1" value="yes" name="lisence"> Yes -->
                                                    <input type="radio" name="ski" value="1" id="skii" <?php if($det[0]['ski'] == "1") echo 'checked';?> onclick="show_cont();"> Ski excursions
  
                                                    </label>
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox2" value="no" name="lisence"> No -->
                                                     <input type="radio" name="ski" id="out" value="2" onclick="show_con();" <?php if($det[0]['ski'] == "2") echo 'checked';?>> Outdoor excursions</label>
                                                </div>
                                            </div>

                                        </div>
                                            <div class="form-group" id="heightt">
                                            <label class="col-md-3 control-label">Height</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter height" class="form-control spinner" name="height" id="height"  value="<?php echo $det[0]['height'];?>">
                                            </div>    
                                        </div>
                                          <div class="form-group" id="weightt">
                                            <label class="col-md-3 control-label">Weight</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter weight" class="form-control spinner" name="weight" id="weight"  value="<?php echo $det[0]['weight'];?>">
                                            </div>    
                                        </div>
                                         <div class="form-group" id="shoee">
                                            <label class="col-md-3 control-label">Shoe Size</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter shoe size" class="form-control spinner" name="shoe" id="shoe"  value="<?php echo $det[0]['shoe_size'];?>"> 
                                            </div>    
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Remarks</label>
                                            <div class="col-md-9">
                                                <textarea placeholder="" class="form-control spinner" name="remarks" id="remarks"><?php echo $det[0]['remarks_notes'];?></textarea></div>
                                        </div>
                                           
                                                                              <div class="form-group" id="medd">

                                            <label class="col-md-3 control-label">Medical Requirements</label>
                                            <div class="col-md-9">
                                                <div class="checkbox-list">
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox1" value="yes" name="lisence"> Yes -->
                                                    <input type="radio" name="med" value="1" <?php if($det[0]['medical'] == "1") echo 'checked';?>> Yes
  
                                                    </label>
                                                   
                                                </div>
                                            </div>

                                        </div>
                                                                                            <div class="form-group" id="diett">

                                            <label class="col-md-3 control-label">Dietary Requirements</label>
                                            <div class="col-md-9">
                                                <div class="checkbox-list">
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox1" value="yes" name="lisence"> Yes -->
                                                    <input type="radio" name="diet" value="1" <?php if($det[0]['dietary'] == "1") echo 'checked';?>> Yes
  
                                                    </label>
                                                   
                                                </div>
                                            </div>

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
        
                $('#event').change(function () {
            //alert ($('#event').val());
            var event_id=$(this).val();
            $.ajax({
                url: BASE_URL + 'managestu/fetch_group/',
                type: 'post',
//                dataType: 'json',
                data: {event_id: event_id},
                success: function (data) {
                    $('#group').html(data);

                }
            });
        });
        
    });
</script>
