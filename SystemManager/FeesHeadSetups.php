<?php
$requirelevel=3;
include 'ActiveUsers.php';
$tblnm='account_ledg';

$sl=isset($_POST['sl']) ? $_POST['sl'] : '';    if($sl==''){$sl1="";}else{$sl1="AND sl!='$sl'";}
$GroupSerial=isset($_POST['GroupSerial']) ? $_POST['GroupSerial'] : '';
$FeesType=isset($_POST['FeesType']) ? $_POST['FeesType'] : '';
$FeesHead=isset($_POST['FeesHead']) ? $_POST['FeesHead'] : '';

if($GroupSerial==""||$FeesType==""||$FeesHead=="")
{
    $msg='Please Fill all fields Correctly. . . .! ! !';
    $returnpage='window.history.go(-1)';
}
else
{
	$sql=mysqli_query($con,"SELECT * FROM main_fees_head WHERE GroupSerial='$GroupSerial' AND FeesHead='$FeesHead' AND FeesType='$FeesType' $sl1") or die (mysqli_error($con));
	if(mysqli_num_rows($sql)==0)
	{
		$PrimarySerial=get_value('account_group','sl',$GroupSerial,'PrimarySerial','',$con);
		if($sl=="")
		{
			mysqli_query($con,"INSERT INTO $tblnm(PrimarySerial, GroupSerial, LedgerName, CostStatus, edt, edttm, eby) VALUES('$PrimarySerial', '$GroupSerial', '$FeesHead', '1', '$edt', '$edttm', '$eby')") or die (mysqli_error($con));
			$LedgerHead=get_value($tblnm,'LedgerName',$FeesHead,'sl','',$con);
			mysqli_query($con,"INSERT INTO main_fees_head(PrimarySerial, GroupSerial, FeesHead, LedgerHead, FeesType, edt, edttm, eby) VALUES('$PrimarySerial', '$GroupSerial', '$FeesHead', '$LedgerHead', '$FeesType', '$edt', '$edttm', '$eby')") or die (mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Thank you. . . ! ! !';
			$returnpage="document.location='FeesHeadSetup.php';";
		}
		else
		{
			$LedgerHead=get_value('main_fees_head','sl',$sl,'LedgerHead','',$con);
			$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$LedgerHead'") or die (mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$PrimarySerial1=$R['PrimarySerial'];
				$GroupSerial1=$R['GroupSerial'];
				$LedgerName1=$R['LedgerName'];
			}

			$tblsl=$LedgerHead;
			$ufnm='sl';
			if($PrimarySerial!=$PrimarySerial1)
			{
				$fldnm='PrimarySerial';
				$old_val=$PrimarySerial1;
				$new_val=$PrimarySerial;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
				EditLog('main_fees_head',$sl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($GroupSerial!=$GroupSerial1)
			{
				$fldnm='GroupSerial';
				$old_val=$GroupSerial1;
				$new_val=$GroupSerial;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
				EditLog('main_fees_head',$sl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}

			if($FeesHead!=$LedgerName1)
			{
				$fldnm='LedgerName';
				$old_val=$LedgerName1;
				$new_val=$FeesHead;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
				EditLog('main_fees_head',$sl,$ufnm,'FeesHead',$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			mysqli_query($con,"UPDATE $tblnm SET PrimarySerial='$PrimarySerial', GroupSerial='$GroupSerial', LedgerName='$FeesHead', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$LedgerHead'")or die (mysqli_error($con));
			mysqli_query($con,"UPDATE main_fees_head SET PrimarySerial='$PrimarySerial', GroupSerial='$GroupSerial', LedgerHead='$LedgerHead', FeesHead='$FeesHead', FeesType='$FeesType', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'")or die (mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='FeesHeadSetup.php';";
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