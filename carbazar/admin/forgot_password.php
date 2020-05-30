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
					if(isset($_REQUEST['submit'])){
						$errmsg['em']="";
						$errmsg['ca']="";
						$em=$_POST['email'];
						$cap=$_REQUEST['captcha'];
						include("connection.php");
						$sql=mysql_query("select * from login where email_id='$em'");
						
						$row=mysql_num_rows($sql);
						if($row==0){
							$errmsg['em']="This Email Id Not Found..";
						}
						else
							if( $_SESSION["security_code"]!=$_REQUEST['captcha']){
								$errmsg['ca']="Invalid Captcha Code..";
							}
							else
							{
					$rad=rand(1111111,9999999);
					include("connection.php");
					$sql1="update login set recover=$rad where email_id='$em'";
					$_SESSION['email1']=$em;
					mysql_query($sql1);
								require "PHPMailerAutoload.php";
				
				$mail = new PHPMailer;
				
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  	// Specify main and backup server
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'gmail_id@gmail.com';                            // SMTP username
				$mail->Password = 'pass123';                           // SMTP password
				$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
				$mail->Port = 465;						//Port Number
				
				$mail->FromName = '';			//From Email Id
				$mail->From = ' CarBazar';		//From Email Id Display Name
				
				$mail->addAddress($em);               // Name is optional
				
				$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
				
				$mail->Subject = 'Car Bazzer ';
				$mail->Body    ='Your varification code Is '.$rad;
				
				if(!$mail->send()) 
				{
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   exit;
				}
				else
				{
					header("location:verify_code.php");
					
				}	
							}
					}
				?>
				
				
        <div id="forgot" class="tab-pane">
            <form action="" class="form-signin" method="post">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                <input type="email"  required="required" placeholder="Your E-mail"  class="form-control" name="email"/>
       
				<span><?php if(isset($_POST['submit'])) echo $errmsg['em']; ?></span>
				<br>
				<img src="captcha.php">
				
				<input type="text"  required="required" placeholder="Enter Captcha Code Here"  class="form-control" name="captcha"/>
								<span><?php if(isset($_POST['submit'])) echo $errmsg['ca']; ?></span>
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
