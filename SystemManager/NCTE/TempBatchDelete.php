<?php
$requirelevel=0;
include 'ActiveUsers.php';

$TableName=$_REQUEST['TableName'];
$FieldName=$_REQUEST['FieldName'];
$FieldValue=$_REQUEST['FieldValue'];

$sql=mysqli_query($con,"DELETE FROM $TableName WHERE $FieldName='$FieldValue'") or die(mysqli_error($con));
include 'TempBatchShow.php';
?>