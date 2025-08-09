<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$TableName='account_ledg';

$sl=isset($_POST['sl']) ? $_POST['sl'] : '';    if($sl==''){$sl1="";}else{$sl1="AND sl!='$sl'";}
$PrimarySerial=isset($_POST['PrimarySerial']) ? $_POST['PrimarySerial'] : '';
$GroupSerial=isset($_POST['GroupSerial']) ? $_POST['GroupSerial'] : '';
$LedgerName=isset($_POST['LedgerName']) ? $_POST['LedgerName'] : '';
$CostStatus=isset($_POST['CostStatus']) ? $_POST['CostStatus'] : '';
$BranchName=isset($_POST['BranchName']) ? $_POST['BranchName'] : '';
$BranchAddress=isset($_POST['BranchAddress']) ? $_POST['BranchAddress'] : '';
$BranchIFSC=isset($_POST['BranchIFSC']) ? $_POST['BranchIFSC'] : '';
$AccountNo=isset($_POST['AccountNo']) ? $_POST['AccountNo'] : '';
$Address=isset($_POST['Address']) ? $_POST['Address'] : '';
$MobileNo=isset($_POST['MobileNo']) ? $_POST['MobileNo'] : '';
$PanNo=isset($_POST['PanNo']) ? $_POST['PanNo'] : '';
$GstNo=isset($_POST['GstNo']) ? $_POST['GstNo'] : '';

if($GroupSerial==""||$LedgerName==""||$CostStatus=="")
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
{
	$sql=mysqli_query($con,"SELECT * FROM $TableName WHERE GroupSerial='$GroupSerial' AND LedgerName='$LedgerName' $sl1") or die (mysqli_error());
	if(mysqli_num_rows($sql)==0)
	{
		$PrimarySerial=get_value('account_group','sl',$GroupSerial,'PrimarySerial','',$con);
		if($sl=="")
		{
			mysqli_query($con,"INSERT INTO $TableName(PrimarySerial, GroupSerial, LedgerName, CostStatus, BranchName, BranchAddress, BranchIFSC, AccountNo, Address, MobileNo, PanNo, GstNo, edt, edttm, eby) VALUES('$PrimarySerial', '$GroupSerial', '$LedgerName', '$CostStatus', '$BranchName', '$BranchAddress', '$BranchIFSC', '$AccountNo', '$Address', '$MobileNo', '$PanNo', '$GstNo', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Thank you. . . ! ! !';
			$returnpage="document.location='LedgerHead.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM $TableName WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$PrimarySerial1=$R['PrimarySerial'];
				$GroupSerial1=$R['GroupSerial'];
				$LedgerName1=$R['LedgerName'];
				$CostStatus1=$R['CostStatus'];
				$BranchName1=$R['BranchName'];
				$BranchAddress1=$R['BranchAddress'];
				$BranchIFSC1=$R['BranchIFSC'];
				$AccountNo1=$R['AccountNo'];
				$Address1=$R['Address'];
				$MobileNo1=$R['MobileNo'];
				$PanNo1=$R['PanNo'];
				$GstNo1=$R['GstNo'];
			}
			
			$tblsl=$sl;
			$ufnm='sl';
			if($PrimarySerial!=$PrimarySerial1)
			{
				$fldnm='PrimarySerial';
				$old_val=$PrimarySerial1;
				$new_val=$PrimarySerial;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($GroupSerial!=$GroupSerial1)
			{
				$fldnm='GroupSerial';
				$old_val=$GroupSerial1;
				$new_val=$GroupSerial;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($LedgerName!=$LedgerName1)
			{
				$fldnm='LedgerName';
				$old_val=$LedgerName1;
				$new_val=$LedgerName;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($CostStatus!=$CostStatus1)
			{
				$fldnm='CostStatus';
				$old_val=$CostStatus1;
				$new_val=$CostStatus;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($BranchName!=$BranchName1)
			{
				$fldnm='BranchName';
				$old_val=$BranchName1;
				$new_val=$BranchName;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($BranchAddress!=$BranchAddress1)
			{
				$fldnm='BranchAddress';
				$old_val=$BranchAddress1;
				$new_val=$BranchAddress;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($BranchIFSC!=$BranchIFSC1)
			{
				$fldnm='BranchIFSC';
				$old_val=$BranchIFSC1;
				$new_val=$BranchIFSC;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($AccountNo!=$AccountNo1)
			{
				$fldnm='AccountNo';
				$old_val=$AccountNo1;
				$new_val=$AccountNo;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($Address!=$Address1)
			{
				$fldnm='Address';
				$old_val=$Address1;
				$new_val=$Address;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($MobileNo!=$MobileNo1)
			{
				$fldnm='MobileNo';
				$old_val=$MobileNo1;
				$new_val=$MobileNo;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($PanNo!=$PanNo1)
			{
				$fldnm='PanNo';
				$old_val=$PanNo1;
				$new_val=$PanNo;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($GstNo!=$GstNo1)
			{
				$fldnm='GstNo';
				$old_val=$GstNo1;
				$new_val=$GstNo;
				EditLog($TableName,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			$sql=mysqli_query($con,"UPDATE $TableName SET PrimarySerial='$PrimarySerial', GroupSerial='$GroupSerial', LedgerName='$LedgerName', CostStatus='$CostStatus', BranchName='$BranchName', BranchAddress='$BranchAddress', BranchIFSC='$BranchIFSC', AccountNo='$AccountNo', Address='$Address', MobileNo='$MobileNo', PanNo='$PanNo', GstNo='$GstNo', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Thank you. . . ! ! !';
			$returnpage="document.location='LedgerHead.php';";
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