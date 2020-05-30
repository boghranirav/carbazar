<?php
session_start();

if(!isset($_SESSION['admin_id'])){
	
}
else
{
	header("location:index2.php");
	exit();
}
?>

<!DOCTYPE html>
<head>
     <meta charset="UTF-8" />
    <title>Forgot Password</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">	
        <img src="assets/img/logo1.png" id="logoimg" alt=" Logo" />
    </div>

	<?php
	$uid=$_SESSION['email1'];
			
			
		if(isset($_REQUEST['submit'])){
			$code=$_POST['v_code'];
			
			include("connection.php");
			$sql="select * from login where recover='$code' and email_id='$uid'";
			
			$res=mysql_query($sql);
			
			$row=mysql_fetch_array($res);
		
			if($row['recover']==$code)
			{
				header("location:recover_pass.php");
			}
			else
			{
				$errmsg="Invalid Code.";
			}
		}
	?>
				
        <div id="forgot" class="tab-pane">
            <form action="" class="form-signin" method="post">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid Code</p>
                <input type="text"  required="required" placeholder="Enter Code"  class="form-control" name="v_code"/>
       
				<span><?php if(isset($_POST['submit'])) echo $errmsg; ?></span>
				<br>
				
				
				<br>
				
				
                <button class="btn text-muted text-center btn-success" type="submit" name="submit">Recover Password</button>
            </form>
        </div>
       
   
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="index.php">Login</a></li>
            <li><a class="text-muted" href="sign_up.php" >Signup</a></li>
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
