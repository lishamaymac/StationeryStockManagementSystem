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
if(!empty($_POST))
{
	$sql=mysqli_query($set,"UPDATE items SET name = '".$_POST['name']."', quantity='".$_POST['quantity']."' WHERE id = '".$_POST['id']."'");
	
    if($sql)
	{
		?>
            <script>
                alert('Updated');
                window.location = 'manageItems.php';
                </script>
        <?php
	}
	else
	{
		?>
            <script>
                alert('Error! Please try later');
                window.location = 'manageItems.php';
                </script>
        <?php
	}
}
if(!empty($_GET))
{
    $data = mysqli_fetch_array(mysqli_query($set,"SELECT * FROM items WHERE id = '".$_GET['id']."'"));
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

<span class="SubHead">Manage Item: <?php echo $data['name'];?></span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="labels">Item Name : </td><td><input type="text" name="name" placeholder="Enter Items Name" size="25" class="fields" required="required" value="<?php echo $data['name'];?>"  /></td></tr>
<tr><td class="labels">Quantity : </td><td><input type="text" name="quantity" placeholder="Enter Items Quantity" size="25" class="fields" required="required" value="<?php echo $data['quantity'];?>"  /></td></tr></tr>
<tr><td colspan="2" align="center">
<input type="hidden" name="id" value="<?php echo $data['id'];?>">   
<input type="submit" value="Update" class="fields" /></td></tr>
</table>
</form>
<br />
<br>

<br />
<a href="adminhome.php" class="link">Go Back</a>
<br />
<br />
<br />

</div>
</div>
<br /><br /><br />
</body>
</html>