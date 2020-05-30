<?php
include("master.php");
?>
<title>
Edit Version General  Details
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

$olddata2=mysql_query("select *from  car_general_details where v_id='$id'");
$row=mysql_fetch_array($olddata2);
            $oa_coun=$row["country_of_assembly"];
			$ocoun_mfg=$row["country_of_manufacture"];
			$ointro_d=$row["introduction_date"];
			$ow_time=$row["warranty_time"];
			$ow_dist=$row["warranty_distance"];

?>
<h1 class="page-header"> Edit Version General  Details </h1>
<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>

<?php
if(isset($_POST['submit']))
{
           $a_coun=$_POST["a_country"];
			$coun_mfg=$_POST["c_mfg"];
			$intro_d=$_POST["intro_date"];
			$w_time=$_POST["w_time"];
			$w_dist=$_POST["w_dist"];
			
			
			$errmsg['country']="";
			$errmsg['mfg']="";
			$errmsg['w_time']="";
			$errmsg['w_dist']="";
			
			if($a_coun==""){
				$errmsg['country']="*Enter Country Name.";
			}else
				if(is_numeric($a_coun)){
					$errmsg['country']="*Invalid Country Name.";
				}
				
			if($coun_mfg==""){
				$errmsg['mfg']="*Enter Manufacture Country.";
			}else
				if(is_numeric($coun_mfg)){
					$errmsg['mfg']="*Invalid Country Name.";
				}
				
			if($w_time==""){
				$errmsg['w_time']="*Enter Value.";
			}
			
			if($w_dist==""){
				$errmsg['w_dist']="*Enter Value.";
			}

            
			if($errmsg['country']=="" && $errmsg['mfg']=="" && $errmsg['w_time']=="" && $errmsg['w_dist']==""){
			include("connection.php");
			
$sql2="update  car_general_details set country_of_assembly='$a_coun',country_of_manufacture='$coun_mfg',introduction_date='$intro_d',
                 warranty_time='$w_time',warranty_distance='$w_dist' where v_id='$id'";
						
			$res1=mysql_query($sql2);
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
                                <h5> General Car Details</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
							 <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   
										
										<tr>
											<td width="20%">Country Of Assembly</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Country of Assembly" name="a_country" value="<?php echo $oa_coun ;?>" >
											</div>
											<font color="red">
											<?php
											if(isset($_POST['submit'])){
												echo $errmsg['country'];
											}
											?>
											</font>
											</td>
										</tr>
										<tr>
											<td>Country Of Manufacture</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Country Of Manufacture" name="c_mfg" value="<?php echo $ocoun_mfg ;?>" >
											</div>
											<font color="red">
											<?php
											if(isset($_POST['submit'])){
												echo $errmsg['mfg'];
											}
											?>
											</font>
											</td>
										</tr>
										
									
										<tr>
											<td>Introduction Date</td>
											<td>
											
											 <div class="input-group input-append date" id="dp3" data-date="12-02-2012"
                                 data-date-format="yyyy-mm-dd" style="width:200px;margin-left:0.4cm">
											<input class="form-control" type="text" value="<?php echo $ointro_d ;?>" readonly="" name="intro_date"/>
											<span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
											</div>
											
											</td>
										</tr>
										
										<tr>
											<td>Warranty Time</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Warranty Time" name="w_time" value="<?php echo $ow_time ;?>" >
											</div>
											<font color="red">
											<?php
											if(isset($_POST['submit'])){
												echo $errmsg['w_time'];
											}
											?>
											</font>
											</td>
										</tr>
										<tr>
											<td>Warranty Distance</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Warranty Distance" name="w_dist" value="<?php echo $ow_dist ;?>"  >
											</div>
											<font color="red">
											<?php
											if(isset($_POST['submit'])){
												echo $errmsg['w_dist'];
											}
											?>
											</font>
											</td>
										</tr>
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Version General  Details">
									</center>
									</td>
									</tr>
                                    
                                </table>
                            </div>
                        </div>
						
						</form>

<?php
include("page_master2.php");
?>								
										
										
