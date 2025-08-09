<?php
include 'connect.php';
$sesn=isset($_REQUEST['sesn']) ? $_REQUEST['sesn'] : '';
$course=isset($_REQUEST['course']) ? $_REQUEST['course'] : '';
$sql=mysqli_query($con,"SELECT CoursePackage FROM main_course_setup WHERE sesn='$sesn' AND course='$course' AND stat=0") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $CoursePackage=$R['CoursePackage'];		
}
$CoursePackages=explode(',',$CoursePackage);
?>
<select name="CoursePackage" id="CoursePackage" class="form-control" required>
<option value="">--- Select ---</option>
<?php
foreach ($CoursePackages as $CoursePackage)
{
    $CoursePackageName=get_value('coursepackage','sl',$CoursePackage,'PackageName','',$con);
    ?><option value="<?=$CoursePackage?>"><?=$CoursePackageName?></option><?php
}
?>
</select>