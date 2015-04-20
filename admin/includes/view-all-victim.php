<?php
if(isset($_SESSION['loggedin']))
{
	$result=$qgen->select("*","tbl_victim");
	if($db->countRows($result)>0){
		 echo "<div class='row'>";
                    echo "<div class='col-lg-12'>";
                        echo "<h2>Victim Table</h2>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-bordered table-hover' style='text-align: center'>";
                        echo  "<thead'>";
                        echo "<tr>";
                                        echo "<th style='text-align:center'>Victim Id</th>";
                                        echo "<th style='text-align:center'>First Name</th>";
                                        echo "<th style='text-align:center'>Crime Location</th>";
                                        echo "<th style='text-align:center'>Read Report</th>";
                                        echo "<th style='text-align:center'>Delete Report</th>";
                        echo "</tr>";;
                        echo "</thead>";
                        echo "<tbody>";

						while($arr=$db->fetchAssoc($result)){
						?>
                                    <tr>
                                        <td><?php echo $arr['victim_id']; ?></td>
                                        <td><?php echo $arr['victim_firstname']; ?></td>
                                        <td><?php echo $arr['victim_crimelocation']; ?></td>
                                        <td><a class="btn btn-primary" href="?do=read&id=<?php echo $arr['victim_id']; ?>">Read</a></td>
                                        <td><a class="btn btn-primary" href="actions/doDeleteVictim.php?id=<?php echo $arr['victim_id']; ?>">Delete</a></td>
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