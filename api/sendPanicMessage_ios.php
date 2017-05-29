<?php

require_once('db.conf.php');

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';

$status = (isset($_POST['status'])) ? $_POST['status'] : '';

$message = (isset($_POST['message'])) ? $_POST['message'] : '';

$image = (isset($_POST['panic_image'])) ? $_POST['panic_image'] : '';



if ($message) {

//    echo $student_id;exit;

    

    $sql="UPDATE `tbl_ins_stu_map` SET  `panic`=1,`seen`=0,`panic_status`='$status',`message`='$message' WHERE `stu_id`=$student_id";

    $res = mysqli_query($con, $sql);

  

//    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";

//    exit;

    

    if ($res) {

        $a['code'] = "100";

        $a['msg'] = "Message send successfully ";

        $a['student_id'] = $student_id;

        echo json_encode($a);

    } else {

        $a['code'] = "300";

        $a['msg'] = "Message not send";

        echo json_encode($a);

    }

}



if ($image) {

   $profile_upload_to = $_SERVER['DOCUMENT_ROOT'] . '/admin/assets/upload/student_panic_image/';
  // $profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/student_panic_image/';



    $abc = time() . '_' . rand(0,9999999).".png";

     $pic_name = $profile_upload_to . $abc;



    if ($image != '' && isset($image)) {

        # code...
        $data = base64_decode($image);
        file_put_contents($pic_name, $data);
        
            $res0 = mysqli_query($con, "UPDATE `tbl_ins_stu_map` SET  panic=1,seen=0,panic_status='$status', image = '" . $abc . "' WHERE `stu_id` = '" . $student_id . "'");

//            $user_mli = mysqli_insert_id($con);



            if ($res0) {

                $a['code'] = "100";

                $a['msg'] = "Image upload successfully ";

                $a['student_id'] = $student_id;

                echo json_encode($a);

            }

        

    } else {

        $a['code'] = "300";

        $a['msg'] = "Please select a image";

        echo json_encode($a);

    }

}