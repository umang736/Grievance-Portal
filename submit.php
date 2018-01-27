<?php
	include_once("functions.php");
	$regno=fix($_POST['regno']);
		$pass=fix($_POST['pass']);
		$con=connect_db();
		$query="select * from students where regno=\"$regno\"";
		$res=mysqli_query($con,$query);	
		if(!$res)
		{
echo "<br/><br/><br/><br/><br/><center> <b>ERROR : Couldn't connect to database.Please try again</b><br />redirecting to login page</center>";
echo "<script>
		setTimeout(function(){window.location.href='login.php'},3000);</script>";
			die();
		}
		elseif(mysqli_num_rows($res)==1){
			$result=mysqli_fetch_array($res);
			if($result['pass']==$pass){
		session_start();
				$_SESSION['user']=$result['user'];
				$_SESSION['regno']=$regno;
				$_SESSION['hostel']=$result['hostel'];
				$_SESSION['qualification']=$result['qualification'];
				echo "<br/><br/><br/><br/><br/><center><b>Login Successfull</b><br />redirecting to index page</center>";
		echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";
			}
			else 
			{
			echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Invalid Password</b><br />redirecting to login page</center>";
echo "<script>
		setTimeout(function(){window.location.href='login.php'},3000);</script>";
			die();
			}
		}
		else 
			{
			echo "<br/><br/><br/><br/><br/><center> <b>ERROR :Invalid Reg. No.</b><br />redirecting to login page</center>";
echo "<script>
		setTimeout(function(){window.location.href='login.php'},3000);</script>";
				die();
			}
?>