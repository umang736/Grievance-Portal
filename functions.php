<?php
	function fix($val){
		return htmlentities(trim($val));
	}
	function connect_db(){
		$con=mysqli_connect("localhost","root","umang736","testa");
		if(mysqli_connect_errno()){
			echo "<br><br><br><br><br><center><b>Error connecting to database</b></center>";
			die();
		}
		else
		return $con;
	}
	function autologout($str){
		$t=time();
		$t0=$_SESSION[$str];
		$diff=$t-$t0;
		if($diff>900)
		{
			return true;
		}
		else
		$_SESSION[$str]=time();
		}
?>