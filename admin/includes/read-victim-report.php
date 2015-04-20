<?php
if(isset($_SESSION['loggedin']))
{
	$result=$qgen->select("*","tbl_victim","victim_id=".$_GET['id']."");
	$row=$db->fetchAssoc($result);
	$userresult=$qgen->select("*","userlogin","user_id=".$row['user_id']."");
	$userrow=$db->fetchAssoc($userresult);
?>
<div class="row">
	<span class="label label-default" style="margin-left: 20px">Victim Report</span>
</div>
<div class="jumbotron">
	<p><span class="label" style="background-color: #34495e">Victim Id:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_id']; ?></p>
	<p><span class="label" style="background-color: #34495e">First Name:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_firstname']; ?></p>
	<p><span class="label" style="background-color: #34495e">Last Name:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_lastname']; ?></p>
	<p><span class="label" style="background-color: #34495e">Mobile Number:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_mobilenumber']; ?></p>
	<p><span class="label" style="background-color: #34495e">Permanent Address:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_permanentaddress']; ?></p>
	<p><span class="label" style="background-color: #34495e">Victim District:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_district']; ?></p>
	<p><span class="label" style="background-color: #34495e">Crime Location:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_crimelocation']; ?></p>
	<p><span class="label" style="background-color: #34495e">Crime District:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_crimedistrict']; ?></p>
	<p><span class="label" style="background-color: #34495e">Crime Date:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_crimedate']; ?></p>
	<p><span class="label" style="background-color: #34495e">Crime Time:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_crimetime']; ?></p>
	<p><span class="label" style="background-color: #34495e">Crime Description:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_crimedescription']; ?></p>
	<p><span class="label" style="background-color: #34495e">Criminal Name:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_criminalname']; ?></p>
	<p><span class="label" style="background-color: #34495e">Crime Address:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_criminaladdress']; ?></p>
	<p><span class="label" style="background-color: #34495e">Criminal Mobile Number</span>&nbsp;&nbsp;&nbsp; <?php echo $row['victim_criminalmobilenumber']; ?></p>
	<p><span class="label" style="background-color: #34495e">User Id:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['user_id']; ?></p>
	<p><span class="label" style="background-color: #34495e">User Email:</span>&nbsp;&nbsp;&nbsp; <?php echo $userrow['user_email']; ?></p>
	<form method="post" action="actions/doMailAndUpdate.php">
		<input type="hidden" name="victimid" value="<?php echo $_GET['id'];?>" />
		<input type="hidden" name="useremail" value="<?php echo $userrow['user_email'];?>" />
		<p><span class="label" style="background-color: #1BBC9B">Select Status</span></p>
		<select class="form-control" name="victimreportstatus">
			  <option value="Read" <?php if(isset($_GET['do']) and $_GET['do']=="read" and $row['victim_reportstatus']=="Read")
				{echo "selected='selected'";}?>>Read</option>
			  <option value="Ignore"<?php if(isset($_GET['do']) and $_GET['do']=="read" and $row['victim_reportstatus']=="Ignore")
				{echo "selected='selected'";}?>>Ignore</option>
		</select>
		<p><span class="label" style="background-color: #1BBC9B">Enter a message for the user</span></p>
		<textarea class="form-control" name="message"></textarea>
		<input style="margin-top: 20px"type="submit" name="victimsubmit" class="btn btn-success" value="Mail and Update" />
	</form>

</div>
<?php
}
else
{
    header('Location: ../index.php');
}
?>