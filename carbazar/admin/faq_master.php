
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	 <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" /> 
 <link rel="stylesheet" href="assets/plugins/social-buttons/social-buttons.css" />

</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index2.php" class="navbar-brand">
                    <img src="assets/img/logo.png" alt="" /></a>
                </header>
                <!-- END LOGO SECTION -->
				
                <ul class="nav navbar-top-links navbar-right">

					<a href="logout.php"><i class="icon-signout"></i> Logout </a>
                    
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
		<?php
		include("image_view.php");
		?>
       <div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="index2.php">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo $myimg ; ?>" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> 
					<?php 
								echo $_SESSION['admin_id'];
					?>
					</h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                
                <li class="panel">
                    <a href="index2.php" >
                        <i class="icon-table"></i> 
						<?php 
							echo $_SESSION['admin_id']." Profile";
						?>
                       
                    </a>                   
                </li>



                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-tasks"> </i> My List     
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-default">8</span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav">
                       
                        <li class=""><a href="admin_view.php"><i class="icon-angle-right"></i> Admin Information Table </a></li>
                        <li class=""><a href="brand_view.php"><i class="icon-angle-right"></i> Brands In India </a></li>
                        <li class=""><a href="car_model_view.php"><i class="icon-angle-right"></i> Models List </a></li>
                        <li class=""><a href="version_view.php"><i class="icon-angle-right"></i> Version Info </a></li>
						<li class=""><a href="upcoming_view.php"><i class="icon-angle-right"></i> Upcoming Car Info </a></li>
                          <li class=""><a href="view_car.php"><i class="icon-angle-right"></i> Car Information </a></li>
                       <li class=""><a href="view_road_side_assistance.php"><i class="icon-angle-right"></i> Road Side Assistance </a></li>
					   <li class=""><a href="view_on_road.php"><i class="icon-angle-right"></i> View On Road Price Info </a></li>
					   <li class=""><a href="view_showroominfo.php"><i class="icon-angle-right"></i> View Dealers Information</a></li>
					   <li class=""><a href="view_photos.php"><i class="icon-angle-right"></i> Display Photos </a></li>
       
                    </ul>
                </li>
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#form-nav">
                        <i class="icon-pencil"></i> Add Data
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-success">6</span>&nbsp;
                    </a>
                    <ul class="collapse" id="form-nav">
                        <li class=""><a href="forms_general.php"><i class="icon-angle-right"></i> Add Brand </a></li>
                        <li class=""><a href="forms_advance.php"><i class="icon-angle-right"></i> Add Model </a></li>
                        <li class=""><a href="forms_validation.php"><i class="icon-angle-right"></i> Add Version </a></li>
						<li class=""><a href="upcoming_car.php"><i class="icon-angle-right"></i> Add Upcoming </a></li>
                        <li class=""><a href="photo_add.php"><i class="icon-angle-right"></i> Add Photos For Model</a></li>
						<li class=""><a href="showroominfo.php"><i class="icon-angle-right"></i> Add Dealers Information</a></li>
						<li class=""><a href="on_road.php"><i class="icon-angle-right"></i> On Road Price Of Car</a></li>
                         <li class=""><a href="road_side_assistance.php"><i class="icon-angle-right"></i> Road Side Assistance</a></li>
                    </ul>
                </li>

                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <i class="icon-table"></i> Add Version Info
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-info">10</span>&nbsp;
                    </a>
                    <ul class="collapse" id="pagesr-nav">
                       
                        <li class=""><a href="car_engine_transmission.php"><i class="icon-angle-right"></i> Engine And Transmission </a></li>
						<li class=""><a href="car_suspension_steering_brake.php"><i class="icon-angle-right"></i>  Suspension, Steering And Break System </a></li>
						<li class=""><a href="car_performance_fuel_tyres.php"><i class="icon-angle-right"></i> Performance, Fuel And Tyres</a></li>
						<li class=""><a href="car_other_general.php"><i class="icon-angle-right"></i> General Car And Other </a></li>
						<li class=""><a href="car_comfort_convenience.php"><i class="icon-angle-right"></i> Comfort and Convenience </a></li>
						<li class=""><a href="car_interior.php"><i class="icon-angle-right"></i> Interior </a></li>
						<li class=""><a href="car_exterior.php"><i class="icon-angle-right"></i> Exterior </a></li>
						<li class=""><a href="car_entertainment.php"><i class="icon-angle-right"></i> Entertainment </a></li>
						<li class=""><a href="car_exterior_d.php"><i class="icon-angle-right"></i> Exterior Dimensions </a></li>
						<li class=""><a href="car_safety.php"><i class="icon-angle-right"></i> Safety </a></li>
                    </ul>
                </li>
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav">
                        <i class="icon-bar-chart"></i> User Side Info
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-danger">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="chart-nav">



                        <li><a href="user_info.php"><i class="icon-angle-right"></i> User Information </a></li>
                        <li><a href="used_car_info.php"><i class="icon-angle-right"></i> Used Car Information</a></li>
                    </ul>
                </li>

                
                <li class="panel  active">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#DDL-nav">
                        <i class=" icon-sitemap"></i> FAQ's And Feedbacks
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="in" id="DDL-nav">
                        
                        <li><a href="add_faq.php"><i class="icon-angle-right"></i> Add FAQ's </a></li>
                        <li><a href="view_faq.php"><i class="icon-angle-right"></i> View FAQ's </a></li>
						<li><a href="view_feedback.php"><i class="icon-angle-right"></i> View Feedbacks </a></li>
                    </ul>
                </li>


                <li><a href="gallery.php"><i class="icon-film"></i> Image Gallery </a></li>
               
               
                <li><a href="logout.php"><i class="icon-signin"></i> Logout </a></li>

            </ul>

        </div>
        <!--END MENU SECTION -->

         <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">