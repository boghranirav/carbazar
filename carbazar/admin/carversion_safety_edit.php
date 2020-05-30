<?php
include("master.php");
?>
<title>
Add Version Safety Info
</title>
<?php
include("master1.php");
?>

<?php
$id=$_GET['vid'];
include("connection.php");

$olddata=mysql_query("select *from car_version where v_id='$id'");
if(mysql_num_rows($olddata)<=0){
	header("location:view_car.php");
}

$row=mysql_fetch_array($olddata);
$ovname=$row['version_name'];    
	

$olddata2=mysql_query("select * from  car_safety_1 where v_id='$id' ");
$row=mysql_fetch_array($olddata2);

$oalbrake=$row['anti_lock_breaking'];
$obassist=$row['brake_assist'];
$ocentrallock=$row['central_locking'];
$opdlock=$row['power_door_locks'];
$ocslock=$row['child_safety_locks'];
$oatalarm=$row['anti_theft_alarm'];
$odair=$row['driver_airbag'];
$opair=$row['passanger_airbag'];
$osairf=$row['side_airbag_front'];
$osairr=$row['side_airbag_rear'];
$onrview=$row['night_rear_view_mirror'];
$opsrview=$row['passenger_side_rear_mirror'];
$oxheadlamps=$row['xenon_headlamps'];
$ohheadlamps=$row['halogen_headlamps'];
$orsbelts=$row['rear_seat_belts'];
$osbwarn=$row['seat_bealt_warning'];
$odawarn=$row['door_ajar_warning'];


$olddata3=mysql_query("select *from  car_safety_2 where v_id='$id'");
$row=mysql_fetch_array($olddata3);
$osibeam=$row['side_impact_beams'];
$ofibeam=$row['front_impact_beams'];
$otcontrol=$row['traction_control'];
$oaseat=$row['adjustable_seats'];
$oklentry=$row['keyless_entry'];
$otpmonitor=$row['tyre_pressure_monitor'];
$ovscontrol=$row['vehicle_stability_control'];
$oeimmobilizer=$row['engine_immobilizer'];
$ocsensor=$row['crash_sensor'];
$ocmftank=$row['centrally_mounted_fueltank'];
$oecwarn=$row['engine_check_warning'];
$oaheadlamp=$row['auto_headlamps'];
$oclock=$row['clutch_lock'];
$oebd=$row['ebd'];
$ofmhome=$row['follow_me_home_headlamp'];
$orcamera=$row['rear_camera'];
$oatdevice=$row['anti_theft_device'];

?>



                        <h1 class="page-header"> Edit Version Safety </h1>
  		<form>
	<b>Version Name :&nbsp;<?php echo $ovname; ?></b>
		</form>

<?php
if(isset($_POST['submit']))
{
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







include("connection.php");
$sql1=mysql_query("update  car_safety_1 set anti_lock_breaking='$albrake',brake_assist='$bassist',central_locking='$centrallock',
                                         power_door_locks='$pdlock',child_safety_locks='$cslock',anti_theft_alarm='$atalarm',
                                        driver_airbag='$dair',passanger_airbag='$pair',side_airbag_front='$sairf',
                                        side_airbag_rear='$sairr',night_rear_view_mirror='$nrview',passenger_side_rear_mirror='$psrview',
                                        xenon_headlamps='$xheadlamps',rear_seat_belts='$rsbelts', 
                                        seat_bealt_warning='$sbwarn',halogen_headlamps='$hheadlamps',door_ajar_warning='$dawarn' where v_id='$id'");











$sql2=mysql_query("update  car_safety_2 set  side_impact_beams='$sibeam',front_impact_beams='$fibeam',traction_control='$tcontrol',
                                        adjustable_seats='$aseat',keyless_entry='$klentry',tyre_pressure_monitor='$tpmonitor',
                                       vehicle_stability_control='$vscontrol',engine_immobilizer='$eimmobilizer',
									   crash_sensor='$csensor',centrally_mounted_fueltank='$cmftank',
									   engine_check_warning='$ecwarn',auto_headlamps='$aheadlamp',clutch_lock='$clock',
									    ebd='$ebd',follow_me_home_headlamp='$fmhome',rear_camera='$rcamera',
										anti_theft_device='$atdevice' where v_id='$id'");

if($sql1)
{
  if($sql2)
    {
      header("location:view_car.php");
	  }
	  else{
	    echo "safety2 not satisfy";
		}
}
else
{
echo "safety1 not satisfy";
}

}

?>



 
						
						<form action="#" method="post">
					
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
										
											<td>Anti-Lock Braking</td>
											<td>
											<div class="col-lg-10">
											  <input type="radio" name="anti_lock_brake" id="anti_lock_brake1" value="Yes" <?php if($oalbrake=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="anti_lock_brake" id="anti_lock_brake2" value="No" <?php if($oalbrake=="No") echo "checked"; ?> />
 													<label>No</label>
											  </div>
											</td>
										</tr>
										<tr>
				
							<td>Brake Assist</td>
											<td>
											<div class="col-lg-10">
									  <input type="radio" name="breke_assist" id="breke_assist1" value="Yes" <?php if($obassist=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="breke_assist" id="breke_assist2" value="No" <?php if($obassist=="No") echo "checked"; ?> />
 													<label>No</label>
											</div>
											</td>
										</tr>
										<tr>
											<td>Central Locking</td>
											<td>
												<div class="col-lg-10">
											   <input type="radio" name="central_locking" id="central_locking1" value="Yes" <?php if($ocentrallock=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="central_locking" id="central_locking2" value="No" <?php if($ocentrallock=="No") echo "checked"; ?> />
 													<label>No</label>
											  </td>
									
 	  </div>
																				
										
										<tr>
											<td>Power Door Locks</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="power_door_locks" id="power_door_locks1" value="Yes" <?php if($opdlock=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="power_door_locks" id="power_door_locks2" value="No"  <?php if($opdlock=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
										</tr>
										<tr>
											<td>Child Safety Locks</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="child_safety_locks" id="child_safety_locks1" value="Yes" <?php if($ocslock=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="child_safety_locks" id="child_safety_locks2" value="No" <?php if($ocslock=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
										</tr>
										
										<tr>
											<td>Anti-Theft Alarm</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="anti_theft_alarm" id="anti_theft_alarm1" value="Yes"  <?php if($oatalarm=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											
											  <input type="radio" name="anti_theft_alarm" id="anti_theft_alarm2" value="No" <?php if($oatalarm=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
										</tr>
										<tr>
											<td>Driver Airbag</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="driver_airbag" id="driver_airbag1" value="Yes" <?php if($odair=="Yes") echo "checked"; ?>  />																		   													<label>Yes</label>
											  
											  <input type="radio" name="driver_airbag" id="driver_airbag2" value="No" <?php if($odair=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
										</tr>
										<tr>
											<td>Passenger Airbag</td>
											<td>
											<div class="col-lg-10">
										 <input type="radio" name="passenger_airbag" id="passenger_airbag1" value="Yes"  <?php if($opair=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="passenger_airbag" id="passenger_airbag2" value="No" <?php if($opair=="No") echo "checked"; ?> />
 													<label>No</label>
											</div>
											</td>
										</tr>
										<tr>
											<td>Side Airbag(Front)</td>
											<td>
								<div class="col-lg-10">
								 <input type="radio" name="side_airbag_front" id="side_airbag_front1" value="Yes" <?php if($osairf=="Yes") echo "checked"; ?>/>																		   													<label>Yes</label>
											  
											  <input type="radio" name="side_airbag_front" id="side_airbag_front2" value="No" <?php if($osairf=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
										<tr>
											<td>Side Airbag(Rear)</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="side_airbag_rear" id="side_airbag_rear1" value="Yes" <?php if($osairr=="Yes") echo "checked"; ?>/>																		   													<label>Yes</label>
											  
											  <input type="radio" name="side_airbag_rear" id="side_airbag_rear2" value="No"<?php if($osairr=="No") echo "checked"; ?> />
 													<label>No</label>
											</div>
											</td>
                                        </tr>
										<tr>
											<td>Night Rear View Mirror</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="night_rear_view" id="night_rear_view1" value="Yes" <?php if($onrview=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="night_rear_view" id="night_rear_view2" value="No" <?php if($onrview=="No") echo "checked"; ?> />
 													<label>No</label>
											</div>
											</td>
                                        </tr>
		                						
						           		<tr>
											<td>Passenger Side Rear View Mirror</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="passenger_side_rear_view" id="passenger_side_rear_view1" value="Yes" <?php if($opsrview=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="passenger_side_rear_view" id="passenger_side_rear_view2" value="No" <?php if($opsrview=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
												                						
						           		<tr>
											<td>Xenon Headlamps</td>
											<td>
											<div class="col-lg-10">
											
											 <input type="radio" name="xenon_headlamps" id="xenon_headlamps1" value="Yes" <?php if($oxheadlamps=="Yes") echo "checked"; ?>/>																		   													<label>Yes</label>
											  
											  <input type="radio" name="xenon_headlamps" id="xenon_headlamps2" value="No" <?php if($oxheadlamps=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>



						           		<tr>
											<td>Halogen Headlamps</td>
											<td>
											<div class="col-lg-10">
	 <input type="radio" name="halogen_headlamps" id="halogen_headlamps1" value="Yes" <?php if($ohheadlamps=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="halogen_headlamps" id="halogen_headlamps2" value="No" <?php if($ohheadlamps=="No") echo "checked"; ?> />
 													<label>No</label>
											</div>
											</td>
                                        </tr>


						           		<tr>
											<td>Rear Seat Belts</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="rear_seat_belts" id="rear_seat_belts1" value="Yes" <?php if($orsbelts=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="rear_seat_belts" id="rear_seat_belts2" value="No" <?php if($orsbelts=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
						           		<tr>
											<td>Seat Belt Warning</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="seat_belt_warning" id="seat_belt_warning1" value="Yes" <?php if($osbwarn=="Yes") echo "checked"; ?>/>																		   													<label>Yes</label>
											  
											  <input type="radio" name="seat_belt_warning" id="seat_belt_warning2" value="No"  <?php if($osbwarn=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>

                                        <tr>
											<td>Door Ajar Warning</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="door_ajar_warning" id="door_ajar_warning1" value="Yes" <?php if($odawarn=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="door_ajar_warning" id="door_ajar_warning2" value="No" <?php if($odawarn=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
										 
										  <tr>
											<td>Side Impact Beams</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="side_impact_beams" id="side_impact_beams1" value="Yes" <?php if($osibeam=="Yes") echo "checked"; ?>/>																		   													<label>Yes</label>
											  
											  <input type="radio" name="side_impact_beams" id="side_impact_beams2" value="No" <?php if($osibeam=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>

                                         <tr>
											<td>Front Impact Beams</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="front_impact_beams" id="front_impact_beams1" value="Yes" <?php if($ofibeam=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="front_impact_beams" id="front_impact_beams2" value="No" <?php if($ofibeam=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
                        




<tr>
											<td>Traction Control</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="traction_control" id="traction_control1" value="Yes" <?php if($otcontrol=="Yes") echo "checked"; ?>/>																		   													<label>Yes</label>
											  
											  <input type="radio" name="traction_control" id="traction_control2" value="No" <?php if($otcontrol=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>

                                   
	       							    <tr>
											<td>Adjustable Seats</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="adjustable_seats" id="adjustable_seats1" value="Yes" <?php if($oaseat=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="adjustable_seats" id="adjustable_seats2" value="No" <?php if($oaseat=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Keyless Entry</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="keyless_entry" id="keyless_entry1" value="Yes" <?php if($oklentry=="Yes") echo "checked"; ?>/>																		   													<label>Yes</label>
											  
											  <input type="radio" name="keyless_entry" id="keyless_entry2" value="No" <?php if($oklentry=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Tyre Pressure Monitor</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="tyre_pressure_monitor" id="tyre_pressure_monitor1" value="Yes" <?php if($otpmonitor=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="tyre_pressure_monitor" id="tyre_pressure_monitor2" value="No" <?php if($otpmonitor=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Vehicle Stability Control System</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="vehicle_stability_system" id="vehicle_stability_system1" value="Yes" <?php if($ovscontrol=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="vehicle_stability_system" id="vehicle_stability_system2" value="No" <?php if($ovscontrol=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
                                      
									  <tr>
									  	<td>Engine Immobilizer</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="engine_immobilizer" id="engine_immobilizer1" value="Yes" <?php if($oeimmobilizer=="Yes") echo "checked"; ?>/>																		   													<label>Yes</label>
											  
											  <input type="radio" name="engine_immobilizer" id="engine_immobilizer2" value="No"  <?php if($oeimmobilizer=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>


                                     </tr>
                                          
                                    <tr>
											<td>Crash Sensor</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="crash_sensor" id="crash_sensor1" value="Yes" <?php if($ocsensor=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="crash_sensor" id="crash_sensor2" value="No" <?php if($ocsensor=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
              
			                            <tr>
											<td>Centrally Mounted Fuel Tank</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="centrally_fuel_tank" id="centrally_fuel_tank1" value="Yes" <?php if($ocmftank=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="centrally_fuel_tank" id="centrally_fuel_tank2" value="No" <?php if($ocmftank=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Engine Check Warning</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="engine_check_warning" id="engine_check_warning1" value="Yes" <?php if($oecwarn=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="engine_check_warning" id="engine_check_warning2" value="No" <?php if($oecwarn=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>

                                         <tr>
											<td>Automatic Headlamps</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="automatic_headlamps" id="automatic_headlamps1" value="Yes" <?php if($oaheadlamp=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="automatic_headlamps" id="automatic_headlamps2" value="No" <?php if($oaheadlamp=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Clutch Lock</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="clutch_lock" id="clutch_lock1" value="Yes" <?php if($oclock=="Yes") echo "checked"; ?>/>																		   													<label>Yes</label>
											  
											  <input type="radio" name="clutch_lock" id="clutch_lock2" value="No" <?php if($oclock=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
									




                                            	
                                         <tr>
											<td>EBD</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="ebd" id="ebd1" value="Yes" <?php if($oebd=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="ebd" id="ebd2" value="No" <?php if($oebd=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Follow Me Home Headlamps</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="follow_me_home" id="follow_me_home1" value="Yes" <?php if($ofmhome=="Yes") echo "checked"; ?>/>																		   													<label>Yes</label>
											  
											  <input type="radio" name="follow_me_home" id="follow_me_home2" value="No" <?php if($ofmhome=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Rear Camera</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="rear_camera" id="rear_camera1" value="Yes" <?php if($orcamera=="Yes") echo "checked"; ?>/>																		   													<label>Yes</label>
											  
											  <input type="radio" name="rear_camera" id="rear_camera2" value="No" <?php if($orcamera=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
										
										<tr>
											<td>Anti-Theft Device</td>
											<td>
											<div class="col-lg-10">
											 <input type="radio" name="anti_theft_device" id="anti_theft_device1" value="Yes" <?php if($oatdevice=="Yes") echo "checked"; ?> />																		   													<label>Yes</label>
											  
											  <input type="radio" name="anti_theft_device" id="anti_theft_device2" value="No" <?php if($oatdevice=="No") echo "checked"; ?> />
 													<label>No</label></div>
											</td>
                                        </tr>
										
																				
										


 									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Car Safety Info">
									</center>
									</td>
									</tr>
                                    
                                </table>
                            </div>
                        </div>
						
						</form>

<?php
include("master2.php");
?>