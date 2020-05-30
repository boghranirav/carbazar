<?php  
	include("master1.php");

?>
<title>Used Cars In Your City</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />

<?php
	include("master2.php");
?>
	
<hr size="1" color="lightgrey">
<br>
<?php

	if(isset($_POST['submit'])){
	
		$cityid=$_POST['c_city1'];
		if($cityid!=0){
		
		header("location:used_car_in_city1.php?ucity=$cityid");
		}else{
			$err="<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>Select City</h3>";
		}
	}		

?>



<div class="wrap">
                	<h4 class="title">
					 Used Cars 	In your city	         </h4>
			
        
		<form method="post">
	 	    <table>
		      <tr>
		        <td>
		          <br>
		         <select style="height:36px;width:230px;font-size:16px" name="c_city1">
			        	<option value="0">--Select City--</option>
				       <?php
				           include("connection.php");
							$sql=mysql_query("select * from city1 order by cityname");
							while($row=mysql_fetch_array($sql)){
							$ctid=$row['city_id'];
							$city_name=$row['cityname'];
								?>
							<option value=<?php echo $ctid;?>><?php echo $city_name;?></option>
						
				       <?php
				           }
				        ?>
				
		            </select>
		         </td>
		        <td>
		           <br>
		            <button class="grey" id="reg" name="submit" >GO</button>
	        	</td>
		      </tr>
			  <tr>
			  
			  <td colspan="2">
			  <br>
			  <br>
			  <?php
                  if(isset($_POST['submit']))
                        {
	                        echo $err;
                            }
 
                    ?>
					<br>
			  </td>
			 </tr> 
		     </table>
		</form>
			
 
		
	
		
	
	
		<br><br><br>
	
				
				
    <div class="clear"></div>
   <div class="clear"></div>
</div>
	
		

 
<?php
	include("master3.php");
?>	