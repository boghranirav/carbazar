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
				echo "<a href='features.php?vid=$vid' id='popUpYes' >Features</a>&nbsp;";
				echo "<a href='dimensions.php?vid=$vid'  id='popUpYes' style='background-color:white'>Dimensions</a>&nbsp;";
				echo "<a href='version_review.php?vid=$vid'  id='popUpYes'>Reviews</a>&nbsp;";
				?>
				<br>
				<br>
				<table style="border:1px solid black;margin-left:0.5cm" class="CSSTableGenerator1">
                     <?php
					 include("connection.php");
					             $sql=mysql_query("select *from car_exterior_dimension where v_id='$vid'");
				                	$row=mysql_fetch_array($sql);
					                         $c_length=$row["length"];
		                                     $c_width=$row["wiidth"];
                                     		 $c_height=$row["height"];
                                     		 $ground_clearance=$row["ground_clearance"];
                                     		 $wheel_base=$row["wheel_base"];
                                     		 $front_tread=$row["front_tread"];
                                     		 $rear_tread=$row["rear_tread"];
		                                     $kerb_weight=$row["kerb_weight"];
                                     		 $gross_weight=$row["gross_weight"];
					                    
					           
					 ?>
				      <tr>
					    <td colspan="2" align="center">EXTERIOR DIMENSIONS</td>
					  </tr>
					    <tr >
			                    <td width="50%">Length</td><td><?php echo $c_length;?></td>
					         </tr>  
					         <tr>	  
					            <td>Width</td><td><?php echo $c_width;?></td>
                            </tr>
                            <tr>					 
						       <td>Height</td><td><?php echo $c_height;?></td>
                            </tr>
                            <tr>					  
						       <td>Ground Clearance</td><td><?php echo $ground_clearance;?></td>
						    </tr>
							
                            <tr>					  
						       <td>Wheel Base</td><td><?php echo $wheel_base;?></td>
						    </tr>
						    <tr>					  
						       <td>Front Tread</td><td><?php echo $front_tread;?></td>
						    </tr>
							<tr>					  
						       <td>Rear Tread</td><td><?php echo $rear_tread;?></td>
						    </tr>
						    <tr>					  
						       <td>Kerb Weight</td><td><?php echo $kerb_weight;?></td>
						    </tr>
							<tr>					  
						       <td>Gross Weight</td><td><?php echo $gross_weight;?></td>
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
		