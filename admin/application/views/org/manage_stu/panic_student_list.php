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
                        <a href="">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Organization Admin Dashboard</a>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->

            <!-- END PAGE HEADER-->
            <div class="portlet-body">
                <h3 class="page-title">View List Of Panic Student
                </h3>
                <?php if ($this->session->flashdata('suc_message')) { ?>
                    <div class="row-fluid">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="alert-link"><?php echo $this->session->flashdata('suc_message'); ?></span>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('err_message')) { ?>
                    <div class="row-fluid">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <span class="alert-link"> <?php echo $this->session->flashdata('err_message'); ?></span>
                        </div> 
                    </div>
                <?php } ?>

                <div class="table-toolbar">
                    <div class="row">
                        <div class="table-toolbar">
                            <div class="row" style="padding-left: 15px">
                                <div class="col-md-6">
<!--                                    <div class="btn-group">
                                        <a href="<?php echo $base_url; ?>managestu/view" class="btn sbold green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>-->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <!--<th>Student Address</th>-->
                            <th>Phone No.</th>
                            <th>Email</th>
                            <th>Event Name</th>
                            <th>Status</th>
                            <th>Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        foreach ($panic_student as $key => $value) {
                            $value = $value['details'][0];
                            ?>
                            <tr class="odd gradeX">
                                <td width="20%"><?php echo $value['fname'] . " " . $value['lname']; ?></td>
<!--                                <td width="20%"><?php // echo $value['house_name_number'] . ',' . $value['street_name'] . ',' . $value['city'] . ',' . $value['county']; ?></td>-->
                                <td><?php echo $value['mobile']; ?></td>

                                <td><?php echo $value['email']; ?> </td>
                                <td> <a href="<?php echo base_url() . 'org/manageevent/detail/'; ?><?php echo base64_encode($value['event_id']); ?>"><?php echo $value['event_name']; ?></a></td>
                     
                               
                                <td><?php if($value['seen']==0){ ?> <a href="<?php echo base_url() . 'org/managestu/panicStudentseen/'; ?><?php echo base64_encode($value['id']); ?>"  class="btn btn-xs green dropdown-toggle" id="see" name="see"> Unseen</a> <?php }else { ?>
                               <a href="" class="btn btn-xs green dropdown-toggle" id="see" name="see"> Seen</a> 
                                <?php } ?>
                                </td>
                                
                                <td width="180px">
                                    <a href="<?php echo base_url() . 'org/managestu/panicStudentLocation/'; ?><?php echo base64_encode($value['id']); ?>"  class="btn btn-xs green dropdown-toggle"> See Map</a>
                                    <a href="<?php echo base_url() . 'org/managestu/panicStudentMessages/'; ?><?php echo base64_encode($value['id']); ?>"  class="btn btn-xs green dropdown-toggle"> Message</a>
                                    <a href="<?php echo base_url() . 'org/managestu/panicStudentImages/'; ?><?php echo base64_encode($value['id']); ?>"  class="btn btn-xs green dropdown-toggle"> Image</a>
                                </td>
                            </tr>

                            <?php
                            $index++;
                        }
                        ?>

                    </tbody>
                </table>
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

<style>

    .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
        margin-left:-9px;
        position:absolute;
    }

    .table .btn {
        margin-left: 0;
        margin-right: 0px;
    }
</style>
<script>
    $(document).ready(function (e) {
        $('.aa').click(function () {
            var res = $(this).attr('id');
            var res_id = $(this).attr('ids');
            //alert(res_id);
            if (res == "yes") {
                $('.cc' + res_id).css('display', 'block');

            }
            else {
                $('.cc' + res_id).css('display', 'none');
            }
        });
        

        $("#myfrm").validate({
//                        errorClass: 'customErrorClass',
            rules: {
                orgname: {
                    required: true
                },
                phno: {
                    required: true
                },
                mobno: {
                    required: true
                },
                phno:{
                    required: true
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
                    required: true
                },
                authno: {
                    required: true
                },
                type: {
                    required: true
                },
                primary: {
                    required: true
                },
                secondary: {
                    required: true
                },
                tertiary: {
                    required: true
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
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                mobno: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                website: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                house: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                street: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                state: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                city: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                county: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                postal: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                authno: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                type: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                primary: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                secondary: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                tertiary: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                start_date: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                end_date: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                inlineCheckbox1: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                inlineCheckbox2: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                remarks: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                emgname: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                role: {
                    required: "<font color=\"red\">Please enter phone no.</font> "
                },
                lisence: {
                    required: "<font color=\"red\">Please enter phone no.</font> ",
                    maxlength: "<font color=\"red\">You can select only one box.</font>"
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
<script>
    function funhide()
    {
        //alert("hi");


        if (document.getElementById('no').checked) {
            document.getElementById('codesent').style.display = 'none';

        }
    }
    function funshow()
    {
        //alert("hi");

        if (document.getElementById('yes').checked) {
            document.getElementById('codesent').style.display = 'block';

        }
    }
</script>
