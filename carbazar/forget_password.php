<?php
	include("master1.php");
?>
<title>Login Page</title>
<?php
	include("master2.php");
?>

<?php
	if(isset($_POST['submit']))
	{
		
		$email=$_POST['email'];
		//$email1 = test_input($_POST["email"]);
		$errmsg="";
		
			if($email==""){
				$errmsg="Enter Email-Id.";
			}
			else
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errmsg = "Invalid email format"; 
			}
			else
			{
					include("connection.php");
					$sql="select * from user_login where email='$email'";
					$res=mysql_query($sql);
					if(mysql_num_rows($res)<=0){
						$errmsg="This Email-ID Is Not Registered With Us.";
					}
					else
					{
						$rad=rand(111111,999999);
						$pass=md5($rad);
						$sql2="update user_login set password='$pass' where email='$email'";
						$res2=mysql_query($sql2);
						if($res2){
						require "PHPMailerAutoload.php";
				
				$mail = new PHPMailer;
				
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  	// Specify main and backup server
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'gmail_id@gmail.com';                            // SMTP username
				$mail->Password = 'password123';                           // SMTP password
				$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
				$mail->Port = 465;						//Port Number
				
				$mail->FromName = 'nir';			//From Email Id
				$mail->From = ' CarBazar';		//From Email Id Display Name
				
				$mail->addAddress($email);               // Name is optional
				
				$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
				
				$mail->Subject = 'Car Bazzer ';
				$mail->Body    ='Your New Password Is '.$rad.". Login with this password and Change Your Password.";
				
				if(!$mail->send()) 
				{
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   exit;
				}
				else
				{
				
					Print '<script>alert("We Have Sand You Password on Your Email-ID.");</script>';
					header("location:login.php");
					
				}	
					}
					else
					{
						$errmsg="Try Again.";
					}
				
					}		
			}
	}
?>



        <div class="login">
          	<div class="wrap">
		
		<br>
								<div class="col_1_of_login span_1_of_login" >
				<div class="login-title">
	           		<h4 class="title">Forget Password</h4>
					<div id="loginbox" class="loginbox">
				
						<form action="#" method="post">
						
						  <fieldset class="input">
						  
						      <label for="modlgn_username">Enter Your Registered Email Id</label>
						      <input  type="text" name="email" class="inputbox" size="18" placeholder="Your Registered Email-ID" value="<?php if(isset($_POST['submit']))echo $email;?>">
							  <table>
							  <tr>
							  <td>
							  <font color="red">
							  <?php
								if(isset($_POST['submit']))
								{
									echo $errmsg;
								}
							  ?>
							  </font>
							  <br>
							  </td>
							  </tr>
							  </table>
							  
						   
						     
						    <div class="remember">
							   
							    <input type="submit" name="submit" class="button" value="Recover Password"><div class="clear"></div>
							 </div>
					
						 </fieldset>
						 </form>
						 							 <div class="button1">
							 
					   <a href="login.php"><input type="submit" name="link1" value="Cancel"></a>
					</div>

					</div>
			    </div>
				</div>
				
				<div class="clear"></div>
			</div>
		</div>

<?php
	include("master3.php");
?>