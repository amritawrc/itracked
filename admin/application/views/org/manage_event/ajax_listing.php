<?php //   t($student_details_for_an_event); exit; ?>
<table class="table table-striped table-bordered table-hover table-responsive" id="sample_9">
	<thead>
		<tr class="">
			<th> SL# </th>
			<th> Student Name </th>
			<th> Phone </th>
			<th> Event Name </th>
			<th> Image </th>
<!--			<th> No. Of Contacts </th>
			<th> Actions </th>-->
		</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($student_details_for_an_event as $key => $value) { 
//            t($value); exit;?>
		<tr>
			<td> <?php echo ++$i; ?> </td>	
                        <td> <?php echo $value['fname'] . ' ' . $value['lname']; ?> </td>
			<td> <?php echo $value['phone']; ?> </td>
			<td> <?php echo $value['event_name']; ?> </td>
                        <td> <img src = "<?php if(isset($value['image']) && $value['image']!=''){ 
                            echo base_url() . 'assets/upload/student_image/'. $value['image'];
                            
                        } else {
                            echo 'Image not available';
                        } ?>" height="80px" width="80px"> </td>
		</tr> 
	<?php } ?>
	</tbody>
</table>