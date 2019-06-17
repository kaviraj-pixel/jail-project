<?php
$connect = mysqli_connect('localhost', 'root', '', 'canteen') or die('Error connecting to MySQL server.');
$d1=$_POST['a'];
$d2=$_POST['b'];

$item=$_POST['item1'];

$date1=date_create($d1);
$date2=date_create($d2);
$diff=date_diff($date1,$date2);
$l= $diff->format("%a");
$d1= date_format($date1,"d.m.Y");
$d2= date_format($date2,"d.m.Y");
if($item=="all"){
$result=mysqli_query($connect,"SELECT * FROM report") or die(mysqli_error());}
else{
	$result=mysqli_query($connect,"SELECT * FROM report where ITEMS='$item'") or die(mysqli_error());
}
$result1=mysqli_query($connect,"SHOW COLUMNS FROM report") or die(mysqli_error());
$fields = array();
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
while ($x = mysqli_fetch_assoc($result1)){
  $fields[] = $x['Field'];
}

$x=array_search($d1,$fields);
$mtotal=0;
$lim=($x+$l);
echo '<table border="1">';
echo '<tr>';
echo '<th>'.$fields[0].'</th>';
for($i=$x;$i<=$lim;$i++){
echo '<th>'.$fields[$i].'</th>';}
echo "<th>TOTAL QTY</th>";
echo "<th>TOTAL COST</th>";
echo '</tr>';
while ($row = mysqli_fetch_assoc($result)){
	echo '<tr>';
	$d=$row[$fields[0]];
	echo '<th>'.$row[$fields[0]].'</th>';
	$sum1=0;
	for($i=$x;$i<=$lim;$i++){
     $sum1+=$row[$fields[$i]];
    echo "<td>".$row[$fields[$i]]."</td>";}
    echo "<td>".$sum1."</td>";
    $result2=mysqli_query($connect,"SELECT * FROM grocery where ITEMS='$d'") or die(mysqli_error());
    while($row1= mysqli_fetch_assoc($result2)){
    	
    	$rate=$row1['RATE'];
    }
    $total=$sum1*$rate;
    $mtotal+=$total;
    echo "<td>".$total."</td>";
	echo '</tr>';
}
echo "<tr>";
for($i=$x;$i<=$lim;$i++){
	echo "<td></td>";
}
echo "<td></td><th>MAIN TOTAL:</th>";
echo "<td>".$mtotal."</td></tr>";
echo '</table>';




?>