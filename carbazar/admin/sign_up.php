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
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Sign Up</title>
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
			var fname,lname,uname,email,pass;
			//var fname1=getElementById("#fname").value;
			fname = test_name("#fname","#msgfname");
			
			lname = test_name("#lname","#msglname");
			uname = test_name("#uname","#msguname");
			email = test_email("#email","#msgemail");
			pass = test_match("#pass","#pass2","#msgpass","#msgrepass");
			
			if(fname == true && lname == true && uname == true && pass == true && email == true)
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

<script src="jquery.js" type="text/javascript" language="javascript"></script>
<script language="javascript">
$(document).ready(function()
{
	$("#uname").blur(function()
	{
		if(document.getElementById("uname").value !="")
		{
			
		//remove all the class add the messagebox classes and start fading
		$("#msguname").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("admin_id_availability.php",{ uname:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {
			  
		  	$("#msguname").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			
			
			  //add message and change the class of the box and start fading
			  $(this).html('This User Name Already exists').addClass('messageboxerror').fadeTo(900,1);	   
			
			  $("#uname").focus();
			  document.getElementById("uname").value="";
			});		
          }
		  else
		  {
		  	$("#msguname").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			
			  //add message and change the class of the box and start fading
			  $(this).html('User Name available to register').addClass('messageboxok').fadeTo(900,1);	
			});
		  }
				
        });
 	}
	});
});
</script>

	
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
   <?php
			
			if(isset($_POST['reg'])){
			$fn=$_POST["fname"];
			$ln=$_POST["lname"];
			$un=$_POST["uname"];
			$email=$_POST["email"];
			$pa=$_POST["pass"];
			$err="";
			include("connection.php");
			
			$sql1="select * from login where userid='$un'";
			$res1=mysql_query($sql1);
			$my_res=mysql_num_rows($res1);
			
			if($my_res>0){
					$err="User Name Not Available";
		
			}
			{
				$pa=md5($_POST["pass"]);
			$sql="insert into login(userid,password,firstname,lastname,email_id) values('$un','$pa','$fn','$ln','$email')";
			$res=mysql_query($sql);
			if($res){
			header("location:index.php");
			}
			}
			}
			?>
	
	
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">	
        <img src="assets/img/logo1.png" id="logoimg" alt=" Logo" />
    </div>
    <div class="tab-content">
       
      
        <div id="signup">
            <form action="#" method="post">
			<center>
			<p class="btn btn-primary btn-lg">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Please Fill Details To Register
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</p>
			<br><br>
			</center>
			 <table width="50%" align="center">
				<tr>
				<td width="30%">
				                 <input class="form-control" type="text" placeholder="First Name" name="fname" id="fname" value="<?php if(isset($_POST['reg'])) echo $fn;?>"/>
				</td>
				<td width="25%"><span id="msgfname"></span></td>
				</tr>
				<tr>
				<td>
                 <input class="form-control" type="text" placeholder="Last Name" name="lname" id="lname" value="<?php if(isset($_POST['reg'])) echo $ln;?>"/>
				 </td>
				 <td>
				 <span id="msglname"></span></td>
				</tr>
				<tr>
				<td>
                <input class="form-control" type="text" placeholder="Username" name="uname" id="uname" value="<?php if(isset($_POST['reg'])) echo $un;?>" />
				</td>
				<td><span id="msguname" style="display:none"></span>
				<?php 
					if(isset($_POST['reg']))
					{
						echo $err;
					}
				?>
				</td>
				</tr>
				<tr>
				<td>
                <input class="form-control" type="email" placeholder="Your E-mail" name="email" id="email" value="<?php if(isset($_POST['reg'])) echo $email;?>" />
				</td>
				<td><span id="msgemail"></span>
				</td>
				</tr>
				<tr>
				<td>
                <input class="form-control" type="password" placeholder="password"  name="pass" id="pass"/>
				</td>
				<td>
				<span id="msgpass"></span>
				</td>
				</tr>
				<tr>
				<td>
                <input class="form-control" type="password" placeholder="Re type password"  name="pass2" id="pass2"/>
				</td>
				<td><span id="msgrepass"></span></td>
				</tr>
				<tr>
				<td>
                <button class="btn text-muted text-center btn-success" type="submit" id="reg" name="reg">Register</button>
				<a  href="index.php" class="btn text-muted text-center btn-danger">Login</a>
				</td>
				<td>
				
				</td>
				</tr>
				</table>
            </form>
			
        </div>
	
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
