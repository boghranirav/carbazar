<?php
include("master.php");
?>
<title>
Edit Version Tyres
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

$olddata2=mysql_query("select *from  car_tyres where v_id='$id'");
if(mysql_num_rows($olddata2)<=0){
	header("location:view_car.php");
}
$row=mysql_fetch_array($olddata2);
        $otyre_s=$row["tyre_size"];
		$otyre_t=$row["tyre_type"];
		$owheel_s=$row["wheel_size"];
		$oalloy_s=$row["alloy_wheel_size"];

?>

	
<?php
$errmsg="";
	if(isset($_POST['submit'])){
		
		$tyre_s=$_POST["t_size"];
		$tyre_t=$_POST["t_type"];
		$wheel_s=$_POST["wheel_size"];
		$alloy_s=$_POST["alloy_size"];
	
			$err['tsize']="";
			$err['ttype']="";
			$err['wsize']="";
			
			
			
			if($tyre_s==""){
				$err['tsize']="<font color='red'>*Enter Value.</font>";
			}
			if($tyre_t==""){
				$err['ttype']="<font color='red'>*Enter Value.</font>";
			}			
			if($wheel_s==""){
				$err['wsize']="<font color='red'>*Enter Value.</font>";
			}
			
		if($err['tsize']=="" && $err['ttype']=="" && $err['wsize']==""){
			
		include("connection.php");
				$sql1="update  car_tyres set tyre_size='$tyre_s',tyre_type='$tyre_t',wheel_size='$wheel_s',alloy_wheel_size='$alloy_s' where v_id='$id'";
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
	
<h1 class="page-header"> Edit Version Tyres </h1>
<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>

						<form action="#" method="post">
												<div class="box" id="overview">
                            <header>
                                <h5>  Tyres</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                      
										<tr>
											<td width="20%">Tyre Size</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Tyre Size" name="t_size" value="<?php echo $otyre_s;?>" >
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
											<input class="form-control" placeholder="Enter Tyre Type" name="t_type" value="<?php echo $otyre_t ;?>" >
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
											<input class="form-control" placeholder="Enter Tyre Type" name="wheel_size"  value="<?php echo $owheel_s ;?>" >
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
											<input class="form-control" placeholder="Enter Tyre Type" name="alloy_size" value="<?php echo $oalloy_s ;?>" >
											</div>
											</td>
                                        </tr>
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Version Tyres">
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