<?php
	include("master1.php");
?>

<link href="button.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/c/tablemyacc.css" rel="stylesheet" type="text/css" media="all" />


<title><?php echo $_SESSION['fname']." Your Account"; ?></title>
<?php
	include("master2.php");
?>

<?php
	if(isset($_POST['submit'])){
	 	
		$mfyear=$_POST['mfyear'];
		$km=$_POST['kmdriven'];
		$exp=$_POST['exprice'];
		$ftype=$_POST['ftype'];
		$mno=$_POST['mno'];
		
		if(isset($_POST["hidemo"])){
		$m_hide=$_POST["hidemo"];
		}
		
		$err['mo']="";
		$err['ftype']="";
		$err['km']="";
		$err['exp']="";
		$err['mfy']="";
		
	if($mno=="")
		{
			$err['mo']="* This field is required";
		}
		else if(!is_numeric($mno))
		{
		    $err['mo']=" Enter Only Number";	
		}
		else if((strlen($mno)!=10))
		{
			$err['mo']=" Enter Only 10 Digit";
		}
	if($mfyear=="null")
	    {
		
		$err['mfy']="* This field is required";
	    }	
	  
   if($km=="")
		{
			$err['km']="* This field is required";
		} 
   if($ftype=="null")
		{
			$err['ftype']="* This field is required";
		}
		
	if($exp=="")
		{
			$err['exp']="* This field is required";
		}
		else if(!is_numeric($exp))
	  {
		$err['exp']=" Invalid Price";
     	}
		
	
		
if($err['mo']=="" && $err['mfy']=="" && $err['km']=="" && $err['ftype']=="" && $err['exp']=="")
{
	$s_id=$_GET['sid'];
	if(isset($m_hide)){
		$mh="yes";
	}
	else
	{
		$mh="no";
	}
	
	include("connection.php");
	$sql="update car_sell set mobile='$mno',hide_mobile='$mh',mfg_year='$mfyear',km_driven='$km',fuel_type='$ftype',e_price='$exp' where saler_id=$s_id";
	
	$res=mysql_query($sql);
	
	if($res){
		header("location:my_used_car.php");
	}	
}

}
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
				<div style="background:#f7f7f7;width:850px;">
				<br>
	           		<h4 class="title">&nbsp;&nbsp;Used Car Edit</h4>
					<br>
					
					<?php
					$uid=$_SESSION['usersession'];
					$s_id=$_GET['sid'];
						include("connection.php");
						$sqlu="select * from car_sell cs,car_make cm,car_model cmo,car_version cv where cs.email_id='$uid' and cm.brand_id=cs.brand and cmo.car_id=cs.model and cv.v_id=cs.version and saler_id=$s_id";
						$resu=mysql_query($sqlu);
						$rowu=mysql_fetch_array($resu);
					?>
					
					<div style="margin-left:1cm">
					<form method="post" action="#">
					<font size="5">
					Edit <?php echo $rowu['car_company']."</br> Version ".$rowu['version_name'];?>
					</font>
					<hr>
					<br>
						<table>
						<td>Mobile No</td>
						<td><input type="text" placeholder="Enter Mobile no" name="mno" value="<?php if(isset($_POST['submit'])){ echo $mno;}else {echo $rowu['mobile'];}?>" style="font-size:16px;height:20px;width:200px;"></td>
						<td><?php if(isset($_POST['submit'])){ echo $err['mo'];}?></td>
						</tr>
						
						<tr>
						<td><br></td>
						<td><br><input type="checkbox" name="hidemo" value="yes" <?php if($rowu['hide_mobile']=="yes") echo "checked";?>>Hide Mobile Number</td>
						<td><br></td>
						</tr>
						
						<tr>
						<td>MFG Year</td>
						<td>
						<select class="tb" name="mfyear" id="mfyear" style="font-size:16px;height:26px;width:205px;">
				        <option value="null">--Select Manufacturing Year--</option>
						 <?php 
						       
							  for($ct=date("Y");$ct>=1998;$ct--)
							  {
						?>
						 <option value="<?php echo $ct;?>" <?php if($rowu['mfg_year']==$ct) echo 'selected';?>><?php echo $ct;?></option>
							<?php
							  }
						 ?>
						</select>
						</td>
						<td><?php if(isset($_POST['submit'])){ echo $err['mfy'];}?></td>
						</tr>
						
						<tr>
						<td  width="200px"><br><font size="4">KMs Driven</font></td>
						<td><br><input type="text" value="<?php if(isset($_POST['submit'])){ echo $km;} else {echo $rowu['km_driven'];}?>" placeholder="Enter KMs Driven" style="font-size:16px;height:20px;width:200px;" name="kmdriven"></td>
						<td><br><?php if(isset($_POST['submit'])){ echo $err['km'];}?></td>
						</tr>
						
						<tr>
						<td><br>Fuel Type</td>
						<td><br>
						  <select name="ftype" style="font-size:16px;height:26px;width:205px;">
				       <option value="null">--Select Fuel Type--</option>
					   <option value="Petrol" <?php if($rowu['fuel_type']=="Petrol") echo "selected";?>>Petrol</option>
					   <option value="Diesel" <?php if($rowu['fuel_type']=="Diesel") echo "selected";?>>Diesel</option>
					   <option value="CNG" <?php if($rowu['fuel_type']=="CNG") echo "selected";?>>CNG</option>
					 </select>
						</td>
						</td><br><?php if(isset($_POST['submit'])){ echo $err['ftype'];}?></td>
						</tr>
						
						<tr>
						<td><br>Expected Price</td>
						<td><br><input type="text" value="<?php if(isset($_POST['submit'])){ echo $exp;}else {echo $rowu['e_price'];}?>" placeholder="Enter KMs Driven" style="font-size:16px;height:20px;width:200px;" name="exprice"></td>
						<td><br><?php if(isset($_POST['submit'])){ echo $err['exp'];}?></td>
						</tr>
						
						<tr>
						<td></td>
						<td><br><button class="grey" id="reg" name="submit">Submit</button></td>
						<td></td>
						</tr>
						
						</table>
					</form>
					</div>	
						<br>	
					
					
			    </div>
				
</div>				


	
</div>
	<div class="clear"></div>		

	
<?php
	include("master3.php");
?>