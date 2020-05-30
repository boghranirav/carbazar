<?php
	include("master1.php");
?>

<link href="button.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/c/tablemyacc.css" rel="stylesheet" type="text/css" media="all" />


<title>Add Photo</title>
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
			<a href="index_3.html" class="button">My Reviews</a>
			
			<a href="change_pass.php" class="button">Change Password</a>
			<a href="my_car_photos.php" class="button">My Car Photos</a>
			
			<hr color="lightblue" size="1">
			
	
<div class="main">
<br>
				<div style="background:#f7f7f7;width:650px;">
				<br>
				<?php
					$uid=$_SESSION['usersession'];
					$s_id=$_GET['sid'];
						include("connection.php");
						$sqlu="select * from car_sell cs,car_make cm,car_model cmo,car_version cv where cs.email_id='$uid' and cm.brand_id=cs.brand and cmo.car_id=cs.model and cv.v_id=cs.version and saler_id=$s_id";
						$resu=mysql_query($sqlu);
						$rowu=mysql_fetch_array($resu);
						$vid=$rowu['v_id'];
						
					$sqlid="select * from user_login where email='$uid'";
					$resid=mysql_query($sqlid);
					$rowid=mysql_fetch_array($resid);
					$userid=$rowid['uid'];
				?>
				
				
				<?php
	if(isset($_POST['submit'])){
		$img=$_FILES["image"]["name"];
		$err['img']="";
		$s_id=$_GET['sid'];
		$i=$rowu['v_id'].rand(1,100);
		$fileName = $s_id."_".$vid."_".$i.".jpg";
		
		$myextension= strtolower(strrchr($_FILES["image"]["name"],"."));
					if($myextension == ".jpg" || $myextension == ".jpeg" || $myextension == ".gif" || $myextension == ".bmp" || $myextension == ".png")
					{
						if ($_FILES["image"]["error"] > 0)
						{
							$err['img']=$_FILES["image"]["error"] . "<br />";
						}
						else
						{
								move_uploaded_file($_FILES["image"]["tmp_name"],"admin/upload_car/sell/".$fileName);
								
								$img_path=$fileName;
						}
					}
					else
					{
						$err['img']="Please upload Image.";
					}
				
			if($err['img']==""){
				include("connection.php");
				$sqla="insert into sell_car_photo(saler_id,u_id,version_id,photo_src) values('$s_id','$userid','$vid','$img_path')";
				
				$resa=mysql_query($sqla);
				if($resa){
					header("location:my_car_photos.php");
				}
			}
	}
?>
	           		<h4 class="title">&nbsp;&nbsp;Add Photo For <?php echo $rowu['version_name'];?></h4>
					<br>
					
					<form method="post" action="#" enctype="multipart/form-data">
						<table style="margin-left:1cm">
							<tr>
							<td width="150px"><font size="4">Upload Photo</font></td>
							<td>
									<input type="file" name="image" id="image" >
							</td>
							<td  width="180px">
							<?php 
								if(isset($_POST['submit'])){
									echo $err['img'];
								}
							?>
							</td>
							</tr>
							
							<tr>
								<td></td>
								<td>
								<br>
								<button class="grey" id="reg" name="submit">Submit</button>
								</td>
								<td></td>
							</tr>
						</table>
					</form>
					<br>
			    </div>
				
</div>				


	
</div>
	<div class="clear"></div>		

	
<?php
	include("master3.php");
?>