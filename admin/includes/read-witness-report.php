<?php
if(isset($_SESSION['loggedin']))
{
	$result=$qgen->select("*","tbl_witness","witness_id=".$_GET['id']."");
	$row=$db->fetchAssoc($result);
	$userresult=$qgen->select("*","userlogin","user_id=".$row['user_id']."");
	$userrow=$db->fetchAssoc($userresult);
?>
<div class="row">
	<span class="label label-default" style="margin-left: 20px">witness Report</span>
</div>
<div class="jumbotron">
	<p><span class="label" style="background-color: #34495e">Witness Id:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_id']; ?></p>
	<p><span class="label" style="background-color: #34495e">First Name:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_firstname']; ?></p>
	<p><span class="label" style="background-color: #34495e">Last Name:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_lastname']; ?></p>
	<p><span class="label" style="background-color: #34495e">Mobile Number:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_mobilenumber']; ?></p>
	<p><span class="label" style="background-color: #34495e">Permanent Address:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_permanentaddress']; ?></p>
	<p><span class="label" style="background-color: #34495e">Witness District:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_district']; ?></p>
	<p><span class="label" style="background-color: #34495e">Crime Location:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_crimelocation']; ?></p>
	<p><span class="label" style="background-color: #34495e">Crime District:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_crimedistrict']; ?></p>
	<p><span class="label" style="background-color: #34495e">Crime Date:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_crimedate']; ?></p>
	<p><span class="label" style="background-color: #34495e">Crime Time:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_crimetime']; ?></p>
	<p><span class="label" style="background-color: #34495e">Crime Description:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_crimedescription']; ?></p>
	<p><span class="label" style="background-color: #34495e">Victim Name:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_victimname']; ?></p>
	<p><span class="label" style="background-color: #34495e">Victim Address:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_victimaddress']; ?></p>
	<p><span class="label" style="background-color: #34495e">Victim Mobile Number</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_victimcontact']; ?></p>
	<p><span class="label" style="background-color: #34495e">Criminal Name:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_criminalname']; ?></p>
	<p><span class="label" style="background-color: #34495e">Criminal Address:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_criminaladdress']; ?></p>
	<p><span class="label" style="background-color: #34495e">Criminal Mobile Number</span>&nbsp;&nbsp;&nbsp; <?php echo $row['witness_criminalcontact']; ?></p>
	<p><span class="label" style="background-color: #34495e">User Id:</span>&nbsp;&nbsp;&nbsp; <?php echo $row['user_id']; ?></p>
	<p><span class="label" style="background-color: #34495e">User Email:</span>&nbsp;&nbsp;&nbsp; <?php echo $userrow['user_email']; ?></p>
	<form method="post" action="actions/doMailAndUpdateWitness.php">
		<input type="hidden" name="witnessid" value="<?php echo $_GET['id'];?>" />
		<input type="hidden" name="useremail" value="<?php echo $userrow['user_email'];?>" />
		<p><span class="label" style="background-color: #1BBC9B">Select Status</span></p>
		<select class="form-control" name="witnessreportstatus">
			  <option value="Read" <?php if(isset($_GET['do']) and $_GET['do']=="read" and $row['witness_reportstatus']=="Read")
				{echo "selected='selected'";}?>>Read</option>
			  <option value="Ignore"<?php if(isset($_GET['do']) and $_GET['do']=="read" and $row['witness_reportstatus']=="Ignore")
				{echo "selected='selected'";}?>>Ignore</option>
		</select>
		<p><span class="label" style="background-color: #1BBC9B">Enter a message for the user</span></p>
		<textarea class="form-control" name="message"></textarea>
		<input style="margin-top: 20px"type="submit" name="witnesssubmit" class="btn btn-success" value="Mail and Update" />
	</form>

</div>
<?php
}
else
{
    header('Location: ../index.php');
}
?>