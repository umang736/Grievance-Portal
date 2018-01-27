<html>
<head>
</head>
<body>
<form action="pic.php" method="post" enctype="multipart/form-data">
<label>regno</label>
<input type="text" name="headregno"><br />
<label>image</label>
<input type="file" name="image"><br />
<input type="submit" value="submit" accept="image/*" >
</form>
<?php
include_once('functions.php');
$con=connect_db();
if(!isset($_FILES['image']['tmp_name']))
echo "please select some image";
else
{
	$img=addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$caption=addslashes($_FILES['image']['name']);
	$imgsize=getimagesize($_FILES['image']['tmp_name']);
	$idpic=$_POST['headregno'];
	if($imgsize==FALSE)
	echo "that's not an image";
	else
	{
		$query="INSERT INTO pic (`idpic`,`img`) VALUES (\"$idpic\",'$img')";
		if(!mysqli_query($con,$query))
		{
			echo "your image could not be uploaded".mysqli_error($con);
		}
		else
		{
		echo "your image uploaded successfully";
		echo "<img src=\"image.php?id=$idpic\" width=\"175\" height=\"200\" />";
		}
	}
}
?>
</html>