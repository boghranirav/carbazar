<?php
include("master.php");
?>
<title>
Edit Version Exterior Info
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

$olddata2=mysql_query("select *from  car_exterior_1 where v_id='$id'");
$row=mysql_fetch_array($olddata2);
		$oadjust_head=$row['adjustable_headlights'];
		$ofog_light_f=$row['fog_lights_front'];
		$ofog_light_r=$row['fog_light_rear'];
		$opow_adj_r=$row['power_adjust_rear_view'];
		$omanual_adjust_r_m=$row['manually_adjust_rear_view'];
		$oele_folding_r=$row['electric_folding_rear']; 
		$orain_sen_w=$row['rain_sensing_wiper'];
		$orear_window_w=$row['rear_window_wiper'];
		$orear_win_washer=$row['rear_window_washer'];
		$orear_win_defog=$row["rear_window_defogger"];
		$owheel_covers=$row["wheel_cover"];
		$oalloy_wheel=$row["alloy_wheel"];
		$opower_antenna=$row["power_antenna"];


$olddata3=mysql_query("select *from  car_exterior_2 where v_id='$id'");
$row=mysql_fetch_array($olddata3);
		$otinted_g=$row['tinted_glass'];
		$orear_spoiler=$row['rear_spoiler'];
		$oconvertible=$row['convertible_top'];
		$oroof_carrier=$row['roof_carrier'];
		$osun_roof=$row['sun_roof'];
		$omoon_roof=$row['moon_roof'];
		$oside_steeper=$row['side_stepper']; 
		$ooutside_mirror_i=$row['outside_rear_mirror_indicator'];
		$ointegrated_antenna=$row['integrated_antenna'];
		$ochrome_grille=$row['chrome_grille'];
		$ochrome_garnish=$row['chrome_garnish'];
		$osmoke_headlamps=$row['smoke_headlamps'];
		$oroof_rail=$row['roof_rail'];
	
?>

<h1 class="page-header"> Edit Version Exterior Info</h1>
<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>


	
	<?php
	if(isset($_POST['submit'])){
			
		$adjust_head=$_POST["adjust_headlight"];
		$fog_light_f=$_POST["fog_light_f"];
		$fog_light_r=$_POST["fog_light_r"];
		$pow_adj_r=$_POST["power_adjust_rear_mirror"];
		$manual_adjust_r_m=$_POST["manual_adjust_rear_mirror"];
		$ele_folding_r=$_POST["electric_folding_rear_mirror"]; 
		$rain_sen_w=$_POST["rain_sensing_wiper"];
		$rear_window_w=$_POST["rear_window_wiper"];
		$rear_win_washer=$_POST["rear_window_washer"];
		$rear_win_defog=$_POST["rear_window_defogger"];
		$wheel_covers=$_POST["wheel_covers"];
		$alloy_wheel=$_POST["alloy_wheel"];
		$power_antenna=$_POST["power_antenna"];
		
		$tinted_g=$_POST['tinted_glass'];
		$rear_spoiler=$_POST['rear_spoiler'];
		$convertible=$_POST['convertible'];
		$roof_carrier=$_POST['roof_carrier'];
		$sun_roof=$_POST['sun_roof'];
		$moon_roof=$_POST['moon_roof'];
		$side_steeper=$_POST['side_steeper']; 
		$outside_mirror_i=$_POST['outside_mirror_indicator'];
		$integrated_antenna=$_POST['integrated_antenna'];
		$chrome_grille=$_POST['chrome_grille'];
		$chrome_garnish=$_POST['chrome_garnish'];
		$smoke_headlamps=$_POST['smoke_headlamps'];
		$roof_rail=$_POST['roof_rail'];
													
				include("connection.php");




			
			$sql1="update car_exterior_1 set adjustable_headlights='$adjust_head',fog_lights_front='$fog_light_f',fog_light_rear='$fog_light_r',
			 power_adjust_rear_view='$pow_adj_r',manually_adjust_rear_view='$manual_adjust_r_m',electric_folding_rear='$ele_folding_r',
			 rain_sensing_wiper='$rain_sen_w',rear_window_wiper='$rear_window_w',rear_window_washer='$rear_win_washer',
			rear_window_defogger='$rear_win_defog',wheel_cover='$wheel_covers',alloy_wheel='$alloy_wheel',power_antenna='$power_antenna' where               v_id='$id'";

			
			
			$sql2="update car_exterior_2 set tinted_glass='$tinted_g',rear_spoiler='$rear_spoiler',
			convertible_top='$convertible',roof_carrier='$roof_carrier',sun_roof='$sun_roof',moon_roof='$moon_roof',
			side_stepper='$side_steeper',outside_rear_mirror_indicator='$outside_mirror_i',integrated_antenna='$integrated_antenna',
			chrome_grille='$chrome_grille',chrome_garnish='$chrome_garnish',smoke_headlamps='$smoke_headlamps',roof_rail='$roof_rail' where v_id='$id'";
						
			$res1=mysql_query($sql1);
			if($res1){
				$res2=mysql_query($sql2);
				if($res2){
					header("location:view_car.php");
				}else
				{
						echo"sql2 not edited.";
					}
				}
				else
				{
					echo "sql1 not  edited.";
				}		
              
			  
	}
	?>

                        
						
						<form action="#" method="post">
												<div class="box" id="overview">
                            <header>
                                <h5> Exterior</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                       
										<tr>
											<td width="50%">Adjustable Headlights</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="adjust_headlight" id="adjust_headlight1" value="Yes" <?php if($oadjust_head=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="adjust_headlight" id="adjust_headlight2" value="No"  <?php if($oadjust_head=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>

										<tr>
											<td>Fog Lights(Front)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="fog_light_f" id="fog_light_f1" value="Yes" <?php if($ofog_light_f=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="fog_light_f" id="fog_light_f2" value="No" <?php if($ofog_light_f=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Fog Lights(Rear)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="fog_light_r" id="fog_light_r1" value="Yes" <?php if($ofog_light_r=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="fog_light_r" id="fog_light_r2" value="No" <?php if($ofog_light_r=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Power Adjustable Exterior Rear-View Mirror</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="power_adjust_rear_mirror" id="power_adjust_rear_mirror1" value="Yes" <?php if($opow_adj_r=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="power_adjust_rear_mirror" id="power_adjust_rear_mirror2" value="No" <?php if($opow_adj_r=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Manually Adjustable Exterior Rear-View Mirror</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="manual_adjust_rear_mirror" id="manual_adjust_rear_mirror1" value="Yes" <?php if($omanual_adjust_r_m=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="manual_adjust_rear_mirror" id="manual_adjust_rear_mirror2" value="No" <?php if($omanual_adjust_r_m=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Electric Folding Rear View Mirror</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="electric_folding_rear_mirror" id="electric_folding_rear_mirror1" value="Yes" <?php if($oele_folding_r=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="electric_folding_rear_mirror" id="electric_folding_rear_mirror2" value="No" <?php if($oele_folding_r=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rain Sensing Wiper</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rain_sensing_wiper" id="rain_sensing_wiper1" value="Yes" <?php if($orain_sen_w=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="rain_sensing_wiper" id="rain_sensing_wiper2" value="No" <?php if($orain_sen_w=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Window Wiper</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_window_wiper" id="rear_window_wiper1" value="Yes" <?php if($orear_window_w=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="rear_window_wiper" id="rear_window_wiper2" value="No" <?php if($orear_window_w=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										 
		  
				
			<tr>
											<td>Rear Window Washer</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_window_washer" id="rear_window_washer1" value="Yes" <?php if($orear_win_washer=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="rear_window_washer" id="rear_window_washer2" value="No" <?php if($orear_win_washer=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Window Defogger</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_window_defogger" id="rear_window_defogger1" value="Yes" <?php if($orear_win_defog=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="rear_window_defogger" id="rear_window_defogger2" value="No" <?php if($orear_win_defog=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Wheel Covers</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="wheel_covers" id="wheel_covers1" value="Yes" <?php if($owheel_covers=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="wheel_covers" id="wheel_covers2" value="No" <?php if($owheel_covers=="No") echo "checked"; ?>  />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Alloy Wheel</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="alloy_wheel" id="alloy_wheel1" value="Yes" <?php if($oalloy_wheel=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="alloy_wheel" id="alloy_wheel2" value="No" <?php if($oalloy_wheel=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Power Antenna</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="power_antenna" id="power_antenna1" value="Yes" <?php if($opower_antenna=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="power_antenna" id="power_antenna2" value="No" <?php if($opower_antenna=="No") echo "checked"; ?>  />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Tinted Glass</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="tinted_glass" id="tinted_glass1" value="Yes" <?php if($otinted_g=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="tinted_glass" id="tinted_glass2" value="No"  <?php if($otinted_g=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
                                         <tr>
											<td>Rear Spoiler</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_spoiler" id="rear_spoiler1" value="Yes" <?php if($orear_spoiler=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="rear_spoiler" id="rear_spoiler2" value="No" <?php if($orear_spoiler=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Removable/Convertible Top</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="convertible" id="convertible1" value="Yes" <?php if($oconvertible=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="convertible" id="convertible2" value="No" <?php if($oconvertible=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Roof Carrier</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="roof_carrier" id="roof_carrier1" value="Yes" <?php if($oroof_carrier=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="roof_carrier" id="roof_carrier2" value="No" <?php if($oroof_carrier=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Sun Roof</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="sun_roof" id="sun_roof1" value="Yes"  <?php if($osun_roof=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="sun_roof" id="sun_roof2" value="No" <?php if($osun_roof=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Moon Roof</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="moon_roof" id="moon_roof1" value="Yes" <?php if($omoon_roof=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="moon_roof" id="moon_roof2" value="No" <?php if($omoon_roof=="No") echo "checked"; ?>  />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Side Stepper</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="side_steeper" id="side_steeper1" value="Yes" <?php if($oside_steeper=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="side_steeper" id="side_steeper2" value="No" <?php if($oside_steeper=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Outside Rear View Mirror Turn Indicators</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="outside_mirror_indicator" id="outside_mirror_indicator1" value="Yes" <?php if($ooutside_mirror_i=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="outside_mirror_indicator" id="outside_mirror_indicator2" value="No" <?php if($ooutside_mirror_i=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
  
  
												<tr>
											<td>Integrated Antenna</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="integrated_antenna" id="integrated_antenna1" value="Yes" <?php if($ointegrated_antenna=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="integrated_antenna" id="integrated_antenna2" value="No" <?php if($ointegrated_antenna=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Chrome Grille</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="chrome_grille" id="chrome_grille1" value="Yes" <?php if($ochrome_grille=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="chrome_grille" id="chrome_grille2" value="No" <?php if($ochrome_grille=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Chrome Garnish</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="chrome_garnish" id="chrome_garnish1" value="Yes" <?php if($ochrome_garnish=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="chrome_garnish" id="chrome_garnish2" value="No" <?php if($ochrome_garnish=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Smoke Headlamps</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="smoke_headlamps" id="smoke_headlamps1" value="Yes" <?php if($osmoke_headlamps=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="smoke_headlamps" id="smoke_headlamps2" value="No" <?php if($osmoke_headlamps=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Roof Rail</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="roof_rail" id="roof_rail1" value="Yes" <?php if($oroof_rail=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="roof_rail" id="roof_rail2" value="No"  <?php if($oroof_rail=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										
										
										
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Car Exterior Info">
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