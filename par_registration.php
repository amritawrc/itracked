<?php
session_start();
error_reporting(0);
require_once('db.conf.php');

$plan_id = $_SESSION['id'];
session_destroy();

//$query = "select * from `tbl_org`";
//$result = mysqli_query($con, $query);
//$dat = mysqli_fetch_array($result);
//$t = $dat['org_seq_no'];
//
//$query4 =  "select * from `tbl_org`";
//$result4 = mysqli_query($con, $query4);
//print_r($result); die();

$query1 = "SELECT * FROM `tbl_event` ";
$result1 = mysqli_query($con, $query1);
//echo $result; die();

$query2 = "SELECT * FROM `tbl_group` ";
$result2 = mysqli_query($con, $query2);
//echo $result; die();

$query3 = "SELECT * FROM `tbl_student` where org_id =1";
$result3 = mysqli_query($con, $query3);


$query4 = "SELECT * FROM `tbl_plan` WHERE status=1 ";
$result4 = mysqli_query($con, $query4);

include 'templates/header.php';
?>



<div class="container">

    <div class="row" style=" text-align:center">

        <div class="contactus">

            <h3>Parent Registration</h3>


            <form  id="myform" class="form" action="par.php" method="post" autocomplete="on">
                <?php echo $_SESSION['message']; ?>
<!--                 <p>  
                
                   <label for="sel1">Select Organization<span class="required">*</span></label>
                   <select class="form-control" id="org_id" name="org_id">
                       <option value="">Select Organization</option>
                <?php
//                        while ($data = mysqli_fetch_array($result4)) {
//                            $displayData = $data['org_seq_no'];
//                            $displayData1 = $data['org_name'];
//                            
                ?>

                           <option value="3">Itracked</option>
                <?php //}  ?>
                   </select>
               </p>
                -->


                <p>
                    <label for="subject" class="icon-bullhorn">First Name</label>
                    <input type="text" name="f_first_name" id="f_first_name" placeholder=""/>
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Last Name</label>
                    <input type="text" name="f_last_name" id="f_last_name" placeholder=""/>
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Email Address</label>
                    <input type="text" name="email" id="email" placeholder=""/>
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Phone No.</label>
                    <input type="text" name="phno" id="phno" placeholder=""/>
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">House No.</label>
                    <input type="text" name="house" id="house" placeholder=""/>
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Street</label>
                    <input type="text" name="street" id="street" placeholder=""  />
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">Post Code</label>
                    <input type="text" name="postal" id="postal" placeholder="" />
                </p>

                <p>
                    <label for="subject" class="icon-bullhorn">No. Of children</label>
                    <input type="text" name="chil" id="chil" placeholder="" />
                </p>

                <p id="target">
                </p>
                <p>  
                    <label for="sel1">
                        <?php if ($plan_id) { ?>
                            Plan
                        <?php } else { ?>
                            Select Plan
                        <?php } ?>

                        <span class="required">*</span></label>
                    <select class="form-control" id="plan_id" name="plan_id"  <?php if ($plan_id) { ?> disabled="" <?php } ?>>
                        <option value="">Select Plan</option>
                        <?php
                        while ($data = mysqli_fetch_array($result4)) {
                            $displayData = $data['id'];
                            $displayData1 = $data['plan_name'];
                            $price = $data['price'];
                            $valid = $data['valid'];
                            if ($valid == 1) {
                                $unit = 'Day';
                            } else {
                                $unit = 'Days';
                            }

                            if ($valid >= 365 && $valid % 365 == 0) {
                                $valid = $valid / 365;
                                $unit = 'Year';
                            }
                            ?>

                            <option value="<?php echo $displayData; ?>" <?php if ($plan_id == $displayData) { ?> selected="selected" <?php } ?>><?php echo $displayData1.' - £ '.$price.' for '.$valid.' '.$unit ; ?> </option>
                        <?php } ?>
                    </select>
                    <?php if ($plan_id) { ?>
                        <input type="hidden" name="plan_id" id="plan_id" value="<?php echo $plan_id; ?>" />
                    <?php } ?>

                </p>    


                <!--                 <div class="form-group">
                                    <label for="sel1">Select Student</label>
                                    <select class="form-control" multiple="multiple" id="ms" name="stud[]" >
                                      
                <?php
                while ($data1 = mysqli_fetch_array($result3)) {
                    $displayData2 = $data1['stu_seq_no'];
                    $displayData3 = $data1['first_name'] . "" . $data1['last_name'];
                    ?>
                                                            
                                                                                        <option value="<?php echo $displayData2; ?>"><?php echo $displayData3; ?></option>
                <?php } ?>
                                    </select>
                                </div>-->


                <p class="indication">
                    <button type="button" class="btn btn-primary" id="parent_button">Submit</button>
                </p>





            </form>

        </div>

    </div>

</div>


<?php include 'templates/footer.php'; ?>

<style>

    .contactus .checked_1 input:not([type="submit"]), textarea {
        outline: none;
        display: inline-block;
        width: 40px;
        padding: 4px 8px;
        border: 1px dashed #DBDBDB;
        color: #3F3F3F;
        font-family: 'Droid Sans', Tahoma, Arial, Verdana sans-serif;
        font-size: 14px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-transition: background 0.2s linear, box-shadow 0.6s linear;
        -moz-transition: background 0.2s linear, box-shadow 0.6s linear;
        -o-transition: background 0.2s linear, box-shadow 0.6s linear;
        transition: background 0.2s linear, box-shadow 0.6s linear;
    }

    .contactus .checked_1 input:not([type="submit"]) {
        height: 18px;
    }
    .ms-choice {
        display: block;
        width: 100%;
        height: 26px;
        padding: 0;
        overflow: hidden;
        cursor: pointer;
        border: none !important;
        text-align: left;
        white-space: nowrap;
        line-height: 26px;
        color: #444;
        text-decoration: none;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        background-color: #fff;
    }

</style>

<script>
    $(document).ready(function () {

        jQuery.validator.addMethod("alphanumeric", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9]+$/i.test(value);
        }, "<font color=\"red\">Letters, numbers only please</font>");

        $("#myform").validate({
//                        errorClass: 'customErrorClass',
            rules: {
                f_first_name: {
                    required: true
                },
                f_last_name: {
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
                            },
                            type: function () {
                                return 'parent';
                            }
                        }
                    }
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
                phno: {
                    required: true,
                    number: true
                },
                postal: {
                    required: true,
                    alphanumeric: true,
                    maxlength: 8
                            //number: true
                },
                chil: {
                    required: true,
                    number: true
                },
                plan_id: {
                    required: true,
                    number: true
                },
                'chname[]': {
                    required: true
                },
                'chphno[]': {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 11,
                },
            },
            messages: {
                f_first_name: {
                    required: "<font color=\"red\">Please enter first name.</font> "
                },
                f_last_name: {
                    required: "<font color=\"red\">Please enter last name.</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter email.</font> ",
                    email: "<font color=\"red\">Please enter a valid email.</font> ",
                    remote: "<font color=\"red\">Email id already exists.</font>"
                },
                website: {
                    required: "<font color=\"red\">Please enter website.</font> "
                },
                house: {
                    required: "<font color=\"red\">Please enter house no.</font> "
                },
                street: {
                    required: "<font color=\"red\">Please enter street.</font> "
                },
                phno: {
                    required: "<font color=\"red\">Please enter phone no.</font> ",
                    number: "<font color=\"red\">Please enter number only.</font> "
                },
                postal: {
                    required: "<font color=\"red\">Please enter postal code.</font> ",
                    maxlength: "<font color=\"red\">Please don't enter more than 8 character.</font> ",
                    //number: "<font color=\"red\">Please enter number only.</font> "
                },
                chil: {
                    required: "<font color=\"red\">Please enter no. of children.</font> ",
                    number: "<font color=\"red\">Please enter number only.</font> "
                },
                emgname: {
                    required: "<font color=\"red\">Please enter contact person name.</font> "

                },
                plan_id: {
                    required: "<font color=\"red\">Please enter plan.</font> "

                },
                'chname[]': {
                    required: "<font color=\"red\">Please enter name.</font> "
                },
                'chphno[]': {
                    required: "<font color=\"red\">Please enter phone.</font> ",
                    number: "<font color=\"red\">Please enter numeric value.</font> ",
                    maxlength: "<font color=\"red\">Please don't enter more than 11 character.</font> ",
                    minlength: "<font color=\"red\">Please enter at least 10 character.</font> ",
                },
            }
        });

        $('#parent_button').on('click', function () {
            var valid = $("#myform").validate();
            if (valid) {
                $("#myform").submit();
            }
        });

//        $('#org_id').change(function () {
        //alert ($('#event').val());
//            var org_id = $(this).val();
//
//            $.ajax({
//                url: 'event.php',
//                type: 'post',
////                dataType: 'json',
//                data: {org_id: org_id},
//                success: function (data) {
//                    $('#event_id').html(data);
//                }
//            });
//        });



//        $('#event_id').change(function () {
//
//            //alert ($('#event').val());
//            var event_id = $(this).val();
//
//            $.ajax({
//                url: 'group.php',
//                type: 'post',
////                dataType: 'json',
//
//                data: {event_id: event_id},
//                success: function (data) {
//                    $('#grp_id').html(data);
//                }
//
//            });
//
//        });

<?php if (!empty($_SESSION['message'])) { ?>
            setInterval(function () {

    <?php $_SESSION['message'] = ''; ?>
                window.location.reload();
            }, 3000);
<?php } ?>

//        $(function () {
//            $('#ms').change(function () {
//                console.log($(this).val());
//            }).multipleSelect({
//                width: '100%'
//            });
//        });

        $('#chil').keyup(function () {
            //document.getElementById("chil").disabled = true;
            var elem = '';
            var k = $(this).val();
            var i;
            if (k == '') {
                $('#target').html('');
            }
            for (i = 0; i < k; i++) {
                elem += ' <div class="row">' +
                        '<div class="col-md-6">' +
                        '<label for="subject" class="icon-bullhorn">Name</label>' +
                        '<input type="text" name="chname[]" id="chname" placeholder="" />' +
                        ' </div>' +
                        '<div class="col-md-6">' +
                        '<label for="subject" class="icon-bullhorn">Phone</label>' +
                        '<input type="text" name="chphno[]" id="chphno" placeholder="" />' +
                        '</div>' +
                        '</div> ';
            }
            $('#target').html(elem);
        });

    });

</script>




