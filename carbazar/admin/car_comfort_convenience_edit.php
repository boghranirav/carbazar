<?php
include("master.php");
?>
<title>
Edit Version Comfort And Convenience
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

$olddata2=mysql_query("select *from  car_comfort_1 where v_id='$id'");
$row=mysql_fetch_array($olddata2);

$opwf=$row['power_windows_front'];
$opwr=$row['power_windows_read'];
$oaclimate=$row['auto_climate_control'];
$oaqcontrol=$row['air_quality_control'];
$ortopener=$row['remote_trunk_opener'];
$orflid=$row['remote_fuel_lid_opener'];
$olflight=$row['low_fuel_warning_light'];
$oapower=$row['accessory_power_outlet'];
$otlight=$row['trunk_light'];
$ovmirror=$row['vanity_mirror'];
$orrlamp=$row['rear_reading_lamp'];
$orsheadrest=$row['rear_seat_headrest'];
$orscarm=$row['rear_seat_center_arm_rest'];
$ohasbelt=$row['height_adjustable_front_seat_belts'];
										
$olddata3=mysql_query("select *from  car_comfort_2 where v_id='$id'");
$row=mysql_fetch_array($olddata3);
$ochf=$row['cup_holder_front'];
$ochr=$row['cup_holder_read'];
$oracvent=$row['rear_ac_vents'];
$ohsf=$row['heated_seat_front'];
$ohsr=$row['heated_seat_read'];
$oslumber=$row['seat_lumbar_support'];
$occonrtol=$row['cruise_control'];
$opsensor=$row['parking_sensor'];
$onsys=$row['navigation_system'];
$ofrseat=$row['foldable_rear_seat'];
$osacard=$row['smart_access_card_entry'];
$oesbutton=$row['engine_start_stop_button'];
$ogbox=$row['glove_box_cooling'];
$obholder=$row['bottle_holder'];
$ovcontrol=$row['voice_control'];


?>

                        <h1 class="page-header"> Edit Version Comfort And Convenience </h1>
  		
	<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>
		


<?php
if(isset($_POST['submit']))
{

$pwf=$_POST['power_window_front'];
$pwr=$_POST['power_window_rear'];
$aclimate=$_POST['auto_climate'];
$aqcontrol=$_POST['air_quality_control'];
$rtopener=$_POST['remote_trunk_opener'];
$rflid=$_POST['remote_fuel_lid'];
$lflight=$_POST['low_fuel_light'];
$apower=$_POST['accessory_power'];
$tlight=$_POST['trunk_light'];
$vmirror=$_POST['vanity_mirror'];
$rrlamp=$_POST['rear_reading_lamp'];
$rsheadrest=$_POST['rear_seat_headrest'];
$rscarm=$_POST['rear_seat_center_arm_rest'];
$hasbelt=$_POST['height_adjust_seat_belts'];

$chf=$_POST['cup_holder_f'];
$chr=$_POST['cup_holder_r'];
$racvent=$_POST['rear_ac_vent'];
$hsf=$_POST['heated_seat_f'];
$hsr=$_POST['heated_seat_r'];
$slumber=$_POST['seat_lumbar'];
$cconrtol=$_POST['cruise_control'];
$psensor=$_POST['parking_sensors'];
$nsys=$_POST['nav_sys'];
$frseat=$_POST['f_r_seat'];
$sacard=$_POST['smart_access_card'];
$esbutton=$_POST['engine_s_button'];
$gbox=$_POST['glove_box'];
$bholder=$_POST['b_holder'];
$vcontrol=$_POST['voice_control'];

include("connection.php");
$sql1=mysql_query("update car_comfort_1 set  power_windows_front='$pwf',power_windows_read='$pwr',auto_climate_control='$aclimate',
                   air_quality_control='$aqcontrol',remote_trunk_opener='$rtopener',remote_fuel_lid_opener='$rflid',
                 low_fuel_warning_light='$lflight',accessory_power_outlet='$apower',trunk_light='$tlight',vanity_mirror='$vmirror'
           ,rear_reading_lamp='$rrlamp',rear_seat_headrest='$rsheadrest',rear_seat_center_arm_rest='$rscarm',
			  height_adjustable_front_seat_belts='$hasbelt'    where v_id='$id'");

$sql2=mysql_query("update car_comfort_2 set cup_holder_front='$chf',cup_holder_read='$chr',rear_ac_vents='$racvent',
                    heated_seat_front='$hsf',heated_seat_read='$hsr',seat_lumbar_support='$slumber',cruise_control='$cconrtol',
					parking_sensor='$psensor',navigation_system='$nsys',foldable_rear_seat='$frseat',smart_access_card_entry='$sacard'
					,engine_start_stop_button='$esbutton',glove_box_cooling='$gbox',bottle_holder='$bholder',voice_control='$vcontrol' where v_id='$id'");

if($sql1)
{
  if($sql2)
    {
      header("location:view_car.php");
	  
	  }
	  else{
	    echo "sql2 not satisfy";
		}
}
else
{
echo "sql1 not satisfy";
}


}

?>


	<form action="#" method="post">		
						<div class="box" id="overview">
                            <header>
                                <h5> Comfort And Convenience</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                       
                                        <tr>
											<td>Power Windows Front</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="power_window_front" id="power_window_front1" value="Yes" <?php if($opwf=="Yes") echo "checked"; ?>  />
												<label>Yes</label>
                                                <input type="radio" name="power_window_front" id="power_window_front2" value="No" <?php if($opwf=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Power Windows Rear</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="power_window_rear" id="power_window_rear1" value="Yes" <?php if($opwr=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="power_window_rear" id="power_window_rear2" value="No" <?php if($opwr=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Automatic Climate Control</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="auto_climate" id="auto_climate1" value="Yes" <?php if($oaclimate=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="auto_climate" id="auto_climate2" value="No"  <?php if($oaclimate=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Air Quality Control</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="air_quality_control" id="air_quality_control1" value="Yes" <?php if($oaqcontrol=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="air_quality_control" id="air_quality_control2" value="No"  <?php if($oaqcontrol=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Remote Trunk Opener</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="remote_trunk_opener" id="remote_trunk_opener1" value="Yes"  <?php if($ortopener=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="remote_trunk_opener" id="remote_trunk_opener2" value="No"  <?php if($ortopener=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>										
										<tr>
											<td>Remote Fuel Lid Opener</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="remote_fuel_lid" id="remote_fuel_lid1" value="Yes" <?php if($orflid=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="remote_fuel_lid" id="remote_fuel_lid2" value="No" <?php if($orflid=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Low Fuel Warning Light</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="low_fuel_light" id="low_fuel_light1" value="Yes" <?php if($olflight=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="low_fuel_light" id="low_fuel_light2" value="No" <?php if($olflight=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Accessory Power Outlet</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="accessory_power" id="accessory_power1" value="Yes" <?php if($oapower=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="accessory_power" id="accessory_power2" value="No"  <?php if($oapower=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Trunk Light</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="trunk_light" id="trunk_light1" value="Yes" <?php if($otlight=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="trunk_light" id="trunk_light2" value="No"  <?php if($otlight=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
								
								<tr>
											<td>Vanity Mirror</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="vanity_mirror" id="vanity_mirror1" value="Yes" <?php if($ovmirror=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="vanity_mirror" id="vanity_mirror2" value="No" <?php if($ovmirror=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Reading Lamp</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_reading_lamp" id="rear_reading_lamp1" value="Yes" <?php if($orrlamp=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="rear_reading_lamp" id="rear_reading_lamp2" value="No" <?php if($orrlamp=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Seat Headrest</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_seat_headrest" id="rear_seat_headrest1" value="Yes" <?php if($orsheadrest=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="rear_seat_headrest" id="rear_seat_headrest2" value="No" <?php if($orsheadrest=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Seat Centre Arm Rest</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_seat_center_arm_rest" id="rear_seat_center_arm_rest1" value="Yes" <?php if($orscarm=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="rear_seat_center_arm_rest" id="rear_seat_center_arm_rest2" value="No" <?php if($orscarm=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Height Adjustable Front Seat Belts</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="height_adjust_seat_belts" id="height_adjust_seat_belts1" value="Yes" <?php if($ohasbelt=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="height_adjust_seat_belts" id="height_adjust_seat_belts2" value="No" <?php if($ohasbelt=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Cup Holders(Front)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cup_holder_f" id="cup_holder_f1" value="Yes" <?php if($ochf=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="cup_holder_f" id="cup_holder_f2" value="No" <?php if($ochf=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
		
										<tr>
											<td>Cup Holders(Rear)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cup_holder_r" id="cup_holder_r1" value="Yes" <?php if($ochr=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="cup_holder_r" id="cup_holder_r2" value="No" <?php if($ochr=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear A/C Vents</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_ac_vent" id="rear_ac_vent1" value="Yes" <?php if($oracvent=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="rear_ac_vent" id="rear_ac_vent2" value="No"  <?php if($oracvent=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Heated Seat(Front)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="heated_seat_f" id="heated_seat_f1" value="Yes" <?php if($ohsf=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="heated_seat_f" id="heated_seat_f2" value="No" <?php if($ohsf=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Heated Seat(Rear)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="heated_seat_r" id="heated_seat_r1" value="Yes"  <?php if($ohsr=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="heated_seat_r" id="heated_seat_r2" value="No"<?php if($ohsr=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Seat Lumbar Support</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="seat_lumbar" id="seat_lumbar1" value="Yes" <?php if($oslumber=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="seat_lumbar" id="seat_lumbar2" value="No" <?php if($oslumber=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
	
                       					<tr>	
											<td>Cruise Control</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cruise_control" id="cruise_control1" value="Yes" <?php if($occonrtol=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="cruise_control" id="cruise_control2" value="No" <?php if($occonrtol=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Parking Sensors</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="parking_sensors" id="parking_sensors1" value="Yes" <?php if($opsensor=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="parking_sensors" id="parking_sensors2" value="No" <?php if($opsensor=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Navigation System</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="nav_sys" id="nav_sys1" value="Yes" <?php if($onsys=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="nav_sys" id="nav_sys2" value="No" <?php if($onsys=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Foldable Rear Seat</td>
											<td>
											<div class="col-lg-10">
											<input class="form-control" placeholder="Foldable Rear Seat Description" name="f_r_seat" value="<?php echo $ofrseat; ?>" >
											</div>
											</td>
										</tr>
										<tr>
											<td>Smart Access Card Entry</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="smart_access_card" id="smart_access_card1" value="Yes" <?php if($osacard=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="smart_access_card" id="smart_access_card2" value="No" <?php if($osacard=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Engine Start/Stop Button</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="engine_s_button" id="engine_s_button1" value="Yes" <?php if($oesbutton=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="engine_s_button" id="engine_s_button2" value="No" <?php if($oesbutton=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
									
										<tr>
											<td>Glove Box Cooling</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="glove_box" id="glove_box1" value="Yes" <?php if($ogbox=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="glove_box" id="glove_box2" value="No" <?php if($ogbox=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											
											</td>
										</tr>
										<tr>
											<td>Bottle Holder</td>
											<td>
											<div class="col-lg-10">
											<input class="form-control" placeholder="Bottle Holder Description" name="b_holder" value="<?php echo $obholder; ?>" >
											</div>
											</td>
										</tr>
										<tr>
											<td>Voice Control</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="voice_control" id="voice_control1" value="Yes" <?php if($ovcontrol=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="voice_control" id="voice_control2" value="No"  <?php if($ovcontrol=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
																			
								
										
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Car Comfort And Convenience">
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