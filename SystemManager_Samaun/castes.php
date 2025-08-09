<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$tblnm="main_caste";
$sl=$_POST['sl'];	if($sl==""){$sl1="";}else{$sl1="AND sl!='$sl'";}
$caste=$_POST['caste'];
if($caste=='')
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
{
	$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE caste='$caste' $sl1");
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			mysqli_query($con,"INSERT INTO $tblnm (caste, edt, edttm, eby) VALUES('$caste', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='caste.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$caste1=$R['caste'];
			}
			
			$tblsl=$sl;
			$ufnm='sl';
			if($caste!=$caste1)
			{
				$fldnm='caste';
				$old_val=$caste1;
				$new_val=$caste;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			mysqli_query($con,"UPDATE $tblnm SET caste='$caste', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='caste.php';";
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