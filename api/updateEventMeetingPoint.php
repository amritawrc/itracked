<?php

require_once('db.conf.php');

$event_id = (isset($_POST['event_id'])) ? $_POST['event_id'] : '';
$meeting_point = (isset($_POST['meeting_point'])) ? $_POST['meeting_point'] : '';

$res0 = mysqli_query($con, "update `tbl_event` set `start_meeting_point` = '" . $meeting_point . "' WHERE `ev_seq_no` = '" . $event_id . "' ");

if ($res0) {
    $a['code'] = "100";
    $a['msg'] = "Location updated successfully ";
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Location not updated  ";
    echo json_encode($a);
}
?>