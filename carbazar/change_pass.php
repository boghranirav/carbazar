<?php
	include("master1.php");
?>

<link href="button.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/c/sele.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />


<title><?php 
if(isset($_SESSION['fname'])){
echo $_SESSION['fname']." Your Account"; 
}
else
{
	header("location:index.php");
}
?>
</title>



<?php
	include("master2.php");
?>

<hr color="lightgrey" size="1">
<br>

<div class="wrap">

 <h4 class="title"><?php echo $_SESSION['fname'];?> Your Account</h4>
			<br>
			<br>
			
			
					<a href="my_account.php"  class="button">Update Profile</a>
					<a href="my_used_car.php" class="button">My Used Cars</a>
					<a href="my_review.php" class="button">My Reviews</a>
					
					<a href="change_pass.php" class="button">Change Password</a>
					<a href="my_car_photos.php" class="button">My Car Photos</a>
					<hr color="lightblue" size="1">
			
			
<div class="main">

				<div class="col_1_of_login span_1_of_login">
				<div class="login-title">
	           		<h4 class="title">Account Details</h4>
					
					<div id="loginbox" class="loginbox">
				
			<form action="#" method="post" >
			<?php
			$errmsg['old']="";
			$errmsg['new']="";
			$errmsg['re']="";
				if(isset($_POST['submit'])){
					$id=$_SESSION['usersession'];
					$oldpass=$_POST['oldpassword'];
					$npass=$_POST['password'];
					$rpass=$_POST['password2'];
					
					include("connection.php");
					$sql="select * from user_login where email='$id'";
					$res=mysql_query($sql);
					
					$row=mysql_fetch_array($res);
					
					$op=$row['password'];
					
					if($op==md5($oldpass)){
						if(strlen($npass)<6){
							$errmsg['new']="Password Must Be More Then Or Equal To 6 Char.";
						}
						else
							if($npass==$rpass){
								$np=md5($npass);
								$sql2="update user_login set password='$np' where email='$id'";
								$res2=mysql_query($sql2);
								if($res2){
									header("location:my_account.php");
								}
							}else
							{
								$errmsg['re']="New Password Does Not Match.";
							}
					}
					else
					{
							$errmsg['old']="Old Password Does Not Match.";
					}
				}
			?>
					<table>
						<tr >
							<td><br>Enter Old-Password</td>
							<td><br><input type="password" class="tb" name="oldpassword" value="<?php if(isset($_POST['submit']))echo $oldpass;?>"></td>
							<td></td>
						</tr>
						<tr>
							<td></td>							
							<td><br>
							<?php if(isset($_POST['submit'])){
										echo $errmsg['old'];
							}
							?>
							</td>
						</tr>
						
						<tr >
							<td><br>Enter Password</td>
							<td><br><input type="password" class="tb" name="password" value="<?php if(isset($_POST['submit']))echo $npass;?>"></td>
							<td></td>
						</tr>
						<tr>
							<td></td>							
							<td><br>
							<?php if(isset($_POST['submit'])){
										echo $errmsg['new'];
							}
							?>
							</td>
						</tr>
						
						<tr >
							<td><br>Re-Enter Password</td>
							<td><br><input type="password" class="tb" name="password2"></td>
							<td></td>
						</tr>
						<tr>
							<td></td>							
							<td><br>
							<?php if(isset($_POST['submit'])){
										echo $errmsg['re'];
							}
							?>
							</td>
						</tr>
						
						<tr >
							<td><br></td>
							<td><br>
							
							
							<button class="grey" id="reg" name="submit">SAVE</button>
							</td>
							<td></td>
						</tr>
		
					</table>
						  
			</form>
			<br>
			<form action="my_account.php">
			<table>
			<tr>
			<td width="148"></td>
			<td>
			<button class="grey">Cancel</button>
			</td>
			</table>
			</form>
	

					</div>
			    </div>
				</div>
					
</div>


	
</div>
	<div class="clear"></div>		







						
						
						
<?php
	include("master3.php");
?>