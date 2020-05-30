<?php
	if((!isset($_GET['carb'])) || (!isset($_GET['carm']))){
		header("location:index.php");
	}
	include("master1.php");
?>

<link href="css/c/table2.css" rel="stylesheet" type="text/css" media="all" />
<script src="sliderengine/jquery.js"></script>
    <script src="sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
    <script src="sliderengine/initslider-1.js"></script>

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
	include("masterr2.php");
?>
	
	
	
<div class="mens">    
  <div class="main">
     <div class="wrap">
     	<ul class="breadcrumb breadcrumb__t"><?php echo $row1['car_company']." ".$row2['car_name']; ?></ul>
		
		   <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:900px;margin:0px auto 108px;">
        <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
            <ul class="amazingslider-slides" style="display:none;">
              <?php
												$sqlp="select * from photos where car_id=$cid";
												$resp=mysql_query($sqlp);
												$i=0;
												while($rowp=mysql_fetch_array($resp)){
													$i=$i+1;
											?>
												<li><img src="<?php echo "admin/upload_car/image/".$rowp['name'];?>" alt=""></li>
											<?php
											}
												
											?>
            </ul>
            <ul class="amazingslider-thumbnails" style="display:none;">
                
				<?php
												$sqlp="select * from photos where car_id=$cid";
												$resp=mysql_query($sqlp);
												$i=0;
												while($rowp=mysql_fetch_array($resp)){
													$i=$i+1;
											?>
												<li><img src="<?php echo "admin/upload_car/image/".$rowp['name']; ?>"></li>
											<?php
											}
												
									?>
            </ul>
        <div class="amazingslider-engine"><a href="http://amazingslider.com" title="Image Slider jQuery">Image Slider jQuery</a></div>
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
      
			
			
		      <div class="clear"></div>
			</div>
			 <div class="clear"></div>
		   </div>
		</div>
		
	
<?php
	include("master3.php");
?>