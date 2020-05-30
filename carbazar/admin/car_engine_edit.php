<?php
include("master.php");
?>
<title>
Edit engine Version Details
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

$olddata2=mysql_query("select *from  car_engine  where v_id='$id'");
if(mysql_num_rows($olddata2)<=0){
	header("location:view_car.php");
}

$row=mysql_fetch_array($olddata2);

	        $oeng_type=$row['engine_type'];
			$oeng_des=$row['engine_description'];
			$oeng_dis=$row['engine_displacement'];
			$ono_cyl=$row['no_cylinders'];
			$omax_pow=$row['maximum_power'];
			$omax_tor=$row['maximum_torque'];
			$ovalves_per_cyl=$row['valves_per_cylinder'];
			$oval_config=$row['valve_configuration'];
			$ofuel_system=$row['fuel_supply_system'];
			$obore_stroke=$row['bore_x_stroke'];
			$ocomp_ratio=$row['compression_ratio'];
			$oturbo_charge=$row['turbo_charger'];
			$osuper_charge=$row['super_charger'];
	

?>

	
	<?php
	$errmsg="";
		if(isset($_REQUEST['submit'])){
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
			
			
			
     		$err['etype']="";
			$err['edes']="";
			$err['edis']="";
			$err['ncyl']="";
			$err['mpower']="";
			$err['mtor']="";
			$err['vpc']="";
		
			
			
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

	if($err['etype']=="" && $err['edes']=="" && $err['edis']=="" && $err['ncyl']=="" && $err['mpower']=="" && $err['mtor']=="" && $err['vpc']==""){
			include("connection.php");
			
		$sql=mysql_query("update car_engine  set engine_type='$eng_type',engine_description='$eng_des',
		     engine_displacement='$eng_dis',no_cylinders=$no_cyl,maximum_power='$max_pow',maximum_torque='$max_tor',
			valves_per_cylinder=$valves_per_cyl,valve_configuration='$val_config',
	        fuel_supply_system='$fuel_system',bore_x_stroke='$bore_stroke',
			compression_ratio='$comp_ratio',turbo_charger='$turbo_charge',super_charger='$super_charge' where v_id='$id'");
			if($sql)
			{
			header("location:view_car.php");
			}
			else
			{
			$errmsg="Data not edited";
			}
	}
	}		
			
	?>
	
	

                        <h1 class="page-header"> Edit Version Engine  </h1>
						
	
	<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>
						<form action="#" method="post">
						
	
						
						<div class="box" id="overview">
                            <header>
                                <h5>Car Engine</h5>
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
											<input class="form-control" placeholder="Enter Engine Type" name="e_type"  value="<?php echo  $oeng_type ; ?>" >
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
											<input class="form-control" placeholder="Enter Engine Description" name="e_description" value="<?php echo $oeng_des ; ?>" >
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
											  <input class="form-control" placeholder="Enter Engine Displacement" name="e_displacement" value="<?php echo  $oeng_dis ; ?>" >
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
											<input class="form-control" placeholder="Enter No. of Cylinders" name="no_cylinder" value="<?php echo  $ono_cyl ; ?>" >
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
											<input class="form-control" placeholder="Enter Maximum Power" name="max_power"  value="<?php echo  $omax_pow ; ?>" >
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
											<input class="form-control" placeholder="Enter Maximum Torque" name="max_torque"  value="<?php echo $omax_tor ; ?>" >
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
											<input class="form-control" placeholder="Enter Valves Per Cylinder" name="valves_cylinder"  value="<?php echo  $ovalves_per_cyl ; ?>" >
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
											<input class="form-control" placeholder="Enter Valve Configuration" name="valve_config" value="<?php echo $oval_config ; ?>" >
											</div>
											</td>
										</tr>
										<tr>
											<td>Fuel Supply System</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Fuel Supply System" name="fuel_system" value="<?php echo  $ofuel_system ; ?>" >
											</div>
											</td>
                                        </tr>
										<tr>
											<td>Bore X Stroke</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Bore X Stroke" name="bore_stroke" value="<?php echo  $obore_stroke ; ?>" >
											</div>
											</td>
                                        </tr>
										<tr>
											<td>Compression Ratio</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Compression Ratio" name="compression_ratio" value="<?php echo  $ocomp_ratio ; ?>" >
											</div>
											</td>
                                        </tr>
										<tr>
											<td>Turbo Charge</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="turbo_charge" id="turbo_charge1" value="Yes" <?php if($oturbo_charge=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="turbo_charge" id="turbo_charge2" value="No"  <?php if($oturbo_charge=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>
											</td>
                                        </tr>
						
							<tr>
											<td>Super Charge</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="super_charge" id="super_charge1" value="Yes" <?php if($osuper_charge=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="super_charge" id="super_charge2" value="No" <?php if($osuper_charge=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>
											</td>
                                        </tr>
										
										
                                    <tr>
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Car Engine">
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