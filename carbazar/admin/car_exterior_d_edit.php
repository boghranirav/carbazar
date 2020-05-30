<?php
include("master.php");
?>
<title>
Edit Version Exterior Dimensions Info
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


$olddata2=mysql_query("select *from  car_exterior_dimension where v_id='$id'");
if(mysql_num_rows($olddata2)<=0){
	header("location:view_car.php");
}
$row=mysql_fetch_array($olddata2);
         $oc_length=$row["length"];
		 $oc_width=$row["wiidth"];
		 $oc_height=$row["height"];
		 $oground_clearance=$row["ground_clearance"];
		 $owheel_base=$row["wheel_base"];
		 $ofront_tread=$row["front_tread"];
		 $orear_tread=$row["rear_tread"];
		 $okerb_weight=$row["kerb_weight"];
		 $ogross_weight=$row["gross_weight"];
 ?>
   

	<?php
	$errmsg="";
	if(isset($_POST['submit'])){
	
		 $c_length=$_POST["c_length"];
		 $c_width=$_POST["c_width"];
		 $c_height=$_POST["c_height"];
		 $ground_clearance=$_POST["ground_clearance"];
		 $wheel_base=$_POST["wheel_base"];
		 $front_tread=$_POST["front_tread"];
		 $rear_tread=$_POST["rear_tread"];
		 $kerb_weight=$_POST["kerb_weight"];
		 $gross_weight=$_POST["gross_weight"];
		
     		$err['length']="";
			$err['width']="";
			$err['height']="";
			$err['gc']="";
			$err['wbase']="";
			$err['kweight']="";
		

		 	if($c_length==""){
				$err['length']="<font color='red'>*Enter Value.</font>";
			}
			if($c_width==""){
				$err['width']="<font color='red'>*Enter Value.</font>";
			}
			if($c_height==""){
				$err['height']="<font color='red'>*Enter Value.</font>";
			}
			if($ground_clearance==""){
				$err['gc']="<font color='red'>*Enter Value.</font>";
			}
	    	if($wheel_base==""){
				$err['wbase']="<font color='red'>*Enter Value.</font>";
			}
			if($kerb_weight==""){
				$err['kweight']="<font color='red'>*Enter Value.</font>";
			}
			
		if($err['length']=="" && $err['width']=="" && $err['height']=="" && $err['gc']=="" && $err['wbase']=="" && $err['kweight']==""){
		 include("connection.php");

			$sql1="update car_exterior_dimension  set length='$c_length',wiidth='$c_width',height='$c_height',
			ground_clearance='$ground_clearance',wheel_base='$wheel_base',front_tread='$front_tread',
			rear_tread='$rear_tread',kerb_weight='$kerb_weight',gross_weight='$gross_weight' where v_id='$id'";
			
			$res=mysql_query($sql1);
			if($res){
			header("location:view_car.php");
			}else
			{
				$errmsg="Data Not edited.";
			}
		}
		 }
	
	?>

    <h1 class="page-header"> Edit Version Exterior Dimensions Info</h1>
					<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>
<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>                  
						
						<form action="#" method="post">
									
						<div class="box" id="overview">
                            <header>
                                <h5> Exterior Dimensions</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                             <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                       
										<tr>
											<td width="20%">Length</td>
											<td width="40%">
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Length" name="c_length" value="<?php echo $oc_length;?>">
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['length'];
											?>
											</td>
										</tr>
										<tr>
											<td>Width</td>
											<td>
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Width" name="c_width" value="<?php echo $oc_width;?>">
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['width'];
											?>
											</td>
										</tr>

        	 
		 		 
		 		 
		 		 
		 										<tr>
											<td>Height</td>
											<td>
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Height" name="c_height" value="<?php echo $oc_height;?>">
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['height'];
											?>
											</td>
										</tr>
										<tr>
											<td>Ground Clearance</td>
											<td>
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Ground Clearance" name="ground_clearance" value="<?php echo $oground_clearance;?>">
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['gc'];
											?>
											</td>
										</tr>
										<tr>
											<td>Wheel Base</td>
											<td>
										
											<div class="col-lg-6">
											<input class="form-control" placeholder="Wheel Base" name="wheel_base" value="<?php echo $owheel_base;?>">
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['wbase'];
											?>
											</td>
										</tr>
										<tr>
											<td>Front Tread</td>
											<td>
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Front Tread" name="front_tread" value="<?php echo $ofront_tread;?>">
											</div>
											</td>
										</tr>
										<tr>
											<td>Rear Tread</td>
											<td>
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Rear Tread" name="rear_tread" value="<?php echo $orear_tread;?>">
											</div>
											</td>
										</tr>
										<tr>
											<td>Kerb Weight</td>
											<td>
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Kerb Weight" name="kerb_weight" value="<?php echo $okerb_weight;?>">
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['kweight'];
											?>
											</td>
										</tr>
										<tr>
											<td>Gross Weight</td>
											<td>
										
											<div class="col-lg-6">
											<input class="form-control" placeholder="Gross Weight" name="gross_weight" value="<?php echo $ogross_weight;?>">
											</div>
											</td>
										</tr>
										
										
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Car Exterior Dimensions Info">
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