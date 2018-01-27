<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../javascript/logo_in_title.ico">
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
		    	color:green;
		    	font-size:9px;
		    	border-width:1px;
		    	border-color:Black;
		    	border-style:outset;
		    	padding:5px,5px,5px,5px,5px;
		    	display:none;
				width:300px;
				left:850px;
				top:316px;
				position:fixed;
		    }
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
	//document.write("entered in "+hostel);
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
function type(user)
{
	document.getElementById("user").value=user;
}
</script>
<title>Profile</title>
</head>
<body>
<?php
include_once("functions.php");
session_start();
if(autologout('time'))
{
	session_destroy();
	header('Location:sessionexpire.php');
	die();
}
echo "<div>Logged in user:<b>".$_SESSION['user']."</b></div>";
echo "<input type=\"button\" id=\"log\" value=\"Logout\" width=\"100px\" onclick=\"logout()\"/>"; 

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
	echo "<form method=\"post\" action=\"\" id=\"update\" >";
	echo "<table border=\"1px\" bordercolor=\"#00FF00\"  style=\"top:30%; left:30%; position:fixed; width:500px; height:250px;\" border=\"1px\" cellpadding=\"10px\" cellspacing=\"5px\">";
	echo "<tr><th align=\"right\">";
	echo "Name:"."</th>";
	echo "<td>"."<input style=\"width:200px; height:20px;position:static;\"type=\"text\" name=\"user\" required=\"required\" onkeyup=\"check1()\" id=\"user\" onkeydown=\"blank()\"/>"."<span id=\"error1\" class=\"error\" ></span><br /><span id=\"pro1\" class=\"error\" ></span></td>"."<script>type('$user');</script>"."</tr>";
	 echo "<tr>"."<th align=\"right\">";
  echo "Accomodation:"."</th>";
   echo "<td>"."<p >";
if($hostel=='Day Scholar')
{
	echo "<input type=\"radio\" value=\"Day Scholar\" name=\"hostel\" required=\"required\"  checked=\"checked\" onclick=\"hide()\" onmousedown=\"blank()\"/>"."Day Scholar"."</p>";
echo "<p >";
echo "<input name=\"hostel\" type=\"radio\" required=\"required\" onclick=\"show()\" onmousedown=\"blank()\" />"."Hosteller";
echo "<select name=\"hostel\" disabled=\"disabled\" id=\"h\">";
echo "<option value=\"0\">"."choose your hostel"."</option>";
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
echo "<option value=\"0\">"."choose your hostel"."</option>";
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
echo "<th align=\"right\" style=\"font-size:15px;\">CREATE NEW<br />PASSWORD:</th>";
echo "<td><input type=\"password\"  required=\"required\" id=\"pass\"  onkeyup=\"check2()\" name=\"pass\" style=\"width:200px; height:20px;position:static;\" onkeydown=\"blank()\"  onmouseout=\"HideDef('validpass');\" onmouseover=\"ShowDef('validpass');\"/> <span id=\"error2\" class=\"error\"></span><br/><span id=\"pro3\" class=\"error\"></span></td></tr>";

echo "<tr>";
echo "<th align=\"right\" style=\"font-size:15px;\">CONFIRM<br /> PASSWORD:</th>";
echo "<td><input type=\"password\" required=\"required\" id=\"pass2\"  onkeyup=\"check3()\" name=\"pass2\"  style=\"width:200px; height:20px;position:static;\" onkeydown=\"blank()\"/> <span id=\"error3\" class=\"error\"></span><br/><span id=\"pro4\" class=\"error\"></span></td></tr>";
	echo "<tr>";
echo "<td colspan=\"2\"><input type=\"submit\"  name=\"submit\"style=\"width:100px;\" value=\"update\" /></td></tr>";
	echo "</table>";
echo "</form>";
}
?>
<?php
if(isset($_POST['submit']))
{
	$user=fix($_POST['user']);
	$hostel=$_POST['hostel'];
	$pass=fix($_POST['pass']);
	$pass2=fix($_POST['pass2']);
	//echo $hostel." ".$user." ".$pass." ".$pass2;
	$char='a';
	for($i=0;$i<26;$i++)
	if(!strpos($pass,$char+$i))
	{
	break;
	}
	if($i==26)
	{
		echo "<script>func('pro3','invalid Password');</script>";
	die();
	}
	$char='A';
	for($i=0;$i<26;$i++)
	if(!strpos($pass,$char+$i))
	{
	break;
	}
	if($i==26)
	{
		echo "<script>func('pro3','invalid Password');</script>";
	die();
	}
	for($i=0;$i<10;$i++)
	if(!strpos($pass,$i))
	{
	break;
	}
	if($i==10)
	{
		echo "<script>func('pro3','invalid Password');</script>";
	die();
	}

/*$char="@";
	if(!strpos($pass,$char))
{*/
	/*
$char='#';
	if(!strpos($pass,$char))
	{
$char='$';
	if(!strpos($pass,$char))
	{
$char='!';
	if(!strpos($pass,$char))
	{
$char='%';
	if(!strpos($pass,$char))
{
	$char='^';
	if(!strpos($pass,$char))
   {
	   $char='&';
	if(!strpos($pass,$char))
   {
$char='*';
	if(!strpos($pass,$char))
   {*/
			/*echo "<script>func('pro3','invalid Password');</script>";
	die();
	}*/

/*
}
}
}
}
}
}
}
*/
if($hostel==='0')
{
echo "<script>func('pro2','accomodation can't be left blank');</script>";
}
else if(strlen($user)<5)
{
echo "<script>
		func('pro1','Username too short');</script>";
}
else if(strlen($pass)<5)
{
echo "<script>func('pro3','Password too short');</script>";
}
else if($pass!=$pass2)
{
echo "<script>func('pro4','Password mismatch');</script>";
}
else
{
		$query="select * from students where `pass`=\"$pass\"";
$res=mysqli_query($con,$query);
	if(!$res)
{
	echo "<script>fu()</script>";
echo "<br/><br/><br/><br/><br/><center> <b>ERROR :could not update your profile.<br/>Unable to connect to database.Please try again</b></center>";
echo "<script>setTimeout(function(){window.location.href='profile.php'},3000);</script>";die();
}
else if(mysqli_num_rows($res)==1)
{
	echo "<script>func('pro3','Password already in use');</script>";
	die();
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
?>

<script src="script.js" type="text/javascript"></script>
</body>
</html>