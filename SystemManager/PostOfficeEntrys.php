<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$tblnm="main_pincodedetails";

$sl=isset($_POST['sl']) ? $_POST['sl'] : '';    if($sl==''){$sl1="";}else{$sl1="AND sl!='$sl'";}
$PostOffice=isset($_POST['PostOffice']) ? $_POST['PostOffice'] : '';
$PoliceStation=isset($_POST['PoliceStation']) ? $_POST['PoliceStation'] : '';
$District=isset($_POST['District']) ? $_POST['District'] : '';
$State=isset($_POST['State']) ? $_POST['State'] : '';
$PinCode=isset($_POST['PinCode']) ? $_POST['PinCode'] : '';

if($PostOffice==''||$PoliceStation==''||$District==''||$State==''||$PinCode=='')
{
    $msg='Please Fill all fields Correctly. . . .! ! !';
    $returnpage='window.history.go(-1)';
}
else
{
	$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE PostOffice='$PostOffice' AND PoliceStation='$PoliceStation' AND District='$District' AND State='$State' AND PinCode='$PinCode' $sl1");
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			mysqli_query($con,"INSERT INTO main_pincodedetails(PostOffice, PoliceStation, District, State, PinCode, edt, edttm, eby) VALUES('$PostOffice', '$PoliceStation', '$District', '$State', '$PinCode', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='PostOfficeEntry.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM main_pincodedetails WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$PostOffice1=$R['PostOffice'];
				$PoliceStation1=$R['PoliceStation'];
				$District1=$R['District'];
				$State1=$R['State'];
				$PinCode1=$R['PinCode'];
			}
			
			$tblnm='main_pincodedetails';
			$tblsl=$sl;
			$ufnm='sl';
			if($PostOffice!=$PostOffice1)
			{
				$fldnm='PostOffice';
				$old_val=$PostOffice1;
				$new_val=$PostOffice;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($PoliceStation!=$PoliceStation1)
			{
				$fldnm='PoliceStation';
				$old_val=$PoliceStation1;
				$new_val=$PoliceStation;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($District!=$District1)
			{
				$fldnm='District';
				$old_val=$District1;
				$new_val=$District;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($State!=$State1)
			{
				$fldnm='State';
				$old_val=$State1;
				$new_val=$State;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($PinCode!=$PinCode1)
			{
				$fldnm='PinCode';
				$old_val=$PinCode1;
				$new_val=$PinCode;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			mysqli_query($con,"UPDATE main_pincodedetails SET PostOffice='$PostOffice', PoliceStation='$PoliceStation', District='$District', State='$State', PinCode='$PinCode', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='PostOfficeEntry.php';";
		}
	}
	else
	{
		$msg="Sorry. . . Duplicate Entry. . . ! ! !";
		$returnpage="window.history.go(-1);";
	}
}
?>
<script>
alert('<?=$msg?>');
<?=$returnpage?>
</script>