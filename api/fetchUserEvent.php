<?php

require_once('db.conf.php');

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';

$res = $res1 = mysqli_query($con, "select tbl_event.*,tbl_ins_stu_map.ev_id,tbl_ins_stu_map.stu_id from tbl_event inner join tbl_ins_stu_map on tbl_ins_stu_map.ev_id=tbl_event.ev_seq_no  where tbl_ins_stu_map.stu_id=$student_id");
$mnr = mysqli_num_rows($res1);
$row = mysqli_fetch_assoc($res);

//      $row = array();
//	while ($row1 = mysqli_fetch_assoc($res)) {
//            $res1 = mysqli_query($con, "SELECT * FROM `tbl_event` WHERE ev_seq_no='".$row1['ev_id']."' ");
//            $row3=array();
//            while ($row2 = mysqli_fetch_assoc($res1)) {
//                   $row3[]=$row2;
//                }
//                if(count($row3)>0){
//                    $row1['events'] = $row3;
//                }else{
//                    $row1['events'] = '';
//                }
//		$row[] = $row1;
//	}

if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "User events feched successfully";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "No user event present";
    echo json_encode($a);
}
?>
