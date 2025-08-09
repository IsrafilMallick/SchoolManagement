<?php
$requirelevel=0;
include 'ActiveUsers.php';
$tblnm="main_class";

$sl=$_POST['sl'];	if($sl==""){$sl1="";}else{$sl1="AND sl!='$sl'";}
$ClassName=isset($_POST['ClassName']) ? $_POST['ClassName'] : '';

if($ClassName=='')
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
{
	$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE ClassName='$ClassName' $sl1");
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			mysqli_query($con,"INSERT INTO $tblnm (ClassName, edt, edttm, eby) VALUES('$ClassName', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='ClassEntry.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$ClassName1=$R['ClassName'];
			}
			
			$tblsl=$sl;
			$ufnm='sl';
			if($ClassName!=$ClassName1)
			{
				$fldnm='ClassName';
				$old_val=$ClassName1;
				$new_val=$ClassName;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			mysqli_query($con,"UPDATE $tblnm SET ClassName='$ClassName', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='ClassEntry.php';";
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