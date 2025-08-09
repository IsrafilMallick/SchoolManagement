<?php
include 'connect.php';
$Session=isset($_REQUEST['Session']) ? $_REQUEST['Session'] : '';
$Class=isset($_REQUEST['SourceFieldValue']) ? $_REQUEST['SourceFieldValue'] : '';
$FieldName=isset($_REQUEST['TargetFieldName']) ? $_REQUEST['TargetFieldName'] : '';
$FunctionType=isset($_REQUEST['FunctionType']) ? $_REQUEST['FunctionType'] : 0;

$Functions=array('','onChange="show()"','onChange="GetRollNo()"');

$sql=mysqli_query($con,"SELECT sl, SectionName FROM main_section WHERE Session='$Session' AND Class='$Class' AND stat=0 GROUP BY SectionName ORDER BY SectionName") or die(mysqli_error($con));
?>
<select name="<?=$FieldName?>" id="<?=$FieldName?>" class="form-control" <?=$Functions[$FunctionType];?> required>
<option value="">--- Select ---</option>
<?php
while($R=mysqli_fetch_array ($sql))
{
	$SectionName=$R['SectionName'];
	?><option value="<?=$SectionName?>"><?=$SectionName?></option><?php
}
?>
</select>