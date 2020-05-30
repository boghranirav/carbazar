<?php
include("form_master.php");
?>
<title>
Add Model
</title>
<?php
include("form_master1.php");
?>
<?php
if(isset($_POST['submit']))
{
	$bid=$_POST['b_id'];
	$cname=$_POST['cname'];
	$status=$_POST['optionsRadiosInline'];
	$btype=$_POST['body_type'];
	
	$errmsg['brand']="";
	$errmsg['cname']="";
	$errmsg['b_type']="";
	
	if($bid=="0"){
		$errmsg['brand']="*Select Brand.";
	}
	if($cname==""){
		$errmsg['cname']="*Enter Valid Name.";
	}
	if($btype=="0")
	{
		$errmsg['b_type']="*Select Body Type.";
	}
	
	if($errmsg['brand']=="" && $errmsg['cname']=="" && $errmsg['b_type']==""){
include("connection.php");
$sql=mysql_query("insert into car_model(brand_id,car_name,status,body_type) values('$bid','$cname','$status','$btype')");
if($sql){
		header("location:car_model_view.php");
}
else
{
	$errmsg="Data Not Added.";
}
	}
}
?>
                    <h1 class="page-header">Model Form</h1>
										<br>
					<form method="post" action="forms_advance.php">
					<table>
					<tr>
						<td> 
									<label>Select Brand </label>
									
						</td>
                        <td>
									
									
								
									<div class="col-lg-15">
                                                <select name="b_id"  class="validate[required] form-control">
												    
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
						<td>&nbsp;&nbsp;
						<font color="red">
							<?php 
						
						if(isset($_POST['submit'])){
							echo "<label>".$errmsg['brand']."</label>";
						}
						?>
						</font>
						</td>
					</tr>
					<tr>
						<td> 
									<label>Car Name  </label>
						</td>
                        <td>
									
									<input class="form-control" placeholder="Enter Car Name" name="cname" size="25" value="<?php if(isset($_POST['submit'])) echo $cname;?>">
									
						</td>
						<td><br>&nbsp;&nbsp;
						<font color="red">
														<?php 
						
						if(isset($_POST['submit'])){
							echo "<label>".$errmsg['cname']."</label>";
						}
						?>
						</font>
						</td>
					</tr>
					<tr>
						<td> 
									<label>Status  </label>
						</td>
                        <td>
									<br>
									<div class="form-group">
                                                
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="launched" checked="checked" />
												<label>Launched</label>
                                         
											<br>
                                       
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="upcoming" />
												<label>Upcoming</label>
                                         
                                           
                                        </div>	
									
						</td>
						<td><br>&nbsp;&nbsp;
					
						</td>
					</tr>
					
					<tr>
						<td> 
									<label>Body Type  </label>
						</td>
                        <td>
									
								<div class="col-lg-15">
                                                <select name="body_type"  class="validate[required] form-control">
												    
                                                    <option value="0">--Select a Body Type--</option>
                                                    <option value="hatchback">Hatchback</option>
													<option value="sedan">Sedan</option>
													<option value="suv">SUV</option>
													<option value="van">Van</option>
													<option value="muv">MUV</option>
													<option value="luxury">Luxury</option>												
													<option value="coupe">Coupe</option>
													<option value="hybrid">Hybrid</option>
													<option value="convertible">Convertible</option>
                                                </select>
                                            </div>
									
						</td>
						<td><br>&nbsp;&nbsp;
						<font color="red">
														<?php 
						
						if(isset($_POST['submit'])){
							echo "<label>".$errmsg['b_type']."</label>";
						}
						?>
						</font>
						</td>
					</tr>
					
					<tr>
					<td></td>
						<td>
						<br>			
									<input type="submit" class="btn btn-primary" name="submit" value="Add Car">
					&nbsp;&nbsp;&nbsp;
									<a href="car_model_view.php" class="btn btn-primary">View Car Model List</a>
						</td>
					</tr>
					
					<tr>
					
					</tr>
					</table>
					</form>
					
               <?php
include("form_master2.php");
?>