<?php
include("master.php");
?>
<title>
Edit Version Other Specification  Details
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

$olddata2=mysql_query("select *from  car_other_spec where v_id='$id'");
$row=mysql_fetch_array($olddata2);
                $os_cap=$row["seating_capacity"];
				$on_door=$row["no_of_door"];
				$oc_vol=$row["cargo_volume"];

?>
<h1 class="page-header"> Edit Version Other Specification  Details </h1>
<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>

		<?php
		if(isset($_POST['submit'])){
				$s_cap=$_POST["s_capacity"];
				$n_door=$_POST["no_door"];
				$c_vol=$_POST["c_volume"];
				
				$errmsg['capacity']="";
			$errmsg['door']="";
			$errmsg['volume']="";
			
			if($s_cap==""){
				$errmsg['capacity']="*Enter Value.";
			}else
				if((!is_numeric($s_cap)) || ($s_cap<=0)){
					$errmsg['capacity']="*Invalid Value.";
				}
			
			if($n_door==""){
				$errmsg['door']="*Enter Value.";
			}else
				if((!is_numeric($n_door)) || ($n_door<=0) || ($n_door>=7)){
					$errmsg['door']="*Invalid Value.";
				}
				
			if($c_vol==""){
				$errmsg['volume']="*Enter Value.";
			}else
				if($c_vol<0){
					$errmsg['volume']="*Invalid Value.";
				}
				
			if($errmsg['capacity']=="" && $errmsg['door']=="" && $errmsg['volume']==""){
			include("connection.php");
			
			$sql1="update car_other_spec set seating_capacity='$s_cap',no_of_door='$n_door',cargo_volume='$c_vol' where v_id='$id'";
						
			$res1=mysql_query($sql1);
			if($res1){
					header("location:view_car.php");
					}
			else
				{
						echo "data not edited.";
                      }	
			}
										
		}
		?>
		

                        
						
						<form action="#" method="post">
						
						
						<div class="box" id="overview">
                            <header>
                                <h5> Other Specification Details</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        							
				
				
							<tr>
											<td width="20%">Seating Capacity</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Seating Capacity" name="s_capacity" value="<?php echo $os_cap ;?>" >
											</div>
											<font color="red">
											<?php
											if(isset($_POST['submit'])){
												echo $errmsg['capacity'];
											}
											?>
											</font>
											
											</td>
										</tr>
										<tr>
											<td>Number Of Doors</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Number of Doors" name="no_door" value="<?php echo $on_door ;?>" >
											</div>
											<font color="red">
											<?php
											if(isset($_POST['submit'])){
												echo $errmsg['door'];
											}
											?>
											</font>
											
											</td>
										</tr>
										
										<tr>
											<td>Cargo Volume</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Cargo Volume" name="c_volume" value="<?php echo $oc_vol ;?>" >
											</div>
											<font color="red">
											<?php
											if(isset($_POST['submit'])){
												echo $errmsg['volume'];
											}
											?>
											</font>
											</td>
										</tr>
													
																		
								
										
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Car Other Specification  Details">
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