<?php
include 'connect.php';
$FieldName=isset($_REQUEST['FieldName']) ? $_REQUEST['FieldName'] : '';
$sesn=isset($_REQUEST['sesn']) ? $_REQUEST['sesn'] : '';
$FunctionType=isset($_REQUEST['FunctionType']) ? $_REQUEST['FunctionType'] : 0;
$Functions=array('','onChange="show()"','onChange="GetBatch(this.value)"','onChange="show();GetBatch(this.value)"','onChange="GetCoursePackage()"');


$sql=mysqli_query($con,"SELECT course FROM main_course_setup WHERE sesn='$sesn' AND stat=0") or die(mysqli_error($con));
?>
<select name="<?=$FieldName?>" id="<?=$FieldName?>" class="form-control" <?=$Functions[$FunctionType];?> required>
<option value="">--- Select ---</option>
<?php
while($R=mysqli_fetch_array($sql))
{
    $CourseSl=$R['course'];
	$CourseName=get_value('main_course','sl',$CourseSl,'course','',$con);
	?><option value="<?=$CourseSl?>"><?=$CourseName?></option><?php
}
?>
</select>