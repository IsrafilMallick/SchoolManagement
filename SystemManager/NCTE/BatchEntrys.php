<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$tblnm="main_batch";
$sl=$_POST['sl'];	if($sl==""){$sl1="";}else{$sl1="AND sl!='$sl'";}
$BatchName=isset($_POST['BatchName']) ? $_POST['BatchName'] : '';
if($BatchName=='')
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
{
	$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE BatchName='$BatchName' $sl1");
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			mysqli_query($con,"INSERT INTO $tblnm (BatchName, edt, edttm, eby) VALUES('$BatchName', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='BatchEntry.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$BatchName1=$R['BatchName'];
			}
			
			$tblsl=$sl;
			$ufnm='sl';
			if($BatchName!=$BatchName1)
			{
				$fldnm='BatchName';
				$old_val=$BatchName1;
				$new_val=$BatchName;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			mysqli_query($con,"UPDATE $tblnm SET BatchName='$BatchName', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='BatchEntry.php';";
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