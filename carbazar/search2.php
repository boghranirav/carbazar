<?php
	include("master1.php");
?>

<link href="css/c/table.css" rel="stylesheet" type="text/css" media="all" />


<title>New Car</title>

<?php
	include("master2.php");
?>

<script>
function showstar(star)
	{
		document.frm.submit();
	}
	</script>

<div class="mens">    
  <div class="main">
     <div class="wrap">
	 
	 <h4 class="title">    		  
			New Car
	</h4>
     	
		<div class="cont span_2_of_3">
		  
		        
			   <div class="clear"></div>	
	    <div class="clients">
	   <div style="margin-left:1cm;">
		<table class="CSSTableGenerator">
			<tr>
				<td width="150px">Photo</td>
				<td width="200px">Model Name</td>
				<td  width="200px">Ex-Showroom Price</td>
			</tr>
			<?php
			$tot=0;
			
			if(isset($_GET['bud'])){
				
				$budid=$_GET['bud'];
				if($budid>=1){
				include("connection.php");
				if($budid==1){
				$sql="select car_id,version_name,price from car_version where price<500000";
				}
				else
					if($budid==2)
					{
							$sql="select car_id,version_name,price from car_version where price between 500000 and 1000000";
					}
					else
						if($budid==3){
							$sql="select car_id,version_name,price from car_version where price between 1000000 and  2000000";
						}
						else
							if($budid==4){
								$sql="select car_id,version_name,price from car_version where price between 2000000 and 5000000";
							}
							else
								if($budid==5){
									$sql="select car_id,version_name,price from car_version where price between 5000000 and  10000000";
								}
								else
									if($budid==6){
										$sql="select car_id,version_name,price from car_version where price>10000000 ";
									}
			//	$sql="select * from car_version where price<300000";
				$res=mysql_query($sql);
				$tot=mysql_num_rows($res);
				/*$i=0;
				
				while($row=mysql_fetch_array($res)){
					$i=$i+1;
					$p[$i]=$row['price'];
					$carid=$row['car_id'];
				}
				echo $p[1];
				echo $p[$tot];
				echo $carid;
				*/
				//$sql2="select distinct cv.car_id,p.name,cm.car_name,cv.price from car_version cv,photos p,car_model cm where cv.price<'300000' and cv.car_id=p.car_id and cm.car_id=cv.car_id and p.car_id=cm.car_id";
				while($row=mysql_fetch_array($res)){
					echo "<tr>";
					echo "<td>";
					$cidi=$row['car_id'];
						$sqli="select * from photos where car_id=$cidi";
						$resi=mysql_query($sqli);
						$rowi=mysql_fetch_array($resi);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br>".$row['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row['price']."</font></td>";
					echo "</tr>";
				}
				}
			}
			else
	
				{
					$b1="null";
					$b2="null";
					$b3="null";
					$b4="null";
					$b5="null";
					$b6="null";
					
					$brand1="null";
					$brand2="null";
					$brand3="null";
					$brand4="null";
					$brand5="null";
					$brand6="null";
					$brand7="null";
					$brand8="null";
					$brand9="null";
					$brand10="null";
					$brand11="null";
					$brand12="null";
					$brand13="null";
					$brand14="null";
					$brand15="null";
					$brand16="null";
					$brand17="null";
					$brand18="null";
					$brand19="null";
					$brand20="null";
					$brand21="null";
					$brand22="null";
					$brand23="null";
					$brand24="null";
					$brand25="null";
					$brand26="null";
					$brand27="null";
					$brand28="null";
					$brand29="null";
					
					$brand_fual1="null";
					$brand_fual2="null";
					$brand_fual3="null";
					
					$brand_t1="null";
					$brand_t2="null";
					
				
					if(isset($_POST['checkbox1'])){
					$b1=$_POST['checkbox1'];
					}
					if(isset($_POST['checkbox2'])){
					$b2=$_POST['checkbox2'];
					}
					if(isset($_POST['checkbox3'])){
					$b3=$_POST['checkbox3'];
					}
					if(isset($_POST['checkbox4'])){
					$b4=$_POST['checkbox4'];
					}
					if(isset($_POST['checkbox5'])){
					$b5=$_POST['checkbox5'];
					}
					if(isset($_POST['checkbox6'])){
					$b6=$_POST['checkbox6'];
					}
					
					
				if(isset($_POST['checkboxb1']))
				$brand1=$_POST['checkboxb1'];
				
				if(isset($_POST['checkboxb2']))
					$brand2=$_POST['checkboxb2'];
					
				if(isset($_POST['checkboxb3']))
					$brand3=$_POST['checkboxb3'];
					
				if(isset($_POST['checkboxb4']))
					$brand4=$_POST['checkboxb4'];
				
				if(isset($_POST['checkboxb5']))						
					$brand5=$_POST['checkboxb5'];
				
				if(isset($_POST['checkboxb6']))
					$brand6=$_POST['checkboxb6'];
					
				if(isset($_POST['checkboxb7']))
					$brand7=$_POST['checkboxb7'];
				
				if(isset($_POST['checkboxb8']))
					$brand8=$_POST['checkboxb8'];
					
				if(isset($_POST['checkboxb9']))
					$brand9=$_POST['checkboxb9'];
					
				if(isset($_POST['checkboxb10']))
					$brand10=$_POST['checkboxb10'];
					
				if(isset($_POST['checkboxb11']))
					$brand11=$_POST['checkboxb11'];
					
				if(isset($_POST['checkboxb12']))
					$brand12=$_POST['checkboxb12'];
					
				if(isset($_POST['checkboxb13']))
					$brand13=$_POST['checkboxb13'];
					
				if(isset($_POST['checkboxb14']))
					$brand14=$_POST['checkboxb14'];
					
				if(isset($_POST['checkboxb15']))
					$brand15=$_POST['checkboxb15'];
					
				if(isset($_POST['checkboxb16']))
					$brand16=$_POST['checkboxb16'];
					
				if(isset($_POST['checkboxb17']))
					$brand17=$_POST['checkboxb17'];
					
				if(isset($_POST['checkboxb18']))
					$brand18=$_POST['checkboxb18'];
					
				if(isset($_POST['checkboxb19']))
					$brand19=$_POST['checkboxb19'];
					
				if(isset($_POST['checkboxb20']))
					$brand20=$_POST['checkboxb20'];
					
				if(isset($_POST['checkboxb21']))
					$brand21=$_POST['checkboxb21'];
					
				if(isset($_POST['checkboxb22']))
					$brand22=$_POST['checkboxb22'];
					
				if(isset($_POST['checkboxb23']))
					$brand23=$_POST['checkboxb23'];
					
				if(isset($_POST['checkboxb24']))
					$brand24=$_POST['checkboxb24'];
					
				if(isset($_POST['checkboxb25']))
					$brand25=$_POST['checkboxb25'];
					
				if(isset($_POST['checkboxb26']))
					$brand26=$_POST['checkboxb26'];
					
				if(isset($_POST['checkboxb27']))
					$brand27=$_POST['checkboxb27'];
					
				if(isset($_POST['checkboxb28']))
					$brand28=$_POST['checkboxb28'];
					
				if(isset($_POST['checkboxb29'])) 
					$brand29=$_POST['checkboxb29'];
				
				
				if(isset($_POST['checkboxf1'])) 
					$brand_fual1=$_POST['checkboxf1'];
				
				if(isset($_POST['checkboxf2'])) 
					$brand_fual2=$_POST['checkboxf2'];
				
				if(isset($_POST['checkboxf3'])) 
					$brand_fual3=$_POST['checkboxf3'];
				
				
				
				if(isset($_POST['checkboxt1'])) 
					$brand_t1=$_POST['checkboxt1'];
					
				if(isset($_POST['checkboxt2'])) 
					$brand_t2=$_POST['checkboxt2'];
					
					/*Budget Brand Fuel*/
					
					if(((isset($_POST['checkbox1'])) || (isset($_POST['checkbox2'])) || (isset($_POST['checkbox3'])) || (isset($_POST['checkbox4'])) || (isset($_POST['checkbox5'])) || (isset($_POST['checkbox6']))) && ((isset($_POST['checkboxb1'])) || (isset($_POST['checkboxb2'])) || (isset($_POST['checkboxb3'])) || (isset($_POST['checkboxb4'])) || (isset($_POST['checkboxb5'])) || (isset($_POST['checkboxb6'])) || (isset($_POST['checkboxb7'])) || (isset($_POST['checkboxb8'])) || (isset($_POST['checkboxb9']))  || (isset($_POST['checkboxb10']))  || (isset($_POST['checkboxb11']))  || (isset($_POST['checkboxb12']))  || (isset($_POST['checkboxb13']))  || (isset($_POST['checkboxb14']))  || (isset($_POST['checkboxb15']))  || (isset($_POST['checkboxb16']))  || (isset($_POST['checkboxb17']))  || (isset($_POST['checkboxb18']))  || (isset($_POST['checkboxb19']))  || (isset($_POST['checkboxb20']))  || (isset($_POST['checkboxb21']))  || (isset($_POST['checkboxb22']))  || (isset($_POST['checkboxb23']))  || (isset($_POST['checkboxb24']))  || (isset($_POST['checkboxb25']))  || (isset($_POST['checkboxb26']))  || (isset($_POST['checkboxb27']))  || (isset($_POST['checkboxb28']))  || (isset($_POST['checkboxb29']))) && ((isset($_POST['checkboxf1'])) || (isset($_POST['checkboxf2'])) || (isset($_POST['checkboxf3']))))
					{
							if($b1==1){
					
					include("connection.php");
					$sql1="select * from car_version where price<500000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) and f_type in('$brand_fual1','$brand_fual2','$brand_fual3')  order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b2==2){
						include("connection.php");
					$sql1="select * from car_version where price between 500000 and 1000000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) and f_type in('$brand_fual1','$brand_fual2','$brand_fual3') order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b3==3){
						include("connection.php");
					$sql1="select * from car_version where price between 1000000 and 2000000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) and f_type in('$brand_fual1','$brand_fual2','$brand_fual3') order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b4==4){
						include("connection.php");
					$sql1="select * from car_version where price between 2000000 and 2500000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) and f_type in('$brand_fual1','$brand_fual2','$brand_fual3') order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b5==5){
						include("connection.php");
					$sql1="select * from car_version where price between 5000000 and 10000000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) and f_type in('$brand_fual1','$brand_fual2','$brand_fual3') order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b6==6){
						include("connection.php");
					$sql1="select * from car_version where price>10000000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand1	3,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) and f_type in('$brand_fual1','$brand_fual2','$brand_fual3') order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>".$row1['price']."</font></td>";
					echo "</tr>";
						}
					}
					}
					else
						/* Brand Fuel*/
					if(((isset($_POST['checkboxb1'])) || (isset($_POST['checkboxb2'])) || (isset($_POST['checkboxb3'])) || (isset($_POST['checkboxb4'])) || (isset($_POST['checkboxb5'])) || (isset($_POST['checkboxb6'])) || (isset($_POST['checkboxb7'])) || (isset($_POST['checkboxb8'])) || (isset($_POST['checkboxb9']))  || (isset($_POST['checkboxb10']))  || (isset($_POST['checkboxb11']))  || (isset($_POST['checkboxb12']))  || (isset($_POST['checkboxb13']))  || (isset($_POST['checkboxb14']))  || (isset($_POST['checkboxb15']))  || (isset($_POST['checkboxb16']))  || (isset($_POST['checkboxb17']))  || (isset($_POST['checkboxb18']))  || (isset($_POST['checkboxb19']))  || (isset($_POST['checkboxb20']))  || (isset($_POST['checkboxb21']))  || (isset($_POST['checkboxb22']))  || (isset($_POST['checkboxb23']))  || (isset($_POST['checkboxb24']))  || (isset($_POST['checkboxb25']))  || (isset($_POST['checkboxb26']))  || (isset($_POST['checkboxb27']))  || (isset($_POST['checkboxb28']))  || (isset($_POST['checkboxb29']))) && ((isset($_POST['checkboxf1'])) || (isset($_POST['checkboxf2'])) || (isset($_POST['checkboxf3']))))
					{
							
					
					include("connection.php");
					$sql1="select * from car_version where brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) and f_type in('$brand_fual1','$brand_fual2','$brand_fual3')  order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					
					

					
					
					
					}
					else
						/*Budget Fuel*/
					if(((isset($_POST['checkbox1'])) || (isset($_POST['checkbox2'])) || (isset($_POST['checkbox3'])) || (isset($_POST['checkbox4'])) || (isset($_POST['checkbox5'])) || (isset($_POST['checkbox6']))) && ((isset($_POST['checkboxf1'])) || (isset($_POST['checkboxf2'])) || (isset($_POST['checkboxf3']))))
					{
							if($b1==1){
					
					include("connection.php");
					$sql1="select * from car_version where price<500000 and f_type in('$brand_fual1','$brand_fual2','$brand_fual3')  order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b2==2){
						include("connection.php");
					$sql1="select * from car_version where price between 500000 and 1000000 and f_type in('$brand_fual1','$brand_fual2','$brand_fual3') order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b3==3){
						include("connection.php");
					$sql1="select * from car_version where price between 1000000 and 2000000 and f_type in('$brand_fual1','$brand_fual2','$brand_fual3') order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b4==4){
						include("connection.php");
					$sql1="select * from car_version where price between 2000000 and 2500000 and f_type in('$brand_fual1','$brand_fual2','$brand_fual3') order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b5==5){
						include("connection.php");
					$sql1="select * from car_version where price between 5000000 and 10000000 and f_type in('$brand_fual1','$brand_fual2','$brand_fual3') order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b6==6){
						include("connection.php");
					$sql1="select * from car_version where price>10000000 and f_type in('$brand_fual1','$brand_fual2','$brand_fual3') order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>".$row1['price']."</font></td>";
					echo "</tr>";
						}
					}
					}
					else
						/*Budget Brand*/
					if(((isset($_POST['checkbox1'])) || (isset($_POST['checkbox2'])) || (isset($_POST['checkbox3'])) || (isset($_POST['checkbox4'])) || (isset($_POST['checkbox5'])) || (isset($_POST['checkbox6']))) && ((isset($_POST['checkboxb1'])) || (isset($_POST['checkboxb2'])) || (isset($_POST['checkboxb3'])) || (isset($_POST['checkboxb4'])) || (isset($_POST['checkboxb5'])) || (isset($_POST['checkboxb6'])) || (isset($_POST['checkboxb7'])) || (isset($_POST['checkboxb8'])) || (isset($_POST['checkboxb9']))  || (isset($_POST['checkboxb10']))  || (isset($_POST['checkboxb11']))  || (isset($_POST['checkboxb12']))  || (isset($_POST['checkboxb13']))  || (isset($_POST['checkboxb14']))  || (isset($_POST['checkboxb15']))  || (isset($_POST['checkboxb16']))  || (isset($_POST['checkboxb17']))  || (isset($_POST['checkboxb18']))  || (isset($_POST['checkboxb19']))  || (isset($_POST['checkboxb20']))  || (isset($_POST['checkboxb21']))  || (isset($_POST['checkboxb22']))  || (isset($_POST['checkboxb23']))  || (isset($_POST['checkboxb24']))  || (isset($_POST['checkboxb25']))  || (isset($_POST['checkboxb26']))  || (isset($_POST['checkboxb27']))  || (isset($_POST['checkboxb28']))  || (isset($_POST['checkboxb29']))))
					{
							if($b1==1){
					
					include("connection.php");
					$sql1="select * from car_version where price<500000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b2==2){
						include("connection.php");
					$sql1="select * from car_version where price between 500000 and 1000000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b3==3){
						include("connection.php");
					$sql1="select * from car_version where price between 1000000 and 2000000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b4==4){
						include("connection.php");
					$sql1="select * from car_version where price between 2000000 and 2500000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b5==5){
						include("connection.php");
					$sql1="select * from car_version where price between 5000000 and 10000000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b6==6){
						include("connection.php");
					$sql1="select * from car_version where price>10000000 and brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand1	3,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) order by brand_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>".$row1['price']."</font></td>";
					echo "</tr>";
						}
					}
					}
					else
					
					if((isset($_POST['checkbox1'])) || (isset($_POST['checkbox2'])) || (isset($_POST['checkbox3'])) || (isset($_POST['checkbox4'])) || (isset($_POST['checkbox5'])) || (isset($_POST['checkbox6']))){
					if($b1==1){
					
					include("connection.php");
					$sql1="select * from car_version where price<500000";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b2==2){
						include("connection.php");
					$sql1="select distinct cv.car_id,cv.version_name,cm.car_name,cv.price from car_version cv,car_model cm where cv.price between 500000 and 1000000 and cm.car_id=cv.car_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b3==3){
						include("connection.php");
					$sql1="select distinct cv.car_id,cv.version_name,cm.car_name,cv.price from car_version cv,car_model cm where cv.price between 1000000 and 2000000 and cm.car_id=cv.car_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b4==4){
						include("connection.php");
					$sql1="select distinct cv.car_id,cv.version_name,cm.car_name,cv.price from car_version cv,car_model cm where cv.price between 2000000 and 2500000 and cm.car_id=cv.car_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>Rs. ".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b5==5){
						include("connection.php");
					$sql1="select distinct cv.car_id,cv.version_name,cm.car_name,cv.price from car_version cv,car_model cm where cv.price between 5000000 and 10000000 and cm.car_id=cv.car_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>".$row1['price']."</font></td>";
					echo "</tr>";
				}
					}
					
					if($b6==6){
						include("connection.php");
					$sql1="select distinct cv.car_id,cv.version_name,cm.car_name,cv.price from car_version cv,car_model cm where cv.price>10000000 and cm.car_id=cv.car_id";
					
					
					$res1=mysql_query($sql1);
					$tot=$tot+mysql_num_rows($res1);
					
					
					while($row1=mysql_fetch_array($res1)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$row1['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$row1['version_name']."</font></td>";
					echo "<td > <font size='4'>".$row1['price']."</font></td>";
					echo "</tr>";
						}
					}
					}
					else
				
				if((isset($_POST['checkboxb1'])) || (isset($_POST['checkboxb2'])) || (isset($_POST['checkboxb3'])) || (isset($_POST['checkboxb4'])) || (isset($_POST['checkboxb5'])) || (isset($_POST['checkboxb6'])) || (isset($_POST['checkboxb7'])) || (isset($_POST['checkboxb8'])) || (isset($_POST['checkboxb9']))  || (isset($_POST['checkboxb10']))  || (isset($_POST['checkboxb11']))  || (isset($_POST['checkboxb12']))  || (isset($_POST['checkboxb13']))  || (isset($_POST['checkboxb14']))  || (isset($_POST['checkboxb15']))  || (isset($_POST['checkboxb16']))  || (isset($_POST['checkboxb17']))  || (isset($_POST['checkboxb18']))  || (isset($_POST['checkboxb19']))  || (isset($_POST['checkboxb20']))  || (isset($_POST['checkboxb21']))  || (isset($_POST['checkboxb22']))  || (isset($_POST['checkboxb23']))  || (isset($_POST['checkboxb24']))  || (isset($_POST['checkboxb25']))  || (isset($_POST['checkboxb26']))  || (isset($_POST['checkboxb27']))  || (isset($_POST['checkboxb28']))  || (isset($_POST['checkboxb29'])) )
				{
					
					include("connection.php");
					$sqlbrand="select * from car_version where brand_id in($brand1,$brand2,$brand3,$brand4,$brand5,$brand6,$brand7,$brand8,$brand9,$brand10,$brand11,$brand12,$brand13,$brand14,$brand15,$brand16,$brand17,$brand18,$brand19,$brand20,$brand21,$brand22,$brand23,$brand24,$brand25,$brand26,$brand27,$brand28) order by brand_id";	
					
					$resbrand=mysql_query($sqlbrand);
					$tot=$tot+mysql_num_rows($resbrand);
					
					
					
					while($rowbrand=mysql_fetch_array($resbrand)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$rowbrand['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$rowbrand['version_name']."</font></td>";
					echo "<td > <font size='4'>".$rowbrand['price']."</font></td>";
					echo "</tr>";
					}
					
				}
					else
						if((isset($_POST['checkboxf1'])) || (isset($_POST['checkboxf2'])) || (isset($_POST['checkboxf3']))){
					
					include("connection.php");
					$sqlbrandfuel="select * from car_version where f_type in('$brand_fual1','$brand_fual2','$brand_fual3') order by brand_id";	
					
					$resbrandfuel=mysql_query($sqlbrandfuel);
					$tot=$tot+mysql_num_rows($resbrandfuel);
					
					
					
					while($rowbrandfuel=mysql_fetch_array($resbrandfuel)){
					echo "<tr>";
					echo "<td>";
					$cidi1=$rowbrandfuel['car_id'];
						$sqli1="select * from photos where car_id=$cidi1";
						$resi1=mysql_query($sqli1);
						$rowi1=mysql_fetch_array($resi1);
						
						$sqlbn="select cv.car_id,cv.brand_id,cm.car_company from car_make cm,car_version cv where cm.brand_id=cv.brand_id and cv.car_id=$cidi1";
						$resbn=mysql_query($sqlbn);
						$rowbn=mysql_fetch_array($resbn);
						
					echo "<img src='admin/upload_car/image/".$rowi1['name']."' height='150px' width='150px'>";
					echo "</td>";
					echo "<td  ><font size='4'><b style='font-size:22px;color:blue;'>".$rowbn['car_company']."</b><br> ".$rowbrandfuel['version_name']."</font></td>";
					echo "<td > <font size='4'>".$rowbrandfuel['price']."</font></td>";
					echo "</tr>";
					}
						}
				
				}
			
					if($tot==0){
				echo "<tr>";
					echo "<td colspan='3'><font size='4'>";
					echo "No Record Found.";
					echo "</font></td>";
				echo "<tr>";
					}
			?>	
		</table>
</div>
		
	
		
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
     </div>
    
     
      </div>
	  
	  <form method="post"  name="frm" action="search2.php">
			<div class="rsingle span_1_of_single" style="width:6.5cm">
					<section  class="sky-form">
					<br>
					<h4>By Budget</h4>
						<div class="row row1 scroll-pane">
						
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox1" id="checkbox1" value="1"
								<?php if(isset($_POST['checkbox1'])) echo "checked"; ?> onChange="showstar(this.value);">
								<i></i>1 Lac - 5 Lac</label>
								<label class="checkbox"><input type="checkbox" name="checkbox2" id="checkbox2" value="2"
								<?php if(isset($_POST['checkbox2'])) echo "checked";?> onChange="showstar(this.value);"><i></i>5 Lac - 10 Lac</label>
								<label class="checkbox"><input type="checkbox" name="checkbox3" id="checkbox3" value="3" onChange="showstar(this.value);"
								<?php if(isset($_POST['checkbox3'])) echo "checked"; ?>><i></i>10 Lac - 20 Lac</label>
								<label class="checkbox"><input type="checkbox" name="checkbox4" id="checkbox4" value="4"
								<?php if(isset($_POST['checkbox4'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>20 Lac - 50 Lac</label>
								<label class="checkbox"><input type="checkbox" name="checkbox5" id="checkbox5" value="5"
								<?php if(isset($_POST['checkbox5'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>50 Lac - 1 Crore</label>
								<label class="checkbox"><input type="checkbox" name="checkbox6" id="checkbox6" value="6"
								<?php if(isset($_POST['checkbox6'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Above 1 Crore</label>
							
							</div>
						</div>
		        </section>
		       <section  class="sky-form">
					<h4>Select Brand</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkboxb1" value="37" 
									<?php if(isset($_POST['checkboxb1'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Ashok Leyland</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb2" value="35" 
									<?php if(isset($_POST['checkboxb2'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Aston Martin</label>
									<label class="checkbox" ><input type="checkbox" name="checkboxb3" value="12" 
									<?php if(isset($_POST['checkboxb3'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Audi</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb4" value="24" 
									<?php if(isset($_POST['checkboxb4'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Bentley</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb5" value="14" 
									<?php if(isset($_POST['checkboxb5'])) echo "checked";?> onChange="showstar(this.value);"><i></i>BMW</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb6" value="9" 
									<?php if(isset($_POST['checkboxb6'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Chevrolet</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb7" value="15" 
									<?php if(isset($_POST['checkboxb7'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Datsun</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb8" value="20" 
									<?php if(isset($_POST['checkboxb8'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Ferrari</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb9" value="18"
									<?php if(isset($_POST['checkboxb9'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Fiat</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb10" value="28" 
									<?php if(isset($_POST['checkboxb10'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Force Motors</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb11" value="8" 
									<?php if(isset($_POST['checkboxb11'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Ford</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb12" value="4" 
									<?php if(isset($_POST['checkboxb12'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Honda</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb13" value="2" 
									<?php if(isset($_POST['checkboxb13'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Hyundai</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb14" value="19" 
									<?php if(isset($_POST['checkboxb14'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Jaguar</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb15" value="32" 
									<?php if(isset($_POST['checkboxb15'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Lamborghini</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb16" value="21" 
									<?php if(isset($_POST['checkboxb16'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Land Rover</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb17" value="6" 
									<?php if(isset($_POST['checkboxb17'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Mahindra</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb18" value="1" onChange="showstar(this.value);"
									<?php if(isset($_POST['checkboxb18'])) echo "checked"; ?>><i></i>Maruti Suzuki</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb19" value="17" 
									<?php if(isset($_POST['checkboxb19'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Mercedes-Benz</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb20" value="34" 
									<?php if(isset($_POST['checkboxb20'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Mini</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb21" value="13" 
									<?php if(isset($_POST['checkboxb21'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Nissan</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb22" value="23" 
									<?php if(isset($_POST['checkboxb22'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Porsche</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb23" value="10" 
									<?php if(isset($_POST['checkboxb23'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Renault</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb24" value="22" 
									<?php if(isset($_POST['checkboxb24'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Rolls-Royce</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb25" value="16" 
									<?php if(isset($_POST['checkboxb25'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Skoda</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb26" value="7" 
									<?php if(isset($_POST['checkboxb26'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Tata</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb27" value="5" 
									<?php if(isset($_POST['checkboxb27'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Toyota</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb28" value="11" 
									<?php if(isset($_POST['checkboxb28'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Volkswagen</label>
									<label class="checkbox"><input type="checkbox" name="checkboxb29" value="39" 
									<?php if(isset($_POST['checkboxb29'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>Volvo</label>
									
									
							</div>
						</div>
		       </section>
		       <section  class="sky-form">
					<h4>Vehicle Type</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
							    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Hatchback</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sedan</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>SUV</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Van/Minivan</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>MUV</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Luxury</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Coupe</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Hybrid</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Convertible</label>
												
						    </div>
						</div>
		       </section>
		       <section  class="sky-form">
					<h4>Fuel Type</h4>
						<div class="row" style="margin-left: 0.5cm;">
							
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkboxf1" value="petrol" 
								<?php if(isset($_POST['checkboxf1'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Petrol</label>
								<label class="checkbox"><input type="checkbox" name="checkboxf2" value="diesel" 
								<?php if(isset($_POST['checkboxf2'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Diesel</label>
								<label class="checkbox"><input type="checkbox" name="checkboxf3" value="CNG" 
								<?php if(isset($_POST['checkboxf3'])) echo "checked"; ?> onChange="showstar(this.value);"><i></i>CNG</label>
								
							</div>
						</div>
		       </section>
			    <section  class="sky-form">
					<h4>Transmission</h4>
						<div class="row">
							
							<div class="col col-2">
								<label class="checkbox"><input type="checkbox" name="checkboxt1" value="automatic"
								<?php if(isset($_POST['checkboxt1'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Automatic</label>
								<label class="checkbox"><input type="checkbox" name="checkboxt2" value="manual" 
								<?php if(isset($_POST['checkboxt2'])) echo "checked";?> onChange="showstar(this.value);"><i></i>Manual</label>
								
							</div>
						</div>
		       </section>
			    <section  class="sky-form">
					<h4>Seating Capacity</h4>
						<div class="row">
							
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Up to 5</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>6</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>7</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>8</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>9 an Above</label>
								
							</div>
						</div>
		       </section>
		      <hr>
			  <section  class="sky-form">
			  <div class="row">
				<div class="col col-4">
			  <button class="grey" id="reg" name="submit_search" style=" margin-left: 0cm;width:6.5cm">Search</button>
				</div>
			  </div>
			  </section>
			  <hr>
			  
		       <script src="js/jquery.easydropdown.js"></script>
		      </div>
		</form>
		      <div class="clear"></div>
			</div>
			 <div class="clear"></div>
		   </div>
		</div>

		
<?php
	include("master3.php");
?>
