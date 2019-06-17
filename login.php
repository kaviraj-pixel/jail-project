<?php

include 'db1.php';
if(isset($_POST['submit'])){
$uname=$_POST['uname'];
$pass=$_POST['password'];
$sql="select * from login where uname='$uname' and password='$pass' limit 1";
$result=mysqli_query($connect,$sql);
if(mysqli_num_rows($result)==1){$_SESSION['uname']=$uname;$_SESSION['password']=$password;$_SESSION['success']="you are logged in";
header('location:login.php');}

$query="select * from kavi where id=1";
$result1=mysqli_query($connect,$query);
$res=mysqli_fetch_array($result1);
}
?>
<!DOCTYPE html>
<head>
<title>kavi login</title>
</head>
<body>
<h1>login</h1>
<table border="1px solid">
<tr>
<th>name</th>
<th>message</th>
</tr>
<tr>
<td> <?php echo $res['name'] ?></td>
<td> <?php echo $res['message'] ?></td>
</tr>
</table>
<br>


</body>
</html>



