<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$TableName='account_group';

$sl=$_POST['sl']; if($sl==""){$sl1="";}else{$sl1="AND sl!='$sl'";}
$PrimarySerial=$_POST['PrimarySerial'];
$GroupName=$_POST['GroupName'];

if($PrimarySerial==""||$GroupName=="")
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
{
	$sql=mysqli_query($con,"SELECT * FROM $TableName WHERE PrimarySerial='$PrimarySerial' AND GroupName='$GroupName' $sl1") or die(mysqli_error($con));
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			mysqli_query($con,"INSERT INTO $TableName(PrimarySerial, GroupName, edt, edttm, eby) VALUES('$PrimarySerial', '$GroupName', '$edt', '$edttm', '$eby')")or die(mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='AccountGroup.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM $TableName WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$PrimarySerial1=$R['PrimarySerial'];
				$GroupName1=$R['GroupName'];
			}

			$tblsl=$sl;
			$ufnm='sl';
			if($PrimarySerial!=$PrimarySerial1)
			{
				$fldnm='PrimarySerial';
				$old_val=$PrimarySerial1;
				$new_val=$PrimarySerial;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($GroupName!=$GroupName1)
			{
				$fldnm='GroupName';
				$old_val=$GroupName1;
				$new_val=$GroupName;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			$sql=mysqli_query($con,"UPDATE $TableName SET PrimarySerial='$PrimarySerial', GroupName='$GroupName', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Thank you. . . ! ! !';
			$returnpage="document.location='AccountGroup.php';";
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