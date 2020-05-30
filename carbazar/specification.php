<?php
	if((!isset($_GET['vid']))){
		header("location:index.php");
	}
	include("master1.php")
?>

<link href="css/c/btnh.css" rel="stylesheet" type="text/css" media="all" />
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
				echo "<a href='specification.php?vid=$vid' id='popUpYes' style='background-color:white'>Specifications</a>&nbsp;";
				echo "<a href='features.php?vid=$vid' id='popUpYes'>Features</a>&nbsp;";
				echo "<a href='dimensions.php?vid=$vid'  id='popUpYes'>Dimensions</a>&nbsp;";
				echo "<a href='version_review.php?vid=$vid'  id='popUpYes'>Reviews</a>";
				?>
				<br>
				<br>
				<?php
					$sqleng="select * from car_engine where v_id=$vid";
					$reseng=mysql_query($sqleng);
					$roweng=mysql_fetch_array($reseng);
										  $engtype=$roweng['engine_type'];
					                      $engdec=$roweng['engine_description'];
					                      $engdis=$roweng['engine_displacement'];
					                      $nocyl=$roweng['no_cylinders'];
					                      $maxpower=$roweng['maximum_power'];
										  $maxtorque=$roweng['maximum_torque'];
					                      $valvespercyl=$roweng['valves_per_cylinder'];
					                      $valveconfi=$roweng['valve_configuration'];
					                      $fssystem=$roweng['fuel_supply_system'];
					                      $bxstroke=$roweng['bore_x_stroke'];
										  $compressratio=$roweng['compression_ratio'];
					                      $tcharger=$roweng['turbo_charger'];
					                      $scharger=$roweng['super_charger'];
				?>
				
			
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
							<tr>
								<td colspan="2">ENGINE</td>
							</tr>
					
							 <tr>
			                    <td width="50%">Engine Type</td>
								<td><?php echo $engtype;?></td>
					         </tr>  
					         <tr>	  
					            <td>Engine Description</td>
								<td><?php echo $engdec;?></td>
                             </tr>
                             <tr>					 
						       <td>Engine Displacement(cc)</td>
							   <td><?php echo $engdis;?></td>
                             </tr>
                             <tr>					  
						       <td>No.of Cylinders</td>
							   <td><?php echo $nocyl;?></td>
						     </tr>
                             <tr>
						        <td>Maximum Power</td>
								<td><?php echo $maxpower;?></td>
			                 </tr>
							 <tr>
						        <td>Maximum Torque</td>
								<td><?php echo $maxtorque;?></td>
			                 </tr>
							 <tr>
						        <td>Valves Per Cylinder</td>
								<td><?php echo $valvespercyl;?></td>
			                 </tr>
							 <tr>
						        <td>Valve Configuration</td>
								<td><?php echo  $valveconfi;?></td>
			                 </tr>
							 <tr>
						        <td>Fuel Supply System</td>
								<td><?php echo $fssystem;?></td>
			                 </tr>
							  <tr>
						        <td>Bore x Stroke</td>
								<td><?php echo $bxstroke;?></td>
								
			                 </tr>
							  <tr>
						        <td>Compression Ratio</td>
								<td><?php echo $compressratio;?></td>
			                 </tr>
							  <tr>
						        <td>Turbo Charger</td>
								<td><?php echo $tcharger;?></td>
			                 </tr>
							  <tr>
						        <td>Super Charger</td>
								<td><?php echo $scharger;?></td>
			                 </tr>
				</table>
				
				<br>
				
				<?php
					$sqltrans="select * from car_transmission where v_id=$vid";
					$restrans=mysql_query($sqltrans);
					$rowtrans=mysql_fetch_array($restrans);
					
										  $transtype=$rowtrans['transmission_type'];
					                      $gearbox=$rowtrans['gear_box'];
					                      $drivetype=$rowtrans['drive_type'];
				?>
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
							<tr>
								<td colspan="2">TRANSMISSION</td>
							</tr>
							
							<tr >
			                    <td width="50%">Transmission Type</td>
								<td><?php echo $transtype;?></td>
					         </tr>  
					         <tr>	  
					            <td>Gear Box</td>
								<td><?php echo $gearbox;?></td>
                            </tr>
                            <tr>					 
						       <td>Drive Type</td>
							   <td><?php echo   $drivetype;?></td>
                            </tr>
				</table>
				
				<br>
				
				<?php
					$sqlsus="select *from car_suspension where v_id=$vid";
					$ressus=mysql_query($sqlsus);
					$rowsus=mysql_fetch_array($ressus);
					
										  $fsuspension=$rowsus['front_suspension'];
					                      $rsuspension=$rowsus['rear_suspension'];
					                      $satype=$rowsus['shock_absorbers_type'];
				?>
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
							<tr>
								<td colspan="2">SUSPENSION SYSTEM</td>
							</tr>
							 <tr >
			                    <td width="50%">Front Suspension</td>
								<td><?php echo $fsuspension;?></td>
					         </tr>  
					         <tr>	  
					            <td>Rear Suspension</td>
								<td><?php echo $rsuspension;?></td>
                            </tr>
                            <tr>					 
						       <td>Shock Absorbers Type</td>
							   <td><?php echo   $satype;?></td>
                            </tr>
				</table>
				
				<br>
				
				<?php
					$sqlst="select *from car_steering where v_id=$vid";
					$resst=mysql_query($sqlst);
					$rowst=mysql_fetch_array($resst);
					
										  $strtype=$rowst['steering_type'];
					                      $strcolumn=$rowst['steering_column'];
					                      $pstr=$rowst['power_steering'];
					                      $strgtype=$rowst['steering_gear_type'];
					                      $tradious=$rowst['turning_radious'];
									      $mfstr=$rowst['multifunction_steering'];
				?>
				
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
							<tr>
								<td colspan="2">STEERING</td>
							</tr>
							
							 <tr >
			                    <td width="50%">Steering Type</td>
								<td ><?php echo $strtype;?>
					         </tr>  
					         <tr>	  
					            <td>Steering Column</td>
								<td><?php echo $strcolumn;?></td>
                            </tr>
							<tr >
			                    <td>Power Steering</td>
								<td><?php echo $pstr;?></td>
					         </tr>  
                            <tr>					 
						       <td>Steering Gear Type</td>
							   <td><?php echo $strgtype;?></td>
                            </tr>
                            <tr>					  
						       <td>Turning Radius</td>
							   <td><?php echo $tradious;?></td>
						    </tr>
                            <tr>
						         <td>Multifunction Steering</td>
								 <td><?php echo  $mfstr;?></td>
			                 </tr>
				</table>
				
				<br>
				<?php
					$sqlbrake="select *from car_brake_system where v_id=$vid";
					$resbrake=mysql_query($sqlbrake);
					$rowbrake=mysql_fetch_array($resbrake);
						
										  $fbraketype=$rowbrake['front_brake_type'];
					                      $rbraketype=$rowbrake['rear_brake_type'];
				?>
				
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
							<tr>
								<td colspan="2">BRAKE SYSTEM</td>
							</tr>
							
							 <tr >
			                    <td width="50%">Front Brake Type</td>
								<td><?php echo $fbraketype;?></td>
					         </tr>  
					         <tr>	  
					            <td>Rear Brake Type</td>
								<td><?php echo $rbraketype;?></td>
                            </tr>
				</table>
				
				<br>
				<?php
					$sqlper="select * from  car_performance where v_id=$vid";
					$resper=mysql_query($sqlper);
					$rowper=mysql_fetch_array($resper);
					
					                      $topspeed=$rowper['top_speed'];
					                      $acceleration=$rowper['acceleration'];
				?>
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
							<tr>
								<td colspan="2">PERFORMANCE</td>
							</tr>
							
							<tr >
			                    <td width="50%">Top Speed</td>
								<td><?php echo $topspeed;?>
					         </tr>  
					         <tr>	  
					            <td>Acceleration (0-100 kmph)</td>
								<td><?php echo $acceleration;?></td>
                            </tr>
				</table>
				
				<br>
				<?php
					$sqlfuel="select * from  car_fuel where v_id=$vid";
					$resfuel=mysql_query($sqlfuel);
					$rowfuel=mysql_fetch_array($resfuel);
					
										  $mc=$rowfuel['mileage_city'];
					                      $mh=$rowfuel['mileage_highway'];
					                      $ft=$rowfuel['fuel_type'];
					                      $fc=$rowfuel['fuel_capacity'];
					                       $enc=$rowfuel['emission_norm_compliance'];
				?>
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
							<tr>
								<td colspan="2">FUEL</td>
							</tr>
							
							 <tr >
			                    <td width="50%">Mileage-City</td>
								<td><?php echo $mc;?></td>
					         </tr>  
					         <tr>	  
					            <td>Mileage-Highway</td>
								<td><?php echo $mh;?></td>
								
                            </tr>
                            <tr>					 
						       <td>Fuel Type</td>
							   <td><?php echo $ft;?></td>
							   
                            </tr>
                            <tr>					  
						       <td>Fuel Tank Capacity (Litres)</td>
							   <td><?php echo $fc;?></td>
						    </tr>
                            <tr>
						         <td>Emission Norm Compliance</td>
								 <td><?php echo $enc;?></td>
			                 </tr>
				</table>
				
				<br>
				<?php
						$sqltyres="select *from car_tyres where v_id=$vid";
						$restyres=mysql_query($sqltyres);
				        $rowtyres=mysql_fetch_array($restyres);
					    	  
					                      $tyresize=$rowtyres['tyre_size'];
					                      $tyretype=$rowtyres['tyre_type'];
					                       $wheelsize=$rowtyres['wheel_size'];
					                       $allywheelsize=$rowtyres['alloy_wheel_size'];
				?>
				
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
							<tr>
								<td colspan="2">TYRES</td>
							</tr>
							
							<tr >
			                    <td width="50%">Tyre Size</td>
								<td ><?php echo $tyresize;?></td>
					         </tr>  
					         <tr>	  
					            <td>Tyre Type</td>
								<td><?php echo  $tyretype;?></td>
                            </tr>
                            <tr>					 
						       <td>Wheel Size</td>
							   <td><?php echo $wheelsize;?></td>
                            </tr>
                            <tr>					  
						       <td>Alloy Wheels Size</td>
							   <td><?php echo $allywheelsize;?></td>
						    </tr>
				</table>
				
				<br>
				<?php
					$sqlother="select *from car_other_spec where v_id=$vid";
					$resother=mysql_query($sqlother);
				    $rowother=mysql_fetch_array($resother);
					                   
					  
					                      $seatcapacity=$rowother['seating_capacity'];
					                      $noofdoor=$rowother['no_of_door'];
					                      $cargo_volume=$rowother['cargo_volume'];
				?>
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
							<tr>
								<td colspan="2">OTHER SPECIFICATIONS</td>
							</tr>
							
							  <tr >
			                    <td width="50%">Seating Capacity</td>
								<td><?php echo $seatcapacity;?></td>
					         </tr>  
					         <tr>	  
					            <td>No. of Doors</td>
								<td><?php echo  $noofdoor;?></td>
                            </tr>
                       
                           
				</table>
				
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
							<tr>
								<td colspan="2">PAYLOAD & TOWING</td>
							</tr>
							 <tr>					  
						       <td width="50%">Cargo Volume</td>
							   <td><?php echo $cargo_volume;?></td>
						    </tr>
				</table>
				
				<br>
				<?php
					 $sqldetails="select *from car_general_details where v_id=$vid";
					 $resdetails=mysql_query($sqldetails);
				     $rowdetails=mysql_fetch_array($resdetails);
					                
					                      $cassembly=$rowdetails['country_of_assembly'];
					                      $cmanufecture=$rowdetails['country_of_manufacture'];
					                       $introdate=$rowdetails['introduction_date'];
					                       $warrantytime=$rowdetails['warranty_time'];
										    $warrantydistance=$rowdetails['warranty_distance'];
				?>
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
							<tr>
								<td colspan="2">CAR DETAILS</td>
							</tr>
							
							<tr >
			                    <td width="50%">Country of Assembly</td>
								<td width="350px"><?php echo $cassembly;?></td>
					         </tr>  
					         <tr>	  
					            <td>Country of Manufacture</td>
								<td><?php echo  $cmanufecture;?></td>
                            </tr>
                            <tr>					 
						       <td>Introduction Date</td>
							   <td><?php echo $introdate;?></td>
                            </tr>
                            <tr>					  
						       <td>Warranty Time</td>
							   <td><?php echo $warrantytime;?></td>
						    </tr>
							
                            <tr>					  
						       <td>Warranty Distance</td>
							   <td><?php echo $warrantydistance;?></td>
						    </tr>
				</table>
				<br>
				</div>
	  <div class="clear"></div>
	  
</div>

  <div class="clear"></div>
  <br>
  <br>
	
<?php
	include("master3.php");
?>
	