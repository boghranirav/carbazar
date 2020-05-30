<?php
include("master.php");
?>
<title>
Model List
</title>
<?php
include("master1.php");
?>



                    <h1> Models List </h1>
					<hr/>
					
					
										
					
					<div class="box">
					<header>
                                <h5>Model Information</h5>
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                            <i class="icon-chevron-up"></i>                                        </a>                                    </div>
                                </div>
                            </header>
                            <div id="sortableTable" class="body collapse in">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>Car Id</th>
                                            <th>Brand Name</th>
                                            <th>Car Name</th>
											<th>Body Type</th>
											<th>Status</th>
                                          	<th>Edit</th>
											<th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

include("connection.php");
								
								$sql="SELECT * FROM car_model cm,car_make cma where cm.brand_id=cma.brand_id ";
 
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		
		?>
		
		
                                   
							
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['car_id']; ?></td>
                                            <td><?php echo $row['car_company']; ?></td>   
											<td><?php echo $row['car_name']; ?></td>   
											<td><?php echo $row['body_type']; ?></td> 
											<td><?php echo $row['status']; ?></td> 
											
											<?php
											$c=$row['car_id'];
											echo "<td align='center'><a href='carmodel_edit.php?cid=$c'><img src='upload_car/images.jpg' alt='Edit' width='25px'></a></td>";
											echo "<td align='center'><a href='carmodel_delete.php?cid=$c'><img src='upload_car/delete_edit.png' alt='Delete' width='25px'></a></td>";
											?>
                                        </tr>
							

		<?php
		}
		
        ?>             
                                    </tbody>
                                </table>
						
						
								</div>
                        </div>
					
					
				<a href="forms_advance.php" class="btn btn-primary btn-lg btn-flat">Add New Car Model</a>	
					
<?php
include("master2.php");
?>
