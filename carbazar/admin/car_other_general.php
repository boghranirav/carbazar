<?php
include("page_master.php");
?>
<title>
Add Version Other Specification And General Car Details
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
		if(isset($_POST['submit'])){
				$vvid=$_POST['v_id'];
				$model=$_POST['m_id'];
				$brand=$_POST['b_id'];
				
				$s_cap=$_POST["s_capacity"];
				$n_door=$_POST["no_door"];
				$c_vol=$_POST["c_volume"];
									
			$a_coun=$_POST["a_country"];
			$coun_mfg=$_POST["c_mfg"];
			$intro_d=$_POST["intro_date"];
			$w_time=$_POST["w_time"];
			$w_dist=$_POST["w_dist"];
			
			$errmsg['brand']="";
			$errmsg['model']="";
			$errmsg['ver']="";
			$err="";
			
			$errmsg['capacity']="";
			$errmsg['door']="";
			$errmsg['volume']="";
			
			$errmsg['country']="";
			$errmsg['mfg']="";
			
			$errmsg['w_time']="";
			$errmsg['w_dist']="";
			
			if($brand==0){
				$errmsg['brand']="*Select Brand.";
			}
			
			if($model==0){
				$errmsg['model']="*Select Model.";
			}
			
			if($vvid==0){
				$errmsg['ver']="*Select Version.";
			}
			
			
			
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
					
			
			
			if($errmsg['brand']=="" && $errmsg['model']=="" && $errmsg['ver']=="" && $errmsg['capacity']=="" && $errmsg['door']=="" && $errmsg['volume']=="" && $errmsg['country']=="" && $errmsg['mfg']=="" && $errmsg['w_time']=="" && $errmsg['w_dist']==""){
			include("connection.php");
			
			$sql1="insert into car_other_spec values($vvid,'$s_cap','$n_door','$c_vol')";
			$sql2="insert into car_general_details values($vvid,'$a_coun','$coun_mfg','$intro_d','$w_time','$w_dist')";
			
			$res1=mysql_query($sql1);
			if($res1){
				$res2=mysql_query($sql2);
				if($res2){
						header("location:view_car.php");
				}else
				{
						$err="Car general details system not added.";
					}
				}
				else
				{
					$err="Data Not Added.";
				}		
			}						
		}
		?>
		

                        <h1 class="page-header"> Add Version Other Specification And General Car Details </h1>
						
						<form action="car_other_general.php" method="post">
						<table width="60%">
						<tr>
					<td width="20%">					
                                            <label class="control-label">Select Brand</label>
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
													?>
													<option value="<?php echo $bid;?>" <?php if(isset($_POST['submit'])){if($brand==$bid) echo "selected";}?>><?php echo $car_com;?></option>;
													<?php
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
											
					<?php
					if(isset($_POST['submit'])){
						echo "<label>".$err."</label>";
					}
					?>
					</font>
					</td>
					</tr>						
					<tr id="model">
						<td>
											<label class="control-label">Select Model</label>
						</td>
						<td>
					                        <div class="col-lg-9">
                                                <select name="m_id" id="m_id" class="validate[required] form-control" >
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
						<td>
							<font color="red">
											<?php
											if(isset($_POST['submit'])){
												echo $errmsg['ver'];
											}
											?>
											</font>
						</td>
					</tr>
						</table>
						
						<div class="box" id="overview">
                            <header>
                                <h5> Other Specification And General Car Details</h5>
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
											<center>
											<label><h3> Other Specification</h3></label>
											</center>
											</td>
										</tr>
										<tr>
											<td width="20%">Seating Capacity</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Seating Capacity" name="s_capacity" value="<?php if(isset($_POST['submit'])) echo $s_cap;?>">
									
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
											<input class="form-control" placeholder="Enter Number of Doors" name="no_door" value="<?php if(isset($_POST['submit'])) echo $n_door;?>">
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
											<input class="form-control" placeholder="Enter Cargo Volume" name="c_volume" value="<?php if(isset($_POST['submit'])) echo $c_vol;?>">
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
													
									<tr></tr>									
										<tr>
											<td colspan="2">
											<center>
											<label><h3> General Car Details </h3></label>
											</center>
											</td>
										</tr>
										
										
										<tr>
											<td width="20%">Country Of Assembly</td>
											<td width="40%">
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Country of Assembly" name="a_country" value="<?php if(isset($_POST['submit'])) echo $a_coun;?>">
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
											<input class="form-control" placeholder="Enter Country Of Manufacture" name="c_mfg" value="<?php if(isset($_POST['submit'])) echo $coun_mfg;?>">
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
											<input class="form-control" type="text" value="<?php if(isset($_POST['submit'])){echo $intro_d;}else{ echo date("Y-m-d"); }?>" readonly="" name="intro_date"/>
											<span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
											</div>
											
											</td>
										</tr>
										<tr>
											<td>Warranty Time</td>
											<td>
											<div class="col-lg-6">
											<input class="form-control" placeholder="Enter Warranty Time" name="w_time" value="<?php if(isset($_POST['submit'])) echo $w_time;?>">
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
											<input class="form-control" placeholder="Enter Warranty Distance" name="w_dist" value="<?php if(isset($_POST['submit'])) echo $w_dist;?>">
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
									<input type="submit" class="btn btn-primary" name="submit" value="Add Car Other Specification And General Car Details">
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