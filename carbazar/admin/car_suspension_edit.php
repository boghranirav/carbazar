<?php
include("master.php");
?>
<title>
Edit Version Suspension
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
	

$olddata2=mysql_query("select *from  car_suspension where v_id='$id'");
if(mysql_num_rows($olddata2)<=0){
	header("location:view_car.php");
}
$row=mysql_fetch_array($olddata2);
	    $ofsus=$row["front_suspension"];
		$orsus=$row["rear_suspension"];
		$oabsorbers_type=$row["shock_absorbers_type"];


?>


	
<?php
	$errmsg="";
	if(isset($_POST['submit'])){
	
         	$fsus=$_POST["f_suspension"];
			$rsus=$_POST["r_suspension"];
			$absorbers_type=$_POST["absorbers_type"];

			$err['fsus']="";
			$err['rsus']="";
			$err['sabt']="";
		
		  if($fsus==""){
		 		$err['fsus']="<font color='red'>*Enter Value.</font>";
			}
			if($rsus==""){
				$err['rsus']="<font color='red'>*Enter Value.</font>";
			}
		   if($absorbers_type==""){
				$err['sabt']="<font color='red'>*Enter Value.</font>";
			}			
		
				
		if($err['fsus']=="" &&	$err['rsus']=="" && $err['sabt']==""){	
			include("connection.php");
			$sql1="update car_suspension set front_suspension='$fsus',rear_suspension='$rsus',shock_absorbers_type='$absorbers_type' where v_id='$id'";
			
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
	

                        <h1 class="page-header"> Edit Version Suspension</h1>
												<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>	
<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>
						
						<form action="#" method="post">
						
						<div class="box" id="overview">
                            <header>
                                <h5> Suspension</h5>
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
											<input class="form-control" placeholder="Enter Front suspension" name="f_suspension" value="<?php echo  $ofsus ;?>">
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
											<input class="form-control" placeholder="Enter Rear suspension" name="r_suspension" value="<?php echo $orsus ;?>">
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
											  <input class="form-control" placeholder="Enter Shock Absorbers Type" name="absorbers_type" value="<?php echo $oabsorbers_type ;?>">
											 </div>
											   <?php if(isset($_POST['submit'])){
												echo $err['sabt'];
											   }
											 ?>
											 </td>
											 
										</tr>
													
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Version Suspension">
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