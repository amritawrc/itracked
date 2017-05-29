<?php

require_once('db.conf.php');

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';
$lat = (isset($_POST['lat'])) ? $_POST['lat'] : '';
$long = (isset($_POST['long'])) ? $_POST['long'] : '';

$res0 = mysqli_query($con, "update `tbl_ins_stu_map` set `seen` = '" . 0 . "',`panic` = '" . 1 . "',`lat` = '" . $lat . "',`long` = '" . $long . "' WHERE `stu_id` = '" . $student_id . "' AND `status`= 1 ");
$user_mli = mysqli_insert_id($con);

if ($res0) {
    
//            $admin_id_longpolling = $this->session->userdata('admin_id');
//            $homepage = file_get_contents($this->data['js_path'] . 'longpolling_' . $admin_id_longpolling . '.txt');
//            $abs_path = dirname(__FILE__) . '/../../assets/js/';
//            $path = $abs_path . 'longpolling_' . $admin_id_longpolling . '.txt';
//            $stringData = "rackgroup_model=" . date('Y/m/d H:i:s', time()) . "\r\n";
//            if (strlen($homepage) > 0) {
//                $return = preg_match("/rackgroup_model=[0-9\/\s:]+/i", $homepage);
//                if ($return == 0) {
//                    $homepage = $stringData . $homepage;
//                } else {
//                    $homepage = preg_replace("/rackgroup_model=[0-9\/\s:]+/i", $stringData, $homepage);
//                }
//                file_put_contents($path, $homepage);
//            } else {
//                file_put_contents($path, $stringData);
//            }
    
    
    $a['code'] = "100";
    $a['msg'] = "Panic send successfully";
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Location not updated  ";
    echo json_encode($a);
}
?>