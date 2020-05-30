<?php
	include("master1.php");
	
	if(!isset($_SESSION['usersession'])){
		
	}
	else
	{
		header("location:index.php");
	}
?>
<title>Login Page</title>
<?php
	include("master2.php");
?>
<?php
if(isset($_POST['submit']))
{
$email=mysql_real_escape_string($_POST['email']);
$pass=mysql_real_escape_string($_POST['pswd']);
include("connection.php");
 
  $sql="SELECT * FROM user_login  WHERE email='$email'";
    $res=mysql_query($sql);
	$exists = mysql_num_rows($res);
	if($exists>0)
	{	
	    while($row=mysql_fetch_array($res))
    {
		$uid=$row['uid'];
    	$user=$row['email'];
		$fname=$row['fname'];
        $passw=$row['password'];
    }
	$pass1=md5($pass);
    if(($email==$user) && ($passw==$pass1)){
    					if($pass1 == $passw)
				{
					$_SESSION['userid']=$uid;
					$_SESSION['usersession']=$user;
					$_SESSION['fname']=$fname;
					header("location:my_account.php"); 
					//$err="Login";
				}
	}
  
    else
    {
    	$err="Incorrect USER ID or Password.!";
    }
	
	}
	else
	{
     	$err="Incorrect USER ID or Password.!";
	
	}


}
?>

        <div class="login">
          	<div class="wrap">
		
		<br>
								<div class="col_1_of_login span_1_of_login">
				<div class="login-title">
	           		<h4 class="title">Registered Customers</h4>
					<div id="loginbox" class="loginbox">
				
						<form action="#" method="post">
						
						  <fieldset class="input">
						  
						      <label for="modlgn_username">Email</label>
						      <input  type="text" name="email" class="inputbox" size="18" placeholder="Email-ID" value="<?php if(isset($_POST['submit']))echo $email;?>">
							  <table>
							  <tr>
							  <td>
							  <font color="red">
							  <?php
								if(isset($_POST['submit']))
								{
									if($_POST['email']==""){
										echo "Enter Email Id.";
									}
								}
							  ?>
							  </font>
							  <br>
							  </td>
							  </tr>
							  </table>
							  
						   
						      <label for="modlgn_passwd">Password</label>
						      <input  type="password" name="pswd" class="inputbox" size="18" placeholder="password">
						   <table>
						   <tr>
						   <td>
						    <font color="red">
							 <?php if(isset($_POST['submit']))
							          echo $err; ?>
								  <br>
							</font>
							</td>
							</tr>
							</table>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="forget_password.php">Forget Your Password ? </a></label>
							   </p>
							    <input type="submit" name="submit" class="button" value="Login"><div class="clear"></div>
							 </div>
					
						 </fieldset>
						 </form>
						 							 <div class="button1">
							 
					   <a href="register.php"><input type="submit" name="link1" value="Create an Account"></a>
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