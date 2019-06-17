


<html>
<head>
<script>
function myFunction() {
    var txt;
    var r = confirm("do you really want to delete");
    if (r == true) {
        return true;
    } else {
        return false;
    }
}
</script>
<style>
#header_menu {font-size: 15px;	font-weight: bold; color:#CCC;	text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
#header_menu a {font-size: 17px;	font-weight: bold; color:#FF0;	text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
#header_menu a:hover {font-size: 17px;	font-weight: bold; color:#FFF;text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
#header_menu a:current {color:#FFF;}
#first{
	float:left;
	width:60%;
}
.last{float: right;margin-right: 5px;margin-left: 0;align:left;}
#left{
	margin-top:1%;
	float:right;
	color:#e13417;
	padding:5px;
	font-weight:bold;
	font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
}
select{width:450px;height: 30px;}
td{padding:5px;}

.box{    
		width:500px;
		border:1px solid #9c4c36;
		margin-bottom: 5px;
       font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
		
	}
	
	th{
		background-color:#9c4c36;
		color:white;
		width:500px;
		height:30px;
		font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
	}
#right th{
	padding:4px;
	background-color:#9c4c36;
	font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
}

 #right  td{
	 
	 padding:4px;
	 background: #ebdfc4;
	 font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
 }
   input[type=submit]{
	   border:none;
	   outline:none;
	   height:30px;
	   width:85px;
	   background:#a95744;
	   color:#fff;
	   font-size:15px;
	   border-radius:10px;
	   cursor: pointer;
	   font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
   }
    input[type=submit]:hover{
    	 border:2px solid #a95744;
  color:#9c4c36;
   background:white;
   font-weight:bold;
   font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
    }
   label{font-weight: bold;}
   input[type=text]{height:30px;}
 

</style>
</head>
<body>

       
       <img src="top_banner.jpg" width="100%" height="150">
      
       <tr>
        <td colspan="2">
        <table width="100%" border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
       
        <td width="600" height="15" bgcolor="#bb2d0c">
          <div id="header_menu" align="center"><script language="javascript"> today = new Date(); var str  =today.toString(); document.write(str.substring(0,25)); </script> 
          				
          </div>
          </td>

      </tr>
      <tr>
      <td height="15" colspan="2" align="center" valign="middle" bgcolor="#bb2d0c">
      <div id="header_menu">
	                   <a href="one.html" >Home</a>&nbsp;|&nbsp;
			            <a href="one.html" >About us</a>&nbsp;|&nbsp;
                        <a href="entry.php" >Entry</a>&nbsp;|&nbsp;
						<a href="main1.php" >Report</a>&nbsp;|&nbsp;
						<a href="add items.php" >Add Items</a>&nbsp;|&nbsp;
						
						<a href="transaction.php" >Transaction</a>&nbsp;&nbsp;|&nbsp;
						<a href="logout.php" >Logout</a>&nbsp;&nbsp;|&nbsp;
						
       </div>
	   </td>
	   </tr>
	   </table>
	   <br>
<?php
$servername = "localhost";
$database="canteen";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['submit']))
{
$item = $_GET['item'];
$no=$_GET['rate']; 
$query="UPDATE GROCERY SET RATE=".$no." WHERE ITEMS='".$item."' "; 
$conn->query($query);
}
if(isset($_GET['Submit']))
{
$item = $_GET['items'];
$no=$_GET['rates']; 
$query="SELECT ITEMS FROM GROCERY WHERE ITEMS='".$item."' ";
$result=$conn->query($query);
$num=mysqli_num_rows($result);
if($num==0)
{
$query="INSERT INTO GROCERY VALUES('$item','$no') "; 
$conn->query($query);
}
else
{
$query="UPDATE GROCERY SET RATE=".$no." WHERE ITEMS='".$item."' "; 
$conn->query($query);
}
}
if(isset($_GET['delete'])){
	$k=$_GET['item1'];

	$query="DELETE FROM GROCERY WHERE ITEMS= '$k'";
	$conn->query($query);
}


$query="SELECT * FROM GROCERY ";
$result=$conn->query($query);
?>
<div id="first">
<table id="right" class="mydoc"  cellspacing="2"><tr><th>ITEMS</th><th>RATE</th><th>ITEMS</th><th>RATE</th><th>ITEMS</th><th>RATE</th></tr>
<?php
$c=0;$x=0;
while($res = mysqli_fetch_array($result)){
	if($x==0){echo "<tr>";}
	if($c<3){
	
	$x=1;
	echo "<td>".$res['ITEMS']."</td><td>".$res['RATE']."</td>";$c++;}
	if($c==3){
		echo "</tr>";$c=0;$x=0;
	}
	
}

?></table>
<h4>*Enter items in uppercase without space</h4>
</div>
<?php
$servername = "localhost";
$database="canteen";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$query="SELECT * FROM GROCERY ";
$result=$conn->query($query);
?>



<div class="last">
	<div class="box"><table>
<form id="myform" method="GET">
	<th>UPDATE OLD ITEM</th>
<tr><td>
<label> SELECT ITEM :</label></td></tr><tr><td>
<select id="list" name="item" >
<?php

while($res = mysqli_fetch_array($result)) {
	echo "<option value=".$res['ITEMS'].">".$res['ITEMS']."</option>";
}
	?>
	</select></td></tr><tr><td><b>
RATE:</b></td></tr><tr><td><input type="text" name="rate" size="60" /></td></tr><tr><td align="center">
<input type="submit" name="submit" value="UPDATE"/></td></tr>

</form></table></div>
	<br>

<div class="box"><table>
<form id="myform" method="GET">
	<th>ADD NEW ITEM</th>
<tr><td>
<label> ITEM NAME:</label></td></tr><tr><td>
<input type="text" name="items" size="60"/></td></tr><tr><td>
<b>RATE:</b></td></tr><tr><td><input type="text" name="rates" size="60"/></td></tr><tr><td align="center">
<input type="submit" name="Submit" value="ADD"/></td></tr>

</form></table></div><br>
<?php 
$query="SELECT * FROM GROCERY ";
$result=$conn->query($query);
?>
<div class="box"><table>
<form id="myform" method="GET" onsubmit="return myFunction()">
	<th>DELETE ITEM</th>
<tr><td>
<label> SELECT ITEM :</label></td></tr><tr><td>
<select id="list" name="item1" >
<?php

while($res = mysqli_fetch_array($result)) {
	echo "<option value=".$res['ITEMS'].">".$res['ITEMS']."</option>";
}
	?>
	</select></td></tr><tr><td align="center">
<input type="submit" name="delete" value="DELETE"/></td></tr>
</form></table></div><br>

</div>

</body>
</html>