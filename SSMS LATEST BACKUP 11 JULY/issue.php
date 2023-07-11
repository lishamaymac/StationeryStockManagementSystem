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

<span class="SubHead">ISSUE APPROVAL</span>
<br />
<br />

<table border="0" class="table" cellpadding="6" cellspacing="6">
<tr class="labels" style="text-decoration:underline;"><th>Item Code</th><th>Item Name</th><th>Quantity</th><th>Issued By<br>Staff ID</th><th>Date</th><th>Status</th></tr>
<?php
$x=mysqli_query($set,"SELECT * FROM issue");
while($y=mysqli_fetch_array($x))
{
?>
<tr class="labels" style="font-size:14px;"><td><?php echo $y['item_code'];?></td><td><?php echo $y['name'];?></td><td><?php echo $y['quantity'];?></td><td><?php echo $y['sid'];?></td>
<td><?php echo $y['date'];?></td><td>
<a href="approve.php?r=<?php echo $y['id']."&a=1&qty=".$y['quantity']."&item=".$y['name'];?>" class="link" style="<?php if($y['status'] == "Approved") { echo "color:green;"; }?>">Approve</a>
	<a href="approve.php?r=<?php echo $y['id']."&a=2&qty=".$y['quantity']."&item=".$y['name'];?>" class="link" style="<?php if($y['status'] == "Rejected") { echo "color:red;"; }?>">Reject</a>
</td>
</tr>
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
