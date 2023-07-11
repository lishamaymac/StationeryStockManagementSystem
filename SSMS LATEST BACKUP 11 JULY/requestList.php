<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM staff WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$date=date('d/m/Y');
$bn=$_POST['name'];
if($bn!=NULL)
{
	$p=mysqli_query($set,"SELECT * FROM items WHERE id='$bn'");
	$q=mysqli_fetch_array($p);
	$bk=$q['name'];
	$qt=$q['quantity'];

	$sql=mysqli_query($set,"INSERT INTO issue(sid,name,quantity,date) VALUES('$sid','$bk','$qt','$date')");
	
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

<span class="SubHead">REQUEST LISTS</span>
<br />
<br />

<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr class="labels" style="text-decoration:underline;"><th>Item Name</th><th>Quantity</th><th>Date</th><th>Status</th></tr>
<?php
$x=mysqli_query($set,"SELECT * FROM issue WHERE sid ='$sid'");
while($y=mysqli_fetch_array($x))
{
	?>

<tr class="labels" style="font-size:14px;"><td><?php echo $y['name'];?></td><td><?php echo $y['quantity'];?></td>
<td><?php echo $y['date'];?></td><td><?php echo $y['status'];?></td>
</tr>
<?php
}
?>
</table><br />
<br />
<a href="home.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>