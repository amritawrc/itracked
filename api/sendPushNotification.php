<?php
    //Sending Push Notification

//$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';
//
//$res = $res1 = mysqli_query($con, "select * from tbl_student where stu_seq_no = '" . $student_id . "'");
//$mnr = mysqli_num_rows($res1);
//$row = mysqli_fetch_assoc($res);

    $registatoin_ids = 'APA91bH_lZ4z_rhkGczDVmoKXAWB_7ko0B9st8NF5i2zZ71tJ-LQUcjCiv2ym6wjdzCHlEAShIY4BTuF4k9-xUJ7C9zSXl8vbW6-Xx1Qdhgbf_mvm1LoRPg';
    $message = 'This is test message!';

//        $registatoin_ids = array($registatoin_ids);
//      echo  $registatoin_ids = json_encode($registatoin_ids);
        $message = array(
            "title" => 'Itracked',
            "body" => $message
                );

        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $fields = array(
             'notification' => $message,
             'to' =>$registatoin_ids
        );
//        echo json_encode($fields);
//        echo '<pre>'; 
        
//        print_r($fields);exit;
        
        $headers = array(
            'Authorization: key=' . 'AIzaSyA6_3nhhGiPaIafLjbZVpgumFBIrwLzugY',
            'Content-Type: application/json'
        );
        //print_r($headers);
        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        echo '<pre>';
        print_r($result);
        exit;
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
//        echo $result;exit;
        return $result;