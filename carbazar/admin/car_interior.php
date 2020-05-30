<?php
include("page_master.php");
?>
<title>
Add Version Interior Info
</title>
<?php
include("page_master1.php");
?>
<?php
$errmsg="";
if(isset($_POST['submit']))
{
$bid=$_POST['b_id'];
$mid=$_POST['m_id'];
$verid=$_POST['v_id'];
$acondi=$_POST['air_conditioner'];
$heater=$_POST['heater'];
$ascolunm=$_POST['a_s_column'];
$techometer=$_POST['techometer'];
$emt=$_POST['electronic_m_t'];
$lseats=$_POST['leather_seats'];
$fupholstery=$_POST['fabric_upholstery'];
$lswheel=$_POST['leather_steering_wheel'];
$gcompartment=$_POST['glove_compartment'];
$dclock=$_POST['digital_clock'];
$osdisplay=$_POST['o_s_display'];
$clightrr=$_POST['cigarette_lighter'];
$dodometer=$_POST['digital_odometer'];
$easeat=$_POST['e_a_seat'];
$ftabler=$_POST['f_table_r'];
$decontroleco=$_POST['d_e_control_eco'];
$hadseat=$_POST['h_a_driving_seat'];


$err['vid']="";
			$err['bid']="";
			$err['mid']="";
			
			
			if($bid=="0"){
				$err['bid']="<font color='red'>*Select Brand.</font>";
			}
			
			if($mid=="0"){
				$err['mid']="<font color='red'>*Select Model.</font>";
			}
			
			if($verid=="0"){
				$err['vid']="<font color='red'>*Select Version.</font>";
			}
		
			
		if($err['bid']=="" && $err['mid']=="" && $err['vid']==""){
		
                  include("connection.php");
$sql1=mysql_query("insert into car_interior  values($verid,'$acondi','$heater','$ascolunm','$techometer',
                                             '$emt','$lseats','$fupholstery','$lswheel','$gcompartment'
                                                ,'$dclock','$osdisplay','$clightrr','$dodometer',
                                                 '$easeat','$ftabler','$decontroleco','$hadseat')");

  if($sql1)
    {
       header("location:view_car.php");
	  }
	 
else
{
$errmsg="Data not Added";
}
		}
}
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
	

                        <h1 class="page-header"> Add Version Interior Info</h1>
							<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>
						<form action="#" method="post">
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
                                <h5> Interior</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                       
										<tr>
											<td width="50%">Air Conditioner</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="air_conditioner" id="air_conditioner1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="air_conditioner" id="air_conditioner2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Heater</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="heater" id="heater1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="heater" id="heater2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Adjustable Steering Column</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="a_s_column" id="a_s_column1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="a_s_column" id="a_s_column2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Techometer</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="techometer" id="techometer1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="techometer" id="techometer2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Electronic Multi-Tripmeter</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="electronic_m_t" id="electronic_m_t1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="electronic_m_t" id="electronic_m_t2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Leather Seats</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="leather_seats" id="leather_seats1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="leather_seats" id="leather_seats2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Fabric Upholstery</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="fabric_upholstery" id="fabric_upholstery1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="fabric_upholstery" id="fabric_upholstery2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Leather Steering Wheel</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="leather_steering_wheel" id="leather_steering_wheel1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="leather_steering_wheel" id="leather_steering_wheel2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Glove Compartment</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="glove_compartment" id="glove_compartment1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="glove_compartment" id="glove_compartment2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Digital Clock</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="digital_clock" id="digital_clock1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="digital_clock" id="digital_clock2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Outside Temperature Display</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="o_s_display" id="o_s_display1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="o_s_display" id="o_s_display2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Cigarette Lighter</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cigarette_lighter" id="cigarette_lighter1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="cigarette_lighter" id="cigarette_lighter2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Digital Odometer</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="digital_odometer" id="digital_odometer1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="digital_odometer" id="digital_odometer2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Electric Adjustable Seat</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="e_a_seat" id="e_a_seat1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="e_a_seat" id="e_a_seat2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Foldable Table in the Rear</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="f_table_r" id="f_table_r1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="f_table_r" id="f_table_r2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Driving Experience Control Eco</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="d_e_control_eco" id="d_e_control_eco1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="d_e_control_eco" id="d_e_control_eco2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Height Adjustable Driving Seat</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="h_a_driving_seat" id="h_a_driving_seat1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="h_a_driving_seat" id="h_a_driving_seat2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										
										
										
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Add Car Interior Info">
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