<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$txtusername=$_POST['UserName'];
$txtpassword=$_POST['Password'];
$usertype=$_POST['rdType'];
if($usertype=="Admin")
{
$con = mysql_connect("localhost","sample","sample");
mysql_select_db("customer", $con);
$sql = "select * from admin_master where username='".$txtusername."' and password='".$txtpassword."'";
$result = mysql_query($sql,$con);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
}
else
{
header("location:blend_oceancrest_details_highvertical/index.php");
} 
mysql_close($con);
}
else if($usertype=="Customer")
{
$con = mysql_connect("localhost","sample","sample");
mysql_select_db("customer", $con);
$sql = "select * from customer_registration where UserName='".$txtusername."' and Password='".$txtpassword."' ";
$result = mysql_query($sql,$con);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong Username or Password");window.location=\'signin.php\';</script>';
}
else
{
$_SESSION['id']=$row['customerid'];
$_SESSION['name']=$row['customername'];
header("location:customer/index.php");
} 

}

?>

</body>
</html>
