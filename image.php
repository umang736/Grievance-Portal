<?php
include_once('functions.php');
  if(isset($_GET['id']))
  {
  $con=connect_db();
  $idpic=$_GET['id'];
  $query = "SELECT img FROM pic where `idpic`=\"$idpic\"";
  $result = mysqli_query($con,$query);
  if(!$result)
  {
	echo "error ".mysqli_error($con);  
  die();
  }
  while($row = mysqli_fetch_array($result))
  {
  header("Content-type: image/jpeg");
  echo $row['img']; 
  }
  mysql_close($link);
  }
?>