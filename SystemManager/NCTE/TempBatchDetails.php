<?php
$requirelevel=0;
include 'ActiveUsers.php';
$tblnm='temp_batch_setup';

$sesn=isset($_REQUEST['sesn']) ? $_REQUEST['sesn'] : '';
$course=isset($_REQUEST['course']) ? $_REQUEST['course'] : '';
$batch=isset($_REQUEST['batch']) ? $_REQUEST['batch'] : '';
$day=isset($_REQUEST['day']) ? $_REQUEST['day'] : '';
$time=isset($_REQUEST['time']) ? $_REQUEST['time'] : '';

if($sesn==''||$course==''||$batch==''||$day==''||$time=='')
{
    $msg='Please Fill all fields Correctly. . . .! ! !';
    //$returnpage='window.history.go(-1)';
}
else
{
	$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sesn='$sesn' AND course='$course' AND batch='$batch' AND day='$day' AND time='$time' AND eby='$eby'");
	if(mysqli_num_rows($sql)==0)
	{
		mysqli_query($con,"INSERT INTO temp_batch_setup(sesn, course, batch, day, time, edt, edttm, eby) VALUES('$sesn', '$course', '$batch', '$day', '$time', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
		$msg='Batch Added Successfully. . . ! ! !';
	}
	else
	{
		$msg="Sorry. . . Duplicate Entry. . . ! ! !";
		//$returnpage="window.history.go(-1);";
	}
}
include 'TempBatchShow.php';
?>
<script>
alert('<?=$msg?>');
<?php //=$returnpage?>
</script>