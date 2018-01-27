<html>
<head>
<link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body >
<a href="index.php"><img id="i2" src="mnnit.gif" /></a>
<!--<img id="i1" src="mnnitheader.gif" />-->
<div id="header"></div>
<p id="p1">MNNIT</p>
<p id="p2">GRIEVANCE PORTAL</p>
<?php

include_once('functions.php');
$user=fix($_POST['user']);
$gender=$_POST['gender'];
$date=$_POST['date'];
$month=$_POST['month'];
$year=$_POST['year'];
$regno=fix($_POST['regno']);
$qualification=$_POST['qualification'];
$pass=fix($_POST['pass']);
$pass2=fix($_POST['pass2']);
$hostel=$_POST['hostel'];
$secret=$_POST['secret'];
$answer=fix($_POST['answer']);
if($date==0||$month==0||$year==0||$hostel==='0'||$secret==0)
{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR : Fill all entries</b><br />redirecting to home page</center>";
echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";
}
else if(strlen($user)<5)
{
	echo "<br/><br/><br/><br/><br/><center> <b>ERROR : Username too short</b><br />redirecting to home page</center>";
echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";
}
else if(strlen($regno)<5)
{
	echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Wrong Reg.No. </b><br />redirecting to home page</center>";
echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";
}
else if($pass!=$pass2)
{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR : password mismatch</b><br />redirecting to home page</center>";
echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";
}
else
{
	/*
echo "your D.O.B is ".$dob."<br />";
echo "your gender is ".$gender."<br />";
echo "your name is ".$user."<br />";
echo "your password is ".$pass."<br />";
echo "your qualification is ".$qualification."<br />";
echo "your reg. no. is ".$regno."<br />";
		*/
		$dob=$date."/".$month."/".$year;
		$con=connect_db();
		$query="SELECT * FROM validusers where `regno`=\"$regno\" and `pass`=\"$pass\" and `qualification`=\"$qualification\"";
		$result=mysqli_query($con,$query);
		if(!$result)
		{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR : Unable to connect to database.Please try again</b><br />redirecting to home page</center>";
echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";
			die();
		}
		else if(mysqli_num_rows($result)==0)
		{
			echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Couldn't find  you in academic portal database</b><br />redirecting to home page</center>";
echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";
			die();
		}
		$query="SELECT * FROM students where `regno`=\"$regno\"";
		$result=mysqli_query($con,$query);
		if(!$result)
		{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR : Unable to connect to database.Please try again</b><br />redirecting to home page</center>";
echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";
			die();
		}
		else if(mysqli_num_rows($result)==0)
		{
		$query="INSERT INTO students(`user`,`gender`,`qualification`,`dob`,`hostel`,`pass`,`regno`,`secret`,`answer`) VALUES(\"$user\",\"$gender\",\"$qualification\",\"$dob\",\"$hostel\",\"$pass\",\"$regno\",\"$secret\",\"$answer\")";
		if(!mysqli_query($con,$query)) {
			echo "<br/><br/><br/><br/><br/><center> <b>Unable to connect to database.Please try again</b><br />redirecting to home page</center>"; 
			echo "<script>setTimeout(function(){window.location.href='index.php'},3000);</script>";
			die();
		}
		else
		{
			mysqli_close($con);
		echo "<br/><br/><br/><br/><br/><center><b>Registration Successfull</b><br />redirecting to home page</center>";
		echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";
		}
		
		}
		else
		{
			echo "<br/><br/><br/><br/><br/><center> <b>ERROR : Registration no. already  in use</b><br />redirecting to home page</center>";
echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";
			die();
		}
}
?>
</body>
</html>
