<?php
	include("master1.php");
?>
<title>Latest Cars</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />

<?php
	include("master2.php");
?>

<?php
if(isset($_POST['latsearch']))
     {	 				 
       
		$bid=$_POST['b_id'];
		$ld=$_POST['lmon'];
	 }
?>	
<hr size="1" color="lightgrey">
<br>




<div class="wrap">
                	<h4 class="title">
					 Latest Cars			         </h4>
			
    <form action="" method="post">
			
		<div style="width:1000px;height:100px;">
				<br>
				
            <table>
       			<tr>
	                <td>
					   <br>
					      <select name="b_id" id="b_id" class="tb" style="height:38px;margin-top:6px">
					          <option value="0">--All Brand--</option>
					            <?php
		                            			   include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$brandid=$row['brand_id'];
														$car_com=$row['car_company'];
								?>						
													<option value="<?php echo $brandid;?>" <?php if(isset($_POST['latsearch'])){
														
													if($bid==$brandid) echo "selected";}?>> <?php echo $car_com;?></option>;
													<?php
													}
													?>
							
						    </select>
				        </td>
	     			<td>
						&nbsp;&nbsp;&nbsp;
						
					</td>

					
					
						
		 				<td>
		     				<br>
			     			
                               <select class="tb" name="lmon" id="lmon"  style="height:38px;margin-top:6px">
                                   <option value="0">--Select Launch Months--</option>	
                                    
													<option value='3months'<?php if(isset($_POST['latsearch'])){
													if($ld=='3months') echo "selected";}?>>In Last 3 Months</option>;
													
													<option value='6months'<?php if(isset($_POST['latsearch'])){
													if($ld=='6months') echo "selected";}?>>In Last 6 Months</option>;
													
													<option value='1year'<?php if(isset($_POST['latsearch'])){
													if($ld=='1year') echo "selected";}?>>In Last 1 Year</option>;
																					   
							   </select>
					
						</td>
					        
						<td>
						&nbsp;&nbsp;&nbsp;
						
						</td>
						<td>
                           <br> 						
                                  <div class="button1">
                                         <input type="submit" value="SEARCH" name="latsearch" >
										 
                                      </div>
                         </td>

				</tr>
	      	</table>
			 <br>
			
         </div>			
	</form>			

				<br>
				<br>
<?php
if(isset($_POST['latsearch']))
     {	 				 
       
		$bid=$_POST['b_id'];
		$ld=$_POST['lmon'];
		if(empty($ld))
		{
	echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>Select Launch Duraction</h3>";	
		}
	else{
              if($ld=="3months")
                { $mon3=mktime(0,0,0,date("m")-3,date("d"),date("Y"));
				    $dt=date("Y-m-d",$mon3);
	
                   }
				   else if($ld=="6months")
			        {
				    $mon6=mktime(0,0,0,date("m")-6,date("d"),date("Y"));
				    $dt=date("Y-m-d",$mon6);
		            }
				  
                else if($ld=="1year")
		           {
         	         $yer=mktime(0,0,0,date("m"),date("d"),date("Y")-1);
	                  $dt=date("Y-m-d", $yer);
	       
		            	}
			

				
	//$dt=date("y-m-d");
		   
			if(empty($bid))
		{
			$sql3="select cv.v_id,cv.version_name,cm.car_id,car_name,status,body_type,introduction_date,cmk.car_company from car_model cm,car_version cv,car_general_details cg,car_make cmk where status='launched' and introduction_date>='$dt' and cm.car_id=cv.car_id and cv.v_id=cg.v_id and cm.brand_id=cmk.brand_id ";
		}
		else 
		{
			$sql3="select cv.v_id,cv.version_name,cm.car_id,car_name,status,body_type,introduction_date,cmk.car_company from car_model cm,car_version cv,car_general_details cg,car_make cmk where status='launched' and introduction_date>='$dt'  and cm.brand_id='$bid' and cm.car_id=cv.car_id and cv.v_id=cg.v_id and cm.brand_id=cmk.brand_id ";
		}
		$res3=mysql_query($sql3);
				 	
				 
				$resul=mysql_num_rows($res3);
				if($resul>0){
				 	echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>TOTAL $resul LATEST CARS MATCHING THIS CRITERIA</h3>";			 
				 while($row=mysql_fetch_array($res3)){
					 $vid=$row['v_id'];
					 $carid=$row['car_id'];
					 

					?> 
					<div  id='latest1' style='border: thin solid #4cb1ca;width:550px;'>
					 <table>
					 
					 <tr>
					 <td colspan="3"  align="center" > <font size="5"><b style="font-weight:bold;"><?php echo $row['version_name'];?></b></font></td>
					 </tr>
					 <?php
						$sqlp="select * from photos where car_id=$carid";
						$resp=mysql_query($sqlp);
						$rowp=mysql_fetch_array($resp);
						$imgsrc="admin/upload_car/image/".$rowp['name'];
					 ?>
					 <tr>
					 <td rowspan="4" width="50%"><br>&nbsp;&nbsp;&nbsp;<img src="<?php echo $imgsrc;?>" height="140" width="150" style="border:2px solid black"></td>
					 <td></td>
					 <td colspan="2"><br>
					   
					      </td>
					 
					 </tr>
					 		  
					 
					 <tr>
					    <td><br>
					    &nbsp;&nbsp;&nbsp;
					    Body Type
					    </td>
					     <td><br>
					       &nbsp;&nbsp;&nbsp;
					       <?php echo ucfirst($row['body_type']);?>
					     </td>
					
					 </tr>
					 
					 <tr>
					     <td><br>
					        &nbsp;&nbsp;&nbsp;
					        Launch Date
					     </td>
					     <td><br>
					      &nbsp;&nbsp;&nbsp;
					      <?php echo $row['introduction_date'];?>
					     </td>
					 </tr>
					 <tr>
					   <td colspan="3" align="center"><br>&nbsp;<?php echo "<a href='on_road_price_3.php?v=$vid' style='background-color:orange;height:25px'>GET ON-ROAD PRICE</a>"?><br><br></td>
					  </tr> 
					
					 
					 </table>
					
					 </div>
					 <br>
					 
					 <?php
					 
				   }
				}
				else
				{
					echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>TOTAL $resul LATEST CARS MATCHING THIS CRITERIA</h3>";
				}
			}
	   }	
	   else
	   {
	?>
	
		<?php
		
		$mon3=mktime(0,0,0,date("m")-3,date("d"),date("Y"));
		$dt=date("Y-m-d",$mon3);
		
		$sql3="select cv.v_id,cv.version_name,cm.car_id,car_name,status,body_type,introduction_date,cmk.car_company from car_model cm,car_version cv,car_general_details cg,car_make cmk where status='launched' and introduction_date>='$dt' and cm.car_id=cv.car_id and cv.v_id=cg.v_id and cm.brand_id=cmk.brand_id ";
				 $res3=mysql_query($sql3);
				 	
				 
				$resul=mysql_num_rows($res3);
				if($resul>0){
				 	echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>TOTAL $resul LATEST CARS FROM LAST 3 MONTH</h3>";			 
				 while($row=mysql_fetch_array($res3)){
					 $vid=$row['v_id'];
					 $carid=$row['car_id'];
					 

					?> 
					<div  id='latest1' style='border: thin solid #4cb1ca;width:550px;'>
					 <table>
					 
					 <tr>
					 <td colspan="3"  align="center" > <font size="5"><b style="font-weight:bold;"><?php echo $row['version_name'];?></b></font></td>
					 </tr>
					 <?php
						$sqlp="select * from photos where car_id=$carid";
						$resp=mysql_query($sqlp);
						$rowp=mysql_fetch_array($resp);
						$imgsrc="admin/upload_car/image/".$rowp['name'];
					 ?>
					 <tr>
					 <td rowspan="4" width="50%"><br>&nbsp;&nbsp;&nbsp;<img src="<?php echo $imgsrc;?>" height="140" width="150" style="border:2px solid black"></td>
					 
					 <td colspan="2"><br>
					   &nbsp;&nbsp;&nbsp;
					   
					 
					 </tr>
					 
					  
					 
					 <tr>
					    <td><br>
					    &nbsp;&nbsp;&nbsp;
					    Body Type
					    </td>
					     <td><br>
					       &nbsp;&nbsp;&nbsp;
					       <?php echo ucfirst($row['body_type']);?>
					     </td>
					
					 </tr>
					 
					 <tr>
					     <td><br>
					        &nbsp;&nbsp;&nbsp;
					        Launch Date
					     </td>
					     <td><br>
					      &nbsp;&nbsp;&nbsp;
					      <?php echo $row['introduction_date'];?>
					     </td>
					 </tr>
					 <tr>
					   <td colspan="3" align="center"><br>&nbsp;<?php echo "<a href='on_road_price_3.php?v=$vid' style='background-color:orange;height:25px'>GET ON-ROAD PRICE</a>"?><br><br></td>
					  </tr> 
					
					 
					 </table>
					
					 </div>
					 <br>
	
	
	<?php
				 }
				 }
	   }
	?>
				
			
	<br>	
	<br>	
	<br>	
				
				
<div class="clear"></div>

<div class="clear"></div>
		</div>
	
		

 
<?php
	include("master3.php");
?>