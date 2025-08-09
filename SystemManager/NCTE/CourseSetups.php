<?php
$requirelevel=0;
include 'ActiveUsers.php';
$tblnm='main_course_setup';

$sl=isset($_POST['sl']) ? $_POST['sl'] : '';    if($sl==''){$sl1="";}else{$sl1="AND sl!='$sl'";}
$sesn=isset($_POST['sesn']) ? $_POST['sesn'] : '';
$course=isset($_POST['course']) ? $_POST['course'] : '';
$duration=isset($_POST['duration']) ? $_POST['duration'] : '';
$CourseFees=isset($_POST['CourseFees']) ? $_POST['CourseFees'] : '';
$CoursePackage=isset($_POST['CoursePackage']) ? implode(',',$_POST['CoursePackage']) : '';
if($sesn==''||$course=='')
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
{
	$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE sesn='$sesn' AND course='$course' $sl1");
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			mysqli_query($con,"INSERT INTO main_course_setup(sesn, course, duration, CourseFees, CoursePackage, edt, edttm, eby) VALUES('$sesn', '$course', '$duration', '$CourseFees', '$CoursePackage', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='CourseSetup.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM main_course_setup WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$sesn1=$R['sesn'];
				$course1=$R['course'];
				$duration1=$R['duration'];
				$CourseFees1=$R['CourseFees'];
				$CoursePackage1=$R['CoursePackage'];
			}
			
			$tblnm='main_course_setup';
			$tblsl=$sl;
			$ufnm='sl';
			if($sesn!=$sesn1)
			{
				$fldnm='sesn';
				$old_val=$sesn1;
				$new_val=$sesn;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($course!=$course1)
			{
				$fldnm='course';
				$old_val=$course1;
				$new_val=$course;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($duration!=$duration1)
			{
				$fldnm='duration';
				$old_val=$duration1;
				$new_val=$duration;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($CourseFees!=$CourseFees1)
			{
				$fldnm='CourseFees';
				$old_val=$CourseFees1;
				$new_val=$CourseFees;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($CoursePackage!=$CoursePackage1)
			{
				$fldnm='CoursePackage';
				$old_val=$CoursePackage1;
				$new_val=$CoursePackage;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			$sql=mysqli_query($con,"UPDATE main_course_setup SET sesn='$sesn', course='$course', duration='$duration', CourseFees='$CourseFees', CoursePackage='$CoursePackage', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='CourseSetup.php';";
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