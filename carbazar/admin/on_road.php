<?php
include("form_master.php");
?>
<title>
On Road Price
</title>

<?php
include("form_master1.php");
?>
<?php	

if(isset($_POST['submit']))
{
	$price2="0";
	$r_state=$_POST['state'];
	$e_type=$_POST['e_type'];
	
	$r_tax=$_POST['r_tax'];
	$c_insure=$_POST['c_insure'];
	
	$errmsg['state']="";
	$errmsg['rto']="";
	$errmsg['insure']="";
	
	if($r_state==0){
		$errmsg['state']="*Select State.";
	}
	
	if(!is_numeric($r_tax)){
		$errmsg['rto']="*Enter Valid Rate.";
	}
	else
		if(($r_tax<0) || ($r_tax>50)){
			$errmsg['rto']="*Not a Valid Rate.";
		}
	if(!is_numeric($c_insure)){
		$errmsg['insure']="*Enter Valid Rate.";
	}else
		if(($c_insure<0) || ($c_insure>20)){
			$errmsg['insure']="*Not a Valid Rate.";
		}
	
	if($errmsg['state']=="" && $errmsg['rto']=="" && $errmsg['insure']==""){
	include("connection.php");

$sql="insert into on_road_price(engine_type,state_id,rto_tax,insurance) values('$e_type',$r_state,$r_tax,$c_insure)";
$res=mysql_query($sql);

if($res){
	header("location:view_on_road.php");
}

}
}

?>
                    <h1 class="page-header">On Road Price</h1>
										<br>
					<form method="post" action="on_road.php">
					<table width="80%">
					<tr>
						<td width="20%">
						<label>Select State :</label>
						</td>
						<td width="50%">
							<div class="col-lg-8">
								<select name="state"  id="state" class="validate[required] form-control">
								<option value="0">Select a State</option>         
		            <?php
						include("connection.php");
						$sql="select * from states";
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res)){
							$s_id=$row['id'];
					?>
							<option value='<?php echo $s_id;?>' <?php if(isset($_POST['submit'])){if($s_id==$r_state) echo "selected";} ?>><?php echo $row['state'];?></option>;
					<?php
						}
					?>
				    </select>
					</div>	
					</td>
					<td width="20%">
					<font color="red">
						<?php 
							if(isset($_POST["submit"])){
								echo $errmsg['state'];
							}
						?>
					</font>
					</td>
					</tr>
					
					<tr>
						<td>
							<label>Engine Type </label>
						</td>
						<td>
							<div class="col-lg-8">
								<select name="e_type"  id="e_type" class="validate[required] form-control">
												    
                                                    <option value="Both" <?php if(isset($_POST['submit'])){if($e_type=="Both") echo "selected";} ?>>Both</option>
													<option value="Petrol" <?php if(isset($_POST['submit'])){if($e_type=="Petrol") echo "selected";} ?>>Petrol</option>
                                                    <option value="Diesel" <?php if(isset($_POST['submit'])){if($e_type=="Diseal") echo "selected";} ?>>Diesel</option>
                                                </select>
							</div>	
							
						</td>
						<td></td>
					</tr>
					
					
					
					<tr>
						<td> 
									<label>Road Tax </label>
						</td>
                        <td>
									<div class="col-lg-8">
									<input class="form-control" placeholder="Enter Road Tax Rate" name="r_tax" size="25" value="<?php if(isset($_POST['submit'])){ echo $r_tax;} ?>">
									</div>
						</td>
						<td>
							<font color="red">
						<?php 
							if(isset($_POST["submit"])){
								echo $errmsg['rto'];
							}
						?>
					</font>
						</td>
					</tr>
					
					<tr>
						<td> 
									<label>Insurance Rate </label>
						</td>
                        <td>
									<div class="col-lg-8">
									<input class="form-control" placeholder="Enter Insurance Rate" name="c_insure" size="25" value="<?php if(isset($_POST['submit'])){ echo $c_insure;} ?>">
									</div>
						</td>
						<td>
							<font color="red">
						<?php 
							if(isset($_POST["submit"])){
								echo $errmsg['insure'];
							}
						?>
					</font>
						</td>
					</tr>
					
					<tr>
					<td></td>
						<td>
						<br>			
						&nbsp;&nbsp;&nbsp;
									<input type="submit" class="btn btn-primary" name="submit" value="Add Rates">
					&nbsp;&nbsp;
									<a href="view_on_road.php" class="btn btn-primary">View List Of Rates</a>
						</td>
						<td></td>
					</tr>
					
					<tr>
					
					</tr>
					</table>
					
					</form>
					
               <?php
include("form_master2.php");
?>