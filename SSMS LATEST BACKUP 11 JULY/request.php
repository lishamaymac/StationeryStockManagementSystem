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
$bn=$_POST['name'];
$qt=$_POST['quantity'];
if($bn!=NULL && $qt!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO request(name,quantity,sid) VALUES('$bn','$qt','$sid')");
	if($sql)
	{
		//$msg="Successfully Requested";
		?>
            <script>
                alert('Thankyou for your submission.');
                window.location = 'request.php';
                </script>
        <?php
	}
	else
	{
		//$msg="Request Already Exists";
		?>
            <script>
                alert('Error! Request Already Exists.');
                window.location = 'request.php';
                </script>
        <?php
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

<span class="SubHead">REQUEST UNAVAILABLE ITEM</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr> 
<tr><td class="labels">Item : </td><td><input type="text" size="25" class="fields" required="required" name="name" placeholder="Enter Item Name" /></td></tr>
<tr><td class="labels">Quantity : </td><td><input type="number" size="25" class="fields" required="required" name="quantity" placeholder="Enter Item Quantity" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" class="fields" value="Request" /></td></tr>
</table>
</form>

<br />
<br />
<a href="home.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>