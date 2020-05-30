<?php
include("master.php");
?>
<title>
Edit Version  Fuel 
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

$olddata2=mysql_query("select *from  car_fuel where v_id='$id'");
if(mysql_num_rows($olddata2)<=0){
	header("location:view_car.php");
}

$row=mysql_fetch_array($olddata2);
        $omileage_c=$row['mileage_city'];
		$omileage_h=$row["mileage_highway"];
		$of_type=$row["fuel_type"];
		$of_capacity=$row["fuel_capacity"];
		$of_comp=$row["emission_norm_compliance"];

?>

	
	<?php
	$errmsg="";
	if(isset($_POST['submit'])){
		
		$mileage_c=$_POST["m_city"];
		$mileage_h=$_POST["m_highway"];
		$f_type=$_POST["fuel_type"];
		$f_capacity=$_POST["f_capacity"];
		$f_comp=$_POST["f_comp"];
		
		$err['mcity']="";
			$err['mhighway']="";
			$err['fcap']="";
			$err['fcomp']="";

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

	if($err['mcity']=="" &&	$err['mhighway']=="" &&	$err['fcap']=="" && $err['fcomp']==""){
			
	     include("connection.php");
			$sql1="update car_fuel set mileage_city='$mileage_c',mileage_highway='$mileage_h',fuel_type='$f_type',fuel_capacity='$f_capacity',emission_norm_compliance='$f_comp' where v_id='$id'";
			
			
			$res1=mysql_query($sql1);
			if($res1){
			header("location:view_car.php");
					}
						else
						{
							$errmsg="Data not Edited.";
						}

	  }
	}
	
	?>
	

               <h1 class="page-header"> Edit Version Fuel Details </h1>
<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>
			   <b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>
         
						
						<form action="#" method="post">
						
						<div class="box" id="overview">
                            <header>
                                <h5> Fuel </h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                      										
									
										<tr>
											<td width="20%">Mileage City</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Mileage City" name="m_city" value="<?php echo $omileage_c;?>" >
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
											<input class="form-control" placeholder="Enter Mileage City" name="m_highway" value="<?php echo $omileage_h ;?>" >
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
                                                <select name="fuel_type" id="fuel_type" class="validate[required] form-control"  >
                                                    <option value="Petrol" <?php if($of_type=="Petrol") echo "selected=selected";?>>Petrol</option>
													<option value="Diesel" <?php if($of_type=="Diesel") echo "selected=selected";?>>Diesel</option>
													<option value="CNG" <?php if($of_type=="CNG") echo "selected=selected";?>>CNG</option>
                                                </select>
                                            </div>
											</td>
										</tr>
										<tr>
											<td>Fuel Tank Capacity</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Tank Capacity" name="f_capacity" value="<?php echo $of_capacity;?>" >
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
											<input class="form-control" placeholder="Enter Emission Norm Compliance" name="f_comp" value="<?php echo $of_comp;?>" >
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['fcomp'];
											   }
											 ?>
											</td>
										</tr>
								
										
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Version Fuel ">
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