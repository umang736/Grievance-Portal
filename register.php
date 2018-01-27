<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>register</title>
<link rel="shortcut icon" href="../javascript/logo_in_title.ico">
<style type="text/css" >
.error{
	color:#F00;	
}
div{display:inline;width:200px;}
</style>
<script type="text/javascript">
function show(){
document.getElementById('h').disabled=false;}
function hide(){
document.getElementById('h').disabled=true;}
function check()
{
	if(confirm("make sure all the details are correct according to your knowledge"))
	return true;
	else
	return false;
}
</script>
</head>
<marquee align="top" style="marquee-style:alternate; font-size:44px; color:#F00;">All columns are mandatory</marquee>
<body bgcolor="#009999">
<form action="details submitted.php" method="post"  onsubmit="return check()">
<table style="top:10%; left:20%; position:fixed; width:800px; overflow:scroll; height:560px;" border="1px" cellpadding="10px;" cellspacing="5px" >
<tr>
<th align="right">NAME:</th>
<td><input required="required" type="text"  id="user" name ="user"  style="width:400px; height:20px;" onkeyup="check1()"/><span id="error1" class="error"></span>
</td>
</tr>
<tr>
<th align="right">GENDER:</th>
<td> <input type="radio" name="gender"  required="required" value="Male"/><div >Male</div>
<input   required="required" type="radio" name="gender" value="Female" /><div>Female</div></td>
</tr>
<tr>
<th align="right">COURSE:</th>
<td><div >UG
<input type="radio" name="education"  required="required" onclick="func1()"/>
<select name="qualification" disabled="disabled" id="1" style="width:160px; height:20px;" >
<optgroup label="B Tech">
<option value="Electrical">Electrical</option>
<option value="Mechanical">Mechanical</option>
<option value="Computer Science">Computer Science</option>
<option value="Biotech">Biotech</option>
<option value="Computer Science">Information Technology</option>
<option value="Civil">Civil</option>
<option value="Electronics & Commmunication">Electronics & Communication</option>
<option value="Production">Production</option>
</optgroup>
</select>
</div>
<div >
G<input type="radio" name="education" required="required" onclick="func2()"/>
<select name="qualification" disabled="disabled" id="2" style="width:160px; height:20px;">
<option value="Computer Science"><b>MCA</b></option>
<optgroup label="M Tech">
<option value="Mechanical">Mechanical</option>
<option value="Electrical">Electrical</option>
<option value="Computer Science">Computer Science</option>
</optgroup>
<option value="Management Studies"><b>MBA</b></option>
</select>
</div>
<div >
PG<input type="radio" name="education"  required="required" onclick="func3()"/>
<select name="qualification" disabled="disabled"  id="3"  style="width:160px; height:20px;"> 
<option value="Ph.d"><b>Ph.d</b></option>
</select>
</div>
</td>
</tr>
<tr>
<th align="right"><b style="top:38%; position:fixed; left:21%;">security question</b><br />answer</th>
<td>
<select name="secret"  style="width:300px; height:20px;">
<option value="0"></option>
<option value="1">what is the name of your first pet?</option>
<option value="2">who was your first teacher?</option>
<option value="3">what city was your father born in?</option>
<option value="4">what is your mother's middle name?</option>
<option value="5">what was the name of the first school you attended?</option>
</select>
<br  />
<input type="text" name="answer" style="width:200px; height:15px;" required="required" required="required" />
</td>
</tr>
<tr >
<th align="right">D.O.B:</th>
<td>
<div>
<select name="date"  style="width:42px;">
<?php
echo "<option value=\"0\">"."d"."</option>";
for($i=1;$i<=31;$i++)
echo "<option value=\"$i\">".$i."</option>";
?>
</select>
/
<select name="month" style="width:53px;" >
<?php
echo "<option value=\"0\">"."mm"."</option>";
for($i=1;$i<=12;$i++)
echo "<option value=\"$i\">".date("M",$i*3600*24*29)."</option>"
?>
</select>
/
<select name="year">
<?php
echo "<option value=\"0\">"."yyyy"."</option>";
for($i=1993;$i<=1996;$i++)
echo "<option value=\"$i\">".$i."</option>";
?>
</select>
</div>
</td>
</tr>

<tr>
<th align="right">Accomodation:</th>
<td>
<div >
<input type="radio" value="Day Scholar" name="hostel" required="required" onclick="hide()"/>Day Scholar</div>
<div >
<input name="hostel" type="radio" required="required" onclick="show()"/>Hosteller
<select name="hostel" disabled="disabled" id="h">
<option value="0">choose your hostel</option>
<option value="Tagore">Tagore</option>
<option value="Raman">Raman</option>
<option value="Tilak">Tilak</option>
<option value="Patel">Patel</option>
<option value="MEGA">MEGA</option>
<option value="Tandan">Tandan</option>
<option value="KNGH">KNGH</option>
</select>
</div>
</td>
</tr>
<tr>
<th align="right">REG. NO. :</th>
<td><input type="text"   required="required" name="regno" id="regno" style="width:200px; height:20px;"  onkeyup="check4()" />
<span id="error4" class="error"></span></td>
</tr>
<tr>
<th align="right">PASSWORD:</th>
<td><input type="password"  required="required" id="pass"  onkeyup="check2()" name="pass" style="width:200px; height:20px;" /> 
<span id="error2" class="error"></span></td>
</tr>
<tr>
<th align="right" style="font-size:18px;">CONFIRM<br /> PASSWORD:</th>
<td><input type="password" id="pass2" name="pass2"  onkeyup="check3()" style="width:200px; height:20px;" required="required" /> 
<span id="error3" class="error"></span></td>
</tr>

<tr>
<td colspan="2"><input type="submit" style="width:100px;" value="submit" /></td>
</tr>
</table>
</form>
 <script src="script.js" type="text/javascript"></script>
</body>
</html>
