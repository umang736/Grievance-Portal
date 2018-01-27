<?php
ini_set("display_errors",0);
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
echo "<div id=\"logged\">Logged in user:<b>".$_SESSION['user']."</b></div>";
echo "<div class=\"fliplog\"><a id=\"log\" onclick=\"func()\"><img src=\"logout.gif\"></a></div>";
echo "</div>";
}
else  if(isset($_SESSION['admin']))
{
if(autologout('time'))
{
	session_destroy();
	header('Location:sessionexpire.php');
	die();
}
echo "<div class=\"flip3d\">";
echo "<div id=\"logged\">Logged in head:<b>".$_SESSION['admin']."</b></div>";
echo "<div class=\"fliplog\"><a id=\"log\" onclick=\"func()\"><img src=\"logout.gif\"></a></div>";
echo "</div>";

}
else
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MNNIT grievance portal</title>
<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<link rel="stylesheet" type="text/css" href="menu.css" />
<script src="main.js"></script>
<script type="text/javascript" src="engine1/jquery.js"></script>
<script language="JavaScript" type="text/javascript">
</script>
<style type="text/css">
#h{position:relative;left:5px;top:0px;}
.DefStyle
		    {
		    	font-family:Verdana;
		    	color:#CF0;
		    	font-size:12px;
		    	padding:5px,5px,5px,5px,5px;
		    	display:none;
				width:300px;
				left:670px;
				top:410px;
				position:fixed;
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
</style>
</head>
<body>

<a href="index.php"><img id="i2" src="mnnit.gif" /></a>
<!--<img id="i1" src="mnnitheader.gif" />-->
<div id="header"></div>
<p id="p1">MNNIT</p>
<p id="p2">GRIEVANCE PORTAL</p>

<div id="div2">
<script language="JavaScript" type="text/javascript">
	AC_FL_RunContent(
		'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0',
		'width', '100%',
		'height', '100%',
		'src', 'piecemaker',
		'quality', 'high',
		'pluginspage', 'http://www.adobe.com/go/getflashplayer_de',
		'align', 'middle',
		'play', 'true',
		'loop', 'true',
		'scale', 'noscale',
		'wmode', 'window',
		'devicefont', 'false',
		'id', 'piecemaker',
		'bgcolor', '676767',
		'name', 'piecemaker',
		'menu', 'true',
		'allowFullScreen', 'false',
		'allowScriptAccess','sameDomain',
		'movie', 'piecemaker',
		'salign', ''
		); //end AC code
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="100%" height="100%" id="piecemaker" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="piecemaker.swf" /><param name="quality" value="high" /><param name="scale" value="noscale" /><param name="bgcolor" value="#ffffff" />	<embed src="piecemaker.swf" quality="high" scale="noscale" bgcolor="#ffffff" width="100%" height="100%" name="piecemaker" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_de" />
  </object>
</noscript>
</div>
<div id="div3">
 <ul class="ca-menu">
                    <li>
                        <a href="query.php">
                            <span class="ca-icon"><img src="complaint.gif"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">File a<br>Grievance</h2>
                                <h3 class="ca-sub">Click here <br />to lodge a <br />Grievance</h3>
                            </div>
                        </a>
                    </li>
                    <br>
                    <li>
                        <a href="checkstatus.php">
                            <span class="ca-icon"><img src="queue.png"></span>
                            <div class="ca-content">
                                <h2 class="ca-main">Check <br>Status</h2>
                                <h3 class="ca-sub">Click here <br />to check status<br />
     of your Grievance</h3>
                            </div>
                        </a>
                    </li>
  </ul>
</div>
<div id="div1">
<div id="sub1div1">
<form id="form1" action="" method="post"><p>Student's Login</p>
<table>
<tr class="tr1"><td align="right">REG NO:</td><td><input required="required" name="regno" type="text" placeholder="  Enter username " onkeydown="blankl()"  /></td></tr>
<tr><td><br /></td><td><span id="pro1s" ></span></td></tr>
<tr class="tr1"><td align="right">PASSWORD:</td><td><input  required="required" type="password" name="pass" placeholder=" Enter password " onkeydown="blankl()" /></td></tr>
<tr><td><br /></td><td><span id="pro2s" ></span></td></tr>
<tr>
  <td id="td1"><input id="ip1" type="submit" value=" LOG IN " style="border-radius:6px;" name="login" /></td><td id="td2"><a href="forgotpassword.php"><input type="button" value="Forgot Password" style="border-radius:8px; padding:2px;" /></a></td></tr>
</table>
</form>
</div>

<div id="sub3div1">
<form id="form2" action="" method="post"><p>For Office Use</p>
<table>
<tr class="tr1"><td align="right">REG NO:</td><td><input required="required" name="headregno" type="text" placeholder="  Enter username "  onkeydown="blank()"/></td></tr><tr><td><br /></td><td><span id="pro1" ></span></td></tr>
<tr class="tr1"><td align="right">PASSWORD:</td><td><input required="required" name="headpass" type="password" placeholder=" Enter password " onkeydown="blank()"/></td></tr><tr><td><br /></td><td><span id="pro2" ></span></td></tr>
<tr><td id="td1"><input id="ip1" type="submit" value="LOG IN !" name="departlogin" /></td></tr>
</table>
</form></div>
</div>

<div id="div4"></div>
<div id="div5">
<form id="form3" action="details%20submitted.php" method="post" onsubmit="return check()">
<table style="top:26%; left:30%; position:fixed; width:600px; overflow:scroll; height:360px;" cellpadding="2px;" cellspacing="1px" >
<tr>
<th align="right">USER NAME:</th>
<td><input  required="required" type="text"  id="user" name ="user"  style="width:300px; height:20px; border-radius:10px; padding-left:5px;" onkeyup="check1()"/><span id="error1" class="error"></span>
</td>
</tr>
<tr>
<th align="right" >GENDER:</th>
<td><input type="radio" name="gender"  required="required" style="width:20px; height:15px;" value="Male"/><div class="div6">Male</div>
<input   required="required" type="radio" name="gender" style="width:20px; height:15px;" value="Female" /><div class="div6">Female</div></td>
</tr>
<tr>
<th align="right" ><span style="position:relative; top:2px;">COURSE:</span></th>
<td><div class="div6" onclick="func1()">&nbsp;&nbsp;&nbsp;UG
<input type="radio" name="education"  required="required"/>
<select name="qualification" disabled="disabled" id="1" style="width:170px; height:20px; border-radius:10px;" >
<optgroup label="B Tech">
<option value="Electrical">Electrical</option>
<option value="Mechanical">Mechanical</option>
<option value="Chemical">Chemical</option>
<option value="Computer Science">Computer Science</option>
<option value="Biotech">Biotech</option>
<option value="Computer Science">Information Technology</option>
<option value="Civil">Civil</option>
<option value="Electronics & Commmunication">Electronics & Communication</option>
<option value="Production">Production</option>
</optgroup>
</select>
</div>
<div class="div6" onclick="func2()">
&nbsp;&nbsp;G<input type="radio" name="education" required="required"/>
<select name="qualification" disabled="disabled" id="2" style="width:100px; height:20px; border-radius:10px;">
<option value="Computer Science"><b>MCA</b></option>
<optgroup label="M Tech">
<option value="Mechanical">Mechanical</option>
<option value="Electrical">Electrical</option>
<option value="Computer Science">Computer Science</option>
</optgroup>
<option value="Management Studies"><b>MBA</b></option>
</select>

</div>
<div class="div6" onclick="func3()">
&nbsp;&nbsp;&nbsp;PG<input type="radio" name="education"  required="required"/>
<select name="qualification" disabled="disabled"  id="3"  style="width:100px; height:20px; border-radius:10px; left:924px; position:fixed;"> 
<option value="Ph.d"><b>Ph.d</b></option>
</select>
</div>
</td>
</tr>
<tr>
<th align="right"><b style="top:45.0%; position:fixed; left:29.5%;">SECURITY QUESTION:</b><br /><br /><br /><b style="position:relative; top:6.5px;">ANSWER:</b></th>
<td>
<select name="secret"  style="width:300px; height:25px; border-radius:10px;">
<option value="0">choose your security question</option>
<option value="1">what is the name of your first pet?</option>
<option value="2">who was your first teacher?</option>
<option value="3">what city was your father born in?</option>
<option value="4">what is your mother's middle name?</option>
<option value="5">what was the name of the first school you attended?</option>
</select>
<br  />
<input type="text" name="answer" style="width:200px; height:20px; border-radius:10px; top:17px; position:relative;" required="required" required="required" />
</td>
</tr>
<tr >
<th align="right">D.O.B:</th>
<td>
<div>
<select name="date"  style="width:40px; height:19px; border-radius:10px;">
<?php
echo "<option value=\"0\">".""."</option>";
for($i=1;$i<=31;$i++)
echo "<option value=\"$i\">".$i."</option>";
?>
</select>
/
<select name="month" style="width:51px; height:19px; border-radius:10px;" >
<?php
echo "<option value=\"0\">".""."</option>";
for($i=1;$i<=12;$i++)
echo "<option value=\"$i\">".date("M",$i*3600*24*29)."</option>"
?>
</select>
/
<select name="year" style=" height:19px; width:52px; border-radius:10px;">
<?php
echo "<option value=\"0\">".""."</option>";
for($i=1989;$i<=1997;$i++)
echo "<option value=\"$i\">".$i."</option>";
?>
</select>
</div>
</td>
</tr>

<tr>
<th align="right">ACCOMODATION:</th>
<td>
<input type="radio" value="Day Scholar" name="hostel" required="required" onclick="hide()" style="width:20px; height:15px;" / ><div class="div6">Day Scholar</div>
<input name="hostel" type="radio" required="required" onclick="show()" style="width:20px; height:15px;"/><div class="div6">Hosteller</div>
<select name="hostel"  style="width:170px; height:20px; border-radius:10px;"  disabled="disabled" id="h">
<option value="0">choose your hostel</option>
<option value="Tagore">R.N.Tagore</option>
<option value="Raman">C.V.Raman</option>
<option value="Tilak">Tilak</option>
<option value="Patel">S.V.Patel</option>
<option value="MEGA">Swami Vivekanad</option>
<option value="Tandan">P.D.Tandan</option>
<option value="KNGH">KNGH</option>
<option value="Malviya">Malviya</option>
</select>

</td>
</tr>

<tr>
<br />
<th align="right">PASSWORD:</th>
<td><input type="password" id="pass" name="pass" style="width:120px; height:20px; border-radius:15px; padding-left:5px;" required="required" onmouseout="HideDef('validpass');" onmouseover="ShowDef('validpass');"/> 
</td>
</tr>
<tr>
<th align="right">CONFIRM<br /> PASSWORD:</th>
<td><input type="password" id="pass2" name="pass2" style="width:120px; height:20px; border-radius:15px; padding-left:5px;" required="required" /> 
</td>
</tr>
<tr>
<th align="right">REG. NO. :</th>
<td><input type="text"   required="required" name="regno" id="regno" style="width:100px; height:20px; border-radius:15px; padding-left:5px;" /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" style="width:130px; height:60px; position:absolute; border-radius:175px; padding:2px; left:65%; top:80%; border:solid
; box-shadow:4px 3px 3px;" value="submit" /></td>
</tr>
</table>
</form>
</div>
<span class="DefStyle" id="validpass" >password should be the same <br />as on the academics portal<br /></span>
<div id="footer">
Copyright © MNNIT Allahabad. All rights reserved;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
For Suggestions and Feedback please contact academics@mnnit.ac.in
</div>
<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/img01.jpg" alt="MP HALL" title="MP HALL" id="wows1_0"/>Convocation</li>
<li><img src="data1/images/img02.jpg" alt="CAMPUS" title="CAMPUS" id="wows1_1"/>Front View</li>
<li><img src="data1/images/img03.jpg" alt="CLASS" title="CLASS" id="wows1_2"/>Main building</li>
<li><img src="data1/images/img04.jpg" alt="MP HALL" title="MP HALL" id="wows1_3"/>Culrav Event</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="MP HALL"><img src="data1/tooltips/img01.jpg" alt="MP HALL"/>1</a>
<a href="#" title="CAMPUS"><img src="data1/tooltips/img02.jpg" alt="CAMPUS"/>2</a>
<a href="#" title="CLASS"><img src="data1/tooltips/img03.jpg" alt="CLASS"/>3</a>
<a href="#" title="MP HALL"><img src="data1/tooltips/img04.jpg" alt="MP HALL"/>4</a>
</div></div>
<div class="ws_shadow"></div>
	</div>
<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
    <img id="indchk" src="register7.gif" />
    <script>
	$(function(e) {
		$("#indchk").click(function(e) {
			$("#div4").show(400,function(e){
				$("#div5").fadeIn(1000);
			});
		});
	});
	$(function(e) {
		$("#div4").click(function(e) {
			  $("#div5").fadeOut(100,function(e) {
				  $("#div4").hide(1);
			  });
		});
	});
	function check()
{
	if(confirm("select ok to register else select cancel to reset"))
	return true;
	else
	return false;
}
	function show(){
document.getElementById('h').disabled=false;}
function hide(){
document.getElementById('h').disabled=true;}
    function ShowDef(definitionObjectName)
			{
			    document.getElementById(definitionObjectName).style.display="block";
			}
			

			function HideDef(definitionObjectName)
			{
				document.getElementById(definitionObjectName).style.display="none";
			}
function func(){
window.location.href='logout.php';}
    </script>
<?php
	include_once("functions.php");
	if(isset($_POST['login']))
	{
	$regno=fix($_POST['regno']);
		$pass=fix($_POST['pass']);
		$con=connect_db();
		$query="select * from students where regno=\"$regno\"";
		$res=mysqli_query($con,$query);	
		if(!$res)
		{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR : Couldn't connect to database.Please try again</b><br /></center>";
echo "<script>
setTimeout(function(){window.location.href='index.php'},3000);</script>";
			die();
		}
		 elseif(mysqli_num_rows($res)==1){
			$result=mysqli_fetch_array($res);
			if($result['pass']==$pass){
		session_start();
				$_SESSION['user']=$result['user'];
				$_SESSION['regno']=$regno;
				$_SESSION['time']=time();
				$_SESSION['hostel']=$result['hostel'];
				$_SESSION['qualification']=$result['qualification'];
			
				/*echo "<script>fu()</script>";*/
		echo "<script>	setTimeout(function(){window.location.href='show_posts.php?no=0'});</script>";
			}
			else 
			{
		echo "<script>funcs('pro2s','invalid password');</script>";
			die();
			}
		}
		else 
			{
		echo "<script>funcs('pro1s','invalid registration no.');</script>";
				die();
			}
	}
?>
<?php
	include_once("functions.php");
	if(isset($_POST['departlogin']))
	{
	$regno=fix($_POST['headregno']);
		$pass=fix($_POST['headpass']);
		$con=connect_db();
		$query="select * from head where `headregno`=\"$regno\"";
		$res=mysqli_query($con,$query);	
		if(!$res)
		{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR : Couldn't connect to database.Please try again</b><br /></center>";
echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";

			die();
		}
		else if(mysqli_num_rows($res)==1){
			$result=mysqli_fetch_array($res);
			if($result['headpass']==$pass){
					session_start();
				$_SESSION['time']=time();
				$_SESSION['admin']=$result['admin'];
				$_SESSION['designation']=$result['designation'];
				$_SESSION['headregno']=$result['headregno'];
				$_SESSION['headqualification']=$result['headqualification'];
				/*echo "<script>fu()</script>";*/
	echo "<script>
	setTimeout(function(){window.location.href='viewquery.php?num=0'});</script>";
			}
			else 
			{
		echo "<script>funcs('pro2','invalid password');</script>";
			die();
			}
		}
		else 
			{
echo "<script>funcs('pro1','invalid registration no.');</script>";
				die();
			}
	}
?>
</body>
</html>