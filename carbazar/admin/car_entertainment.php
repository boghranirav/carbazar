<?php
include("page_master.php");
?>
<title>
Add Version Entertainment Info
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
	if(isset($_POST['submit']))
{
	$bid=$_POST['b_id'];
$mid=$_POST['m_id'];
$verid=$_POST['v_id'];
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
$sql1=mysql_query("insert into car_entertainment values($verid,'$csplayer','$cdplayer','$cdcharger',
                                                   '$dvdplayer','$cradio','$asremote','$sf',
                                                    '$sr','$iaudio','$bcon','$uinput','$ts')");

  if($sql1)
    {
       header("location:view_car.php");
	  }
	 
    else
     {
      $errmsg="Data not Added.";
    }
		}
}
	?>
	

                        <h1 class="page-header"> Add Version Entertainment Info</h1>
						<font color="red"><?php if(isset($_POST['submit'])) echo $errmsg ;?></font>
						<br>
						<form action="car_entertainment.php" method="post">
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
                                                <input type="radio" name="cassette_player" id="cassette_player1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="cassette_player" id="cassette_player2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>CD Player</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cd_player" id="cd_player1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="cd_player" id="cd_player2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>CD Charger</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="cd_charger" id="cd_charger1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="cd_charger" id="cd_charger2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>DVD Player</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="dvd_player" id="dvd_player1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="dvd_player" id="dvd_player2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Radio</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="c_radio" id="c_radio1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="c_radio" id="c_radio2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Audio System Remote Control</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="audio_sys_remote_c" id="audio_sys_remote_c1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="audio_sys_remote_c" id="audio_sys_remote_c2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Speakers Front</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="speakers_f" id="speakers_f1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="speakers_f" id="speakers_f2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Speakers Rear</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="speakers_r" id="speakers_r1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="speakers_r" id="speakers_r2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Integrated 2DIN Audio</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="integrated_audio" id="integrated_audio1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="integrated_audio" id="integrated_audio2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Bluetooth Connectivity</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="bluetooth_con" id="bluetooth_con1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="bluetooth_con" id="bluetooth_con2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>USB & Auxiliary Input</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="usb_input" id="usb_input1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="usb_input" id="usb_input2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										<tr>
											<td>Touch Screen</td>
											<td>
											<div class="form-group">
                                                <input type="radio" name="touch_screen" id="touch_screen1" value="Yes" checked="checked" />
												<label>Yes</label>
                                                <input type="radio" name="touch_screen" id="touch_screen2" value="No" />
												<label>No</label>
                                            </div>	
											</td>
										</tr>
										
										
										
										
								
									<td colspan="2">
									<center>
									<input type="submit" class="btn btn-primary" name="submit" value="Add Car Entertainment Info">
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