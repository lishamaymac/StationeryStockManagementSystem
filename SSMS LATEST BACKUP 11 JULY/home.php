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
<div align="center">
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

<span class="SubHead">Welcome <?php echo $name;?></span>
<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr>
  <td>
	<div class="tooltip">
      <a href="itemRequest.php" class="Command">Request Stationery</a>
      <span class="tooltiptext">Click here to request available stationery items in the store.</span>
	  </div>
  <td>
    <div class="tooltip">
      <a href="request.php" class="Command">Issue Unlisted Item</a>
      <span class="tooltiptext">Click here to request an item that is not listed in the stationery inventory.</span>
    </div>
  </td>
  <td> <div class="tooltip">
      <a href="requestList.php" class="Command">Request Status</a>
      <span class="tooltiptext">Click here to view your approval status on your stationery request.</span>
	  </div>
  <td><a href="changePassword.php" class="Command">Change Password</a></td>
  <td><a href="logout.php" class="Command">Logout (<?php echo $name;?>)</a></td>
</tr>
</table>
<br />
<br />

<br />
<br />

</div>
</div>
</body>
</html>
