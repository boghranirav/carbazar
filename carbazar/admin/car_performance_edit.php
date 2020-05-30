<?php
include("master.php");
?>
<title>
Edit Version Performance
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

$olddata2=mysql_query("select *from  car_performance where v_id='$id'");
if(mysql_num_rows($olddata2)<=0){
	header("location:view_car.php");
}

$row=mysql_fetch_array($olddata2);
		$otop_speed=$row["top_speed"];
		$op_accel=$row["acceleration"];

?>

	
	<?php
	$errmsg="";
	if(isset($_POST['submit'])){
	
		$top_speed=$_POST["t_speed"];
		$p_accel=$_POST["p_acceleration"];
        
     		$err['tspeed']="";
			$err['accel']="";
			
        	if($top_speed==""){
				$err['tspeed']="<font color='red'>*Select Version.</font>";
			}
			if($p_accel==""){
				$err['accel']="<font color='red'>*Select Version.</font>";
			}			

				include("connection.php");
			if($err['tspeed']=="" && $err['accel']=="" ){
		
			$sql1="update car_performance set top_speed='$top_speed',acceleration='$p_accel' where v_id='$id'";
			
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
	

<h1 class="page-header"> Edit Version Performance </h1>
<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>
<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>
                        
						
						<form action="#" method="post">
						
						<div class="box" id="overview">
                            <header>
                                <h5> Performance</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tr>
											<td width="20%">Top Speed</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Top Speed" name="t_speed"  value="<?php echo $otop_speed ;?>">
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
											<input class="form-control" placeholder="Enter Acceleration" name="p_acceleration"  value="<?php echo $op_accel ;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['accel'];
											   }
											 ?>

											</td>
										</tr>
													
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Version Performance">
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