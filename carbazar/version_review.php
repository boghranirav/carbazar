<?php
	if((!isset($_GET['vid']))){
		header("location:index.php");
	}
	include("master1.php")
?>

<link href="css/c/btnh.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="styles/RatingStars.css" />
<link href="css/c/vtable.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/c/rlinkbtn.css" rel="stylesheet" type="text/css" media="all" />
<?php
		
		    $vid=$_GET['vid'];
			include("connection.php");
			$sql2="select * from car_version where v_id=$vid";
			$res2=mysql_query($sql2);
			$row2=mysql_fetch_array($res2);
			$cid=$row2['car_id'];
			$pri=$row2['price'];
	?>
<title><?php echo $row2['version_name']; ?></title>
<?php
	include("master2.php");
?>
<hr size="1" color="lightgrey">
<br>

<div class="wrap">

			<?php
				$sqlp="select * from photos where car_id=$cid";
				$resp=mysql_query($sqlp);
				$rowp=mysql_fetch_array($resp);
				$imgsrc="admin/upload_car/image/".$rowp['name'];
			?>

	
	<div style="width:750px;height:350px;border:2px;border: 2px solid #4cb1ca;">
				<br>
				<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>
				<?php echo $row2['version_name']." Specifications "; ?>
				<hr>
				</h3>
				
				<div style="overflow:hidden;position:relative;width:70%;min-width:300px;margin-bottom:20px;margin-top:20px;margin-left:1cm;margin-right:auto;">
				
				<div style="float:right;margin-right:1cm">
					<font size="5">
					<?php
					echo "Rs. ".$pri;
					?>
					</font>
					<br>
					<br>
					 <div class="btn_form">
						<?php
						echo "<a href='on_road_price_3.php?v=$vid' class='abtn'>Get On Road Price</a>";
					?>
					 </div>
				<br>
				<br>
				</div>
				
				<img src="<?php echo $imgsrc;?>" height="200" width="200" style=" margin-left: 0.3cm;vertical-align:middle;border:5px solid black;" >
				<br><br>
				
				</div>
				
				</div>
				<br>
				<div style="width:750px;border:2px;border: 2px solid #4cb1ca;">
				<br>
				&nbsp;&nbsp;&nbsp;
				<?php
				echo "<a href='overview.php?vid=$vid' id='popUpYes'>Overview</a>&nbsp;";
				echo "<a href='specification.php?vid=$vid' id='popUpYes'>Specifications</a>&nbsp;";
				echo "<a href='features.php?vid=$vid' id='popUpYes' >Features</a>&nbsp;";
				echo "<a href='dimensions.php?vid=$vid'  id='popUpYes'>Dimensions</a>&nbsp;";
				echo "<a href='version_review.php?vid=$vid'  id='popUpYes'  style='background-color:white'>Reviews</a>&nbsp;";
				?>
				<br>
				<br>
				
				<?php
				include("connection.php");
				 $sql="select cr.car_id,uid,re_wtgood,re_title,re_wtimprove,re_ratemil,re_mcity,re_mhighway,re_exterior,re_rateext,re_interior,re_ratein,re_other,re_overall,version_name,cr.v_id from car_review cr,car_version cv where cr.v_id=cv.v_id and cr.v_id=$vid";
							
				 
						    $res=mysql_query($sql);
							$resul=mysql_num_rows($res);
									
							
							if($resul>0)
							{
								
						    while($row=mysql_fetch_array($res))
							{
								$carid=$row['car_id'];
								$user_id=$row['uid'];
						    $vname=$row['version_name'];
							$title=$row['re_title'];
							$wtgood=$row['re_wtgood'];
							$wtimprove=$row['re_wtimprove'];
							$ratemil=$row['re_ratemil'];
							$mcity=$row['re_mcity'];
							$mhighway=$row['re_mhighway'];
							$rexterior=$row['re_exterior'];
				            $rateext=$row['re_rateext'];
						    $rinterior=$row['re_interior'];
						    $ratein=$row['re_ratein'];
							$otherco=$row['re_other'];
							 $overall=$row['re_overall'];
				
				     		
							?>
							<br>
    	<div style="width:530px;border:2px;border:2px solid black;margin-left:1cm" >
				
				<table>
                    <?php
						$sqlus="select * from user_login where uid=$user_id";
						$resus=mysql_query($sqlus);
						$rowus=mysql_fetch_array($resus);
						
					?>
				      <tr>
					    <td align="center"><font size="4">Review By <?php echo " ".$rowus['fname']." ".$rowus['lname'];?></font></td>
					  </tr>
						   
							<tr>
							    <td>Over All Car Rating:</td>
								<td>
							   <div class="acidjs-rating-stars">
                                        <input type="radio" disabled="disabled"   value="5" <?php if($overall==5) echo "checked";?> /><label ></label>
                                        <input type="radio" disabled="disabled"   value="4" <?php if($overall==4) echo "checked";?> /><label ></label>
                                        <input type="radio" disabled="disabled"   value="3" <?php if($overall==3) echo "checked";?>/><label ></label>
                                        <input type="radio" disabled="disabled"   value="2" <?php if($overall==2) echo "checked";?> /><label ></label>
                                        <input type="radio" disabled="disabled"    value="1" <?php if($overall==1) echo "checked";?> /><label  ></label>       
                                   </div>
							  </td>

							</tr>
							<tr>
							  
							   <td>Interior:</td>
							   <td colspan="2">
							   	   <div class="acidjs-rating-stars">
                
                                        <input type="radio"  disabled="disabled"  value="5" <?php if($ratein==5) echo "checked";?> /><label ></label>
                                        <input type="radio" disabled="disabled"  value="4" <?php if($ratein==4) echo "checked";?> /><label ></label>
                                        <input type="radio" disabled="disabled"  value="3" <?php if($ratein==3) echo "checked";?>/><label ></label>
                                        <input type="radio"  disabled="disabled"  value="2" <?php if($ratein==2) echo "checked";?> /><label ></label>
                                        <input type="radio" disabled="disabled"   value="1" <?php if($ratein==1) echo "checked";?> /><label ></label>
				
            
                                   </div>
							  </td>
							   
							</tr>
							<tr>
							  
                                <td>Exterior:</td>
							<td colspan="2">
							<div class="acidjs-rating-stars">
                
                                        <input type="radio" disabled="disabled"   value="5" <?php if($rateext==5) echo "checked";?> /><label ></label>
                                        <input type="radio" disabled="disabled"   value="4" <?php if($rateext==4) echo "checked";?> /><label ></label>
                                        <input type="radio"  disabled="disabled"  value="3" <?php if($rateext==3) echo "checked";?>/><label ></label>
                                        <input type="radio" disabled="disabled"   value="2" <?php if($rateext==2) echo "checked";?> /><label ></label>
                                        <input type="radio" disabled="disabled"   value="1" <?php if($rateext==1) echo "checked";?> /><label ></label>
				
            
                                   </div>
							  </td>
							 
							</tr>
							<tr>
							  
                                <td>Mileage:</td>
								<td colspan="2">
   	        <div class="acidjs-rating-stars">
                
                                        <input type="radio" disabled="disabled"  value="5" <?php if($ratemil==5) echo "checked";?> /><label ></label>
                                        <input type="radio" disabled="disabled"  value="4" <?php if($ratemil==4) echo "checked";?> /><label ></label>
                                        <input type="radio" disabled="disabled"  value="3" <?php if($ratemil==3) echo "checked";?>/><label ></label>
                                        <input type="radio" disabled="disabled"  value="2" <?php if($ratemil==2) echo "checked";?> /><label ></label>
                                        <input type="radio" disabled="disabled"   value="1" <?php if($ratemil==1) echo "checked";?> /><label ></label>
				
            
                                   </div>
							  </td>
							 
							</tr>
					</table>
					
					<table>
					<?php 
							if($wtgood!=""){
								?>
							<tr>
                            <td ><font size='3'><b style='font-weight:bold;'><?php echo  "What's Good?";?></b></font>
							</td>		
							
							<td >&nbsp;&nbsp;<?php echo "$wtgood";?></td>		
							</tr>
							<?php
							}
							if($wtimprove!="")
							  {
							?>
							<tr>
                               <td><font size="3"><b style="font-weight:bold;"><?php echo "What's Improve?";?></b></font></td>							
							
                               <td>&nbsp;&nbsp;<?php echo $wtimprove;?></td>							
							</tr>
							<?php
							  }
							  if($otherco!="")
							  {
							  ?>
							<tr>
                               <td ><font size="3"><b style="font-weight:bold;"><?php echo "Other Comments";?></b></font></td>							
							
                               <td>&nbsp;&nbsp;<?php echo $otherco;?></td>							
							</tr>
							 <?php 
							 }
							?>
							<tr>
                               <td><font size="3"><b style="font-weight:bold;">Mileage City:</b></font></td>							
							
                               <td>&nbsp;&nbsp;<?php echo $mcity;?> KMPL</td>
							 </tr>
							 <tr>
							   <td><font size="3"><b style="font-weight:bold;">Mileage Highway:</b></font></td>
                               <td>&nbsp;&nbsp;<?php echo $mhighway;?> KMPL</td>   							
							</tr>
							
							<?php
							if($rexterior!="")
							{
							?>
							<tr>
                               <td><font size="3"><b style="font-weight:bold;"><?php echo "Exterior";?></b></font>
							
								</td>							
							
                               <td>&nbsp;&nbsp;<?php echo $rexterior;?></td>							
							</tr>
							<?php
							}
							if($rinterior!="")
							{
							?>
							<tr>
                               <td><font size="3"><b style="font-weight:bold;"><?php echo "Interior";?></b></font></td>		
                               <td >&nbsp;&nbsp;<?php echo $rinterior;?></td>							
							</tr>
							<?php
							}
							?>
				</table>
				<br>
				
		</div>
		<?php
							}
						}
							else{
							echo "<div style='width:530px;border:2px;margin-left:1cm;font-size:18px'>";
								echo "No Review For ".$row2['version_name'];
							echo "</div>";
							echo "</br>";
							}
				  
				     
							?>
							<br>
	  <div class="clear"></div>
	  
</div>

  <div class="clear"></div>
  </div>
  <br>
  <br>
	
<?php
	include("master3.php");
?>
		