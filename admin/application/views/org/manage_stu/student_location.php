<?php
//t($details);
//exit;
echo $header; ?>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->

<!-- END SIDEBAR -->

<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">

    <?php echo $leftmenu; ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Organization Admin Dashboard</a>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->

            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!--<div class="organization_form">-->
                    <h3 class="page-title">Student Location
                    </h3>
                    <?php if ($this->session->flashdata('suc_message')) { ?>
                        <div class="row-fluid">
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <span class="alert-link"><?php echo $this->session->flashdata('suc_message'); ?></span>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('err_message')) { ?>
                        <div class="row-fluid">
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <span class="alert-link"> <?php echo $this->session->flashdata('err_message'); ?></span>
                            </div> 
                        </div>
                    <?php } ?>
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <!--<div class="portlet box purple ">-->
                    <!--<div class="portlet-title">-->
                    <!--<div class="caption">
                        <i class="fa fa-gift"></i></div>
                    <div class="tools">
                        <a href="" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="" class="reload"> </a>
                        <a href="" class="remove"> </a>
                    </div>-->
                    <!--</div>-->
                    <div class="portlet-body form">
                        <div id="map" style="width: 1020px; height: 600px;"></div>
                    </div>
                    <!--</div>-->

                    <!--</div>-->
                    <!-- END SAMPLE FORM PORTLET-->
                </div>

            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>
</div>

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php echo $footer; ?>

<!-- END FOOTER -->
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>-->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2zzev-lOQRcsJG8FlFQfHs3I0y9pCx8A">
</script>
<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2zzev-lOQRcsJG8FlFQfHs3I0y9pCx8A" type="text/javascript"></script>-->
<script type="text/javascript">
    $(document).ready(function (e) {
        var locations = [
    <?php 
//      t($details);
//      echo $stu_id;
      foreach ($details as $k => $v) { 
    ?>
                ['<?php echo $v['fname'] ?>', '<?php echo $v['lname'] ?>', '<?php echo $v['lat']; ?>', '<?php echo $v['long']; ?>', '<?php echo $v['age_on_return_to_uk'] ?>', '<?php echo $v['email']; ?>', '<?php echo $v['mobile']; ?>', '<?php echo $v['event_name']; ?>', '<?php echo $v['instructor_first_name']; ?>', '<?php echo $v['instructor_last_name']; ?>', '<?php echo $v['id']; ?>', '<?php echo $v['type']; ?>'],
<?php } ?>
        ];
//        alert(locations);
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: new google.maps.LatLng(<?php
if($details[0]['lat']){ echo $details[0]['lat']; } else{    echo '51.5085300'; };
?>, <?php
if($details[0]['long']){ echo $details[0]['long']; } else{    echo '-0.1257400'; };
?>),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i, j;
        var myMarkers = new Array();
        var infowindow_text_array = new Array();
        var stu_id = "<?php echo $stu_id; ?>";

        for (i = 0; i < locations.length; i++) {

            var latitude =  locations[i][2];
            var longitude = locations[i][3];
            var instructor = '';
            var icon = '';
            var infowindow_text = '';
            var infowindow_text1 = '';
            var type = '';
            type = locations[i][11];

//            alert(type);

            if (type == 's') {
                infowindow_text = "<div>Name:" + locations[i][0] + " " + locations[i][1] + "</div><div>Email:" + locations[i][5] + "</div><div>Mobile:" + locations[i][6] + "</div><div>Age:" + locations[i][4] + "</div><div>Event:" + locations[i][7] + "</div><div>Instructor:" + locations[i][8] + " " + locations[i][9] + "</div>";
                infowindow_text_array[i] = infowindow_text;
            } else {
                var icon = '<?php echo $instructor_image; ?>';
                infowindow_text1 = "<div>Name:" + locations[i][0] + " " + locations[i][1] + "</div><div>Email:" + locations[i][5] + "</div></div><div>Phone:" + locations[i][6] + "</div>";
                infowindow_text_array[i] = infowindow_text1;
            }
//            alert(infowindow_text);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][2], locations[i][3]),
                map: map,
                icon: icon
            });
            myMarkers[i] = marker;
            //    if (locations[i][10] == stu_id) {
//    infowindow.setContent("<div>Name:" + locations[i][0] + " " + locations[i][1] + "</div><div>Email:" + locations[i][5] + "</div><div>Age:" + locations[i][2] + "</div><div>Event:" + locations[i][7] + "</div><div>" + instructor + "</div>");
//            infowindow.open(map, marker);
//    } else{
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(infowindow_text_array[i]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
//    }

            google.maps.event.addListener(map, 'zoom_changed', function () {
                //var mapZoom = map.getZoom();
                var mapCenterZoom = map.getCenter();
            });
        }

//        alert(infowindow_text_array);

        setInterval(function () {
            var stu_id = "<?php echo $stu_id; ?>";
            $.ajax({
                type: "POST",
                url: BASE_URL + "managestu/panicStudentLocation1/" + stu_id,
                data: {},
                success: function (locations) {
//                    console.clear();
//                    alert(locations);
                    var locations = jQuery.parseJSON(locations);
                    for (i = 0; i < locations.length; i++) {

                        position = new google.maps.LatLng(locations[i]['lat'], locations[i]['long']);
                        myMarkers[i].setPosition(position);
                        
                        var type= locations[i]['type'];
                        if (type == 's') {
                            infowindow_text = "<div>Name:" + locations[i]['fname'] + " " + locations[i]['lname'] + "</div><div>Email:" + locations[i]['email'] + "</div><div>Age:" + locations[i]['age_on_return_to_uk'] + "</div><div>Event:" + locations[i]['event_name'] + "</div><div>Instructor:" + locations[i]['instructor_first_name'] + " " + locations[i]['instructor_last_name'] + "</div>";
                            infowindow_text_array[i] = infowindow_text;
                        } else {
                            var icon = '<?php echo $instructor_image; ?>';
                            infowindow_text1 = "<div>Name:" + locations[i]['fname'] + " " + locations[i]['lname'] + "</div><div>Email:" + locations[i]['email'] + "</div></div><div>Phone:" + locations[i]['mobile'] + "</div>";
                            infowindow_text_array[i] = infowindow_text1;
                        }

                        google.maps.event.addListener(marker, 'click', (function (marker, i) {
                            return function () {
                                infowindow.setContent( infowindow_text_array[i]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));

                    }
                }
            });
        }, 5000);
    });
</script>
