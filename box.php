<?php
$connect = mysqli_connect("localhost", "root", "", "check");
$result=mysqli_query($connect,"select * from `entry`");
$tablename=$_SERVER['QUERY_STRING'];
if(isset($_POST["update"]))
 {
	  $query16="UPDATE entry SET total = '".$_POST["cost"]."'+total WHERE rpno='".$_POST["rpno"]."'";
	  mysqli_query($connect, $query16);
	 $resultquery=mysqli_query($connect,"select * from `entry` WHERE rpno='".$_POST["rpno"]."'");
	 $result=mysqli_fetch_array($resultquery);
	 $addcontrol=$result['addcontrol'];
	 $total=$result['total'];
	 if($tablename=='A'){
	 if($addcontrol==0)
	 {
	 	if($total>=750)
	 	{
	 	$query19="UPDATE entry SET addcontrol=1 WHERE rpno='".$_POST["rpno"]."'";
	 	mysqli_query($connect, $query19);
	 	$query19="UPDATE entry SET week_balance=750 WHERE rpno='".$_POST["rpno"]."'";
	 	mysqli_query($connect, $query19);
	  
	    }
	    else
	    {
	    	$query19="UPDATE entry SET addcontrol=1 WHERE rpno='".$_POST["rpno"]."'";
	    	mysqli_query($connect, $query19);
	    	$query19="UPDATE entry SET week_balance='".$total."' WHERE rpno='".$_POST["rpno"]."'";
	 	mysqli_query($connect, $query19);
	     }
	 }
	}
	else{
		if($addcontrol==0)
	 {
		if($total>=450)
	 	{
	 	$query19="UPDATE entry SET addcontrol=1 WHERE rpno='".$_POST["rpno"]."'";
	 	mysqli_query($connect, $query19);
	 	$query19="UPDATE entry SET week_balance=450 WHERE rpno='".$_POST["rpno"]."'";
	 	mysqli_query($connect, $query19);
	  
	    }
	    else
	    {
	    	$query19="UPDATE entry SET addcontrol=1 WHERE rpno='".$_POST["rpno"]."'";
	    	mysqli_query($connect, $query19);
	    	$query19="UPDATE entry SET week_balance='".$total."' WHERE rpno='".$_POST["rpno"]."'";
	 	mysqli_query($connect, $query19);
	     }
	 }
	}
 }
 $connect = mysqli_connect("localhost", "root", "", "check"); 
if(isset($_POST["active"]))
	{
		
		$i=$_POST['rpnum'];
		
		$status=$_POST['status'];
		if($status =='ACTIVE')
		{
		$query17=mysqli_query($connect,"UPDATE `entry` SET `status`='INACTIVE'	WHERE rpno=".$i."");
		echo '<script>document.getElementById("active").style.backgroundcolor="red";</script>';
		}
		else
		{
		$query18=mysqli_query($connect,"UPDATE `entry` SET `status`='ACTIVE' WHERE rpno=".$i." ");
		echo '<script>document.getElementById("active").style.backgroundcolor="green";</script>';
		}
    } 
 if(isset($_POST["insert"]))	 
 {   
      $day=date("l"); 
      if(!empty($_FILES['image']['tmp_name']))
	  {
		  /* CHANGED ACTIVE */		  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      $result=mysqli_query($connect,"SELECT rpno FROM `entry` WHERE rpno='".$_POST["rpno"]."'");

      $result1=mysqli_query($connect,"SELECT accno FROM `entry` WHERE accno='".$_POST["accno"]."'");	  
		  if (mysqli_num_rows($result))
		  {
			echo '<script>alert("RPNO already exists")</script>';
		  }
		  else if (mysqli_num_rows($result1))
		  {
			echo '<script>alert("ACCOUNT NO already exists")</script>';
		  }
		  else	  
		  {
			  $query = mysqli_query($connect,"INSERT INTO entry(name,rpno,accno,image,status,total,week_usage,addcontrol,week_balance,block) VALUES ('".$_POST["name"]."','".$_POST["rpno"]."','".$_POST["accno"]."','$file','ACTIVE',0,0,0,0,'$tablename')");       
			  $query1=mysqli_query($connect,"CREATE TABLE `".$_POST["rpno"]."` (ItName varchar(255))");
			  $query2=mysqli_query($connect,"INSERT INTO 	`".$_POST["rpno"]."`(ItName) VALUES ('bajji')");
			  $query3=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('chickenkulambu')");
			  $query4=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('eggkulambu')");
			  $query5=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('kaarakulambu')");
			  $query6=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('lemonrice')");
			  $query7=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('pongal')");
			  $query8=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('ravakichadi')");
			  $query9=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('sambarkulambu')");
			  $query10=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('tamarindrice')");
			  $query11=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('tea')");
			  $query12=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('tomatorice')");
			  $query13=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('vadai')");
			  $query14=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('vegetablebriyani')");
		
		    if(!$query)
			{
				echo '<script>alert("Upload a image with low size..");</script>';
			}
			else
			{
				echo '<script>alert("Data is sucessfully entried")</script>';
			}
			}
      }
	  else
	  {
		    /* CHANGED ACTIVE */ 
		   $result=mysqli_query($connect,"SELECT rpno FROM `entry` WHERE rpno='".$_POST["rpno"]."'");
           $result1=mysqli_query($connect,"SELECT accno FROM `entry` WHERE accno='".$_POST["accno"]."'");	  
				   
		  if (mysqli_num_rows($result))
		  {
			echo '<script>alert("RPNO already exists")</script>';
		  }
		  else if (mysqli_num_rows($result1))
		  {
			echo '<script>alert("ACCOUNT NO already exists")</script>';
		  }
		  else	  
		  {
				
			$query =mysqli_query($connect, "INSERT INTO entry(name,rpno,accno,status,total,week_usage,addcontrol,week_balance,block) VALUES ('".$_POST["name"]."','".$_POST["rpno"]."','".$_POST["accno"]."','ACTIVE',0,0,0,0,'$tablename')");  
			$query1=mysqli_query($connect,"CREATE TABLE `".$_POST["rpno"]."`(ItName varchar(255))");
			$query2=mysqli_query($connect,"INSERT INTO 	`".$_POST["rpno"]."`(ItName) VALUES ('bajji')");
			$query3=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('chickenkulambu')");
			$query4=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('eggkulambu')");
			$query5=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('kaarakulambu')");
			$query6=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('lemonrice')");
			$query7=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('pongal')");
			$query8=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('ravakichadi')");
			$query9=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('sambarkulambu')");
			$query10=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('tamarindrice')");
			$query11=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('tea')");
			$query12=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('tomatorice')");
			$query13=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('vadai')");
			$query14=mysqli_query($connect,"INSERT INTO  `".$_POST["rpno"]."`(ItName) VALUES ('vegetablebriyani')");
			
			if($query)
		  {
			  echo '<script>alert("Data is sucessfully entried")</script>';
		  }
		  }			  
      }
 }  
?>
<html>
<head>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 		   
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="block.css">
	
		
	
	<style type="text/css">
	
		#header_menu {font-size: 15px;	font-weight: bold; color:#CCC;	text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
		#header_menu a {font-size: 17px;	font-weight: bold; color:#FF0;	text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
		#header_menu a:hover {font-size: 17px;	font-weight: bold; color:#FFF;text-decoration: none;	font-family:Tahoma, Geneva, sans-serif;}
		#header_menu a:current {color:#FFF;}
        /* width and height changed */
	   
		#submit2{
       border:none;
	   outline:none;
	   height:35px;
	   width:77px;
	   background:#bb2d0c;
	   color:#fff;
	   font-size:15px;
	   border-radius:10px;
	   cursor: pointer;
 		 font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;}

		#submit2:hover{
    	border:2px solid #bb2d0c;
		color:#bb2d0c;
		background:white;
		font-weight:bold;
     	font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
       }
	   /* width and height changed */
	   #active{
	   border:none;
	   outline:none;
	   height:35px;
	   width:77px;
	   font-size:15px;
	   border-radius:10px;
	   cursor: pointer;
 	   font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
	   }
	   /* report added */
	   #report{
	   border:none;
	   outline:none;
	   height:35px;
	   width:77px;
	   background:#bb2d0c;
	   color:#fff;
	   font-size:15px;
	   font-weight:bold;
	   border-radius:10px;
	   cursor: pointer;
 	   font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
	   }
	   
		#report:hover{
    	border:2px solid #bb2d0c;
		color:#bb2d0c;
		background:white;
		font-weight:bold;
     	font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
       }
		#leftbox{
			margin-left:45px;
			margin-right:0px;
			margin-top:4px;
			float:left;
			width:45%;
			border:1px solid black;
			border-radius: 5px;
			/* height , padding-bottom,top changed */
			height:27%;
			padding-top:10px ;
			padding-bottom:10px;
			margin-bottom: 25px;
			 box-shadow: 5px 10px #888888;
			background-color:white;

           
		}
		#rightbox{
			 margin-right:45px;
			 margin-left:0px;
			 float:right;
			 margin-top:4px;
			 width:45%;
			 box-shadow: 5px 10px #888888;
			 background-color:white;
			 border:1px solid black;
			 border-radius: 5px;
             /* height , padding-bottom,top changed */
			height:27%;
			padding-top:10px ;
			padding-bottom:10px;
		    margin-bottom: 25px;
			}
		
	   .fab {
		   width: 60px;
		   height: 60px;
		   background-color: #bb2d0c;
		   border-radius: 50%;
		   box-shadow: 0 6px 10px 0 #666;
		   transition: all 0.1s ease-in-out;
		   font-size: 50px;
		   color: white;
		   text-align: center;
		   position:absolute;
		   line-height: 60px;
		   left:16%;
		   top: 32%;
		   /* top , left changed */
		}
 
		.fab:hover {
		box-shadow: 0 6px 14px 0 #666;
		transform: scale(1.05);
		}
		/* upbutton added */
		.updatebtn{
		width: 60px;
		height: 60px;
		background-color: #bb2d0c;
		font-weight:bold;
		border-radius:50%;
	    box-shadow: 0 6px 10px 0 #666;
		transition: all 0.1s ease-in-out;
		color: white;
		}
		.updatebtn:hover{
		box-shadow: 0 6px 14px 0 #666;
		transform: scale(1.05);
		}
       #list,#number{
		height :25px;
		font-size:11pt;
		font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
		}
		th,tr,td{margin: 0px;padding: 0px;}
		
        }
		#search{
			border: 1px solid #9c4c36;
			border-radius: 5px;
			height:40px;
			width: 300px;
			text-decoration-color: #9c4c36;
		}
		#transaction{
			
			display:none;
			position:absolute;
			margin-top:80px;
			/* margin-left,width changed */
			margin-left:360px;
			width:35%;
			/* color changed */
			border:1px solid black;
			/* border-radius,width changed */
			border-radius: 10px;
			/* border-width changed */
			border-width: 2px;
			height:45%;
			padding: 0;
			margin-bottom: 25px;
            background-color:white;
		}
		/* form3 added */
		#form3
		{
		padding-right:10px;
		padding-left:10px;
		}
		/* report form added */
		#reportform
		{
			display:none;
			position:absolute;
			margin-top:80px;
			margin-left:360px;
			width:35%;
			padding-top: 10px;
		    padding-right: 10px;
		    padding-bottom: 10px;
		    padding-left: 10px;
			border:1px solid black;
			border-radius: 10px;
			border-width: 2px;
			height:45%;
			padding: 0;
			margin-bottom: 25px;
            background-color:white;
		
			
		}
		
		#submit{
	   border:none;
	   outline:none;
	   height:30px;
	   width:85px;
	   background:#bb2d0c;
	   color:#fff;
	   margin-left:10px;
	   margin-top:20px;
	   font-size:15px;
	   border-radius:10px;
	   cursor: pointer;
 	   font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
	   }
		#submit:hover{
    	border:2px solid #a95744;
		color:#9c4c36;
		background:white;
		font-weight:bold;
     	font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
       }
	   
	   /* active added*/
	   #active
	   {
		   font-weight:bold;
		   color:white;
	   }
	   /* block_name added*/
	   #block_name
	   {
		border-color:black;
	    height:80px;
	    width:80px;
	    background:white;
	    color:black;
	    margin-left:-240px;
	    margin-top:-67px;
	    font-size:40px;
		font-weight:bold;
	    cursor: pointer;
 	    font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
  		}
		th,tr,td{margin: 0px;padding: 0px;}
		#code{
			float:left;
			position: relative;
			left: 0px;
			top: 200px;
		}
		#code table{
			border: none;
			
		}
		#code th{
            background-color: #9c4c36;
			color: white;
			font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;}
		#code td{
			
			text-align: center;
			padding:0px;
			 background: #ebdfc4;
			 font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
		}
		#code1 table,#code2 table{
			height:10%;
			border: none;
			margin-left: 80%;
			
		}
		#code1 th,#code2 th{background-color: #9c4c36;
			color: white;
			font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;}
		#code1 td,#code2 td{
			text-align: center;
			padding:3px;
			background: #ebdfc4;
			font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
		}
		/* top changed */
		#code1{
			float: left;
			position: relative;
			left:60%;
			top: -90px;
		}
		
		/* top changed */
		
		#code2{
			float: right;
			position: relative;
			left: 0%;
			top: -90px;
		}
		#trantable
		{
			margin-left:15%;
		}
		#trantable td{
         			 background: #ebdfc4;
					 width:30%;
					 text-align:center;
		}
		#trantable th{		
		             color: white;
					 background: #9c4c36;
		}
		#updateform {
		width:100%;
		height:100%;
		opacity:.95;
		top:0;
		left:0;
		display:none;
		position:fixed;
		background-color:#313131;
		overflow:auto
		}
		div#popupupdate {
		position:absolute;
		left:50%;
		top:17%;
		margin-left:-202px;
		font-family:'Raleway',sans-serif
		}
		/* date and form4 added */
        #date{
			height:10%;
			width:40%;
			margin-left:25px;
		}
		#form4
		{
			padding-top:40px;
			padding-left:25px;
		}
		/* download , back added */
		#download
		{
	   border:none;
	   outline:none;
	   height:30px;
	   width:110px;
	   background:#bb2d0c;
	   color:#fff;
	   margin-left:100px;
	   margin-top:20px;
	   font-size:15px;
	   border-radius:10px;
	   cursor: pointer;
 	   font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
		}		
		#back{
	   border:none;
	   outline:none;
	   height:30px;
	   width:85px;
	   background:#bb2d0c;
	   color:#fff;
	   margin-left:20px;
	   margin-top:20px;
	   font-size:15px;
	   border-radius:10px;
	   cursor: pointer;
 	   font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;
	   }

	   #report_line
	   {
		  display: block;
		  margin-left: auto;
		  margin-right: auto;
		  border-width: 2px;
		  border-color: black;
	   }
				
	</style>
</head>
<body>
<! report form added !>
<div id="reportform">
            <h1 style="text-align:center;font-family:  Roboto,RobotoDraft,Helvetica,Arial,sans-serif;"> REPORT </h1>
			<hr id="report_line">
			<form action="" method="post" class="form4" id="form4">
			   <input type="date" name="a" id="date"  required/>
			   <input type="date" name="a" id="date" required/>
			   <br>
			   <input type="submit" id="download" name="download" value="DOWNLOAD"/> 
			   <input type="submit" id="back" name="Back" value="BACK" onclick="reporthide()"/> 
			   
			</form>
			
</div>
<div id="transaction">
<form action="#" method="post"  class="form3" id="form3">
&nbsp;
<! font-size ,family changed!>
<input type="text" name="itcode" id="itcode" placeholder="Enter the item code" style="font-size:11pt;margin-top:10%;width:27%;font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;"/>
&nbsp;&nbsp; 

<! font-size ,family changed!>

<input type="number" placeholder="Enter the quantity" name="qty" id="qty" min="0" style="font-size:11pt;width:27%;font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;"/>
<input id="submit" type="submit" name="add" value="ADD" onclick="return tranvalid()"/>
<input id="submit" type="submit" name="submit" value="SUBMIT" onclick="return transhide()"/>
</form>
<?php
$conn = mysqli_connect("localhost", "root", "", "check");
if(isset($_POST['add']))
{
$code=$_POST["itcode"];
$query1=mysqli_query($conn,"SELECT ItName FROM `items`  WHERE itcode='".$code."'");
$result=mysqli_fetch_array($query1);
$item=$result['ItName'];
$query1=mysqli_query($conn,"SELECT ItRate FROM `items`  WHERE itcode='".$code."'");
$result=mysqli_fetch_array($query1);
$rate=$result['ItRate'];
$quantity=$_POST["qty"];
$amt=$rate*$quantity;
$rp=$_COOKIE['rpnum'];
$date=date("d.m.Y");				

		$query="SELECT `".$date."` FROM  `".$rp."` ";
		$result=$connect->query($query);
		if(!$result)
		{
		$query="ALTER TABLE `".$rp."` ADD `".$date."` FLOAT NOT NULL";
		$connect->query($query);                
		}

        $query12="SELECT `".$date."` FROM `".$rp."`  WHERE ItName='".$item."'";
		$result5=mysqli_query($conn,$query12);			
		while($res5=mysqli_fetch_array($result5)){
		$prev=$res5[$date];
		}
		$ans=$prev+$amt;
		
		$query=mysqli_query($conn,"select * from entry where rpno=".$rp."");
				while($res=mysqli_fetch_array($query))
				{
					$name=$res['accno'];
					$total=$res['total'];
					$balance=$res['week_balance'];
					$weekuse=$res['week_usage'];
				}
		
     	$weekuse=$weekuse+$amt;
	    $total=$total-$amt;
		if($balance<=0)
		{
			
			echo '<script>alert("Balance is 0 . Transaction is not possible");</script>';
		}
		else
		{   
	        
			$balance=$balance-$amt;
			if($balance<0)
			{
				echo '<script>alert("No sufficient balance to purchase the item");</script>';
			}
			else
			{   
				if(($tablename=='A' && $weekuse>750)|| ($tablename=='B' && $weekuse>450)||($tablename=='C' && $weekuse>450)||($tablename=='D' && $weekuse>450)||($tablename=='E' && $weekuse>450))
				{
				echo '<script>alert("The week usage has exceed the limit");</script>';
				}
				else
				{
				$query3="UPDATE `".$rp."` SET `".$date."`='".$ans."' where ItName='".$item."'";
				$result6=mysqli_query($conn,"UPDATE entry SET week_usage='".$weekuse."' WHERE rpno='".$rp."'");
				
				$result7=mysqli_query($conn,"UPDATE entry SET week_balance='".$balance."' WHERE rpno='".$rp."'");
				
				$result8=mysqli_query($conn,"UPDATE entry SET total='".$total."' WHERE rpno='".$rp."'");
				$result1=mysqli_query($conn,$query3);
				$query=mysqli_query($conn,"SELECT * FROM `temp`");
				if(!$query)
				{	
				$query=mysqli_query($conn,"CREATE TABLE `temp`(item varchar(50),quantity int,rate float)");
				}
				$result=mysqli_query($conn,"INSERT INTO `temp` VALUES('".$item."','".$quantity."','".$amt."')");
				}
				$query="SELECT `".$date."` FROM  `items` ";
						$result=$connect->query($query);
						if(!$result)
						{
						$query="ALTER TABLE `items` ADD `".$date."` FLOAT NOT NULL";
						$connect->query($query);
                        
						}
						 $query12="SELECT `".$date."` FROM `items`  WHERE ItName='".$item."'";
						$result5=mysqli_query($conn,$query12);			
						while($res5=mysqli_fetch_array($result5)){
						$previv=$res5[$date];
						}
						$newiv=$previv+$quantity;
						$itemcupdate=mysqli_query($conn,"UPDATE `items` SET `".$date."`='".$newiv."' where ItName='".$item."'");
			}

		}
}
?>
<?php
if(isset($_POST["submit"]))
{
$query=mysqli_query($conn,"SELECT * FROM `temp`");
if($query)
{
$query1=mysqli_query($conn,"DROP TABLE `temp`");
}
}
$result1=mysqli_query($conn,"SELECT * FROM `temp`");
if($result1)
{
?>
<table id="trantable">
		 <tr>
		 <th>ITEM</th>
		 <th>QUANTITY</th>
		 <th>RATE</th>
		 </tr>
	 <?php 
	 while($row = $result1->fetch_assoc())
	 {
	  echo '
	           <tr>
			   <td> '.$row['item'].'</td> 
			   <td>'. $row['quantity'].'</td> 
			   <td>'. $row['rate'] .'</td>  
			   </tr>';
		}
	 ?>
</table>
<?php
}
?>
</div>
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
	   
<div>
<! changed the margin-left and top !>
<div id="updatebutton" style="margin-left: 24%;">
<! image added,id,class changed ,style added!>
<button class="updatebtn" id="updatebtn" onclick="show()" style="margin-top:52px;"><img src="edit.png" width="40px"></button>
</div>
<! replaced the block name !>
<?php 
$tablename=$_SERVER['QUERY_STRING'];?>
<button id="block_name"><?= $tablename ?></button>

<table id="code1" height="10%" width="20%">
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
<table id="code2" height="10%" width="20%">
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
	<! row added !>
	<tr>
		<td style="height:22px;"> </td>
		<td> </td>
	</tr>
	
</table>
</div>
<! margin-top changed !>
<form method="post" class="example" action="" style="margin-top:-35px;max-width:300px;margin-left:35%;">
<input type="text" placeholder="Search.." name="valueToSearch">
<button type="submit" name="search"><i class="fa fa-search"></i></button>
</form>
<div id="abc">
<div id="popupentry">
<form action="#" class="form1" id="form1" method="post" name="form" onsubmit="return validateForm()" enctype="multipart/form-data">
<img id="close" src="image.png" onclick ="div_hide()">
<h2>PRISONER ENTRY</h2>
<hr>
<input id="name" name="name" placeholder="Name" type="text" onkeyup="this.value=this.value.toUpperCase()">
<input id="rpno" name="rpno" placeholder="RP No" type="text">
<input id="accno" name="accno" placeholder="Account No" type="text">
<input type="file" name="image" id="image" />  
<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />                     
</form>
</div>
</div>
<div id="def" >
<button class="fab" onclick="div_show()" >+</button>
</div>
<div id="updateform">
<div id="popupupdate" style="width:900px;">
<form action="#" class="form2" id="form2" method="post" name="form" onsubmit="return valid()" enctype="multipart/form-data">
<img id="close" src="image.png" onclick ="hide()">
<h2>PRISONER UPDATE</h2>
<hr>
<input id="rpno" name="rpno" placeholder="RPNO" type="text">
<input id="cost" name="cost" placeholder="AMOUNT" type="text">
<input type="submit" name="update" id="update" value="Update" class="btn btn-info"/>
</form>
</div>
</div>
<br>
<br>
<?php 
	   if(isset($_POST['submit'])){
							$rp=$_COOKIE['rpnum'];
						
						
						$date=date("d.m.Y");
						
						$query="SELECT `".$date."` FROM  `".$rp."` ";
						$result=$connect->query($query);
						if(!$result)
						{
						$query="ALTER TABLE `".$rp."` ADD `".$date."` FLOAT NOT NULL";
						$connect->query($query);
                        
						}}

	   $_SESSION['tablename']=$tablename;


	            $query = "SELECT * FROM entry where block='$tablename'";
				$search_result = mysqli_query($connect, $query);
                if(isset($_POST['search']))
                {
                 $valueToSearch = $_POST['valueToSearch'];
                 // search in all table columns
                 // using concat mysql function
                 $query = "SELECT * FROM entry WHERE CONCAT(`rpno`) LIKE '%$valueToSearch' AND block='$tablename'";
                 $search_result = filterTable($query);
                }
                else {
                $query = "SELECT * FROM entry where block='$tablename'";
                $search_result = filterTable($query);
                }

                 // function to connect and execute the query
                function filterTable($query)
                {
                $connect = mysqli_connect("localhost", "root", "", "check");
                $filter_Result = mysqli_query($connect, $query) or die( mysqli_error($connect));;
                return $filter_Result;
                }			
	
	$count=0;
	
	while($res=mysqli_fetch_array($search_result))
	{ 

	$count++;
	$i=$res['rpno'];		
	$status=$res['status'];

					$total=$res['total'];
					$balance=$res['total']-$res['week_usage'];
					$weekuse=$res['week_usage'];
			
	if($count%2!=0){
echo '<form action="#" method="post">';	
echo '<input type="hidden" name="rpnum" value="';echo $res['rpno'];echo'"/>';	
echo '<input type="hidden" name="status" value="';echo $res['status'];echo'"/>';
         /* added report button */
	echo '
   
	<table id="leftbox" >
		<tr>
		
			<td rowspan="5" ><img src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="170px"/></td>
			<td >NAME</td>
			<td >';echo $res['name'];echo'</td>';
			/* if added 
			if($res['status']=='ACTIVE'){
			echo '
			<th> <button type="submit" name="report" id="report" class="report" onclick="reportshow()">REPORT</button> </th>';
			}*/
			echo '
		</tr>
		<tr>
			<td >RP_NUMBER</td>
			
			<td >';echo $res['rpno'];echo'</td>'; 
			/* CHANGED ACTIVE , font-weight added*/
			if($res['status']=='ACTIVE'){
			echo '<th><button type="submit" id="submit2" name="submit2" style="font-weight:bold;" onclick="transshow('.$i.')" value='.$i.'>VIEW</button></th>';
			}				
		echo '
		</tr>
		<tr>
			<td >ACC_NUMBER</td>
			<td >';echo $res['accno'];echo'</td>
			<form>
			<input type="hidden" name="status" value="'.$status.'"/>
			<th><input id="active" class="active" type="submit" name="active" style="background-color:green;" onclick="return myFunction()" value="'.$status.'"/></th>
			</form>
		    </tr>';
		
		echo '<tr>
			<th>Total Balance</th>
			<th>This week usage</th>
			<th>This week balance</th>
		</tr>
		<tr>
			<th>';echo $res['total'];echo'</th>
			<th>';echo $res['week_usage'];echo'</th>
			<th>';echo $res['week_balance'];echo'</th>
		</tr>
	</table>';
	echo '</form>';
	}
    if($count%2==0){
		
			/* CHANGED ACTIVE , font-weight added, report button added*/
			
		echo '<form action="#" method="post">';
		echo '<input type="hidden" name="rpnum" value="';echo $res['rpno'];echo'"/>';
		echo '<input type="hidden" name="status" value="';echo $res['status'];echo'"/>';
    	echo '
   
	<table id="rightbox" >
		<tr>
			<td rowspan="5" ><img src="data:image/jpeg;base64,'.base64_encode($res['image'] ).'" height="170px"/></td>
			<td >NAME</td>
			<td >';echo $res['name'];echo'</td>';
			/* if added 
			if($res['status']=='ACTIVE'){
				echo '
			<th> <button type="submit" name="report" id="report" class="report" onclick="reportshow()">REPORT</button> </th>';
			}*/
			echo '
		</tr>
		<tr>
			<td >RP_NUMBER</td>
			<td >';echo $res['rpno'];echo'</td>';
			if($res['status']=='ACTIVE'){
			echo '<th>
			<button type="submit" id="submit2" name="submit2" style="font-weight:bold;" onclick="transshow('.$i.')" value='.$i.'>VIEW</button></th>';
			}
						
		echo '
		</tr>
		<tr>
			<td >ACC_NUMBER</td>
			<td >';echo $res['accno'];echo'</td>
			<form>
			<input type="hidden" name="status" value="'.$status.'"/>
			<th><input id="active" class="active" type="submit" name="active" style="background-color:green;" onclick="return myFunction()" value="'.$status.'"/></th>
			</form>
		</tr>
		
		<tr>
			<th>Total Balance</th>
			<th>This week usage</th>
			<th>This week balance</th>
		</tr>
		<tr>
			<th>';echo $res['total'];echo'</th>
			<th>';echo $res['week_usage'];echo'</th>
			<th>';echo $res['week_balance'];echo'</th>
		</tr>
	</table>';
	echo "</form>";
	}
	
} 

?> 
</body>
<script>
function div_show() {
document.getElementById('abc').style.display = "block";
document.getElementById('def').style.display = "none";
document.getElementById('updatebutton').style.display = "none";

}
function div_hide(){
document.getElementById('abc').style.display = "none";
document.getElementById('def').style.display = "block";
document.getElementById('updatebutton').style.display = "block";
}

function show() {
document.getElementById('updateform').style.display = "block";
document.getElementById('updatebutton').style.display = "none";
}
function hide(){
document.getElementById('updateform').style.display = "none";
document.getElementById('updatebutton').style.display = "block";
}




var rp;
function rpnum()
{
return rp;
}

function transshow(name)
{
document.getElementById('transaction').style.display="block";
event.preventDefault();
localStorage.setItem('show', 'true');
window.rp=name;
document.cookie="rpnum="+name;
}
function reportshow()
{
document.getElementById('reportform').style.display="block";
event.preventDefault();
}
function reporthide()
{
document.getElementById('reportform').style.display="none";
event.preventDefault();
}
function transhide()
{
document.getElementById('transaction').style.display="none";
localStorage.setItem('show', 'false');	


}
window.onload = function() {
    var show = localStorage.getItem('show');
    if(show === 'true'){
         document.getElementById('transaction').style.display = "block";
    }
	else
		document.getElementById("transaction").style.display="none";
}

function validateForm() {
  var name = document.forms["form1"]["name"].value;
  var rpno = document.forms["form1"]["rpno"].value;
  var accno = document.forms["form1"]["accno"].value;
  if (name == "") {
    alert("Please fill the name");
    return false;
  }
  else if(rpno == ""){
	  alert("Please fill the RP No");
	  return false;
  }
  if (accno== "") {
    alert("Please fill the Account No");
    return false;
  }
 
}

function valid() {
  var rpno = document.forms["form2"]["rpno"].value;
  var cost = document.forms["form2"]["cost"].value;
  if (rpno == "") {
    alert("Please fill the RP No");
    return false;
  }
  else if(cost == ""){
	  alert("Please fill the Amount");
	  return false;
  }   
}

function tranvalid()
{
var itcode=document.forms["form3"]["itcode"].value;
var qty=document.forms["form3"]["qty"].value;
if(itcode=="")
{
	alert("Please enter the item code");
	return false;
}
else if(qty=="")
{
	alert("Please enter the quantity of item");
	return false;
}
}

 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                return true;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  

function myFunction() {
    var txt;
    var r = confirm("Do you really want to change the status");
    if (r == true) {
        return true;
    } else {
        return false;
    }
}

 </script> 
</html>