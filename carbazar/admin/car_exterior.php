<?php
include("page_master.php");
?>
<title>
Add Version Exterior Info
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
	if(isset($_POST['submit'])){
		$bid=$_POST['b_id'];
        $mid=$_POST['m_id'];
			$vvid=$_POST['v_id'];
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
		
		$tinted_g=$_POST["tinted_glass"];
		$rear_spoiler=$_POST["rear_spoiler"];
		$convertible=$_POST["convertible"];
		$roof_carrier=$_POST["roof_carrier"];
		$sun_roof=$_POST["sun_roof"];
		$moon_roof=$_POST["moon_roof"];
		$side_steeper=$_POST["side_steeper"]; 
		$outside_mirror_i=$_POST["outside_mirror_indicator"];
		$integrated_antenna=$_POST["integrated_antenna"];
		$chrome_grille=$_POST["chrome_grille"];
		$chrome_garnish=$_POST["chrome_garnish"];
		$smoke_headlamps=$_POST["smoke_headlamps"];
		$roof_rail=$_POST["roof_rail"];
												
$err['vid']="";
			$err['bid']="";
			$err['mid']="";
			
			
			if($bid=="0"){
				$err['bid']="<font color='red'>*Select Brand.</font>";
			}
			
			if($mid=="0"){
				$err['mid']="<font color='red'>*Select Model.</font>";
			}
			
			if($vvid=="0"){
				$err['vid']="<font color='red'>*Select Version.</font>";
			}
		
			
		if($err['bid']=="" && $err['mid']=="" && $err['vid']==""){												
				include("connection.php");
			
			$sql1="insert into car_exterior_1 values($vvid,'$adjust_head','$fog_light_f','$fog_light_r','$pow_adj_r','$manual_adjust_r_m','$ele_folding_r','$rain_sen_w','$rear_window_w','$rear_win_washer','$rear_win_defog','$wheel_covers','$alloy_wheel','$power_antenna')";
			$sql2="insert into car_exterior_2 values($vvid,'$tinted_g','$rear_spoiler','$convertible','$roof_carrier','$sun_roof','$moon_roof','$side_steeper'
			,'$outside_mirror_i','$integrated_antenna','$chrome_grille','$chrome_garnish','$smoke_headlamps','$roof_rail')";
						
			$res1=mysql_query($sql1);
			if($res1){
				$res2=mysql_query($sql2);
				if($res2){
					    header("location:view_car.php");
				}else
				{
						$errmsg="Data not added.";
					}
				}
				else
				{
					$errmsg="Data Not Added.";
				}		
              
		}  
	}
	?>

                        <h1 class="page-header"> Add Version Exterior Info</h1>
													<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>
						<form action="car_exterior.php" method="post">
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
                                                <input type="radio" name="adjust_headlight" id="adjust_headlight1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="adjust_headlight" id="adjust_headlight2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Fog Lights(Front)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="fog_light_f" id="fog_light_f1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="fog_light_f" id="fog_light_f2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Fog Lights(Rear)</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="fog_light_r" id="fog_light_r1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="fog_light_r" id="fog_light_r2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Power Adjustable Exterior Rear-View Mirror</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="power_adjust_rear_mirror" id="power_adjust_rear_mirror1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="power_adjust_rear_mirror" id="power_adjust_rear_mirror2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Manually Adjustable Exterior Rear-View Mirror</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="manual_adjust_rear_mirror" id="manual_adjust_rear_mirror1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="manual_adjust_rear_mirror" id="manual_adjust_rear_mirror2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Electric Folding Rear View Mirror</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="electric_folding_rear_mirror" id="electric_folding_rear_mirror1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="electric_folding_rear_mirror" id="electric_folding_rear_mirror2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rain Sensing Wiper</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rain_sensing_wiper" id="rain_sensing_wiper1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="rain_sensing_wiper" id="rain_sensing_wiper2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Window Wiper</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_window_wiper" id="rear_window_wiper1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="rear_window_wiper" id="rear_window_wiper2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Window Washer</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_window_washer" id="rear_window_washer1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="rear_window_washer" id="rear_window_washer2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Window Defogger</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_window_defogger" id="rear_window_defogger1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="rear_window_defogger" id="rear_window_defogger2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Wheel Covers</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="wheel_covers" id="wheel_covers1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="wheel_covers" id="wheel_covers2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Alloy Wheel</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="alloy_wheel" id="alloy_wheel1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="alloy_wheel" id="alloy_wheel2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Power Antenna</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="power_antenna" id="power_antenna1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="power_antenna" id="power_antenna2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Tinted Glass</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="tinted_glass" id="tinted_glass1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="tinted_glass" id="tinted_glass2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Rear Spoiler</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="rear_spoiler" id="rear_spoiler1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="rear_spoiler" id="rear_spoiler2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Removable/Convertible Top</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="convertible" id="convertible1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="convertible" id="convertible2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Roof Carrier</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="roof_carrier" id="roof_carrier1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="roof_carrier" id="roof_carrier2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Sun Roof</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="sun_roof" id="sun_roof1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="sun_roof" id="sun_roof2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Moon Roof</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="moon_roof" id="moon_roof1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="moon_roof" id="moon_roof2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Side Stepper</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="side_steeper" id="side_steeper1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="side_steeper" id="side_steeper2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Outside Rear View Mirror Turn Indicators</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="outside_mirror_indicator" id="outside_mirror_indicator1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="outside_mirror_indicator" id="outside_mirror_indicator2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Integrated Antenna</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="integrated_antenna" id="integrated_antenna1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="integrated_antenna" id="integrated_antenna2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Chrome Grille</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="chrome_grille" id="chrome_grille1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="chrome_grille" id="chrome_grille2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Chrome Garnish</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="chrome_garnish" id="chrome_garnish1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="chrome_garnish" id="chrome_garnish2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Smoke Headlamps</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="smoke_headlamps" id="smoke_headlamps1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="smoke_headlamps" id="smoke_headlamps2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Roof Rail</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="roof_rail" id="roof_rail1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="roof_rail" id="roof_rail2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										
										
										
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Add Car Exterior Info">
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