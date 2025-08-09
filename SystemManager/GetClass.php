<?php
include 'connect.php';
$Session=isset($_REQUEST['SourceFieldValue']) ? $_REQUEST['SourceFieldValue'] : '';
$FieldName=isset($_REQUEST['TargetFieldName']) ? $_REQUEST['TargetFieldName'] : '';
$FunctionType=isset($_REQUEST['FunctionType']) ? $_REQUEST['FunctionType'] : 0;

$Functions=array('','onChange="show()"','onChange="GetSection('.$Session.', \'AdmissionSectionDiv\',\'AdmissionSection\', this.value, 0)"','onChange="show();GetSection('.$Session.', \'AdmissionSectionDiv\',\'AdmissionSection\', this.value, 0)"','onChange="GetSection('.$Session.', \'CurrentSectionDiv\',\'CurrentSection\', this.value, 2)"','onChange="show();GetSection('.$Session.', \'CurrentSectionDiv\',\'CurrentSection\', this.value, 0)"');

$sql=mysqli_query($con,"SELECT Class FROM main_section WHERE Session='$Session' AND stat=0 GROUP BY Class ORDER BY Class") or die(mysqli_error($con));
?>
<select name="<?=$FieldName?>" id="<?=$FieldName?>" class="form-control" <?=$Functions[$FunctionType];?> required>
<option value="">--- Select ---</option>
<?php
while($R=mysqli_fetch_array($sql))
{
    $ClassSl=$R['Class'];
	$ClassName=get_value('main_class','sl',$ClassSl,'ClassName','',$con);
	?><option value="<?=$ClassSl?>"><?=$ClassName?></option><?php
}
?>
</select>