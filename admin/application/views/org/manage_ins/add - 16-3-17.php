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
                        <h3 class="page-title">Instructor Registration
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
                               

                                       <form class="form-horizontal" method="post" id="myfrm" action="<?php echo $base_url; ?>manageins/add/">
                                    <div class="form-body">
                                        <!--                                            <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Organization Id</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" placeholder="Enter ID" class="form-control spinner" name="ordid" id="ordid"> </div>
                                                                                    </div>-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">First Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter first name" class="form-control spinner" name="first_name" id="first_name"> </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Last Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter last name" class="form-control spinner" name="last_name" id="last_name">
                                            <input type="hidden" name="orgid" value="<?php 
                                            $userSession = $this->session->userdata;
                                            echo base64_encode($userSession['admin_data'][0]['org_seq_no'])?>"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Phone Number</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter Phone No." class="form-control spinner" name="phno" id="phno"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Mobile Number</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter Mobile No." class="form-control spinner" name="mobno" id="mobno"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" placeholder="Enter email" class="form-control spinner" name="email" id="email"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" placeholder="Enter password" class="form-control spinner" name="password" id="password"></div>
                                        </div>
<!--                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Website</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter website" class="form-control spinner" name="website" id="website"></div>
                                        </div>-->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Enter house name/number</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter address house name/number" class="form-control spinner" name="house" id="house"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Address street Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter street name" class="form-control spinner" name="street" id="street"></div>
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
                                        </div>-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Country</label>
                                            <div class="col-md-9">
<!--                                                    <input type="text" placeholder="Enter country" class="form-control spinner" name="county" id="county">-->
                                              <select name="country" id="country" class="form-control spinner">
                                                <option value="">Select Country</option>
                                                    <?php foreach ($all_country as $key1 => $value1) { ?>
                                                        <option value="<?php echo $value1['id']; ?>"><?php echo $value1['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Postcode</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter postal code" class="form-control spinner" name="postal" id="postal">
                                            </div>    
                                        </div>

                                       
                                        <div class="form-group">

                                            <label class="col-md-3 control-label">Gender</label>
                                            <div class="col-md-9">
                                                <div class="checkbox-list">
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox1" value="yes" name="lisence"> Yes -->
                                                    <input type="radio" name="gender" value="male" checked> Male
  
                                                    </label>
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox2" value="no" name="lisence"> No -->
                                                     <input type="radio" name="gender" value="female"> Female</label>
                                                </div>
                                            </div>

                                        </div>
                                         <div class="form-group">
                                            <div class=" col-md-3" style=" padding-left: 0; padding-right: 0;">
                                                <label class="control-label pull-right" style=" padding-right: 15px">Date of Birth</label>
                                            </div>
                                            <div class=" col-md-9" style=" padding-left: 0; padding-right: 0;">
                                                <div  style="width: 100%; display: inline-block; padding-left: 15px">
                                                    <div style="width: 15%; margin-right: 15px; display: inline-block">
                                                        <div class="form-groups">
                                                    <select name="day" id="day" class="form-control spinner">
                                                        <option value="" selected>Day</option>
                                                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                         
                                                        
                                                    </div>
                                                    
                                                    <div style="width: 15%; margin-right: 15px; display: inline-block">
                                                        <div class="form-group">
                                                    <select name="month" id="month" onchange="" class="form-control spinner">
                                                        <option value="" selected>Month</option>
                                                        <option value="Jan">Jan</option>
                                                        <option value="Feb">Feb</option>
                                                        <option value="Mar">Mar</option>
                                                        <option value="Apr">Apr</option>
                                                        <option value="May">May</option>
                                                        <option value="Jun">Jun</option>
                                                        <option value="Jul">Jul</option>
                                                        <option value="Aug">Aug</option>
                                                        <option value="Sep">Sep</option>
                                                        <option value="Oct">Oct</option>
                                                        <option value="Nov">Nov</option>
                                                        <option value="Dec">Dec</option>
                                                    </select>            
                                                </div>  
                                                    </div>
                                                    
                                                    <div style="width: 15%; display: inline-block">
                                                       <div class="form-group">
                                                    <select name="year" id="year" class="form-control spinner">
                                                        <option value="" selected>Year</option>                       
                                                            <?php
                                                            for ($i = date('Y'); $i > 1899; $i--) {
                                                                $birthdayYear = '';
                                                                $selected = '';
                                                                if ($birthdayYear == $i)
                                                                    $selected = ' selected="selected"';
                                                                echo('<option value="' . $i . '"' . $selected . '>' . $i . '</option>' . "\n");
                                                            }
                                                            ?>                          
                                                        </select>     
                                                </div>  
                                                        
                                                    </div>
                                                                   

                                               
                                                                                            
                                                </div> 
                                            </div>

                                        </div>  
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Instructor Type</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter instructor type" class="form-control spinner" name="ins_type" id="ins_type">
                                            </div>    
                                        </div>
                                        
                                         <div class="form-group" >
                                            <label class="col-md-3 control-label">Education</label>
                                            <div class="col-md-9">
                                                 <textarea placeholder="Enter education" class="form-control spinner"  name="education" id="education"></textarea>
                                            </div>    
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Experience</label>
                                            <div class="col-md-9">  
                                                <textarea placeholder="Enter experience" class="form-control spinner" name="exp" id="exp"></textarea>
                                            </div>    
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Relevant Experience</label>
                                            <div class="col-md-9">
                                                
                                                <textarea placeholder="Enter relevant experience" class="form-control spinner"  name="rel" id="rel"></textarea>
                                            </div>    
                                        </div>
                                               <div class="form-group">

                                            <label class="col-md-3 control-label">Instructor profile approved</label>
                                            <div class="col-md-9">
                                                <div class="checkbox-list">
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox1" value="yes" name="lisence"> Yes -->
                                                    <input type="radio" name="ski" value="yes" checked> Yes
  
                                                    </label>
                                                    <label class="checkbox-inline">
<!--                                                        <input type="checkbox" id="inlineCheckbox2" value="no" name="lisence"> No -->
                                                     <input type="radio" name="ski" value="no"> No</label>
                                                </div>
                                            </div>

                                        </div>
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Instructor authorization no.</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter authorization no." class="form-control spinner" name="auth" id="auth">
                                            </div>    
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Registration Start Date</label>
                                            <div class="col-md-9">
                                                <input class="form-control form-control-inline input-medium date-picker" type="text" placeholder="Enter start date" name="start_date" id="start_date">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Registration End Date</label>
                                            <div class="col-md-9">
                                                <input class="form-control form-control-inline input-medium date-picker" type="text" placeholder="Enter end date" name="end_date" id="end_date">

                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Fee Type</label>
                                            <div class="col-md-9">
                                                <select class="form-control spinner" name="fee_type" id="fee_type">
<!--                                                    <input type="text"  class="form-control spinner" ></div>-->
                                                    <option value="">Enter fee type</option>
                                                    <option value="1">Hourly</option>
                                                    <option value="2">Monthly</option>
                                                    <option value="3">Weekly</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Currency</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter currency" class="form-control spinner" name="currency" id="currency">
                                            </div>    
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Fee</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter fee" class="form-control spinner" name="fee" id="fee">
                                            </div>    
                                        </div>
                                          
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Remarks</label>
                                            <div class="col-md-9">
                                                <textarea placeholder="Enter Remarks" class="form-control spinner" name="remarks" id="remarks"></textarea></div>
                                        </div>
                                          
                                        <div class="form-actions right1">
                                            <div class="col-md-3 control-label"></div>
                                            <div class="col-md-9">
                                                <button type="submit" name="instructor_add" id="instructor_add" class="btn default">Register</button>
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

<style>
    
    .form-horizontal .form-group {
    margin-left: 0;
    margin-right: 0;
}
</style>
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
                    number: true,
                    minlength: 11,
                    maxlength: 11
                },
                phno:{
                    required: true,
                    number: true,
                    minlength: 11,
                    maxlength: 11
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
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
                    minlength:7,
                    maxlength: 7
                  
                       
                },
                gender: {
                    required: true
                },
                country: {
                    required: true
                },
                day: {
                    required: true
                },
                 month: {
                    required: true
                },
                 year: {
                    required: true
                },
                ins_type: {
                    required: true
                },
                education: {
                    required: true
                },
                exp: {
                    required: true
                },
                rel: {
                    required: true
                },
                ski: {
                    required: true
                },
                auth: {
                    required: true
                },
                start_date: {
                    required: true
                },
                end_date: {
                    required: true
                },
                fee_type: {
                    required: true
                },
                currency: {
                    required: true
                },
                fee: {
                    required: true
                },
                remarks: {
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
                    number: "<font color=\"red\">Please enter number only.</font> ",
                    minlegnth: "<font color=\"red\">Phone number must be of 11 digits.</font> ",
                    maxlength: "<font color=\"red\">Phone number cannot be more than 11 digits.</font> "
                },
                mobno: {
                    required: "<font color=\"red\">Please enter mobile no.</font> ",
                    number: "<font color=\"red\">Please enter number only.</font> ",
                    minlegnth: "<font color=\"red\">Mobile number must be of 11 digits.</font> ",
                    maxlength: "<font color=\"red\">Mobile number cannot be more than 11 digits.</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter email.</font> ",
                    email: "<font color=\"red\">Please enter a valid email address.</font> "
                },
                password: {
                    required: "<font color=\"red\">Please enter password.</font> "
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
                    minlength: "<font color=\"red\">Postal code must be of 7 characters.</font> ",
                    number: "<font color=\"red\">Postal enter number only.</font> ",
                    maxlength: "<font color=\"red\">Postal code cannot be more than 7 characters.</font> "
                },
                gender: {
                    required: "<font color=\"red\">Please select gender.</font> "
                },
                ins_type: {
                    required: "<font color=\"red\">Please enter type.</font> "
                },
                country: {
                    required: "<font color=\"red\">Please select country.</font> "
                },
                day: {
                    required: "<font color=\"red\">Please select day.</font> "
                },
                month: {
                    required: "<font color=\"red\">Please select month.</font> "
                },
                year: {
                    required: "<font color=\"red\">Please select year.</font> "
                },
                education: {
                    required: "<font color=\"red\">Please enter education</font> "
                },
                exp: {
                    required: "<font color=\"red\">Please enter experince.</font> "
                },
                rel: {
                    required: "<font color=\"red\">Please enter relevant experinece.</font> "
                },
                auth: {
                    required: "<font color=\"red\">Please enter authorization no.</font> "
                },
                start_date: {
                    required: "<font color=\"red\">Please enter start date.</font> "
                },
                end_date: {
                    required: "<font color=\"red\">Please enter end date.</font> "
                },
                fee_type: {
                    required: "<font color=\"red\">Please enter fee type.</font> "
                },
                currency: {
                    required: "<font color=\"red\">Please enter currency.</font> "
                },
                fee: {
                    required: "<font color=\"red\">Please enter fee.</font> "
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
