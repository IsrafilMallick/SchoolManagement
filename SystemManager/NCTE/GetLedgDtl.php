<?php
include "connect.php";
$gsl=$_REQUEST['gsl'];
$psl='';
$sql=mysqli_query($con,"SELECT psl FROM account_group WHERE stat=0 AND sl='$gsl'");
while($R=mysqli_fetch_array($sql))
{
	$psl=$R['psl'];
}

$flag=0;
if($psl==1||$psl==2)
{
	if($gsl==2||$gsl==4)
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