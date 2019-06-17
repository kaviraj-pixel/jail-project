<?php
$connect = mysqli_connect('localhost', 'root', '', 'check') or die('Error connecting to MySQL server.');
$d1=$_POST['a'];
$d2=$_POST['b'];

$rpno=$_POST['rpno'];

$date1=date_create($d1);
$date2=date_create($d2);

$d1= date_format($date1,"d.m.Y");
$d2= date_format($date2,"d.m.Y");
$diff=date_diff($date1,$date2);
$l= $diff->format("%a");
$result=mysqli_query($connect,"SELECT * FROM `".$rpno."`") or die(mysqli_error());
$result1=mysqli_query($connect,"SHOW COLUMNS FROM `".$rpno."`") or die(mysqli_error());
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
$lim=sizeof($fields);
echo '<table border="1">';
echo '<tr>';
echo '<th>'.$fields[0].'</th>';
for($i=1;$i<$lim;$i++){
	$datecheck1=date_create($fields[$i]);
	$diff1=date_diff($date1,$datecheck1);
	$lowlimit=$diff1->format("%r%a");
	
	$diff2=date_diff($date2,$datecheck1);
	$uplimit=$diff2->format("%r%a");
	
	if($lowlimit>=0 and $uplimit<=0){
	echo '<th>'.$fields[$i].'</th>';}}

echo '</tr>';
while ($row = mysqli_fetch_assoc($result)){
	echo '<tr>';
	$d=$row[$fields[0]];
	echo '<th>'.$row[$fields[0]].'</th>';
	
	for($i=1;$i<$lim;$i++){
     $datecheck1=date_create($fields[$i]);
	$diff1=date_diff($date1,$datecheck1);
	$lowlimit=$diff1->format("%r%a");
	
	$diff2=date_diff($date2,$datecheck1);
	$uplimit=$diff2->format("%r%a");
	if($lowlimit>=0 and $uplimit<=0){
    echo "<td>".$row[$fields[$i]]."</td>";}}
    
   
	echo '</tr>';
}

echo '</table>';




?>