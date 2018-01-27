<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
include_once("functions.php");
	$con=connect_db();
$text=$_GET['text'];
$uniqid=$_GET['uniqid'];
$datetime=$_GET['datetime'];
$query="UPDATE grievance SET `reply`=\"$text\",`status`=\"1\",`datetime`=\"$datetime\" where `id`=\"$uniqid\"";
	if(!mysqli_query($con,$query))
	{
			echo "unable to save your response";
			die();	
    }
	else
		{
			echo "your response saved";
		}
?>