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
	
	<script type="text/javascript" src="js/jquery-1.10.2.js">
</script>
<script type="text/javascript" src="js/validate.js"></script>
<script>
		
	$("document").ready(function(){
	//$("#required").hide();
		$("#reg").click(function(){
			var pass;
			
			pass = test_match("#n_pass","#r_pass","#msgpass","#msgrepass");
			
			if(pass == true)
			{
				return true;
			}
			else
			{
				return false;
			}
			
		});
	
	});
</script>
	
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
	
		if(isset($_POST['submit'])){
			include("connection.php");
			$np=md5($_POST['n_pass']);
			
			$sql="update login set password='$np' where email_id='$uid'";
			$res=mysql_query($sql);
			if($res){
				header("location:index.php");
			}
			
			}
	?>
				
        <div id="forgot" class="tab-pane">
            <form action="" class="form-signin" method="post">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your New Password</p>
                <input type="password"  required="required" placeholder="Enter New Password"  class="form-control" name="n_pass" id="n_pass"/>
				<span id="msgpass"></span>
				<br>
				
				<input type="password"  required="required" placeholder="Re-Type Password"  class="form-control" name="r_pass" id="r_pass"/>
       
				<span id="msgrepass"></span>
				<br>
				
				
				
                <button class="btn text-muted text-center btn-success" type="submit" name="submit" id="reg">Submit New Password</button>
            </form>
        </div>
       
   
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="index.php">Login</a></li>
        
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
