<?php
$requirelevel=0;
include 'ActiveUsers.php';
$tblnm="main_course";

$sl=isset($_POST['sl']) ? $_POST['sl'] : '';    if($sl==''){$sl1="";}else{$sl1="AND sl!='$sl'";}
$course=isset($_POST['course']) ? $_POST['course'] : '';
$ccode=isset($_POST['ccode']) ? strtoupper($_POST['ccode']) : '';
$eligibility=isset($_POST['eligibility']) ? $_POST['eligibility'] : '';
if($course==''||$ccode==''||$eligibility=='')
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
{
	$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE course='$course' AND ccode='$ccode' AND eligibility='$eligibility' $sl1") or die(mysqli_error($con));
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			mysqli_query($con,"INSERT INTO main_course(course, ccode, eligibility, edt, edttm, eby) VALUES('$course', '$ccode', '$eligibility', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='CourseEntry.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM main_course WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$course1=$R['course'];
				$ccode1=$R['ccode'];
				$eligibility1=$R['eligibility'];
			}
			
			$tblnm='main_course';
			$tblsl=$sl;
			$ufnm='sl';
			if($course!=$course1)
			{
				$fldnm='course';
				$old_val=$course1;
				$new_val=$course;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($ccode!=$ccode1)
			{
				$fldnm='ccode';
				$old_val=$ccode1;
				$new_val=$ccode;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($eligibility!=$eligibility1)
			{
				$fldnm='eligibility';
				$old_val=$eligibility1;
				$new_val=$eligibility;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			$sql=mysqli_query($con,"UPDATE main_course SET course='$course', ccode='$ccode', eligibility='$eligibility', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='CourseEntry.php';";
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