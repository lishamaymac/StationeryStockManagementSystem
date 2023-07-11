<?php
include("setting.php");
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$sid=$_POST['sid'];
$pas=sha1($_POST['pass']);
if($name==NULL || $email==NULL || $phone==NULL || $sid==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($set,"INSERT INTO staff(sid,name,phone,password,email) VALUES('$sid','$name','$phone','$pas','$email')");
	if($sql)
	{
		//$msg="Successfully Registered";
		?>
            <script>
                alert('Successfully Registered');
                window.location = 'index.php';
                </script>
        <?php
	}
	else
	{
		//$msg="User Already Exists";
		?>
            <script>
                alert('Error! User Already Exists.');
                window.location = 'register.php';
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

<span class="SubHead">REGISTRATION</span>
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="4" cellspacing="4" class="table">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
</td>
<tr><td class="labels">Staff ID : </td><td><input type="text" name="sid" class="fields" placeholder="Enter Staff ID" required="required" size="25" /></td></tr>
<tr><td class="labels">Name : </td><td><input type="text" name="name" class="fields" placeholder="Enter Full Name" required="required" size="25" /></td></tr>
<tr><td class="labels">Email : </td><td><input type="email" name="email" class="fields" placeholder="Enter Valid Email" required="required" size="25" /></td></tr>
</tr>
<tr><td class="labels">Phone Number : </td><td><input type="phone" name="phone" class="fields" placeholder="Enter Phone Number" required="required" size="25" /></td></tr>
</tr>
<tr><td class="labels">Password : </td><td><input type="password" name="pass" class="fields" placeholder="Enter Password" required="required" size="25" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Register" class="fields" /></td></tr>
</table>
</form><br />
<br />
<a href="index.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>