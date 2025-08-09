<?php
$requirelevel=0;
include 'ActiveUsers.php';
$sl=$_POST['sl']; if($sl==""){$sl1="";}else{$sl1="AND sl!='$sl'";}

$refnm=NameCase($_POST['refnm']);
$refmob=$_POST['refmob'];
$refpan=strtoupper($_POST['refpan']);
$payamnt=$_POST['payamnt'];

if($refnm==""||$refmob==""||$payamnt=="")
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM main_reference WHERE refnm='$refnm' AND refmob='$refmob' AND refpan='$refpan' $sl1"))==0)
{
	if($sl=="")
	{
		$vid=0;
		$count5=1;
		while($count5>0)
		{
			$vid=$vid+1;
			$refid='RFR'.str_pad($vid, 3, '0', STR_PAD_LEFT);
			$query6=mysqli_query($con,"select * from main_reference where refid='$refid'");
			$count5=mysqli_num_rows($query6);		
		}

		mysqli_query($con,"INSERT INTO main_reference (refid, refnm, refmob, refpan, payamnt, edt, edttm, eby) VALUES('$refid', '$refnm', '$refmob', '$refpan', '$payamnt', '$edt', '$edttm', '$eby')") or die(mysqli_error());
		$msg="Submitted Successfully. . . ! ! !  \nYour Student Enquiry ID is : $refid";
		$returnpage="document.location='reference.php';";
	}
	else
	{
		mysqli_query($con,"UPDATE main_reference SET refnm='$refnm', refmob='$refmob', refpan='$refpan', payamnt='$payamnt', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error());
		$msg="Updated Successfully. . . ! ! !  ";
		$returnpage="document.location='reference.php';";
	}
}
else
{
		$msg="Sorry. . . Duplicate Entry. . . ! ! !";
		$returnpage="window.history.go(-1);";
}
?>
<script>
alert('<?=$msg?>');
<?=$returnpage?>
</script>