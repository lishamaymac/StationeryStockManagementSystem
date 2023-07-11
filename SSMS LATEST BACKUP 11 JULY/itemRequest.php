<?php
include("setting.php");
session_start();
if (!isset($_SESSION['sid'])) {
	header("location:index.php");
}
$sid = $_SESSION['sid'];
$a = mysqli_query($set, "SELECT * FROM staff WHERE sid='$sid'");
if (!empty($_POST)) {
	// Check Quantity
	$data = mysqli_fetch_array(mysqli_query($set, "SELECT * FROM items WHERE name = '" . $_POST['name'] . "'"));
	if (($data['quantity']) < $_POST['qty'])
	 {
		//$msg = "Out of Stock";
		
			?>
				<script>
					alert ('Out of Stock! Please try later');
					window.location = 'itemRequest.php';
					</script>
			<?php
		
	} else {

		$sql = mysqli_query($set, "INSERT INTO issue(item_code,name,quantity,date,status,sid) VALUES('".$data['item_code']."','" . $_POST['name'] . "','" . $_POST['qty'] . "','" . date('d-m-Y') . "','Pending','$sid')");
		mysqli_query($set, "UPDATE items SET quantity = quantity - '".$_POST['qty']."' WHERE name = '" . $_POST['name'] . "'");
		if ($sql) {
			//$msg = "Successfully saved";
			?>
            <script>
                alert('Thankyou for your request. We will be processed your request within 3 working days.');
                window.location = 'itemRequest.php';
                </script>
        <?php
		} else {
			//$msg = "Error ";
			?>
            <script>
                alert('Error! Please Try Again.');
                window.location = 'itemRequest.php';
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

				<span class="SubHead">REQUEST STATIONERY</span>
				<br />
				<br />
				<form method="post" action="">
					<table border="0" class="table" cellpadding="10" cellspacing="10">
						<tr>
							<td colspan="2" align="center" class="msg"><?php echo $msg; ?></td>
						</tr>
						<tr>
							<td class="labels">Item Name: </td>
							<td><select name="name" class="fields" required>
									<option value="" disabled="disabled" selected="selected"> - - Select Available Items - -</option>
									<?php
									$x = mysqli_query($set, "SELECT * FROM items");
									while ($y = mysqli_fetch_array($x)) {
									?>
										<option value="<?php echo $y['name']; ?>"><?php echo $y['name'] . " [" . $y['quantity'] . "]"; ?></option>
									<?php
									}
									?>
								</select></td>
						</tr>
						<tr>
							<td class="labels">Item Quantity: </td>
							<td><input type="number" class="fields" required name="qty"></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" value="Request" class="fields" /></td>
						</tr>
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