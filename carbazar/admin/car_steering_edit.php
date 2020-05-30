<?php
include("master.php");
?>
<title>
Edit Version Steering
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


$olddata2=mysql_query("select *from  car_steering where v_id='$id'");
if(mysql_num_rows($olddata2)<=0){
	header("location:view_car.php");
}
$row=mysql_fetch_array($olddata2);
		    $os_type=$row["steering_type"];
            $os_column=$row["steering_column"];
			$opower_s=$row["power_steering"];
			$os_gear=$row["steering_gear_type"];
			$os_radius=$row["turning_radious"];
			$os_multi=$row["multifunction_steering"];


?>


	
	<?php
	$errmsg="";
	if(isset($_POST['submit'])){
	
         	$s_type=$_POST["steering_type"];
            $s_column=$_POST["steering_column"];
			$s_gear=$_POST["gear_type"];
			$s_radius=$_POST["turning_radius"];
			$power_s=$_POST["power_steering"];
			$s_multi=$_POST["multi_function"];

			$err['scolumn']="";
			$err['sgt']="";
			$err['tur']="";
           
		   if($s_column==""){
				$err['scolumn']="<font color='red'>*Enter Value.</font>";
			}
		   
		   if($s_gear==""){
				$err['sgt']="<font color='red'>*Enter Value.</font>";
			}		
		   
		   if($s_radius==""){
				$err['tur']="<font color='red'>*Enter Value.</font>";
			}
           			
			
		if($err['scolumn']=="" && $err['sgt']=="" && $err['tur']==""){	
		     
	
				include("connection.php");
			
			$sql1="update car_steering set steering_type='$s_type',steering_column='$s_column',power_steering='$power_s',steering_gear_type='$s_gear',turning_radious='$s_radius',multifunction_steering='$s_multi' where v_id='$id'";
			
			$res1=mysql_query($sql1);
			if($res1){
			header("location:view_car.php");
					}
						else
						{
							$errmsg="Data not edited.";
						}
		}
	}
	
	?>
	

                        
					<h1 class="page-header"> Edit Version Steering</h1>
						<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>
					<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>	
						<form action="#" method="post">
						
						<div class="box" id="overview">
                            <header>
                                <h5> Steering</h5>
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
											<label><h3>Steering System</h3></label>
											</center>
											</td>
										</tr>
										<tr>

                                       <tr>
											<td width="20%">Steering Type</td>
											<td width="40%">
											<div class="col-lg-6">
                                                <select name="steering_type" id="steering_type" class="validate[required] form-control" length="10">
                                                    <option value="Manual" <?php if($os_type=="Manual") echo "selected=selected";?>>Manual</option>
													<option value="Power" <?php if($os_type=="Power") echo "selected=selected";?>>Power</option>
                                                </select>
                                            </div>
											</td>
										</tr>
										<tr>
											<td>Steering Column</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Steering Column" name="steering_column" value="<?php echo  $os_column ;?>">
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
											<input class="form-control" placeholder="Enter Steering Gear Type" name="gear_type" value="<?php echo $os_gear;?>" >
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
											<input class="form-control" placeholder="Enter Turning Radius" name="turning_radius" value="<?php echo $os_radius ;?>">
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
                                                <input type="radio" name="power_steering" id="power_steering1" value="Yes" <?php if($opower_s=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="power_steering" id="power_steering2" value="No" <?php if($opower_s=="No") echo "checked"; ?>/>
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Multifunction-Steering</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="multi_function" id="multi_function1" value="Yes" <?php if($os_multi=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="multi_function" id="multi_function2" value="No" <?php if($os_multi=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>
											</td>
                                        </tr>
									<tr></tr>			
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Version Steering">
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