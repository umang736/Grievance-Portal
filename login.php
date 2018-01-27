<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<title>login</title>
       <link rel="shortcut icon" href="../javascript/logo_in_title.ico"> 
		<style type="text/css" >
.error{
	color:#F00;	
}</style>
<script  type="text/javascript" src="script.js"></script>
<script>
function func(pro,str)
{
	document.getElementById(pro).innerHTML=str;
document.getElementById(pro).style.color="#F00";
}
function blank()
{
	document.getElementById("pro1").innerHTML="";
	document.getElementById("pro2").innerHTML="";
}
function fu()
{
	document.getElementById("login").style.visibility="hidden";
}
</script>
    </head>
    
    <body>
        <center>
        	<br /><br /><br /><br /><br />
            <form action="" method="post" id="login">
            <table style="top:30%; left:30%; position:fixed; width:500px;" border="1px" cellpadding="10px;" cellspacing="5px">
                <tr><th align="right">Reg. No.</th><td><input  type="text"  required="required" id="user"  onkeyup="check1()" name="regno" style="position:static;" align="left" onkeydown="blank()" /><span id="error1" class="error" style="position:fixed;"></span><br />               <span id="pro1" ></span></td>
                </tr>
                <tr><th align="right">Password</th><td><input  required="required" type="password" id="pass" onkeyup="check2()"  name="pass"  style="position:static;" align="left" onkeydown="blank()"/><span id="error2" class="error" style="position:fixed;"></span><br /> <span id="pro2" ></span></td></tr>
                <tr><td colspan="2"><input type="submit" value="Login" name="login" />
                </td>
            </tr>
            </table>
            </form>
        </center>
    </body>
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
				$_SESSION['time']=time();
				$_SESSION['hostel']=$result['hostel'];
				$_SESSION['qualification']=$result['qualification'];
				echo "<script>fu()</script>";
				echo "<br/><br/><br/><br/><br/><center><b>Login Successfull</b><br />redirecting to index page</center>";
		echo "<script>
		setTimeout(function(){window.location.href='index.php'},3000);</script>";
			}
			else 
			{
		echo "<script>func('pro2','invalid password');</script>";
			die();
			}
		}
		else 
			{
		echo "<script>func('pro1','invalid registration no.');</script>";
				die();
			}
	}
?>
</html>
