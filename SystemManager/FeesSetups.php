<?php
$requirelevel=3;
include 'ActiveUsers.php';
$tblnm="main_fees_setup";

$Session=isset($_REQUEST['Session']) ? $_REQUEST['Session'] : '';
$Class=isset($_REQUEST['Class']) ? $_REQUEST['Class'] : '';
$LedgerHeads=isset($_POST['LedgerHead']) ? $_POST['LedgerHead'] : '';		//Array
$FeesTypes=isset($_POST['FeesType']) ? $_POST['FeesType'] : '';		//Array
$Month=0;

$ftyp=0;
foreach($LedgerHeads as $LedgerHead)
{
	$FeesType=$FeesTypes[$ftyp];
	$Amnt=$_POST['amnt'.$LedgerHead];
	for($i=0;$i<count($Amnt);$i++)
	{
		$Month=$i+1;
		$amnt=$Amnt[$i];
		if($amnt>0)
		{
			$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE Session='$Session' AND Class='$Class' AND Month='$Month' AND LedgerHead='$LedgerHead'")or die (mysqli_error($con));
			if(mysqli_num_rows($sql)==0)
			{
				mysqli_query($con,"INSERT INTO $tblnm(Session, Month, Class, FeesType, LedgerHead, amnt, edt, edttm, eby) VALUES('$Session', '$Month', '$Class', '$FeesType', '$LedgerHead', '$amnt', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
			}
			else
			{
				$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE Session='$Session' AND Class='$Class' AND Month='$Month' AND LedgerHead='$LedgerHead'") or die(mysqli_error($con));
				while($R=mysqli_fetch_array($sql))
				{
					$sl=$R['sl'];
					$Session1=$R['Session'];
					$Month1=$R['Month'];
					$Class1=$R['Class'];
					$FeesType1=$R['FeesType'];
					$LedgerHead1=$R['LedgerHead'];
					$amnt1=$R['amnt'];
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
				
				if($Month!=$Month1)
				{
					$fldnm='Month';
					$old_val=$Month1;
					$new_val=$Month;
					EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
				}
				
				if($Class!=$Class1)
				{
					$fldnm='Class';
					$old_val=$Class1;
					$new_val=$Class;
					EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
				}
				
				if($FeesType!=$FeesType1)
				{
					$fldnm='FeesType';
					$old_val=$FeesType1;
					$new_val=$FeesType;
					EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
				}
				
				if($LedgerHead!=$LedgerHead1)
				{
					$fldnm='LedgerHead';
					$old_val=$LedgerHead1;
					$new_val=$LedgerHead;
					EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
				}
				
				if($amnt!=$amnt1)
				{
					$fldnm='amnt';
					$old_val=$amnt1;
					$new_val=$amnt;
					EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
				}
				$sql=mysqli_query($con,"UPDATE $tblnm SET Session='$Session', Month='$Month', Class='$Class', FeesType='$FeesType', LedgerHead='$LedgerHead', amnt='$amnt', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			}
		}
	}
	$ftyp++;
}
?>
<script>
alert('Fees Setup Completed Successfully. . . ! ! !');
document.location='FeesSetup.php?Class=<?=$Class?>';
</script>