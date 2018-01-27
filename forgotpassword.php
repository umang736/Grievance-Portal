<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>forgot password</title>
<link rel="shortcut icon" href="../javascript/logo_in_title.ico">
<link rel="stylesheet" type="text/css" href="main.css" />
<link href="hover-min.css" rel="stylesheet" media="all">
<style type="text/css" >
.error{
	color:#F00;	
}
#forgot
{
	position:absolute;
	left:350px;
	top:200px;
	border:solid;
	width:620px;
	padding-left:50px;
	padding-right:20px;
	height:320px;
	padding-top:50px;
	border-radius:300px;
	background:url(backimg.jpg);
	color:#CCC;
	box-shadow:10px 10px 10px black;
}
#fpsub
{
	position:absolute;
	top:240px;
	left:490px;
	height:80px;
	border-radius:100px;
	border:solid;
	box-shadow:5px 5px 5px;
}
#fpa
{
	color:#0F0;
	position:absolute;
	top:350px;
	left:570px;
	padding:20px;
	border:solid;
	border-radius:120px;
	box-shadow:5px 5px 50px black;
	text-decoration:none;
}
#fpr
{
	color:#0F0;
	padding:20px;
	border:solid;
	border-radius:120px;
	box-shadow:5px 5px 50px black;
}
.DefStyle
		    {
		    	font-family:Verdana;
		    	color:green;
		    	font-size:9px;
		    	/*border-width:1px;
		    	border-color:Black;
		    	border-style:outset;*/
		    	padding:5px,5px,5px,5px,5px;
		    	display:none;
				width:300px;
				left:960px;
				top:409px;
				position:fixed;
		    }
#sec
{
	position:absolute;
	top:113px;
}
</style>

<script type="text/javascript">
function ShowDef(definitionObjectName)
			{
			    document.getElementById(definitionObjectName).style.display="block";
			}
			

			function HideDef(definitionObjectName)
			{
				document.getElementById(definitionObjectName).style.display="none";
			}
function func(prob,str)
{
	document.getElementById(prob).innerHTML=str;
}
function blank()
{
	document.getElementById("pro1").innerHTML="";
	document.getElementById("problem").innerHTML="";
document.getElementById("pro3").innerHTML="";
document.getElementById("pro4").innerHTML="";
}
function fu()
{
	document.getElementById("forgot").style.visibility="hidden";
}
</script>
<script src="script.js" type="text/javascript"></script>
</head>

<body>
<a href="index.php"><img id="i2" src="mnnit.gif" /></a>
<div id="header"></div>
<p id="p1">MNNIT</p>
<p id="p2">GRIEVANCE PORTAL</p>

<form method="post" action="" id="forgot" class="grow" >
<table style="width:600px; overflow:scroll; height:260px;" cellpadding="1px;" cellspacing="5px" >
<tr>
<th>REG. NO. :</th>
<td><input type="text"   required="required" name="regno" id="regno" style="width:130px; height:20px;"  onkeyup="check4()" onkeydown="blank()" />
<span id="error4" class="error"></span><br /><span id="pro1" class="error" ></span></td>
</tr>
<tr>
<th><b>SECURITY QUESTION</b><br /><br  />ANSWER</th>
<td>
<select name="secret" id="sec" style="width:300px; height:20px;">
<option value="0"></option>
<option value="1">what is the name of your first pet?</option>
<option value="2">who was your first teacher?</option>
<option value="3">what city was your father born in?</option>
<option value="4">what is your mother's middle name?</option>
<option value="5">what was the name of the first school you attended?</option>
</select>
<br  /><br  /><br  />
<input type="password" name="answer" id="nm" style="width:200px; height:20px;" required="required" onkeypress="blank()" />
<br />
<span id="problem" class="error" ></span>
</td>
</tr>
<tr>
<th style="font-size:15px;">CREATE NEW<br />PASSWORD:</th>
<td><input type="password" id="pass"  onkeyup="check2()" name="pass"   style="width:140px; height:20px;position:static;" onkeydown="blank()"  onmouseout="HideDef('validpass');" onmouseover="ShowDef('validpass');"  required="required"/> <span id="error2" class="error"></span><br/><span id="pro3" class="error"></span></td></tr>
<tr>
<th style="font-size:15px;">CONFIRM<br /> PASSWORD:</th>
<td><input type="password" id="pass2"  onkeyup="check3()" name="pass2"  style="width:140px; height:20px;position:static;"onkeydown="blank()"  required="required"/> <span id="error3" class="error"></span><br/><span id="pro4" class="error"></span></td></tr>
<tr>
<td colspan="2"><input class="pulse-grow" id="fpsub" type="submit" style="width:80px;" value="submit" name="submit" /></td>
</tr>
</table>
</form>
<span class="DefStyle" id="validpass" >The password should contain a small letter,a <br />capital letter,a special character and a number</span>
</body>
<?php
include_once('functions.php');
if(isset($_POST['submit']))
{
	$con=connect_db();
	$regno=fix($_POST['regno']);
	$secret=$_POST['secret'];
	$answer=fix($_POST['answer']);
$pass=fix($_POST['pass']);
$pass2=fix($_POST['pass2']);
//echo $secret;
if($secret==='0')
{
	echo "<script>func('problem','secret question can't be left blank')</script>";
	die();
}

	$query="SELECT * FROM students where `regno`=\"$regno\"";
$res=mysqli_query($con,$query);
if(!$res)
{
	echo "<script>fu();</script>";
echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Unable to connect to database.Please try again</b></center>";
echo "<script>setTimeout(function(){window.location.href='forgotpassword.php'},3000);</script>";
die();
}
else if(mysqli_num_rows($res)==0)
{
echo "<script>func('pro1','invalid registration no.');</script>";
die();
}
else
{

	$result=mysqli_fetch_array($res);
	if(($result['answer']==$answer)&&($result['secret']==$secret))
	{
	if(strlen($pass)<5)
{
echo "<script>func('pro3','Password too short');</script>";
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
	$query="update students set `pass`=\"$pass\" where `regno`=\"$regno\"";
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
    echo "<br /><br /><br /><br /><br /><br /><br /><br /><center><b><h3>your password updated successfully</h3></b></center>";
	echo "<script>setTimeout(function(){window.location.href='index.php'},3000);</script>";	
die();
}
	
	}
	else
	{
	echo "<script>func('problem','invalid answer or secret question');</script>";	
	die();
	}

}

}
?>
</html>