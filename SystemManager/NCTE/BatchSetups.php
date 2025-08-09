<?php
$requirelevel=0;
include 'ActiveUsers.php';

$sl=isset($_POST['sl']) ? $_POST['sl'] : '';    if($sl==''){$sl1="";}else{$sl1="AND sl!='$sl'";}
$sesn=isset($_POST['sesn']) ? $_POST['sesn'] : '';
$course=isset($_POST['course']) ? $_POST['course'] : '';
$batch=isset($_POST['batch']) ? $_POST['batch'] : '';
$day=isset($_POST['day']) ? $_POST['day'] : '';
$time=isset($_POST['time']) ? $_POST['time'] : '';

if($sesn==''||$course==''||$batch==''||$day==''||$time=='')
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";	
}
else
{
	$sql=mysqli_query($con,"SELECT * FROM main_batch_setup WHERE sesn='$sesn' AND course='$course' AND batch='$batch' AND day='$day' AND time='$time' AND eby='$eby' $sl1");
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			$sql=mysqli_query($con,"INSERT INTO main_batch_setup(sesn, course, batch, day, time, edt, edttm, eby) SELECT sesn, course, batch, day, time, '$edt', '$edttm', '$eby' FROM temp_batch_setup WHERE sesn='$sesn' AND course='$course' AND batch='$batch' AND eby='$eby' ORDER BY sl") or die(mysqli_error($con));
			if(mysqli_insert_id($con))
			{
				$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
				$returnpage="document.location='BatchSetup.php';";
			}
			else
			{
				$msg='Please Add Batch First. . . .! ! !';
				$returnpage="window.history.go(-1);";	
			}
			
			mysqli_query($con,"DELETE FROM temp_batch_setup WHERE sesn='$sesn' AND course='$course' AND batch='$batch' AND eby='$eby' ORDER BY sl") or die(mysqli_error($con));
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM main_batch_setup WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$sesn1=$R['sesn'];
				$course1=$R['course'];
				$batch1=$R['batch'];
				$day1=$R['day'];
				$time1=$R['time'];
			}
			
			$tblnm='main_batch_setup';
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
			
			if($batch!=$batch1)
			{
				$fldnm='batch';
				$old_val=$batch1;
				$new_val=$batch;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($day!=$day1)
			{
				$fldnm='day';
				$old_val=$day1;
				$new_val=$day;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($time!=$time1)
			{
				$fldnm='time';
				$old_val=$time1;
				$new_val=$time;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			$sql=mysqli_query($con,"UPDATE main_batch_setup SET sesn='$sesn', course='$course', batch='$batch', day='$day', time='$time', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='BatchSetup.php';";
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