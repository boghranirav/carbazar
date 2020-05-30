<?php
include("master.php");
?>
<title>
Edit Version Details
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


$olddata3=mysql_query("select *from  car_transmission  where v_id='$id'");
if(mysql_num_rows($olddata3)<=0){
	header("location:view_car.php");
}

$row=mysql_fetch_array($olddata3);
          $otransmission_type=$row['transmission_type'];
			$ogear_box=$row['gear_box'];
			$odrive_type=$row['drive_type'];


?>

<?php
$errmsg="";
if(isset($_POST['submit']))
{
			$transmission_type=$_POST['transmission_type'];
			$gear_box=$_POST['gear_box'];
			$drive_type=$_POST['drive_type'];

			$err['ttype']="";
			$err['gbox']="";
			$err['dtype']="";
			

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

if($err['ttype']=="" && $err['gbox']=="" && $err['dtype']=="" ){
	
$sql1="update car_transmission set transmission_type='$transmission_type',gear_box='$gear_box',drive_type='$drive_type' where  v_id='$id'";
			
			$res1=mysql_query($sql1);

			
			if($res1){
					header("location:view_car.php");
					}
			else		
			{
				$errmsg="Data No Edited.";
			}
			
			
}		


}
?>
 <h1 class="page-header"> Edit Version Engine  </h1>
						
						<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>	
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
											<center><label><h3>Transmission</h3></label></center>
											</td>
                                        </tr>									   
									<tr>
											<td width="20%">Transmission Type</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Transmission Type" name="transmission_type"  value="<?php echo $otransmission_type; ?>">
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
											<input class="form-control" placeholder="Enter Gear Box" name="gear_box"  value="<?php echo $ogear_box; ?>" >
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
											<input class="form-control" placeholder="Enter Drive Type" name="drive_type" value="<?php echo $odrive_type; ?>"  >
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
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Car Transmisssion">
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