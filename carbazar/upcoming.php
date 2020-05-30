<?php
	include("master1.php");
?>
<title>Upcoming Cars</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />

<?php
	include("master2.php");
?>



	
<hr size="1" color="lightgrey">
<br>

<?php 
if(isset($_POST['upsearch']))
 {
   $bid=$_POST['b_id'];	
 }
?>


   <div class="wrap">
                	<h4 class="title">
					 Upcoming  Cars	in India		         </h4>
			
         <form action="" method="post">
			
		     <div style="width:1000px;height:100px;">
			    	<br>
				 <table>
       			     <tr>
	                     <td>
						 <br>
					       
					              <select name="b_id" id="b_id" class="tb" style="height:36px;margin-top:0.2cm;margin-left:1cm">
					                   <option value="0">--Select Brand--</option>
					                         <?php
		                            			   include("connection.php");
													$sql=mysql_query("select distinct car_company,cm.brand_id from car_make cm,car_model c,upcoming u where u.brand_id=cm.brand_id and c.brand_id=cm.brand_id");
													while($row=mysql_fetch_array($sql)){
														$brandid=$row['brand_id'];
														$car_com=$row['car_company'];
														?>
													<option value="<?php  echo  $brandid ;?>" <?php if(isset($_POST['upsearch'])){
														if($bid==$brandid) echo  "selected";
													      }?>><?php echo $car_com;?></option>
													<?php
													}
								              ?>
						          </select>
				        </td>
						<td>
						&nbsp;&nbsp;&nbsp;
						<br>
						</td>
						<td><br>
                                  <div class="button1">
                                         <input type="submit" value="SEARCH" name="upsearch">
                                      </div>
                         </td>

				     </tr>
		         </table>
			  <br>
		     </div> 
	     </form>			
        
				<br>
				<br>

			
			
		
				
				 
   
		
		 <?php
if(isset($_POST['upsearch']))
     {	 				 
       
		$bid=$_POST['b_id'];
	
		if(empty($bid))
		{
		
	echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>Select Brand</h3>";
		}
	
	else{
              include("connection.php");
			$sql3="select u.car_name,u.price,u.l_date,cma.car_company,u.car_id from upcoming u,car_model cm,car_make cma where u.brand_id='$bid' and u.car_id=cm.car_id and cma.brand_id=u.brand_id";
				 $res3=mysql_query($sql3);
				 
				 
				$resul=mysql_num_rows($res3);
				if($resul>0){
				 	echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>TOTAL $resul upcoming CARS MATCHING THIS CRITERIA</h3>";			 
				 while($row=mysql_fetch_array($res3)){
					 $carid=$row['car_id'];
					 echo "<div id='latest1' style='border: thin solid #4cb1ca;width:600px;height:210px;margin-left:30px'>";
					  echo "<table style='margin-left:0.5cm'>";
					  
					  echo "<tr>";
					  echo "<td colspan='3'>";
					 echo  "<font size='4' ><h4 style='font-weight: bold;font-size: 1em;margin-left:6cm'>".$row['car_company']."</h4>" ;
					 echo "</td>";
					 echo "</tr>";
					
					 echo "<tr>";
					 echo "<td rowspan='4'  width='230px'>";
					 echo "<br>";
					 $sqlp="select * from photos where car_id='$carid'";
					 $resp=mysql_query($sqlp);
					 $rowp=mysql_fetch_array($resp);
					 $imgsrc="admin/upload_car/image/".$rowp['name'];
					 echo "<img src='$imgsrc' style='width:150px;height:150px;vertical-align:middle;border:2px solid black;'>";
					 echo "</td>";
					 echo "</tr>";
					 
					 echo "<tr>";
					 
					 echo "<td  width='120px'>";
					  echo "<br>";
					 echo  "<font size='4'><h4 style='font-weight: bold;font-size: 1em;'>Car Name</h4>" ;
					 echo "</td>";
					 echo "<td>";
					  echo "<br>";
					 echo "<h4 style='font-weight: bold;font-size: 1em;'>".$row['car_name']."</h4></font>";
					 echo "</td>";
					 
					 echo "</tr>";
					 
					 echo "<tr>";
					 echo "<td >";
					  echo "<br>";
					 echo "Price";
					 echo "</td>";
					 echo "<td>";
					  echo "<br>";
					 echo $row['price'];
						echo "</td>";
					 echo "</tr>";
					 
					 echo "<tr>";
					 echo "<td>";
					  echo "<br>";
					 echo "Launch Date";
					  echo "</td>";
					 echo "<td>";
					  echo "<br>";
					 echo $row['l_date'];
					 echo "</td>";
					
					 echo "</tr>";
					 
					
					 
					 echo "</table>";
					 echo "</div>";
					 echo "<br>";
				   }
				}
				else
				{
					echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>TOTAL $resul LATEST CARS MATCHING THIS CRITERIA</h3>";
				}
			}
	   }
		else
		{
			include("connection.php");
			$sql3="select u.car_name,u.price,u.l_date,cma.car_company,u.car_id from upcoming u,car_model cm,car_make cma where u.car_id=cm.car_id and cma.brand_id=u.brand_id limit 0,5";
				 $res3=mysql_query($sql3);
				 
				 
				$resul=mysql_num_rows($res3);
				if($resul>0){
				 	echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>Upcoming Cars List</h3>";
				 while($row=mysql_fetch_array($res3)){
					 $carid=$row['car_id'];
					
					 echo "<div id='latest1' style='border: thin solid #4cb1ca;width:600px;height:210px;margin-left:30px'>";
					  echo "<table style='margin-left:0.5cm'>";
					  
					  echo "<tr>";
					  echo "<td colspan='3'>";
					 echo  "<font size='4' ><h4 style='font-weight: bold;font-size: 1em;margin-left:6cm'>".$row['car_company']."</h4>" ;
					 echo "</td>";
					 echo "</tr>";
					
					 echo "<tr>";
					 echo "<td rowspan='4' width='230px'>";
					 echo "<br>";
					 $sqlp="select * from photos where car_id='$carid'";
					 $resp=mysql_query($sqlp);
					 $rowp=mysql_fetch_array($resp);
					 $imgsrc="admin/upload_car/image/".$rowp['name'];
					 echo "<img src='$imgsrc' style='width:150px;height:150px;vertical-align:middle;border:2px solid black;'>";
					 echo "</td>";
					 echo "</tr>";
					 
					 echo "<tr>";
					 
					 echo "<td  width='120px'>";
					  echo "<br>";
					 echo  "<font size='4'><h4 style='font-weight: bold;font-size: 1em;'>Car Name :</h4>" ;
					 echo "</td>";
					 echo "<td>";
					  echo "<br>";
					 echo "<h4 style='font-weight: bold;font-size: 1em;'>".$row['car_name']."</h4></font>";
					 echo "</td>";
					 
					 echo "</tr>";
					 
					 echo "<tr>";
					 echo "<td >";
					  echo "<br>";
					 echo "Price :";
					 echo "</td>";
					 echo "<td>";
					  echo "<br>";
					 echo $row['price'];
						echo "</td>";
					 echo "</tr>";
					 
					 echo "<tr>";
					 echo "<td>";
					  echo "<br>";
					 echo "Launch Date :";
					  echo "</td>";
					 echo "<td>";
					  echo "<br>";
					 echo $row['l_date'];
					 echo "</td>";
					
					 echo "</tr>";
					 
					
					 
					 echo "</table>";
					 echo "</div>";
					 
					
					 echo "<br>";
				   }
				}
		}
	?>
		
		
		
		
		
		      <div class="clear"></div>

        <div class="clear"></div>
     </div>
	<br>
		
<br>
 
       <?php
	include("master3.php");
?>