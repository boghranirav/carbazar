<?php
include("master.php");
?>
 <title>Brand List</title>
<?php
include("master1.php");
?>

           

                    <h1>Brand List</h1>
					<hr/>
					
					 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Brand Information
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Brand Id</th>
                                            <th>Brand Name</th>
                                          	<th>Edit</th>
											<th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
						include("connection.php");
	
    $sql="SELECT * FROM car_make";
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		
		?>
		
		
                                   
							
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['brand_id']; ?></td>
                                            <td><?php echo $row['car_company']; ?></td>   
											<?php
											$b=$row['brand_id'];
											echo "<td align='center'><a href='brand_edit.php?bid=$b'><img src='upload_car/images.jpg' alt='Edit' width='30px'></a></td>";
											echo "<td  align='center'><a href='brand_delete.php?bid=$b'><img src='upload_car/delete_edit.png' alt='Delete' width='30px'></a></td>";
											?>
                                        </tr>
							

		<?php
		}
        ?>

                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
					
				<a href="forms_general.php" class="btn btn-primary btn-lg btn-flat">Add New Brand</a>	
              
    
<?php
include("master2.php");
?>


