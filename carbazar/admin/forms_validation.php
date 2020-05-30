<?php
include("form_master.php");
?>
<title>
Add Version
</title>
<?php
include("form_master1.php");
?>
<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
			$(document).ready(function(){
				//alert("hello);
				
				$("#b_id").change(function(){
					//alert("a");
					var id = $(this).val();	
					//alert(id);
					if(id == "0")
					{	
						
					}
					else
					{
						//alert(id);
						$.ajax({
							url:"version_sql.php",
							type:"post",
							data:{b_id:id},
							success:function(result){
								//alert(result);
								$("#m_id").html(result);
								
							}
						});
					}
				
				});
			
			});	
	</script>
	
	<?php
	if(isset($_POST['submit'])){
		$bid=$_POST['b_id'];
		$mid=$_POST['m_id'];
		$vname=$_POST['vname'];
		$ftype=$_POST['optionsRadiosInline'];
		$price=$_POST['vprice'];
		$dis=$_POST['vdis'];
		$mil=$_POST['vmil'];
		$trans=$_POST['optionsRadiosTrans'];
	
		$errmsg['brand']="";
		$errmsg['model']="";
		$errmsg['version']="";
		$errmsg['price']="";
		$errmsg['dis']="";
		$errmsg['mil']="";
		
		if($bid== 0){
			$errmsg['brand']="*Select Brand.";
		}
		if($mid == 0){
			$errmsg['model']="*Select Model.";
		}
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
		
		if($errmsg['brand']=="" && $errmsg['model']=="" && $errmsg['version']=="" && $errmsg['price']=="" && $errmsg['dis']=="" && $errmsg['mil']==""){
		include("connection.php");
		
		$sql="insert into car_version(brand_id,car_id,version_name,f_type,price,engine,mileage,transmission) values($bid,$mid,'$vname','$ftype','$price','$dis','$mil','$trans')";
		$sql1=mysql_query($sql);
		
		if($sql1){
			$errmsg="";
			header("location:version_view.php");
		}
		else{
			$errmsg="Data Not Added";
		}
		}
		
		
	}
	?>
	
	
                                    <h1 class="page-header"> Add Version </h1>
			
			
			<form action="" method="post" id="select_version" name="select_version">
			
			<table width="70%" border="0" >
			<tr>
			<td> <label>Choose A Brand :</label>
			</td>
			<td>
			<div class="col-lg-10">
                                                <select name="b_id"  id="b_id" class="validate[required] form-control">
												    
                                                    <option value="0">--Select a Brand--</option>
                                                    <?php
													include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$bid=$row['brand_id'];
														$car_com=$row['car_company'];
													echo "<option value=$bid>".$car_com."</option>";
													}
													?>
													
                                                </select>
            </div>
			</td>
			<td width="20%">
			<font color="red">
			<?php
			if(isset($_POST['submit'])){
				echo $errmsg['brand'];
			}
			?>
			</font>
			</td>
			</tr>
				<tr id="model">
				<td>
				<label>Choose A Model :</label>
				</td>
				<td>
				<div class="col-lg-10">
					<select name="m_id" id="m_id" class="validate[required] form-control">
												    
                                                    <option value="0">--Select a Model--</option>
                                                   
													
                                                </select>
								</div>
								
				</td>
				<td>
				<font color="red">
			<?php
			if(isset($_POST['submit'])){
				echo $errmsg['model'];
			}
			?>
			</font>
				</td>
				<tr>
				
				<tr id="version">
				<td>
				<label>Enter Version :</label>
				</td>
				<td>
				<div class="col-lg-10">
				<input class="form-control" placeholder="Enter Version Name" name="vname" value="<?php if(isset($_POST['submit'])) echo $vname; ?>">
				</div>
				</td>
				<td>
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
                                                
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="petrol" checked="checked" <?php if(isset($_POST['submit'])){if($ftype=="petrol") echo "checked";} ?>/>
												<label>Petrol</label>
                                         
									                     &nbsp;&nbsp;&nbsp;                 
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="diesel"  <?php if(isset($_POST['submit'])){if($ftype=="diesel") echo "checked";} ?>/>
												<label>Diesel </label>
												
												&nbsp;&nbsp;&nbsp;                 
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="CNG"  <?php if(isset($_POST['submit'])){if($ftype=="CNG") echo "checked";} ?>/>
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
				<input class="form-control" placeholder="Enter Version Price" name="vprice" value="<?php if(isset($_POST['submit'])) echo $price; ?>">
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
				<input class="form-control" placeholder="Enter Version Displacement" name="vdis" value="<?php if(isset($_POST['submit'])) echo $dis; ?>">
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
				<input class="form-control" placeholder="Enter Version Mileage" name="vmil" value="<?php if(isset($_POST['submit'])) echo $mil; ?>">
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
                                                
												
												<input type="radio" name="optionsRadiosTrans" id="optionsRadiosTrans2" value="manual"  checked="checked" <?php if(isset($_POST['submit'])){if($trans=="manual") echo "checked";} ?>/>
												<label>Manual </label>
												
												 &nbsp;&nbsp;&nbsp;      
												
                                                <input type="radio" name="optionsRadiosTrans" id="optionsRadiosTrans1" value="automatic" <?php if(isset($_POST['submit'])){if($trans=="automatic") echo "checked";} ?>/>
												<label>Automatic</label>
                                           
                                        </div>
				</td>
				<td></td>
				<tr>
				
				<tr id="subm">
				<td>
				</td>
				<td>
				&nbsp;&nbsp;&nbsp; 
					<input type="submit" class="btn btn-primary" name="submit" value="Add Version">
				</td>
				<td></td>
				<tr>
				
				
		</table>
</form>								
									
									
<?php
include("form_master2.php");
?>