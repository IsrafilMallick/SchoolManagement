<?php
$requirelevel=3;
include 'ActiveUsers.php';
$tblnm='main_fees_head';
$sql=mysqli_query($con,"SELECT sl, ledghed FROM $tblnm ORDER BY sl ASC");
while($R=mysqli_fetch_array($sql))
{
	$sl=$R['sl'];
	$ledghed=$R['ledghed'];
	echo "$ledghed<br>";
	mysqli_query($con,"UPDATE $tblnm SET LedgerHead='$ledghed' WHERE sl='$sl'");
}
?>