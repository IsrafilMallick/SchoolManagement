<?php
$requirelevel=3;
include 'ActiveUsers.php';
$StudentID=isset($_REQUEST['StudentID']) ? $_REQUEST['StudentID'] : '';


$StudentImage=$_FILES["StudentImage"]["tmp_name"];
if(file_exists($StudentImage))
{
	$TargetFolder="StudentImage/";	if(!is_dir($TargetFolder)){mkdir($TargetFolder);}
	$TargetPath=$TargetFolder.$StudentID.'.jpg';
	$FileName="StudentImage";
	$FileSize=10240000;
	$FileWidth=138;
	$FileHeight=177;
	photo_upload($FileName,$FileSize,$TargetPath,$FileWidth,$FileHeight);
}

$FatherImage=$_FILES["FatherImage"]["tmp_name"];
if(file_exists($FatherImage))
{
	$TargetFolder="FatherImage/";	if(!is_dir($TargetFolder)){mkdir($TargetFolder);}
	$TargetPath=$TargetFolder.$StudentID.'.jpg';
	$FileName="FatherImage";
	$FileSize=10240000;
	$FileWidth=138;
	$FileHeight=177;
	photo_upload($FileName,$FileSize,$TargetPath,$FileWidth,$FileHeight);
}

$MotherImage=$_FILES["MotherImage"]["tmp_name"];
if(file_exists($MotherImage))
{
	$TargetFolder="MotherImage/";	if(!is_dir($TargetFolder)){mkdir($TargetFolder);}
	$TargetPath=$TargetFolder.$StudentID.'.jpg';
	$FileName="MotherImage";
	$FileSize=10240000;
	$FileWidth=138;
	$FileHeight=177;
	photo_upload($FileName,$FileSize,$TargetPath,$FileWidth,$FileHeight);
}

$msg='Document Uploaded Successfully. . . ! ! ! \n Thank you. . . ! ! !';
$returnpage="document.location='FeesGenerate.php?StudentID=$StudentID';";
/*
else
{
	$TargetFolder="StudImg/";	if(!is_dir($TargetFolder)){mkdir($TargetFolder);}
	$TargetPath="$TargetFolder$sid.jpg";
	$SourcePath="ApplImg/$applno.jpg";
	if(file_exists($SourcePath))
	{
		$image=new SimpleImage();
		$image->load($SourcePath);
		$image->resize(138,177);
		$image->save($TargetPath);			
		unlink($SourcePath);
	}
}
*/
?>
<script>
alert('<?=$msg?>');
<?=$returnpage?>
</script>
