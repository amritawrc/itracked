<?php
session_start();
//error_reporting(0);
require_once('db.conf.php');

$org = $_SESSION['org_id'];
$par = $_SESSION['par_id'];
if($par){
    
}else{
    redirect('par_registration.php');
}
$plan =  $_SESSION['plan_id'];
$stu  =  $_SESSION['stu_id'];

$st = array();
$st = explode(',', $stu);
$c = count($st);

//echo $org.$par.$plan; die();
//print_r($stu); die();
//print_r($st); die();
//echo $c; die();

$query = "select * from `tbl_org` where org_seq_no=$org";
$result = mysqli_query($con, $query);
$dat = mysqli_fetch_array($result);

$query1 = "select * from `tbl_parent` where par_seq_no=$par";
$result1 = mysqli_query($con, $query1);
$data = mysqli_fetch_array($result1);

 $_SESSION['parent_email'] = $data['email'];
 $_SESSION['parent_name'] = $data['fath_first_name'].' '.$data['fath_last_name'];

$query2 = "select * from `tbl_plan` where id=$plan";
$result2 = mysqli_query($con, $query2);
$dataa = mysqli_fetch_array($result2);

$_SESSION['amount'] =  $dataa['price'];

$query3 = "select * from `tbl_student` where stu_seq_no in ({$stu})";
$result3 = mysqli_query($con, $query3);

$stdent_names=array();
while ($da = mysqli_fetch_assoc($result3)) {
    $stu_all[] = $da;
    $stdent_names[]=$da['first_name'].' '.$da['last_name'];
}

//$_SESSION['childs'] = implode(',', $stdent_names);
$_SESSION['childs'] = $stdent_names;
//print_r($stu_all); die();
include 'templates/header.php';
?>



<div class="container">

    <div class="row" style=" text-align:center">

        <div class="contactus">

            <h3>Details</h3>


            <form  id="myform" class="form" action="parent_registration_payment.php" method="post" autocomplete="on">
                <?php // echo $_SESSION['message']; ?>

                <div class="row">

                    <div class="col-md-6">
                        <label for="subject" class="icon-bullhorn">Organization Name</label>
                    </div>

                    <div class="col-md-6">
                        <p style=" text-align:  left"><?php echo $dat['org_name']; ?></p>
                    </div>

                </div> 

                <div class="row">
                    
                    <div class="col-md-6">
                        <label for="subject" class="icon-bullhorn">Name</label>
                    </div>
                    
                    <div class="col-md-6">
                        <p style=" text-align:  left"><?php echo $data['fath_first_name'] . " " . $data['fath_last_name']; ?><p>
                    </div>

                </div> 


                <?php for ($i = 0; $i < $c; $i++) { ?>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="subject" class="icon-bullhorn">Child Name</label>
                            <p style=" text-align:  left"><?php echo $stu_all[$i]['first_name']; ?><p>

                        </div>
                        <div class="col-md-6">
                            <label for="subject" class="icon-bullhorn">Phone no.</label>
                            <p style=" text-align:  left"><?php echo $stu_all[$i]['mobile']; ?><p>

                        </div>
<!--                        <div class="col-md-6">
                            <label for="subject" class="icon-bullhorn">Appcode</label>
                            <p style=" text-align:  left"><?php echo $stu_all[$i]['appcode']; ?><p>

                        </div>-->

                    </div>
                <?php } ?>
                <div class="row">
                    
                    <div class="col-md-6">
                        <label for="subject" class="icon-bullhorn">Plan Name</label>
                    </div>
                    
                    <div class="col-md-6">
                        <p style=" text-align:  left"><?php echo $dataa['plan_name']; ?><p>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="subject" class="icon-bullhorn">Plan Price</label>
                    </div>
                    
                    <div class="col-md-6">
                        <p style=" text-align:  left"><?php echo £ . " " . $dataa['price']; ?><p>
                    </div>

                </div>

                <p class="indication">
                    <button type="submit" class="btn btn-primary">Make Payment</button>
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

        $("#myform").validate({
//                        errorClass: 'customErrorClass',
            rules: {
                org_id: {
                    required: true
                },
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
                phno: {
                    required: true,
                    number: true
                },
                postal: {
                    required: true,
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
            },
            messages: {
                org_id: {
                    required: "<font color=\"red\">Please enter organization name.</font> "
                },
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
                    required: "<font color=\"red\">Please enter postal code</font> ",
                    //number: "<font color=\"red\">Please enter number only.</font> "
                },
                chil: {
                    required: "<font color=\"red\">Please enter no. of children</font> ",
                    number: "<font color=\"red\">Please enter number only.</font> "
                },
                emgname: {
                    required: "<font color=\"red\">Please enter contact person name.</font> "

                },
                plan_id: {
                    required: "<font color=\"red\">Please enter plan.</font> "

                },
            }
        });


<?php // if (!empty($_SESSION['message'])) { ?>
//            setInterval(function () {

    <?php // $_SESSION['message'] = ''; ?>
//                window.location.reload();
//            }, 3000);
<?php // } ?>




    });

</script>




