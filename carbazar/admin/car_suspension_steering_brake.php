<?php
include("page_master.php");
?>
<title>
Add Version Suspension, Steering And Brake System
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
			$fsus=$_POST["f_suspension"];
			$rsus=$_POST["r_suspension"];
			$absorbers_type=$_POST["absorbers_type"];
											
			$s_type=$_POST["steering_type"];
            $s_column=$_POST["steering_column"];
			$s_gear=$_POST["gear_type"];
			$s_radius=$_POST["turning_radius"];
			$power_s=$_POST["power_steering"];
			$s_multi=$_POST["multi_function"];
			
			$f_brake_type=$_POST["f_brake_Type"];
			$r_brake_type=$_POST["r_brake_type"];
			
            $err['vid']="";
			$err['bid']="";
			$err['mid']="";
			
			$err['fsus']="";
			$err['rsus']="";
			$err['sabt']="";
			$err['scolumn']="";
			$err['sgt']="";
			$err['tur']="";
			$err['fbt']="";
			$err['rbt']="";

			if($bid=="0"){
				$err['bid']="<font color='red'>*Select Brand.</font>";
			}
			
			if($mid=="0"){
				$err['mid']="<font color='red'>*Select Model.</font>";
			}
			
			if($vvid=="0"){
				$err['vid']="<font color='red'>*Select Version.</font>";
			}
		
    		if($fsus==""){
				$err['fsus']="<font color='red'>*Enter Value.</font>";
			}
			if($rsus==""){
				$err['rsus']="<font color='red'>*Enter Value.</font>";
			}
		   if($absorbers_type==""){
				$err['sabt']="<font color='red'>*Enter Value.</font>";
			}			
		   
		   if($s_column==""){
				$err['scolumn']="<font color='red'>*Enter Value.</font>";
			}
		   
		   if($s_gear==""){
				$err['sgt']="<font color='red'>*Enter Value.</font>";
			}		
		   
		   if($s_radius==""){
				$err['tur']="<font color='red'>*Enter Value.</font>";
			}
           if($f_brake_type==""){
				$err['fbt']="<font color='red'>*Enter Value.</font>";
			}
          if($r_brake_type==""){
				$err['rbt']="<font color='red'>*Enter Value.</font>";
			}			
			
		if($err['bid']=="" && $err['mid']=="" && $err['vid']=="" && $err['fsus']=="" &&	$err['rsus']=="" && $err['sabt']=="" && 
		$err['scolumn']=="" && $err['sgt']=="" && $err['tur']=="" && $err['fbt']=="" && $err['rbt']==""){	
		      include("connection.php");
			$sql1="insert into car_suspension values($vvid,'$fsus','$rsus','$absorbers_type')";
			$sql2="insert into car_steering values($vvid,'$s_type','$s_column','$power_s','$s_gear','$s_radius','$s_multi')";
			$sql3="insert into car_brake_system values($vvid,'$f_brake_type','$r_brake_type')";
			
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
							$errmsg="car brake system not added.";
						}
					}
					else
					{
						$errmsg="car steering and car brake system not added.";
					}
				}
				else
				{
					$errmsg="Data Not Added.";
				}		
			}
	}
	?>

                        <h1 class="page-header"> Add Version Suspension, Steering And Brake System </h1>
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
                                <h5>Suspension, Steering And Brake System</h5>
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
											<label><h3>Suspension System</h3></label>
											</center>
											</td>
										</tr>
										<tr>
											<td width="20%">Front Suspension</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Front suspension" name="f_suspension" value="<?php if(isset($_POST['submit']))  echo $fsus;?>" >
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['fsus'];
											   }
											 ?>
											</td>
										</tr>
										<tr>
											<td>Rear Suspension</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Rear suspension" name="r_suspension" value="<?php if(isset($_POST['submit']))  echo $rsus;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['rsus'];
											   }
											 ?>
											</td>
										</tr>
										<tr>
											<td>Shock Absorbers Type</td>
											<td>
												<div class="col-lg-6">
											  <input class="form-control" placeholder="Enter Shock Absorbers Type" name="absorbers_type" value="<?php if(isset($_POST['submit']))  echo $absorbers_type;?>">
											  </div>
											  <?php if(isset($_POST['submit'])){
												echo $err['sabt'];
											   }
											 ?>
											  </td>
										</tr>
										
										<tr>
											<td colspan="2">
											<center>
											<label><h3>Steering</h3></label>
											</center>
											</td>
										</tr>
										
										
										<tr>
											<td>Steering Type</td>
											<td>
											<div class="col-lg-6">
                                                <select name="steering_type" id="steering_type" class="validate[required] form-control" length="10">
                                                    <option value="Manual" <?php if(isset($_POST['submit'])){if($s_type=="Manual") echo "selected";}?>>Manual</option>
													<option value="Power" <?php if(isset($_POST['submit'])){ if($s_type=="Power") echo "selected" ;}?>>Power</option>
                                                </select>
                                            </div>
											</td>
										</tr>
										<tr>
											<td>Steering Column</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Steering Column" name="steering_column" value="<?php if(isset($_POST['submit']))  echo $s_column;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['scolumn'];
											   }
											 ?>
											</td>
										</tr>
										
										<tr>
											<td>Steering Gear Type</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Steering Gear Type" name="gear_type" value="<?php if(isset($_POST['submit']))  echo $s_gear;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['sgt'];
											   }
											 ?>
											</td>
										</tr>
										<tr>
											<td>Turning Radius</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Turning Radius" name="turning_radius" value="<?php if(isset($_POST['submit']))  echo $s_radius;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['tur'];
											   }
											 ?>
											</td>
										</tr>
										<tr>
											<td>Power Steering</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="power_steering" id="power_steering1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="power_steering" id="power_steering2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Multifunction-Steering</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="multi_function" id="multi_function1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="multi_function" id="multi_function2" value="No" />
												<label>No</label>
                                            </div>
											</td>
                                        </tr>
									<tr></tr>
										<tr>
											<td colspan="2">
											<center>
											<label><h3>Brake System</h3></label>
											</center>
											</td>
										</tr>
									
										<tr>
											<td>Front Brake Type</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Front Brake Type" name="f_brake_Type" value="<?php if(isset($_POST['submit']))  echo $f_brake_type; ?>" >
											</div>
                                                <?php if(isset($_POST['submit'])){
												echo $err['fbt'];
											   }
											 ?>											
											</td>
                                        </tr>
										<tr>
											<td>Rear Brake Type</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Rear Brake Type" name="r_brake_type" value="<?php if(isset($_POST['submit']))  echo $r_brake_type;?>" >
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['rbt'];
											   }
											 ?>
											</td>
                                        </tr>
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Add Car Suspension, Steering And Brake System">
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