<?php
	include("master.php");
?>
<title>User Info</title>
<?php
	include("user_master1.php");
?>


<h1>User Information</h1>
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
                                            <th>First Name</th>
											<th>Last Name</th>
											<th>Email Id</th>
											<th>Phone No</th>	
											<th>Delete</th>
										</tr>
                                    </thead>
                                    <tbody>


                                 <?php
						include("connection.php");
	
    $sql="SELECT * FROM user_login";
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		
		?>
	                               
							
                                        <tr class="odd gradeX">
                                          
                                            <td><?php echo $row['fname']; ?></td>   
											<td><?php echo $row['lname']; ?></td>
											<td><?php echo $row['email']; ?></td>
												
											<td><?php echo $row['phone_no']; ?></td>
											<?php $id=$row['uid']; ?>
											<?php
											
											echo "<td><a href='user_delete.php?uid=$id'>Delete</a></td>";
											?>
											
                                        </tr>
							

		<?php
		}
        ?>             
                                    </tbody>
                                </table>
                            </div>
                        </div>


 
<?php
	include("user_master2.php");
?>