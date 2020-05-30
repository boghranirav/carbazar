<?php
include("master.php");
?>
<title>
Edit Version Entertainment Info
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
	
$olddata2=mysql_query("select *from  car_entertainment where v_id='$id'");
$row=mysql_fetch_array($olddata2);
$ocsplayer=$row['cassette_player'];
$ocdplayer=$row['cd_player'];
$ocdcharger=$row['cd_charger'];
$odvdplayer=$row['dvd_player'];
$ocradio=$row['radio'];
$oasremote=$row['audio_system_remote_control'];
$osf=$row['speakers_front'];
$osr=$row['speakers_rear'];
$oiaudio=$row['integrated_2din_audio'];
$obcon=$row['bluetooth_connectivity'];
$ouinput=$row['usb_input'];
$ots=$row['touch_screen'];

?>

 <h1 class="page-header"> Edit Version Entertainment Info</h1>	
	<b> Version Name :- &nbsp;</b><?php echo "<label>".$ovname."</label>";?>
	<br>

<?php
if(isset($_POST['submit']))
{
$csplayer=$_POST['cassette_player'];
$cdplayer=$_POST['cd_player'];
$cdcharger=$_POST['cd_charger'];
$dvdplayer=$_POST['dvd_player'];
$cradio=$_POST['c_radio'];
$asremote=$_POST['audio_sys_remote_c'];
$sf=$_POST['speakers_f'];
$sr=$_POST['speakers_r'];
$iaudio=$_POST['integrated_audio'];
$bcon=$_POST['bluetooth_con'];
$uinput=$_POST['usb_input'];
$ts=$_POST['touch_screen'];



















include("connection.php");
$sql1=mysql_query("update car_entertainment set cassette_player='$csplayer',cd_player='$cdplayer',cd_charger='$cdcharger',
                                 dvd_player='$dvdplayer',radio='$cradio',audio_system_remote_control='$asremote',
								speakers_front='$sf',speakers_rear='$sr',integrated_2din_audio='$iaudio',
								bluetooth_connectivity='$bcon',usb_input='$uinput',touch_screen='$ts' where v_id='$id'");

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
                                <h5> Entertainment </h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                       
										<tr>
											<td width="50%">Cassette Player</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cassette_player" id="cassette_player1" value="Yes" <?php if($ocsplayer=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="cassette_player" id="cassette_player2" value="No"<?php if($ocsplayer=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>CD Player</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cd_player" id="cd_player1" value="Yes" <?php if($ocdplayer=="Yes") echo "checked"; ?>  />
												<label>Yes</label>
                                                <input type="radio" name="cd_player" id="cd_player2" value="No" <?php if($ocdplayer=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>CD Charger</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cd_charger" id="cd_charger1" value="Yes" <?php if($ocdcharger=="Yes") echo "checked"; ?>  />
												<label>Yes</label>
                                                <input type="radio" name="cd_charger" id="cd_charger2" value="No" <?php if($ocdcharger=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>DVD Player</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="dvd_player" id="dvd_player1" value="Yes" <?php if($odvdplayer=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="dvd_player" id="dvd_player2" value="No" <?php if($odvdplayer=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Radio</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="c_radio" id="c_radio1" value="Yes" <?php if($ocradio=="Yes") echo "checked"; ?>  />
												<label>Yes</label>
                                                <input type="radio" name="c_radio" id="c_radio2" value="No" <?php if($ocradio=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Audio System Remote Control</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="audio_sys_remote_c" id="audio_sys_remote_c1" value="Yes" <?php if($oasremote=="Yes") echo "checked"; ?>  />
												<label>Yes</label>
                                                <input type="radio" name="audio_sys_remote_c" id="audio_sys_remote_c2" value="No" <?php if($oasremote=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Speakers Front</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="speakers_f" id="speakers_f1" value="Yes" <?php if($osf=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="speakers_f" id="speakers_f2" value="No" <?php if($osf=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Speakers Rear</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="speakers_r" id="speakers_r1" value="Yes" <?php if($osr=="Yes") echo "checked"; ?>  />
												<label>Yes</label>
                                                <input type="radio" name="speakers_r" id="speakers_r2" value="No" <?php if($osr=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Integrated 2DIN Audio</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="integrated_audio" id="integrated_audio1" value="Yes" <?php if($oiaudio=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="integrated_audio" id="integrated_audio2" value="No" <?php if($oiaudio=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Bluetooth Connectivity</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="bluetooth_con" id="bluetooth_con1" value="Yes" <?php if($obcon=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="bluetooth_con" id="bluetooth_con2" value="No" <?php if($obcon=="No") echo "checked"; ?> />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>USB & Auxiliary Input</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="usb_input" id="usb_input1" value="Yes" <?php if($ouinput=="Yes") echo "checked"; ?> />
												<label>Yes</label>
                                                <input type="radio" name="usb_input" id="usb_input2" value="No <?php if($ouinput=="No") echo "checked"; ?>"  />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Touch Screen</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="touch_screen" id="touch_screen1" value="Yes" <?php if($ots=="Yes") echo "checked"; ?>  />
												<label>Yes</label>
                                                <input type="radio" name="touch_screen" id="touch_screen2" value="No" <?php if($ots=="No") echo "checked"; ?>  />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										
										
										
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Car Entertainment Info">
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