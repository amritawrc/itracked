<?php

//Database Connection
session_start();
require_once('db.conf.php');
include('mypaypal.php');

$token = $_GET['token'];
$PayerID = $_GET['PayerID'];
# Update database 
//$transId = 555;
//$amount = $this->session->userdata('amount');
$title = 'Test';
$plan_id = "Plan1";
$amount = $_SESSION['itemprice'];
$itemname = $_SESSION['itemName'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];

$PayPalMode = 'sandbox';                             # sandbox or live
$PayPalApiUsername = 'mintu.gorai07_api1.gmail.com'; # PayPal API Username
$PayPalApiPassword = '9N7N9MHQNLP6597P';             # Paypal API password
$PayPalApiSignature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AdtYcck3Zcaf5I5bAL-JAeb66VMz'; # Paypal API Signature
$PayPalCurrencyCode = 'GBP';                         # Paypal Currency Code

$PayPalReturnURL = 'http://blogmo.co/iTracked_web/paypal_response.php';   # Point to process.php page
$PayPalCancelURL = 'http://blogmo.co/iTracked_web/payment-cancelled.php';


$ItemName = $itemname; //Item Name
$ItemPrice = $amount; //Item Price
$ItemNumber = md5($amount); //Item Number
$ItemQty = '1'; // Item Quantity

$ItemTotalPrice = $amount; //(Item Price x Quantity = Total) Get total amount of product;

$padata = '&TOKEN=' . urlencode($token) .
        '&PAYERID=' . urlencode($PayerID) .
        '&PAYMENTACTION=' . urlencode("SALE") .
        '&AMT=' . urlencode($ItemTotalPrice) .
        '&CURRENCYCODE=' . urlencode($PayPalCurrencyCode);

# We need to execute the "SetExpressCheckOut" method to obtain paypal token
$paypal = new MyPayPal();
//$httpParsedResponseAr = $paypal->doExpressCheckout('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode, $PayerID, $token);
$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
//t($httpParsedResponseAr,1);
//echo '<pre>';
//print_r($httpParsedResponseAr);
//exit();
# Respond according to message we receive from Paypal$httpParsedResponseAr
if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {

    $sql = mysqli_query($con, "INSERT INTO `tbl_payments` (user_id,tocken,txnid,txn_type,payment_amount, payment_status, createdtime) VALUES (
				'" . $user_id . "' ,
				'" . $httpParsedResponseAr['TOKEN'] . "' ,
				'" . $httpParsedResponseAr['TRANSACTIONID'] . "' ,
				'" . $httpParsedResponseAr['TRANSACTIONTYPE'] . "' ,
				'" . $amount . "' ,
				'" . $httpParsedResponseAr['PAYMENTSTATUS'] . "' ,
				'" . date("Y-m-d H:i:s") . "'
				)");

    $appcode = md5(uniqid(rand(), true));
    $appcode = substr($appcode, 0, 10);
    $appcode = 'ST' . $appcode;

//if somehow appcode is created which is already exist in database
    while (1) {
        $res = $res1 = mysqli_query($con, "select appcode from tbl_student where 1 and appcode = '" . $appcode . "'");
        $mnr = mysqli_num_rows($res1);
        if ($mnr > 0) {
            $appcode = md5(uniqid(rand(), true));
            $appcode = substr($appcode, 0, 10);
            $appcode = 'ST' . $appcode;
        } else {
            break;
        }
    }
    $res0 = mysqli_query($con, "update `tbl_student` set `tarnsaction_id`='" . $httpParsedResponseAr['TRANSACTIONID'] . "',`pay_status` = '" . 1 . "',`appcode` = '" . $appcode . "' WHERE `stu_seq_no` = '" . $user_id . "'");

    $message = "You have successfully registered as student. Your appcode is " . $appcode;
    $sub = "iTracked Registration";
    $headers = 'From: noreply@itracked.com' . "\r\n" .
            'Reply-To: noreply@itracked.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    mail($email, $sub, $message, $headers);

    header('location: payment-successful.php');

//    print_r($_REQUEST);
//    echo $_GET['token'];
//    die();
} else {
    echo "Oops, something went wrong.";
    exit();
}

//$sql = mysqli_query($con, "UPDATE `tbl_payments` set `txnid`='" . $_GET['PayerID'] . "',`payment_status`=1 WHERE tocken='" . $tocken . "'");
//$res0 = mysqli_query($con, "UPDATE `tbl_student` set `pay_status` = '" . 1 . "',`tarnsaction_id` = '" . $_GET['PayerID'] . "' WHERE `order_id` = '" . $tocken . "'");
header('location: payment-successful.php');
//                echo "Registered successfully";
exit;
//session_start();
//include('mypaypal.php');
////echo '<pre>';
//print_r($_GET);
////print_r($_POST);
//exit;

// Response from Paypal
// read the post from PayPal system and add 'cmd'
//$req = 'cmd=_notify-validate';
//foreach ($_GET as $key => $value) {
//    $value = urlencode(stripslashes($value));
//    $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
//    $req .= "&$key=$value";
//}
//
//// assign posted variables to local variables
//$data['item_name'] = $_GET['item_name'];
//$data['item_number'] = $_GET['item_number'];
//$data['payment_status'] = $_GET['st'];
//$data['payment_amount'] = $_GET['mc_gross'];
//$data['payment_currency'] = $_GET['mc_currency'];
//$data['txn_id'] = $_GET['tx'];
//$data['receiver_email'] = $_GET['receiver_email'];
//$data['payer_email'] = $_GET['payer_email'];
//$data['custom'] = $_GET['custom'];
//
//// post back to PayPal system to validate
//$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
//$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
//$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
//
//$fp = fsockopen('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
//
//if (!$fp) {
//    // HTTP ERROR
//} else {
//    fputs($fp, $header . $req);
//    while (!feof($fp)) {
//        $res = fgets($fp, 1024);
//        if (strcmp($res, "VERIFIED") == 0) {
//
//            // Used for debugging
//            // mail('user@domain.com', 'PAYPAL POST - VERIFIED RESPONSE', print_r($post, true));
//            // Validate payment (Check unique txnid & correct price)
////                $valid_txnid = check_txnid($data['txn_id']);
////                $valid_price = check_price($data['payment_amount'], $data['item_number']);
//            // PAYMENT VALIDATED & VERIFIED!
////                if ($valid_txnid && $valid_price) {
//
//            $sql = mysqli_query($con, "INSERT INTO `tbl_payments` (txnid, payment_amount, payment_status, itemid, createdtime) VALUES (
//				'" . $data['txn_id'] . "' ,
//				'" . $data['payment_amount'] . "' ,
//				'" . $data['payment_status'] . "' ,
//				'" . $data['item_number'] . "' ,
//				'" . date("Y-m-d H:i:s") . "'
//				)");
//            $orderid = mysqli_insert_id($con);
//
//            $res0 = mysqli_query($con, "update `tbl_student` set `pay_status` = '" . 1 . "',`order_id`='" . $orderid . "',`tarnsaction_id` = '" . $data['txn_id'] . "' WHERE `email` = '" . $data['receiver_email'] . "'");
////                    $orderid = updatePayments($data);
//
//            if ($orderid) {
//                header('location: payment-successful.php');
//                echo "Registered successfully";
//                // Payment has been made & successfully inserted into the Database
//            } else {
//                // Error inserting into DB
//                // E-mail admin or alert user
//                // mail('user@domain.com', 'PAYPAL POST - INSERT INTO DB WENT WRONG', print_r($data, true));
//            }
////                } else {
////                    // Payment made but data has been changed
////                    // E-mail admin or alert user
////                }
//        } else if (strcmp($res, "INVALID") == 0) {
//
//            // PAYMENT INVALID & INVESTIGATE MANUALY!
//            // E-mail admin or alert user
//            // Used for debugging
//            //@mail("user@domain.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");
//        }
//    }
//    fclose($fp);
//}

