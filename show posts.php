<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>show posts</title>
 <link rel="shortcut icon" href="logo_in_title.ico">
 <link rel="stylesheet" type="text/css" href="main.css" />
<link href="hover-min.css" rel="stylesheet" media="all">
<link rel="stylesheet" type="text/css" href="menu.css" />
 <style type="text/css">
.show{font-family:Verdana, Geneva, sans-serif;
border:solid black;
color:#FFF;
background:linear-gradient(blue,yellow);
border-radius:30px;

padding:10px;
box-shadow:10px 10px 10px black; }
.visible{font-family:Verdana, Geneva, sans-serif;
border-radius:40px;
color:#000;
border:ridge;
padding:10px;
background:linear-gradient(blue,white); }
.reply{font-family:Verdana, Geneva, sans-serif; color:#F30; border-radius:40px;
border:ridge;
padding:10px;
background:linear-gradient(blue,white);}
.aside{position:absolute; left:385px;}
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
	-moz-transform:perspective( 600px ) rotateY( 180deg );
	-webkit-transform:perspective( 600px ) rotateY( 180deg );
	transform:perspective( 600px ) rotateY( 180deg );
	-moz-backface-visibility:hidden;
	-webkit-backface-visibility:hidden;
	backface-visibility:hidden;
	transition: -moz-transform .5s linear 0s;
	transition: -webkit-transform .5s linear 0s;
	transition: transform .5s linear 0s;
}
.flip3d:hover > #logged
{
	-moz-transform:perspective( 600px ) rotateY( -180deg );
	-webkit-transform:perspective( 600px ) rotateY( -180deg );
	transform:perspective( 600px ) rotateY( -180deg );
}
.flip3d:hover > .fliplog
{
	-moz-transform:perspective( 600px ) rotateY( 0deg );
	-webkit-transform:perspective( 600px ) rotateY( 0deg );
	transform:perspective( 600px ) rotateY( 0deg );
}
#logged
{
	position:absolute;
	left:40px;
	border:ridge;
	padding:20px;
	color:#0F0;
	top:0px;
	border-radius:20px;
	box-shadow:5px 5px 4px white;
	font-size:18px;
	-moz-transform:perspective( 600px ) rotateY( 0deg );
	-webkit-transform:perspective( 600px ) rotateY( 0deg );
	transform:perspective( 600px ) rotateY( 0deg );
	-moz-backface-visibility:hidden;
	-webkit-backface-visibility:hidden;
	backface-visibility:hidden;
	transition: -moz-transform .5s linear 0s;
	transition: -webkit-transform .5s linear 0s;
	transition: transform .5s linear 0s;
}
#sptable
{
	position:absolute;
	left:300px;
	padding-left:90px;
	padding-top:40px;
	padding-bottom:40px;
	background:url(backimg.jpg);
	width:800px;
	border-radius:100px;
	box-shadow:10px 10px 100px;
	color:#0F0;
}
#spp
{
	color:#0C0;
	text-decoration:none;
	left:460px;
	position:absolute;
	top:200px;
	font-size:24px;
	z-index:3;
	
}
#div3
{
	position:absolute;
	top:230px;
}
#but1,#but2,#but3,#but4,#but5
{
	position:absolute;
	left:460px;
	/*top:120px;*/
}
#spi
{
	padding:10px;
	background:blue;
	color:#0F0;
	border-radius:10px;
	left:200px;
}
.gayab2{position:relative;left:-53px; top:-55px;}
.gayab{position:relative;left:-106px; top:-35px;}
.gayab3{position:relative;left:+372px; top:22px;}
.gayab4{position:relative;left:+350px; top:38px;}

</style>
<script type="text/javascript"  src="../jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="showconect.js"></script>
<script type="text/javascript" src="showcheck.js"></script>
<script type="text/javascript">
function logout(){
window.location.href='logout.php';
}
function show(no)
{
	document.getElementById(no).style.visibility="visible";
}
</script>
</head>
<body>
<a href="index.php"><img id="i2" src="mnnit.gif" /></a>
<div id="header"></div>
<p id="p1">MNNIT</p>
<p id="p2">GRIEVANCE PORTAL</p>
<?php
session_start();
$j=$_GET['no'];
$new=$j+5;
include_once("functions.php");
if(isset($_SESSION['user']))
{
if(autologout('time'))
{
	session_destroy();
	header('Location:sessionexpire.php');
	die();
}

echo "<div class=\"flip3d\">";
echo "<div id=\"logged\">Logged in user:<b>".$_SESSION['user']."</b></div>";
echo "<div class=\"fliplog\"><a id=\"log\" onclick=\"logout()\"><img src=\"logout.gif\"></a></div>";
echo "</div>";
echo "<marquee dir=\"ltr\" style=\"position:relative;top:50px;\">please open this page in browsers other than IE</marquee>";
$con=connect_db();
$regno=$_SESSION['regno'];
$query="select * from grievance where `regno`=\"$regno\" ORDER BY datetime";
$res=mysqli_query($con,$query);
	
if(!$res)
{
	echo "<br/><br/><br/><br/><br/><center> <b>ERROR : Couldn't connect to database.Please try again</b><br />redirecting to show posts</center>";
echo "<script>
		setTimeout(function(){window.location.href='show%20posts.php'},3000);</script>";
			//die();
}
else if(mysqli_num_rows($res)<=$j)
{
	echo "<br /><br /><br /><br /><br/><center><b><u>No recent posts</b></u></center>";
	//die();
}
else
{
	echo "<center><b><u id=\"spp\">YOUR RECENT POSTS</u></b></center>";
	echo "<textarea  id=\"temp1\" style=\"visibility:hidden;\">"."garbage"."</textarea>";
	 echo "<p id=\"temp2\" style=\"visibility:hidden;\">".""."</p>";
	 echo "<script>process('','temp1','0','temp2');</script>";	
	while(($j>=1)&&($result=mysqli_fetch_array($res)))
	{
		$j--;
	}
	$i=1;
	echo "<table id=\"sptable\" cellpadding=\"10px\" cellspacing=\"5px\">";
	while(($i<=5)&&($result=mysqli_fetch_array($res)))
	{
		echo "<tr>";
		echo "<td>";
		echo $i."<br />";
		$but='but'.$i;
	
		echo "<TABLE cellpadding=\"0\" CELLSPACING=\"0\"><tr><td>";
		echo "<img src=\"conv1.gif\" id=\"$but\" class=\"grow\" style=\"width:80px; height:3
		0px;\">";
		echo "<FONT SIZE=\"+1\" COLOR=\"yellow\" class=\"gayab3\">"."See"."</FONT>";
		echo "<FONT SIZE=\"+1\" COLOR=\"yellow\" class=\"gayab4\">"."Full"."</FONT>";
		echo "</td></tr></table>";
	
		$addreply='addreply'.$i;
		/*echo "</th>";
		echo "<td >";*/
		echo "<textarea class=\"show\" rows=\"5\" cols=\"40\" readonly=\"readonly\">";
		echo $result['text'];
		echo "</textarea><br />";
		
	echo "<div id=\"$i\" class=\"hid\">";
	if(($result['status']==1)||($result['reply']!=""))
	{
		$fullconver=explode("-------------------------------------",$result['reply']);
		$size=sizeof($fullconver);
		//echo "size=".$size;
		while($size)
		{
			$arr=explode("/",$fullconver[$size-1]);
			if($arr[0]=="user")
			echo $_SESSION['user'];
			else
			echo $arr[0];
			//echo $replier;
			echo "<span class=\"aside\">".$arr[1]."</span><br />";
            $size--;
			echo "<textarea class=\"visible\" rows=\"5\" cols=\"40\"  readonly=\"readonly\" >".$fullconver[$size-1]."</textarea><br /><br />";
			
			$size--;
		}
	}
	else
	{
	echo "<br /><h3 class=\"visible\"><center>"."no conversation yet"."</center></h3><br />";
	}
	echo "</div>";
	echo "<TABLE cellpadding=\"0\" CELLSPACING=\"0\"><tr><td>";
		echo "<img src=\"comment1.gif\" \" id=\"$addreply\" style=\"width:80px; height:3
		0px;\" class=\"grow\">";
		echo "<FONT SIZE=\"+1\" COLOR=\"yellow\" class=\"gayab2\">"."Add"."</FONT>";
		echo "<FONT SIZE=\"+1\" COLOR=\"yellow\" class=\"gayab\">"."Comment"."</FONT>";
echo "</td></tr></table>";
	
	$id=$result['id'];
	$reply='ar'.$i;
	echo "<br /><div  class=\"hid\" id='$reply'>";
	$submit='s'.($i);
	echo "<textarea  rows=\"5\" cols=\"40\" class=\"reply\" spellcheck=\"false\" id=\"$submit\"></textarea><br />";
	$response='r'.($i);
	$text=$result['reply'];
$sub='sub'.$i;
	echo "<input id=\"spi\" type=\"submit\" value=\"submit\" onclick=\"process('$text','$submit','$id','$response')\" id=\"$sub\">";	
	echo "</div>";
		echo "<p id=\"$response\">"."</p>";
	echo "</td>";
	echo "</tr>";
		$i++;
	}
	echo "</table>";
	if(mysqli_num_rows($res)>$new)
	{
		echo "<br /><a href=\"show%20posts.php?no=$new\">"."<h4 align=\"right\" style=\"color:
#600; position:absolute; left:100px; top:600px; border:solid black; padding:5px; border-radius:30px; background:linear-gradient(red,yellow); \">view recent posts</h4>"."</a>";
	}
}
}
else
{
	echo "<br /><br /><br /><br /><br /><br /><center><b>ERROR:please login to continue</b><br/>"."redirecting to home page</center>";
	echo "<script>setTimeout(function(){window.location.href='index.php'},3000);</script>";
	die();
}
?>
<div id="div3">
 <ul class="ca-menu">
                    <li>
                        <a href="query.php">
                            <span class="ca-icon"><img src="complaint.gif"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Lodge a<br>Grievance</h2>
                                <h3 class="ca-sub">Click here <br />to lodge a <br />Grievance</h3>
                            </div>
                        </a>
                    </li>
                    <br>
                    <li>
                        <a href="profile.php">
                            <span class="ca-icon"><img src="edit-profile.gif"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Update <br>Profile</h2>
                                <h3 class="ca-sub">Click here <br />to update your profile
                                </h3>
                            </div>
                        </a>
                    </li>
  </ul>
  </div>

</body>
</html>