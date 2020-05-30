<?php
	if(!isset($_GET['carid'])){
		header("location:view2.php");
	}
	else
		if($_GET['carid']<=0){
			header("location:view2.php");
		}
	include("master1.php");
?>
<title>User Review</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" href="styles/RatingStars.css" />

 <link href="css/c/linkbtn.css" rel="stylesheet" type="text/css" media="all" />
 <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
			$(document).ready(function(){
				//alert("hello");
				
				
				
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
				
				
          		
				
				
				
			});
				
				
	</script>




<?php
	include("master2.php");
?>
<?php
$cid=$_GET['carid'];

if(isset($_POST['submit'])){
	$bd=$_POST['b_id'];
  $cid=$_POST['m_id'];
    header("location:view3.php?carid=$cid");
}
?>

<hr color="lightgrey" size="1">
<br>

<div class="wrap">
				
    	      <h4 class="title" >User Review</h4>
			  <br>
			  
			 
           
    		   <form method="post" >
                   <?php
		                            			   include("connection.php");
													$sqlvb=mysql_query("select * from car_make cm,car_model cmo where cm.brand_id=cmo.brand_id and cmo.car_id=$cid");
													$rowvb=mysql_fetch_array($sqlvb);
													$brandidvb=$rowvb['brand_id'];
													
														
					?>
    	    
                      <table>
                            <tr>
							
							    <td><br><font size="5">Review For:</font></td>
								<td><br>&nbsp;<select name="b_id" id="b_id" style="width:200px;height:35px;font-size:16px">
					                    <option value="null">--Select Brand--</option>
					                           <?php
		                            			   include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$brandid=$row['brand_id'];
														$car_com=$row['car_company'];
							                  	?>						
													<option value="<?php echo $brandid;?>" <?php if(isset($_POST['submit'])){
								
						       	                  if($bd==$brandid) echo "selected";}else if($brandidvb==$brandid){echo "selected";}?>> <?php echo $car_com;?></option>;
													<?php
													}
													?>
							
						           </select>
								   </td>
								<td><br>&nbsp;&nbsp;&nbsp;<select name="m_id" id="m_id" style="width:200px;height:35px;font-size:16px">
                                       <option value="null">--Select Model--</option>
									
                                     </select>
				        		&nbsp;&nbsp;</td>
								<td><br>&nbsp;&nbsp;<button class="grey" id="reg" name="submit">Go</button></td>
							</tr>
                  </table>
				  <br>
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
						    $sql="select distinct cr.car_id,re_wtgood,re_title,re_wtimprove,re_ratemil,re_mcity,re_mhighway,re_exterior,re_rateext,re_interior,re_ratein,re_other,re_overall,version_name from car_review cr,car_version cv where cr.car_id='$cid' and cr.v_id=cv.v_id LIMIT $start_from,$num_rec";
							
				 
						    $res=mysql_query($sql);
							$resul=mysql_num_rows($res);
									
							
							if($resul>0)
							{
								
						    while($row=mysql_fetch_array($res))
							{
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
							<div id="div1">
    	  <div style="width:540px;border:2px;border: 2px solid #4cb1ca;" id="mydiv">
				       
				        <table id="tab1">
					
						   <tr>
							<td colspan="4" align="center"><br><font size="5"><b style="font-weight:bold;"><?php echo $vname;?></b></font></td>
							
							</tr>
							
							<tr>
							   <?php $sqlp="select * from photos where car_id=$carid";
					             	 $resp=mysql_query($sqlp);
						             $rowp=mysql_fetch_array($resp);
					               	$imgsrc="admin/upload_car/image/".$rowp['name'];?>
							   <td rowspan="4"  valign="middle"  ><br>&nbsp;&nbsp;<img src="<?php echo $imgsrc;?>" height="120" width="120" style="border:2px solid black"></td>
							   
							    <td><br>&nbsp;&nbsp;Over All Car Rating:</td>
									<td colspan="2"><br>
							   	   <div class="acidjs-rating-stars">
                
                                        <input type="radio" disabled="disabled" name="gp3" value="5" <?php if($overall==5) echo "checked";?> /><label for="group-3-0"></label>
                                        <input type="radio" disabled="disabled" name="gp3" value="4" <?php if($overall==4) echo "checked";?> /><label for="group-3-1"></label>
                                        <input type="radio" disabled="disabled" name="gp3" value="3" <?php if($overall==3) echo "checked";?>/><label for="group-3-2"></label>
                                        <input type="radio" disabled="disabled" name="gp3" value="2" <?php if($overall==2) echo "checked";?> /><label for="group-3-3"></label>
                                        <input type="radio" disabled="disabled" name="gp3" value="1" <?php if($overall==1) echo "checked";?> /><label for="group-3-4"></label>
				
            
                                   </div>
							  </td>

							</tr>
							<tr>
							  
							   <td>&nbsp;&nbsp;Interior:</td>
							   <td colspan="2">
							   	   <div class="acidjs-rating-stars">
                
                                        <input type="radio"  disabled="disabled" name="gp2" value="5" <?php if($ratein==5) echo "checked";?> /><label for="group-2-0"></label>
                                        <input type="radio" disabled="disabled" name="gp2" value="4" <?php if($ratein==4) echo "checked";?> /><label for="group-2-1"></label>
                                        <input type="radio" disabled="disabled" name="gp2" value="3" <?php if($ratein==3) echo "checked";?>/><label for="group-2-2"></label>
                                        <input type="radio"  disabled="disabled" name="gp2" value="2" <?php if($ratein==2) echo "checked";?> /><label for="group-2-3"></label>
                                        <input type="radio" disabled="disabled" name="gp2"  value="1" <?php if($ratein==1) echo "checked";?> /><label for="group-2-4"></label>
				
            
                                   </div>
							  </td>
							   
							</tr>
							<tr>
							  
                                <td>&nbsp;&nbsp;Exterior:</td>
							<td colspan="2">
							   	   <div class="acidjs-rating-stars">
                
                                        <input type="radio" disabled="disabled"  name="gp1" value="5" <?php if($rateext==5) echo "checked";?> /><label for="group-1-0"></label>
                                        <input type="radio" disabled="disabled"  name="gp1" value="4" <?php if($rateext==4) echo "checked";?> /><label for="group-1-1"></label>
                                        <input type="radio"  disabled="disabled" name="gp1" value="3" <?php if($rateext==3) echo "checked";?>/><label for="group-1-2"></label>
                                        <input type="radio" disabled="disabled"  name="gp1" value="2" <?php if($rateext==2) echo "checked";?> /><label for="group-1-3"></label>
                                        <input type="radio" disabled="disabled" name="gp1" value="1" <?php if($rateext==1) echo "checked";?> /><label for="group-1-4"></label>
				
            
                                   </div>
							  </td>
							 
							</tr>
							<tr>
							  
                                <td>&nbsp;&nbsp;Mileage:</td>
								<td colspan="2">
							   	   <div class="acidjs-rating-stars">
                
                                        <input type="radio" disabled="disabled" name="gp4" value="5" <?php if($ratemil==5) echo "checked";?> /><label for="group-4-0"></label>
                                        <input type="radio" disabled="disabled" name="gp4" value="4" <?php if($ratemil==4) echo "checked";?> /><label for="group-4-1"></label>
                                        <input type="radio" disabled="disabled" name="gp4" value="3" <?php if($ratemil==3) echo "checked";?>/><label for="group-4-2"></label>
                                        <input type="radio" disabled="disabled" name="gp4" value="2" <?php if($ratemil==2) echo "checked";?> /><label for="group-4-3"></label>
                                        <input type="radio" disabled="disabled" name="gp4" value="1" <?php if($ratemil==1) echo "checked";?> /><label for="group-4-4"></label>
				
            
                                   </div>
							  </td>
							 
							</tr>
				    	</table>
							
					   <table style="margin-left:0.3cm">
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
						<br>
		             </div>
					 	</div> 
				
							<?php
							}
							?>
							
							
										<form action="view3.php" method="post">
						<?php
						$sql="select distinct cr.car_id,re_wtgood,re_title,re_wtimprove,re_ratemil,re_mcity,re_mhighway,re_exterior,re_rateext,re_interior,re_ratein,re_other,re_overall,version_name from car_review cr,car_version cv where cr.car_id='$cid' and   cr.v_id=cv.v_id";
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
							<?php  echo "<a href='view3.php?carid=$cid&page=1' class='stylish-button '>First</a>&nbsp;";?>								<?php
								$fi=0;
								if(isset($_GET['page'])){
											$fi=$_GET['page'];
											
										}
									for($i=1;$i<=$tot_page;$i++){
										
										if($fi!=$i){
												echo "<a href='view3.php?carid=$cid&page=".$i."'  width='100px' class='stylish-button '>&nbsp;".  $i."&nbsp;</a>&nbsp;";
										}
										else
										{											
											echo "<a href='view3.php?carid=$cid&page=".$i."' class='stylish-button ' style='background-color:grey'>".$i."</a>&nbsp;";
											
										}
									}
								?>
								<?php
									echo "<a href='view3.php?carid=$cid&page=".$tot_page."' class='stylish-button ''>Last</a>";
								?>
								
							</form>
							
							
							
							
						<?php	
							
						}
							else{
								
							echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>NO REVIEW FOUND FOR THIS MODEL</h3>";
							}
				  
				   
							?>
		   
		         <div class="clear"></div>
			
		    </form>
			
	  	
</div>
		
		<br>
	
	<br>
<?php
	include("master3.php");
?>