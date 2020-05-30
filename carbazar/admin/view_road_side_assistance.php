<?php
include("master.php");
?>
<title>
Model List
</title>
<?php
include("master1.php");
?>



                    <h1> Road Side Assistance </h1>
					<hr/>
					
					
										
					
					<div class="box">
					<header>
                                <h5>Road Side Assistance Number</h5>
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
											
                                            <th>Brand Id</th>
                                            <th>Assistance Number</th>
                                          	<th>Edit</th>
											<th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

include("connection.php");
								$sql="SELECT * FROM road_side_assistance r,car_make c where c.brand_id=r.brand_id";
 
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		
		?>
		
		
                                   
							
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['car_company']; ?></td>
                                            <td><?php echo $row['assist_number']; ?></td>   
											
											<?php
											$c=$row['assisi_id'];
											echo "<td align='center'><a href='road_side_assistance_edit.php?cid=$c'><img src='upload_car/images.jpg' alt='Edit' width='25px'></a></td>";
											echo "<td align='center'><a href='road_side_assistance_delete.php?cid=$c'><img src='upload_car/delete_edit.png' alt='Delete' width='25px'></a></td>";
											?>
                                        </tr>
							

		<?php
		}
		
        ?>             
                                    </tbody>
                                </table>
								</div>
								</div>
								
						
						
						
								
					
					
				<a href="road_side_assistance.php" class="btn btn-primary btn-lg btn-flat">Add Number</a>
				
					
<?php
include("master2.php");
?>
