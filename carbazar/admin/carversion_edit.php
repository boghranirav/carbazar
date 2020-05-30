<?php
	if((!isset($_GET['vid'])) || ($_GET['vid']==null)){
		header("location:version_view.php");
	}
include("form_master.php");
?>
<title>
Add Version
</title>
<?php
include("form_master1.php");
?>
	
	<?php
	$id=$_GET['vid'];

include("connection.php");

$olddata=mysql_query("select *from car_version where v_id='$id'");
if(mysql_num_rows($olddata)<=0){
	header("location:version_view.php");
}
while($row=mysql_fetch_array($olddata))
{

$ovn=$row['version_name'];    
$oftype=$row['f_type'];
  
$ovp=$row['price'];
$ove=$row['engine'];
$ovm=$row['mileage'];
$ot=$row['transmission'];
  
}			
								
	
	
	
	
	
	if(isset($_POST['submit'])){
		$vname=$_POST['vname'];
		$ftype=$_POST['optionsRadiosInline'];
		$price=$_POST['vprice'];
		$dis=$_POST['vdis'];
		$mil=$_POST['vmil'];
		$trans=$_POST['optionsRadiosTrans'];
	
		$errmsg['version']="";
		$errmsg['price']="";
		$errmsg['dis']="";
		$errmsg['mil']="";
		
		if($vname == ""){
			$errmsg['version']="*Enter Version Name.";
		}
		if($price==""){
			$errmsg['price']="*Enter Price.";
		}
		else
			if(!is_numeric($price)){
				$errmsg['price']="*Enter Valid Price.";
			}
		if($dis==""){
			$errmsg['dis']="*Enter Displacement.";
		}
		if($mil==""){
			$errmsg['mil']="*Enter Valid Mileage.";
		}
		
		if($errmsg['version']=="" && $errmsg['price']=="" && $errmsg['dis']=="" && $errmsg['mil']=="")
		{
		include("connection.php");
		
	$sql="update  car_version set version_name='$vname',f_type='$ftype',price='$price',engine='$dis',mileage='$mil',transmission='$trans' where v_id='$id'";
		$sql1=mysql_query($sql);
		
		if($sql1){
			header("location:version_view.php");
		}
		else{
			$errmsg="Data Not Added";
		}
		}
		
		
	}
	?>
	
	
                                    <h1 class="page-header"> Edit Version </h1>
			
			
			<form action="#" method="post" id="select_version" name="select_version">
			
			<table width="70%" border="0" >
			<tr>
		
			
				<td></td>
				<tr>
				
				<tr id="version">
				<td width="20%">
				<label>Edit Version :</label>
				</td>
				<td width="60%">
				<div class="col-lg-10">
				<input class="form-control" placeholder="Enter Version Name" name="vname"  value="<?php if(isset($_POST['submit'])){echo $vname;}else {echo $ovn;}?>">
				</div>
				</td>
				<td width="20%">
				<font color="red">
						<?php
						if(isset($_POST['submit'])){
							echo $errmsg['version'];
						}
						?>
				</font>
				</td>
				<tr>
				
				<tr id="ftype">
				<td>
				<label>Fuel Type :</label>
				</td>
				<td>
				&nbsp;&nbsp;&nbsp;
				<div class="form-group">&nbsp;&nbsp;&nbsp;
                                                
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="petrol" <?php if(isset($_POST['submit']))
														{
															if($ftype== "petrol")
																echo "checked";
														}else 
														if($oftype=="petrol") 
															echo "checked"; ?> />
												<label>Petrol</label>
                                         
									                     &nbsp;&nbsp;&nbsp;                 
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="diesel" <?php if(isset($_POST['submit']))
														{
															if($ftype== "diesel")
																echo "checked";
														}else 
														if($oftype=="diesel") 
															echo "checked"; ?>  />
												<label>Diesel </label>
												
												&nbsp;&nbsp;&nbsp;                 
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="CNG" 
												<?php if(isset($_POST['submit']))
														{
															if($ftype== "CNG")
																echo "checked";
														}else 
														if($oftype=="CNG") 
															echo "checked"; ?> 
														/>
												<label>CNG </label>
                                         
                                           
                                        </div>
				</td>
				<td></td>
				<tr>
				
				<tr id="price">
				<td>
				<label>Price :</label>
				</td>
				<td>
				
				<div class="col-lg-10">
				<input class="form-control" placeholder="Enter Version Price" name="vprice" value="<?php if(isset($_POST['submit'])){echo $price;}else echo $ovp ;?>">
				</div>
				</td>
				<td>
				<font color="red">
						<?php
						if(isset($_POST['submit'])){
							echo $errmsg['price'];
						}
						?>
				</font>
				</td>
				<tr>
				
				<tr id="displacement">
				<td>
				<label>Engine :</label>
				</td>
				<td>
				
				<div class="col-lg-10">
				<input class="form-control" placeholder="Enter Version Displacement" name="vdis" value="<?php  if(isset($_POST['submit'])){echo $dis;}else echo $ove;?>">
				</div>
				</td>
				<td>
				<font color="red">
						<?php
						if(isset($_POST['submit'])){
							echo $errmsg['dis'];
						}
						?>
				</font>
				</td>
				<tr>
				
				<tr id="mileage">
				<td>
				<label>Mileage :</label>
				</td>
				<td>
				
				<div class="col-lg-10">
				<input class="form-control" placeholder="Enter Version Mileage" name="vmil" value="<?php if(isset($_POST['submit'])){echo $mil;}else echo $ovm; ?>">
				</div>
				</td>
				<td>
				<font color="red">
						<?php
						if(isset($_POST['submit'])){
							echo $errmsg['mil'];
						}
						?>
				</font>
				</td>
				<tr>
				
				<tr id="trans">
				<td>
				<label>Transmission :</label>
				</td>
				<td>
				&nbsp;&nbsp;&nbsp;
				<div class="form-group">&nbsp;&nbsp;&nbsp;
                                                
                                                <input type="radio" name="optionsRadiosTrans" id="optionsRadiosTrans1" value="automatic" <?php if($ot=="automatic") echo "checked"; ?>/>
												<label>Automatic</label>
                                         
									                     &nbsp;&nbsp;&nbsp;                 
                                                <input type="radio" name="optionsRadiosTrans" id="optionsRadiosTrans2" value="manual"  <?php if($ot=="manual") echo "checked"; ?> />
												<label>Manual </label>
                                         
                                           
                                        </div>
				</td>
				<td></td>
				<tr>
				
				<tr id="subm">
				<td>
				</td>
				<td>
				&nbsp;&nbsp;&nbsp; 
					<input type="submit" class="btn btn-primary" name="submit" value="Edit Version">
				</td>
				<td></td>
				<tr>
				
				
		</table>
</form>								
									
									
<?php
include("form_master2.php");
?>