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
$itemCode = $_POST['code'];
if($bn != NULL && $qt != NULL && $itemCode != NULL)
{
	$sql = mysqli_query($set, "SELECT * FROM items WHERE item_code = '$itemCode'");
if (mysqli_num_rows($sql) > 0) {
    ?>
        <script>
            alert('Error! Item Code Already Exists.');
            window.location = 'manageItems.php';
        </script>
    <?php
} else {
    $sql = mysqli_query($set, "INSERT INTO items(name,quantity,item_code) VALUES('$bn','$qt','$itemCode')");
    if ($sql) {
        ?>
            <script>
                alert('Successfully Added');
                window.location = 'manageItems.php';
            </script>
        <?php
    } else {
        ?>
            <script>
                alert('Error! Failed to Add Item.');
                window.location = 'manageItems.php';
            </script>
        <?php
    }
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

<span class="SubHead">Add Items</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr> 
<tr><td class="labels">Item Code: </td><td><input type="text" name="code" placeholder="Enter Item Code" size="25" class="fields" required="required"  /></td></tr>
<tr><td class="labels">Item Name: </td><td><input type="text" name="name" placeholder="Enter Item Name" size="25" class="fields" required="required"  /></td></tr>
<tr><td class="labels">Quantity: </td><td><input type="text" name="quantity" placeholder="Enter Items Quantity" size="25" class="fields" required="required"  /></td></tr></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Submit" class="fields" /></td></tr>
</table>
</form>
<br />
<br>
<span class="SubHead">Update Items</span>
<br /><br />
<table border="0" class="table" cellpadding="5" cellspacing="6">
	<tr  class="labels">
	<th>#</th>
	<td>Item Code</td>
	<td>Item Name</td>
	<td>Quantity</td>
	<td>Action</td>
	</tr>
	<?php 
	$sr=1;
	$sql2 = mysqli_query($set, "SELECT * FROM items ORDER BY name ASC");
	while($pr = mysqli_fetch_array($sql2))
	{
		?>
			<tr>
				<td class="labels"><?php echo $sr++;?></td>
				<td class="labels"><?php echo $pr['item_code'];?></td>
				<td class="labels"><?php echo $pr['name'];?></td>
				<td class="labels"><?php echo $pr['quantity'];?></td>
				<td>
					<a href="edit-item.php?id=<?php echo $pr['id'];?>"><img src="images/edit.png" height="22" width="22" title="Edit"></a>&nbsp;&nbsp;
					<a href="delete-item.php?id=<?php echo $pr['id'];?>"><img src="images/delete.png" height="22" width="22" title="Delete" onclick="return confirm('Are you sure?');"></a>
				</td>
			</tr>
		<?php
	}
	?>
</table>
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