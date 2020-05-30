<?php

	include("master1.php");
if(isset($_SESSION['userid'])){
	
}
else
{
	header("location:login.php");
}
?>
<title>Sell Car</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.10.2.js" type="text/javascript"></script>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
			$(document).ready(function(){
				//alert("hello);
				
				$("#b_id").change(function(){
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
							url:"sellcarajax.php",
							type:"post",
							data:{b_id:id},
							success:function(result){
								//alert(result);
								$("#m_id").html(result);
								
							}
						});
					}
				
				});
				

				
					$("#m_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						
						
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"sellcarajax.php",
							type:"post",
							data:{m_id:id1},
							success:function(result1){
							//	alert(result1);
								$("#v_id").html(result1);
								
								
							}
						});
					}
				
				});
				
			
			});	
	</script>

<?php
	include("master2.php");
?>

<?php
	include("connection.php");
	$id=$_SESSION['usersession'];
	$sql="select * from user_login where email='$id'";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	
	$fname1=$row['fname'];
	$lname1=$row['lname'];
	$email1=$row['email'];
	$phone1=$row['phone_no'];
	
?>

<?php
	if(isset($_POST['submit'])){
	 	$cty=$_POST['city'];
		$mfyear=$_POST['mfyear'];
		$bd=$_POST['b_id'];
		$md=$_POST['m_id'];
		$vrs=$_POST['v_id'];
		$km=$_POST['kmdriven'];
		$exp=$_POST['exprice'];
		$ftype=$_POST['ftype'];
		$nm=$_POST['name'];
		$mno=$_POST['mno'];
		$eid=$_POST['emailid'];
		
		if(isset($_POST["hidemo"])){
		$m_hide=$_POST["hidemo"];
		}
		
		$err['ct']="";
		$err['mfy']="";
		$err['nm']="";
		$err['mo']="";
		$err['eid']="";
		$err['bd']="";
		$err['md']="";
		$err['vrs']="";
		$err['ftype']="";
		$err['km']="";
		$err['exp']="";
		
	if($cty=="null")
		
		{
			$err['ct']="*This field is required.";
		}
		
		if($nm=="")
		{
			$err['nm']="*This field is required.";
		}
		if(!preg_match("/^[a-zA-Z ]*$/",$nm))
		{
		   $err['nm']="*Enter Only a-z Alphabet.";  	
		}
		
	 if($mno=="")
		{
			$err['mo']="*This field is required.";
		}
		else if(!is_numeric($mno))
		{
		    $err['mo']="*Enter Only Number.";	
		}
		else if((strlen($mno)!=10))
		{
			$err['mo']="*Enter Only 10 Digit.";
		}
		
	if($eid=="")
		{
			$err['eid']="*This field is required.";
		}
		else if(!filter_var($eid, FILTER_VALIDATE_EMAIL))
		{
			$err['eid']="*Invalid Email-Id.";
		}
		
		
	if($mfyear=="null")
	    {
		
		$err['mfy']="* This field is required.";
	    }		
   if($bd=="null")
			
		{
			 $err['bd']="* This field is required.";
	    }
   if($md=="null")
		{
			$err['md']="* This field is required.";
		}		
   if($vrs=="null")
		{
			$err['vrs']="* This field is required.";
		}
   if($km=="")
		{
			$err['km']="* This field is required.";
		} 
   if($ftype=="null")
		{
			$err['ftype']="* This field is required.";
		}
		
	if($exp=="")
		{
			$err['exp']="* This field is required.";
		}
		else if(!is_numeric($exp))
	  {
		$err['exp']="* Invalid Price.";
     	}
		
	
		
if($err['ct']=="" && $err['nm']=="" && $err['mo']=="" && $err['eid']=="" && $err['mfy']=="" && $err['bd']=="" && $err['md']=="" && $err['vrs']==""  && $err['km']=="" && $err['ftype']=="" && $err['exp']=="")
{
	$uid=$_SESSION['userid'];
	if(isset($m_hide)){
		$mh="yes";
	}
	else
	{
		$mh="no";
	}
	$date=date('y-m-d');
	include("connection.php");
	$sql="insert into car_sell (u_id,city,s_name,mobile,hide_mobile,email_id,mfg_year,brand,model,version,km_driven,fuel_type,e_price,c_date) values($uid,$cty,'$nm','$mno','$mh','$eid','$mfyear',$bd,$md,$vrs,'$km','$ftype','$exp','$date')";
	
	$res=mysql_query($sql);
	
	if($res){
		header("location:sellcar2.php");
	}
	
	
	
}

		
	  

}
?>

<hr color="lightgrey" size="1">
<br>

          	<div class="wrap">
				
    	      <h4 class="title" >Sell Car Step 1</h4>
			  <br>
			   <center>
    		   <form method="post" action="#" enctype="multipart/form-data" name="frmaddcontest">
    			 <div style="height:800px;width:750px" align="center">
				
				 <table>
				 <tr>
								<td width="200px">Select City </td>
				<td>
		    	<select class="tb" id="city" name="city" >
		            <option value="null">--Select city--</option>         
		            <?php
						include("connection.php");
						$sql="select * from city1 order by cityname";
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res)){
							$c_id=$row['city_id'];
							?>
							<option value="<?php echo $c_id;?>" <?php if(isset($_POST['submit'])){
								
							if($cty==$c_id) echo "selected";}?>><?php echo $row['cityname'];?></option>
						<?php
						}
					?>
		         </select>
				 </td>
				 <td width="250px">
				 <font color="red">
				 <?php if(isset($_POST['submit'])){ echo $err['ct'];}?>
				 </font>
				 </td>
				 </tr>
				 
				 <tr><td><br></td></tr>
				  <tr>
				 <td>&nbsp;</td>
				 <td>--<b><font size="4">Contact Information</font></b>--</td>
				 <td></td>
				 </tr>
				 
				 <tr><td><br></td></tr>
				<tr>
				<td>Name</td>
				<td><input class="tb" type="text" placeholder="Enter Name" id="name" name="name" value="<?php if(isset($_POST['submit'])){ echo $nm;} else {echo $fname1." ".$lname1;}?>"></td>
				<td><font color="red"><?php if(isset($_POST['submit'])){ echo $err['nm'];}?></font></td>
				</tr>
				 <tr><td><br></td></tr>
				<tr>
				<td>Mobile No</td>
				<td><input class="tb" type="text" placeholder="Enter Mobile no" id="mno" name="mno" value="<?php if(isset($_POST['submit'])){ echo $mno;}else {echo $phone1;}?>"></td>
				<td><font color="red"><?php if(isset($_POST['submit'])){ echo $err['mo'];}?></font></td>
				</tr>
				<tr>
				<td></td>
				<td><input type="checkbox" name="hidemo" value="yes">Hide Mobile Number</td>
				<td></td>
				</tr>
			
				 <tr><td><br></td></tr>
				<tr>
				<td>Email</td>
				<td><input class="tb" type="text" placeholder="Enter Emailid" id="emailid" name="emailid" value="<?php if(isset($_POST['submit'])){ echo $eid;}else {echo $email1;}?>"></td>
				<td><font color="red"><?php if(isset($_POST['submit'])){ echo $err['eid'];}?></font></td>
				</tr>
				
				
				 <tr><td><br></td></tr>
				 <tr>
				 <td>&nbsp;</td>
				 <td>--<b><font size="4">Car Information</font></b>--</td>
				 <td></td>
				 </tr>
				 
				  <tr><td><br></td></tr>
				  
				 <tr>
				 <td>MFG Year</td>
				 <td>
				     <select class="tb" name="mfyear" id="mfyear" >
				         <option value="null">--Select Manufacturing Year--</option>
						 <?php 
						       
							  for($ct=date("Y");$ct>=1998;$ct--)
							  {?>
								 <option value="<?php echo $ct;?>" <?php if(isset($_POST['submit'])){
								
							if($mfyear==$ct) echo 'selected';}?>><?php echo $ct;?></option>
							<?php
							  }
						 ?>
					</select>
				 </td>
				 <td><font color="red"><?php if(isset($_POST['submit'])){ echo $err['mfy'];}?></font></td>
				 </tr>
				
				 <tr><td><br></td></tr>
				
				<tr>
				<td>Brand </td>
				<td><select name="b_id" id="b_id" class="tb">
					          <option value="null">--Select Brand--</option>
					                           <?php
		                            			   include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$brandid=$row['brand_id'];
														$car_com=$row['car_company'];
							                  	?>						
													<option value="<?php echo $brandid;?>" <?php if(isset($_POST['submit'])){
								
							if($bd==$brandid) echo "selected";}?>> <?php echo $car_com;?></option>;
													<?php
													}
													?>
							
						    </select>
	             </td>
				<td><font color="red"><?php if(isset($_POST['submit'])){ echo $err['bd'];}?></font></td>
				</tr>
				
				 <tr><td><br></td></tr>
				
				<tr>
				<td>Model</td>
				<td><select class="tb" name="m_id" id="m_id">
                             <option value="null">--Select Model--</option>
                     </select>  
				</td>
				 <td><font color="red"><?php if(isset($_POST['submit'])){ echo $err['md'];}?></font></td>
				</tr>
				
				 <tr><td><br></td></tr>
				 
				<tr>
				<td>Version</td>
				<td>
		    	<select class="tb" id="v_id" name="v_id" class="frm-field required">
		            <option value="null" >--Select Version--</option>         
		            
		         </select>
				 </td>
				 <td><font color="red"><?php if(isset($_POST['submit'])){ echo $err['vrs'];}?></font></td>
				 </tr>
				 
				  <tr><td><br></td></tr>
				  
				<tr>
				<td>KMs Driven</td>
				<td>
		         <input class="tb" type="text" placeholder="Enter KMs driven" id="kmdriven" name="kmdriven" value="<?php if(isset($_POST['submit'])){ echo $km;}?>">
				</td>
				<td><font color="red"><?php if(isset($_POST['submit'])){ echo $err['km'];}?></font></td>
				</tr>
				
				 <tr><td><br></td></tr>
				<tr>
				<td>Fuel Type</td>
				<td>
		           <select name="ftype" id="ftype" class="tb">
				       <option value="null">--Select Fuel Type--</option>
					   <option value="Petrol" <?php if(isset($_POST['submit'])){
							if($ftype=="Petrol") echo "selected";}?>>Petrol</option>
					   <option value="Diesel" <?php if(isset($_POST['submit'])){
							if($ftype=="Diesel") echo "selected";}?>>Diesel</option>
					   <option value="CNG" <?php if(isset($_POST['submit'])){
							if($ftype=="CNG") echo "selected";}?>>CNG</option>
					 </select>
				</td>
				<td><font color="red"><?php if(isset($_POST['submit'])){ echo $err['ftype'];}?></font></td>
				</tr>
				
				 <tr><td><br></td></tr>
				
				<tr>
				<td>Expected Price</td>
				<td><input class="tb" type="text" placeholder="Enter Expected price" id="exprice" name="exprice" value="<?php if(isset($_POST['submit'])){ echo $exp;}?>" ></td>
				<td><font color="red"><?php if(isset($_POST['submit'])){ echo $err['exp'];}?></font></td>
				</tr>
		
				
				 				
				
				
         
            <tr><td><br></td></tr>		 
			
			<tr>
				<td></td>
				<td><button class="grey" id="reg" name="submit">Submit</button></td>
				<td></td>
				</tr>
				
		       
		
			
		   </table>
		   
		   </div>
		    <div class="clear"></div>
			
		    </form>
			</center>
			
    	</div>
		<br><br>
	
	<br>
<?php
	include("master3.php");
?>