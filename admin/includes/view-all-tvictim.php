<?php
if(isset($_SESSION['loggedin']))
{
	$result=$qgen->select("*","tbl_tvictim");
	if($db->countRows($result)>0){
		 echo "<div class='row'>";
                    echo "<div class='col-lg-12'>";
                        echo "<h2>Threatened Victim Table</h2>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-bordered table-hover' style='text-align: center'>";
                        echo  "<thead'>";
                        echo "<tr>";
                                        echo "<th style='text-align:center'>tvictim Id</th>";
                                        echo "<th style='text-align:center'>First Name</th>";
                                        echo "<th style='text-align:center'>Read Report</th>";
                                        echo "<th style='text-align:center'>Delete Report</th>";
                        echo "</tr>";;
                        echo "</thead>";
                        echo "<tbody>";

						while($arr=$db->fetchAssoc($result)){
						?>
                                    <tr>
                                        <td><?php echo $arr['tvictim_id']; ?></td>
                                        <td><?php echo $arr['tvictim_firstname']; ?></td>
                                        <td><a class="btn btn-primary" href="?do=read&id=<?php echo $arr['tvictim_id']; ?>">Read</a></td>
                                        <td><a class="btn btn-primary" href="actions/doDeleteTvictim.php?id=<?php echo $arr['tvictim_id']; ?>">Delete</a></td>
                                    </tr>
                         <?php
				
							}
							echo "</tbody>";
							echo "</table>";
                        echo "</div>";
                    echo "</div>";
    }
    else
	{
		echo "<br/><p style='font-family: Arial; font-size: 1.6em'>No record found</p>";
	}
	$db->closeConnection();
}
else
{
    header('Location: ../index.php');
}
?>