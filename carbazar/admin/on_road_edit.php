<?php
include("master.php");
?>
<title>
Edit On Road Tax
</title>


<?php
include("master1.php");
?>
<?php
$id=$_GET['rid'];
$_SESSION['r_id']=$id;

include("connection.php");
$qq=mysql_query("select *from on_road_price o,states s where road_id='$id' and o.state_id=s.id");
while($row=mysql_fetch_array($qq))
{
    $or_state=$row['state_id'];
	
	$state=$row['state'];
	$etype=$row['engine_type'];
	$or_tax=$row['rto_tax'];
	$oc_insure=$row['insurance'];



}
?>
<?php

if(isset($_POST['submit']))
{
	$price2="0";
	$r_state=$_POST['state'];
	$e_type=$_POST['e_type'];
	$r_tax=$_POST['r_tax'];
	$c_insure=$_POST['c_insure'];
	
	if($ope!="bw"){
		$price2=0;
	}
include("connection.php");


$sql=mysql_query("update on_road_price set engine_type='$e_type',state_id='$r_state',rto_tax=$r_tax,insurance=$c_insure where road_id='$id'");
if($sql){
header("location:view_on_road.php");
}
else
{
	$errmsg="Data Not edited.";
}
}

?>
           
		            <h1 class="page-header"> Edit On Road Tax</h1>
										<br>
					<form method="post" action="#" id="on_road_f1">
					<table width="60%">
					<tr>
						<td width="20%">
						<label>Select State :</label>
						</td>
						<td width="85%">
							<div class="col-lg-8">
								<select name="state"  id="state" class="validate[required] form-control">
												    
                                                    <option value="null">Select a State</option>         
		            <?php
						include("connection.php");
						$sql="select * from states";
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res)){
							$s_id=$row['id'];
							$s_name=$row['state'];
							?>
						<option value='<?php echo $s_id;?>'	<?php if($or_state==$s_id) echo 'selected';?>><?php echo $row['state'];?></option>;
						<?php
						}
					?>
													
													
                                                </select>
							</div>	
						
							 
						</td>
					</tr>
					<tr>
						<td>
							<label>Engine Type </label>
						</td>
						<td>
							<div class="col-lg-8">
								<select name="e_type"  id="e_type" class="validate[required] form-control">
												    
                                                    <option value="Both" <?php if($etype=="Both") echo 'selected';?>>Both</option>
													<option value="Petrol" <?php if($etype=="Petrol") echo 'selected';?>>Petrol</option>
                                                    <option value="Diesel" <?php if($etype=="Diesel") echo 'selected';?>>Diesel</option>
                                                </select>
							</div>	
							
						</td>
					</tr>
					
					
	
					<tr>
						<td> 
									<label>Road Tax </label>
						</td>
                        <td>
									<div class="col-lg-8">
									<input class="form-control" placeholder="Enter Road Tax Rate" name="r_tax" size="25" value="<?php echo $or_tax;?>" >
									</div>
						</td>
						<td><br>&nbsp;&nbsp;
					
						</td>
					</tr>
					
					<tr>
						<td> 
									<label>Insurance Rate </label>
						</td>
                        <td>
									<div class="col-lg-8">
									<input class="form-control" placeholder="Enter Insurance Rate" name="c_insure" size="25" value="<?php echo $oc_insure;?>">
									</div>
						</td>
						<td><br>&nbsp;&nbsp;
					
						</td>
					</tr>
					
					<tr>
					<td></td>
						<td>
						<br>			
						&nbsp;&nbsp;&nbsp;
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Rates">
					&nbsp;&nbsp;
									<a href="view_on_road.php" class="btn btn-primary">View List Of Rates</a>
						</td>
					</tr>
					
					<tr>
					
					</tr>
					</table>
					<?php 
						
						if(isset($_POST['submit'])){
							echo "<label>".$errmsg."</label>";
						}
						?>
					</form>
					
               <?php
include("master2.php");
?>