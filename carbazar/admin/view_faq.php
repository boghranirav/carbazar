<?php
	include("master.php");
?>
<?php
include("faq_master.php");
?>


<h1>View FAQ's</h1>
<hr/>

                        <div class="box">
                            <header>
                                <h5>View FAQ's</h5>
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
											<th>ID</th>
                                            <th>Question</th>
                                            <th>Answer</th>
											<th>Visibility(Hidden)</th>
											<th>Edit</th>
											<th>Delete</th>
											
										</tr>
                                    </thead>
                                    <tbody>


                                 <?php
						include("connection.php");
	
    $sql="SELECT * FROM faqs";
	$res=mysql_query($sql);
	 while($row=mysql_fetch_array($res))
    {
		
		?>
		
		
                                   
							
                                        <tr class="odd gradeX">
											<td width="4%"><?php echo $row['faq_id']; ?></td>
                                            <td width="30%"><?php echo $row['question']; ?></td>
                                            <td width="38%"><?php echo $row['answer']; ?></td>   
											<td width="14%"><?php echo ucfirst($row['visible']); ?></td>
											<?php $fid=$row['faq_id'];
											echo "<td width='7%'><a href='faq_edit.php?faqid=$fid'>Edit</a></td>";
											echo "<td width='7%'><a href='faq_delete.php?faqid=$fid'>Delete</a></td>";
											?>
                                        </tr>
							

		<?php
		}
        ?>             
                                    </tbody>
                                </table>
                            </div>
                        </div>
						
						<a href="add_faq.php" class="btn btn-primary" style="width:7.8cm">Add New FAQ</a>




<?php
include("master2.php");
?>