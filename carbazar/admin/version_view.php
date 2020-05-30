<?php
include("master.php");
?>
<title>
Version List
</title>
<?php
include("master1.php");
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
							url:"view_version.php",
							type:"post",
							data:{b_id:id},
							success:function(result){
								//alert(result);
								$("#m_id").html(result);
			
							}
						});
					}
				
				});
				
					$("#m_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_version.php",
							type:"post",
							data:{m_id:id1},
							success:function(result){
								//alert(result);
								$("#dis_version").html(result);
			
							}
						});
					}
				
				});
			
			});	
	</script>


                    <h1>Version List </h1>
					<hr/>
					
					<form action="notification.php" method="get">
					<table width="60%">
					<tr>
					<td>					
                                            <label class="control-label col-lg-8">Select Brand To Display</label>
					</td>
					<td>
					                        <div class="col-lg-10">
                                                <select name="b_id" id="b_id" class="validate[required] form-control" length="10">
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
					</tr>						
					<tr id="model">
						<td>
											<label class="control-label col-lg-8">Select Model To Display</label>
						</td>
						<td>
					                        <div class="col-lg-10">
                                                <select name="m_id" id="m_id" class="validate[required] form-control" length="10">
                                                    <option value="0">--Select a Model--</option>
                                                   
                                                </select>
                                            </div>
						</td>
					</tr>
                    </table>
					 		
							<div class="box" id="list_ver">
					<header>
                                <h5>Version Information</h5>
                               
                            </header>
                            <div id="sortableTable" class="body collapse in">
                    
						<table id="dis_version" class="table table-striped table-bordered table-hover">
						<tr id="head" >
						<th width='10%'>Version Id</th>
						<th width='25%'>Version Name</th>
						<th width='10%'>Fuel Type</th>
						<th width='10%'>Price</th>
						<th width='10%'>Engine</th>
						<th width='10%'>Mileage</th>
						<th width='10%'>Transmission</th>
						<th width='8%'>Edit</th>
						<th width='8%'>Delete</th>
						</tr>
						
						<tr>
							<td colspan="9" align="center">Please Select Brand And Model.</td>
						</tr>
						
						</table>
						</div>
                        </div>
						<a href="forms_validation.php" class="btn btn-primary btn-lg btn-flat">Add New Car Version</a>	
					</form>
					
    <?php
include("master2.php");
?>
