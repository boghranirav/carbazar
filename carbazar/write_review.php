<?php
	include("master1.php");
	
	if(isset($_SESSION['usersession'])){
	
}
else
{
	header("location:login.php");
}
?>
<title>Write Review</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" href="styles/RatingStars.css" />
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

if(isset($_POST['submit'])){
	$bd=$_POST['b_id'];
	$md=$_POST['m_id'];
	$vrid=$_POST['v_id'];
    $title=$_POST['title'];
	$wtgood=$_POST['tgood'];
	$wtimprove=$_POST['timprove'];
	$ratemil=$_POST['gp4'];
	$mcity=$_POST['mcity'];
	$mhighway=$_POST['mhighway'];
	$rexterior=$_POST['texterior'];
	$rex=$_POST['gp1'];
	$rinterior=$_POST['tinterior'];
    $rin=$_POST['gp2'];
	$ocom=$_POST['tother'];
	$overall=$_POST['gp3'];
	
	$err['bd']="";
	$err['md']="";
	$err['vrid']="";

	$err['mcity']="";
	$err['mhighway']="";
	
	if($bd=="null")
	  {
	    $err['bd']="<font color='red'>&nbsp;Choose a Brand</font>";	
    	}
    if($md=="null")
		{
			$err['md']="<font color='red'>&nbsp;Choose a Model</font>";
		}
	if($vrid=="null")
	    {
		    $err['vrid']="<font color='red'>&nbsp;&nbsp;Choose a Version</font>"; 
	    }

		 
	 if($mcity=="")
	   {
		$err['mcity']="<font color='red'>Enter Mileage</font>";
	    }
	else if(!is_numeric($mcity))
		{
		    $err['mcity']="<font color='red'>Only Digit</font>";	
		}
	else if($mcity>28)
		{
			$err['mcity']="<font color='red'>Not Valid.</font>";	
		}
	 if($mhighway=="")
	   {
		$err['mhighway']="<font color='red'>Enter Mileage</font>";
	   }
   else if(!is_numeric($mhighway))
		{
		    $err['mhighway']="<font color='red'>Only Digit</font>";	
		}
	else if($mhighway>28)
	{
			$err['mhighway']="<font color='red'>Not Valid.</font>";	
	}

		 	 
	if($err['bd']=="" && $err['md']=="" && $err['vrid']=="" && $err['mcity']=="" && $err['mhighway']=="" )
	{
		include("connection.php");
		$u_id=$_SESSION['usersession'];
		
		$sqluser="select * from user_login where email='$u_id'";
		$resuser=mysql_query($sqluser);
		$rowuser=mysql_fetch_array($resuser);
		$uid=$rowuser['uid'];
		
		$sql="insert into car_review(v_id,uid,car_id,re_title,re_wtgood,re_wtimprove,re_ratemil,re_mcity,re_mhighway,re_exterior,re_rateext,re_interior,re_ratein,re_other,re_overall)
		values($vrid,$uid,$md,'$title','$wtgood','$wtimprove',$ratemil,'$mcity','$mhighway','$rexterior',$rex,'$rinterior',$rin,'$ocom',$overall)";
		$res=mysql_query($sql);

	  if($res)
		  header("location:my_review.php");
	  
	}	
}

?>


<hr color="lightgrey" size="1">
<br>

          	<div class="wrap">
				
    	      <h4 class="title" >Write a Review</h4>
			  <br>
			  <center>
    		   <form method="post" action="#">
    			 <div style="height:800px;width:950px;" >
				
				 <table>
				 
				<tr>
				   <td width="100px">Review For </td>
				      <td><select name="b_id" id="b_id" style="width:151px;height:26px;">
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
				    <td> &nbsp;&nbsp;&nbsp;  <select name="m_id" id="m_id" style="width:151px;height:26px;">
                             <option value="null">--Select Model--</option>
                        </select>  
				    </td>
			
				    <td>&nbsp;&nbsp;&nbsp;
		    	        <select id="v_id" name="v_id" style="width:151px;height:26px;">
		                     <option value="null" >--Select Version--</option>         
		            
		                </select>
				    </td>
				 </tr>
				  <tr><td><br></td>
				  <td><?php if(isset($_POST['submit'])){ echo $err['bd'];}?></td>
				  <td>&nbsp;<?php if(isset($_POST['submit'])){ echo $err['md'];}?></td>
				  <td><?php if(isset($_POST['submit'])){ echo $err['vrid'];}?></td></tr> 
				  <tr><td><br></td></tr>
				
				<tr>
				    <td>Title</td>
				    <td colspan="3">
		             	<input type="text" name="title" class="tb" placeholder="Enter Title" maxlength="99" style="width:500px" value=<?php if(isset($_POST['submit'])){ echo $title;}?>>
				    </td>
					
			
				 </tr>
				 
			     <tr><td><br></td></tr>
				 <tr>
				    <td colspan="4">What's good?</td>
				 </tr>
                 <tr>				 
					<td colspan="4"><textarea name="tgood"  style="width:600px;height:40px;" maxlength="199"><?php if(isset($_POST['submit'])){ echo $wtgood;}?></textarea></td>
				 </tr>
               
				 <tr><td><br></td></tr>
				 
				 <tr>
				    <td colspan="4" >What can improve?</td>
				 </tr>
                 <tr>				 
					<td colspan="4"><textarea name="timprove"   style="width:600px;height:40px;"  maxlength="199"><?php if(isset($_POST['submit'])){ echo $wtimprove;}?></textarea></td>
				 </tr>
	           
				 
				 <tr><td><br></td></tr>
				 <tr>
				    <td colspan="4">Rate Mileage
					<div class="acidjs-rating-stars">
                
                      <input type="radio" name="gp4" id="group-4-0" value="5" /><label for="group-4-0"></label><!--
                    --><input type="radio" name="gp4" id="group-4-1" value="4" /><label for="group-4-1"></label><!--
                    --><input type="radio" name="gp4" id="group-4-2" value="3" checked="checked" /><label for="group-4-2"></label><!--
                    --><input type="radio" name="gp4" id="group-4-3" value="2" /><label for="group-4-3"></label><!--
                    --><input type="radio" name="gp4" id="group-4-4"  value="1" /><label for="group-4-4"></label>
				
            
                   </div>
			          </td>
				 </tr>
				 <tr><td><br></td></tr>
				 <tr>
				     <td>Mileage City</td>
					 <td align="right">  
					 <input type="text" name="mcity" class="tb" placeholder="Enter Mileage " style="width:120px" value="<?php if(isset($_POST['submit'])){ echo $mcity;}?>">
					 </td>
					 <td align="right">Mileage Highway</td>
					 <td align="right">
                          <input type="text" name="mhighway" class="tb" placeholder="Enter Mileage " style="width:120px" value="<?php if(isset($_POST['submit'])){ echo $mhighway;}?>"> 
                     </td>
				 </tr>
				 <tr><td></td>
				     <td align="center">&nbsp;&nbsp;<?php if(isset($_POST['submit'])){ echo $err['mcity'];}?></td>
					 <td></td>
					 <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($_POST['submit'])){ echo $err['mhighway'];}?></td>
    			<tr><td><br></td></tr>
				
				<tr>
				    <td colspan="4">Rate Exteriors
					<div class="acidjs-rating-stars">
                
                      <input type="radio" name="gp1" id="group-1-0" value="5" /><label for="group-1-0"></label><!--
                    --><input type="radio" name="gp1" id="group-1-1" value="4" /><label for="group-1-1"></label><!--
                    --><input type="radio" name="gp1" id="group-1-2" value="3" checked="checked" /><label for="group-1-2"></label><!--
                    --><input type="radio" name="gp1" id="group-1-3" value="2" /><label for="group-1-3"></label><!--
                    --><input type="radio" name="gp1" id="group-1-4"  value="1" /><label for="group-1-4"></label>
				
            
                   </div>
			          </td>
				 </tr>
				 
                 <tr>				 
					<td colspan="4"><textarea name="texterior"   style="width:600px;height:40px;" maxlength="199"><?php if(isset($_POST['submit'])){ echo $rexterior;}?></textarea></td>
				 </tr>
	             
                
				<tr><td><br></td></tr>
				
				<tr>
				    <td colspan="4" >Rate Interiors
					<div class="acidjs-rating-stars">
                
                      <input type="radio" name="gp2" id="group-2-0" value="5" /><label for="group-2-0"></label><!--
                    --><input type="radio" name="gp2" id="group-2-1" value="4" /><label for="group-2-1"></label><!--
                    --><input type="radio" name="gp2" id="group-2-2" value="3" checked="checked" /><label for="group-2-2"></label><!--
                    --><input type="radio" name="gp2" id="group-2-3" value="2" /><label for="group-2-3"></label><!--
                    --><input type="radio" name="gp2" id="group-2-4"  value="1" /><label for="group-2-4"></label>
				   </div>
					</td>
				 </tr>
                 <tr>				 
					<td colspan="4"><textarea name="tinterior"   style="width:600px;height:40px;" maxlength="199"><?php if(isset($_POST['submit'])){ echo $rinterior;}?></textarea></td>
				 </tr>
               
				<tr><td><br></td></tr>
				<tr>
				    <td colspan="4" >Other Comments</td>
				 </tr>
                 <tr>				 
					<td colspan="4"><textarea name="tother"   style="width:600px;height:40px;" maxlength="199"><?php if(isset($_POST['submit'])){ echo $ocom;}?></textarea></td>
				 </tr>
				
                
				<tr><td><br></td></tr>
				<tr>
				<td colspan="4">Over All
				<div class="acidjs-rating-stars">
                
                      <input type="radio" name="gp3" id="group-3-0" value="5" /><label for="group-3-0"></label><!--
                    --><input type="radio" name="gp3" id="group-3-1" value="4" /><label for="group-3-1"></label><!--
                    --><input type="radio" name="gp3" id="group-3-2" value="3"  checked="checked"/><label for="group-3-2"></label><!--
                    --><input type="radio" name="gp3" id="group-3-3" value="2" /><label for="group-3-3"></label><!--
                    --><input type="radio" name="gp3" id="group-3-4"  value="1" /><label for="group-3-4"></label>
					</div>
				</td>
				</tr>
				<tr><td><br></td></tr>
		
				
				
         
           		  <tr>
				    <td colspan="4" align="center"><button class="grey" id="reg" name="submit">Submit</button></td>
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