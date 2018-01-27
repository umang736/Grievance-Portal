<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../javascript/logo_in_title.ico">
<link rel="stylesheet" type="text/css" href="main.css" />
<style type="text/css">
div{position:absolute; left:1100px;}
#log{position:relative; left:1270px; color:
#600;}
.aside{position:absolute; left:385px;}
.visible{font-family:Verdana, Geneva, sans-serif; color:#00F; border-radius:30px;
padding:10px; 
background:linear-gradient(blue,yellow);
color:#000;}
#csform
{
	position:absolute;
	left:410px;
	top:200px;
	width:500px;
	height:500px;
	padding:60px;
	padding-top:140px;
	padding-bottom:120px;
	border:groove;
	border-radius:800px;
	background:url(backimg.jpg);
	box-shadow:10px 10px 100px green;
	color:#CF0;
}
#subsp
{
	position:absolute;
	left:-260px;
	top:250px;
	position:absolute;
	width:70px;
	height:70px;
	border-radius:100px;
	border:solid;
	
}
#response
{
	color:#0F0;
}
h5
{
	color:#0F0;
}
#sptd
{
	position:absolute;
	left:-370px;
	top:160px;
	color:#0F0;
}
#sptd2
{
	position:absolute;
	top:200px;
	left:-370px;
	color:#0F0;
}
	
#sptd9
{
	position:absolute;
	left:-230px;
	top:160px;
	color:#0F0;
}
#sptd29
{
	position:absolute;
	left:-230px;
	top:200px;
	color:#0F0;
}
</style>
<script>
function fun(id,string)
{
document.getElementById(id).innerHTML=string;	
	if(string=="Couldn't connect to database.Please try again"){	
		document.getElementById(id).style.color="#F00";
	}
	else{
		document.getElementById(id).style.color="#0F6";
	}
}
</script>
<title>check status</title>

</head>

<body>
<a href="index.php"><img id="i2" src="mnnit.gif" /></a>
<div id="header"></div>
<p id="p1">MNNIT</p>
<p id="p2">GRIEVANCE PORTAL</p>
<?php
include_once("functions.php");
echo"<form id=\"csform\" method=\"post\" action=\"\" >";
echo "<table>";
echo "<tr>";
echo "<th id=\"sptd\" align=\"right\">REG NO:</th>";
echo "<td><input id=\"sptd9\" type=\"text\" name=\"regno\"/></td></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<th id=\"sptd2\">GRIEVANCE ID:</th>";
echo "<td><input id=\"sptd29\" type=\"text\" name=\"id\" /></td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<td colspan=\"2\"><input id=\"subsp\" type=\"submit\" value=\"check\" name=\"check\"/></td>";
echo "</tr></form>";
echo "</center>";
if(isset($_POST['check']))
{
$con=connect_db();
$id=fix($_POST['id']);
$regno=fix($_POST['regno']);
$query="SELECT `status`,`reply` FROM grievance where `id`=\"$id\" and `regno`=\"$regno\"";
$res=mysqli_query($con,$query);
if(!$res)
{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Unable to connect to database.Please try again</b></center>";
echo "<script>setTimeout(function(){window.location.href='checkstatus.php'},3000);</script>";
die();
}
else if(mysqli_num_rows($res)==0)
{
	echo "<center><b>Invalid grievance id</b></center>";
echo "<script>setTimeout(function(){window.location.href='checkstatus.php'},3000);</script>";
die();
}
else
{
$result=mysqli_fetch_array($res);
if($result['status']==1)
{
echo "<h4 id=\"response\" style=\"top:100px;\"><center>RESPONSE TO YOUR GRIEVANCE<u></u></center></h4><br /><br />";
echo "<h5><center>";
$fullconver=explode("-------------------------------------",$result['reply']);
		$size=sizeof($fullconver);
		//echo "size=".$size;
			$arr=explode("/",$fullconver[$size-1]);
			$size=sizeof($fullconver);
			while($size)
			{
			$arr=explode("/",$fullconver[$size-1]);
			if($arr[0]=="user")
			echo "<span style=\"position:relative; left:-160px;\">"."Your reply"."</span>";
			else
			echo "<span style=\"position:relative; left:-160px;\">".$arr[0]."</span>";
			echo "<span class=\"aside\">".$arr[1]."</span><br />";
            $size--;
			echo "<textarea class=\"visible\" rows=\"5\" cols=\"40\"  readonly=\"readonly\" >".$fullconver[$size-1]."</textarea><br /><br />";
			$size--;
			}
echo "</center></h5>";
}
else
{
	echo "<h4 style=\"top:100px;\"><center>your grievance has not been seen<u></u></center></h4><br><br>";
}
}

}

?>
</body>
</html>