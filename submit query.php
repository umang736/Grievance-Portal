<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="logo_in_title.ico"> 
<style type="text/css">
div{position:fixed; left:1100px;}
#log{position:relative; left:1250px; color:
#600;}
#code{color:#0FF; font-size:36px;}
</style>
<title>submit query</title>
<script>
function func(){
window.location.href='logout.php';
}
</script>
</head>
<body>
<?php
include_once('functions.php');
function randomPassword() 
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
session_start();
echo "<div>Logged in user:<b>".$_SESSION['user']."</b></div>";
echo "<input type=\"button\" id=\"log\" value=\"Logout\" width=\"100px\" onclick=\"func()\"/>";
	$con=connect_db();
	$text=fix($_POST['text']);
	$regno=$_SESSION['regno'];
	$qualification=$_SESSION['qualification'];
$id=randomPassword();
$query="SELECT * FROM grievance where `id`=\"$id\"";
$res=mysqli_query($con,$query);	
if(!$res)
{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Unable to connect to database.Please try again</b><br />"."redirecting to query page</center>";
echo "<script>
		setTimeout(function(){window.location.href='query.php'},3000);</script>";
die();
}
while(1)
{
if(mysqli_num_rows($res)==1)
{
$str=randomPassword();
$query="SELECT * FROM grievance where `id`=\"$id\"";
$res=mysqli_query($con,$query);	
}
else
break;
}
$query="INSERT INTO grievance(`id`,`text`,`qualification`,`regno`) VALUES(\"$id\",\"$text\",\"$qualification\",\"$regno\")";
if(!mysqli_query($con,$query))
{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Couldn't connect to database.Please try again</b><br />"."redirecting to submit page</center>";
echo "<script>
		setTimeout(function(){window.location.href='submit.php'},3000);</script>";
}
else
{
	echo "<br/><br/><br/><br/><br/><center>"."<b   id=\"code\"> Your grievance id is ".$id."</b></center>";
} 
?>
</body>
</html>