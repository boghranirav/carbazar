<?php
include("page_master.php");
?>
<title>
Add Version Performance, Fuel And Tyres
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
						$("#version").hide();
						$("#overview").hide();
						
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
		$top_speed=$_POST["t_speed"];
		$p_accel=$_POST["p_acceleration"];
	
		$mileage_c=$_POST["m_city"];
		$mileage_h=$_POST["m_highway"];
		$f_type=$_POST["fuel_type"];
		$f_capacity=$_POST["f_capacity"];
		$f_comp=$_POST["f_comp"];

		$tyre_s=$_POST["t_size"];
		$tyre_t=$_POST["t_type"];
		$wheel_s=$_POST["wheel_size"];
		$alloy_s=$_POST["alloy_size"];
		
			$err['bid']="";
			$err['mid']="";
			$err['vid']="";
	    	$err['tspeed']="";
			$err['accel']="";
			$err['mcity']="";
			$err['mhighway']="";
			$err['fcap']="";
			$err['fcomp']="";
			$err['tsize']="";
			$err['ttype']="";
			$err['wsize']="";
			
			
			
			if($bid=="0"){
				$err['bid']="<font color='red'>*Select Brand.</font>";
			}
			
			if($mid=="0"){
				$err['mid']="<font color='red'>*Select Model.</font>";
			}
			
			if($vvid=="0"){
				$err['vid']="<font color='red'>*Select Version.</font>";
			}
		
			if($top_speed==""){
				$err['tspeed']="<font color='red'>*Enter Value.</font>";
			}
			if($p_accel==""){
				$err['accel']="<font color='red'>*Enter Value.</font>";
			}			
			
			if($mileage_c==""){
				$err['mcity']="<font color='red'>*Enter Value.</font>";
			}
			if($mileage_h==""){
				$err['mhighway']="<font color='red'>*Enter Value.</font>";
			}
			if($f_capacity==""){
				$err['fcap']="<font color='red'>*Enter Value.</font>";
			}
			if($f_comp==""){
				$err['fcomp']="<font color='red'>*Enter Value.</font>";
			}
			if($tyre_s==""){
				$err['tsize']="<font color='red'>*Enter Value.</font>";
			}
			if($tyre_t==""){
				$err['ttype']="<font color='red'>*Enter Value.</font>";
			}			
			if($wheel_s==""){
				$err['wsize']="<font color='red'>*Enter Value.</font>";
			}
			
		if($err['bid']=="" && $err['mid']=="" && $err['vid']=="" && $err['tspeed']=="" && $err['accel']=="" && $err['mcity']=="" &&
	$err['mhighway']=="" &&	$err['fcap']=="" && $err['fcomp']=="" && $err['tsize']=="" && $err['ttype']=="" && $err['wsize']==""){
		
		include("connection.php");
			
			$sql1="insert into car_performance values($vvid,'$top_speed','$p_accel')";
			$sql2="insert into car_fuel values($vvid,'$mileage_c','$mileage_h','$f_type','$f_capacity','$f_comp')";
			$sql3="insert into car_tyres values($vvid,'$tyre_s','$tyre_t','$wheel_s','$alloy_s')";
			
			$res1=mysql_query($sql1);
			if($res1){
				$res2=mysql_query($sql2);
				if($res2){
					$res3=mysql_query($sql3);
					if($res3){
						header("location:view_car.php");
					}
						else
						{
							$errmsg="car tyres system not added.";
						}
					}
					else
					{
						$errmsg="car tyres and car fuel not added.";
					}
				}
				else
				{
					$errmsg="Data Not Added.";
				}
		}
	}
	
	?>
	

                        <h1 class="page-header"> Add Version Performance, Fuel And Tyres </h1>
						<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>
						<form action="car_performance_fuel_tyres.php" method="post">
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
                                <h5> Performance, Fuel And Tyres</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <tr>
											<td colspan="2">
											<center>
											<label><h3> Performance</h3></label>
											</center>
											</td>
										</tr>
										<tr>
											<td width="20%">Top Speed</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Top Speed" name="t_speed" value="<?php if(isset($_POST['submit']))  echo $top_speed;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['tspeed'];
											   }
											 ?>

											</td>
										</tr>
										<tr>
											<td>Acceleration</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Acceleration" name="p_acceleration" value="<?php if(isset($_POST['submit']))  echo $p_accel;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['accel'];
											   }
											 ?>

											</td>
										</tr>
													
									<tr></tr>									
										<tr>
											<td colspan="2">
											<center>
											<label><h3>Fuel </h3></label>
											</center>
											</td>
										</tr>
										
										
										<tr>
											<td>Mileage City</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Mileage City" name="m_city" value="<?php if(isset($_POST['submit']))  echo $mileage_c;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['mcity'];
											   }
											 ?>

											</td>
										</tr>
										<tr>
											<td>Mileage Highway</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Mileage City" name="m_highway" value="<?php if(isset($_POST['submit']))  echo $mileage_h;?>" >
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['mhighway'];
											   }
											 ?>

											</td>
										</tr>
										
										<tr>
											<td>Fuel Type</td>
											<td>
											 <div class="col-lg-6">
                                                <select name="fuel_type" id="fuel_type" class="validate[required] form-control" >
                                                    <option value="Petrol" <?php if(isset($_POST['submit'])){if($f_type=="Petrol") echo "selected";}?>>Petrol</option>
													<option value="Diesel" <?php if(isset($_POST['submit'])){if($f_type=="Diesel") echo "selected";}?>>Diesel</option>
													<option value="CNG" <?php if(isset($_POST['submit'])){if($f_type=="CNG") echo "selected";}?>>CNG</option>
                                                </select>
                                            </div>
											</td>
										</tr>
										<tr>
											<td>Fuel Tank Capacity</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Tank Capacity" name="f_capacity" value="<?php if(isset($_POST['submit']))  echo $f_capacity;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['fcap'];
											   }
											 ?>

											</td>
										</tr>
										<tr>
											<td>Emission Norm Compliance</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Emission Norm Compliance" name="f_comp" value="<?php if(isset($_POST['submit']))  echo $f_comp;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['fcomp'];
											   }
											 ?>

											</td>
										</tr>
								
										<tr>
											<td colspan="2">
											<center>
											<label><h3> Tyres</h3></label>
											</center>
											</td>
										</tr>
									
										<tr>
											<td>Tyre Size</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Tyre Size" name="t_size" value="<?php if(isset($_POST['submit']))  echo $tyre_s;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['tsize'];
											   }
											 ?>

											</td>
                                        </tr>
										<tr>
											<td>Tyre Type</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Tyre Type" name="t_type" value="<?php if(isset($_POST['submit']))  echo $tyre_t;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['ttype'];
											   }
											 ?>

											</td>
                                        </tr>
										<tr>
											<td>Wheel Size</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Tyre Type" name="wheel_size" value="<?php if(isset($_POST['submit']))  echo $wheel_s;?>" >
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['wsize'];
											   }
											 ?>

											</td>
                                        </tr>
										<tr>
											<td>Alloy Wheel Size</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Tyre Type" name="alloy_size" value="<?php if(isset($_POST['submit']))  echo $alloy_s ;?>" >
											</div>
											</td>
                                        </tr>
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Add Car Performance, Fuel And Tyres">
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