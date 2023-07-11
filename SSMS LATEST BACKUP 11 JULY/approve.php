<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}

$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM staff WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$date=date('d/m/Y');
if(!empty($_GET))
{
	if($_GET['a'] == "1")
	{
		mysqli_query($set,"UPDATE issue SET status = 'Approved' WHERE id = '".$_GET['r']."'");
		$qty = $_GET['qty'];
		//echo $_GET['item'];
		//mysqli_query($set,"UPDATE items SET quantity = quantity - '".$qty."' WHERE name = '".$_GET['item']."'");
	}
	elseif($_GET['a'] == "2")
	{
		$qty = $_GET['qty'];
		//echo $qty;
		mysqli_query($set,"UPDATE issue SET status = 'Rejected' WHERE id = '".$_GET['r']."'");
		mysqli_query($set,"UPDATE items SET quantity = quantity + '".$qty."' WHERE name = '".$_GET['item']."'");

	}
	header("location:issue.php");
}

?>