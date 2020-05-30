<?php
	include("master1.php");
?>

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
			
	
<div class="main">
<br>
				<div style="background:#f7f7f7;width:850px;">
				<br>
	           		<h4 class="title">&nbsp;&nbsp;Used Car</h4>
					<br>
					<table class="CSSTableGenerator">
						<tr>
							<td>Brand</td>
							<td>Model</td>
							<td>Version</td>
							<td>Km Driven</td>
							<td>Fuel Type</td>
							<td>Price</td>
							<td>Edit</td>
							<td>Delete</td>
						
						</tr>
					<?php
					$uid=$_SESSION['usersession'];
						include("connection.php");
						$sqlu="select * from car_sell cs,car_make cm,car_model cmo,car_version cv where cs.email_id='$uid' and cm.brand_id=cs.brand and cmo.car_id=cs.model and cv.v_id=cs.version";
						$resu=mysql_query($sqlu);
						if(mysql_num_rows($resu)<=0){
							echo "<tr>";
							echo "<td colspan='8'><center><font size='4'>No Record Found.</font></center></td>";
							echo "</tr>";
						}else
						{						
						while($rowu=mysql_fetch_array($resu)){
							echo "<tr>";
							echo "<td width='120px'>".$rowu['car_company']."</td>";
							echo "<td width='120px'>".$rowu['car_name']."</td>";
							echo "<td  width='350px'>".$rowu['version_name']."</td>";
							echo "<td width='100px'>".$rowu['km_driven']."</td>";
							echo "<td width='80px'>".$rowu['fuel_type']."</td>";
							echo "<td width='80px'>".$rowu['e_price']."</td>";
							$sid=$rowu['saler_id'];
							echo "<td width='50px'><a href='my_used_car_edit.php?sid=$sid'>Edit</a></td>";
							echo "<td width='50px'><a href='my_used_car_delete.php?sid=$sid'>Delete</a></td>";
							
							echo "</tr>";
						
						}
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