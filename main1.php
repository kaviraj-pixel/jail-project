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
<html>
<head>
	<style>
	#header_menu {font-size: 15px;	font-weight: bold; color:#CCC;	text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
	#header_menu a {font-size: 17px;	font-weight: bold; color:#FF0;	text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
	#header_menu a:hover {font-size: 17px;	font-weight: bold; color:#FFF;text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
	#header_menu a:current {color:#FFF;}
	
	.box{
		margin-top: 2%;
		margin-left: 30%;
		width:590px;
		border:1px solid #9c4c36;
		  font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
	}
	
	th{
		height:40px;
		background-color: #9c4c36;
		color:white;
		  font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
	}
	select{width:210px;height:30px;}
#td1{padding:5px;height: 45px;}
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
   input[type=date]:focus {
  border: 1px solid #fb2525;
}
 input[type=date]{height:30px;width:210px;}
 input[type=text]{height:30px;width:210px;}

</style>
</head>
<body>

       <img src="top_banner.jpg" width="100%" height="150" />
      
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

	<div class="box"><table>
<form id="myform" action="report.php" method="POST">
	<th colspan="4">STOCK REPORT</th>
<tr><td id="td1">
<label> FROM:</label></td><td id="td1">
<input type="date" name="a" size="25" required/></td><td id="td1">
<label> TO:</label></td><td id="td1"><input type="date" name="b" size="25" required/></td></tr><tr><td id="td1">
<label> SELECT ITEM :</label></td><td id="td1">
<select id="list" name="item1" >
	<option value="all">ALL</option>
<?php

while($res = mysqli_fetch_array($result)) {
	echo "<option value=".$res['ITEMS'].">".$res['ITEMS']."</option>";
}
	?>
	</select></td><td align="center" colspan="2" id="td1">
<input type="submit" name="submit" value="Download"/></td></tr>
</form></table></div>

<div class="box"><table>
<form id="myform" action="itemreport.php" method="POST">
	<th colspan="4">ITEM REPORT</th>
<tr><td id="td1">
<label> FROM:</label></td><td id="td1">
<input type="date" name="a" size="25" required/></td><td id="td1">
<label> TO:</label></td><td id="td1"><input type="date" name="b" size="25" required/></td></tr><tr><td id="td1">
<label> SELECT ITEM :</label></td><td id="td1">
<select id="list" name="item1" >
	<option value="all">ALL</option>
<?php
$servername = "localhost";
$database="check";
$username = "root";
$password = "";
$conn1 = new mysqli($servername, $username, $password,$database);
if ($conn1->connect_error) 
{
    die("Connection failed: " . $conn1->connect_error);
}
$query="SELECT * FROM items ";
$result1=$conn1->query($query);
while($res = mysqli_fetch_array($result1)) {
	echo "<option value=".$res['ItName'].">".$res['ItName']."</option>";
}
	?>
	</select></td><td align="center" colspan="2" id="td1">
<input type="submit" name="submit" value="Download"/></td></tr>
</form></table></div>


<div class="box"><table>
<form id="myform" action="prisonerreport.php" method="POST">
	<th colspan="4">PRISONER REPORT</th>
<tr><td id="td1">
<label> FROM:</label></td><td id="td1">
<input type="date" name="a" size="25" required/></td><td id="td1">
<label> TO:</label></td><td id="td1"><input type="date" name="b" size="25" required/></td></tr><tr><td id="td1">
<label> RP NUMBER:</label></td><td id="td1"  size="25"><input type="text" name="rpno"/>

</td><td align="center" colspan="2" id="td1">
<input type="submit" name="submit" value="Download"/></td></tr>
</form></table></div>

</body>
</html>