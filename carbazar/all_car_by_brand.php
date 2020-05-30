<?php
	if(!isset($_GET['bid'])){
		header("location:index.php");
	}
	include("master1.php");
?>

<link href="css/c/table3.css" rel="stylesheet" type="text/css" media="all" />
<?php
		$bid=$_GET['bid'];
		
			include("connection.php");
			$sql1="select * from car_make where brand_id=$bid";
			$res1=mysql_query($sql1);
			$row1=mysql_fetch_array($res1);
			
			
	?>
<title><?php echo $row1['car_company']; ?></title>

	

<?php
	include("master2.php");
?>
	
	
	
<div class="mens">    
  <div class="main">
     <div class="wrap">
	 
     	<ul class="breadcrumb breadcrumb__t" style="height:38px"><font size="6cm"><?php echo $row1['car_company']." Versions List"; ?></font></ul>
		        
			  <div>
					<br>
					
						
						<?php
								include("connection.php");
								$sqlb="select * from car_model where brand_id='$bid' and status='launched'";
								$resb=mysql_query($sqlb);
								if(mysql_num_rows($resb)<=0){
									header("location:index.php");
								}
								
								while($rowb=mysql_fetch_array($resb)){
									$cid=$rowb['car_id'];
									$cname=$rowb['car_name'];
									$status=$rowb['status'];
									$btype=$rowb['body_type'];
									
									$sql_v="select max(price)as max, min(price)as min from car_version where car_id=$cid";
									$res_v=mysql_query($sql_v);
									$row_v=mysql_fetch_array($res_v);
									$maxp=$row_v['max'];
									$minp=$row_v['min'];
									
									$sqlv1="select engine,mileage from car_version where car_id=$cid";
									$resv1=mysql_query($sqlv1);
									$rowv1=mysql_fetch_array($resv1);
									$eng=$rowv1['engine'];
									$mil=$rowv1['mileage'];
									
									$sqlp="select * from photos where car_id=$cid";
									$resp=mysql_query($sqlp);
									$rowp=mysql_fetch_array($resp);
									$imgsrc=$rowp['name'];
									
									if($minp==$maxp){
										$price2=$minp;
									}else
									{
									$price2=$minp."-".$maxp;
									}
									
									echo "<div style='width:800px;height:200px;border:2px;border: 2px solid #4cb1ca;'>";
										echo "<center><font size='4cm'><b style='font-weight: bold;'>".$row1['car_company']." ".$cname."</b></font></center>";
										echo "<div style='margin-left:1cm;float:left;margin-top:0.4cm'>";
											echo "<img src='admin/upload_car/image/".$imgsrc."' height='150px' width='190px'>";
										echo "</div>";
										echo "<div style='margin-left:1cm;float:left;margin-top:0.4cm' >";
										echo "<table>";
											echo "<tr>";
											echo "<td width='100px'><b style='font-weight: bold;'>Price : </b></td><td width='200px'><b style='font-weight: bold;'>".$price2."</b></td>";
											echo "<td width='100px'><b style='font-weight: bold;'>Status : </b></td><td><b style='font-weight: bold;'>".ucfirst($status)."</b></td>";
											echo "</tr>";
											
											echo "<tr>";
											echo "<td><br></td><td><br></td>";
											echo "</tr>";
											
											echo "<tr>";
											echo "<td><b style='font-weight: bold;'>Body Type : </b></td><td><b style='font-weight: bold;'>".ucfirst($btype)."</b></td>";
											echo "<td></td>";
											echo "</tr>";
											
											echo "<tr>";
											echo "<td><br></td><td><br></td>";
											echo "</tr>";
											
											echo "<tr>";
											echo "<td width='100px'><b style='font-weight: bold;'>Mileage : </b></td><td width='200px'><b style='font-weight: bold;'>".$mil."</b></td>";
											echo "<td width='100px'><b style='font-weight: bold;'>Engine : </b></td><td><b style='font-weight: bold;'>".$eng."</b></td>";
											echo "</tr>";
											
											echo "<tr>";
											echo "<td><br></td><td><br></td>";
											echo "</tr>";
											
											echo "<tr>";
											echo "<td colspan='2'><a href='new_car_by_brand.php?carb=$bid&carm=$cid'>View All Versions</a></td>";
											
											echo "</tr>";
										echo "</table>";
										echo "</div>";
									echo "</div>";
										
									
									echo "</br>";
								}
						?>
					
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