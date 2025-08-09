<?php
$requirelevel=0;
include 'ActiveUsers.php';
$tblnm="main_section";

$sl=isset($_POST['sl']) ? $_POST['sl'] : '';    if($sl==''){$sl1="";}else{$sl1="AND sl!='$sl'";}
$Session=isset($_POST['Session']) ? $_POST['Session'] : '';
$Class=isset($_POST['Class']) ? $_POST['Class'] : '';
$SectionName=isset($_POST['SectionName']) ? $_POST['SectionName'] : '';

if($Session==''||$Class==''||$SectionName=='')
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
{
	$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE Session='$Session' AND Class='$Class' AND SectionName='$SectionName' $sl1");
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			$SectionNameArray=explode(',',$SectionName);
			foreach($SectionNameArray as $SectionName)
			{
				mysqli_query($con,"INSERT INTO $tblnm (Session, Class, SectionName, edt, edttm, eby) VALUES ('$Session', '$Class', '$SectionName', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
			}
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='SectionSetup.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$Session1=$R['Session'];
				$Class1=$R['Class'];
				$SectionName1=$R['SectionName'];
			}
			
			$tblsl=$sl;
			$ufnm='sl';
			if($Session!=$Session1)
			{
				$fldnm='Session';
				$old_val=$Session1;
				$new_val=$Session;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}

			if($Class!=$Class1)
			{
				$fldnm='Class';
				$old_val=$Class1;
				$new_val=$Class;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}

			if($SectionName!=$SectionName1)
			{
				$fldnm='SectionName';
				$old_val=$SectionName1;
				$new_val=$SectionName;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}

			mysqli_query($con,"UPDATE main_section SET Session='$Session', Class='$Class', SectionName='$SectionName', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='SectionSetup.php';";
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