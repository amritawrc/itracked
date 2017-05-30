
<style>
.email_area{ margin:0 auto; display: block; width: 730px; border: 1px groove #777}	
.invoice_area{ width:100%; display: block;}	
.invoice_area table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 0px;
}

.invoice_area table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

.invoice_area table th,
.invoice_area table td {
  text-align: center;
}

.invoice_area table th {
  padding: 17px 7px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
	text-align: left;
}

.invoice_area table .service,
.invoice_area table .desc {
  text-align: left;
}

.invoice_area table td {
  padding:17px 7px;
  text-align: left;
	font-size: 14px
}

.invoice_area table td.service,
.invoice_area table td.desc {
  vertical-align: top;
}

.invoice_area table td.unit,
.invoice_area table td.qty,
.invoice_area table td.total {
 font-size: 14px
}
	
.invoice_area table td.qty,
.invoice_area table td.total {
 font-size: 14px;
 width: 150px;
}

.invoice_area table td.grand {
  border-top: 1px solid #5D6975;;
}

</style>

<div class="email_area">

<table width="730" cellpadding="0" cellspacing="0" align="center" style=" margin-top: 0px; background: #fff; font-family:Helvetica, Arial, 'sans-serif'">
	<tr>
		<td style=" width: 300px; background: #777; padding: 5px; text-align: center; font-size: 25px; color:#fff">INVOICE</td>
		
		<td style=" width: 430px; text-align: right; padding-right: 15px; padding-top: 5px">
			<img style=" width: auto; height: 50px;"  src="http://itrackedltd.com/admin/assets/pages/img/itracked_logo.png" alt="iTracked ">
		</td>
	</tr>
	
	<tr>
		<td width="400">
			<table width="100%" style=" margin-top: 20px; margin-bottom: 20px; padding-left:10px; line-height: 25px; font-size: 14px">
				<tr>
					<td><span style = "width: 100%; padding:10px 0; font-size:25px; text-align: center; display:inline-block; font-weight:800">
                            <font style=" font-size:20px; font-weight:100">Organisation:</font> <?php echo $org_name; ?>
                        </span></td>
				</tr>
				<tr>
					<td><?php echo $house_name_number;?></td>
				</tr>
				<tr>
					<td><?php echo $street_name; ?></td>
				</tr>
				
				<tr>
					<td><?php echo $postal; ?></td>
				</tr>
			</table>
			
		</td>
<?php

    ?>		
		<td width="320">
			<table width="100%" style="text-align: left; margin-top: 20px; padding-right:10px; margin-bottom: 20px; line-height: 25px; font-size: 14px" >
				<tr>
					<td>
					<span style="width: 150px; display: inline-block; margin-right:6px; text-align: right">Invoice number:</span>
					<strong></strong><?php echo $invoice_number; ?></strong>
					</td>
				</tr>
				<tr>
					<td>
					    <span style="width: 150px; display: inline-block; margin-right:6px; text-align: right">Invoice date:</span> 
					    <strong><?php echo  date('d M Y'); ?></strong>
					</td>
				</tr>
				<tr>
					<td><span style="width: 150px; display: inline-block;margin-right:6px; text-align: right">Organisation ref:</span> <strong>ponteski010284753</strong></td>
				</tr>
				<tr>
					<td style=" text-align: center">Week Start Day: <strong>MONDAY <?php echo  ',' . date('d M Y', strtotime('next monday'));?></strong>
					</td>
				</tr>
				<tr>
				    <?php if($currency == 'USD'){?>
					<td><span style="width: 150px; display: inline-block; margin-right:6px; text-align: right">EXCHANGE RATE:</span>
					<span style="width: 50px; text-align: center; display: inline-block">&#163; 1=</span>
					<span style="width: auto; padding: 0 5px; display: inline-block; font-weight: 800">&#36;<?php echo $usd_exchange_rate; ?></span>
					</td>
					<?php } else if($currency == 'EUR'){?>
					<td><span style="width: 150px; display: inline-block; margin-right:6px; text-align: right">EXCHANGE RATE:</span>
					<span style="width: 50px; text-align: center; display: inline-block">&#163; 1=</span>
					<span style="width: auto; padding: 0 5px; display: inline-block; font-weight: 800">&#8364;<?php echo $euro_exchange_rate; ?></span>
					</td>
					<?php } else if($currency == 'GBP') {?>
					<td><span style="width: 150px; display: inline-block; margin-right:6px; text-align: right">EXCHANGE RATE:</span>
					<span style="width: 50px; text-align: center; display: inline-block">&#163; 1=</span>
					<span style="width: auto; padding: 0 5px; display: inline-block; font-weight: 800">&#163;1</span>
					</td>
					<?php } ?>
				</tr>
			</table>
			
		</td>
		
	</tr>
	
	<tr>
		<td colspan="2" style=" width: 100%; background: #777; padding: 20px 5px; text-align: center; font-size: 18px; color:#fff">
			PAYMENT WILL BE TAKEN FROM YOUR ACCOUNT WITHIN 7 WORKING DAYS
			
		</td>
		
	</tr>
	<?php 

	$sub_total = $duration*$no_of_student_in_an_event*$one_day_user;
    $tax = 0.2*$sub_total;
    $grand_total = $sub_total+$tax;
	?>
	<tr>
		<td colspan="2">
			<div class="invoice_area">
			<table>
        <thead>
          <tr>
            <th class="service">Event</th>
            <th class="service">No. of Students</th>
            <th class="desc">Tariff - per day/week (in &#163;)</th>
            <th>Duration</th>
            <th>Total</th>

          </tr>
        </thead>
        <tbody>
            <?php foreach($all_events_invoiced as $key => $value){ ?>
          <tr>
            <td class="service">
            <span style="width: 80px"><?php echo $value['event_id']; ?></span>
            </td>
            <td class="service">
            <span style="width: 80px"><?php echo $value['no_of_students']; ?></span>
            </td>
            <td class="desc"><span>&#163; <?php echo $value['tariff']; ?></span></td>
            <td class="unit"><span><?php echo $value['duration']; ?> Days</span></td>
            <td class="qty">&#163; <?php echo $sub_total; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      		</div>
		</td>
	</tr>
	
	<tr>
	
	<td colspan="2">
		<table width="100%">
			<tr>
			<td width="300"></td>
		
		<td width="430">
			<table width="100%" cellpadding="0" cellspacing="0" style=" background: #777; color:#fff; padding: 10px 5px; font-size: 14px; line-height: 40px">
				<tr>
					<td width="50%" style="border-bottom: 1px solid #F5F5F5">PRE VAT</td>
					<td width="50%" style="text-align: center; border-bottom: 1px solid #F5F5F5">£<?php echo $sub_total; ?></td>
				</tr>
				
				<tr>
					<td width="50%" style="border-bottom: 1px solid #F5F5F5">VAT @ 20%</td>
					<td width="50%" style="text-align: center; border-bottom: 1px solid #F5F5F5">£<?php echo $tax; ?></td>
				</tr>
				
				<tr>
					<td width="50%" style="border-bottom: 1px solid #F5F5F5">TOTAL</td>
					<td width="50%" style="text-align: center; border-bottom: 1px solid #F5F5F5">£<?php echo $grand_total; ?></td>
				</tr>
				
				<tr>
					<td width="50%" style="border-bottom: 1px solid #F5F5F5">CURRENCY RATE</td>
					<td width="50%" style="text-align: center; border-bottom: 1px solid #F5F5F5">1.50</td>
				</tr>
				<tr>
					<td width="50%">CURRENCY RATE<span style="width: 55px; float: right">£ € $</span></td>
					<td width="50%" style="text-align: center;">6876</td>
				</tr>
				
			</table>
			
		</td>
				
			</tr>
			
		</table>
	</td>
	

		
	</tr>
	
	<tr>
		<td colspan="2" style=" width: 100%; background: #777; padding: 20px 5px; text-align: center; font-size: 18px; color:#fff">
			<span style=" width: 100%; display: inline-block; text-align: center; font-size: 12px">iTracked Limited register office: 1 Freeman Close, Hopton-on-Sea, Norfolk NR31 9UX </span>
			<span style=" width: 100%; display: inline-block; text-align: center; font-size: 12px">Company registration number: 09888091</span>
			<span style=" width: 100%; display: inline-block; text-align: center; font-size: 12px">VAT number: 252 6171 19</span>
			
		</td>
		
	</tr>
	
</table>

</div>
