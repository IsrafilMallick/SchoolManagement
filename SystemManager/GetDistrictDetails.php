<?php
include 'connect.php';
$pin=$_REQUEST['pin'];
$po=rawurldecode($_REQUEST['po']);
$sql=mysqli_query($con,"SELECT * FROM main_pincodedetails WHERE PinCode='$pin' AND PostOffice='$po'") or die(mysqli_error());
while($R=mysqli_fetch_array($sql))
{
	$PoliceStation=NameCase($R['PoliceStation']);
	$District=NameCase($R['District']);
	$State=NameCase($R['State']);
}
echo $PoliceStation."@".$District."@".$State;
?>
