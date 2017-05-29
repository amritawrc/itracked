<?php

//Database Connection
session_start();
require_once('db.conf.php');
include('mypaypal.php');

$par = $_SESSION['par_id'];
$plan = $_SESSION['plan_id'];
$org_id = $_SESSION['org_id'];

$token = $_GET['token'];
$PayerID = $_GET['PayerID'];
# Update database 
//$transId = 555;
//$amount = $this->session->userdata('amount');
$title = 'Test';
$plan_id = $plan;
$amount = $_SESSION['itemprice'];
$itemname = $_SESSION['itemName'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$parent_name = $_SESSION['parent_name'];
$chiled = $_SESSION['childs'];

$PayPalMode = 'sandbox';                             # sandbox or live
$PayPalApiUsername = 'mintu.gorai07_api1.gmail.com'; # PayPal API Username
$PayPalApiPassword = '9N7N9MHQNLP6597P';             # Paypal API password
$PayPalApiSignature = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AdtYcck3Zcaf5I5bAL-JAeb66VMz'; # Paypal API Signature
$PayPalCurrencyCode = 'GBP';                         # Paypal Currency Code

$PayPalReturnURL = 'http://blogmo.co/iTracked_web/parent_paypal_response.php';   # Point to process.php page
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

    $sql = mysqli_query($con, "INSERT INTO `tbl_payments` (user_id,type,tocken,txnid,txn_type,payment_amount, payment_status, createdtime) VALUES (
				'" . $user_id . "' ,
				'" . 2 . "' ,
				'" . $httpParsedResponseAr['TOKEN'] . "' ,
				'" . $httpParsedResponseAr['TRANSACTIONID'] . "' ,
				'" . $httpParsedResponseAr['TRANSACTIONTYPE'] . "' ,
				'" . $amount . "' ,
				'" . $httpParsedResponseAr['PAYMENTSTATUS'] . "' ,
				'" . date("Y-m-d H:i:s") . "'
				)");



    $child_appcodes = array();
    $stu = $_SESSION['stu_id'];
    $query3 = "select * from `tbl_student` where stu_seq_no in ({$stu})";
    $result3 = mysqli_query($con, $query3);
    while ($da = mysqli_fetch_assoc($result3)) {

        $ch_appcode = md5(uniqid(rand(), true));
        $ch_appcode = substr($ch_appcode, 0, 10);
        $ch_appcode = 'CH' . $ch_appcode;
        //if somehow appcode is created which is already exist in database
        while (1) {
            $res = mysqli_query($con, "select appcode from tbl_student where 1 and appcode = '" . $ch_appcode . "'");
            $mnr = mysqli_num_rows($res);
            if ($mnr > 0) {
                $ch_appcode = md5(uniqid(rand(), true));
                $ch_appcode = substr($ch_appcode, 0, 10);
                $ch_appcode = 'CH' . $ch_appcode;
            } else {
                break;
            }
        }

        $child_id = $da['stu_seq_no'];
        $child_appcodes[] = $ch_appcode;
        $res1 = mysqli_query($con, "UPDATE tbl_student  set appcode = '" . $ch_appcode . "',status=1 where stu_seq_no='" . $child_id . "'");

        $query1 = "Insert into `tbl_par_stu_map` (`org_id`,`par_id`,`child_id`,`status`) "
                . "values('$org_id','$par','$child_id','1')";
        mysqli_query($con, $query1);
    }
    $appcode = "PR" . substr(rand(0, 99999) . rand(999, 99999), 0, 8);
    $res1 = mysqli_query($con, "UPDATE tbl_parent  set appcode = '" . $appcode . "',status=1,payment_status=1 where par_seq_no='" . $par . "'");

//    $child_appcodes = implode(',', $child_appcodes);

    $sub = "Login Details";
    $from = "noreply@itracked.com";
    // Create email headers
// To send HTML mail, the Content-type header must be set
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    $tr = "";
    for ($i = 0; $i < count($chiled); $i++) {
        $tr .="<tr>
    <td width=\"70\" style=\"font-weight:bold; padding:3px;\">Name :</td>
    <td>" . $chiled[$i] . "</td>
    <td width=\"90\" style=\"font-weight:bold; padding:3px;\">Appcode :</td>
    <td>" . $child_appcodes[$i] . "</td>
  </tr>";
    }
    $message_child = "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td colspan=\"4\" style=\"font-weight:bold; padding:3px;\">Childrens :</td>
  </tr>"
            . $tr .
            "</table>";

    $message_content1 = "<html><head><title></title></head>

<body><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"margin:0 auto; color:#666; font-family:Arial, Helvetica, sans-serif\">
  <tr>
    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
  <tr>
    <td width=\"65\" style=\" font-weight:bold; padding:3px;\">Name</td>
    <td width=\"20\">:</td>
    <td>"
            . $parent_name .
            "</td>
  </tr>
  <tr>
    <td style=\" font-weight:bold; padding:3px;\">Email</td>
    <td>:</td>
    <td>" . $email . "</td>
  </tr>
  <tr>
    <td style=\" font-weight:bold; padding:3px;\">Appcode</td>
    <td>:</td>
    <td>" . $appcode . "</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>"
            . $message_child .
            "</td>
  </tr>
</table></body></html>";

//    $message_content1 = "Your username is " . $email . " Your appcode is " . $appcode .
//            " Childrens " . $chiled . " " . $child_appcodes;

    if (mail($email, $sub, $message_content1, $headers)) {
        echo "Thank You.We will get back to you soon...";
    }

//    print_r($_REQUEST);
//    echo $_GET['token'];
//    die();
} else {
    echo "Oops, something went wrong.";
    exit();
}
session_destroy();
header('location: payment-successful.php');
//echo "Registered successfully";
exit;

