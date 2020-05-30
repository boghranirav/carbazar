<?php
				if((!isset($_GET['v'])) || ($_GET['v']==null)){
					header("location:on_road_price.php");
				}
				
	include("master1.php");
?>

<link href="button.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/c/rlinkbtn.css" rel="stylesheet" type="text/css" media="all" />


<title>On-road Price</title>
<?php
	include("master2.php");
?>



<hr color="lightgrey" size="1">
<br>

<div class="wrap">

<h4 class="title">    		  
On Road Price Quote
</h4>


<?php 

				$vid=$_GET['v'];
				
				if(isset($_POST['submit'])){
				$city3=$_POST['city'];
				
				include("connection.php");
				
				$sqlcity="select * from city1 where city_id=$city3";
				$rescity=mysql_query($sqlcity);
				$rowcity=mysql_fetch_array($rescity);
				$city=$rowcity['sid'];
				$cityname=$rowcity['cityname'];
				//$_GET['c'];
				
				
				
				$sql="select * from car_version where v_id='$vid'";
				$res=mysql_query($sql);
				if(mysql_num_rows($res)<=0){
					header("location:on_road_price.php");
				}
				
				$row=mysql_fetch_array($res);
				$mid=$row['car_id'];
				$v_name=$row['version_name'];
				$pri=$row['price'];
				$fuel=ucfirst($row['f_type']);
				
				$sqlp="select * from photos where car_id=$mid";
				$resp=mysql_query($sqlp);
				
				$rowp=mysql_fetch_array($resp);
				$imgsrc="admin/upload_car/image/".$rowp['name'];
				
				
				$sql2="select * from on_road_price where state_id='$city'";
				$res2=mysql_query($sql2);
				
				while($row2=mysql_fetch_array($res2))
				{
				$e_type=$row2['engine_type'];
				$rto=$row2['rto_tax'];
				$insur=$row2['insurance'];
				
				if($e_type==$fuel){
					$rate=($rto*$pri)/100;
					$ins=($insur*$pri)/100;
				}
				else
				{
					$rate=($rto*$pri)/100;
					$ins=($insur*$pri)/100;
				}
				}
				}
?>


<div class="main">
<br>
	<form action="#" method="post">
			<table>
			<tr>
			<td>
			<br><br>
			
			Select A City : 
			</td>
			<td>
			<br>&nbsp;&nbsp;&nbsp;
			<select name="city" id="city" style="height:38px;margin-top:6px;font-size:16px;width:230px">
					          <option value="0">--Select City--</option>
					            <?php
		                            			   include("connection.php");
													$sql=mysql_query("select * from city1 order by cityname");
													while($row=mysql_fetch_array($sql)){
														$cid=$row['city_id'];
														$cityn=$row['cityname'];
								?>						
													<option value="<?php echo $cid;?>" <?php if(isset($_POST['submit'])){if($city3==$cid) echo "selected";} ?>> <?php echo $cityn;?></option>;
													<?php
													}
													?>
							
			</select>
			</td>
			<td>
			<br>&nbsp;&nbsp;&nbsp;&nbsp;
			<div class="button1">
                <input type="submit" value="SEARCH" name="submit" >
		    </div>
			</td>
			</tr>
			</table>
	</form>
	<br>
	<?php 
		if(isset($_POST['submit'])){
	?>
				<div style="width:800px;height:400px;border:2px;border: 2px solid #4cb1ca;">
				<br>
				<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>
				<?php echo $v_name." In ".$cityname; ?>
				<hr>
				</h3>
				
				<div style="overflow:hidden;position:relative;width:70%;min-width:300px;margin-bottom:20px;margin-top:20px;margin-left:1cm;margin-right:auto;">
				<div style="float:right;">
				
				<table>
				
				<tr>
				<td width="180px">
				<b style="font-weight: bold;font-size:18px">
					Ex-Showroom Price 
				</b>
				</td>
				<td >
				<b style="font-weight: bold;font-size:18px">
				<?php echo $pri; ?>
				</b>
				</td>
				</tr>
				
				
				<tr>
				<td>
				
				<b style="font-weight: bold;font-size:18px">
				RTO 
				</b>
				</td>
				<td>
				
				<b style="font-weight: bold;font-size:18px">
				<?php 
					echo $rate;
					?>
				</b>
				</td>
				</tr>
				<tr>
				<td>
				
				<b style="font-weight: bold;font-size:18px">
				Insurance
				</b>
				</td>
				<td>
				
				<b style="font-weight: bold;font-size:18px">
				<?php
							echo $ins;
							?>
				</b>
				</td>
				</tr>
				<tr>
				<td colspan="2"><hr></td>
				</tr>
				<tr>
				<td>
				<b style="font-weight: bold;font-size:18px">
				On Road Price
				</b>
				</td>
				<td>
				<b style="font-weight: bold;font-size:20px">
				<?php
										echo $pri+$rate+$ins;	
									?>
				</b>
				</td>
				</tr>
				
				<td colspan="2" >
				<br>
				<br>
				<b style="font-weight: bold;font-size:18px">
					<?php 
					echo "<a href='overview.php?vid=$vid' class='abtn'>View Car Information</a>";
					?>
				</b>
				</td>
				
				</tr>
				
				</table>
				
				</div>
				<img src="<?php echo $imgsrc;?>" height="200" width="200" style=" margin-left: 1cm;width:220px;height:220px;vertical-align:middle;border:5px solid black;" >
				<br><br>
				
				</div>
				
				</div>
				<?php
		}
		?>
					
</div>

</div>
	<div class="clear"></div>		
<br>

<?php
	include("master3.php");
?>

