<?php
include("page_master.php");
?>
<title>
Add Version Comfort And Convenience
</title>
<?php
include("page_master1.php");
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

<?php
$errmsg="";
if(isset($_POST['submit']))
{
			$bid=$_POST['b_id'];
			$mid=$_POST['m_id'];
$verid=$_POST['v_id'];
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
$sql1=mysql_query("insert into 	car_comfort_1 values($verid,'$pwf','$pwr','$aclimate','$aqcontrol',
                                             '$rtopener','$rflid','$lflight','$apower','$tlight','$vmirror'
                                            ,'$rrlamp','$rsheadrest','$rscarm','$hasbelt')");



if($sql1)
{
	$sql2=mysql_query("insert into 	car_comfort_2 values($verid,'$chf','$chr','$racvent','$hsf','$hsr',
                                        '$slumber','$cconrtol','$psensor','$nsys','$frseat',
										'$sacard','$esbutton','$gbox','$bholder','$vcontrol')");
  if($sql2)
    {
      header("location:view_car.php");
	  }
	  else{
	    $errmsg="Data Not added";
		}
}
else
{
$errmsg="Data not Added";
}
		}
}

?>	

                        <h1 class="page-header"> Add Version Comfort And Convenience </h1>
						<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>
						<form action="car_comfort_convenience.php" method="post">
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
                                                <input type="radio" name="power_window_front" id="power_window_front1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="power_window_front" id="power_window_front2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Power Windows Rear</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="power_window_rear" id="power_window_rear1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="power_window_rear" id="power_window_rear2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Automatic Climate Control</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="auto_climate" id="auto_climate1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="auto_climate" id="auto_climate2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Air Quality Control</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="air_quality_control" id="air_quality_control1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="air_quality_control" id="air_quality_control2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Remote Trunk Opener</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="remote_trunk_opener" id="remote_trunk_opener1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="remote_trunk_opener" id="remote_trunk_opener2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Remote Fuel Lid Opener</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="remote_fuel_lid" id="remote_fuel_lid1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="remote_fuel_lid" id="remote_fuel_lid2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Low Fuel Warning Light</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="low_fuel_light" id="low_fuel_light1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="low_fuel_light" id="low_fuel_light2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Accessory Power Outlet</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="accessory_power" id="accessory_power1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="accessory_power" id="accessory_power2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Trunk Light</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="trunk_light" id="trunk_light1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="trunk_light" id="trunk_light2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Vanity Mirror</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="vanity_mirror" id="vanity_mirror1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="vanity_mirror" id="vanity_mirror2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Reading Lamp</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_reading_lamp" id="rear_reading_lamp1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="rear_reading_lamp" id="rear_reading_lamp2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Seat Headrest</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_seat_headrest" id="rear_seat_headrest1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="rear_seat_headrest" id="rear_seat_headrest2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Seat Centre Arm Rest</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_seat_center_arm_rest" id="rear_seat_center_arm_rest1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="rear_seat_center_arm_rest" id="rear_seat_center_arm_rest2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Height Adjustable Front Seat Belts</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="height_adjust_seat_belts" id="height_adjust_seat_belts1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="height_adjust_seat_belts" id="height_adjust_seat_belts2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Cup Holders(Front)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cup_holder_f" id="cup_holder_f1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="cup_holder_f" id="cup_holder_f2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Cup Holders(Rear)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cup_holder_r" id="cup_holder_r1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="cup_holder_r" id="cup_holder_r2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear A/C Vents</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_ac_vent" id="rear_ac_vent1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="rear_ac_vent" id="rear_ac_vent2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Heated Seat(Front)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="heated_seat_f" id="heated_seat_f1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="heated_seat_f" id="heated_seat_f2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Heated Seat(Rear)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="heated_seat_r" id="heated_seat_f1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="heated_seat_r" id="heated_seat_f2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Seat Lumbar Support</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="seat_lumbar" id="seat_lumbar1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="seat_lumbar" id="seat_lumbar2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Cruise Control</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cruise_control" id="cruise_control1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="cruise_control" id="cruise_control2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Parking Sensors</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="parking_sensors" id="parking_sensors1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="parking_sensors" id="parking_sensors2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Navigation System</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="nav_sys" id="nav_sys1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="nav_sys" id="nav_sys2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Foldable Rear Seat</td>
											<td>
											<div class="col-lg-10">
											<input class="form-control" placeholder="Foldable Rear Seat Description" name="f_r_seat" >
											</div>
											</td>
										</tr>
										<tr>
											<td>Smart Access Card Entry</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="smart_access_card" id="smart_access_card1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="smart_access_card" id="smart_access_card2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Engine Start/Stop Button</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="engine_s_button" id="engine_s_button1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="engine_s_button" id="engine_s_button2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Glove Box Cooling</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="glove_box" id="glove_box1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="glove_box" id="glove_box2" value="No" />
												<label>No</label>
                                            </div>	
											
											</td>
										</tr>
										<tr>
											<td>Bottle Holder</td>
											<td>
											<div class="col-lg-10">
											<input class="form-control" placeholder="Bottle Holder Description" name="b_holder" >
											</div>
											</td>
										</tr>
										<tr>
											<td>Voice Control</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="voice_control" id="voice_control1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="voice_control" id="voice_control2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
																			
								
										
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Add Car Comfort And Convenience">
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