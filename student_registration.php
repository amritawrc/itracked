<?php
require_once('db.conf.php');

$query = "select * from `tbl_org`";
$result = mysqli_query($con, $query);
//print_r($result); die();

$query1 = "SELECT * FROM `tbl_event` ";
$result1 = mysqli_query($con, $query1);
//echo $result; die();

$query2 = "SELECT * FROM `tbl_group` ";
$result2 = mysqli_query($con, $query2);
//echo $result; die();

include 'templates/header.php';
?>


<div class="container">

    <div class="row" style=" text-align:center">
        <div class="contactus">
            <h3>Student Registration</h3>
            <form name="student_registration" id="student_registration" class="form" action="registration.php" method="post" autocomplete="on">
                <p>


                <div class="form-group">
                    <label for="sel1">Select Organization<span class="required">*</span></label>
                    <select class="form-control" id="org_id" name="org_id" >
                        <option value="">Select Organization</option>
                        <?php
                        while ($data = mysqli_fetch_array($result)) {
                            $displayData = $data['org_seq_no'];
                            $displayData1 = $data['org_name'];
                            ?>
                            <option value="<?php echo $displayData; ?>"><?php echo $displayData1; ?></option>
                        <?php } ?>
                    </select>
                </div>
                </p>
                <p>
                    <!--<label for="usermail" class="icon-envelope"> Event Name
                        <span class="required">*</span>
                    </label>
                    <select id="event_id" name="event_id" required>
                        <option value="">Select Event</option>
                    </select>-->

                <div class="form-group">
                    <label for="usermail" class="icon-envelope"> Event Name
                        <span class="required">*</span>
                    </label>
                    <select class="form-control" id="event_id" name="event_id">
                        <option value="">Select Event</option>
                    </select>
                </div>
                </p>
                <p>
                    <!--<label for="usersite" class="icon-link">Group Name</label>
                     <select id="grp_id" name="grp_id" required>
                        <option value="">Select Group</option>
                    </select>-->
                <div class="form-group">
                    <label for="usermail" class="icon-envelope"> Group Name
                        <span class="required">*</span>

                    </label>

                    <select class="form-control" id="grp_id" name="grp_id" >
                        <option value="">Select Group</option>
                    </select>
                </div>
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">First Name</label>
                    <input type="text" name="first_name" id="first_name" placeholder="" />
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Surname</label>
                    <input type="text" name="last_name" id="last_name" placeholder="" />
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Email Address</label>
                    <input type="text" name="email" id="email" placeholder="" />
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Mobile (Format: +99(99)9999-9999)</label>
                    <input type="text" name="mobile" id="mobile" placeholder="" />
                </p>

                <span>
               <table width="100%">
                    <tr>
                        <td width="30%">
                            <table width="100%">
                                <tr>
                                    <td width="40%"> <label>Male</label></td>
                                    <td width="60%" style=" width:100%; text-align:left">
                                        <input style="width:20px; margin-top: -5px;" type="radio" name="gender" value="male">
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <td width="70%">
                            <table width="100%">
                                <tr>
                                    <td width="25%"> <label>Female</label></td>
                                    <td width="75%" style=" width:100%; text-align:left">
                                        <input style="width:20px; margin-top: -5px;" type="radio" name="gender" value="female" >
                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                </table>

                </span>



                <p>
                    <label for="subject" class="icon-bullhorn">Date of Birth</label>

                <div class="col-md-3" style="padding-left:0;">
                    <div class="form-group">
                        <select class="form-control dob" name="dob_day" id="dob_day">
                            <option  value="">Day</option>
                            <?php for ($i = 1; $i <= 31; $i++) { ?>
                                <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control dob" name="dob_month" id="dob_month">
                            <option value="">Month</option>
                            <option value="01" >Jan</option>
                            <option value="02" >Feb</option>
                            <option value="03" >Mar</option>
                            <option value="04" >Apr</option>
                            <option value="05" >May</option>
                            <option value="06" >Jun</option>
                            <option value="07" >Jul</option>
                            <option value="08" >Aug</option>
                            <option value="09" >Sep</option>
                            <option value="10" >Oct</option>
                            <option value="11" >Nov</option>
                            <option value="12" >Dec</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <select class="form-control dob" name="dob_year" id="dob_year">
                        <option value="">Year</option>
                        <?php for ($i = date('Y'); $i >= 1900; $i--) { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Age on return to UK</label>
                    <input type="text" name="age_on_return_to_uk" id="age_on_return_to_uk" placeholder=""  />
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Shoe size(euro)</label>
                    <input type="text" name="shoe_size" id="shoe_size" placeholder="" />
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Height(cm)</label>
                    <input type="text" name="height" id="height" placeholder="" />
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Weight(kg)</label>
                    <input type="text" name="weight" id="weight" placeholder="" />
                </p>

                <span>
                <table width="100%">
                    <tr>
                        <td width="100%">
                            <table width="100%">
                                <tr>
                                    <td width="6%" style="text-align:left"><input style="width:20px; margin-top: -2px;" type="checkbox" name="medical" value="1" ></td>
                                    <td width="84%"> <label>Medical Requirements</label></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                </span>

                <span>
                <table width="100%">
                    <tr>
                        <td width="100%">
                            <table width="100%">
                                <tr>
                                    <td width="6%" style="text-align:left"><input style="width:20px; margin-top: -2px;" type="checkbox" name="dietary" value="1" ></td>
                                    <td width="84%"> <label>Dietary Requirements</label></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                </span>


                <span>
                <table width="100%">
                    <tr>
                        <td width="30%">
                            <table width="100%">
                                <tr>
                                    <td width="20%"> <label>Ski</label></td>
                                    <td width="60%" style=" width:100%; text-align:left"><input style="width:20px; margin-top: -5px;" type="radio" name="ski" value="1" ></td>
                                </tr>
                            </table>
                        </td>

                        <td width="70%">
                            <table width="100%">
                                <tr>
                                    <td width="25%"> <label>Snowboard</label></td>
                                    <td width="75%" style=" width:100%; text-align:left"><input style="width:20px; margin-top: -5px;" type="radio" name="ski" value="2" ></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                </span>


                <p>
                    <label for="subject" class="icon-bullhorn">Emergency contact name</label>
                    <input type="text" name="emergency_contact_name" id="emergency_contact_name" placeholder="" />
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Emergency contact primary number</label>
                    <input type="text" name="emergency_contact_primary_no" id="emergency_contact_primary_no" placeholder="" />
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Emergency contact secondary number</label>
                    <input type="text" name="emergency_contact_secondary_no" id="emergency_contact_secondary_no" placeholder="" />
                </p>


                <p>
                    <label for="subject" class="icon-bullhorn">Emergency contact tertiary number</label>
                    <input type="text" name="emergency_contact_tertiary_no" id="emergency_contact_tertiary_no" placeholder="" />
                </p>

                <p id="price1">

                    <label for="subject" class="icon-bullhorn">Total payment</label>

                    <input type="text" name="price" id="price" placeholder="" readonly/>
                    <!--<input type="hidden" name="curr" value="EURO">-->

                </p>


                <p class="indication">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </p>

            </form>

        </div>

    </div>

</div>


<?php include 'templates/footer.php'; ?>

<script type="text/javascript" src="js/jquery.validate.js"></script>
<script>
    $(document).ready(function () {
        //FANCYBOX
        //https://github.com/fancyapps/fancyBox
//        $(".fancybox").fancybox({
//            openEffect: "none",
//            closeEffect: "none"
//        });

        $('#org_id').change(function () {
            var org_id = $(this).val();
            $.ajax({
                url: 'event.php',
                type: 'post',
//                dataType: 'json',
                data: {org_id: org_id},
                success: function (data) {
                    $('#event_id').html(data);
                }
            });
        });
        $('#event_id').change(function () {
            var event_id = $(this).val();
            $.ajax({
                url: 'group.php',
                type: 'post',
//                dataType: 'json',
                data: {event_id: event_id},
                success: function (data) {
                    $('#grp_id').html(data);
                }
            });

            $.ajax({
                url: 'evdate.php',
                type: 'post',
//                dataType: 'json',
                data: {event_id: event_id},
                success: function (data) {
                    $('#price').val(data);
                }

            });
        });



        $('#student_registration').validate({
            rules: {
                org_id: {
                    required: true
                },
                event_id: {
                    required: true
                },
                grp_id: {
                    required: true
                },
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                dob_day: {
                    required: true
                },
                dob_month: {
                    required: true
                },
                dob_year: {
                    required: true
                },
                gender: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "emailCheck.php",
                        type: "post",
                        //async: true,
                        data: {
                            email: function () {
                                return $('#email').val();
                            }
                        }
                    }
                },
            },
            messages: {
                org_id: {
                    required: "<font color=\"red\">Please select organization!</font>"
                },
                event_id: {
                    required: "<font color=\"red\">Please select event!</font>"
                },
                grp_id: {
                    required: "<font color=\"red\">Please select group!</font>"
                },
                first_name: {
                    required: "<font color=\"red\">Please enter first name!</font>"
                },
                last_name: {
                    required: "<font color=\"red\">Please enter last name!</font>"
                },
                gender: {
                    required: "<font color=\"red\">Please select gender!</font>"
                },
                dob_day: {
                    required: "<font color=\"red\">Please select dob date!</font>"
                },
                dob_month: {
                    required: "<font color=\"red\">Please select dob month!</font>"
                },
                dob_year: {
                    required: "<font color=\"red\">Please select dob year!</font>"
                },
                email: {
                    required: "<font color=\"red\">Please enter email</font>",
                    email: "<font color=\"red\">Please enter valid email</font>",
                    remote: "<font color=\"red\">Email id already exists</font>"
                }

            }
        });
    });

</script>




