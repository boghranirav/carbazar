<?php
include("master.php");
?>
<title>
Edit Version Brake
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


$olddata2=mysql_query("select *from  car_brake_system where v_id='$id'");
if(mysql_num_rows($olddata2)<=0){
	header("location:view_car.php");
}

$row=mysql_fetch_array($olddata2);
$of_brake_type=$row["front_brake_type"];
$or_brake_type=$row["rear_brake_type"];

?>
	<?php
	$errmsg="";
	if(isset($_POST['submit'])){
	        $f_brake_type=$_POST["f_brake_Type"];
			$r_brake_type=$_POST["r_brake_type"];
			
			$err['fbt']="";
			$err['rbt']="";

			
           if($f_brake_type==""){
				$err['fbt']="<font color='red'>*Enter Value.</font>";
			}
          if($r_brake_type==""){
				$err['rbt']="<font color='red'>*Enter Value.</font>";
			}			
			
		if($err['fbt']=="" && $err['rbt']==""){	
		    	include("connection.php");
				
			$sql1="update car_brake_system set front_brake_type='$f_brake_type',rear_brake_type='$r_brake_type' where v_id='$id'";
			
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
                                <h5> Brake System</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                           <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

											<tr>
											<td width="20%">Front Brake Type</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Front Brake Type" name="f_brake_Type" value="<?php echo  $of_brake_type ;?>" >
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
											<input class="form-control" placeholder="Enter Rear Brake Type" name="r_brake_type" value="<?php echo  $or_brake_type ;?>">
											</div>
											<?php if(isset($_POST['submit'])){
												echo $err['rbt'];
											   }
											 ?>
											</td>
                                        </tr>
								
													
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Version Brake">
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