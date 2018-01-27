<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../javascript/logo_in_title.ico">
<link rel="stylesheet" type="text/css" href="main.css" />
<link href="hover-min.css" rel="stylesheet" media="all">
<style type="text/css" >
#log{position:relative; left:1270px; color:
#600;}
div{position:absolute; left:1100px;}
p{display:inline;width:200px;}
.error{
	color:#F00;	
}
.DefStyle
		    {
		    	font-family:Verdana;
		    	color:#CFC;
		    	font-size:11px;
		    	border-width:1px;
		    	display:none;
				width:300px;
				left:850px;
				top:482px;
				position:fixed;
		    }
#update
{
	color:#CCC;
	position:absolute;
	top:140px;
	left:370px;
	border:solid;
	padding-top:40px;
	padding-bottom:40px;
	padding-left:90px;
	padding-right:0px;
	width:540px;
	height:420px;
	border-radius:320px;
	background:url(backimg.jpg);
	box-shadow:10px 10px 10px black;
}
#prosub
{
	position:absolute;
	left:280px;
	top:430px;
	height:60px;
	border-radius:220px;
	border:solid;
	box-shadow:5px 5px 5px;
}
.flip3d
{
	position:absolute;
	left:1090px;
	top:35px;
	width:200px;
	height:80px;
	/*border:solid;*/
}
.fliplog
{
	position:absolute;
	left:-1230px;
	-webkit-transform:perspective( 600px ) rotateY( 180deg );
	transform:perspective( 600px ) rotateY( 180deg );
	-webkit-backface-visibility:hidden;
	backface-visibility:hidden;
	transition: -webkit-transform .5s linear 0s;
	transition: transform .5s linear 0s;
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
	-webkit-transform:perspective( 600px ) rotateY( 0deg );
	transform:perspective( 600px ) rotateY( 0deg );
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
#p2
{
	position:absolute;
	top:49px;
	left:680px;
}
#qback
{
	position:absolute;
	left:50px;
	top:50px;
}
#star{color:#C30; font-size:24px;}
</style>
<script type="text/javascript">
function logout(){
window.location.href='logout.php';
}
	function ShowDef(definitionObjectName)
			{
			    document.getElementById(definitionObjectName).style.display="block";
			}
			

			function HideDef(definitionObjectName)
			{
				document.getElementById(definitionObjectName).style.display="none";
			}
function choose(hostel){
document.getElementById('h').disabled=false;
document.getElementById(hostel).selected=true;}
function show(){
document.getElementById('h').disabled=false;}
function hide(){
document.getElementById('h').disabled=true;}
function func(pro,str)
{
	document.getElementById(pro).innerHTML=str;
}
function blank()
{
	document.getElementById("pro1").innerHTML="";
	document.getElementById("pro2").innerHTML="";
	document.getElementById("pro3").innerHTML="";
	document.getElementById("pro4").innerHTML="";
}
function fu()
{
	document.getElementById("update").style.visibility="hidden";
}
function type(id,user)
{
	document.getElementById(id).value=user;
}
</script>
<title>Profile</title>
</head>
<body >
<a href="index.php"><img id="i2" src="mnnit.gif" /></a>
<!--<img id="i1" src="mnnitheader.gif" />-->
<div id="header"></div>
<p id="p1">MNNIT</p>
<p id="p2">GRIEVANCE PORTAL</p>
<?php
session_start();
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
echo "<div class=\"vqlog\">Logged in user:<b>".$_SESSION['user']."</b></div>";
/*echo "<input type=\"button\" id=\"log\" value=\"Logout\" width=\"100px\" onclick=\"logout()\"/>"; */
echo "<div class=\"fliplog\"><a id=\"log\" onclick=\"logout()\"><img src=\"logout.gif\"></a></div>";
echo "</div>";

$con=connect_db();
$regno=$_SESSION['regno'];
$query="select * from students  where `regno`=\"$regno\"";
$res=mysqli_query($con,$query);
if(!$res)
{
	echo "<script>fu();</script>";
echo "<br/><br/><br/><br/><br/><center> <b>ERROR :could not load your profile.<br/>Unable to connect to database.Please try again</b></center>";
echo "<script>setTimeout(function(){window.location.href='profile.php'},3000);</script>";	die();
}
else
{
	$result =mysqli_fetch_array($res);
	$user=$result['user'];
	$hostel=$result['hostel'];
	$oldpass=$result['pass'];
	$gender=$result['gender'];
	$qualification=$result['qualification'];
	$dob=$result['dob'];
	echo "<p id=\"#star1\" style=\"color:yellow; position:absolute; top:200px; left:1070px;\"><b id=\"star\">*</b> marked fields are only editable</p>";
	echo "<form method=\"post\" action=\"\" id=\"update\" class=\"grow\" name=\"update\" >";
	echo "<table cellpadding=\"20px\" cellspacing=\"15px\">";
	echo "<tr><th align=\"right\">";
	echo "Name:<b id=\"star\">*</b>"."</th>";
	echo "<td>"."<input style=\"width:200px; height:20px;position:static;\"type=\"text\" name=\"user\" required=\"required\" onkeyup=\"check1()\" id=\"user\" onkeydown=\"blank()\"/>"."<span id=\"error1\" class=\"error\" ></span><br /><span id=\"pro1\" class=\"error\" ></span></td>"."<script>type('user','$user');</script>"."</tr>";
		 echo "<tr>";
	 echo "<th align=\"right\">Gender:</th>";
	 echo "<td>"."<input style=\"width:200px; height:20px;position:static;\"type=\"text\" id=\"gender\" readonly=\"readonly\"/>"."</td>";
	 echo "<script>type('gender','$gender');</script>";
	 echo "</tr>";
	  echo "<tr>";
	 echo "<th align=\"right\">Reg No:</th>";
	 echo "<td>"."<input style=\"width:200px; height:20px;position:static;\"type=\"text\" id=\"regno\"  readonly=\"readonly\"/>"."</td>";
	 echo "<script>type('regno','$regno');</script>";
	 echo "</tr>";
	   echo "<tr>";
	 echo "<th align=\"right\">Department:</th>";
	 echo "<td>"."<input style=\"width:200px; height:20px;position:static;\"type=\"text\" id=\"department\"  readonly=\"readonly\"/>"."</td>";
	 echo "<script>type('department','$qualification');</script>";
	 echo "</tr>";
	   echo "<tr>";
	 echo "<th align=\"right\">DOB:</th>";
	 echo "<td>";
	 $birth=explode("/",$dob);
	 //echo $birth[0].$birth[10].$birth[2];
	 echo "<select id=\"date\" style=\"width:45px; height:19px; border-radius:10px;\" >";
echo "<option value=\"$birth[0]\" >".$birth[0]."</option>";
echo "</select>";
echo " / ";
echo "<select id=\"month\" style=\"width:51px; height:19px; border-radius:10px;\" >";
echo "<option value=\"$birth[1]\">".date("M",$birth[1]*3600*24*29)."</option>";
echo "</select>";
echo " / ";
echo "<select id=\"year\" style=\" height:19px; width:57px; border-radius:10px;\" >";
echo "<option value=\"$birth[2]\">".$birth[2]."</option>";
echo "</select>";
	 echo "</td>";
	 echo "</tr>";
	echo "<tr>"."<th align=\"right\">";
  echo "Accomodation:<b id=\"star\">*</b>"."</th>";
   echo "<td>"."<p >";
if($hostel=='Day Scholar')
{
	echo "<input type=\"radio\" value=\"Day Scholar\" name=\"hostel\" required=\"required\"  checked=\"checked\" onclick=\"hide()\" onmousedown=\"blank()\"/>"."Day Scholar"."</p>";
echo "<p >";
echo "<input name=\"hostel\" type=\"radio\" required=\"required\" onclick=\"show()\" onmousedown=\"blank()\" />"."Hosteller";
echo "<select name=\"hostel\" disabled=\"disabled\" id=\"h\">";
echo "<option value=\"Tagore\" id=\"Tagore\">"."Tagore"."</option>";
echo "<option value=\"Raman\" id=\"Raman\">"."Raman"."</option>";
echo "<option value=\"Tilak\" id=\"Tilak\">"."Tilak"."</option>";
echo "<option value=\"Patel\" id=\"Patel\">"."Patel"."</option>";
echo "<option value=\"MEGA\" id=\"MEGA\">"."MEGA"."</option>";
echo "<option value=\"Tandan\" id=\"Tandan\">"."Tandan"."</option>";
echo "<option value=\"KNGH\" id=\"KNGH\">"."KNGH"."</option>";	  
  echo "</select>";
}
else
{
	
	echo "<input type=\"radio\" value=\"Day Scholar\" name=\"hostel\" required=\"required\"  onclick=\"hide()\"  onmousedown=\"blank()\"/>"."Day Scholar"."</p>";
echo "<p >";
echo "<input name=\"hostel\" type=\"radio\" required=\"required\" onclick=\"show()\" checked=\"checked\" onmousedown=\"blank()\"/>"."Hosteller";
echo "<select name=\"hostel\" disabled=\"disabled\" id=\"h\">";
echo "<option value=\"Tagore\" id=\"Tagore\">"."Tagore"."</option>";
echo "<option value=\"Raman\" id=\"Raman\">"."Raman"."</option>";
echo "<option value=\"Tilak\" id=\"Tilak\">"."Tilak"."</option>";
echo "<option value=\"Patel\" id=\"Patel\">"."Patel"."</option>";
echo "<option value=\"MEGA\" id=\"MEGA\">"."MEGA"."</option>";
echo "<option value=\"Tandan\" id=\"Tandan\">"."Tandan"."</option>";
echo "<option value=\"KNGH\" id=\"KNGH\">"."KNGH"."</option>";	  
  echo "</select>";
  echo "<script>
  choose('$hostel');
  </script>";
}
echo "</p><br /><span id=\"pro2\" class=\"error\"></span></td></tr>";

echo "<tr>";
echo "<th align=\"right\" style=\"font-size:15px;\">PASSWORD:</th>";
echo "<td><input type=\"password\" name=\"oldpass\" id=\"oldpass\" style=\"width:200px;height:20px; position:static;\" readonly=\"readonly\" /></td><script>type('oldpass','$oldpass');</script></tr>";
	
echo "<tr>";
echo "<th align=\"right\" style=\"font-size:15px;\">CREATE NEW<br />PASSWORD:<b id=\"star\">*</b></th>";
echo "<td><input type=\"password\" id=\"pass\"  onkeyup=\"check2()\" name=\"pass\"   style=\"width:200px; height:20px;position:static;\" onkeydown=\"blank()\"  onmouseout=\"HideDef('validpass');\" onmouseover=\"ShowDef('validpass');\"/> <span id=\"error2\" class=\"error\"></span><br/><span id=\"pro3\" class=\"error\"></span></td></tr>";
echo "<tr>";
echo "<th align=\"right\" style=\"font-size:15px;\">CONFIRM<br /> PASSWORD:<b id=\"star\">*</b></th>";
echo "<td><input type=\"password\" id=\"pass2\"  onkeyup=\"check3()\" name=\"pass2\"  style=\"width:200px; height:20px;position:static;\" onkeydown=\"blank()\"/> <span id=\"error3\" class=\"error\"></span><br/><span id=\"pro4\" class=\"error\"></span></td></tr>";
	echo "<tr>";
echo "<td colspan=\"2\"><input id=\"prosub\" type=\"submit\"  name=\"submit\"style=\"width:100px;\" value=\"update\" /></td></tr>";
	echo "</table>";
echo "</form>";
echo "<span class=\"DefStyle\" id=\"validpass\" >The password should contain a small alphabet, a <br />large alphabet, a special character and a number</span>";
}
?>

<?php
if(isset($_POST['submit']))
{
	echo "<script src=\"script.js\" type=\"text/javascript\"></script>";

	$user=fix($_POST['user']);
	$hostel=$_POST['hostel'];
	$oldpass=$_POST['oldpass'];
	$pass=fix($_POST['pass']);
	$pass2=fix($_POST['pass2']);
	//echo $hostel."  ".$user."  ".$oldpass."  ".$pass."  ".$pass2;

if(strlen($user)<5)
{
echo "<script>
		func('pro1','Username too short');</script>";
}
else
{
if(!empty($_POST['pass']))
	{
	if(strlen($pass)<5)
{
echo "<script>func('pro3','Password too short');</script>";
die();
}
else if($pass2=="")
{
	echo "<script>func('pro4','this field cannot be left empty');</script>";
die();
}
else if($pass!=$pass2)
{
echo "<script>func('pro4','Password mismatch');</script>";
die();
}
		$char = array ('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','w','x','y','z');
	for($j=0;$j<strlen($pass);$j++)
		if(in_array($pass[$j],$char))
	{
		break;
	}
	if($j==strlen($pass))
	{
		echo "<script>func('pro3','invalid Password');</script>";
	die();
	}
	$char = array ('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	for($j=0;$j<strlen($pass);$j++)
	if(in_array($pass[$j],$char))
	{
		break;
	}
	if($j==strlen($pass))
	{
		echo "<script>func('pro3','invalid Password');</script>";
	die();
	}
	$char = array ('0','1','2','3','4','5','6','7','8','9');
	for($j=0;$j<strlen($pass);$j++)
	if(in_array($pass[$j],$char))
	{
		break;
	}
	if($j==strlen($pass))
	{
		echo "<script>func('pro3','invalid Password');</script>";
	die();
	}
$char = array ('!','@','#','$','%','^','&','*');
	for($j=0;$j<strlen($pass);$j++)
	if(in_array($pass[$j],$char))
	{
		break;
	}
	if($j==strlen($pass))
	{
		echo "<script>func('pro3','invalid Password');</script>";
	die();
	}	
	
	}
else
{
	$pass=$oldpass;
}
$query="update students set `user`=\"$user\",`hostel`=\"$hostel\",`pass`=\"$pass\" where `regno`=\"$regno\"";
	$res=mysqli_query($con,$query);
	if(!$res)
{
	echo "<script>fu()</script>";
echo "<br/><br/><br/><br/><br/><center> <b>ERROR :could not update your profile.<br/>Unable to connect to database.Please try again</b></center>";
echo "<script>setTimeout(function(){window.location.href='profile.php'},3000);</script>";die();
}
else
{
	echo "<script>fu();</script>";
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><center><b><h3>your profile updated successfully</h3></b></center>";
	echo "<script>setTimeout(function(){window.location.href='index.php'},3000);</script>";	
die();
}

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

<script src="script.js" type="text/javascript"></script>
<a id="qback" href="show_posts.php?no=0"><img src="BackButton.gif" /></a>
</body>
</html>