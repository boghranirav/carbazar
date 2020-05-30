<?php
	include("master1.php");
?>
<title>Compare</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" href="admin/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="admin/assets/css/main.css" />
    <link rel="stylesheet" href="admin/assets/css/theme.css" />
    <link rel="stylesheet" href="admin/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="admin/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->
 
    <!-- PAGE LEVEL STYLES -->
<link href="admin/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" /> 
 <link rel="stylesheet" href="admin/assets/plugins/social-buttons/social-buttons.css" />

<?php
	include("master2.php");
?>


	
	
<hr size="1" color="lightgrey">
<br>

<?php
if(!isset($_GET['vid'])){
	header("location:compare.php");
}

$id1=$_GET['vid'];
$id2=$_GET['vid2'];
$id3=$_GET['vid3'];
//echo $id1;
//echo $id2;

?>

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="wrap">
	    <h4 class="title">
		      Compare Cars
        </h4>
		      <div>
					            <table>
								<tr>
								<td width="310px">
								
								</td>
								<td width="330px">
								
								<div style="border:2px solid lightblue;width:300px;height:210px;margin-left:0.4cm" align="center">
								<?php
								 include("connection.php");
								 $vsql=mysql_query("select * from car_version where v_id='$id1'");
								 $vrow=mysql_fetch_array($vsql);
								$vname=$vrow['version_name'];
								$vp=$vrow['price'];
								$mid1=$vrow['car_id'];
								
								
								$sqlp="select * from photos where car_id=$mid1";
								$resp=mysql_query($sqlp);
								$rowp=mysql_fetch_array($resp);
								
								?>
								
								<img src="<?php echo 'admin/upload_car/image/'.$rowp['name']; ?>" height="150px" width="200px">
								<?php
								echo "<h3 style='font-size:18px;'>".$vname."</h3>";
								echo "Rs. ".$vp;
								?>
								</div>
								</td>
								<td>
								
								<div style="border:2px solid lightblue;width:300px;height:210px;margin-right:0.2cm" align="center">
								<?php
								 include("connection.php");
								 $vsql2=mysql_query("select *from car_version where v_id='$id2'");
								 $vrow2=mysql_fetch_array($vsql2);
								$vname2=$vrow2['version_name'];
								$vp2=$vrow2['price'];
								$mid2=$vrow2['car_id'];
								
								
								$sqlp="select * from photos where car_id=$mid2";
								$resp=mysql_query($sqlp);
								$rowp=mysql_fetch_array($resp);
								?>
								<img src="<?php echo 'admin/upload_car/image/'.$rowp['name']; ?>" height="150px" width="200px">
								<?php
								echo "<h3 style='font-size:18px;'>".$vname2."</h3>";
								echo "Rs. ".$vp2;
								?>
								</div>
								</td>
								<td>
								
								<div style="border:2px solid lightblue;width:300px;height:210px;margin-left:0.2cm" align="center">
								<?php
								 include("connection.php");
								 $vsql3=mysql_query("select * from car_version where v_id='$id3'");
								 $vrow3=mysql_fetch_array($vsql3);
								$vname3=$vrow3['version_name'];
								$vp3=$vrow3['price'];
								$mid3=$vrow3['car_id'];
								
								
								$sqlp="select * from photos where car_id=$mid3";
								$resp=mysql_query($sqlp);
								$rowp=mysql_fetch_array($resp);
								?>
								<img src="<?php echo 'admin/upload_car/image/'.$rowp['name']; ?>" height="150px" width="200px">
								<?php
								echo "<h3 style='font-size:18px;'>".$vname3."</h3>";
								echo "Rs. ".$vp3;
								?>
								</div>
								</td>
								
								</tr>
				           	  </table>
					        </div>
		  <div class="box"  style="width:1250px;" id="eng">
						<header>
                                <h5>ENGINE</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover" id="engine" style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_engine where v_id='$id1'");
				                	 $row=mysql_fetch_array($sql);
					                 
					  
					                      $engtype=$row['engine_type'];
					                      $engdec=$row['engine_description'];
					                      $engdis=$row['engine_displacement'];
					                      $nocyl=$row['no_cylinders'];
					                      $maxpower=$row['maximum_power'];
										  $maxtorque=$row['maximum_torque'];
					                      $valvespercyl=$row['valves_per_cylinder'];
					                      $valveconfi=$row['valve_configuration'];
					                      $fssystem=$row['fuel_supply_system'];
					                      $bxstroke=$row['bore_x_stroke'];
										  $compressratio=$row['compression_ratio'];
					                      $tcharger=$row['turbo_charger'];
					                      $scharger=$row['super_charger'];
					                    
					               $sql2=mysql_query("select *from car_engine where v_id='$id2'");
					   
					                $row2=mysql_fetch_array($sql2);
					                   
					                     $engtype2=$row2['engine_type'];
					                      $engdec2=$row2['engine_description'];
					                      $engdis2=$row2['engine_displacement'];
					                      $nocyl2=$row2['no_cylinders'];
					                      $maxpower2=$row2['maximum_power'];
										  $maxtorque2=$row2['maximum_torque'];
					                      $valvespercyl2=$row2['valves_per_cylinder'];
					                      $valveconfi2=$row2['valve_configuration'];
					                      $fssystem2=$row2['fuel_supply_system'];
					                      $bxstroke2=$row2['bore_x_stroke'];
										  $compressratio2=$row2['compression_ratio'];
					                      $tcharger2=$row2['turbo_charger'];
					                      $scharger2=$row2['super_charger'];
										  
							
                                     $sql3=mysql_query("select *from car_engine where v_id='$id3'");
					   
					                $row3=mysql_fetch_array($sql3);
					                   
					                     $engtype3=$row3['engine_type'];
					                      $engdec3=$row3['engine_description'];
					                      $engdis3=$row3['engine_displacement'];
					                      $nocyl3=$row3['no_cylinders'];
					                      $maxpower3=$row3['maximum_power'];
										  $maxtorque3=$row3['maximum_torque'];
					                      $valvespercyl3=$row3['valves_per_cylinder'];
					                      $valveconfi3=$row3['valve_configuration'];
					                      $fssystem3=$row3['fuel_supply_system'];
					                      $bxstroke3=$row3['bore_x_stroke'];
										  $compressratio3=$row3['compression_ratio'];
					                      $tcharger3=$row3['turbo_charger'];
					                      $scharger3=$row3['super_charger'];   
					   
		          	               ?>
			                 <tr>
			                    <td width="300px">Engine Type</td><td width="350px"><?php echo $engtype;?></td><td width="350px"><?php echo $engtype2;?></td><td width="350px"><?php echo $engtype3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Engine Description</td><td><?php echo $engdec;?></td><td><?php echo $engdec2;?></td><td><?php echo $engdec3;?></td>
                             </tr>
                             <tr>					 
						       <td>Engine Displacement(cc)</td><td><?php echo $engdis;?></td><td><?php echo $engdis2;?></td><td><?php echo $engdis3;?></td>
                             </tr>
                             <tr>					  
						       <td>No.of Cylinders</td><td><?php echo $nocyl;?></td><td><?php echo $nocyl2;?></td><td><?php echo $nocyl3;?></td>
						     </tr>
                             <tr>
						        <td>Maximum Power</td><td><?php echo $maxpower;?></td><td><?php echo $maxpower2;?></td><td><?php echo $maxpower3;?></td>
			                 </tr>
							 <tr>
						        <td>Maximum Torque</td><td><?php echo $maxtorque;?></td><td><?php echo $maxtorque2;?></td>
								<td><?php echo $maxtorque3;?></td>
			                 </tr>
							 <tr>
						        <td>Valves Per Cylinder</td><td><?php echo $valvespercyl;?></td><td><?php echo $valvespercyl2;?></td>
								<td><?php echo $valvespercyl3;?></td>
			                 </tr>
							 <tr>
						        <td>Valve Configuration</td><td><?php echo  $valveconfi;?></td><td><?php echo $valveconfi2;?></td>
								<td><?php echo $valveconfi3;?></td>
			                 </tr>
							 <tr>
						        <td>Fuel Supply System</td><td><?php echo $fssystem;?></td><td><?php echo $fssystem2;?></td>
								<td><?php echo $fssystem3;?></td>
			                 </tr>
							  <tr>
						        <td>Bore x Stroke</td><td><?php echo $bxstroke;?></td><td><?php echo $bxstroke2;?></td>
								<td><?php echo $bxstroke3;?></td>
			                 </tr>
							  <tr>
						        <td>Compression Ratio</td><td><?php echo $compressratio;?></td><td><?php echo $compressratio2;?></td>
								<td><?php echo $compressratio3;?></td>
			                 </tr>
							  <tr>
						        <td>Turbo Charger</td><td><?php echo $tcharger;?></td><td><?php echo $tcharger2;?></td>
								<td><?php echo $tcharger3;?></td>
			                 </tr>
							  <tr>
						        <td>Super Charger</td><td><?php echo $scharger;?></td><td><?php echo $scharger2;?></td>
								<td><?php echo $scharger3;?></td>
			                 </tr>

			         </table>
					 </div>
				</div>
		  </div>
		</div>					
							
		  <div class="box"  style="width:1250px;" id="tran" >
						<header>
                                <h5>TRANSMISSION</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable1" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable1" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover" id="transmission" style="1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_transmission where v_id='$id1'");
				                	 $row=mysql_fetch_array($sql);
					                      $transtype=$row['transmission_type'];
					                      $gearbox=$row['gear_box'];
					                      $drivetype=$row['drive_type'];
					                      
					                    
					             $sql2=mysql_query("select *from car_transmission where v_id='$id2'");
					   
									$row2=mysql_fetch_array($sql2);
					                
					                      $transtype2=$row2['transmission_type'];
					                      $gearbox2=$row2['gear_box'];
					                      $drivetype2=$row2['drive_type'];
										 
								$sql3=mysql_query("select *from car_transmission where v_id='$id3'");
								$row3=mysql_fetch_array($sql3);
					                      $transtype3=$row3['transmission_type'];
					                      $gearbox3=$row3['gear_box'];
					                      $drivetype3=$row3['drive_type'];
					                     
					   
		          	               ?>
			                 <tr >
			                    <td width="300px">Transmission Type</td><td width="350px"><?php echo $transtype;?></td><td width="350px"><?php echo $transtype2;?></td>
								<td width="350px"><?php echo $transtype3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Gear Box</td><td><?php echo $gearbox;?></td><td><?php echo $gearbox2;?></td>
								<td><?php echo $gearbox3;?></td>
                            </tr>
                            <tr>					 
						       <td>Drive Type</td><td><?php echo   $drivetype;?></td><td><?php echo $drivetype2;?></td>
							   <td><?php echo $drivetype3;?></td>
                            </tr>

			         </table>
					 </div>
				</div>
		  </div>
		</div>

<div class="box"  style="width:1250px;">
						<header>
                                <h5>SUSPENSION SYSTEM</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable2" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable2" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover" style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_suspension where v_id='$id1'");
				                 $row=mysql_fetch_array($sql);
					                   
					  
					                      $fsuspension=$row['front_suspension'];
					                      $rsuspension=$row['rear_suspension'];
					                      $satype=$row['shock_absorbers_type'];
					                      
					             $sql2=mysql_query("select *from car_suspension where v_id='$id2'");
								 $row2=mysql_fetch_array($sql2);
					                   
					                      $fsuspension2=$row2['front_suspension'];
					                      $rsuspension2=$row2['rear_suspension'];
					                      $satype2=$row2['shock_absorbers_type'];
										  
								$sql3=mysql_query("select *from car_suspension where v_id='$id3'");
								$row3=mysql_fetch_array($sql3);
					                   
					                      $fsuspension3=$row3['front_suspension'];
					                      $rsuspension3=$row3['rear_suspension'];
					                      $satype3=$row3['shock_absorbers_type'];
					                   
					   
		          	               ?>
			                 <tr >
			                    <td width="300px">Front Suspension</td><td width="350px"><?php echo $fsuspension;?></td><td width="350px"><?php echo $fsuspension2;?></td>
								<td width="350px"><?php echo $fsuspension3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Rear Suspension</td><td><?php echo $rsuspension;?></td><td><?php echo $rsuspension2;?></td>
								<td><?php echo $rsuspension3;?></td>
                            </tr>
                            <tr>					 
						       <td>Shock Absorbers Type</td><td><?php echo   $satype;?></td><td><?php echo   $satype2;?></td>
							   <td><?php echo $satype3;?></td>
                            </tr>

			         </table>
					 </div>
				</div>
		  </div>
		</div>
		
	
    <div class="box"  style="width:1250px;" >
						<header>
                                <h5>STEERING</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable3" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable3" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_steering where v_id='$id1'");
				                	 $row=mysql_fetch_array($sql);
					                   
					  
					                      $strtype=$row['steering_type'];
					                      $strcolumn=$row['steering_column'];
					                      $pstr=$row['power_steering'];
					                      $strgtype=$row['steering_gear_type'];
					                      $tradious=$row['turning_radious'];
									      $mfstr=$row['multifunction_steering'];

					                   
					                  $sql2=mysql_query("select *from car_steering where v_id='$id2'");
					   
					                  $row2=mysql_fetch_array($sql2);
					                  $strtype2=$row2['steering_type'];
					                      $strcolumn2=$row2['steering_column'];
					                      $pstr2=$row2['power_steering'];
					                      $strgtype2=$row2['steering_gear_type'];
					                      $tradious2=$row2['turning_radious'];
									      $mfstr2=$row2['multifunction_steering'];
										  
									$sql3=mysql_query("select *from car_steering where v_id='$id3'");
					   
					                  $row3=mysql_fetch_array($sql3);
					                  $strtype3=$row3['steering_type'];
					                      $strcolumn3=$row3['steering_column'];
					                      $pstr3=$row3['power_steering'];
					                      $strgtype3=$row3['steering_gear_type'];
					                      $tradious3=$row3['turning_radious'];
									      $mfstr3=$row3['multifunction_steering'];
					                     
					   
		          	               ?>
			                 <tr >
			                    <td width="300px">Steering Type</td><td width="350px"><?php echo $strtype;?></td><td width="350px"><?php echo $strtype2;?></td>
								<td width="350px"><?php echo $strtype3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Steering Column</td><td><?php echo $strcolumn;?></td><td><?php echo $strcolumn2;?></td>
								<td><?php echo $strcolumn3;?></td>
                            </tr>
							<tr >
			                    <td>Power Steering</td><td><?php echo $pstr;?></td><td><?php echo $pstr2;?></td>
								<td><?php echo $pstr3;?></td>
					         </tr>  
                            <tr>					 
						       <td>Steering Gear Type</td><td><?php echo $strgtype;?></td><td><?php echo $strgtype2;?></td>
							   <td><?php echo $strgtype3;?></td>
                            </tr>
                            <tr>					  
						       <td>Turning Radius</td><td><?php echo $tradious;?></td><td><?php echo $tradious2;?></td>
							   <td><?php echo $tradious3;?></td>
						    </tr>
                            <tr>
						         <td>Multifunction Steering</td><td><?php echo  $mfstr;?></td><td><?php echo  $mfstr2;?></td>
								 <td><?php echo  $mfstr3;?></td>
			                 </tr>
			         </table>
					 </div>
				</div>
		  </div>
		</div>	
							
				

<div class="box"  style="width:1250px;" >
						<header>
                                <h5>BRAKE SYSTEM</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable4" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable4" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_brake_system where v_id='$id1'");
				                	 $row=mysql_fetch_array($sql);
					                   
					                      $fbraketype=$row['front_brake_type'];
					                      $rbraketype=$row['rear_brake_type'];
					                   
									$sql2=mysql_query("select *from car_brake_system where v_id='$id2'");
									$row2=mysql_fetch_array($sql2);
					                    $fbraketype2=$row2['front_brake_type'];
					                      $rbraketype2=$row2['rear_brake_type'];          
										  
									$sql3=mysql_query("select *from car_brake_system where v_id='$id3'");
									$row3=mysql_fetch_array($sql3);
					                    $fbraketype3=$row3['front_brake_type'];
					                      $rbraketype3=$row3['rear_brake_type'];          
					   
		          	               ?>
			                 <tr >
			                    <td width="300px">Front Brake Type</td><td width="350px"><?php echo $fbraketype;?></td><td width="350px"><?php echo $fbraketype2;?></td>
								<td width="350px"><?php echo $fbraketype3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Rear Brake Type</td><td><?php echo $rbraketype;?></td><td><?php echo $rbraketype2;?></td>
								<td><?php echo $rbraketype3;?></td>
                            </tr>

			         </table>
					 </div>
				</div>
		  </div>
		</div>
		

<div class="box"  style="width:1250px;" >
						<header>
                                <h5>PERFORMANCE</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable5" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable5" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_performance where v_id='$id1'");
				                	 $row=mysql_fetch_array($sql);
					                      $topspeed=$row['top_speed'];
					                      $acceleration=$row['acceleration'];
					           
								$sql2=mysql_query("select *from car_performance where v_id='$id2'");
								$row2=mysql_fetch_array($sql2);
					                      $topspeed2=$row2['top_speed'];
					                      $acceleration2=$row2['acceleration'];
										  
								$sql3=mysql_query("select *from car_performance where v_id='$id3'");
								$row3=mysql_fetch_array($sql3);
					                      $topspeed3=$row3['top_speed'];
					                      $acceleration3=$row3['acceleration'];
									   
					                      					   
		          	               ?>
			                 <tr >
			                    <td width="300px">Top Speed</td><td width="350px"><?php echo $topspeed;?></td><td width="350px"><?php echo $topspeed2;?></td>
								<td width="350px"><?php echo $topspeed3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Acceleration (0-100 kmph)</td><td><?php echo $acceleration;?></td><td><?php echo $acceleration2;?></td>
								<td><?php echo $acceleration3;?></td>
							</tr>

			         </table>
					 </div>
				</div>
		  </div>
		</div>

		
	    <div class="box"  style="width:1250px;" id="fuel">
						<header>
                                <h5>FUEL</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable6" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable6" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover" id="fuel"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_fuel where v_id='$id1'");
				                $row=mysql_fetch_array($sql);
					                   
					                      $mc=$row['mileage_city'];
					                      $mh=$row['mileage_highway'];
					                      $ft=$row['fuel_type'];
					                      $fc=$row['fuel_capacity'];
					                       $enc=$row['emission_norm_compliance'];
					                  
								$sql2=mysql_query("select *from car_fuel where v_id='$id2'");
								$row2=mysql_fetch_array($sql2);
					                     $mc2=$row2['mileage_city'];
					                     $mh2=$row2['mileage_highway'];
					                      $ft2=$row2['fuel_type'];
					                      $fc2=$row2['fuel_capacity'];
					                     $enc2=$row2['emission_norm_compliance'];
										 
								$sql3=mysql_query("select *from car_fuel where v_id='$id3'");
								$row3=mysql_fetch_array($sql3);
					                     $mc3=$row3['mileage_city'];
					                     $mh3=$row3['mileage_highway'];
					                      $ft3=$row3['fuel_type'];
					                      $fc3=$row3['fuel_capacity'];
					                     $enc3=$row3['emission_norm_compliance'];
					   
		          	               ?>
			                 <tr >
			                    <td width="300px">Mileage-City</td><td width="350px"><?php echo $mc;?></td><td width="350px"><?php echo $mc2;?></td><td width="350px"><?php echo $mc3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Mileage-Highway</td><td><?php echo $mh;?></td><td><?php echo $mh2;?></td>
								<td><?php echo $mh3;?></td>
                            </tr>
                            <tr>					 
						       <td>Fuel Type</td><td><?php echo $ft;?></td><td><?php echo $ft2;?></td>
							   <td><?php echo $ft3;?></td>
                            </tr>
                            <tr>					  
						       <td>Fuel Tank Capacity (Litres)</td><td><?php echo $fc;?></td><td><?php echo $fc2;?></td>
							   <td><?php echo $fc3;?></td>
						    </tr>
                            <tr>
						         <td>Emission Norm Compliance</td><td><?php echo $enc;?></td><td><?php echo $enc2;?></td>
								 <td><?php echo $enc3;?></td>
			                 </tr>
			         </table>
					 </div>
				</div>
		  </div>
		</div>
		
		
	     <div class="box"  style="width:1250px;" >
						<header>
                                <h5>TYRES</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable7" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable7" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_tyres where v_id='$id1'");
				                $row=mysql_fetch_array($sql);
					                   
					                      $tyresize=$row['tyre_size'];
					                      $tyretype=$row['tyre_type'];
					                       $wheelsize=$row['wheel_size'];
					                       $allywheelsize=$row['alloy_wheel_size'];
					                   
					            $sql2=mysql_query("select *from car_tyres where v_id='$id2'");
					   
								$row2=mysql_fetch_array($sql2);
										$tyresize2=$row2['tyre_size'];
					                    $tyretype2=$row2['tyre_type'];
					                    $wheelsize2=$row2['wheel_size'];
					                    $allywheelsize2=$row2['alloy_wheel_size'];
										
								$sql3=mysql_query("select *from car_tyres where v_id='$id3'");
					   
								$row3=mysql_fetch_array($sql3);
										$tyresize3=$row3['tyre_size'];
					                    $tyretype3=$row3['tyre_type'];
					                    $wheelsize3=$row3['wheel_size'];
					                    $allywheelsize3=$row3['alloy_wheel_size'];
					   
		          	               ?>
			                 <tr >
			                    <td width="300px">Tyre Size</td><td width="350px"><?php echo $tyresize;?></td><td width="350px"><?php echo $tyresize2;?></td>
								<td width="350px"><?php echo $tyresize3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Tyre Type</td><td><?php echo  $tyretype;?></td><td><?php echo  $tyretype2;?></td>
								<td><?php echo  $tyretype3;?></td>
                            </tr>
                            <tr>					 
						       <td>Wheel Size</td><td><?php echo $wheelsize;?></td><td><?php echo $wheelsize2;?></td>
							   <td><?php echo $wheelsize3;?></td>
                            </tr>
                            <tr>					  
						       <td>Alloy Wheels Size</td><td><?php echo $allywheelsize;?></td><td><?php echo $allywheelsize2;?></td>
							   <td><?php echo $allywheelsize3;?></td>
						    </tr>
			         </table>
					 </div>
				</div>
		  </div>
		</div>

     <div class="box"  style="width:1250px;" >
						<header>
                                <h5>OTHER SPECIFICATIONS</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable8" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable8" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_other_spec where v_id='$id1'");
				                	 $row=mysql_fetch_array($sql);
					                   
					                      $seatcapacity=$row['seating_capacity'];
					                      $noofdoor=$row['no_of_door'];
					                      
					                       $cargo_volume=$row['cargo_volume'];
					                     
									$sql2=mysql_query("select *from car_other_spec where v_id='$id2'");
					   
					                $row2=mysql_fetch_array($sql2);
					                      $seatcapacity2=$row2['seating_capacity'];
					                      $noofdoor2=$row2['no_of_door'];
					                      $cargo_volume2=$row2['cargo_volume'];
										  
									$sql3=mysql_query("select *from car_other_spec where v_id='$id3'");
					   
					                $row3=mysql_fetch_array($sql3);
					                      $seatcapacity3=$row3['seating_capacity'];
					                      $noofdoor3=$row3['no_of_door'];
					                      $cargo_volume3=$row3['cargo_volume'];
									   										   
					   
		          	               ?>
			                 <tr >
			                    <td width="300px">Seating Capacity</td><td width="350px"><?php echo $seatcapacity;?></td><td width="350px"><?php echo $seatcapacity2;?></td>
								<td width="350px"><?php echo $seatcapacity3;?></td>
					         </tr>  
					         <tr>	  
					            <td>No. of Doors</td><td><?php echo  $noofdoor;?></td><td><?php echo  $noofdoor2;?></td>
								<td><?php echo  $noofdoor3;?></td>
                            </tr>
                       
                            <tr>					  
						       <td>Cargo Volume</td><td><?php echo $cargo_volume;?></td><td><?php echo $cargo_volume2;?></td>
							   <td><?php echo $cargo_volume3;?></td>
						    </tr>
			         </table>
					 </div>
				</div>
		  </div>
		</div>
				
		
		
     <div class="box"  style="width:1250px;" >
						<header>
                                <h5>GENERAL CAR DETAILS</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable9" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable9" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_general_details where v_id='$id1'");
				                $row=mysql_fetch_array($sql);
					                   
					                      $cassembly=$row['country_of_assembly'];
					                      $cmanufecture=$row['country_of_manufacture'];
					                       $introdate=$row['introduction_date'];
					                       $warrantytime=$row['warranty_time'];
										    $warrantydistance=$row['warranty_distance'];
					                   
					               $sql2=mysql_query("select *from car_general_details where v_id='$id2'");
					               $row2=mysql_fetch_array($sql2);
					                   
                                          $cassembly2=$row2['country_of_assembly'];
					                      $cmanufecture2=$row2['country_of_manufacture'];
					                      $introdate2=$row2['introduction_date'];
					                      $warrantytime2=$row2['warranty_time'];
										  $warrantydistance2=$row2['warranty_distance'];
										  
								 $sql3=mysql_query("select *from car_general_details where v_id='$id3'");
					             $row3=mysql_fetch_array($sql3);
					                   
                                          $cassembly3=$row3['country_of_assembly'];
					                      $cmanufecture3=$row3['country_of_manufacture'];
					                      $introdate3=$row3['introduction_date'];
					                      $warrantytime3=$row3['warranty_time'];
										  $warrantydistance3=$row3['warranty_distance'];
									   
					   
		          	               ?>
			                 <tr >
			                    <td width="300px">Country of Assembly</td><td width="350px"><?php echo $cassembly;?></td><td width="350px"><?php echo $cassembly2;?></td>
								<td width="350px"><?php echo $cassembly3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Country of Manufacture</td><td><?php echo  $cmanufecture;?></td><td><?php echo  $cmanufecture2;?></td>
								<td><?php echo  $cmanufecture3;?></td>
                            </tr>
                            <tr>					 
						       <td>Introduction Date</td><td><?php echo $introdate;?></td><td><?php echo $introdate2;?></td>
							   <td><?php echo $introdate3;?></td>
                            </tr>
                            <tr>					  
						       <td>Warranty Time</td><td><?php echo $warrantytime;?></td><td><?php echo $warrantytime2;?></td>
							   <td><?php echo $warrantytime3;?></td>
						    </tr>
							
                            <tr>					  
						       <td>Warranty Distance</td><td><?php echo $warrantydistance;?></td><td><?php echo $warrantydistance2;?></td>
							   <td><?php echo $warrantydistance3;?></td>
						    </tr>
			         </table>
					 </div>
				</div>
		  </div>
		</div>
				
         <div class="box"  style="width:1250px;">
						<header>
                                <h5>COMFORT & CONVENIENCE</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable10" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable10" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_comfort_1 where v_id='$id1'");
				                $row=mysql_fetch_array($sql);
					                      
                                           $pwf=$row['power_windows_front'];
                                           $pwr=$row['power_windows_read'];
                                           $aclimate=$row['auto_climate_control'];
                                           $aqcontrol=$row['air_quality_control'];
                                           $rtopener=$row['remote_trunk_opener'];
                                           $rflid=$row['remote_fuel_lid_opener'];
                                           $lflight=$row['low_fuel_warning_light'];
                                           $apower=$row['accessory_power_outlet'];
                                           $tlight=$row['trunk_light'];
                                           $vmirror=$row['vanity_mirror'];
                                           $rrlamp=$row['rear_reading_lamp'];
                                           $rsheadrest=$row['rear_seat_headrest'];
                                           $rscarm=$row['rear_seat_center_arm_rest'];
                                           $hasbelt=$row['height_adjustable_front_seat_belts'];
										   
										
					                $sql=mysql_query("select *from car_comfort_2 where v_id='$id1'");
					   				$row=mysql_fetch_array($sql);
					                   
					                      $chf=$row['cup_holder_front'];
                                          $chr=$row['cup_holder_read'];
                                          $racvent=$row['rear_ac_vents'];
                                          $hsf=$row['heated_seat_front'];
                                          $hsr=$row['heated_seat_read'];
                                          $slumber=$row['seat_lumbar_support'];
                                          $cconrtol=$row['cruise_control'];
                                          $psensor=$row['parking_sensor'];
                                          $nsys=$row['navigation_system'];
                                          $frseat=$row['foldable_rear_seat'];
                                          $sacard=$row['smart_access_card_entry'];
                                          $esbutton=$row['engine_start_stop_button'];
                                          $gbox=$row['glove_box_cooling'];
                                          $bholder=$row['bottle_holder'];
                                          $vcontrol=$row['voice_control'];
					                     
										 
					            $sql=mysql_query("select *from car_comfort_1 where v_id='$id2'");
				                $row=mysql_fetch_array($sql);
					                      
                                           $pwf2=$row['power_windows_front'];
                                           $pwr2=$row['power_windows_read'];
                                           $aclimate2=$row['auto_climate_control'];
                                           $aqcontrol2=$row['air_quality_control'];
                                           $rtopener2=$row['remote_trunk_opener'];
                                           $rflid2=$row['remote_fuel_lid_opener'];
                                           $lflight2=$row['low_fuel_warning_light'];
                                           $apower2=$row['accessory_power_outlet'];
                                           $tlight2=$row['trunk_light'];
                                           $vmirror2=$row['vanity_mirror'];
                                           $rrlamp2=$row['rear_reading_lamp'];
                                           $rsheadrest2=$row['rear_seat_headrest'];
                                           $rscarm2=$row['rear_seat_center_arm_rest'];
                                           $hasbelt2=$row['height_adjustable_front_seat_belts'];
										   
									$sql=mysql_query("select *from car_comfort_2 where v_id='$id2'");
					   
					                $row=mysql_fetch_array($sql);
					                      $chf2=$row['cup_holder_front'];
                                          $chr2=$row['cup_holder_read'];
                                          $racvent2=$row['rear_ac_vents'];
                                          $hsf2=$row['heated_seat_front'];
                                          $hsr2=$row['heated_seat_read'];
                                          $slumber2=$row['seat_lumbar_support'];
                                          $cconrtol2=$row['cruise_control'];
                                          $psensor2=$row['parking_sensor'];
                                          $nsys2=$row['navigation_system'];
                                          $frseat2=$row['foldable_rear_seat'];
                                          $sacard2=$row['smart_access_card_entry'];
                                          $esbutton2=$row['engine_start_stop_button'];
                                          $gbox2=$row['glove_box_cooling'];
                                          $bholder2=$row['bottle_holder'];
                                          $vcontrol2=$row['voice_control'];
										  
										  
										  
										  
								$sql=mysql_query("select *from car_comfort_1 where v_id='$id3'");
				                $row=mysql_fetch_array($sql);
					                      
                                           $pwf3=$row['power_windows_front'];
                                           $pwr3=$row['power_windows_read'];
                                           $aclimate3=$row['auto_climate_control'];
                                           $aqcontrol3=$row['air_quality_control'];
                                           $rtopener3=$row['remote_trunk_opener'];
                                           $rflid3=$row['remote_fuel_lid_opener'];
                                           $lflight3=$row['low_fuel_warning_light'];
                                           $apower3=$row['accessory_power_outlet'];
                                           $tlight3=$row['trunk_light'];
                                           $vmirror3=$row['vanity_mirror'];
                                           $rrlamp3=$row['rear_reading_lamp'];
                                           $rsheadrest3=$row['rear_seat_headrest'];
                                           $rscarm3=$row['rear_seat_center_arm_rest'];
                                           $hasbelt3=$row['height_adjustable_front_seat_belts'];
										   
									$sql=mysql_query("select *from car_comfort_2 where v_id='$id3'");
					   
					                $row=mysql_fetch_array($sql);
					                      $chf3=$row['cup_holder_front'];
                                          $chr3=$row['cup_holder_read'];
                                          $racvent3=$row['rear_ac_vents'];
                                          $hsf3=$row['heated_seat_front'];
                                          $hsr3=$row['heated_seat_read'];
                                          $slumber3=$row['seat_lumbar_support'];
                                          $cconrtol3=$row['cruise_control'];
                                          $psensor3=$row['parking_sensor'];
                                          $nsys3=$row['navigation_system'];
                                          $frseat3=$row['foldable_rear_seat'];
                                          $sacard3=$row['smart_access_card_entry'];
                                          $esbutton3=$row['engine_start_stop_button'];
                                          $gbox3=$row['glove_box_cooling'];
                                          $bholder3=$row['bottle_holder'];
                                          $vcontrol3=$row['voice_control'];		  
									
					                     
								
		          	               ?>
			                 <tr >
			                    <td width="300px">Power Windows-Front</td><td width="350px"><?php echo $pwf;?></td><td width="350px"><?php echo $pwf2;?></td>
								<td width="350px"><?php echo $pwf3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Power Windows-Rear</td><td><?php echo $pwr;?></td><td><?php echo $pwr2;?></td>
								<td><?php echo $pwr3;?></td>
                            </tr>
                            <tr>					 
						       <td>Automatic Climate Control</td><td><?php echo   $aclimate;?></td><td><?php echo $aclimate2;?></td>
							   <td><?php echo $aclimate3;?></td>
                            </tr>
							<tr>	  
					            <td>Air Quality Control</td><td><?php echo $aqcontrol;?></td><td><?php echo $aqcontrol2;?></td>
								<td><?php echo $aqcontrol3;?></td>
                            </tr>
                            <tr>					 
						       <td>Remote Trunk Opener</td><td><?php echo    $rtopener;?></td><td><?php echo    $rtopener2;?></td>
							   <td><?php echo $rtopener3;?></td>
                            </tr>
							<tr>	  
					            <td>Remote Fuel Lid Opener</td><td><?php echo $rflid;?></td><td><?php echo $rflid2;?></td>
								<td><?php echo $rflid3;?></td>
                            </tr>
                            <tr>					 
						       <td>Low Fuel Warning Light</td><td><?php echo   $lflight;?></td><td><?php echo  $lflight2;?></td>
							   <td><?php echo  $lflight3;?></td>
                            </tr>
							<tr>	  
					            <td>Accessory Power Outlet</td><td><?php echo $apower;?></td><td><?php echo $apower2;?></td>
								<td><?php echo $apower3;?></td>
                            </tr>
                            <tr>					 
						       <td>Trunk Light</td><td><?php echo   $tlight;?></td><td><?php echo   $tlight2;?></td>
							   <td><?php echo   $tlight3;?></td>
                            </tr>
							<tr>	  
					            <td>Vanity Mirror</td><td><?php echo $vmirror;?></td><td><?php echo $vmirror2;?></td>
								<td><?php echo $vmirror3;?></td>
                            </tr>
                            <tr>					 
						       <td>Rear Reading Lamp</td><td><?php echo   $rrlamp;?></td><td><?php echo   $rrlamp2;?></td>
							   <td><?php echo   $rrlamp3;?></td>
                            </tr>
							<tr>					 
						       <td>Rear Seat Headrest</td><td><?php echo   $rsheadrest;?></td><td><?php echo $rsheadrest2;?></td>
							   <td><?php echo $rsheadrest3;?></td>
                            </tr>
							<tr>					 
						       <td>Rear Seat Centre Arm Rest</td><td><?php echo   $rscarm;?></td><td><?php echo  $rscarm2;?></td>
							   <td><?php echo  $rscarm3;?></td>
                            </tr>
							<tr>	  
					            <td>Height Adjustable Front Seat Belts</td><td><?php echo $hasbelt;?></td><td><?php echo $hasbelt2;?></td>
								<td><?php echo $hasbelt3;?></td>
                            </tr>
                            <tr>					 
						       <td>Cup Holders (Front)</td><td><?php echo  $chf;?></td><td><?php echo $chf2;?></td>
							   <td><?php echo $chf3;?></td>
                            </tr>
							<tr>					 
						       <td>Cup Holders (Rear)</td><td><?php echo $chr;?></td><td><?php echo $chr2;?></td>
							   <td><?php echo $chr3;?></td>
                            </tr>
							<tr>					 
						       <td>Rear A/C Vents</td><td><?php echo  $racvent;?></td><td><?php echo $racvent2;?></td>
							   <td><?php echo $racvent3;?></td>
                            </tr>
							<tr>	  
					            <td>Heated Seats (Front)</td><td><?php echo $hsf;?></td><td><?php echo $hsf2;?></td>
								<td><?php echo $hsf3;?></td>
                            </tr>
                            <tr>					 
						       <td>Heated Seats (Rear)</td><td><?php echo $hsr;?></td><td><?php echo $hsr2;?></td>
							   <td><?php echo $hsr3;?></td>
                            </tr>
							<tr>					 
						       <td>Seat Lumbar Support</td><td><?php echo $slumber;?></td><td><?php echo $slumber2;?></td>
							   <td><?php echo $slumber3;?></td>
                            </tr>
							<tr>					 
						       <td>Cruise Control</td><td><?php echo $cconrtol;?></td><td><?php echo $cconrtol2;?></td>
							   <td><?php echo $cconrtol3;?></td>
                            </tr>
							<tr>	  
					            <td>Parking Sensors</td><td><?php echo $psensor;?></td><td><?php echo $psensor2;?></td>
								<td><?php echo $psensor3;?></td>
                            </tr>
                            <tr>					 
						       <td>Navigation System</td><td><?php echo $nsys;?></td><td><?php echo $nsys2;?></td>
							   <td><?php echo $nsys3;?></td>
                            </tr>
							<tr>					 
						       <td>Foldable Rear Seat</td><td><?php echo $frseat;?></td><td><?php echo $frseat2;?></td>
							   <td><?php echo $frseat3;?></td>
                            </tr>
							<tr>					 
						       <td>Smart Access Card Entry</td><td><?php echo  $sacard;?></td><td><?php echo  $sacard2;?></td>
							   <td><?php echo  $sacard3;?></td>
                            </tr>
							<tr>	  
					            <td>Engine Start/Stop Button</td><td><?php echo $esbutton;?></td><td><?php echo $esbutton2;?></td>
								<td><?php echo $esbutton3;?></td>
                            </tr>
                            <tr>					 
						       <td>Glove Box Cooling</td><td><?php echo $gbox;?></td><td><?php echo   $gbox2;?></td>
							   <td><?php echo   $gbox3;?></td>
                            </tr>
							<tr>					 
						       <td>Bottle Holder</td><td><?php echo $bholder;?></td><td><?php echo $bholder2;?></td>
							   <td><?php echo $bholder3;?></td>
                            </tr>
							<tr>					 
						       <td>Voice Control</td><td><?php echo $vcontrol;?></td><td><?php echo $vcontrol2;?></td>
							   <td><?php echo $vcontrol2;?></td>
                            </tr>



			         </table>
					 </div>
				</div>
		  </div>
		</div>
		  
		 <div class="box"  style="width:1250px;" >
						<header>
                                <h5>INTERIOR</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable11" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable11" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_interior where v_id='$id1'");
				                $row=mysql_fetch_array($sql);
					                       $acondi=$row['ac'];
                                           $heater=$row['heater'];
                                           $ascolunm=$row['adjustable_steering_column'];
                                           $techometer=$row['techometer'];
                                           $emt=$row['electronic_multi_tripmeter'];
                                           $lseats=$row['leather_seats'];
                                           $fupholstery=$row['fabric_upholstery'];
                                           $lswheel=$row['leather_steering_wheel'];
                                           $gcompartment=$row['glove_compartment'];
                                           $dclock=$row['digital_clock'];
                                           $osdisplay=$row['outside_temprature_display'];
                                           $clightrr=$row['cigarette_lighter'];
                                           $dodometer=$row['digital_odometer'];
                                           $easeat=$row['electric_adjustable_seats'];
                                           $ftabler=$row['folding_table_in_rear'];
                                           $decontroleco=$row['driving_experience_control_eco'];
                                           $hadseat=$row['height_adjustable_driving_seat'];

			                    $sql2=mysql_query("select *from car_interior where v_id='$id2'");
								$row=mysql_fetch_array($sql2);
					                   
                                          $acondi2=$row['ac'];
                                           $heater2=$row['heater'];
                                           $ascolunm2=$row['adjustable_steering_column'];
                                           $techometer2=$row['techometer'];
                                           $emt2=$row['electronic_multi_tripmeter'];
                                           $lseats2=$row['leather_seats'];
                                           $fupholstery2=$row['fabric_upholstery'];
                                           $lswheel2=$row['leather_steering_wheel'];
                                           $gcompartment2=$row['glove_compartment'];
                                           $dclock2=$row['digital_clock'];
                                           $osdisplay2=$row['outside_temprature_display'];
                                           $clightrr2=$row['cigarette_lighter'];
                                           $dodometer2=$row['digital_odometer'];
                                           $easeat2=$row['electric_adjustable_seats'];
                                           $ftabler2=$row['folding_table_in_rear'];
                                           $decontroleco2=$row['driving_experience_control_eco'];
                                           $hadseat2=$row['height_adjustable_driving_seat'];
										   
								
								$sql3=mysql_query("select *from car_interior where v_id='$id3'");
								$row=mysql_fetch_array($sql3);
					                   
                                          $acondi3=$row['ac'];
                                           $heater3=$row['heater'];
                                           $ascolunm3=$row['adjustable_steering_column'];
                                           $techometer3=$row['techometer'];
                                           $emt3=$row['electronic_multi_tripmeter'];
                                           $lseats3=$row['leather_seats'];
                                           $fupholstery3=$row['fabric_upholstery'];
                                           $lswheel3=$row['leather_steering_wheel'];
                                           $gcompartment3=$row['glove_compartment'];
                                           $dclock3=$row['digital_clock'];
                                           $osdisplay3=$row['outside_temprature_display'];
                                           $clightrr3=$row['cigarette_lighter'];
                                           $dodometer3=$row['digital_odometer'];
                                           $easeat3=$row['electric_adjustable_seats'];
                                           $ftabler3=$row['folding_table_in_rear'];
                                           $decontroleco3=$row['driving_experience_control_eco'];
                                           $hadseat3=$row['height_adjustable_driving_seat'];
									  
		          	               ?>
			                 <tr >
			                    <td width="300px">Air Conditioner</td><td width="350px"><?php echo $acondi;?></td><td width="350px"><?php echo $acondi2;?></td>
								<td width="350px"><?php echo $acondi3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Heater</td><td><?php echo $heater;?></td><td><?php echo $heater2;?></td>
								<td><?php echo $heater3;?></td>
                            </tr>
                            <tr>					 
						       <td>Adjustable Steering Column</td><td><?php echo $ascolunm;?></td><td><?php echo $ascolunm2;?></td>
							   <td><?php echo $ascolunm3;?></td>
                            </tr>
                            <tr>					  
						       <td>Tachometer</td><td><?php echo $techometer;?></td><td><?php echo $techometer2;?></td>
							   <td><?php echo $techometer3;?></td>
						    </tr>
							
                            <tr>					  
						       <td>Electronic Multi-Tripmeter</td><td><?php echo $emt;?></td><td><?php echo $emt2;?></td>
							   <td><?php echo $emt3;?></td>
						    </tr>
						    <tr>					  
						       <td>Leather Seats</td><td><?php echo $lseats;?></td><td><?php echo $lseats2;?></td>
							   <td><?php echo $lseats3;?></td>
						    </tr>
							<tr>					  
						       <td>Fabric Upholstery</td><td><?php echo $fupholstery;?></td><td><?php echo $fupholstery2;?></td>
							   <td><?php echo $fupholstery3;?></td>
						    </tr>
						    <tr>					  
						       <td>Leather Steering Wheel</td><td><?php echo $lswheel;?></td><td><?php echo $lswheel2;?></td>
							   <td><?php echo $lswheel3;?></td>
						    </tr>
							<tr>					  
						       <td>Glove Compartment</td><td><?php echo $gcompartment;?></td><td><?php echo $gcompartment2;?></td>
							   <td><?php echo $gcompartment3;?></td>
						    </tr>
						    <tr>					  
						       <td>Digital Clock</td><td><?php echo $dclock;?></td><td><?php echo $dclock2;?></td>
							   <td><?php echo $dclock3;?></td>
						    </tr>
							<tr>					  
						       <td>Outside Temperature Display</td><td><?php echo $osdisplay;?></td><td><?php echo $osdisplay2;?></td>
							   <td><?php echo $osdisplay3;?></td>
						    </tr>
						    <tr>					  
						       <td>Cigarette Lighter</td><td><?php echo $clightrr;?></td><td><?php echo $clightrr2;?></td>
							   <td><?php echo $clightrr3;?></td>
						    </tr>
							<tr>					  
						       <td>Digital Odometer</td><td><?php echo  $dodometer;?></td><td><?php echo  $dodometer2;?></td>
							   <td><?php echo  $dodometer3;?></td>
						    </tr>
							<tr>					  
						       <td>Electric Adjustable Seats</td><td><?php echo $easeat;?></td><td><?php echo $easeat2;?></td>
							   <td><?php echo $easeat3;?></td>
						    </tr>
							<tr>					  
						       <td>Folding Table in The Rear</td><td><?php echo $ftabler;?></td><td><?php echo $ftabler2;?></td>
							   <td><?php echo $ftabler3;?></td>
						    </tr>
							<tr>					  
						       <td>Driving Experience Control Eco</td><td><?php echo $decontroleco;?></td><td><?php echo $decontroleco2;?></td>
							   <td><?php echo $decontroleco3;?></td>
						    </tr>
							<tr>					  
						       <td>Height Adjustable Driving Seat</td><td><?php echo $hadseat;?></td><td><?php echo $hadseat2;?></td>
							   <td><?php echo $hadseat3;?></td>
						    </tr>
			         </table>
					 </div>
				</div>
		  </div>
		</div>
		
		 <div class="box"  style="width:1250px;" >
						<header>
                                <h5>EXTERIOR</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable12" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable12" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_exterior_1 where v_id='$id1'");
				                $row=mysql_fetch_array($sql);
					                   
					                       		$adjust_head=$row['adjustable_headlights'];
	                                        	$fog_light_f=$row['fog_lights_front'];
                                         		$fog_light_r=$row['fog_light_rear'];
		                                        $pow_adj_r=$row['power_adjust_rear_view'];
		                                        $manual_adjust_r_m=$row['manually_adjust_rear_view'];
                                          		$ele_folding_r=$row['electric_folding_rear']; 
	                                          	$rain_sen_w=$row['rain_sensing_wiper'];
                                         		$rear_window_w=$row['rear_window_wiper'];
		                                        $rear_win_washer=$row['rear_window_washer'];
                                          		$rear_win_defog=$row["rear_window_defogger"];
                                         		$wheel_covers=$row["wheel_cover"];
                                         		$alloy_wheel=$row["alloy_wheel"];
		                                        $power_antenna=$row["power_antenna"];
					                     
								 $sql=mysql_query("select *from car_exterior_2 where v_id='$id1'");
				                $row=mysql_fetch_array($sql);
					                   
					                       		$tinted_g=$row['tinted_glass'];
												$rear_spoiler=$row['rear_spoiler'];
												$convertible=$row['convertible_top'];
												$roof_carrier=$row['roof_carrier'];
												$sun_roof=$row['sun_roof'];
												$moon_roof=$row['moon_roof'];
												$side_steeper=$row['side_stepper']; 
												$outside_mirror_i=$row['outside_rear_mirror_indicator'];
												$integrated_antenna=$row['integrated_antenna'];
												$chrome_grille=$row['chrome_grille'];
											    $chrome_garnish=$row['chrome_garnish'];
												$smoke_headlamps=$row['smoke_headlamps'];		
											    $roof_rail=$row['roof_rail'];
												
					             $sql=mysql_query("select *from car_exterior_1 where v_id='$id2'");
				                	 $row=mysql_fetch_array($sql);
					                   
					                       		$adjust_head2=$row['adjustable_headlights'];
	                                        	$fog_light_f2=$row['fog_lights_front'];
                                         		$fog_light_r2=$row['fog_light_rear'];
		                                        $pow_adj_r2=$row['power_adjust_rear_view'];
		                                        $manual_adjust_r_m2=$row['manually_adjust_rear_view'];
                                          		$ele_folding_r2=$row['electric_folding_rear']; 
	                                          	$rain_sen_w2=$row['rain_sensing_wiper'];
                                         		$rear_window_w2=$row['rear_window_wiper'];
		                                        $rear_win_washer2=$row['rear_window_washer'];
                                          		$rear_win_defog2=$row["rear_window_defogger"];
                                         		$wheel_covers2=$row["wheel_cover"];
                                         		$alloy_wheel2=$row["alloy_wheel"];
		                                        $power_antenna2=$row["power_antenna"];
					                   
					                     
										 $sql=mysql_query("select *from car_exterior_2 where v_id='$id2'");
				                	$row=mysql_fetch_array($sql);
					                   
					                       		$tinted_g2=$row['tinted_glass'];
												$rear_spoiler2=$row['rear_spoiler'];
												$convertible2=$row['convertible_top'];
												$roof_carrier2=$row['roof_carrier'];
												$sun_roof2=$row['sun_roof'];
												$moon_roof2=$row['moon_roof'];
												$side_steeper2=$row['side_stepper']; 
												$outside_mirror_i2=$row['outside_rear_mirror_indicator'];
												$integrated_antenna2=$row['integrated_antenna'];
												$chrome_grille2=$row['chrome_grille'];
											    $chrome_garnish2=$row['chrome_garnish'];
												$smoke_headlamps2=$row['smoke_headlamps'];		
											    $roof_rail2=$row['roof_rail'];
												
												
									$sql=mysql_query("select *from car_exterior_1 where v_id='$id3'");
				                	 $row=mysql_fetch_array($sql);
					                   
					                       		$adjust_head3=$row['adjustable_headlights'];
	                                        	$fog_light_f3=$row['fog_lights_front'];
                                         		$fog_light_r3=$row['fog_light_rear'];
		                                        $pow_adj_r3=$row['power_adjust_rear_view'];
		                                        $manual_adjust_r_m3=$row['manually_adjust_rear_view'];
                                          		$ele_folding_r3=$row['electric_folding_rear']; 
	                                          	$rain_sen_w3=$row['rain_sensing_wiper'];
                                         		$rear_window_w3=$row['rear_window_wiper'];
		                                        $rear_win_washer3=$row['rear_window_washer'];
                                          		$rear_win_defog3=$row["rear_window_defogger"];
                                         		$wheel_covers3=$row["wheel_cover"];
                                         		$alloy_wheel3=$row["alloy_wheel"];
		                                        $power_antenna3=$row["power_antenna"];
					                   
					                     
								   $sql=mysql_query("select *from car_exterior_2 where v_id='$id3'");
				                	$row=mysql_fetch_array($sql);
					                   
					                       		$tinted_g3=$row['tinted_glass'];
												$rear_spoiler3=$row['rear_spoiler'];
												$convertible3=$row['convertible_top'];
												$roof_carrier3=$row['roof_carrier'];
												$sun_roof3=$row['sun_roof'];
												$moon_roof3=$row['moon_roof'];
												$side_steeper3=$row['side_stepper']; 
												$outside_mirror_i3=$row['outside_rear_mirror_indicator'];
												$integrated_antenna3=$row['integrated_antenna'];
												$chrome_grille3=$row['chrome_grille'];
											    $chrome_garnish3=$row['chrome_garnish'];
												$smoke_headlamps3=$row['smoke_headlamps'];		
											    $roof_rail3=$row['roof_rail'];
												
					             
		          	               ?>
			                 <tr >
			                    <td width="300px">Adjustable Headlights</td><td width="350px"><?php echo $adjust_head;?></td><td width="350px"><?php echo $adjust_head2;?></td>
								<td width="350px"><?php echo $adjust_head3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Fog Lights (Front)</td><td><?php echo $fog_light_f;?></td><td><?php echo $fog_light_f2;?></td>
								<td><?php echo $fog_light_f3;?></td>
                            </tr>
                            <tr>					 
						       <td>Fog Lights (Rear)</td><td><?php echo $fog_light_r;?></td><td><?php echo $fog_light_r2;?></td>
								<td><?php echo $fog_light_r3;?></td>
							</tr>
                            <tr>					  
						       <td>Power Adjustable Exterior Rear View Mirror</td><td><?php echo $pow_adj_r;?></td><td><?php echo $pow_adj_r2;?></td>
							   <td><?php echo $pow_adj_r3;?></td>
						    </tr>
							
                            <tr>					  
						       <td>Manually Adjustable Ext. Rear View Mirror</td><td><?php echo $manual_adjust_r_m;?></td><td><?php echo $manual_adjust_r_m2;?></td>
							   <td><?php echo $manual_adjust_r_m3;?></td>
						    </tr>
						    <tr>					  
						       <td>Electric Folding Rear View Mirror</td><td><?php echo $ele_folding_r;?></td><td><?php echo $ele_folding_r2;?></td>
							   <td><?php echo $ele_folding_r3;?></td>
						    </tr>
							<tr>					  
						       <td>Rain Sensing Wiper</td><td><?php echo $rain_sen_w;?></td><td><?php echo $rain_sen_w2;?></td>
							   <td><?php echo $rain_sen_w3;?></td>
						    </tr>
						    <tr>					  
						       <td>Rear Window Wiper</td><td><?php echo $rear_window_w;?></td><td><?php echo $rear_window_w2;?></td>
							   <td><?php echo $rear_window_w3;?></td>
						    </tr>
							<tr>					  
						       <td>Rear Window Washer</td><td><?php echo $rear_win_washer;?></td><td><?php echo $rear_win_washer2;?></td>
							   <td><?php echo $rear_win_washer3;?></td>
						    </tr>
						    <tr>					  
						       <td>Rear Window Defogger</td><td><?php echo $rear_win_defog;?></td><td><?php echo $rear_win_defog2;?></td>
							   <td><?php echo $rear_win_defog3;?></td>
						    </tr>
							<tr>					  
						       <td>Wheel Covers</td><td><?php echo $wheel_covers;?></td><td><?php echo $wheel_covers2;?></td>
							   <td><?php echo $wheel_covers3;?></td>
						    </tr>
						    <tr>					  
						       <td>Alloy Wheels</td><td><?php echo $alloy_wheel;?></td><td><?php echo $alloy_wheel2;?></td>
							   <td><?php echo $alloy_wheel3;?></td>
						    </tr>
							<tr>					  
						       <td>Power Antenna</td><td><?php echo  $power_antenna;?></td><td><?php echo  $power_antenna2;?></td>
							   <td><?php echo  $power_antenna3;?></td>
						    </tr>
							<tr>					  
						       <td>Tinted Glass</td><td><?php echo $tinted_g;?></td><td><?php echo $tinted_g2;?></td>
							   <td><?php echo $tinted_g3;?></td>
						    </tr>
							<tr>					  
						       <td>Rear Spoiler</td><td><?php echo $rear_spoiler;?></td><td><?php echo $rear_spoiler2;?></td><td><?php echo $rear_spoiler3;?></td>
						    </tr>
							<tr>					  
						       <td>Removable/Convertible Top</td><td><?php echo $convertible;?></td><td><?php echo $convertible2;?></td>
							   <td><?php echo $convertible3;?></td>
						    </tr>
							<tr>					  
						       <td>Roof Carrier</td><td><?php echo $roof_carrier;?></td><td><?php echo $roof_carrier2;?></td>
							   <td><?php echo $roof_carrier3;?></td>
						    </tr>
							<tr>					  
						       <td>Sun Roof</td><td><?php echo $sun_roof;?></td><td><?php echo $sun_roof2;?></td>
							   <td><?php echo $sun_roof3;?></td>
						    </tr>
							<tr>					  
						       <td>Moon Roof</td><td><?php echo $moon_roof;?></td><td><?php echo $moon_roof2;?></td>
							   <td><?php echo $moon_roof3;?></td>
						    </tr>
							<tr>					  
						       <td>Side Stepper</td><td><?php echo $side_steeper;?></td><td><?php echo $side_steeper2;?></td>
							   <td><?php echo $side_steeper3;?></td>
						    </tr>
							<tr>					  
						       <td>Outside Rear View Mirror Turn Indicators</td><td><?php echo $outside_mirror_i;?></td><td><?php echo $outside_mirror_i2;?></td><td><?php echo $outside_mirror_i3;?></td>
						    </tr>
							<tr>					  
						       <td>Integrated Antenna</td><td><?php echo $integrated_antenna;?></td><td><?php echo $integrated_antenna2;?></td>
							   <td><?php echo $integrated_antenna3;?></td>
						    </tr>
							<tr>					  
						       <td>Chrome Grille</td><td><?php echo $chrome_grille2;?></td><td><?php echo $chrome_grille2;?></td>
							   <td><?php echo $chrome_grille3;?></td>
						    </tr>
							<tr>					  
						       <td>Chrome Garnish</td><td><?php echo $chrome_garnish;?></td><td><?php echo $chrome_garnish2;?></td>
							   <td><?php echo $chrome_garnish3;?></td>
						    </tr>
						 	<tr>					  
						       <td>Smoke Headlamps</td><td><?php echo $smoke_headlamps;?></td><td><?php echo $smoke_headlamps2;?></td>
							   <td><?php echo $smoke_headlamps3;?></td>
						    </tr>
							<tr>					  
						       <td>Roof Rail</td><td><?php echo $roof_rail;?></td><td><?php echo $roof_rail2;?></td>
							   <td><?php echo $roof_rail3;?></td>
						    </tr>
			         </table>
					 </div>
				</div>
		  </div>
		</div>
		
		<div class="box"  style="width:1250px;" >
						<header>
                                <h5>ENTERTAINMENT</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable13" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable13" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_entertainment where v_id='$id1'");
				                $row=mysql_fetch_array($sql);
					            
					                       $csplayer=$row['cassette_player'];
                                           $cdplayer=$row['cd_player'];
                                           $cdcharger=$row['cd_charger'];
                                           $dvdplayer=$row['dvd_player'];
                                           $cradio=$row['radio'];
                                           $asremote=$row['audio_system_remote_control'];
                                           $sf=$row['speakers_front'];
                                           $sr=$row['speakers_rear'];
                                           $iaudio=$row['integrated_2din_audio'];
                                           $bcon=$row['bluetooth_connectivity'];
                                           $uinput=$row['usb_input'];
                                           $ts=$row['touch_screen'];

							   $sql2=mysql_query("select *from car_entertainment where v_id='$id2'");
								$row=mysql_fetch_array($sql2);
					                     $csplayer2=$row['cassette_player'];
                                           $cdplayer2=$row['cd_player'];
                                           $cdcharger2=$row['cd_charger'];
                                           $dvdplayer2=$row['dvd_player'];
                                           $cradio2=$row['radio'];
                                           $asremote2=$row['audio_system_remote_control'];
                                           $sf2=$row['speakers_front'];
                                           $sr2=$row['speakers_rear'];
                                           $iaudio2=$row['integrated_2din_audio'];
                                           $bcon2=$row['bluetooth_connectivity'];
                                           $uinput2=$row['usb_input'];
                                           $ts2=$row['touch_screen'];
										   
								$sql3=mysql_query("select *from car_entertainment where v_id='$id3'");
								$row=mysql_fetch_array($sql3);
					                     $csplayer3=$row['cassette_player'];
                                           $cdplayer3=$row['cd_player'];
                                           $cdcharger3=$row['cd_charger'];
                                           $dvdplayer3=$row['dvd_player'];
                                           $cradio3=$row['radio'];
                                           $asremote3=$row['audio_system_remote_control'];
                                           $sf3=$row['speakers_front'];
                                           $sr3=$row['speakers_rear'];
                                           $iaudio3=$row['integrated_2din_audio'];
                                           $bcon3=$row['bluetooth_connectivity'];
                                           $uinput3=$row['usb_input'];
                                           $ts3=$row['touch_screen'];
									   
		          	               ?>
			                 <tr >
			                    <td width="300px">Cassette Player</td><td width="350px"><?php echo $csplayer;?></td><td width="350px"><?php echo $csplayer2;?></td>
								<td width="350px"><?php echo $csplayer3;?></td>
					         </tr>  
					         <tr>	  
					            <td>CD Player</td><td><?php echo $cdplayer;?></td><td><?php echo $cdplayer2;?></td>
								<td><?php echo $cdplayer3;?></td>
                            </tr>
                            <tr>					 
						       <td>CD Changer</td><td><?php echo $cdcharger;?></td><td><?php echo $cdcharger2;?></td>
							   <td><?php echo $cdcharger3;?></td>
                            </tr>
                            <tr>					  
						       <td>DVD Player</td><td><?php echo $dvdplayer;?></td><td><?php echo $dvdplayer2;?></td>
							   <td><?php echo $dvdplayer3;?></td>
						    </tr>
							
                            <tr>					  
						       <td>Radio</td><td><?php echo $cradio;?></td><td><?php echo $cradio2;?></td>
							   <td><?php echo $cradio3;?></td>
						    </tr>
						    <tr>					  
						       <td>Audio System Remote Control</td><td><?php echo $asremote;?></td><td><?php echo $asremote2;?></td>
							   <td><?php echo $asremote3;?></td>
						    </tr>
							<tr>					  
						       <td>Speakers Front</td><td><?php echo $sf;?></td><td><?php echo $sf2;?></td>
							   <td><?php echo $sf3;?></td>
						    </tr>
						    <tr>					  
						       <td>Speakers Rear</td><td><?php echo $sr;?></td><td><?php echo $sr2;?></td>
							   <td><?php echo $sr3;?></td>
						    </tr>
							<tr>					  
						       <td>Integrated 2DIN Audio</td><td><?php echo $iaudio;?></td><td><?php echo $iaudio2;?></td>
							   <td><?php echo $iaudio3;?></td>
						    </tr>
						    <tr>					  
						       <td>Bluetooth Connectivity</td><td><?php echo $bcon;?></td><td><?php echo $bcon2;?></td>
							   <td><?php echo $bcon3;?></td>
						    </tr>
							<tr>					  
						       <td>USB & Auxiliary Input</td><td><?php echo $uinput;?></td><td><?php echo $uinput2;?></td>
							   <td><?php echo $uinput3;?></td>
						    </tr>
						    <tr>					  
						       <td>Touch Screen</td><td><?php echo $ts;?></td><td><?php echo $ts2;?></td>
							   <td><?php echo $ts3;?></td>
						    </tr>
										   
					  </table>
					 </div>
				</div>
		  </div>
		</div>
		
	
	<div class="box"  style="width:1250px;" >
						<header>
                                <h5>EXTERIOR DIMENSIONS</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable14" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable14" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	         <?php 
 			                   include("connection.php");
					             $sql=mysql_query("select *from car_exterior_dimension where v_id='$id1'");
				                	 $row=mysql_fetch_array($sql);
					                   
					                         $c_length=$row["length"];
		                                     $c_width=$row["wiidth"];
                                     		 $c_height=$row["height"];
                                     		 $ground_clearance=$row["ground_clearance"];
                                     		 $wheel_base=$row["wheel_base"];
                                     		 $front_tread=$row["front_tread"];
                                     		 $rear_tread=$row["rear_tread"];
		                                     $kerb_weight=$row["kerb_weight"];
                                     		 $gross_weight=$row["gross_weight"];
					                    
					            $sql2=mysql_query("select *from car_exterior_dimension where v_id='$id2'");
								$row=mysql_fetch_array($sql2);
					                   
                                           $c_length2=$row["length"];
		                                     $c_width2=$row["wiidth"];
                                     		 $c_height2=$row["height"];
                                     		 $ground_clearance2=$row["ground_clearance"];
                                     		 $wheel_base2=$row["wheel_base"];
                                     		 $front_tread2=$row["front_tread"];
                                     		 $rear_tread2=$row["rear_tread"];
		                                     $kerb_weight2=$row["kerb_weight"];
                                     		 $gross_weight2=$row["gross_weight"];
											 
								$sql3=mysql_query("select *from car_exterior_dimension where v_id='$id3'");
								$row=mysql_fetch_array($sql3);
					                   
                                           $c_length3=$row["length"];
		                                     $c_width3=$row["wiidth"];
                                     		 $c_height3=$row["height"];
                                     		 $ground_clearance3=$row["ground_clearance"];
                                     		 $wheel_base3=$row["wheel_base"];
                                     		 $front_tread3=$row["front_tread"];
                                     		 $rear_tread3=$row["rear_tread"];
		                                     $kerb_weight3=$row["kerb_weight"];
                                     		 $gross_weight3=$row["gross_weight"];
								
									   
		          	               ?>
			                 <tr >
			                    <td width="300px">Length</td><td width="350px"><?php echo $c_length;?></td><td width="350px"><?php echo $c_length2;?></td>
								<td width="350px"><?php echo $c_length3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Width</td><td><?php echo $c_width;?></td><td><?php echo $c_width2;?></td>
								<td><?php echo $c_width3;?></td>
                            </tr>
                            <tr>					 
						       <td>Height</td><td><?php echo $c_height;?></td><td><?php echo $c_height2;?></td>
							   <td><?php echo $c_height3;?></td>
                            </tr>
                            <tr>					  
						       <td>Ground Clearance</td><td><?php echo $ground_clearance;?></td><td><?php echo $ground_clearance2;?></td>
							   <td><?php echo $ground_clearance3;?></td>
						    </tr>
							
                            <tr>					  
						       <td>Wheel Base</td><td><?php echo $wheel_base;?></td><td><?php echo $wheel_base2;?></td>
							   <td><?php echo $wheel_base3;?></td>
						    </tr>
						    <tr>					  
						       <td>Front Tread</td><td><?php echo $front_tread;?></td><td><?php echo $front_tread2;?></td>
							   <td><?php echo $front_tread3;?></td>
						    </tr>
							<tr>					  
						       <td>Rear Tread</td><td><?php echo $rear_tread;?></td><td><?php echo $rear_tread2;?></td>
							   <td><?php echo $rear_tread3;?></td>
						    </tr>
						    <tr>					  
						       <td>Kerb Weight</td><td><?php echo $kerb_weight;?></td><td><?php echo $kerb_weight2;?></td>
							   <td><?php echo $kerb_weight3;?></td>
						    </tr>
							<tr>					  
						       <td>Gross Weight</td><td><?php echo $gross_weight;?></td><td><?php echo $gross_weight2;?></td>
							   <td><?php echo $gross_weight3;?></td>
						    </tr>
						   
										   
					  </table>
					 </div>
				</div>
		  </div>
		</div>
		
		
		<div class="box"  style="width:1250px;">
						<header>
                                <h5>SAFETY-INFO</h5>
								<div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable15" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                     
											</a>                                   
											</div>
                                </div>

                               
                            </header>
		    <div id="sortableTable15" class="body collapse in" >
					   <div class="panel-body">
					      <div class="table-responsive">
			             <table class="table table-striped table-bordered table-hover"  style="width:1200px">
				        
      		      	                  <?php 
 			                           include("connection.php");
					                    $sql=mysql_query("select *from car_safety_1 where v_id='$id1'");
				                	   $row=mysql_fetch_array($sql);
					                    
					                     $albrake=$row['anti_lock_breaking'];
                                         $bassist=$row['brake_assist'];
                                         $centrallock=$row['central_locking'];
									     $pdlock=$row['power_door_locks'];
									     $cslock=$row['child_safety_locks'];
										 $atalarm=$row['anti_theft_alarm'];
					                     $dair=$row['driver_airbag'];
                                         $pair=$row['passanger_airbag'];
                                         $sairf=$row['side_airbag_front'];
                                         $sairr=$row['side_airbag_rear'];
                                         $nrview=$row['night_rear_view_mirror'];
                                         $psrview=$row['passenger_side_rear_mirror'];
                                         $xheadlamps=$row['xenon_headlamps'];
                                         $hheadlamps=$row['halogen_headlamps'];
                                         $rsbelts=$row['rear_seat_belts'];
                                         $sbwarn=$row['seat_bealt_warning'];
                                         $dawarn=$row['door_ajar_warning'];   
										
									$sql=mysql_query("select *from car_safety_2 where v_id='$id1'");
										$row=mysql_fetch_array($sql);
					                   
                                         $sibeam=$row['side_impact_beams'];
                                         $fibeam=$row['front_impact_beams'];
                                         $tcontrol=$row['traction_control'];
                                         $aseat=$row['adjustable_seats'];
                                         $klentry=$row['keyless_entry'];
                                         $tpmonitor=$row['tyre_pressure_monitor'];
                                         $vscontrol=$row['vehicle_stability_control'];
                                         $eimmobilizer=$row['engine_immobilizer'];
                                         $csensor=$row['crash_sensor'];
                                         $cmftank=$row['centrally_mounted_fueltank'];
                                         $ecwarn=$row['engine_check_warning'];
                                         $aheadlamp=$row['auto_headlamps'];
                                         $clock=$row['clutch_lock'];
                                         $ebd=$row['ebd'];
                                         $fmhome=$row['follow_me_home_headlamp'];
                                         $rcamera=$row['rear_camera'];
                                         $atdevice=$row['anti_theft_device'];
                                        
										 
					            $sql=mysql_query("select *from car_safety_1 where v_id='$id2'");
				                $row=mysql_fetch_array($sql);
					                  
                                           $albrake2=$row['anti_lock_breaking'];
                                         $bassist2=$row['brake_assist'];
                                         $centrallock2=$row['central_locking'];
									     $pdlock2=$row['power_door_locks'];
									     $cslock2=$row['child_safety_locks'];
										 $atalarm2=$row['anti_theft_alarm'];
					                     $dair2=$row['driver_airbag'];
                                         $pair2=$row['passanger_airbag'];
                                         $sairf2=$row['side_airbag_front'];
                                         $sairr2=$row['side_airbag_rear'];
                                         $nrview2=$row['night_rear_view_mirror'];
                                         $psrview2=$row['passenger_side_rear_mirror'];
                                         $xheadlamps2=$row['xenon_headlamps'];
                                         $hheadlamps2=$row['halogen_headlamps'];
                                         $rsbelts2=$row['rear_seat_belts'];
                                         $sbwarn2=$row['seat_bealt_warning'];
                                         $dawarn2=$row['door_ajar_warning'];			
										 
					             $sql=mysql_query("select *from car_safety_2 where v_id='$id2'");
					   
					             $row=mysql_fetch_array($sql);
					                
                                         $sibeam2=$row['side_impact_beams'];
                                         $fibeam2=$row['front_impact_beams'];
                                         $tcontrol2=$row['traction_control'];
                                         $aseat2=$row['adjustable_seats'];
                                         $klentry2=$row['keyless_entry'];
                                         $tpmonitor2=$row['tyre_pressure_monitor'];
                                         $vscontrol2=$row['vehicle_stability_control'];
                                         $eimmobilizer2=$row['engine_immobilizer'];
                                         $csensor2=$row['crash_sensor'];
                                         $cmftank2=$row['centrally_mounted_fueltank'];
                                         $ecwarn2=$row['engine_check_warning'];
                                         $aheadlamp2=$row['auto_headlamps'];
                                         $clock2=$row['clutch_lock'];
                                         $ebd2=$row['ebd'];
                                         $fmhome2=$row['follow_me_home_headlamp'];
                                         $rcamera2=$row['rear_camera'];
                                         $atdevice2=$row['anti_theft_device'];
					          
								
								$sql=mysql_query("select *from car_safety_1 where v_id='$id3'");
				                $row=mysql_fetch_array($sql);
					                  
                                         $albrake3=$row['anti_lock_breaking'];
                                         $bassist3=$row['brake_assist'];
                                         $centrallock3=$row['central_locking'];
									     $pdlock3=$row['power_door_locks'];
									     $cslock3=$row['child_safety_locks'];
										 $atalarm3=$row['anti_theft_alarm'];
					                     $dair3=$row['driver_airbag'];
                                         $pair3=$row['passanger_airbag'];
                                         $sairf3=$row['side_airbag_front'];
                                         $sairr3=$row['side_airbag_rear'];
                                         $nrview3=$row['night_rear_view_mirror'];
                                         $psrview3=$row['passenger_side_rear_mirror'];
                                         $xheadlamps3=$row['xenon_headlamps'];
                                         $hheadlamps3=$row['halogen_headlamps'];
                                         $rsbelts3=$row['rear_seat_belts'];
                                         $sbwarn3=$row['seat_bealt_warning'];
                                         $dawarn3=$row['door_ajar_warning'];			
										 
					             $sql=mysql_query("select *from car_safety_2 where v_id='$id3'");
					   
					             $row=mysql_fetch_array($sql);
					                
                                         $sibeam3=$row['side_impact_beams'];
                                         $fibeam3=$row['front_impact_beams'];
                                         $tcontrol3=$row['traction_control'];
                                         $aseat3=$row['adjustable_seats'];
                                         $klentry3=$row['keyless_entry'];
                                         $tpmonitor3=$row['tyre_pressure_monitor'];
                                         $vscontrol3=$row['vehicle_stability_control'];
                                         $eimmobilizer3=$row['engine_immobilizer'];
                                         $csensor3=$row['crash_sensor'];
                                         $cmftank3=$row['centrally_mounted_fueltank'];
                                         $ecwarn3=$row['engine_check_warning'];
                                         $aheadlamp3=$row['auto_headlamps'];
                                         $clock3=$row['clutch_lock'];
                                         $ebd3=$row['ebd'];
                                         $fmhome3=$row['follow_me_home_headlamp'];
                                         $rcamera3=$row['rear_camera'];
                                         $atdevice3=$row['anti_theft_device'];
								
								
		          	               ?>
			                 <tr >
			                    <td width="300px">Anti-Lock Braking</td><td width="350px"><?php echo $albrake;?></td><td width="350px"><?php echo $albrake2;?></td>
								<td width="350px"><?php echo $albrake3;?></td>
					         </tr>  
					         <tr>	  
					            <td>Brake Assist</td><td><?php echo $bassist;?></td><td><?php echo $bassist2;?></td>
								<td><?php echo $bassist3;?></td>
                            </tr>
                            <tr>					 
						       <td>Central Locking</td><td><?php echo  $centrallock;?></td><td><?php echo $centrallock2;?></td>
							   <td><?php echo $centrallock3;?></td>
                            </tr>
							<tr>	  
					            <td>Power Door Locks</td><td><?php echo $pdlock;?></td><td><?php echo $pdlock2;?></td>
								<td><?php echo $pdlock3;?></td>
                            </tr>
                            <tr>					 
						       <td>Child Safety Locks</td><td><?php echo $cslock;?></td><td><?php echo $cslock2;?></td>
							   <td><?php echo $cslock3;?></td>
                            </tr>
							<tr>	  
					            <td>Anti-Theft Alarm</td><td><?php echo $atalarm;?></td><td><?php echo $atalarm2;?></td>
								<td><?php echo $atalarm3;?></td>
							</tr>
                            <tr>					 
						       <td>Driver Airbag</td><td><?php echo $dair;?></td><td><?php echo $dair2;?></td>
							   <td><?php echo $dair3;?></td>
                            </tr>
							<tr>	  
					            <td>Passenger Airbag</td><td><?php echo $pair;?></td><td><?php echo $pair2;?></td>
								<td><?php echo $pair3;?></td>
                            </tr>
                            <tr>					 
						       <td>Side Airbag (Front)</td><td><?php echo $sairf;?></td><td><?php echo $sairf2;?></td>
							   <td><?php echo $sairf3;?></td>
                            </tr>
							<tr>	  
					            <td>Side Airbag (Rear)</td><td><?php echo  $sairr;?></td><td><?php echo $sairr2;?></td>
								<td><?php echo $sairr3;?></td>
                            </tr>
                            <tr>					 
						       <td>Night Rear View Mirror</td><td><?php echo $nrview;?></td><td><?php echo $nrview2;?></td>
							   <td><?php echo $nrview3;?></td>
                            </tr>
							<tr>					 
						       <td>Passenger Side Rear View Mirror</td><td><?php echo $psrview;?></td><td><?php echo $psrview2;?></td>
							   <td><?php echo $psrview3;?></td>
                            </tr>
							<tr>					 
						       <td>Xenon Headlamps</td><td><?php echo  $xheadlamps;?></td><td><?php echo $xheadlamps2;?></td>
							   <td><?php echo $xheadlamps3;?></td>
                            </tr>
							<tr>	  
					            <td>Halogen Headlamps</td><td><?php echo $hheadlamps;?></td><td><?php echo $hheadlamps2;?></td>
								<td><?php echo $hheadlamps3;?></td>
                            </tr>
                            <tr>					 
						       <td>Rear Seat Belts</td><td><?php echo $rsbelts;?></td><td><?php echo $rsbelts2;?></td>
							   <td><?php echo $rsbelts3;?></td>
                            </tr>
							<tr>					 
						       <td>Seat Belt Warning</td><td><?php echo $sbwarn;?></td><td><?php echo $sbwarn2;?></td>
							   <td><?php echo $sbwarn3;?></td>
                            </tr>
							<tr>					 
						       <td>Door Ajar Warning</td><td><?php echo  $dawarn;?></td><td><?php echo $dawarn2;?></td>
							   <td><?php echo $dawarn3;?></td>
                            </tr>
							<tr>	  
					            <td>Side Impact Beams</td><td><?php echo $sibeam;?></td><td><?php echo $sibeam2;?></td>
								<td><?php echo $sibeam3;?></td>
                            </tr>
                            <tr>					 
						       <td>Front Impact Beams</td><td><?php echo $fibeam;?></td><td><?php echo $fibeam2;?></td>
							   <td><?php echo $fibeam3;?></td>
                            </tr>
							<tr>					 
						       <td>Traction Control</td><td><?php echo $tcontrol;?></td><td><?php echo $tcontrol2;?></td>
							   <td><?php echo $tcontrol3;?></td>
                            </tr>
							<tr>					 
						       <td>Adjustable Seats</td><td><?php echo $aseat;?></td><td><?php echo $aseat2;?></td>
							   <td><?php echo $aseat3;?></td>
                            </tr>
							<tr>	  
					            <td>Keyless Entry</td><td><?php echo $klentry;?></td><td><?php echo $klentry2;?></td>
								<td><?php echo $klentry3;?></td>
                            </tr>
                            <tr>					 
						       <td>Tyre Pressure Monitor</td><td><?php echo $tpmonitor;?></td><td><?php echo $tpmonitor2;?></td>
							   <td><?php echo $tpmonitor3;?></td>
                            </tr>
							<tr>					 
						       <td>Vehicle Stability Control System</td><td><?php echo $vscontrol;?></td><td><?php echo $vscontrol2;?></td>
							   <td><?php echo $vscontrol3;?></td>
                            </tr>
							<tr>					 
						       <td>Engine Immobilizer</td><td><?php echo $eimmobilizer;?></td><td><?php echo $eimmobilizer2;?></td>
							   <td><?php echo $eimmobilizer3;?></td>
                            </tr>
                            <tr>					 
						       <td>Crash Sensor</td><td><?php echo  $csensor;?></td><td><?php echo  $csensor2;?></td>
							   <td><?php echo  $csensor3;?></td>
                            </tr>
							<tr>					 
						       <td>Centrally Mounted Fuel Tank</td><td><?php echo $cmftank;?></td><td><?php echo $cmftank2;?></td>
							   <td><?php echo $cmftank3;?></td>
                            </tr>
							<tr>					 
						       <td>Engine Check Warning</td><td><?php echo $ecwarn;?></td><td><?php echo $ecwarn2;?></td>
							   <td><?php echo $ecwarn3;?></td>
                            </tr>
							<tr>					 
						       <td>Automatic Headlamps</td><td><?php echo $aheadlamp;?></td><td><?php echo $aheadlamp2;?></td>
							   <td><?php echo $aheadlamp3;?></td>
                            </tr>
							<tr>					 
						       <td>Clutch Lock</td><td><?php echo  $clock;?></td><td><?php echo  $clock2;?></td>
							   <td><?php echo  $clock3;?></td>
                            </tr>
							<tr>					 
						       <td>EBD</td><td><?php echo  $ebd;?></td><td><?php echo  $ebd2;?></td>
							   <td><?php echo  $ebd3;?></td>
                            </tr>
							<tr>					 
						       <td>Follow Me Home Headlamps</td><td><?php echo $fmhome;?></td><td><?php echo $fmhome2;?></td>
							   <td><?php echo $fmhome3;?></td>
                            </tr>
							<tr>					 
						       <td>Rear Camera</td><td><?php echo $rcamera;?></td><td><?php echo $rcamera2;?></td>
							   <td><?php echo $rcamera3;?></td>
                            </tr>
							<tr>					 
						       <td>Anti-Theft Device</td><td><?php echo $atdevice;?></td><td><?php echo $atdevice2;?></td>
							   <td><?php echo $atdevice3;?></td>
                            </tr>



			         </table>
					 </div>
				</div>
		  </div>
		</div>
		 
		<div class="clear"></div>
		
</div>
				<br>
				<br>

			
			
		
								
<div class="clear"></div>


	
		

   <script src="admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
   
	
	<script src="admin/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="admin/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
	
	
	 
    <script src="admin/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>   
   
<?php
	include("master3.php");
?> 