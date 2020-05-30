<?php
session_start();

if(!isset($_SESSION['admin_id'])){
	header("location:index.php");
}	
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Welcome <?php echo $_SESSION['admin_id'];?> </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/css/layout2.css" rel="stylesheet" />
       <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />
    <!-- END PAGE LEVEL  STYLES -->
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        

        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index2.php" class="navbar-brand">
                    <img src="assets/img/logo.png" alt="" />
                        
                        </a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                 
                    <!-- END ALERTS SECTION -->

                    <!--ADMIN SETTINGS SECTIONS -->


                                          
                         <a href="logout.php"><i class="icon-signout"></i> Logout </a>
                       
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
		<?php
		include("image_view.php");
		?>
       <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
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

                
                <li class="panel active">
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
                       &nbsp; <span class="label label-default">10</span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav">
                       
                       <li class=""><a href="admin_view.php"><i class="icon-angle-right"></i> Admin Information Table </a></li>
                        <li class=""><a href="brand_view.php"><i class="icon-angle-right"></i> Brands In India </a></li>
                        <li class=""><a href="car_model_view.php"><i class="icon-angle-right"></i> Models List </a></li>
                        <li class=""><a href="version_view.php"><i class="icon-angle-right"></i> Version Info </a></li>
                         <li class=""><a href="view_car.php"><i class="icon-angle-right"></i> Car Information </a></li>
                          <li class=""><a href="view_road_side_assistance.php"><i class="icon-angle-right"></i> Road Side Assistance </a></li>
						  <li class=""><a href="view_on_road.php"><i class="icon-angle-right"></i> View On Road Price Info </a></li>
						  <li class=""><a href="view_photos.php"><i class="icon-angle-right"></i> Display Photos </a></li>
                    </ul>
                </li>
                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                        <i class="icon-pencil"></i> Add Data
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-success">5</span>&nbsp;
                    </a>
                    <ul class="collapse" id="form-nav">
                     <li class=""><a href="forms_general.php"><i class="icon-angle-right"></i> Add Brand </a></li>
                        <li class=""><a href="forms_advance.php"><i class="icon-angle-right"></i> Add Model </a></li>
                        <li class=""><a href="forms_validation.php"><i class="icon-angle-right"></i> Add Version </a></li>
                        <li class=""><a href="photo_add.php"><i class="icon-angle-right"></i> Add Photos For Model</a></li>
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
                          &nbsp; <span class="label label-info">18</span>&nbsp;
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
                          &nbsp; <span class="label label-danger">4</span>&nbsp;
                    </a>
                    <ul class="collapse" id="chart-nav">



                        <li><a href="user_info.php"><i class="icon-angle-right"></i> User Information </a></li>
                        <li><a href="used_car_info.php"><i class="icon-angle-right"></i> Used Car Information</a></li>
                        
                    </ul>
                </li>

           
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#DDL-nav">
                        <i class=" icon-sitemap"></i> FAQ's And Feedbacks
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="DDL-nav">
                        
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

<?php
				$aid=$_GET['id1'];
				$errmsg['old']="";
				$errmsg['length']="";
				$errmsg['retype']="";
				
				if(isset($_POST['submit'])){
			
					$opass=$_POST['opass'];
					$npass=$_POST['npass'];
					$repass=$_POST['rpass'];
					
					
						include("connection.php");
					$sql="select * from login where id=$aid";
					
					$res=mysql_query($sql);
					
					if($res){					
					$row=mysql_fetch_array($res);
					}
					else
					{
						echo "Password Does Not Match..";
					}
					
					$pass=$row['password'];
					
					if($pass==md5($opass)){
						if(strlen($npass)<7){
							$errmsg['length']="Password Must Be More The 7 Character.";
						}
						else
						{
						if($npass==$repass){
							$npass1=md5($npass);
							$sql2="update login set password='$npass1' where id=$aid";
							$res2=mysql_query($sql2);
							if($res2){
								header("location:index2.php");
							}
							else
							{
								echo "Password Not Changed..";
							}
						}
						else
						{
							$errmsg['retype']="Password Does Not Match..";
						}
						}
					}
					else
					{
						$errmsg['old']="Old Password Does Not Match.";
					} 
					
				}
				?>


        <!--PAGE CONTENT -->
        <div id="content">
             
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> <?php echo $_SESSION['admin_id']." "; ?> Change Password </h2>
                    </div>
                </div>
                  <hr />

			  <br>
			  
			  <form action="#" method="post">
				
			  <table width="100%">
			  
					
					<tr>
					<td width="25%"><font size="4">Old Password :</font></td>
					<td width="35%">
					&nbsp;&nbsp;&nbsp;
					<div class="col-lg-10">
					<input type="password" class="form-control" name="opass" size="25" >
					</div>
					</td>
					<td width="30%">
					<?php
						if(isset($_POST['submit']))
						echo "<label>".$errmsg['old']."</label>";
						
					?>
					</td>
					</tr>
					
					<tr>
					<td><font size="4">Type New Password :</font></td>
					<td>
					&nbsp;&nbsp;&nbsp;
					<div class="col-lg-10">
					<input type="password" class="form-control" name="npass" size="25" >
					</div>
					</td>
					<td>
					<?php
						if(isset($_POST['submit']))
						echo "<label>".$errmsg['length']."</label>";
					?>
					</td>
					</tr>
					
					<tr>
					<td><font size="4">Re-Type New Password :</font></td>
					<td>
					&nbsp;&nbsp;&nbsp;
					<div class="col-lg-10">
					<input type="password" class="form-control" name="rpass" size="25" >
					</div>
					</td>
					<td>
					<?php
					if(isset($_POST['submit'])){
						echo "<label>".$errmsg['retype']."</label>";
						
						}
					?>
					</td>
					</tr>
					
					<tr>
					<td></td>
					<td><br>&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-primary" name="submit" value="Change Password">
					
					<a href='index2.php' class='btn btn-primary'>&nbsp;&nbsp;&nbsp;&nbsp;
					Cancel
					&nbsp;&nbsp;&nbsp;&nbsp;</a>
					</td>
					</tr>
			  </table>
        
				</form>
				

          
                
            </div>

        </div>
        <!--END PAGE CONTENT -->
<?php
				include("connection.php");
	
	$sql="select count(id) as admin from login";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	$tot_admin=$row['admin'];
	
	$sql1="select count(brand_id) as brand_id from car_make";
	$res1=mysql_query($sql1);
	$row1=mysql_fetch_array($res1);
	$tot_brand=$row1['brand_id'];
	
	$sql2="select count(car_id) as car from car_model";
	$res2=mysql_query($sql2);
	$row2=mysql_fetch_array($res2);
	$tot_car=$row2['car'];
	
	$sql3="select count(*)as tot_s_car from car_sell";
	$res3=mysql_query($sql3);
	$row3=mysql_fetch_array($res3);
	$tot_s_car=$row3['tot_s_car'];
	
	$sql4="select count(*)as tot_user from user_login";
	$res4=mysql_query($sql4);
	$row4=mysql_fetch_array($res4);
	$tot_u=$row4['tot_user'];
				?>
         <!-- RIGHT STRIP  SECTION -->
        <div id="right">

            
            <div class="well well-small">
                <ul class="list-unstyled">
						<b>Car Details</b>
					<li>Admins &nbsp; : <span><?php echo $tot_admin;?></span></li>
					<li>Total Brand &nbsp; : <span><?php echo $tot_brand;?></span></li>
					<li>New Cars &nbsp; : <span><?php echo $tot_car; ?></span></li>
					<li>Used Cars &nbsp; : <span><?php echo $tot_s_car;?></span></li>
					
				<br>
						<b>User Information</b>
						
                    
                    <li>Users &nbsp; : <span><?php echo $tot_u;?></span></li>
                </ul>
            </div>
                

        </div>
         <!-- END RIGHT STRIP  SECTION -->
    </div>

    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.js"></script>
     <script  src="assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/for_index.js"></script>
   
    <!-- END PAGE LEVEL SCRIPTS -->


</body>

    <!-- END BODY -->
</html>
