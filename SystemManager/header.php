<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<style type="text/css"> 
    th
    {
        text-align:center;
        color:#FFF;
        border:1px solid #000000;
    }
    
    input:focus
    {
        background-color:#66CCFF;
    }
	
    a
    {
        cursor:pointer;
    }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Welcome To <?php echo $cname?></title>
    <link rel="icon" href="<?php echo $logo?>" width="5" height="7">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" type="text/css" href="dark-hive/jquery.ui.all.css">
    <!-- bootstrap 3.0.2 -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <!-- font Awesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" type="text/css" href="css/ionicons.min.css" />
    <!-- Morris chart 
    <link rel="stylesheet" type="text/css" href="css/morris/morris.css" />
    <!-- jvectormap 
    <link rel="stylesheet" type="text/css" href="css/jvectormap/jquery-jvectormap-1.2.2.css" />
    <!-- fullCalendar 
    <link rel="stylesheet" type="text/css" href="css/fullcalendar/fullcalendar.css" />
    <!-- Daterange picker 
    <link rel="stylesheet" type="text/css" href="css/daterangepicker/daterangepicker-bs3.css" />
    <!-- bootstrap wysihtml5 - text editor 
    <link rel="stylesheet" type="text/css" href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" />
    <!-- iCheck for checkboxes and radio inputs 
    <link rel="stylesheet" type="text/css" href="css/iCheck/all.css" />
    <!-- Bootstrap Color Picker 
    <link rel="stylesheet" type="text/css" href="css/colorpicker/bootstrap-colorpicker.min.css"/>
    <!-- Bootstrap time Picker 
    <link rel="stylesheet" type="text/css" href="css/timepicker/bootstrap-timepicker.min.css"/>
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/mystyle.css" />
    <!-- Chosen -->
    <link rel="stylesheet" type="text/css" href="css/chosen/chosen.css" />
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    
    <!-- jQuery 2.0.2 -->
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    
    <!-- jQuery UI 1.10.3
    <script src="js/jquery-ui-1.10.3.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
     -->
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
	<!-- Select2 -->
	<script src="plugins/select2/select2.full.min.js" type="text/javascript"></script>
    <!-- Sparkline 
    <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap 
    <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- fullCalendar 
    <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart 
    <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker 
    <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 
    <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck 
    <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!--Date Picker--> 
    <script type="text/javascript" src="js/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.datepicker.min.js"></script>      
    <!-- InputMask -->
    <script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- bootstrap color picker 
    <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker 
    <script src="js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="js/AdminLTE/app.js" type="text/javascript"></script>
    <!-- Chosen -->
    <script src="js/chosen/chosen.jquery.js" type="text/javascript"></script>
    <script src="js/MyJavaScript.js" type="text/javascript"></script>
</head>
<body class="skin-blue">
	<header class="header">
		<a href="index.php" class="logo"><?php echo $calias?></a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <!--<span class="sr-only">Toggle navigation</span>-->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right" id="data1">
				<ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope"></i> <span class="label label-success"><?php //echo $aaa;?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?php //echo $msgno;?> new messages</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                       <a href="msg.php?sl=<?php //echo $sl4[1]?>"></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="msgs.php ">See All Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-warning"></i>
                            <span class="label label-warning"><?php //=$aa;?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?php //=$aa1;?> notifications</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#"></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="notif.php">View all</a></li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span><?php //echo $user_nm;?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header bg-light-blue">
                                <p><?php //echo $user_nm;?> - <?php //echo $user_current_Rank;?></p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
	<style>
	.ui-datepicker
	{
	  font-family: Arial;
	  font-size: 13px;
	  z-index: 1003 !important;
	  display: none;
	}
	</style>