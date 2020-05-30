<?php
include("page_master.php");
?>
<title>
Add Version Exterior Dimensions Info
</title>
<?php
include("page_master1.php");
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
							url:"version_sql_2.php",
							type:"post",
							data:{b_id:id},
							success:function(result){
								//alert(result);
								$("#m_id").html(result);
						
							}
						});
					}
				
				});
				
					$("#m_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
					
						
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"version_sql_2.php",
							type:"post",
							data:{m_id:id1},
							success:function(result1){
							//	alert(result1);
								$("#v_id").html(result1);
								
							}
						});
					}
				
				});
				
			
			});	
	</script>
	
	<?php
	$errmsg="";
	if(isset($_POST['submit'])){
			$bid=$_POST['b_id'];
$mid=$_POST['m_id'];
		$vvid=$_POST['v_id'];
		 $c_length=$_POST["c_length"];
		 $c_width=$_POST["c_width"];
		 $c_height=$_POST["c_height"];
		 $ground_clearance=$_POST["ground_clearance"];
		 $wheel_base=$_POST["wheel_base"];
		 $front_tread=$_POST["front_tread"];
		 $rear_tread=$_POST["rear_tread"];
		 $kerb_weight=$_POST["kerb_weight"];
		 $gross_weight=$_POST["gross_weight"];

		    $err['vid']="";
			$err['bid']="";
			$err['mid']="";
			$err['length']="";
			$err['width']="";
			$err['height']="";
			$err['gc']="";
			$err['wbase']="";
			$err['kweight']="";
			
			if($bid=="0"){
				$err['bid']="<font color='red'>*Select Brand.</font>";
			}
			
			if($mid=="0"){
				$err['mid']="<font color='red'>*Select Model.</font>";
			}
			
			if($vvid=="0"){
				$err['vid']="<font color='red'>*Select Version.</font>";
			}
			
			if($c_length==""){
				$err['length']="<font color='red'>*Enter Value.</font>";
			}
			if($c_width==""){
				$err['width']="<font color='red'>*Enter Value.</font>";
			}
			if($c_height==""){
				$err['height']="<font color='red'>*Enter Value.</font>";
			}
			if($ground_clearance==""){
				$err['gc']="<font color='red'>*Enter Value.</font>";
			}
	    	if($wheel_base==""){
				$err['wbase']="<font color='red'>*Enter Value.</font>";
			}
			if($kerb_weight==""){
				$err['kweight']="<font color='red'>*Enter Value.</font>";
			}
			
		if($err['bid']=="" && $err['mid']=="" && $err['vid']=="" && $err['length']=="" && $err['width']=="" && $err['height']=="" && $err['gc']=="" && $err['wbase']=="" && $err['kweight']==""){
		 include("connection.php");
			
			$sql1="insert into car_exterior_dimension values($vvid,'$c_length','$c_width','$c_height','$ground_clearance','$wheel_base','$front_tread','$rear_tread','$kerb_weight','$gross_weight')";
			
			$res=mysql_query($sql1);
			if($res){
				       header("location:view_car.php");
			}else
			{
				$errmsg="Data Not Added.";
			}

		 }
	}
	?>

                        <h1 class="page-header"> Add Version Exterior Dimensions Info</h1>
						<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>
						<form action="car_exterior_d.php" method="post">
							<table width="60%">
						<tr>
					<td width="20%">					
                                            <label class="control-label">Select Brand </label>
					</td>
					<td width="60%">
					                        <div class="col-lg-9">
                                                <select name="b_id" id="b_id" class="validate[required] form-control" length="10">
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
					<td width="20%"><?php if(isset($_POST['submit'])) echo $err['bid'];?></td>
					</tr>						
					<tr id="model">
						<td>
											<label class="control-label">Select Model </label>
						</td>
						<td>
					                        <div class="col-lg-9">
                                                <select name="m_id" id="m_id" class="validate[required] form-control" >
                                                    <option value="0">--Select a Model--</option>
                                                    
                                                </select>
                                            </div>
						</td>
						<td><?php if(isset($_POST['submit'])) echo $err['mid'];?></td>
					</tr>
					<tr id="version">
						<td>
											<label class="control-label">Select Version</label>
						</td>
						<td>
					                        <div class="col-lg-9">
                                                <select name="v_id" id="v_id" class="validate[required] form-control" >
                                                    <option value="0">--Select a Version--</option>
                                                                                                    </select>
                                            </div>
						</td>
						<td><?php if(isset($_POST['submit'])) echo $err['vid'];?></td>
					</tr>
						</table>
						
						<div class="box" id="overview">
                            <header>
                                <h5> Exterior Dimensions</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                       
										<tr>
											<td width="20%">Length</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Length" name="c_length" value="<?php if(isset($_POST['submit'])) echo $c_length;?>" >
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['length'];
											?>
											</td>
										</tr>
										<tr>
											<td>Width</td>
											<td>
												
											<div class="col-lg-6">
											<input class="form-control" placeholder="Width" name="c_width" value="<?php if(isset($_POST['submit'])) echo $c_width;?>">
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['width'];
											?>
											</td>
										</tr>
										<tr>
											<td>Height</td>
											<td>
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Height" name="c_height" value="<?php if(isset($_POST['submit'])) echo $c_height;?>">
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['height'];
											?>
											</td>
										</tr>
										<tr>
											<td>Ground Clearance</td>
											<td>
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Ground Clearance" name="ground_clearance" value="<?php if(isset($_POST['submit'])) echo $ground_clearance;?>">
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['gc'];
											?>
											</td>
										</tr>
										<tr>
											<td>Wheel Base</td>
											<td>
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Wheel Base" name="wheel_base" value="<?php if(isset($_POST['submit'])) echo $wheel_base;?>">
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['wbase'];
											?>
											</td>
										</tr>
										<tr>
											<td>Front Tread</td>
											<td>
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Front Tread" name="front_tread" value="<?php if(isset($_POST['submit'])) echo $front_tread;?>">
											</div>
											</td>
										</tr>
										<tr>
											<td>Rear Tread</td>
											<td>
											
											<div class="col-lg-6">
											<input class="form-control" placeholder="Rear Tread" name="rear_tread" value="<?php if(isset($_POST['submit'])) echo $rear_tread;?>">
											</div>
											</td>
										</tr>
										<tr>
											<td>Kerb Weight</td>
											<td>
										
											<div class="col-lg-6">
											<input class="form-control" placeholder="Kerb Weight" name="kerb_weight" value="<?php if(isset($_POST['submit'])) echo $kerb_weight;?>">
											</div>
											<?php
											if(isset($_POST['submit']))
												echo $err['kweight'];
											?>
											</td>
										</tr>
										<tr>
											<td>Gross Weight</td>
											<td>
												
											<div class="col-lg-6">
											<input class="form-control" placeholder="Gross Weight" name="gross_weight" value="<?php if(isset($_POST['submit'])) echo $gross_weight;?>">
											</div>
											</td>
										</tr>
										
										
										
										
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Add Car Exterior Dimensions Info">
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