<?php
include "connect.php";
$GroupSerial=$_REQUEST['GroupSerial'];
$PrimarySerial='';
$sql=mysqli_query($con,"SELECT PrimarySerial FROM account_group WHERE stat=0 AND sl='$GroupSerial'");
while($R=mysqli_fetch_array($sql))
{
	$PrimarySerial=$R['PrimarySerial'];
}

$flag=0;
if($PrimarySerial==1||$PrimarySerial==2)
{
	if($GroupSerial==2||$GroupSerial==4)
	{
		$flag=1;
	}
	else
	{
		$flag=2;
	}
}
echo $flag;
?>