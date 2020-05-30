<?php
include("master.php");
?>
 <title>Display Photos</title>
<?php
include("master1.php");
?>

<link rel="stylesheet" href="assets/css/img1.css" />

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
			$(document).ready(function(){
				//alert("hello);
				$("#list_ver").hide();
				
				$("#b_id").change(function(){
					//alert("a");
					var id = $(this).val();	
					//alert(id);
					if(id == "0")
					{	
						$("#list_ver").hide();
					}
					else
					{
						//alert(id);
						$.ajax({
							url:"view_version_photo.php",
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
						$("#list_ver").hide();
						
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"view_version_photo.php",
							type:"post",
							data:{m_id:id1},
							success:function(result){
								//alert(result);
								$("#dis_version").html(result);
								$("#list_ver").show();
							}
						});
					}
				
				});
			
			});	
	</script>

  <h1>View Photos</h1>
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
					 		
						<div id="list_ver">
					
                            <div id="sortableTable" >
                    
<style type="text/css">
.stylish-button {
    color:#333;
    background-color:#FA2;
    border-radius:5px;
    border:none;
    width:45px;
	height:25px;
	font-size:16px;
    font-weight:700;
   
}
</style>
						<table id="dis_version" border="0%">
						
						</table>
						</div>
                        </div>
						<a href="photo_add.php" class="btn btn-primary btn-lg btn-flat">Add New Photos</a>	
					</form>

<?php
include("master2.php");
?>

