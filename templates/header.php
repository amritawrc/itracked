<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>iTracked</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/lightbox.css" rel="stylesheet">
        <link href="css/multiple-select.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="header_area">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="row">

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="header_logo">
                                <div class="navbar-header">

                                    <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt=""></a>

                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">


                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav pull-right">
                                    <li>
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li>
                                        <a href="aboutus.php">About</a>
                                    </li>
                                    <li class = "dropdown">
                                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                                            PROGRAMS
                                            <b class = "caret"></b>
                                        </a>

                                        <ul class ="dropdown-menu">
                                            <li><a href = "organizer.php">Organizer/Venue/ School</a></li>
                                            <li class = "divider"></li>
                                            <li><a href = "instructor.php">Instructor/Guide/ Parent</a></li>
                                            <li class = "divider"></li>
                                            <li><a href = "student.php">Student/Child/ Trackee</a></li>
                                            <li class = "divider"></li>
                                            <li><a href = "administration.php">iTracked Administration</a></li>
                                        </ul>

                                    </li>
                                    <!--<li>
                                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                                            Services
                                            <b class = "caret"></b>
                                        </a>
                                        <ul class ="dropdown-menu">
                                            <li><a href="student_registration.php">Student Registration</a></li>
                                            <li class = "divider"></li>
                                            <li><a href="par_registration.php">Parent Registration</a></li>
                                            <li class = "divider"></li>
                                            <li><a href="org_registration.php">Organization</a></li>
                                        </ul>
                                    </li>-->
                                    <li>
                                        <a href="pricing.php">Pricing</a>
                                    </li>
                                    <li>
                                        <a href="contactus.php">Contact</a>
                                    </li>
                                </ul>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container -->
            </nav>

        </div>
        <style>
            label[attribute="dob_day"]{
                display: none !important;
            }
            label[attribute="chname"]{
                display: none !important;
            }
            label[attribute="chphno"]{
                display: none !important;
            }
/*            label.dob {
                display: none !important;
            }*/
            input[type=text].error,input[type=file].error, input[type=email].error, input[type=password].error, textarea.error, select.error,input[type=checkbox].error {
                border: 1px solid red !important;
            }
        </style>
