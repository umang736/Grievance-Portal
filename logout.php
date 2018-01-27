<html>
<head>
<link rel="shortcut icon" href="../javascript/logo_in_title.ico">
<link rel="stylesheet" type="text/css" href="main.css" />
<style>
b
{
	color:#0F0;
}
p
{
	color:#3FF;
}
</style>
</head>
<body>
<a href="index.php"><img id="i2" src="mnnit.gif" /></a>
<div id="header"></div>
<p id="p1">MNNIT</p>
<p id="p2">GRIEVANCE PORTAL</p>
<?php
	session_start();
	session_destroy();
	echo "<br/><br/><br/><br/><br/><b><center>"."You have been logged out"."</b><br>";
echo "<p>click here to</p> "."<a href=\"index.php\"><img src=\"login.gif\" ></a></center>";
	//session_unset can be used for resetting a perticuler variable e.g. session_unset($_SESSION['id']); will remove only 'id' index of session other will remain intact but sesssion_destroy will clear all session variables
	//session_unset($_SESSION['id']);
?>
</body>
</html>