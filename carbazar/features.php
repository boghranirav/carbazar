<?php
	if((!isset($_GET['vid']))){
		header("location:index.php");
	}
	include("master1.php")
?>

<link href="css/c/btnh.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/c/vtable.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/c/rlinkbtn.css" rel="stylesheet" type="text/css" media="all" />

<?php
		
		    $vid=$_GET['vid'];
			include("connection.php");
			$sql2="select * from car_version where v_id=$vid";
			$res2=mysql_query($sql2);
			$row2=mysql_fetch_array($res2);
			$cid=$row2['car_id'];
			$pri=$row2['price'];
	?>
<title><?php echo $row2['version_name']; ?></title>
<?php
	include("master2.php");
?>
<hr size="1" color="lightgrey">
<br>

<div class="wrap">

			<?php
				$sqlp="select * from photos where car_id=$cid";
				$resp=mysql_query($sqlp);
				$rowp=mysql_fetch_array($resp);
				$imgsrc="admin/upload_car/image/".$rowp['name'];
			?>

	
	<div style="width:750px;height:350px;border:2px;border: 2px solid #4cb1ca;">
				<br>
				<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>
				<?php echo $row2['version_name']." Specifications "; ?>
				<hr>
				</h3>
				
				<div style="overflow:hidden;position:relative;width:70%;min-width:300px;margin-bottom:20px;margin-top:20px;margin-left:1cm;margin-right:auto;">
				
				<div style="float:right;margin-right:1cm">
					<font size="5">
					<?php
					echo "Rs. ".$pri;
					?>
					</font>
					<br>
					<br>
					 <div class="btn_form">
						<?php
						echo "<a href='on_road_price_3.php?v=$vid' class='abtn'>Get On Road Price</a>";
					?>
					 </div>
				<br>
				<br>
				</div>
				
				<img src="<?php echo $imgsrc;?>" height="200" width="200" style=" margin-left: 0.3cm;vertical-align:middle;border:5px solid black;" >
				<br><br>
				
				</div>
				
				</div>
				<br>
				<div style="width:750px;border:2px;border: 2px solid #4cb1ca;">
				<br>
				&nbsp;&nbsp;&nbsp;
				<?php
				echo "<a href='overview.php?vid=$vid' id='popUpYes'>Overview</a>&nbsp;";
				echo "<a href='specification.php?vid=$vid' id='popUpYes'>Specifications</a>&nbsp;";
				echo "<a href='features.php?vid=$vid' id='popUpYes' style='background-color:white'>Features</a>&nbsp;";
				echo "<a href='dimensions.php?vid=$vid'  id='popUpYes'>Dimensions</a>&nbsp;";
				echo "<a href='version_review.php?vid=$vid'  id='popUpYes'>Reviews</a>&nbsp;";
				?>
				<br>
				<br>
				<table style="border:1px solid black;margin-left:0.5cm" class="CSSTableGenerator1">
				     <?php
					 
					           include("connection.php");
					                 $sql=mysql_query("select *from car_comfort_1 where v_id='$vid'");
				                	    $row=mysql_fetch_array($sql);
					                      $pwf=$row['power_windows_front'];
                                           $pwr=$row['power_windows_read'];
                                           $aclimate=$row['auto_climate_control'];
                                           $aqcontrol=$row['air_quality_control'];
                                           $rtopener=$row['remote_trunk_opener'];
                                           $rflid=$row['remote_fuel_lid_opener'];
                                           $lflight=$row['low_fuel_warning_light'];
                                           $apower=$row['accessory_power_outlet'];
                                           $tlight=$row['trunk_light'];
                                           $vmirror=$row['vanity_mirror'];
                                           $rrlamp=$row['rear_reading_lamp'];
                                           $rsheadrest=$row['rear_seat_headrest'];
                                           $rscarm=$row['rear_seat_center_arm_rest'];
                                           $hasbelt=$row['height_adjustable_front_seat_belts'];
										   
										   
					                   $sql=mysql_query("select *from car_comfort_2 where v_id='$vid'");
					                      $row=mysql_fetch_array($sql);
					                    $chf=$row['cup_holder_front'];
                                          $chr=$row['cup_holder_read'];
                                          $racvent=$row['rear_ac_vents'];
                                          $hsf=$row['heated_seat_front'];
                                          $hsr=$row['heated_seat_read'];
                                          $slumber=$row['seat_lumbar_support'];
                                          $cconrtol=$row['cruise_control'];
                                          $psensor=$row['parking_sensor'];
                                          $nsys=$row['navigation_system'];
                                          $frseat=$row['foldable_rear_seat'];
                                          $sacard=$row['smart_access_card_entry'];
                                          $esbutton=$row['engine_start_stop_button'];
                                          $gbox=$row['glove_box_cooling'];
                                          $bholder=$row['bottle_holder'];
                                          $vcontrol=$row['voice_control'];
					                     
						     ?>
				
				              <tr>
				                 <td colspan="2" align="center">COMFORT & CONVENIENCE</td>
				              </tr>
				             <tr >
			                    <td width="50%">Power Windows-Front</td><td><?php echo $pwf;?></td>
					         </tr>  
					         <tr>	  
					            <td>Power Windows-Rear</td><td><?php echo $pwr;?></td>
                            </tr>
                            <tr>					 
						       <td>Automatic Climate Control</td><td><?php echo   $aclimate;?></td>
                            </tr>
							<tr>	  
					            <td>Air Quality Control</td><td><?php echo $aqcontrol;?></td>
                            </tr>
                            <tr>					 
						       <td>Remote Trunk Opener</td><td><?php echo    $rtopener;?></td>
                            </tr>
							<tr>	  
					            <td>Remote Fuel Lid Opener</td><td><?php echo $rflid;?></td>
                            </tr>
                            <tr>					 
						       <td>Low Fuel Warning Light</td><td><?php echo   $lflight;?></td>
                            </tr>
							<tr>	  
					            <td>Accessory Power Outlet</td><td><?php echo $apower;?></td>
								</tr>
                            <tr>					 
						       <td>Trunk Light</td><td><?php echo   $tlight;?></td>
                            </tr>
							<tr>	  
					            <td>Vanity Mirror</td><td><?php echo $vmirror;?></td>
                            </tr>
                            <tr>					 
						       <td>Rear Reading Lamp</td><td><?php echo   $rrlamp;?></td>
							   </tr>
							<tr>					 
						       <td>Rear Seat Headrest</td><td><?php echo   $rsheadrest;?></td>
                            </tr>
							<tr>					 
						       <td>Rear Seat Centre Arm Rest</td><td><?php echo   $rscarm;?></td>
                            </tr>
							<tr>	  
					            <td>Height Adjustable Front Seat Belts</td><td><?php echo $hasbelt;?></td>
                            </tr>
                            <tr>					 
						       <td>Cup Holders (Front)</td><td><?php echo  $chf;?></td>
                            </tr>
							<tr>					 
						       <td>Cup Holders (Rear)</td><td><?php echo $chr;?></td>
                            </tr>
							<tr>					 
						       <td>Rear A/C Vents</td><td><?php echo  $racvent;?></td>
                            </tr>
							<tr>	  
					            <td>Heated Seats (Front)</td><td><?php echo $hsf;?></td>
                            </tr>
                            <tr>					 
						       <td>Heated Seats (Rear)</td><td><?php echo $hsr;?></td>
                            </tr>
							<tr>					 
						       <td>Seat Lumbar Support</td><td><?php echo $slumber;?></td>
                            </tr>
							<tr>					 
						       <td>Cruise Control</td><td><?php echo $cconrtol;?></td>
                            </tr>
							<tr>	  
					            <td>Parking Sensors</td><td><?php echo $psensor;?></td>
                            </tr>
                            <tr>					 
						       <td>Navigation System</td><td><?php echo $nsys;?></td>
                            </tr>
							<tr>					 
						       <td>Foldable Rear Seat</td><td><?php echo $frseat;?></td>
                            </tr>
							<tr>					 
						       <td>Smart Access Card Entry</td><td><?php echo  $sacard;?></td>
                            </tr>
							<tr>	  
					            <td>Engine Start/Stop Button</td><td><?php echo $esbutton;?></td>
                            </tr>
                            <tr>					 
						       <td>Glove Box Cooling</td><td><?php echo $gbox;?></td>
							   </tr>
							<tr>					 
						       <td>Bottle Holder</td><td><?php echo $bholder;?></td>
                            </tr>
							<tr>					 
						       <td>Voice Control</td><td><?php echo $vcontrol;?></td>
                            </tr>
			</table>				
			<br>
			
			<table style="border:1px solid black;margin-left:0.5cm" class="CSSTableGenerator1">
					<?php
		         		 include("connection.php");
				  	             $sql=mysql_query("select *from car_interior where v_id='$vid'");
				                	  $row=mysql_fetch_array($sql);
					                  
					                       $acondi=$row['ac'];
                                           $heater=$row['heater'];
                                           $ascolunm=$row['adjustable_steering_column'];
                                           $techometer=$row['techometer'];
                                           $emt=$row['electronic_multi_tripmeter'];
                                           $lseats=$row['leather_seats'];
                                           $fupholstery=$row['fabric_upholstery'];
                                           $lswheel=$row['leather_steering_wheel'];
                                           $gcompartment=$row['glove_compartment'];
                                           $dclock=$row['digital_clock'];
                                           $osdisplay=$row['outside_temprature_display'];
                                           $clightrr=$row['cigarette_lighter'];
                                           $dodometer=$row['digital_odometer'];
                                           $easeat=$row['electric_adjustable_seats'];
                                           $ftabler=$row['folding_table_in_rear'];
                                           $decontroleco=$row['driving_experience_control_eco'];
                                           $hadseat=$row['height_adjustable_driving_seat'];

					                    
					          
				    ?>
					<tr>
				      <td colspan="2" align="center">INTERIOR</td>
				     </tr>
      		
		         		<tr >
			                    <td width="50%">Air Conditioner</td><td><?php echo $acondi;?></td>
					         </tr>  
					         <tr>	  
					            <td>Heater</td><td><?php echo $heater;?></td>
                            </tr>
                            <tr>					 
						       <td>Adjustable Steering Column</td><td><?php echo $ascolunm;?></td>
                            </tr>
                            <tr>					  
						       <td>Tachometer</td><td><?php echo $techometer;?></td>
						    </tr>
							
                            <tr>					  
						       <td>Electronic Multi-Tripmeter</td><td><?php echo $emt;?></td>
						    </tr>
						    <tr>					  
						       <td>Leather Seats</td><td><?php echo $lseats;?></td>
						    </tr>
							<tr>					  
						       <td>Fabric Upholstery</td><td><?php echo $fupholstery;?></td>
						    </tr>
						    <tr>					  
						       <td>Leather Steering Wheel</td><td><?php echo $lswheel;?></td>
						    </tr>
							<tr>					  
						       <td>Glove Compartment</td><td><?php echo $gcompartment;?></td>
						    </tr>
						    <tr>					  
						       <td>Digital Clock</td><td><?php echo $dclock;?></td>
						    </tr>
							<tr>					  
						       <td>Outside Temperature Display</td><td><?php echo $osdisplay;?></td>
						    </tr>
						    <tr>					  
						       <td>Cigarette Lighter</td><td><?php echo $clightrr;?></td>
						    </tr>
							<tr>					  
						       <td>Digital Odometer</td><td><?php echo  $dodometer;?></td>
						    </tr>
							<tr>					  
						       <td>Electric Adjustable Seats</td><td><?php echo $easeat;?></td>
						    </tr>
							<tr>					  
						       <td>Folding Table in The Rear</td><td><?php echo $ftabler;?></td>
						    </tr>
							<tr>					  
						       <td>Driving Experience Control Eco</td><td><?php echo $decontroleco;?></td>
						    </tr>
							<tr>					  
						       <td>Height Adjustable Driving Seat</td><td><?php echo $hadseat;?></td>
						    </tr>
				</table>
				<br>
				
				<table style="border:1px solid black;margin-left:0.5cm" class="CSSTableGenerator1">
                           <?php
						           include("connection.php");
					               $sql=mysql_query("select *from car_exterior_1 where v_id='$vid'");
				                	     $row=mysql_fetch_array($sql);
					                       
					                       		$adjust_head=$row['adjustable_headlights'];
	                                        	$fog_light_f=$row['fog_lights_front'];
                                         		$fog_light_r=$row['fog_light_rear'];
		                                        $pow_adj_r=$row['power_adjust_rear_view'];
		                                        $manual_adjust_r_m=$row['manually_adjust_rear_view'];
                                          		$ele_folding_r=$row['electric_folding_rear']; 
	                                          	$rain_sen_w=$row['rain_sensing_wiper'];
                                         		$rear_window_w=$row['rear_window_wiper'];
		                                        $rear_win_washer=$row['rear_window_washer'];
                                          		$rear_win_defog=$row["rear_window_defogger"];
                                         		$wheel_covers=$row["wheel_cover"];
                                         		$alloy_wheel=$row["alloy_wheel"];
		                                        $power_antenna=$row["power_antenna"];
					                       
					                     
										 $sql=mysql_query("select *from car_exterior_2 where v_id='$vid'");
				                	       $row=mysql_fetch_array($sql);
					                       		$tinted_g=$row['tinted_glass'];
												$rear_spoiler=$row['rear_spoiler'];
												$convertible=$row['convertible_top'];
												$roof_carrier=$row['roof_carrier'];
												$sun_roof=$row['sun_roof'];
												$moon_roof=$row['moon_roof'];
												$side_steeper=$row['side_stepper']; 
												$outside_mirror_i=$row['outside_rear_mirror_indicator'];
												$integrated_antenna=$row['integrated_antenna'];
												$chrome_grille=$row['chrome_grille'];
											    $chrome_garnish=$row['chrome_garnish'];
												$smoke_headlamps=$row['smoke_headlamps'];		
											    $roof_rail=$row['roof_rail'];
												
					           
						       ?>
				
				
				         <tr>
				          <td colspan="2" align="center">EXTERIOR</td>
				         </tr>
						 
						 
						  <tr >
			                    <td width="50%">Adjustable Headlights</td><td><?php echo $adjust_head;?></td>
					         </tr>  
					         <tr>	  
					            <td>Fog Lights (Front)</td><td><?php echo $fog_light_f;?></td>
                            </tr>
                            <tr>					 
						       <td>Fog Lights (Rear)</td><td><?php echo $fog_light_r;?></td>
                            </tr>
                            <tr>					  
						       <td>Power Adjustable Exterior Rear View Mirror</td><td><?php echo $pow_adj_r;?></td>
							   </tr>
							
                            <tr>					  
						       <td>Manually Adjustable Ext. Rear View Mirror</td><td><?php echo $manual_adjust_r_m;?></td>
						    </tr>
						    <tr>					  
						       <td>Electric Folding Rear View Mirror</td><td><?php echo $ele_folding_r;?></td>
						    </tr>
							<tr>					  
						       <td>Rain Sensing Wiper</td><td><?php echo $rain_sen_w;?></td>
							   </tr>
						    <tr>					  
						       <td>Rear Window Wiper</td><td><?php echo $rear_window_w;?></td>
						    </tr>
							<tr>					  
						       <td>Rear Window Washer</td><td><?php echo $rear_win_washer;?></td>
						    </tr>
						    <tr>					  
						       <td>Rear Window Defogger</td><td><?php echo $rear_win_defog;?></td>
						    </tr>
							<tr>					  
						       <td>Wheel Covers</td><td><?php echo $wheel_covers;?></td>
						    </tr>
						    <tr>					  
						       <td>Alloy Wheels</td><td><?php echo $alloy_wheel;?></td>
						    </tr>
							<tr>					  
						       <td>Power Antenna</td><td><?php echo  $power_antenna;?></td>
						    </tr>
							<tr>					  
						       <td>Tinted Glass</td><td><?php echo $tinted_g;?></td>
						    </tr>
							<tr>					  
						       <td>Rear Spoiler</td><td><?php echo $rear_spoiler;?></td>
						    </tr>
							<tr>					  
						       <td>Removable/Convertible Top</td><td><?php echo $convertible;?></td>
						    </tr>
							<tr>					  
						       <td>Roof Carrier</td><td><?php echo $roof_carrier;?></td>
						    </tr>
							<tr>					  
						       <td>Sun Roof</td><td><?php echo $sun_roof;?></td>
						    </tr>
							<tr>					  
						       <td>Moon Roof</td><td><?php echo $moon_roof;?></td>
							   </tr>
							<tr>					  
						       <td>Side Stepper</td><td><?php echo $side_steeper;?></td>
						    </tr>
							<tr>					  
						       <td>Outside Rear View Mirror Turn Indicators</td><td><?php echo $outside_mirror_i;?></td>
						    </tr>
							<tr>					  
						       <td>Integrated Antenna</td><td><?php echo $integrated_antenna;?></td>
						    </tr>
							<tr>					  
						       <td>Chrome Grille</td><td><?php echo $chrome_grille;?></td>
						    </tr>
							<tr>					  
						       <td>Chrome Garnish</td><td><?php echo $chrome_garnish;?></td>
						    </tr>
						 	<tr>					  
						       <td>Smoke Headlamps</td><td><?php echo $smoke_headlamps;?></td>
						    </tr>
							<tr>					  
						       <td>Roof Rail</td><td><?php echo $roof_rail;?></td>
						    </tr>
                </table>		
 <br>

                <table style="border:1px solid black;margin-left:0.5cm" class="CSSTableGenerator1">
				        <?php
					    include("connection.php");
					             $sql=mysql_query("select *from car_entertainment where v_id='$vid'");
				                	    $row=mysql_fetch_array($sql);
										 $csplayer=$row['cassette_player'];
                                           $cdplayer=$row['cd_player'];
                                           $cdcharger=$row['cd_charger'];
                                           $dvdplayer=$row['dvd_player'];
                                           $cradio=$row['radio'];
                                           $asremote=$row['audio_system_remote_control'];
                                           $sf=$row['speakers_front'];
                                           $sr=$row['speakers_rear'];
                                           $iaudio=$row['integrated_2din_audio'];
                                           $bcon=$row['bluetooth_connectivity'];
                                           $uinput=$row['usb_input'];
                                           $ts=$row['touch_screen'];

						
						 ?>
				
				       <tr>
				          <td colspan="2" align="center">ENTERTAINMENT</td>
				         </tr>
						 <tr >
			                    <td width="50%">Cassette Player</td><td><?php echo $csplayer;?></td>
					         </tr>  
					         <tr>	  
					            <td>CD Player</td><td><?php echo $cdplayer;?></td>
                            </tr>
                            <tr>					 
						       <td>CD Changer</td><td><?php echo $cdcharger;?></td>
							   </tr>
                            <tr>					  
						       <td>DVD Player</td><td><?php echo $dvdplayer;?></td>
						    </tr>
							
                            <tr>					  
						       <td>Radio</td><td><?php echo $cradio;?></td>
						    </tr>
						    <tr>					  
						       <td>Audio System Remote Control</td><td><?php echo $asremote;?></td>
						    </tr>
							<tr>					  
						       <td>Speakers Front</td><td><?php echo $sf;?></td>
							   </tr>
						    <tr>					  
						       <td>Speakers Rear</td><td><?php echo $sr;?></td>
						    </tr>
							<tr>					  
						       <td>Integrated 2DIN Audio</td><td><?php echo $iaudio;?></td>
						    </tr>
						    <tr>					  
						       <td>Bluetooth Connectivity</td><td><?php echo $bcon;?></td>
						    </tr>
							<tr>					  
						       <td>USB & Auxiliary Input</td><td><?php echo $uinput;?></td>
						    </tr>
						    <tr>					  
						       <td>Touch Screen</td><td><?php echo $ts;?></td>
							   </tr>
										   
					</table>

					<br>
			  <table style="border:1px solid black;margin-left:0.5cm" class="CSSTableGenerator1">
				        <?php
						include("connection.php");
					                    $sql=mysql_query("select *from car_safety_1 where v_id='$vid'");
				                	     $row=mysql_fetch_array($sql);
					                     $albrake=$row['anti_lock_breaking'];
                                         $bassist=$row['brake_assist'];
                                         $centrallock=$row['central_locking'];
									     $pdlock=$row['power_door_locks'];
									     $cslock=$row['child_safety_locks'];
										 $atalarm=$row['anti_theft_alarm'];
					                     $dair=$row['driver_airbag'];
                                         $pair=$row['passanger_airbag'];
                                         $sairf=$row['side_airbag_front'];
                                         $sairr=$row['side_airbag_rear'];
                                         $nrview=$row['night_rear_view_mirror'];
                                         $psrview=$row['passenger_side_rear_mirror'];
                                         $xheadlamps=$row['xenon_headlamps'];
                                         $hheadlamps=$row['halogen_headlamps'];
                                         $rsbelts=$row['rear_seat_belts'];
                                         $sbwarn=$row['seat_bealt_warning'];
                                         $dawarn=$row['door_ajar_warning'];   
										 
					                  
									  $sql=mysql_query("select *from car_safety_2 where v_id='$vid'");
					                  $row=mysql_fetch_array($sql);
					                     $sibeam=$row['side_impact_beams'];
                                         $fibeam=$row['front_impact_beams'];
                                         $tcontrol=$row['traction_control'];
                                         $aseat=$row['adjustable_seats'];
                                         $klentry=$row['keyless_entry'];
                                         $tpmonitor=$row['tyre_pressure_monitor'];
                                         $vscontrol=$row['vehicle_stability_control'];
                                         $eimmobilizer=$row['engine_immobilizer'];
                                         $csensor=$row['crash_sensor'];
                                         $cmftank=$row['centrally_mounted_fueltank'];
                                         $ecwarn=$row['engine_check_warning'];
                                         $aheadlamp=$row['auto_headlamps'];
                                         $clock=$row['clutch_lock'];
                                         $ebd=$row['ebd'];
                                         $fmhome=$row['follow_me_home_headlamp'];
                                         $rcamera=$row['rear_camera'];
                                         $atdevice=$row['anti_theft_device'];
                                         
										
						 ?>
						 
						  <tr>
				          <td colspan="2" align="center">SAFETY</td>
				         </tr>
						 <tr >
			                    <td width="50%">Anti-Lock Braking</td><td><?php echo $albrake;?></td>
					         </tr>  
					         <tr>	  
					            <td>Brake Assist</td><td><?php echo $bassist;?></td>
                            </tr>
                            <tr>					 
						       <td>Central Locking</td><td><?php echo  $centrallock;?></td>
                            </tr>
							<tr>	  
					            <td>Power Door Locks</td><td><?php echo $pdlock;?></td>
                            </tr>
                            <tr>					 
						       <td>Child Safety Locks</td><td><?php echo $cslock;?></td>
                            </tr>
							<tr>	  
					            <td>Anti-Theft Alarm</td><td><?php echo $atalarm;?></td>
                            </tr>
                            <tr>					 
						       <td>Driver Airbag</td><td><?php echo $dair;?></td>
                            </tr>
							<tr>	  
					            <td>Passenger Airbag</td><td><?php echo $pair;?></td>
                            </tr>
                            <tr>					 
						       <td>Side Airbag (Front)</td><td><?php echo $sairf;?></td>
                            </tr>
							<tr>	  
					            <td>Side Airbag (Rear)</td><td><?php echo  $sairr;?></td>
                            </tr>
                            <tr>					 
						       <td>Night Rear View Mirror</td><td><?php echo $nrview;?></td>
                            </tr>
							<tr>					 
						       <td>Passenger Side Rear View Mirror</td><td><?php echo $psrview;?></td>
                            </tr>
							<tr>					 
						       <td>Xenon Headlamps</td><td><?php echo  $xheadlamps;?></td>
                            </tr>
							<tr>	  
					            <td>Halogen Headlamps</td><td><?php echo $hheadlamps;?></td>
                            </tr>
                            <tr>					 
						       <td>Rear Seat Belts</td><td><?php echo $rsbelts;?></td>
                            </tr>
							<tr>					 
						       <td>Seat Belt Warning</td><td><?php echo $sbwarn;?></td>
                            </tr>
							<tr>					 
						       <td>Door Ajar Warning</td><td><?php echo  $dawarn;?></td>
                            </tr>
							<tr>	  
					            <td>Side Impact Beams</td><td><?php echo $sibeam;?></td>
                            </tr>
                            <tr>					 
						       <td>Front Impact Beams</td><td><?php echo $fibeam;?></td>
                            </tr>
							<tr>					 
						       <td>Traction Control</td><td><?php echo $tcontrol;?></td>
                            </tr>
							<tr>					 
						       <td>Adjustable Seats</td><td><?php echo $aseat;?></td>
                            </tr>
							<tr>	  
					            <td>Keyless Entry</td><td><?php echo $klentry;?></td>
                            </tr>
                            <tr>					 
						       <td>Tyre Pressure Monitor</td><td><?php echo $tpmonitor;?></td>
                            </tr>
							<tr>					 
						       <td>Vehicle Stability Control System</td><td><?php echo $vscontrol;?></td>
                            </tr>
							<tr>					 
						       <td>Engine Immobilizer</td><td><?php echo $eimmobilizer;?></td>
                            </tr>
                            <tr>					 
						       <td>Crash Sensor</td><td><?php echo  $csensor;?></td>
                            </tr>
							<tr>					 
						       <td>Centrally Mounted Fuel Tank</td><td><?php echo $cmftank;?></td>
                            </tr>
							<tr>					 
						       <td>Engine Check Warning</td><td><?php echo $ecwarn;?></td>
							   </tr>
							<tr>					 
						       <td>Automatic Headlamps</td><td><?php echo $aheadlamp;?></td>
                            </tr>
							<tr>					 
						       <td>Clutch Lock</td><td><?php echo  $clock;?></td>
                            </tr>
							<tr>					 
						       <td>EBD</td><td><?php echo  $ebd;?></td>
                            </tr>
							<tr>					 
						       <td>Follow Me Home Headlamps</td><td><?php echo $fmhome;?></td>
                            </tr>
							<tr>					 
						       <td>Rear Camera</td><td><?php echo $rcamera;?></td>
                            </tr>
							<tr>					 
						       <td>Anti-Theft Device</td><td><?php echo $atdevice;?></td>
                            </tr>



			        </table>
						 
						 <br>
				</div>
	  <div class="clear"></div>
	  
</div>

  <div class="clear"></div>
  <br>
  <br>
	
<?php
	include("master3.php");
?>
	