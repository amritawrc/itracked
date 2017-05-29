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
                        <h3 class="page-title">Parent Registration
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
                               

                                       <form class="form-horizontal" method="post" id="myfrm" action="<?php echo $base_url; ?>manageparent/add/">
                                    <div class="form-body">
                                        <!--                                            <div class="form-group">
                                                                                        <label class="col-md-3 control-label">Organization Id</label>
                                                                                        <div class="col-md-9">
                                                                                            <input type="text" placeholder="Enter ID" class="form-control spinner" name="ordid" id="ordid"> </div>
                                                                                    </div>-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Father First Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter first name" class="form-control spinner" name="f_first_name" id="f_first_name"> </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-3 control-label">Father Last Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter last name" class="form-control spinner" name="f_last_name" id="f_last_name">
                                            <input type="hidden" name="orgid" value="<?php 
                                            $userSession = $this->session->userdata;
                                            echo base64_encode($userSession['admin_data'][0]['org_seq_no'])?>"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Mother First Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter first name" class="form-control spinner" name="m_first_name" id="m_first_name"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Mother Last Name</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter last name" class="form-control spinner" name="m_last_name" id="m_last_name"> </div>
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
                                                <input type="text" placeholder="Enter postal code" class="form-control spinner" name="postal" id="postal">
                                            </div>    
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 control-label">Number Of Children</label>
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Enter no. of children" class="form-control spinner" name="child" id="child">
                                            </div>    
                                        </div>
                                        
                                           <div class="form-group">
                                            <label class="col-md-12 control-label">Student Name</label>
                                            <div class="col-md-12">
                                                
                                <select class="form-control1 spinner" multiple="multiple" id="ms" name="stud[]" required>
                                    <?php foreach ($stu as $key => $value) { ?>
                                     <option value="<?php echo $value['stu_seq_no']; ?>"><?php echo $value['first_name']." "; ?><?php echo $value['last_name']; ?></option>
                                      
                                        <?php 
                                    } ?>
                                    </select>
              
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Remarks</label>
                                            <div class="col-md-9">
                                                <textarea placeholder="Enter Remarks" class="form-control spinner" name="remarks" id="remarks"></textarea></div>
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
                                          
                                        <div class="form-actions right1">
                                            <div class="col-md-3 control-label"></div>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn default">Register</button>
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
                f_first_name: {
                    required: true
                },
                f_last_name: {
                    required: true
                },
                m_first_name: {
                    required: true
                },
                m_last_name: {
                    required: true
                },
                phno: {
                    required: true,
                    number: true
                },
                mobno: {
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
                child: {
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
                },
                
               'stud[]': {
                    required: true
                } 
               

            },
            messages: {
                f_first_name: {
                    required: "<font color=\"red\">Please enter father's first name.</font> "
                },
                f_last_name: {
                    required: "<font color=\"red\">Please enter father's last name.</font> "
                },
                 m_first_name: {
                    required: "<font color=\"red\">Please enter mother's first name.</font> "
                },
                m_last_name: {
                    required: "<font color=\"red\">Please enter mother's last name.</font> "
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
                child: {
                    required: "<font color=\"red\">Please enter no. of children.</font> "
                },

                remarks: {
                    required: "<font color=\"red\">Please enter remarks.</font> "
                },
                 start_date: {
                    required: "<font color=\"red\">Please enter start date.</font> "
                },
                end_date: {
                    required: "<font color=\"red\">Please enter end date.</font> "
                },
                'stud[]': {
                    required: "<font color=\"red\">Please select student.</font> "
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
