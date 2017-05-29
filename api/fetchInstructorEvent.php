<?php

require_once('db.conf.php');

$instructor_id = (isset($_POST['instructor_id'])) ? $_POST['instructor_id'] : '';

$res = $res1 = mysqli_query($con, "select distinct ev_seq_no from tbl_event where ins_id=$instructor_id");
$mnr = mysqli_num_rows($res1);

        $row = array();
	while ($row1 = mysqli_fetch_assoc($res)) {
            $res1 = mysqli_query($con, "SELECT * FROM `tbl_event` WHERE ev_seq_no='".$row1['ev_seq_no']."' ");
            $row3=array();
            while ($row2 = mysqli_fetch_assoc($res1)) {
                   $row3[]=$row2;
                }
                if(count($row3)>0){
                    $row1['events'] = $row3;
                }else{
                    $row1['events'] = '';
                }
		$row[] = $row1;
	}

if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "Instructor events feched successfully";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "No Instructor event present";
    echo json_encode($a);
}
?>
