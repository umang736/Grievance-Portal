<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>viewquery</title>
<link rel="shortcut icon" href="../javascript/logo_in_title.ico"> 
<style type="text/css">
#log{position:relative; left:1250px; color:
#600;}
div{position:relative;left:1100px;}
.text{overflow:scroll;}
.look{position:relative; left:175px; 	font-family:Verdana, Geneva, sans-serif;
	font-weight:bold;
	font-size:18px;
}
.but{position:relative; left:175px; font-family:Verdana, Geneva, sans-serif;}
p{position:relative; left:165px;}
.reply{
	position:relative; left:650px; color:
#600;
}
</style>
<script type="text/javascript" src="../jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="conect.js"></script>
<script type="text/javascript" src="check.js" ></script>
<script>
function func(){
window.location.href='logout.php';}
</script>
</head>
<body style="overflow:scroll;">
<?php  
include_once("functions.php");
session_start();
echo "<div style=\"top:\"20px\";\">Logged in user:<b>".$_SESSION['admin']."</b></div>";
echo "<input type=\"button\" id=\"log\" value=\"Logout\" width=\"100px\" align=\"right\" onclick=\"func()\"/>";
$con=connect_db();
$qualification=$_SESSION['headqualification'];
$query="SELECT * FROM grievance where `qualification`=\"$qualification\" and `status`=\"false\"";
$res=mysqli_query($con,$query);
if(!$res)
{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Unable to connect to database.Please try later</b></center>";
echo "<script>setTimeout(function(){window.location.href='index.php'},3000);</script>";
die();
}
else if(mysqli_num_rows($res)==0)
{
echo "<br><br><br><br><br><center><b>Sorry,you don't have new grievances to look at</b></center>";
echo "<script>setTimeout(function(){window.location.href='index.php'},3000);</script>";
die();
}
else
{
	echo "<h1><center><u>grievances to be viewed</u></center></h1>";
	echo"<br /><br /><br />";$i=1;
if($result=mysqli_fetch_array($res))
 {
	 echo "<div class=\"look\">".$i.". ".$result['text']."</div>";
	 $uniqid=$result['id'];
	 echo "<input type=\"hidden\" id=\"temp1\" value=\"0\"/>";
	 echo "<input type=\"hidden\" id=\"temp2\"/>";
	 echo "<script>process('temp1','0','temp2');</script>";
		  echo "<input type=\"button\"  value=\"Reply\" class=\"but\"  id=\"but1\">";
echo "<p id=\"A\">";
echo "</p>";
  echo "<center>"."<textarea  class=\"text\" maxlength=\"1000\" required=\"required\" rows=\"25\" cols=\"120\"           autofocus=\"autofocus\" id=\"a\">
"."</textarea></center>";
/*echo "<script>process('a','$uniqid','A');</script>";*/
echo "<input class=\"reply\" name=\"first\" type=\"submit\" id=\"sub1\" value=\"Submit\" onclick=\"process('a','$uniqid','A')\"/>";
$i++;

if($result=mysqli_fetch_array($res))
 {
	 echo "<div class=\"look\">".$i.". ".$result['text']."</div>";
	 $uniqid=$result['id'];
	 
		  echo "<input type=\"button\"  value=\"Reply\" class=\"but\"  id=\"but2\">";
  
  echo "<p id=\"B\">";
echo "</p>";
echo "<center>"."<textarea  class=\"text\" maxlength=\"1000\" required=\"required\" rows=\"25\" cols=\"120\"           autofocus=\"autofocus\" id=\"b\">
"."</textarea></center>";
echo "<input class=\"reply\" type=\"submit\" value=\"Submit\" id=\"sub2\"  onclick=\"process('b','$uniqid','B')\"/>";

$i++;
if($result=mysqli_fetch_array($res))
 {
	 echo "<div class=\"look\">".$i.". ".$result['text']."</div>";
	 $uniqid=$result['id'];
	 
		  echo "<input type=\"button\"  value=\"Reply\" class=\"but\"  id=\"but3\">";
  
echo "<p id=\"C\">";
echo "</p>";
  echo "<center>"."<textarea  class=\"text\" maxlength=\"1000\" required=\"required\" rows=\"25\" cols=\"120\"           autofocus=\"autofocus\" id=\"c\">
"."</textarea></center>";

echo "<input class=\"reply\" type=\"submit\" value=\"Submit\" id=\"sub3\"  onclick=\"process('c','$uniqid','C')\"/>";

$i++;


 }
 else
 die();


 }
 else
 die();

 }

}
?>
</body>
</html>