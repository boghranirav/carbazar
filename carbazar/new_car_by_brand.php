<?php
	if((!isset($_GET['carb'])) || (!isset($_GET['carm']))){
		header("location:index.php");
	}
	include("master1.php");
?>

<link href="css/c/table2.css" rel="stylesheet" type="text/css" media="all" />


<?php
		$bid=$_GET['carb'];
		$cid=$_GET['carm'];
			include("connection.php");
			$sql1="select * from car_make where brand_id=$bid";
			$res1=mysql_query($sql1);
			$row1=mysql_fetch_array($res1);
			
			$sql2="select * from car_model where car_id=$cid";
			$res2=mysql_query($sql2);
			$row2=mysql_fetch_array($res2);
	?>
<title><?php echo $row1['car_company']." ".$row2['car_name']; ?></title>

	

<?php
	include("master2.php");
?>
	
	
	
<div class="mens">    
  <div class="main">
     <div class="wrap">
     	<ul class="breadcrumb breadcrumb__t"><?php echo $row1['car_company']." ".$row2['car_name']; ?></ul>
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
						<div id="container">
							<div id="products_example">
								<div id="products">
									<div class="slides_container">
											<?php
												$sqlp="select * from photos where car_id=$cid limit 0,1";
												$resp=mysql_query($sqlp);
												$i=0;
												while($rowp=mysql_fetch_array($resp)){
													$i=$i+1;
											?>
												<a href="#"><img class="a" id="<?php echo "img".$i;?>" src="<?php echo "admin/upload_car/image/".$rowp['name'];?>" alt="" rel="<?php echo "admin/upload_car/image/".$rowp['name']; ?>" height="300px" width="420px"/></a>
											<?php
											}
												
											?>
									       
									</div>
									<ul class="pagination">
									<?php
												$sqlp="select * from photos where car_id=$cid";
												$resp=mysql_query($sqlp);
												$i=0;
												while($rowp=mysql_fetch_array($resp)){
													$i=$i+1;
											?>
												<li><a href="<?php echo "admin/upload_car/image/".$rowp['name']; ?>"><img src="<?php echo "admin/upload_car/image/".$rowp['name']; ?>" width="100px" height="82px" alt="1144953 3 2x"></a></li>
											<?php
											}
												
									?>
										<div class="clear"></div>
									</ul>
								</div>
							</div>
						</div>
	            </div>
		         <div class="desc1 span_3_of_2">
		         	<h3 class="m_3"><?php echo $row1['car_company']." ".$row2['car_name']; ?>	</h3>
					<?php
						include("connection.php");
						$sql3="select min(price)as min,max(price)as max from car_version where car_id=$cid";
						$res3=mysql_query($sql3);
						$row3=mysql_fetch_array($res3);
					?>
		             <p class="m_5"><?php 
					 if($row3['min'] == $row3['max']){
						 echo "Rs. ".$row3['min'];
					 }
					 else
					 {
					 echo "Rs. ".$row3['min']." - Rs.".$row3['max']; 
					 }
					 ?></p>
		         	
					 
					 
			     </div>
			   <div class="clear"></div>	
	    
				<div>
					<br>
					<table  class="CSSTableGenerator">
						<tr>
							<td>Version</td>
							<td>Fuel Type</td>
							<td>Transmission</td>
							<td>Mileage</td>
							<td>Ex-Showroom Price</td>
						</tr>
						
						<?php
								include("connection.php");
								$sqlv="select v_id,car_id,version_name,upper(f_type)as f_type,upper(transmission)as transmission,mileage,price from car_version where car_id=$cid";
								$resv=mysql_query($sqlv);
								while($rowv=mysql_fetch_array($resv)){
									$vid=$rowv['v_id'];
									echo "<tr>";
										echo "<td width='330px'><a href='overview.php?vid=$vid'><font size='3'><u>".$rowv['version_name']."</u></font></a></td>";
										echo "<td width='100px'><font size='3'>".$rowv['f_type']."</font></td>";
										echo "<td  width='130px'><font size='3'>".$rowv['transmission']."</font></td>";
										echo "<td  width='110px'><font size='3'>".$rowv['mileage']."</font></td>";
										echo "<td width='160px'><font size='3'>".$rowv['price']."</font></td>";
									echo "</tr>";
								}
						?>
					</table>
				</div>
     <div class="clear"></div>	
      </div>
			
		      <div class="clear"></div>
			</div>
			 <div class="clear"></div>
		   </div>
		</div>
	
<?php
	include("master3.php");
?>