<?php
	include("master1.php");
?>

<link rel="stylesheet" href="admin/assets/css/img1.css" />
<link href="button.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/c/tablemyacc.css" rel="stylesheet" type="text/css" media="all" />


<title><?php echo $_SESSION['fname']." Your Account"; ?></title>
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
			
<style type="text/css">
.stylish-button {
    color:#333;
    background-color:#FA2;
    border-radius:5px;
    border:none;
    width:45px;
	height:20px;
	font-size:16px;
    font-weight:700;
   
   
}
</style>
			
<div class="main">
<br>
				<div style="background:#f7f7f7;width:1000px;">
				<br>
	           		<h4 class="title">&nbsp;&nbsp;Used Car</h4>
					<br>
					<table class="CSSTableGenerator">
						<tr>
							<td>Brand</td>
							<td>Model</td>
							<td>Version</td>
							
							<td>Photos</td>
							<td>Add New </td>
							
						
						</tr>
					<?php
					$uid=$_SESSION['usersession'];
						include("connection.php");
						$sqlu="select * from car_sell cs,car_make cm,car_model cmo,car_version cv where cs.email_id='$uid' and cm.brand_id=cs.brand and cmo.car_id=cs.model and cv.v_id=cs.version";
						$resu=mysql_query($sqlu);
						if(mysql_num_rows($resu)>0){
						while($rowu=mysql_fetch_array($resu)){
							echo "<tr>";
							echo "<td width='120px'>".$rowu['car_company']."</td>";
							echo "<td width='120px'>".$rowu['car_name']."</td>";
							echo "<td  width='220px'>".$rowu['version_name']."</td>";
							
							echo "<td width='200px' align='center'>";
							$sqlp="select * from sell_car_photo where saler_id=".$rowu['saler_id'];
							$resp=mysql_query($sqlp);
							while($rowp=mysql_fetch_array($resp)){
							echo "<div class='image'><img src='admin/upload_car/sell/".$rowp['photo_src']."' height='130px' width='130px'>";
							$pid=$rowp['photo_id'];
							echo "<a href='delete_photo.php?pid=$pid'><div class='stylish-button'>Delete</div></a></div>";
							}
							echo "</td>";
							$sid=$rowu['saler_id'];
							echo "<td width='100px'><a href='add_new_image.php?sid=$sid'>Add New Photo</a></td>";
							
							
							echo "</tr>";
						}
						}
						else{
							echo "<tr>";
							echo "<td colspan='5'><center><font size='4'>No Record Found.</font></center></td>";
							echo "</tr>";
						}
					?>
					</table>
			    </div>
				
</div>				


	
</div>
	<div class="clear"></div>		

	
<?php
	include("master3.php");
?>