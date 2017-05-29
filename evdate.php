<?php
          require_once('db.conf.php');          
      $event_id = (isset($_POST['event_id'])) ? $_POST['event_id'] : '';
        
         $query1 = "SELECT * FROM `tbl_event` where ev_seq_no = $event_id";
         $result1 =  mysqli_query($con,$query1);
         
         //$opt = '<option value="">Enter Group</option>';
          $data = mysqli_fetch_array($result1);               
                $start = $data['start_date'];
                $end = $data['end_date'];
       
       $days = (strtotime($end) - strtotime($start)) / (60 * 60 * 24);
       // echo $days;
        
        if($days==1)
            $r= $days*1;
        else if($days>=3 && $days<=5)
            $r= $days*4;
        else if($days>=6 && $days<=8)
            $r= $days*5;
        else if($days>8 && $days<=30)
            $r= $days*12;
        else if($days== 365 || $days== 366)
            $r= $days*97;
        
       //$opt='<input type="text" name="price" id="price" placeholder="" readonly required value="'.$r.'"/>' ;    
       echo $r; 
   
?>