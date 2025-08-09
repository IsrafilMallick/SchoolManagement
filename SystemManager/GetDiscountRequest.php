<?php
include 'connect.php';
 
$sql=mysqli_query($con,"SELECT COUNT(sl) FROM main_discount WHERE stat='1' GROUP BY StudentID") or die(mysqli_error($con));
echo $DisCountRequest=mysqli_num_rows($sql);
?>