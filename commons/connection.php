<?php
	require("configsettings.php");
	require("ConfigClass.php");
	require("DataAccess.php");
	require("QGen.php");
	$config=new Config(HOSTNAME,USERNAME,PASSWORD,DATABASE);
	$db=new DataAccess($config);
	$qgen=new QGen($db);

?>