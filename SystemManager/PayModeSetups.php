<?php
$requirelevel=0;
include 'ActiveUsers.php';
$tblnm="main_paymode_setup";

$sl=$_POST['sl'];	if($sl==""){$sl1="";}else{$sl1="AND sl!='$sl'";}
$PayMode=$_POST['PayMode'];
$GroupSerial=$_POST['GroupSerial'];
$LedgerHead=$_POST['LedgerHead'];

if($PayMode==''||$GroupSerial=='')
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
{
	$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE PayMode='$PayMode' AND GroupSerial='$GroupSerial' AND LedgerHead='$LedgerHead' $sl1");
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			if($LedgerHead=="")
			{
				$sql1=mysqli_query($con,"SELECT * FROM account_ledg WHERE stat=0 AND GroupSerial='$GroupSerial'");
				while($list1=mysqli_fetch_array($sql1))
				{
					$drldgr=$list1['sl'];
					$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE PayMode='$PayMode' AND GroupSerial='$GroupSerial' AND LedgerHead='$drldgr' $sl1");
					if(mysqli_num_rows($sql)==0)
					{
						$PrimarySerial=get_value('account_group','sl',$GroupSerial,'PrimarySerial','',$con);
						mysqli_query($con,"INSERT INTO $tblnm(PrimarySerial, GroupSerial, LedgerHead, PayMode, edt, edttm, eby) VALUES('$PrimarySerial', '$GroupSerial', '$drldgr', '$PayMode', '$edt', '$edttm', '$eby')");
					}
				}
			}
			else
			{
				$PrimarySerial=get_value('account_group','sl',$GroupSerial,'PrimarySerial','',$con);
				mysqli_query($con,"INSERT INTO $tblnm(PrimarySerial, GroupSerial, LedgerHead, PayMode, edt, edttm, eby) VALUES('$PrimarySerial', '$GroupSerial', '$LedgerHead', '$PayMode', '$edt', '$edttm', '$eby')");
			}
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='PayModeSetup.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE $sl='$sl'");
			while($R=mysqli_fetch_array($sql))
			{
				$PrimarySerial1=$R['PrimarySerial'];
				$GroupSerial1=$R['GroupSerial'];
				$LedgerHead1=$R['LedgerHead'];
				$PayMode1=$R['PayMode'];
			}
			
			$tblsl=$sl;
			$ufnm='sl';
			if($PrimarySerial!=$PrimarySerial1)
			{
				$fldnm='PrimarySerial';
				$old_val=$PrimarySerial1;
				$new_val=$PrimarySerial;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($GroupSerial!=$GroupSerial1)
			{
				$fldnm='GroupSerial';
				$old_val=$GroupSerial1;
				$new_val=$GroupSerial;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($LedgerHead!=$LedgerHead1)
			{
				$fldnm='LedgerHead';
				$old_val=$LedgerHead1;
				$new_val=$LedgerHead;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($PayMode!=$PayMode1)
			{
				$fldnm='PayMode';
				$old_val=$PayMode1;
				$new_val=$PayMode;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			$sql=mysqli_query($con,"UPDATE $tblnm SET PrimarySerial='$PrimarySerial', GroupSerial='$GroupSerial', LedgerHead='$LedgerHead', PayMode='$PayMode', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Thank you. . . ! ! !';
			$returnpage="document.location='PayMode_setup.php';";
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