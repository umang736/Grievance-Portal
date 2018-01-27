<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>query</title>
<link rel="shortcut icon" href="../javascript/logo_in_title.ico"> 
<link rel="stylesheet" type="text/css" href="main.css" />
<style type="text/css">
/*#log{position:relative; left:1250px; color:
#600;}*/
div{position:absolute; left:1100px;}
#text{color:#600; font-size:16px;}
}
#code{color:#0FF; font-size:36px;}
#choice
{
	width:200px;
	height:200px;
	left:50px;
	top:260px;
	color:#000;
	padding:35px;
	border-radius:180px;
	background:radial-gradient(white,blue);
	box-shadow:10px 10px 10px;
	-webkit-transform:perspective( 600px ) rotateY( 0deg );
	transform:perspective( 600px ) rotateY( 0deg );
	transition: -webkit-transform .5s linear 0s;
	transition: transform background .5s linear 0s;
	transition: transform .5s linear 0s;
}
#choice:hover
{
	-webkit-transform:perspective( 600px ) rotateY( 20deg );
	transform:perspective( 600px ) rotateY( 20deg );
	background:radial-gradient(yellow,red);
}
#qsub
{
	position:absolute;
	top:330px;
	left:1100px;
	width:90px;
	height:90px;
	border-radius:60px;
	border:solid;
	box-shadow:5px 5px 5px;
	background:radial-gradient(white,blue);
	-webkit-transform:rotate( 0deg );
	transform:rotate( 0deg );
	transition: -webkit-transform .5s linear 0s;
	transition: transform background .5s linear 0s;
}
#qsub:hover
{
	-webkit-transform:rotate( 360deg );
	transform:rotate( 360deg );
	background:radial-gradient(yellow,red);
}
	
#qtext
{
	border:solid;
	position:absolute;
	left:330px;
	top:220px;
	width:700px;
	height:310px;
	border-radius:75px;
	overflow:hidden;
	box-shadow:10px 10px 10px;
	z-index:-1;
}
.flip3d
{
	position:absolute;
	left:1090px;
	top:35px;
	width:200px;
	height:80px;
}
.fliplog
{
	position:absolute;
	left:30px;
	-webkit-transform:perspective( 600px ) rotateY( 180deg );
	transform:perspective( 600px ) rotateY( 180deg );
	-webkit-backface-visibility:hidden;
	backface-visibility:hidden;
	transition: -webkit-transform .5s linear 0s;
	transition: transform .5s linear 0s;
}
.flip3d:hover > .vqlog
{
	-webkit-transform:perspective( 600px ) rotateY( -180deg );
	transform:perspective( 600px ) rotateY( -180deg );
}
.flip3d:hover > .fliplog
{
	-webkit-transform:perspective( 600px ) rotateY( 0deg );
	transform:perspective( 600px ) rotateY( 0deg );
}
.vqlog
{
	position:absolute;
	left:40px;
	border:ridge;
	padding:20px;
	color:#000;
	top:0px;
	border-radius:20px;
	box-shadow:5px 5px 4px black;
	background:radial-gradient(white,blue);
	font-size:18px;
	-webkit-transform:perspective( 600px ) rotateY( 0deg );
	transform:perspective( 600px ) rotateY( 0deg );
	-webkit-backface-visibility:hidden;
	backface-visibility:hidden;
	transition: -webkit-transform .5s linear 0s;
	transition: transform .5s linear 0s;
}
#qback
{
	position:absolute;
	left:50px;
	top:50px;
}
</style>
<script type="text/javascript">
function logout(){
window.location.href='logout.php';
}
function fu()
{
	document.getElementById("query").style.visibility="hidden";
}
</script>
</head>
<body>
<a href="index.php"><img id="i2" src="mnnit.gif" /></a>
<!--<img id="i1" src="mnnitheader.gif" />-->
<div id="header"></div>
<p id="p1">MNNIT</p>
<p id="p2">GRIEVANCE PORTAL</p>
<?php  
include_once("functions.php");
session_start();
if(isset($_SESSION['user']))
{
if(autologout('time'))
{
	session_destroy();
	header('Location:sessionexpire.php');
	die();
}
echo "<div class=\"flip3d\">";
echo "<div class=\"vqlog\">Logged in user:<b>".$_SESSION['user']."</b></div>";
/*echo "<input type=\"button\" id=\"log\" value=\"Logout\" width=\"100px\" onclick=\"logout()\"/>";*/ 
echo "<div class=\"fliplog\"><a id=\"log\" onclick=\"logout()\"><img src=\"logout.gif\"></a></div>";
echo "</div>";
if(isset($_POST['submit']))
{
function randomPassword() 
{
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

	$con=connect_db();
	$text=fix($_POST['text']);
	$regno=$_SESSION['regno'];
	$problemtype=$_POST['problemtype'];
	$qualification=$_SESSION['qualification'];
	if($problemtype=="Educational")
	{
		$problem=$qualification;
	}
	else if($problemtype=="Hostel related")
	{
		$problem=$_SESSION['hostel'];
	}
	else
	{
		$problem="Dean Acadaemics";
	}
$id=randomPassword();
$query="SELECT * FROM grievance where `id`=\"$id\"";
$res=mysqli_query($con,$query);	
if(!$res)
{
 echo "<script>fu()</script>";
echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Unable to connect to database.Please try again</b><br />"."redirecting to query page</center>";
echo "<script>		setTimeout(function(){window.location.href='query.php'},3000);  </script>";
die();
}
while(1)
{
if(mysqli_num_rows($res)==1)
{
$id=randomPassword();
$query="SELECT * FROM grievance where `id`=\"$id\"";
$res=mysqli_query($con,$query);	
}
else
break;
}
$datetime=date("Y-m-d H:i:s",time()+12600);
$query="INSERT INTO grievance(`id`,`text`,`qualification`,`regno`,`datetime`) VALUES(\"$id\",\"$text\",\"$problem\",\"$regno\",\"$datetime\")";
if(!mysqli_query($con,$query))
{
	echo "<script>fu()</script>";
echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Couldn't connect to database.Please try again</b><br />"."redirecting to query page</center>";
echo "<script>
		setTimeout(function(){window.location.href='query.php'},3000);</script>";
}
else
{
	echo "<script>fu()</script>";
	echo "<br/><br/><br/><br/><br/><center>"."<b   id=\"code\"> Your grievance id is ".$id."</b></center>";
	echo "<center><b><a href=\"show_posts.php?no=0\">Click Here to go to show posts</a></b></center>";
}
die();
}
echo "<form method=\"post\" action=\"\" id=\"query\">";
echo "<div id=\"choice\">";
echo "<br /><br /><input name=\"problemtype\"  type=\"radio\" required=\"required\" style=\"width:30px; height:20px;\" value=\"Educational\"/>"." Educational<br /><br />"; 
echo "<input name=\"problemtype\"  type=\"radio\" required=\"required\" style=\"width:30px; height:20px;\" value=\"Hostel related\"/>"."  Hostel related<br /><br />";   
echo "<input name=\"problemtype\"  type=\"radio\" required=\"required\" style=\"width:30px; height:20px;\" value=\"Dean Academics related\"/>"."  Dean Acadaemics related";
echo "</div>";
echo "<div id=\"qtext\">";
echo "<br /><br /><br /><br /><center>"."<textarea  id=\"text\" maxlenght=\"1000\" required=\"required\" name=\"text\"  rows=\"15\" cols=\"80\" autofocus=\"autofocus\" spellcheck=\"false\">
"."</textarea></center><br />";
echo "</div>";
echo "<center><input id=\"qsub\" type=\"submit\" value=\"submit\" name=\"submit\"/></center>";
echo "</form>";
}
else
{
	echo "<br/><br/><br/><br/><br/><center> <b>ERROR :please login to continue</b><br />"."redirecting to login page</center>";
echo "<script>
		setTimeout(function(){window.location.href='index.php'},1000);</script>";
}

?> 
<a id="qback" href="show_posts.php?no=0"><img src="BackButton.gif" /></a>
</body>
</html>
