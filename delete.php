
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>delete</title>
<link rel="shortcut icon" href="../javascript/logo_in_title.ico"> 
</head>

<body>
//those query will be listed that have last response time less than a month and others are deleted
<?php
include_once("functions.php");
$con=connect_db();
$date=date("d/m/y");
$query="delete from grievance where `status`=1 and (`date`->";
if(!mysqli_query($con,$query))
{
	echo "not done";
}
mysqli_close($con);
?>
</body>
</html>