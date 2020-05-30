
<?php
include("master.php");
?>
 <title>Admin Information</title>
<?php
include("master1.php");
?>

<h1>Admin</h1>
<hr/>

                        <div class="box">
                            <header>
                                <h5>Admin Information</h5>
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
                                            <th>Id</th>
                                            <th>User Name</th>
                                            <th>First Name</th>
											<th>Last Name</th>
											<th>Email Id</th>
											
										</tr>
                                    </thead>
                                    <tbody>


                                 <?php
						include("connection.php");
	
    $sql="SELECT * FROM login";
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		
		?>
		
		
                                   
							
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['userid']; ?></td>   
											<td><?php echo $row['firstname']; ?></td>
											<td><?php echo $row['lastname']; ?></td>
											<td><?php echo $row['email_id']; ?></td>
											
                                        </tr>
							

		<?php
		}
        ?>             
                                    </tbody>
                                </table>
                            </div>
                        </div>



<?php
include("master2.php");
?>
