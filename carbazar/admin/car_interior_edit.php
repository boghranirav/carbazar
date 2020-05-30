<?php
include("master.php");
?>
<title>
Edit Version Interior Info
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
	

$olddata2=mysql_query("select *from  car_interior where v_id='$id'");
$row=mysql_fetch_array($olddata2);
$oacondi=$row['ac'];
$oheater=$row['heater'];
$oascolunm=$row['adjustable_steering_column'];
$otechometer=$row['techometer'];
$oemt=$row['electronic_multi_tripmeter'];
$olseats=$row['leather_seats'];
$ofupholstery=$row['fabric_upholstery'];
$olswheel=$row['leather_steering_wheel'];
$ogcompartment=$row['glove_compartment'];
$odclock=$row['digital_clock'];
$oosdisplay=$row['outside_temprature_display'];
$oclightrr=$row['cigarette_lighter'];
$ododometer=$row['digital_odometer'];
$oeaseat=$row['electric_adjustable_seats'];
$oftabler=$row['folding_table_in_rear'];
$odecontroleco=$row['driving_experience_control_eco'];
$ohadseat=$row['height_adjustable_driving_seat'];

?>

 <h1 class="page-header"> Edit Version Interior Info</h1>
<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>

<?php
if(isset($_POST['submit']))
{

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



 
















include("connection.php");
$sql1=mysql_query("update car_interior  set ac='$acondi',heater='$heater',adjustable_steering_column='$ascolunm',techometer='$techometer',
                                    electronic_multi_tripmeter='$emt',leather_seats='$lseats',fabric_upholstery='$fupholstery',
									leather_steering_wheel='$lswheel',glove_compartment='$gcompartment'
                                   ,digital_clock='$dclock',outside_temprature_display='$osdisplay',cigarette_lighter='$clightrr',
								   digital_odometer='$dodometer',electric_adjustable_seats='$easeat',folding_table_in_rear='$ftabler',
								driving_experience_control_eco='$decontroleco',height_adjustable_driving_seat='$hadseat' where v_id='$id'");

  if($sql1)
    {
     header("location:view_car.php");
	  }
	 
else
{
echo "not satisfy";
}
}
?>



                        
						
						<form action="#" method="post">
											
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
                                                <input type="radio" name="air_conditioner" id="air_conditioner1" value="Yes" <?php if($oacondi=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="air_conditioner" id="air_conditioner2" value="No" <?php if($oacondi=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>



										<tr>
											<td>Heater</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="heater" id="heater1" value="Yes" <?php if($oheater=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="heater" id="heater2" value="No" <?php if($oheater=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Adjustable Steering Column</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="a_s_column" id="a_s_column1" value="Yes" <?php if($oascolunm=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="a_s_column" id="a_s_column2" value="No"  <?php if($oascolunm=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Techometer</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="techometer" id="techometer1" value="Yes" <?php if($otechometer=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="techometer" id="techometer2" value="No" <?php if($otechometer=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Electronic Multi-Tripmeter</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="electronic_m_t" id="electronic_m_t1" value="Yes" <?php if($oemt=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="electronic_m_t" id="electronic_m_t2" value="No" <?php if($oemt=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Leather Seats</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="leather_seats" id="leather_seats1" value="Yes" <?php if($olseats=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="leather_seats" id="leather_seats2" value="No" <?php if($olseats=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Fabric Upholstery</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="fabric_upholstery" id="fabric_upholstery1" value="Yes" <?php if($ofupholstery=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="fabric_upholstery" id="fabric_upholstery2" value="No"  <?php if($ofupholstery=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>


										<tr>
											<td>Leather Steering Wheel</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="leather_steering_wheel" id="leather_steering_wheel1" value="Yes" <?php if($olswheel=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="leather_steering_wheel" id="leather_steering_wheel2" value="No" <?php if($olswheel=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Glove Compartment</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="glove_compartment" id="glove_compartment1" value="Yes" <?php if($ogcompartment=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="glove_compartment" id="glove_compartment2" value="No" <?php if($ogcompartment=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Digital Clock</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="digital_clock" id="digital_clock1" value="Yes" <?php if($odclock=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="digital_clock" id="digital_clock2" value="No"<?php if($odclock=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Outside Temperature Display</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="o_s_display" id="o_s_display1" value="Yes"  <?php if($oosdisplay=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="o_s_display" id="o_s_display2" value="No" <?php if($oosdisplay=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>

										<tr>
											<td>Cigarette Lighter</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cigarette_lighter" id="cigarette_lighter1" value="Yes" <?php if($oclightrr=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="cigarette_lighter" id="cigarette_lighter2" value="No" <?php if($oclightrr=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Digital Odometer</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="digital_odometer" id="digital_odometer1" value="Yes" <?php if($ododometer=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="digital_odometer" id="digital_odometer2" value="No" <?php if($ododometer=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Electric Adjustable Seat</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="e_a_seat" id="e_a_seat1" value="Yes" <?php if($oeaseat=="Yes") echo "checked"; ?>/>
												<label>Yes</label>
                                                <input type="radio" name="e_a_seat" id="e_a_seat2" value="No"  <?php if($oeaseat=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Foldable Table in the Rear</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="f_table_r" id="f_table_r1" value="Yes" <?php if($oftabler=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="f_table_r" id="f_table_r2" value="No" <?php if($oftabler=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Driving Experience Control Eco</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="d_e_control_eco" id="d_e_control_eco1" value="Yes" <?php if($odecontroleco=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="d_e_control_eco" id="d_e_control_eco2" value="No" <?php if($odecontroleco=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Height Adjustable Driving Seat</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="h_a_driving_seat" id="h_a_driving_seat1" value="Yes" <?php if($ohadseat=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="h_a_driving_seat" id="h_a_driving_seat2" value="No" <?php if($ohadseat=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										
										
										
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Car Interior Info">
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