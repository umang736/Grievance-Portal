<?php
session_start();
include_once("functions.php");
if(isset($_SESSION['admin']))
{
if(autologout('time'))
{
	session_destroy();
	header('Location:sessionexpire.php');
	die();
}
echo "<div class=\"flip3d\">";
echo "<div class=\"vqlog\">Logged in head:<b>".$_SESSION['admin']."</b></div>";
echo "<div class=\"fliplog\"><a id=\"log\" onclick=\"func()\"><img src=\"logout.gif\"></a></div>";
echo "</div>";
}
else
{
	echo "<br /><br /><br /><br /><br /><br /><center><b>ERROR:please login to continue</b><br/>"."redirecting to home page</center>";
	echo "<script>setTimeout(function(){window.location.href='index.php'},3000);</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>viewquery</title>
<link rel="shortcut icon" href="logo_in_title.ico" /> 
<link rel="stylesheet" type="text/css" href="main.css" />
<link href="hover-min.css" rel="stylesheet" media="all">
<style type="text/css">
body
{
	background:linear-gradient(blue,white,blue);
overflow-x:hidden;
overflow-y:scroll;
}
#log{position:relative; left:1270px; color:
#600;}
.text{
/*position:relative;
top:-150px;*/
left:80px;position:static;

font-size:12px;
background:linear-gradient(blue,white);
padding:20px;
color:#0F3;
box-shadow:10px 10px 10px black;
border-radius:20px;
}

.look{font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	background:linear-gradient(red,yellow);
	border-radius:20px;
	color:#0F3;
	padding:20px;
	box-shadow:10px 10px 10px black;
}
#logged{position:absolute; left:1100px;}
#head{ position:relative;left:330px; z-index:10px;
text-decoration:none; color:#0FF;}
.visible{font-family:Verdana, Geneva, sans-serif; color:#00F;
border:solid;
border-radius:30px;
padding:10px;
color:#0C0; }
.but{position:relative; left:0px; top:0px; font-family:Verdana, Geneva, sans-serif;}
p{position:relative; left:165px;}
.reply{
	position:relative; left:250px; color:
#600;
}
.nw{ position:absolute; left:-10px;}
.aside{position:absolute; left:385px;}
.naya{position:relative; left:0px;}
#sptable
{
	left:200px; position:relative; width:600px;
}
#vqp1
{
	border:inset;
	padding:10px;
	color:#0F6;
	font-size:14px;
	width:300px;
	text-align:center;
	left:520px;
	background-color:#093;
	border-radius:30px;
	color:#000;
	font-weight:bold;
	box-shadow:10px 10px 10px black;
	top:-10px;
}
#p1
{
	position:absolute;
	left:440px;
}
#p2
{
	position:absolute;
	left:620px;
}
.vqlog
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
	-webkit-backface-visibility:hidden;
	backface-visibility:hidden;
	transition: -webkit-transform .5s linear 0s;
	transition: transform .5s linear 0s;
}
#vqimg
{
	position:absolute;
	left:1100px;
	top:220px;
	border:solid;
	width:175px;
	height:200px;
	border-radius:20px;
	box-shadow:5px 5px 5px;
}
#vqname
{
	position:absolute;
	top:95px;
	left:70px;
	color:#0C3;
}
#vqdesig
{
	position:relative;
	top:110px;
	left:10px;
	color:#C60;
	width:300px;
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
	left:-1240px;
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
#vqspan
{
	position:absolute;
	top:330px;
	left:1040px;
}
#validpass1
		    {
		    	font-family:Verdana;
		    	color:#FF6;
		    	font-size:12px;
		    	padding:5px,5px,5px,5px,5px;
		    	display:none;
				width:300px;
				left:80px;
				top:410px;
				position:absolute;
		    }
			#newpass1
		    {
		    	font-family:Verdana;
		    	color:#CF0;
		    	font-size:12px;
		    	padding:5px,5px,5px,5px,5px;
		    	display:none;
				width:300px;
				left:170px;
				top:480px;
				position:absolute;
		    }
</style>
<script type="text/javascript" src="../jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="conect.js"></script>
<script type="text/javascript" src="check.js" ></script>
<script>
function func(){
window.location.href='logout.php';}
function ShowDef(definitionObjectName)
			{
			    document.getElementById(definitionObjectName).style.display="block";
			}
			

			function HideDef(definitionObjectName)
			{
				document.getElementById(definitionObjectName).style.display="none";
			}
</script>
<!--<marquee dir="ltr" style="top:130px; position:absolute;">please open this page in browsers other thanI.E.</marquee>-->
</head>
<body >
<a href="index.php"><img id="i2" src="mnnit.gif" /></a>
<div id="header"></div>
<p id="p1">MNNIT</p>
<p id="p2">GRIEVANCE PORTAL</p>
<span id="validpass1" >see full conversation</span>
<span id="newpass1" >reply</span>
<?php
$j=$_GET['num'];
$new=$j+3;  

$idpic=$_SESSION['headregno'];
$con=connect_db();
if(isset($_FILES['image']['tmp_name']))
{
	$img=addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$caption=addslashes($_FILES['image']['name']);
	$imgsize=getimagesize($_FILES['image']['tmp_name']);
	echo "<div id=\"vqdiv\">";
	if($imgsize==FALSE)
	echo "that's not an image";
	else
	{
		$query="select `img` from pic where `idpic`=\"$idpic\""; 
		$res=mysqli_query($con,$query);
		if(!$res)
		{
			echo "your image could not be uploaded".mysqli_error($con);
		}
		else if(mysqli_num_rows($res)==0)
		{
		$query="INSERT INTO pic (`idpic`,`img`) VALUES (\"$idpic\",'$img')";
		if(!mysqli_query($con,$query))
		{
			echo "your image could not be uploaded".mysqli_error($con);
		}
		else
		{
		echo "your image uploaded successfully";
		}
		
		}
		else
		{
		
		$query="UPDATE pic SET `img`='$img' where `idpic`=\"$idpic\"";
		if(!mysqli_query($con,$query))
		{
			echo "your image could not be uploaded".mysqli_error($con);
		}
		else
		{
		echo "your image uploaded successfully";
		}
		
		}
	}
echo "</div>";
echo "<script>setTimeout(function(){document.getElementById(\"vqdiv\").innerHTML=\"\";},3000);</script>";	
}

echo "<img src=\"image.php?id=$idpic\" width=\"175\" height=\"200\" style=\"position:absolute; left:1066px; top:200px; border-radius:50px; border:solid; box-shadow:10px 10px 10px;\" />";

echo "<div id=\"vqupdmain\">";
echo "</div>";
echo "<div id=\"vqupd\">";
echo "<form action=\"\" method=\"post\" enctype=\"multipart/form-data\">";
echo "<input type=\"file\" name=\"image\"  accept=\"image/*\" required=\"required\"/>";
echo "<input id=\"vqfile\" type=\"submit\" value=\"upload\"  style=\"height:25px\"/>";
echo "<br /><font style=\"font-size:10px;\">";
echo "Please upload your photo only in JPG/PNG/GIF format and refresh the page after uploading the photo.</font></form><br />";
echo "</div>";
echo "<span id=\"vqspan\">";
echo "<b id=\"vqname\">NAME:";
echo $_SESSION['admin']."</b>";
echo "<b id=\"vqdesig\">DESIGNATION:";
echo $_SESSION['designation']."<br/>";
echo "DEPARTMENT:".$_SESSION['headqualification']."</b>";
echo "</span>";

$qualification=$_SESSION['headqualification'];
$query="SELECT * FROM grievance where `qualification`=\"$qualification\" and `status`=\"0\" ORDER BY datetime";
$res=mysqli_query($con,$query);
if(!$res)
{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Unable to connect to database.Please try later</b></center>";
echo "<script>setTimeout(function(){window.location.href='index.php'},3000);</script>";
//die();
}
else if(mysqli_num_rows($res)<=$j)
{
echo "<br><br><br><br><br><center><b>Sorry,you don't have new grievances to look at</b></center>";
echo "<script>setTimeout(function(){window.location.href='index.php'},3000);</script>";
die();
}
else
{
	//echo mysqli_num_rows($res);
    	echo "<h1 id=\"head\"><u>GRIEVANCES TO BE VIEWED</u></h1>";
	  echo "<textarea  id=\"temp1\" style=\"visibility:hidden;\">"."garbage"."</textarea>";
	 echo "<p id=\"temp2\" style=\"visibility:hidden;\">".""."</p>";
	 echo "<script>process('temp1','0','temp2');</script>";
while(($j>=1)&&($result=mysqli_fetch_array($res)))
	{
		$j--;
	}
	$i=1;
	 $parno='A';		 
	 $textid='a';
echo "<table id=\"sptable\" cellpadding=\"10px\" cellspacing=\"5px\" >";
while(($i<=3)&&($result=mysqli_fetch_array($res)))
 {
	  echo "<tr>";
	  echo "<td>";
	  echo "<b class=\"nw\">"."$i."."</b>";
	 echo "<textarea class=\"look\" readonly=\"readonly\" rows=\"5\" cols=\"80\" >";
	 echo $result['text'];
	 echo "</textarea>";
	  echo "</td>";
	 echo "</tr>";
	 echo "<tr>";
    echo "<td >";
	 $uniqid=$result['id'];
	 $bt='bt'.$i;
	if($i==1)
	echo "<img src=\"conv1.gif\" id=\"$bt\" class=\"naya grow\" style=\"width:80px; height:3
		0px;\" onmouseout=\"HideDef('validpass1');\" onmouseover=\"ShowDef('validpass1');\">";
	else
	echo "<img src=\"conv1.gif\" id=\"$bt\" class=\"naya grow\" style=\"width:80px; height:3
		0px;\">";
	 $replier="student";

	 echo "<div id=\"$i\" class=\"hidden\" >"; 
	if($result['reply']!="")
	{
		$fullconver=explode("-------------------------------------",$result['reply']);
		$size=sizeof($fullconver);
		//echo "size=".$size;
		while($size)
		{
			$arr=explode("/",$fullconver[$size-1]);
			if($arr[0]!="user")
			echo $arr[0];
			else
			echo $replier;
			echo "<span class=\"aside\">".$arr[1]."</span><br />";
            $size--;
			echo "<textarea class=\"visible\" rows=\"5\" cols=\"65\"  readonly=\"readonly\" >".$fullconver[$size-1]."</textarea><br /><br />";
			
			$size--;
		}
	}
	else
	{
	echo "<br /><h3 class=\"visible\"><center>"."no conversation yet"."</center></h3><br />";
	}
	echo "</div>";	
	echo "</td>";
	echo "</tr>";
	 $but='but'.$i;
echo "<tr>";
echo "<td>";
	  //echo "<input type=\"button\"  value=\"Reply\" class=\"but\"  id=\"$but\"/>";
if($i==1)
echo "<a class=\"but grow\"  id=\"$but\"><img src=\"reply11.gif\" onmouseout=\"HideDef('newpass1');\" onmouseover=\"ShowDef('newpass1');\"></a>";
else echo "<a class=\"but grow\"  id=\"$but\"><img src=\"reply11.gif\"></a>";
echo "<p id=\"$parno\">";
echo "</p>";
 echo "<textarea  class=\"text\" maxlength=\"1000\"  rows=\"5\" cols=\"70\" id=\"$textid\" required=\"required\" spellcheck=\"false\">
"."</textarea><br />";
$sub='sub'.$i;
$text=$result['reply'];
$admin=$_SESSION['admin'].",".$_SESSION['designation'];
echo "<input class=\"reply\" type=\"submit\" id=\"$sub\" value=\"Submit\" onclick=\"process('$admin','$text','$textid','$uniqid','$parno')\"/>";
echo "<br />";
echo "</td>";
echo "</tr>";
$i++;
$parno++;
$textid++;
 }
 echo "</table>";
 if(mysqli_num_rows($res)>$new)
 echo "<h4 style=\"position:static; color:
#600; top:650px; \" align=\"right\"><a href=\"viewquery.php?num=$new\">View more queries</a></h4>";
 }

?>
<img id="vqimg1" src="update.png" width="100px" height="110px" />
</body>
</html>