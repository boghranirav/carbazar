<?php
	include("master1.php");
?>

<link href="button.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="styles/RatingStars.css" />
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
			<a href="index_3.html" class="button">My Reviews</a>
			
			<a href="change_pass.php" class="button">Change Password</a>
			<a href="my_car_photos.php" class="button">My Car Photos</a>
			<hr color="lightblue" size="1">
			
	
<div class="main">
<br>
				<div style="background:#f7f7f7;width:800px;">
				<br>
	           		<h4 class="title">&nbsp;&nbsp;My Reviews</h4>
					<br>
					
						<?php
 
					
 $num_rec=1;
include("connection.php");

if(isset($_GET['page'])){
	$page=$_GET["page"];
}
else
{
	$page=1;
}
					
				
					$start_from=($page-1)*$num_rec;	
					$u_id=$_SESSION['usersession'];
		
		$sqluser="select * from user_login where email='$u_id'";
		$resuser=mysql_query($sqluser);
		$rowuser=mysql_fetch_array($resuser);
		$uid=$rowuser['uid'];
		
						    $sql="select cr.car_id,uid,rid,re_wtgood,re_title,re_wtimprove,re_ratemil,re_mcity,re_mhighway,re_exterior,re_rateext,re_interior,re_ratein,re_other,re_overall,version_name from car_review cr,car_version cv where cr.v_id=cv.v_id and uid=$uid LIMIT $start_from,$num_rec";
							
				 
						    $res=mysql_query($sql);
							$resul=mysql_num_rows($res);
									
							
							if($resul>0)
							{
								
						    while($row=mysql_fetch_array($res))
							{
							$r_id=$row['rid'];
							$carid=$row['car_id'];
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
    	  <div style="width:530px;border:2px;border: 2px solid #4cb1ca;margin-left:1cm" >
				       
				      
						   
							<table class="CSSTableGenerator">
							
							<tr>
							<td colspan="4" align="center"><br><font size="5"><b style="font-weight:bold;">
							<?php echo $vname;?>
							<br>
							<a href="delete_my_review.php?rid=<?php echo $r_id;?>" style="font-size:18px;color:yellow;">Delete This Review</a>
							</b></font></td>
							
							</tr>
							
							<tr>
							   <?php $sqlp="select * from photos where car_id=$carid";
					             	 $resp=mysql_query($sqlp);
						             $rowp=mysql_fetch_array($resp);
					               	$imgsrc="admin/upload_car/image/".$rowp['name'];?>
							   <td rowspan="4"  valign="middle"  ><br>&nbsp;&nbsp;<img src="<?php echo $imgsrc;?>" height="100" width="100" style="border:2px solid black"></td>
							   
							    <td><br>&nbsp;&nbsp;Over All Car Rating:</td>
									<td colspan="2"><br>
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
							  
							   <td>&nbsp;&nbsp;Interior:</td>
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
							  
                                <td>&nbsp;&nbsp;Exterior:</td>
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
							  
                                <td>&nbsp;&nbsp;Mileage:</td>
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
                            <td colspan='4'><br><font size='3'><b style='font-weight:bold;'><?php echo  "What's Good?";?></b></font></td>					
							
							
							
							<tr>
							<td colspan='4'>&nbsp;&nbsp;<?php echo "$wtgood";?></td>		
							</tr>
							<?php
							}
							if($wtimprove!="")
							  {
							?>
							<tr>
                               <td colspan="4"><br><font size="3"><b style="font-weight:bold;"><?php echo "What's Improve?";?></b></font></td>							
							</tr>
							<tr>
                               <td colspan="4">&nbsp;&nbsp;<?php echo $wtimprove;?></td>							
							</tr>
							<?php
							  }
							  if($otherco!="")
							  {
							  ?>
							<tr>
                               <td colspan="4"><br><font size="3"><b style="font-weight:bold;"><?php echo "Other Comments";?></b></font></td>							
							</tr>
							<tr>
                               <td colspan="4">&nbsp;&nbsp;<?php echo $otherco;?></td>							
							</tr>
							 <?php 
							 }
							?>
							<tr>
                               <td><br><font size="3"><b style="font-weight:bold;">Mileage City:</b></font></td>							
							
                               <td><br>&nbsp;&nbsp;<?php echo $mcity;?> KMPL</td>
							   <td><br>&nbsp;&nbsp;<font size="3"><b style="font-weight:bold;">Mileage Highway:</b></font></td>
                               <td><br>&nbsp;&nbsp;<?php echo $mhighway;?> KMPL</td>   							
							</tr>
							<?php
							if($rexterior!="")
							{
							?>
							<tr>
                               <td colspan="4"><br><font size="3"><b style="font-weight:bold;"><?php echo "Exterior";?></b></font>
							
								</td>							
							</tr>
							<tr>
                               <td colspan="4">&nbsp;&nbsp;<?php echo $rexterior;?></td>							
							</tr>
							<?php
							}
							if($rinterior!="")
							{
							?>
							<tr>
                               <td colspan="4"><br><font size="3"><b style="font-weight:bold;"><?php echo "Interior";?></b></font></td>							
							</tr>
							<tr>
                               <td colspan="4">&nbsp;&nbsp;<?php echo $rinterior;?></td>							
							</tr>
							<?php
							}
							?>

				
			
					</table>
					
		              </div>  
						<br>
		            
							<?php
							}
							?>
							
						
						<div style="margin-left:1cm">
							<form action="my_review.php" method="post">
						<?php
						$sql="select cr.car_id,uid,rid,re_wtgood,re_title,re_wtimprove,re_ratemil,re_mcity,re_mhighway,re_exterior,re_rateext,re_interior,re_ratein,re_other,re_overall,version_name from car_review cr,car_version cv where cr.v_id=cv.v_id and uid=$uid";
						$res=mysql_query($sql);
						$tot_rec=mysql_num_rows($res);
						$tot_page=ceil($tot_rec/$num_rec);
						?>

<style type="text/css">
.stylish-button {
    color:#333;
    background-color:#FA2;
    border-radius:5px;
    border:none;
    font-size:16px;
    font-weight:700;
    padding:4px 16px;
   
}
</style>
<br>						
							<?php  echo "<a href='my_review.php?uid=$uid&page=1' class='stylish-button '>First</a>&nbsp;";?>								<?php
								$fi=0;
								if(isset($_GET['page'])){
											$fi=$_GET['page'];
											
										}
									for($i=1;$i<=$tot_page;$i++){
										
										if($fi!=$i){
												echo "<a href='my_review.php?uid=$uid&page=".$i."'  width='100px' class='stylish-button '>&nbsp;".  $i."&nbsp;</a>&nbsp;";
										}
										else
										{											
											echo "<a href='my_review.php?uid=$uid&page=".$i."' class='stylish-button ' style='background-color:grey'>".$i."</a>&nbsp;";
											
										}
									}
								?>
								<?php
									echo "<a href='my_review.php?uid=$uid&page=".$tot_page."' class='stylish-button ''>Last</a>";
								?>
								
							</form>
						</div>
						<br>
						<br>
						
							
							<?php
						}
							else{
								echo " <div style='width:530px;border:2px;margin-left:1cm' >";
								echo "<font size='5'>No Review Found</font>";
								echo "</div>";
							}
				  
				     
							?>
			    </div>
				
</div>				


	
</div>
	<div class="clear"></div>		

	
<?php
	include("master3.php");
?>