<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
      
      <div class="container">
    <header class="clearfix">
      <div id="logo">
        <img src="http://itrackedltd.com/admin/assets/pages/img/itracked_logo.png" alt="logo" class="logo-default">
      </div>
      
      <h1>INVOICE 3-2-1</h1>

     
    </header>
    <?php //t($single_user_array); exit; ?>
   <?php foreach($all_event_in_an_org as $key => $value) {?> 
    <main>
        <div id="company" class="clearfix">
        <div><span>DATE</span> <?php echo date("d-m-Y");?> </div>
      <!--  <div>455 Foggy Heights,<br /> AZ 85004, US</div>-->
      <!--  <div>(602) 519-0450</div>-->
      <!--  <div><a href="mailto:company@example.com">company@example.com</a></div>-->
      </div>
     
      <div id="project">
        <div><span>Event</span> <?php echo $value['event_name'];?></div>
        <div><span>Organisation</span> <?php echo $value['org_name'];?> </div>
        <div><span>ADDRESS</span> <?php echo $value['house_name_number'] . ',' .  ' ' . $value['street_name'] ;?></div>
        <div><span>EMAIL</span> <?php echo $value['username'];?> </div>
        <div><span>DATE</span> <?php //echo date("d-m-Y");?> </div>
        
      </div>
      <table>
        <thead>
            
          <tr>
            <th class="service">EVENT</th>
            <th class="desc">DURATION</th>
            <th>UNIT PRICE</th>
            <th>NO.OF STUDENTS</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
 <?php 
    $sub_total = $duration*$no_of_student_in_an_event*$one_day_user;
    $tax = 0.2*$sub_total;
    $grand_total = $sub_total+$tax;
    
 ?>
          <tr>
            <td class="service"><?php echo $value['event_name'];?></td>
            <td class="desc"><?php echo $duration;?> Days</td>
            <td class="unit"><?php echo $one_day_user;?></td>
            <td class="qty"><?php echo $no_of_student_in_an_event;?></td>
            <td class="total"><?php echo $sub_total;?></td>
          </tr>

          <!--<tr>-->
          <!--  <td class="service">Development</td>-->
          <!--  <td class="desc">Developing a Content Management System-based Website</td>-->
          <!--  <td class="unit">$40.00</td>-->
          <!--  <td class="qty">80</td>-->
          <!--  <td class="total">$3,200.00</td>-->
          <!--</tr>-->
          <!--<tr>-->
          <!--  <td class="service">SEO</td>-->
          <!--  <td class="desc">Optimize the site for search engines (SEO)</td>-->
          <!--  <td class="unit">$40.00</td>-->
          <!--  <td class="qty">20</td>-->
          <!--  <td class="total">$800.00</td>-->
          <!--</tr>-->
          <!--<tr>-->
          <!--  <td class="service">Training</td>-->
          <!--  <td class="desc">Initial training sessions for staff responsible for uploading web content</td>-->
          <!--  <td class="unit">$40.00</td>-->
          <!--  <td class="qty">4</td>-->
          <!--  <td class="total">$160.00</td>-->
          <!--</tr>-->
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total"><?php echo $sub_total;?></td>
          </tr>
          <tr>
            <td colspan="4">TAX 20%</td>
            <td class="total"><?php echo $tax;?></td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total"><?php echo $grand_total;?></td>
          </tr>
          
          <tr>
              
              <td colspan="5" style=" background:transparent;">
                  <a href="" onclick="print_invoice()" id="print" style=" background:#E9320B; color:#fff; font-size:18px; margin-right:10px; border-radius: 5px; padding:5px 20px; text-decoration: none;">Print</a>
   
                  
              </td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div></div>
        <div class="notice"></div>
      </div>
    </main>
    <?php } ?>
    
    </div>
    <script>
        function print_invoice(){
            //$('#print').hide();
            window.print();
            
        }
    </script>
  
  <style>
  
  body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}
  
  .container{ margin:50px auto 0 auto; width:650px;}
      #logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: auto;
height: 55px;

}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}
  </style>
  
  
  
  </body>
</html>