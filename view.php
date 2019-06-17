<?php
$connect = mysqli_connect("localhost", "root", "", "check");
$result=mysqli_query($connect,"select * from `entry`");
?>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 		   
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
		
	
	<style type="text/css">
	
		#header_menu {font-size: 15px;	font-weight: bold; color:#CCC;	text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
		#header_menu a {font-size: 17px;	font-weight: bold; color:#FF0;	text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
		#header_menu a:hover {font-size: 17px;	font-weight: bold; color:#FFF;text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
		#header_menu a:current {color:#FFF;}

		
		#leftbox{
			
			margin-left: 300px;
			width:47%;
			border:1px solid black;
			border-radius: 5px;
			height:25%;
			padding: 0;
			margin-bottom: 25px;
           box-shadow: 5px 10px #888888;
  			background-color:white;
		}
		
		.box{
		margin-top: -70px;
		margin-left: 70%;
		height:70px;

		width:360px;
		border:1px solid #9c4c36;
		  font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
		}
		.box td{padding: 5px;}
		.box th{
		width:360px;
		height:70px;

		background-color: #9c4c36;
		color:white;
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
       #list,#number{
		height :25px;
		font-size:11pt;
		font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
		}
		th,tr,td{margin: 0px;padding: 0px;}
		#code{
			float:left;
			position: relative;
			left: 0px;
			top: 200px;
		}
		#code table{border: none;
			
		}
		#code th{background-color: #9c4c36;
			color: white;
			font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;}
		#code td{
			text-align: center;
			padding:4px;
			 background: #ebdfc4;
			 font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
		}
		#code1 table,#code2 table{
			border: none;
			margin-left: 80%;
			
		}
		#code1 th,#code2 th{background-color: #9c4c36;
			color: white;
			font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;}
		#code1 td,#code2 td{
			text-align: center;
			padding:4px;
			 background: #ebdfc4;
			 font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
		}
		#code1{
			float: left;
			position: relative;
			left: 20%;
			top: 0px;
		}
		#code2{
			float: right;
			position: relative;
			left: -30%;
			top: 0px;
		}
		#search{
			border: 1px solid #9c4c36;
			border-radius: 5px;
			height:40px;
			width: 300px;
			text-decoration-color: #9c4c36;
		}


	</style>

</head>
 <?php
 		session_start();
	   if(isset($_GET['submit']))
		{
		$item = $_GET['item'];
		$_SESSION['item']=$item;
		}?>
<body>
	<img src="top_banner.jpg" width="100%" height="150" />
      
       
        <table width="100%" border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
       
        <td width="600" height="15" bgcolor="#bb2d0c">
          <div id="header_menu" align="center"><script language="javascript"> today = new Date(); var str  =today.toString(); document.write(str.substring(0,25)); </script> 
          				
          </div>
          </td>

      </tr>
      <tr>
      <td height="15" colspan="3" align="center" valign="middle" bgcolor="#bb2d0c">
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
	   <br>
<form action="#" method="POST" style="margin-left:550px;">
<input id="search" type="text" name="itcode" placeholder="Enter the item code"/> 
<input id="search" type="number" placeholder="Enter the quantity" name="qty" />
<input type="submit" name="submit"/>
</form>
<form action="box.php" method="POST" style="margin-left:700px;">
<input type="submit" name="next" value="Back"/>
</form>
	  
<?php
$conn = mysqli_connect("localhost", "root", "", "check");
$result=mysqli_query($conn,"select * from `entry`");
$rp=0;
if(isset($_POST['submit2'])){
$rp=$_POST['submit2'];
$_SESSION['rp1']=$rp;}
$rp=$_SESSION['rp1'];

$query=mysqli_query($conn,"select * from entry where rpno=$rp");
while($res=mysqli_fetch_array($query))
{
	$name=$res['accno'];
	$balance=$res['total']-$res['week_usage'];
	$weekuse=$res['week_usage'];
	
}



echo '
<table id="leftbox" >
		
		<tr>
			<th >RP_NO</th>
			<td >';echo $rp;echo'</td>
			<th >ACC_NUMBER</th>
			<td >';echo $name;echo'</td>
		</tr>
		<tr>
			<th >BALANCE</th>
			<td >';echo $balance;echo'</td>
		</tr>
		<tr>
			<th >DATE Of</th>
			<td >';$date=date("d.m.Y");
$query="SELECT `".$date."` FROM  `".$rp."` ";
$result=$conn->query($query);
if(!$result)
{
$query="ALTER TABLE `".$rp."` ADD `".-$date."` FLOAT NOT NULL";
$conn->query($query);

}echo $date;echo'</td>
 
		</tr>';

		if(isset($_POST['submit']))
{
	$code=$_POST['itcode'];
	$query4=mysqli_query($conn,"SELECT ItName FROM `items` WHERE itcode='".$code."'");
	$res4=mysqli_fetch_array($query4);
	$item=$res4['ItName'];
	

$query2=mysqli_query($conn,"SELECT ItRate FROM `items` WHERE ItName='".$item."'"); 
$res1=mysqli_fetch_array($query2);
$amt=$res1['ItRate'];


		echo'
		<tr><th colspan="4">LAST PURCHASED ITEM</th></tr>
		<tr>
		<th>ITEM</th>
		<td>';echo $item;echo'</td>
		<th rowspan="2">AMOUNT</th>
		<td rowspan="2">';if(isset($_POST['submit']))
		{
		$calc=$amt*$_POST['qty'];
		echo $calc;
		$query1="SELECT `".$date."` FROM `".$rp."`  WHERE ItName='".$item."'";
		$result5=mysqli_query($conn,$query1);
		while($res5=mysqli_fetch_array($result5)){
		$prev=$res5[$date];
		}
		
		$ans=$prev+$calc;
		$weekuse=$weekuse+$calc;
		$query3="UPDATE `".$rp."` SET `".$date."`='".$ans."' where ItName='".$item."'";
		$result6=mysqli_query($conn,"UPDATE entry SET week_usage='".$weekuse."' WHERE rpno='".$rp."'");
		$result1=mysqli_query($conn,$query3);
		 }echo'</td>
		</tr>
		<tr>
			<th>RATE</th>
			<td >';
			$amt=$res1['ItRate'];
			echo $amt;echo'</td>

		</tr>
	</table>';
}
?>
<br/>

<table id="code1" height="30%" width="25%">
	<tr>
		<th>ITEM CODE</th>
		<th>ITEM NAME</th>
	</tr>
	<tr>
		<td>1</td>
		<td>Bajji</td>
	</tr>
	<tr>
		<td>2</td>
		<td>Chicken kulambu</td>
	</tr>
	<tr>
		<td>3</td>
		<td>Egg kulambu</td>
	</tr>
	<tr>
		<td>4</td>
		<td>Kaara kulambu</td>
	</tr>
	<tr>
		<td>5</td>
		<td>Lemon Rice</td>
	</tr>
	<tr>
		<td>6</td>
		<td>Pongal</td>
	</tr>
	<tr>
		<td>7</td>
		<td>Ravakichadi</td>
	</tr>
</table>
<table id="code2" height="30%" width="25%">
	<tr>
		<th>ITEM CODE</th>
		<th>ITEM NAME</th>
	</tr>
	<tr>
		<td>8</td>
		<td>Sambar kulambu</td>
	</tr>
	<tr>
		<td>9</td>
		<td>Tamarind Rice</td>
	</tr>
	<tr>
		<td>10</td>
		<td>Tea</td>
	</tr>
	<tr>
		<td>11</td>
		<td>Tomato Rice</td>
	</tr>
	<tr>
		<td>12</td>
		<td>Vadai</td>
	</tr>
	<tr>
		<td>13</td>
		<td>Vegetable Biriyani</td>
	</tr>
	
</table>


<br/>
<br/>
<?php
$result2=mysqli_query($conn,"SHOW COLUMNS FROM `".$rp."`");
$fields = array();
while($res=mysqli_fetch_assoc($result2))
{
	$fields[]=$res['Field'];}
$length=sizeof($fields);
$result3=mysqli_query($conn,"SELECT * FROM `".$rp."` ");
if($length<9){
	
	echo '<table id="code"><tr>';
		echo "<th>".$fields[0]."</th>";

	for($itr=1;$itr<$length;$itr++){
	echo "<th>".$fields[$itr]."</th>";}
	echo "</tr>";
	while($res=mysqli_fetch_array($result3)){
		echo "<tr>";
		echo "<th>".$res[$fields[0]]."</th>"; 
		for($itr=1;$itr<$length;$itr++){
	echo "<td>".$res[$fields[$itr]]."</td>";}
	echo "</tr>";
	}
	echo "<tr><td>TOTAL</td>";
	for($itr=1;$itr<$length;$itr++)
	{
		echo"<td>";
		$total=mysqli_query($conn,"SELECT SUM(`".$fields[$itr]."`)  as total from `".$rp."`");
		while($res=mysqli_fetch_array($total)){
			
			$total2=$res['total'];
		}
		echo $total2."</td>";
	}
	echo "</tr>";
	echo "</table>";
}
else{
    echo '<table id="code"><tr>';
	$limit=$length-7;
	echo "<th>".$fields[0]."</th>";
    for($itr=$limit;$itr<$length;$itr++){
	echo "<th>".$fields[$itr]."</th>";}
	echo "</tr>";
	while($res=mysqli_fetch_array($result3)){
		echo "<tr>";
		echo "<th>".$res[$fields[0]]."</th>"; 
		for($itr=$limit;$itr<$length;$itr++){
	echo "<td>".$res[$fields[$itr]]."</td>";}
	echo "</tr>";
	}
	echo "<tr><td>TOTAL</td>";
	for($itr=$limit;$itr<$length;$itr++)
	{
		echo"<td>";
		$total=mysqli_query($conn,"SELECT SUM(`".$fields[$itr]."`)  as total from `".$rp."`");
		while($res=mysqli_fetch_array($total)){
			
			$total2=$res['total'];
		}
		echo $total2."</td>";
	}
	echo "</tr>";
	echo "</table>";
	}
?>