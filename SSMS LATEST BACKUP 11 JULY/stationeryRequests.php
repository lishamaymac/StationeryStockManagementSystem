<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$bn=$_POST['name'];
$qt=$_POST['quantity'];
if($bn!=NULL && $qt!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO items(name,quantity) VALUES('$bn','$qt')");
	if($sql)
	{
		$msg="Successfully Added";
	}
	else
	{
		$msg="Item Already Exists";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SSMS</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<div align = "center">
<br />
<span class="head">Stationery Stock Management System</span><br />
</div>
<br />
<br />
<br />
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">STATIONERY REQUEST by STAFF</span>
<br />
<br />

<table border="0" class="table" cellpadding="6" cellspacing="6">
<tr class="labels" style="text-decoration:underline;"><th>Item Name</th><th>Quantity</th><th>Requested by<br>(Staff ID)</th>
<th>Staff Name</th>
</tr>
<?php
$x=mysqli_query($set,"SELECT * FROM request");
while($y=mysqli_fetch_array($x))
{
	$staffName = mysqli_fetch_array(mysqli_query($set,"SELECT name FROM staff WHERE sid = '".$y['sid']."'"));
	?>
<tr class="labels" style="font-size:14px;"><td><?php echo $y['name'];?></td><td><?php echo $y['quantity'];?></td><td><?php echo $y['sid'];?></td><td><?php echo $staffName['name'];?></td></tr>
<?php
}
?>
</table><br />
<br />
<a href="adminhome.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>