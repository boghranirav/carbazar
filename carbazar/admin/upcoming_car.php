<?php
include("form_master.php");
?>
<title>
Add Version
</title>
<?php
include("form_master1.php");
?>
<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
			$(document).ready(function(){
				//alert("hello);
				
				$("#b_id").change(function(){
					//alert("a");
					var id = $(this).val();	
					//alert(id);
					if(id == "0")
					{	
					
					}
					else
					{
						//alert(id);
						$.ajax({
							url:"upcoming_ajex.php",
							type:"post",
							data:{b_id:id},
							success:function(result){
								//alert(result);
								$("#m_id").html(result);
								
							}
						});
					}
				
				});
			
			});	
	</script>
	
	<?php
	if(isset($_POST['submit'])){
		$bid=$_POST['b_id'];
		$mid=$_POST['m_id'];
		$vname=$_POST['vname'];
		
		$price=$_POST['vprice'];
		$ldate=$_POST['ldate'];
		
	
		
		if(($mid == 0) && ($vname == ""))
		{
			$errmsg="Invalid Data";
		}
		else
		{
		include("connection.php");
		
		$sql="insert into upcoming(car_id,brand_id,car_name,price,l_date) values($mid,$bid,'$vname','$price','$ldate')";
		$sql1=mysql_query($sql);
		
		if($sql1){
			$errmsg="";
			header("location:upcoming_view.php");
		}
		else{
			$errmsg="Data Not Added";
		}
		}
		
		
	}
	?>
	
	
                                    <h1 class="page-header"> Add Upcoming Car </h1>
			
			
			<form action="" method="post" id="select_version" name="select_version">
			
			<table width="70%" border="0" >
			<tr>
			<td> <label>Choose A Brand :</label>
			</td>
			<td>
			<div class="col-lg-10">
                                                <select name="b_id"  id="b_id" class="validate[required] form-control">
												    
                                                    <option value="0">--Select a Brand--</option>
                                                    <?php
													include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$bid=$row['brand_id'];
														$car_com=$row['car_company'];
													echo "<option value=$bid>".$car_com."</option>";
													}
													?>
													
                                                </select>
            </div>
			</td>
			<td width="20%">
			<?php
			if(isset($_POST['submit'])){
				echo $errmsg;
			}
			?>
			</td>
			</tr>
				<tr id="model">
				<td>
				<label>Choose A Model :</label>
				</td>
				<td>
				<div class="col-lg-10">
					<select name="m_id" id="m_id" class="validate[required] form-control">
												    
                                                    <option value="0">--Select a Model--</option>
                                                   
													
                                                </select>
								</div>
								
				</td>
				<td></td>
				</tr>
				
				<tr id="vname">
				<td>
				<label>Enter Car Name :</label>
				</td>
				<td>
				<div class="col-lg-10">
				<input class="form-control" placeholder="Enter Version Name" name="vname" >
				</div>
				</td>
				<td></td>
				</tr>
				
				
				<tr id="price">
				<td>
				<label>Price :</label>
				</td>
				<td>
				
				<div class="col-lg-10">
				<input class="form-control" placeholder="Enter Version Price" name="vprice" >
				</div>
				</td>
				<td></td>
				</tr>
				
				
				<tr id="date">
				<td>
				<label>Date :</label>
				</td>
				<td>
				
				<div class="col-lg-10">
				<input class="form-control" placeholder="Enter Launch Date" name="ldate" >
				</div>
				</td>
				<td></td>
				</tr>
				
				
				
				<tr id="subm">
				<td>
				</td>
				<td>
				&nbsp;&nbsp;&nbsp; 
					<input type="submit" class="btn btn-primary" name="submit" value="Add Version">
				</td>
				<td></td>
				<tr>
				
				
		</table>
</form>								
									
									
<?php
include("form_master2.php");
?>