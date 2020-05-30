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
			$trans2=$row2['transmission'];
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
				echo "<a href='overview.php?vid=$vid' id='popUpYes'  style='background-color:white'>Overview</a>&nbsp;";
				echo "<a href='specification.php?vid=$vid' id='popUpYes'>Specifications</a>&nbsp;";
				echo "<a href='features.php?vid=$vid' id='popUpYes'>Features</a>&nbsp;";
				echo "<a href='dimensions.php?vid=$vid'  id='popUpYes'>Dimensions</a>&nbsp;";
				echo "<a href='version_review.php?vid=$vid'  id='popUpYes'>Reviews</a>&nbsp;";
				?>
				<br>
				<br>
				
				<?php
					$sqlfuel="select * from  car_fuel where v_id=$vid";
					$resfuel=mysql_query($sqlfuel);
					$rowfuel=mysql_fetch_array($resfuel);
					
										  $mc=$rowfuel['mileage_city'];
					                      $mh=$rowfuel['mileage_highway'];
					                      $ft=$rowfuel['fuel_type'];
										  
					$sqleng="select * from car_engine where v_id=$vid";
					$reseng=mysql_query($sqleng);
					$roweng=mysql_fetch_array($reseng);
										
					                      $engdis=$roweng['engine_displacement'];
					                      $maxpower=$roweng['maximum_power'];
										  
					$sqlother="select *from car_other_spec where v_id=$vid";
					$resother=mysql_query($sqlother);
				    $rowother=mysql_fetch_array($resother);
					                   
					  
					                      $seatcapacity=$rowother['seating_capacity'];
					                     
										  
				?>
				<table class="CSSTableGenerator1" style="border:1px solid black;margin-left:0.5cm">
					<tr>
						<td colspan="2">Overview</td>
					</tr>
					
					<tr>
						<td width="50%">Mileage City</td>
						<td><?php echo $mc;?></td>
					</tr>
					
					<tr>
						<td>Mileage Highway</td>
						<td><?php echo $mh;?></td>
					</tr>
					
					<tr>
						<td>Engine cc</td>
						<td><?php echo $engdis;?></td>
					</tr>
					
					<tr>
						<td>Bhp</td>
						<td><?php echo $maxpower;?></td>
					</tr>
					
					<tr>
						<td>Seat</td>
						<td><?php echo $seatcapacity;?></td>
					</tr>
					
					<tr>
						<td>Fuel Type</td>
						<td><?php echo $ft;?></td>
					</tr>
					
					<tr>
						<td>Transmission Type</td>
						<td><?php echo ucfirst($trans2);?></td>
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
	