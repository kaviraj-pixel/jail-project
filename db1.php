<html>
<head>
<link rel="stylesheet" href="logincss.css">
<script>
history.pushState(null,null,null);
window.addEventListener('popstate',function(){
 history.pushState(null,null,null);
});
</script>
	
</head>
<body>
<section id="welcome">
<img src="tamilnadu.png" class="container">
<img src="prison.jpg" class="container1">
<p id="head">         TAMILNADU PRISON DEPARTMENT </p>
<div class="loginbox">
	<img src="avatar.png" class="avatar">
		<h1>Login</h1>
		<form>
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username">
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password">
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
</section>
</body>
<?php
session_start(); 
if(isset($_GET['submit']))
{
$username=$_GET['username'];
$password=$_GET['password'];
if($username=="user" && $password=='123')
{
header("Location:one.html");
} 
else 
{
echo "<script>alert('Enter valid username and password');</script>";
}
}
?>
</html>
