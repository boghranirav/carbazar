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
	include("connection.php");
	$id=$_SESSION['usersession'];
	$sql="select * from user_login where email='$id'";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	
	$fn=$row['fname'];
	$ln=$row['lname'];
	$paas=$row['password'];
	$date=$row['date_of_birth'];
	$em=$row['email'];
	$ph=$row['phone_no'];
	$st=$row['state'];
	$ct=$row['city'];
	$gen=$row['gender'];
	
	if(isset($_POST['submit'])){
		$fn1=$_POST['fname'];
		 $_SESSION['fname']=$fn1;
		$ln1=$_POST['lname'];
		$bd=$_POST['bdate'];
		
		$gen1=$_POST['gen'];
		$ph1=$_POST['mobile'];
		$st1=$_POST['state'];
		$ct1=$_POST['city'];
		
		
		$sql1="update user_login set fname='$fn1',lname='$ln1',phone_no='$ph1',state='$st1',city='$ct1',date_of_birth='$bd',gender='$gen1' where email='$id'";
		
		$res1=mysql_query($sql1);
		
		if($res1){
			header("location:my_account.php");
		}
		
		
	}
?>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
			$(document).ready(function(){
				//alert("hello);
				
				
				$("#state").change(function(){
					//alert("a");
					var id = $(this).val();	
					//alert(id);
					if(id == "0")
					{	
					}
					else
					{
						//alert(id);
						$.ajax({
							url:"view_ajaxcity.php",
							type:"post",
							data:{s_id:id},
							success:function(result){
								//alert(result);
								$("#city").html(result);
							}
						});
					}
				
				});
			
			});	
			

</script>

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
				
			<form action="my_account.php" method="post" >
					<table>
						<tr>
						<td width="140">
						      <label>First Name</label>
						</td>
						<td>
						      <input  type="text" class="tb" name="fname" value="<?php echo $fn;?>">
						</td>
						<td>
						
						</td>
						</tr>
						
						<tr>
						<td><br>	  
						      <label>Last Name</label>
						</td>
						<td>
						<br>
						      <input  type="text" class="tb" name="lname" value="<?php echo $ln;?>">
						</td>
						<td>
						
						</td>
						
						</tr>
						<br>
						<tr>
							<td>
								<br>
								<label>Date Of Birth</label>
							</td>
							<td>
							<br>
									<input type="date" class="tb" name="bdate" value="<?php echo $date;?>">
									
							</td>
							<td></td>
						</tr>
						
						<tr>
							<td>
							<br>
							Gender
							</td>
							<td>
							<br>
							<input type="radio" name="gen" value="Male" <?php if($gen=="Male") echo "checked";?>>Male<input type="radio" name="gen" value="Female" <?php if($gen=="Female") echo "checked";?>>Female
							</td>
							<td></td>
						</tr>
						
						<tr>
							<td><br>
							Email Id
							</td>
							<td>
							<br>
							<input type="text" class="tb"  disabled name="email_id" value="<?php echo $em;?>">
							</td>
							<td></td>
						</tr>
						
						
						
						<tr>
						<td><br>Mobile No.</td>
						<td><br>
						<input type="text" class="tb" name="mobile" value="<?php echo $ph;?>"></td>
						<td></td>
						</tr>
						
						<tr>
						<td>
						<br>
						State</td>
						<td>
						<br>
						<select class="tb" id="state" name="state" class="frm-field required">
		            <option value="null" >Select a State</option>         
		            <?php
						include("connection.php");
						$sql="select * from states";
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res)){
							$s_id=$row['id'];
							?>
							<option value="<?php echo $s_id;?>" <?php if($s_id==$st) echo "selected";?>><?php echo $row['state'];?></option>
						<?php
						}
					?>
		         </select>
						</td>
						<td></td>
						</tr>
						
						<tr>
						<td><br>
						City
						</td>
						<td><br>
						<?php
						include("connection.php");
						$sql="select * from city1 where city_id='$ct'";
						$res=mysql_query($sql);
						$row=mysql_fetch_array($res);
						$cty=$row['cityname'];
						?>
						  <select class="tb" id="city" name="city" class="frm-field required">
						<option value="null">Select a City</option>    
						<option value="<?php echo $ct;?>" selected><?php echo $cty;?></option>
		            
		         </select>
						</td>
						<td></td>
						</tr>
						
						<tr>
						<td></td>
						<td><br><button class="grey" id="reg" name="submit">SAVE</button></td>
						<td></td>
						</tr>
						
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