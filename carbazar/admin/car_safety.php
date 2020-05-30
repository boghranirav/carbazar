<?php
include("page_master.php");
?>
<title>
Add Version Safety Info
</title>
<?php
include("page_master1.php");
?>


<?php
$errmsg="";
if(isset($_POST['submit']))
{
			$bid=$_POST['b_id'];
        $mid=$_POST['m_id'];
	
$verid=$_POST['v_id'];
$albrake=$_POST['anti_lock_brake'];
$bassist=$_POST['breke_assist'];
$centrallock=$_POST['central_locking'];
$pdlock=$_POST['power_door_locks'];
$cslock=$_POST['child_safety_locks'];
$atalarm=$_POST['anti_theft_alarm'];
$dair=$_POST['driver_airbag'];
$pair=$_POST['passenger_airbag'];
$sairf=$_POST['side_airbag_front'];
$sairr=$_POST['side_airbag_rear'];
$nrview=$_POST['night_rear_view'];
$psrview=$_POST['passenger_side_rear_view'];
$xheadlamps=$_POST['xenon_headlamps'];
$hheadlamps=$_POST['halogen_headlamps'];
$rsbelts=$_POST['rear_seat_belts'];
$sbwarn=$_POST['seat_belt_warning'];
$dawarn=$_POST['door_ajar_warning'];


$sibeam=$_POST['side_impact_beams'];
$fibeam=$_POST['front_impact_beams'];
$tcontrol=$_POST['traction_control'];
$aseat=$_POST['adjustable_seats'];
$klentry=$_POST['keyless_entry'];
$tpmonitor=$_POST['tyre_pressure_monitor'];
$vscontrol=$_POST['vehicle_stability_system'];
$eimmobilizer=$_POST['engine_immobilizer'];
$csensor=$_POST['crash_sensor'];
$cmftank=$_POST['centrally_fuel_tank'];
$ecwarn=$_POST['engine_check_warning'];
$aheadlamp=$_POST['automatic_headlamps'];
$clock=$_POST['clutch_lock'];
$ebd=$_POST['ebd'];
$fmhome=$_POST['follow_me_home'];
$rcamera=$_POST['rear_camera'];
$atdevice=$_POST['anti_theft_device'];


$err['vid']="";
			$err['bid']="";
			$err['mid']="";
			
			
			if($bid=="0"){
				$err['bid']="<font color='red'>*Select Brand.</font>";
			}
			
			if($mid=="0"){
				$err['mid']="<font color='red'>*Select Model.</font>";
			}
			
			if($verid=="0"){
				$err['vid']="<font color='red'>*Select Version.</font>";
			}
		
			
		if($err['bid']=="" && $err['mid']=="" && $err['vid']==""){



include("connection.php");
$sql1=mysql_query("insert into car_safety_1 values($verid,'$albrake','$bassist','$centrallock',
                                                   '$pdlock','$cslock','$atalarm','$dair','$pair','$sairf',
										       '$sairr','$nrview','$psrview','$xheadlamps',
											   '$rsbelts','$sbwarn','$hheadlamps','$dawarn')");



if($sql1)
{
	$sql2=mysql_query("insert into car_safety_2 values($verid,'$sibeam','$fibeam','$tcontrol','$aseat',
                                                      '$klentry','$tpmonitor','$vscontrol','$eimmobilizer',
													   '$csensor','$cmftank','$ecwarn','$aheadlamp','$clock',
                                                        '$ebd','$fmhome','$rcamera','$atdevice')");
														
    if($sql2)
      {
        header("location:view_car.php");
	   }
	  else{
	     $errmsg="Data not Added.";
		}
   }
   else
  {
     $errmsg="Data not Added.";
  }
		}
}
?>




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
							url:"version_sql_2.php",
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
							url:"version_sql_2.php",
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
	

                        <h1 class="page-header"> Add Version Safety  Info</h1>
													<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>
						<form action="#" method="post">
						<table width="60%">
						<tr>
					<td width="20%">					
                                            <label class="control-label">Select Brand </label>
					</td>
					<td width="60%">
					                        <div class="col-lg-9">
                                                <select name="b_id" id="b_id" class="validate[required] form-control" length="10">
                                                    <option value="0">--Select a Brand--</option>
                                                    <?php
													include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$bid=$row['brand_id'];
														$car_com=$row['car_company'];
													echo "<option value=$bid>".$car_com."</option>";
													}
													?>
                                                </select>
                                            </div>
					</td>
					<td width="20%"><?php if(isset($_POST['submit'])) echo $err['bid'];?></td>
					</tr>						
					<tr id="model">
						<td>
											<label class="control-label">Select Model </label>
						</td>
						<td>
					                        <div class="col-lg-9">
                                                <select name="m_id" id="m_id" class="validate[required] form-control" >
                                                    <option value="0">--Select a Model--</option>
                                                    
                                                </select>
                                            </div>
						</td>
						<td><?php if(isset($_POST['submit'])) echo $err['mid'];?></td>
					</tr>
					<tr id="version">
						<td>
											<label class="control-label">Select Version</label>
						</td>
						<td>
					                        <div class="col-lg-9">
                                                <select name="v_id" id="v_id" class="validate[required] form-control" >
                                                    <option value="0">--Select a Version--</option>
                                                                                                    </select>
                                            </div>
						</td>
						<td><?php if(isset($_POST['submit'])) echo $err['vid'];?></td>
					</tr>
						</table>
						
						<div class="box" id="overview">
                            <header>
                                <h5>Sefety Info</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                              							
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        
										<tr>
										
											<td width="50%">Anti-Lock Braking</td>
											<td>
											<div class="col-lg-10">
											  <input type="radio" name="anti_lock_brake" id="anti_lock_brake1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="anti_lock_brake" id="anti_lock_brake2" value="No" />
 													<label>No</label>
											  </div>
											</td>
										</tr>
										<tr>
											<td>Brake Assist</td>
											<td>
											<div class="col-lg-10">
									  <input type="radio" name="breke_assist" id="breke_assist1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="breke_assist" id="breke_assist2" value="No" />
 													<label>No</label>
											</div>
											</td>
										</tr>
										<tr>
											<td>Central Locking</td>
											<td>
												<div class="col-lg-10">
											   <input type="radio" name="central_locking" id="central_locking1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="central_locking" id="central_locking2" value="No" />
 													<label>No</label>
											  </td>
											  </div>
																				
										
										<tr>
											<td>Power Door Locks</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="power_door_locks" id="power_door_locks1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="power_door_locks" id="power_door_locks2" value="No" />
 													<label>No</label></div>
											</td>
										</tr>
										<tr>
											<td>Child Safety Locks</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="child_safety_locks" id="child_safety_locks1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="child_safety_locks" id="child_safety_locks2" value="No" />
 													<label>No</label></div>
											</td>
										</tr>
										
										<tr>
											<td>Anti-Theft Alarm</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="anti_theft_alarm" id="anti_theft_alarm1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											
											  <input type="radio" name="anti_theft_alarm" id="anti_theft_alarm2" value="No" />
 													<label>No</label></div>
											</td>
										</tr>
										<tr>
											<td>Driver Airbag</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="driver_airbag" id="driver_airbag1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="driver_airbag" id="driver_airbag2" value="No" />
 													<label>No</label></div>
											</td>
										</tr>
										<tr>
											<td>Passenger Airbag</td>
											<td>
											<div class="col-lg-10">
										 <input type="radio" name="passenger_airbag" id="passenger_airbag1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="passenger_airbag" id="passenger_airbag2" value="No" />
 													<label>No</label>
											</div>
											</td>
										</tr>
										<tr>
											<td>Side Airbag(Front)</td>
											<td>
								<div class="col-lg-10">
								 <input type="radio" name="side_airbag_front" id="side_airbag_front1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="side_airbag_front" id="side_airbag_front2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										<tr>
											<td>Side Airbag(Rear)</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="side_airbag_rear" id="side_airbag_rear1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="side_airbag_rear" id="side_airbag_rear2" value="No" />
 													<label>No</label>
											</div>
											</td>
                                        </tr>
										<tr>
											<td>Night Rear View Mirror</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="night_rear_view" id="night_rear_view1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="night_rear_view" id="night_rear_view2" value="No" />
 													<label>No</label>
											</div>
											</td>
                                        </tr>
		                						
						           		<tr>
											<td>Passenger Side Rear View Mirror</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="passenger_side_rear_view" id="passenger_side_rear_view1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="passenger_side_rear_view" id="passenger_side_rear_view2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
												                						
						           		<tr>
											<td>Xenon Headlamps</td>
											<td>
											<div class="col-lg-10">
											
											 <input type="radio" name="xenon_headlamps" id="xenon_headlamps1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="xenon_headlamps" id="xenon_headlamps2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>



						           		<tr>
											<td>Halogen Headlamps</td>
											<td>
											<div class="col-lg-10">
	 <input type="radio" name="halogen_headlamps" id="halogen_headlamps1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="halogen_headlamps" id="halogen_headlamps2" value="No" />
 													<label>No</label>
											</div>
											</td>
                                        </tr>


						           		<tr>
											<td>Rear Seat Belts</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="rear_seat_belts" id="rear_seat_belts1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="rear_seat_belts" id="rear_seat_belts2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										
						           		<tr>
											<td>Seat Belt Warning</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="seat_belt_warning" id="seat_belt_warning1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="seat_belt_warning" id="seat_belt_warning2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>

                                        <tr>
											<td>Door Ajar Warning</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="door_ajar_warning" id="door_ajar_warning1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="door_ajar_warning" id="door_ajar_warning2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										 
										  <tr>
											<td>Side Impact Beams</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="side_impact_beams" id="side_impact_beams1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="side_impact_beams" id="side_impact_beams2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>

                                         <tr>
											<td>Front Impact Beams</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="front_impact_beams" id="front_impact_beams1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="front_impact_beams" id="front_impact_beams2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
                        
						                <tr>
											<td>Traction Control</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="traction_control" id="traction_control1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="traction_control" id="traction_control2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>

                                   
	       							    <tr>
											<td>Adjustable Seats</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="adjustable_seats" id="adjustable_seats1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="adjustable_seats" id="adjustable_seats2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Keyless Entry</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="keyless_entry" id="keyless_entry1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="keyless_entry" id="keyless_entry2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Tyre Pressure Monitor</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="tyre_pressure_monitor" id="tyre_pressure_monitor1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="tyre_pressure_monitor" id="tyre_pressure_monitor2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Vehicle Stability Control System</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="vehicle_stability_system" id="vehicle_stability_system1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="vehicle_stability_system" id="vehicle_stability_system2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
                                      
									  <tr>
									  	<td>Engine Immobilizer</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="engine_immobilizer" id="engine_immobilizer1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="engine_immobilizer" id="engine_immobilizer2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
                                          
                                    <tr>
											<td>Crash Sensor</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="crash_sensor" id="crash_sensor1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="crash_sensor" id="crash_sensor2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
              
			                            <tr>
											<td>Centrally Mounted Fuel Tank</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="centrally_fuel_tank" id="centrally_fuel_tank1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="centrally_fuel_tank" id="centrally_fuel_tank2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Engine Check Warning</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="engine_check_warning" id="engine_check_warning1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="engine_check_warning" id="engine_check_warning2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>

                                         <tr>
											<td>Automatic Headlamps</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="automatic_headlamps" id="automatic_headlamps1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="automatic_headlamps" id="automatic_headlamps2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Clutch Lock</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="clutch_lock" id="clutch_lock1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="clutch_lock" id="clutch_lock2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										
                                         <tr>
											<td>EBD</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="ebd" id="ebd1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="ebd" id="ebd2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Follow Me Home Headlamps</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="follow_me_home" id="follow_me_home1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="follow_me_home" id="follow_me_home2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Rear Camera</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="rear_camera" id="rear_camera1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="rear_camera" id="rear_camera2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Anti-Theft Device</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="anti_theft_device" id="anti_theft_device1" value="Yes" checked="checked" />																		   													<label>Yes</label>
											  
											  <input type="radio" name="anti_theft_device" id="anti_theft_device2" value="No" />
 													<label>No</label></div>
											</td>
                                        </tr>
										
																				
										


 									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Add Car Safety Info">
									</center>
									</td>
									</tr>
                                    
                                </table>
                            </div>
                        </div>
						
						</form>

<?php
include("page_master2.php");
?>