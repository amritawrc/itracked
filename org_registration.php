<?php

session_start();
error_reporting(0);
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

            <h3>Organization Registration</h3>
       <form id="myform" class="form" action="org.php" method="post" autocomplete="on">
              
               
            <?php echo $_SESSION['message']; ?>


                <p>

                    <label for="subject" class="icon-bullhorn">Organization Name</label>

                    <input type="text" name="org_name" id="org_name" placeholder="" />

                </p>



                <p>

                    <label for="subject" class="icon-bullhorn">Phone number</label>

                    <input type="text" name="phno" id="phno" placeholder=""/>

                </p>



                <p>

                    <label for="subject" class="icon-bullhorn">Email Address</label>

                    <input type="email" name="email" id="email" placeholder=""/>

                </p>



                <p>

                    <label for="subject" class="icon-bullhorn">Website</label>

                    <input type="text" name="website" id="website" placeholder=""/>

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

                    <label for="subject" class="icon-bullhorn">Organization Authorization No</label>

                    <input type="text" name="authno" id="authno" placeholder="" />

                </p>



                <p>

                    <label for="subject" class="icon-bullhorn">Emergency Contact Name</label>

                    <input type="text" name="emgname" id="emgname" placeholder="" />

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



                <p class="indication">

                    <button type="submit" class="btn btn-primary">Submit</button></p>





            </form>

        </div>

    </div>

</div>


<?php include 'templates/footer.php'; ?>

<script>
    $(document).ready(function () {

        $("#myform").validate({
//                        errorClass: 'customErrorClass',
            rules: {
                org_name: {
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
                street:{
                    required: true
                },
                phno: {
                    required: true,
                    number: true
                },
                postal: {
                    required: true,
                    //number: true
                },
                authno: {
                    required: true
                },
                emgname: {
                    required: true
                },
                emergency_contact_secondary_no: {
                    required: true,
                    number: true
                },
                emergency_contact_primary_no: {
                    required: true,
                    number: true
                },
                emergency_contact_tertiary_no: {
                    required: true,
                    number: true
                }
              
            },
            messages: {
                org_name: {
                    required: "<font color=\"red\">Please enter organization name.</font> "
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
                    required: "<font color=\"red\">Please enter street.</font> "
                },
                phno: {
                    required: "<font color=\"red\">Please enter phone no.</font> ",
                    number: "<font color=\"red\">Please enter number only.</font> "
                },
                postal: {
                    required: "<font color=\"red\">Please enter postal code.</font> ",
                    //number: "<font color=\"red\">Please enter number only.</font> "
                },
               authno: {
                    required: "<font color=\"red\">Please enter authorization no.</font> "
                },
                 emgname: {
                    required: "<font color=\"red\">Please enter contact person name.</font> "
                },
                emergency_contact_secondary_no: {
                    required: "<font color=\"red\">Please enter emergency contact secondary number.</font> ",
                    number:  "<font color=\"red\">Please enter number only.</font> "
                },
                emergency_contact_primary_no: {
                    required: "<font color=\"red\">Please enter emergency contact primary number.</font> ",
                     number:  "<font color=\"red\">Please enter number only.</font> "
                },
                emergency_contact_tertiary_no: {
                    required: "<font color=\"red\">Please enter emergency contact tertiary number.</font> ",
                     number:  "<font color=\"red\">Please enter number only.</font> "
                }
              
            }
        });
       

        $('#org_id').change(function () {
            //alert ($('#event').val());
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

            //alert ($('#event').val());

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

        });
<?php if(!empty($_SESSION['message'])){?>
setInterval(function(){
    
      <?php $_SESSION['message'] = ''; ?>
            window.location.reload();
        }, 3000);
<?php } ?>
    });

</script>




