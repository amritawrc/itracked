<?php
session_start();
require_once('db.conf.php');

$query = "SELECT * FROM `tbl_plan` WHERE status=1 ";
$result = mysqli_query($con, $query);
//echo '<pre>';
//print_r($data);
//die();


include 'templates/header.php'
?>


<div class="pricing_area">
    <div class="container">
        <div class="row">
            <h3 style="font-size: 24px; color: #333; width:100%; text-align: center; font-family: 'open_sansbold'">iTracked Pricing</h3>
            <p style=" font-size:14px; width:100%; text-align:center">Following are the list of the pricing plans for using the app as a Parent. To download the app, please click on respective icons  and register as parent.</p>
        </div>


    </div>

</div>


<div class="main_containarea" style="min-height:400px">
	<div class="container">
        <div class="row">
        	<table class="table" style="width:70%" align="center">
    <thead>
      <tr>
      	<th>User</th>
        <th>1 Day</th>
        <th>7 Days</th>
        <th>9 Days</th>
        <th>30 Days</th>
        <th>365 Days</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Single User</td>
        <td> £1.00 </td>
        <td> £5.00 </td>
        <td> £7.00 </td>
        <td> £18.00 </td>
        <td> £197.00 </td>

      </tr>
      
      <tr>
        <td>2 User</td>
        <td> £2.00 </td>
        <td> £10.00 </td>
        <td> £14.00 </td>
        <td> £36.00 </td>
        <td> £394.00 </td>

      </tr>
      
      <tr>
        <td>3 User</td>
        <td> £3.00 </td>
        <td> £15.00 </td>
        <td> £21.00 </td>
        <td> £54.00 </td>
        <td> £591.00 </td>

      </tr>
      <tr>
        <td>4 User</td>
        <td> £4.00 </td>
        <td> £20.00 </td>
        <td> £28.00 </td>
        <td> £72.00 </td>
        <td> £788.00 </td>

      </tr>
      
      <tr>
        <td>5 User</td>
        <td> £5.00 </td>
        <td> £25.00 </td>
        <td> £35.00 </td>
        <td> £90.00 </td>
        <td> £985.00 </td>

      </tr>
      
      <tr>
        <td>6 User</td>
        <td> £6.00 </td>
        <td> £30.00 </td>
        <td> £42.00 </td>
        <td> £108.00 </td>
        <td> £1,182.00 </td>

      </tr>

    </tbody>
  </table>
        
        </div>
    </div>    
 </div>

<?php include 'templates/footer.php'; ?>
    <style>
        .panel{ margin-bottom: 35px; }
        .panel.price p.lead{ line-height:28px; margin-bottom:0px;}
        .panel.price p.lead span{ font-size:20px;}
        .panel.price p.lead strong{ font-size: 30px; }
        @media only screen and (max-width: 1199px) {
            .panel.price p.lead strong{ font-size: 25px; }
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.buy_now').on('click', function () {
                
                var id = $(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: 'setSession.php',
                    data: {
                        id: id
                    },
                    success: function (data) {
                        console.clear();
                        window.location.href = "http://itrackedltd.com/par_registration.php";
                    }
                })
            });
        });
    </script>
