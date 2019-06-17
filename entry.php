<html>
<head>
<style>
#header_menu {font-size: 15px;	font-weight: bold; color:#CCC;	text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
#header_menu a {font-size: 17px;	font-weight: bold; color:#FF0;	text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
#header_menu a:hover {font-size: 17px;	font-weight: bold; color:#FFF;text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
#header_menu a:current {color:#FFF;}
form{
align:center;
margin-top:10%;
font-size : 150%;
font-weight :500;
text-align :center;
}
#list,#number{
height :25px;
font-size:11pt;
font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
}
.box{
		margin-top: 2%;
		margin-left: 30%;
		width:560px;
		border:1px solid #9c4c36;
		  font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
	}
.box td{padding: 5px;}
	th{width:560px;
		height:40px;

		background-color: #9c4c36;
		color:white;
		  font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
	}
	select{width:500px;height:20px;}
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
   label{align: center; 
     font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;}
   
    input[type=submit]:hover{
    	 border:2px solid #a95744;
  color:#9c4c36;
   background:white;
   font-weight:bold;
     font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
    }
   input[type=text]:focus {
  border: 1px solid #fb2525;
}
 input[type=text]{height:20px;width:500px;}
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
<form id="myform" method="GET">
	<th>ENTRY</th>
<tr><td>
<label> SELECT ITEM :</label></td></tr><tr><td>
<select id="list" name="item">
<option value="PONGAL">PONGAL</option>
<option value="TOMATORICE">TOMATO RICE</option>
<option value="RAVAKICHADI">RAVA KICHADI</option>
<option value="VEGETABLEBRIYANI">VEGETABLE BRIYANI</option>
<option value="LEMONRICE">LEMON RICE</option>
<option value="TAMARINDRICE">TAMARIND RICE</option>
<option value="EGGKULAMBU">EGG KULAMBU</option>
<option value="KAARAKULAMBU">KAARA KULAMBU</option>
<option value="CHICKENKULAMBU">CHICKEN KULAMBU</option>
<option value="SAMBARKULAMBU">SAMBAR KULAMBU</option>
<option value="VADAI">VADAI</option>
<option value="BAJJI">BAJJI</option>
<option value="TEA">TEA</option>
</select></td></tr><tr><td><label> NOS:</label> </td></tr><tr><td><input type="text" name="number" id="number" /></td></tr><tr><td align="center">
<input type="submit" name="submit" value="submit"/>

</form></table></div>
</body>
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
$no=$_GET['number']; 
$date=date("d.m.Y");
$query="SELECT `".$date."` FROM REPORT ";
$result=$conn->query($query);
if(!$result)
{
$query="ALTER TABLE REPORT ADD `".$date."` FLOAT NOT NULL";
$conn->query($query);
$query="INSERT INTO DATE VALUES(`".$date."`)";
$conn->query($query);
}
$query="UPDATE REPORT
        JOIN `".$item."` ON REPORT.ITEMS=`".$item."`.ITEMS
        SET `".$date."`= `".$date."`+((`".$item."`.TEN_PERSON/10)  * (".$no."+100))"; 
$conn->query($query); 
$query="UPDATE REPORT
        JOIN `".$item."` ON REPORT.ITEMS=`".$item."`.ITEMS
        SET TOTAL= TOTAL+((`".$item."`.TEN_PERSON/10)  * (".$no."+100))"; 
$conn->query($query); 
$query="SELECT `".$date."` FROM RATE ";
$result=$conn->query($query);
if(!$result)
{
$query="ALTER TABLE RATE ADD `".$date."` FLOAT NOT NULL";
$conn->query($query);
}
$query="UPDATE RATE
        JOIN `".$item."` ON RATE.ITEMS=`".$item."`.ITEMS JOIN GROCERY ON `".$item."`.ITEMS=GROCERY.ITEMS
        SET `".$date."`= `".$date."`+((((`".$item."`.TEN_PERSON/10)  * (".$no."+100))*GROCERY.RATE)*1.05)";
$conn->query($query);
}
$conn->close();
?>
</html>