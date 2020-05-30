<?php
include("page_master.php");
?>
<title>
Add Version Details
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
	$ermsg="";
		if(isset($_REQUEST['submit'])){
			$bid=$_POST['b_id'];
			$mid=$_POST['m_id'];
			$vid1=$_POST['v_id'];
			
			
			
			$eng_type=$_POST['e_type'];
			$eng_des=$_POST['e_description'];
			$eng_dis=$_POST['e_displacement'];
			$no_cyl=$_POST['no_cylinder'];
			$max_pow=$_POST['max_power'];
			$max_tor=$_POST['max_torque'];
			$valves_per_cyl=$_POST['valves_cylinder'];
			$val_config=$_POST['valve_config'];
			$fuel_system=$_POST['fuel_system'];
			$bore_stroke=$_POST['bore_stroke'];
			$comp_ratio=$_POST['compression_ratio'];
			$turbo_charge=$_POST['turbo_charge'];
			$super_charge=$_POST['super_charge'];
			
			$transmission_type=$_POST['transmission_type'];
			$gear_box=$_POST['gear_box'];
			$drive_type=$_POST['drive_type'];
			

			$err['vid']="";
			$err['bid']="";
			$err['mid']="";
		
     		$err['etype']="";
			$err['edes']="";
			$err['edis']="";
			$err['ncyl']="";
			$err['mpower']="";
			$err['mtor']="";
			$err['vpc']="";
		
			$err['ttype']="";
			$err['gbox']="";
			$err['dtype']="";
			
			if($bid=="0"){
				$err['bid']="<font color='red'>*Select Brand.</font>";
			}
			
			if($mid=="0"){
				$err['mid']="<font color='red'>*Select Model.</font>";
			}
			
			if($vid1=="0"){
				$err['vid']="<font color='red'>*Select Version.</font>";
			}
			
			if($eng_type=="")
			{
				$err['etype']="<font color='red'>*Enter Value.</font>";
			}
			if($eng_des=="")
			{
				$err['edes']="<font color='red'>*Enter Value.</font>";
			}
			if($eng_dis=="")
			{
				$err['edis']="<font color='red'>*Enter Value.</font>";
			}
			if($no_cyl=="")
			{
				$err['ncyl']="<font color='red'>*Enter Value.</font>";
			}
			if($max_pow=="")
			{
				$err['mpower']="<font color='red'>*Enter Value.</font>";
			}
			if($max_tor=="")
			{
				$err['mtor']="<font color='red'>*Enter Value.</font>";
			}
			if($valves_per_cyl=="")
			{
				$err['vpc']="<font color='red'>*Enter Value.</font>";
			}	
			if($transmission_type=="")
			{
				$err['ttype']="<font color='red'>*Enter Value.</font>";
			}
			if($gear_box=="")
			{
				$err['gbox']="<font color='red'>*Enter Value.</font>";
			}
			if($drive_type=="")
			{
				$err['dtype']="<font color='red'>*Enter Value.</font>";
			}
	if($err['bid']=="" && $err['mid']=="" && $err['vid']=="" && $err['etype']=="" && $err['edes']=="" && $err['edis']=="" && $err['ncyl']=="" && $err['mpower']=="" && $err['mtor']=="" && $err['vpc']=="" && $err['ttype']=="" && $err['gbox']=="" && $err['dtype']=="" ){
			include("connection.php");
		
		$sql="insert into car_engine values($vid1,'$eng_type','$eng_des','$eng_dis','$no_cyl','$max_pow','$max_tor','$valves_per_cyl','$val_config','$fuel_system','$bore_stroke','$comp_ratio','$turbo_charge','$super_charge')";
			
			
			$sql1="insert into car_transmission values($vid1,'$transmission_type','$gear_box','$drive_type')";
			
			
			$res1=mysql_query($sql);

			
			if($res1){
								$res2=mysql_query($sql1);
								if($res2){
									header("location:view_car.php");
								}
								else
								{
								$ermsg="Car Engine Added But Car Transmission Not Added.";
								}
								
			}else
			{
				$ermsg="No Data Added.";
			}
			
			}
			
		}
	?>
	
	

                        <h1 class="page-header"> Add Version Engine And Transmission </h1>
						<font color="red"><?php if(isset($_POST['submit'])) echo $ermsg ;?></font>
						<br>
						<form action="car_engine_transmission.php" method="post">
						
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
                                <h5>Car Engine And Transmission</h5>
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
											<label><h3>Engine</h3></label>
											</center>
											</td>
										</tr>
										<tr>
											<td width="20%">Engine Type</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Engine Type" name="e_type" value="<?php if(isset($_POST['submit'])) echo $eng_type;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['etype'];
											   }
											 ?>
											</td>
										</tr>
										<tr>
											<td>Engine Description</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Engine Description" name="e_description" value="<?php if(isset($_POST['submit'])) echo $eng_des;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['edes'];
											   }
											 ?>
											</td>
										</tr>
										<tr>
											<td>Engine Displacement</td>
											<td>
												<div class="col-lg-6">
											  <input class="form-control" placeholder="Enter Engine Displacement" name="e_displacement" value="<?php if(isset($_POST['submit'])) echo $eng_dis;?>">
                                              </div>											 
											 <?php if(isset($_POST['submit'])){
												echo $err['edis'];
											   }
											 ?>
											  </td>
											  
											 
										</tr>
										<tr>
											<td>Number of Cylinders</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter No. of Cylinders" name="no_cylinder"  value="<?php if(isset($_POST['submit'])) echo $no_cyl;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['ncyl'];
											   }
											 ?>
											</td>
										</tr>
										<tr>
											<td>Maximum Power</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Maximum Power" name="max_power" value="<?php if(isset($_POST['submit'])) echo $max_pow;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['mpower'];
											   }
											 ?>
											</td>
										</tr>
										
										<tr>
											<td>Maximum Torque</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Maximum Torque" name="max_torque" value="<?php if(isset($_POST['submit'])) echo $max_tor;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['mtor'];
											   }
											 ?>
											</td>
										</tr>
										<tr>
											<td>Valves Per Cylinder</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Valves Per Cylinder" name="valves_cylinder" value="<?php if(isset($_POST['submit'])) echo $valves_per_cyl;?>" >
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['vpc'];
											   }
											 ?>
											</td>
										</tr>
										<tr>
											<td>Valve Configuration</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Valve Configuration" name="valve_config" value="<?php if(isset($_POST['submit'])) echo $val_config;?>">
											</div>
											</td>
										</tr>
										<tr>
											<td>Fuel Supply System</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Fuel Supply System" name="fuel_system" value="<?php if(isset($_POST['submit'])) echo $fuel_system;?>" >
											</div>
											</td>
                                        </tr>
										<tr>
											<td>Bore X Stroke</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Bore X Stroke" name="bore_stroke" value="<?php if(isset($_POST['submit'])) echo $bore_stroke;?>">
											</div>
											</td>
                                        </tr>
										<tr>
											<td>Compression Ratio</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Compression Ratio" name="compression_ratio" value="<?php if(isset($_POST['submit'])) echo $comp_ratio?>" >
											</div>
											</td>
                                        </tr>
										<tr>
											<td>Turbo Charge</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="turbo_charge" id="turbo_charge1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="turbo_charge" id="turbo_charge2" value="No" />
												<label>No</label>
                                            </div>
											</td>
                                        </tr>
										<tr>
											<td>Super Charge</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="super_charge" id="super_charge1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="super_charge" id="super_charge2" value="No" />
												<label>No</label>
                                            </div>
											</td>
                                        </tr>
										
										<tr>
											<td colspan="2">
											<center><label><h3>Transmission</h3></label></center>
											</td>
                                        </tr>
										
										<tr>
											<td>Transmission Type</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Transmission Type" name="transmission_type" value="<?php if(isset($_POST['submit'])) echo $transmission_type;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['ttype'];
											   }
											 ?>
											</td>
                                        </tr>
										<tr>
											<td>Gear Box</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Gear Box" name="gear_box" value="<?php if(isset($_POST['submit'])) echo $gear_box;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['gbox'];
											   }
											 ?>
											</td>
                                        </tr>
										<tr>
											<td>Drive Type</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Drive Type" name="drive_type" value="<?php if(isset($_POST['submit'])) echo $drive_type;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['dtype'];
											   }
											 ?>
											</td>
                                        </tr>
										
                                    <tr>
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Add Car Engine And Transmission">
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