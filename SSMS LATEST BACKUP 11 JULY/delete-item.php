<?php
include("setting.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
if(!empty($_GET))
{
    $sql = mysqli_query($set,"DELETE FROM items WHERE id = '".$_GET['id']."'");
    if($sql)
	{
		?>
            <script>
                alert('Deleted');
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