<?php
  if((!isset($_GET['ucarm'])) || (!isset($_GET['ucity']))){
		header("location:index.php");
	}
	include("master1.php");
?>
<title>Used Cars By Model</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />

<?php
	include("master2.php");
?>
<?php
$mid=$_GET['ucarm'];
$city=$_GET['ucity'];
?>
	
<hr size="1" color="lightgrey">
<br>




<div class="wrap">
                	<h4 class="title">
					 Used Cars By Model			         </h4>
			
        <br>
		
		
		
		
		
              <?php
			  $a=0;

 $num_rec=1;
include("connection.php");
if(isset($_GET['page'])){
	$page=$_GET["page"];
}
else
{
	$page=1;
}
			  
			  $start_from=($page-1)*$num_rec;
				 include("connection.php");
				 if($mid!=0 && $city!=0){
				 $sql="select *from car_sell cs,car_make cm,car_version cv,city1 ct where model='$mid' and city='$city' and cs.brand=cm.brand_id  and cs.version=cv.v_id and cs.city=ct.city_id LIMIT $start_from,$num_rec";
				 
				 }
				 else
					 if($mid==0 && $city>0){
						 $sql="select *from car_sell cs,car_make cm,car_version cv,city1 ct where city='$city' and cs.brand=cm.brand_id and   cs.version=cv.v_id and cs.city=ct.city_id LIMIT $start_from,$num_rec";
					 
					 }
					 else	
						 if($mid>0 && $city==0){
							 $sql="select *from car_sell cs,car_make cm,car_version cv,city1 ct where model='$mid' and cs.brand=cm.brand_id  and cs.version=cv.v_id and cs.city=ct.city_id LIMIT $start_from,$num_rec";
						
						 }
				 
				 $res=mysql_query($sql);
				 $result1=mysql_num_rows($res);
				 if($result1>0)
				 { 


						
					   echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>TOTAL $result1 USED CARS  FOUND </h3>";
								
				
				
				while($row=mysql_fetch_array($res))
				   {
					   $sid=$row['saler_id'];
					   $bname=$row['car_company'];
					  $cityname=$row['cityname'];
					   $vname=$row['version_name'];					   
					   $ftype=$row['fuel_type'];
					   $kmd=$row['km_driven'];
					   $price=$row['e_price'];
					   $mfyear=$row['mfg_year'];
					   $hidemo=$row['hide_mobile'];
					   $mo=$row['mobile'];
					   $email=$row['email_id'];
				
				 ?>
				  <div style="width:520px;border:2px solid black;">	
				     <table><?php
 	     				      $sqlp="select * from sell_car_photo  where saler_id='$sid'";
     		    			 $resp=mysql_query($sqlp);
		     				  $rowp=mysql_fetch_array($resp);
						      $imgsrc="admin/upload_car/sell/".$rowp['photo_src'];
                                ?>
					    
						<tr>
						    <td colspan="3" align="center"><font size="5"><b style="font-weight:bold;"><?php echo $bname;?></b></font></td>
                         </tr>  						 
						<tr> 
						   <td rowspan="4" width="200px"><br>
						        &nbsp;&nbsp;<img src="<?php echo $imgsrc;?>" height="140" width="150" style="border:2px solid black">
						    </td>
							
						    <td colspan="2" align="center"><br><font size="3"><b style="font-weight:bold;"><?php echo $vname;?></b></font></td>
							
						 </tr>
						 <tr>
						      <td>Fuel Type:</td>
							  <td><?php echo $ftype;?></td>
						 </tr>
						 <tr>
						      <td>KM Driven:</td>
						      <td><?php echo $kmd;?></td>
						 </tr>
						  <tr>
						      <td>Price:</td>
						      <td><?php echo $price;?></td>
						 </tr>
						 <tr>
						    <td>&nbsp;&nbsp;<?php echo  "<a href='usedcarpicture.php?spid=$sid'> View All Picture</a>";?></td>
							<td>MFG Year: </td>
							<td><?php echo $mfyear;?></td>
						 </tr>
						</table> 
						<br>
						 <table>
						 <tr>
						    <td>City:</td>
							<td colspan="2"><?php echo $cityname;?></td>

						</tr>
						<?php if($hidemo=="no"){?>
						  <tr> 
						    
						     <td width="50%">Seller Mobile No.:</td>
							 <td colspan="2"><?php echo $mo;?></td> 
							 							
						  </tr> 
						  <?php } ?>
						<tr>
						    <td>Seller Emailid:</td>
							<td colspan="2"><?php echo $email;?></td>

						</tr>
				     </table>
					 <br>
				  </div>	 
				 <?php 
				    }
				 
				 ?>
	
<style type="text/css">
.stylish-button {
    color:#333;
    background-color:#FA2;
    border-radius:5px;
    border:none;
    font-size:16px;
    font-weight:700;
    padding:4px 16px;
   
}
</style>
<br>
	
				 	<form action="used_car_by_model.php" method="post">
						<?php
						
				 if($mid!=0 && $city!=0){
				 $sql="select *from car_sell cs,car_make cm,car_model cmo,car_version cv,city1 ct where model='$mid' and city='$city' and cs.brand=cm.brand_id and cs.model=cmo.car_id and cs.version=cv.v_id and cs.city=ct.city_id";
				 }
				 else
					 if($mid==0 && $city>0){
						 $sql="select *from car_sell cs,car_make cm,car_model cmo,car_version cv,city1 ct where city='$city' and cs.brand=cm.brand_id and cs.model=cmo.car_id and cs.version=cv.v_id and cs.city=ct.city_id";
					 }
					 else	
						 if($mid>0 && $city==0){
							 $sql="select *from car_sell cs,car_make cm,car_model cmo,car_version cv,city1 ct where model='$mid' and cs.brand=cm.brand_id and cs.model=cmo.car_id and cs.version=cv.v_id and cs.city=ct.city_id";
						 }
						$res=mysql_query($sql);
						$tot_rec=mysql_num_rows($res);
						$tot_page=ceil($tot_rec/$num_rec);
						?>
								<?php echo "<a href=used_car_by_model.php?ucarm=$mid&ucity=$city&page=1' class='stylish-button'>First</a>";?>
								<?php
								$fi=0;
								if(isset($_GET['page'])){
											$fi=$_GET['page'];
											
										}
									for($i=1;$i<=$tot_page;$i++){
										
										if($fi!=$i){
												echo "<a href='used_car_by_model.php?ucarm=$mid&ucity=$city&page=".$i."' class='stylish-button' width='100px'>&nbsp;".  $i."&nbsp;</a>&nbsp;";
										}
										else
										{											
											echo "<a href='used_car_by_model.php?ucarm=$mid&ucity=$city&page=".$i."' class='stylish-button' style='background-color:grey'>".$i."</a>&nbsp;";
										}
									}
								?>
								<?php
									echo "<a href='used_car_by_model.php?ucarm=$mid&ucity=$city&page=".$tot_page."' class='stylish-button'>Last</a>";
								?>
								
							</form>
				 <?php
				 }else 
				 {
					  echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>TOTAL $result1 USED CARS  FOUND </h3>";
				 }
				 ?>
				
				
				
			
        		
			

				
			
		
				
				
<div class="clear"></div>

<div class="clear"></div>
		</div>
	<br><br>
		

 
<?php
	include("master3.php");
?>