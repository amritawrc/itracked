<?php

session_start();
require_once('db.conf.php');
include('mypaypal.php');

$org_id = (isset($_POST['org_id'])) ? $_POST['org_id'] : '';
$event_id = (isset($_POST['event_id'])) ? $_POST['event_id'] : '';

$query1 = "SELECT * FROM `tbl_event` where ev_seq_no = $event_id";
$result1 = mysqli_query($con, $query1);
$data = mysqli_fetch_array($result1);
$start = $data['start_date'];
$end = $data['end_date'];
 $days = (strtotime($end) - strtotime($start)) / (60 * 60 * 24);


$grp_id = (isset($_POST['grp_id'])) ? $_POST['grp_id'] : '';
$child_seq_no = (isset($_POST['child_seq_no'])) ? $_POST['child_seq_no'] : '';
$add_seq_no = (isset($_POST['add_seq_no'])) ? $_POST['add_seq_no'] : '';
$imei_no = (isset($_POST['imei_no'])) ? $_POST['imei_no'] : '';
$appcode = "";

//$appcode = md5(uniqid(rand(), true));
//$appcode = substr($appcode, 0, 10);
//
////if somehow appcode is created which is already exist in database
//while(1){
//    $res = $res1 = mysqli_query($con, "select appcode from tbl_student where 1 and appcode = '" . $appcode . "'");
//    $mnr = mysqli_num_rows($res1);
//    if ($mnr > 0) {
//        $appcode = md5(uniqid(rand(), true));
//        $appcode = substr($appcode, 0, 10);
//    }else{
//       break;
//    }
//}


$first_name = (isset($_POST['first_name'])) ? $_POST['first_name'] : '';
$last_name = (isset($_POST['last_name'])) ? $_POST['last_name'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$mobile = (isset($_POST['mobile'])) ? $_POST['mobile'] : '';

$amount = (isset($_POST['price'])) ? $_POST['price'] : '';
$curr = (isset($_POST['curr'])) ? $_POST['curr'] : '';

//check email is exist or not in database
$res = mysqli_query($con, "select email from tbl_student where 1 and email = '" . $email . "'");

$mnr = mysqli_num_rows($res);

if ($mnr > 0) {
    header('location: student_registration.php');
    echo "Email already exist!";
} else {
    $din_settings = (isset($_POST['din_settings'])) ? $_POST['din_settings'] : '';
    $gender = (isset($_POST['gender'])) ? $_POST['gender'] : '';

    $dob_day = (isset($_POST['dob_day'])) ? $_POST['dob_day'] : '';
    $dob_month = (isset($_POST['dob_month'])) ? $_POST['dob_month'] : '';
    $dob_year = (isset($_POST['dob_year'])) ? $_POST['dob_year'] : '';

    $dob = $dob_day . '-' . $dob_month . '-' . $dob_year;

    $house_name_number = (isset($_POST['house_name_number'])) ? $_POST['house_name_number'] : '';
    $street_name = (isset($_POST['street_name'])) ? $_POST['street_name'] : '';
    $age_on_return_to_uk = (isset($_POST['age_on_return_to_uk'])) ? $_POST['age_on_return_to_uk'] : '';
    $shoe_size = (isset($_POST['shoe_size'])) ? $_POST['shoe_size'] : '';
    $height = (isset($_POST['height'])) ? $_POST['height'] : '';
    $weight = (isset($_POST['weight'])) ? $_POST['weight'] : '';
    $medical = (isset($_POST['medical'])) ? $_POST['medical'] : '';
    $dietary = (isset($_POST['dietary'])) ? $_POST['dietary'] : '';

    $ski = (isset($_POST['ski'])) ? $_POST['ski'] : '';

    $emergency_contact_name = (isset($_POST['emergency_contact_name'])) ? $_POST['emergency_contact_name'] : '';
    $emergency_contact_primary_no = (isset($_POST['emergency_contact_primary_no'])) ? $_POST['emergency_contact_primary_no'] : '';
    $emergency_contact_secondary_no = (isset($_POST['emergency_contact_secondary_no'])) ? $_POST['emergency_contact_secondary_no'] : '';
    $emergency_contact_tertiary_no = (isset($_POST['emergency_contact_tertiary_no'])) ? $_POST['emergency_contact_tertiary_no'] : '';

    $current_time = time();
    $reg_start_date = $current_time;
//$reg_end_date = time();
    $created_date = $current_time;
    $updated_by = 1;
    $created_by = 1;
    $updated_date = $current_time;
    $status = 1;

    $current_time = $current_time + (60 * 60 * 24 * $days);
    $reg_end_date = $current_time;

    $api = 'blogmo.com/itracked/api/' . $event_id;
//echo "Insert into `tbl_api` (`api`) values('$api')"; exit();
    $res2 = mysqli_query($con, "Insert into `tbl_api` (`api`) "
            . "values('$api')");

    if ($org_id) {

        $res0 = mysqli_query($con, "Insert into `tbl_student` (`org_id`,`child_seq_no`, `add_seq_no`, `appcode`,`first_name`,`last_name`,`email`,`din_settings`, `gender`, `dob`, `house_name_number`, `street_name`, `age_on_return_to_uk`, `shoe_size`, `height`,`weight`,`medical`,`dietary`,`ski`,`emergency_contact_name`,`emergency_contact_primary_no`,`emergency_contact_secondary_no`,`emergency_contact_tertiary_no`,`reg_start_date`,`created_by`,`created_date`,`updated_by`,`updated_date`,`status`,`imei_no`,`mobile`,`group_id`,`type`,`reg_end_date`) "
                . "values('$org_id','$child_seq_no','$add_seq_no','$appcode','$first_name','$last_name','$email','$din_settings','$gender','$dob','$house_name_number','$street_name', '$age_on_return_to_uk', '$shoe_size','$height','$weight','$medical','$dietary','$ski','$emergency_contact_name','$emergency_contact_primary_no','$emergency_contact_secondary_no','$emergency_contact_tertiary_no','$reg_start_date','$created_by','$created_date','$updated_by','$updated_date','$status','$imei_no','$mobile','$grp_id','1','$reg_end_date')");
        $user_mli = mysqli_insert_id($con);
//echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
//exit;
    }
    $res1 = mysqli_query($con, "SELECT `ins_id`,`status1` FROM `tbl_event` WHERE ev_seq_no='" . $event_id . "' ");
    $row2 = mysqli_fetch_assoc($res1);
    $instructor_id = $row2['ins_id'];

    $status = $row2['status1'];

    if ($res0) {

        if ($instructor_id) {
            $res2 = mysqli_query($con, "Insert into `tbl_ins_stu_map` (`org_id`,`grp_id`,`ev_id`, `ins_id`, `stu_id`,`status`) "
                    . "values('$org_id','$grp_id','$event_id','$instructor_id','$user_mli','$status')");
//echo mysqli_errno($con)   . ": " . mysqli_error($con) . "\n";
//exit;
            $res2 = mysqli_query($con, "Insert into `tbl_grp_stu_map` (`org_id`,`grp_id`, `stu_id`,`event_id`, `status`) "
                    . "values('$org_id','$grp_id','$user_mli','$event_id','1')");
        }

        //Paypal payment
        $PayPalMode = 'sandbox';                            # sandbox or live
        $PayPalApiUsername = 'mintu.gorai07_api1.gmail.com'; # PayPal API Username
        $PayPalApiPassword = '9N7N9MHQNLP6597P';                         # Paypal API password
        $PayPalApiSignature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AdtYcck3Zcaf5I5bAL-JAeb66VMz'; # Paypal API Signature
        $PayPalCurrencyCode = 'GBP';                            # Paypal Currency Code

        $PayPalReturnURL = 'http://blogmo.co/iTracked_web/paypal_response.php';   # Point to process.php page
        $PayPalCancelURL = 'http://blogmo.co/iTracked_web/payment-cancelled.php';


//        $amount=5;
        //Mainly we need 4 variables from an item, Item Name, Item Price, Item Number and Item Quantity.
        $ItemName = "product1"; //Item Name
        $ItemPrice = $amount; //Item Price
        $ItemNumber = md5('2002'); //Item Number
        $ItemQty = '1';    // Item Quantity
        // $ItemTotalPrice = ($ItemPrice*$ItemQty); //(Item Price x Quantity = Total) Get total amount of product;
        $ItemTotalPrice = $ItemPrice; //(Item Price x Quantity = Total) Get total amount of product;
        //Data to be sent to paypal
        $padata = '&CURRENCYCODE=' . urlencode($PayPalCurrencyCode) .
                '&PAYMENTACTION=Sale' .
                '&ALLOWNOTE=1' .
                '&PAYMENTREQUEST_0_CURRENCYCODE=' . urlencode($PayPalCurrencyCode) .
                '&PAYMENTREQUEST_0_AMT=' . urlencode($ItemTotalPrice) .
                '&PAYMENTREQUEST_0_ITEMAMT=' . urlencode($ItemTotalPrice) .
                '&L_PAYMENTREQUEST_0_QTY0=' . urlencode($ItemQty) .
                '&L_PAYMENTREQUEST_0_AMT0=' . urlencode($ItemPrice) .
                '&L_PAYMENTREQUEST_0_NAME0=' . urlencode($ItemName) .
                '&L_PAYMENTREQUEST_0_NUMBER0=' . urlencode($ItemNumber) .
                '&AMT=' . urlencode($ItemTotalPrice) .
                '&RETURNURL=' . urlencode($PayPalReturnURL) .
                '&CANCELURL=' . urlencode($PayPalCancelURL);
        $paypal = new MyPayPal();

        $httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
//        echo '<pre>';
//        print_r($httpParsedResponseAr);
//        exit();
        //Respond according to message we receive from Paypal
        if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

            $_SESSION['itemprice'] = $amount;
            $_SESSION['totalamount'] = $amount;
            $_SESSION['itemName'] = 'Test';
            $_SESSION['itemNo'] = '9001';
            $_SESSION['itemQTY'] = 1;
            $_SESSION['user_id'] = $user_mli;
            $_SESSION['email'] = $email;

            if ($PayPalMode == 'sandbox') {
                $paypalmode = '.sandbox';
            } else {
                $paypalmode = '';
            }
            //Redirect user to PayPal store with Token received.
            $paypalurl = 'https://www' . $paypalmode . '.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . $httpParsedResponseAr["TOKEN"] . '';
            header('Location: ' . $paypalurl);
        } else {
            echo "Oops, something went wrong.";
            exit;
        }
        //Paypal payment
//        header('location: student_registration.php');
//        echo "Registered successfully";
    } else {

        header('location: student_registration.php');
        echo "Something went wrong";
    }
}
?>