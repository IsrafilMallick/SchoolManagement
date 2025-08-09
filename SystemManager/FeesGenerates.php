<?php
$requirelevel=3;
include 'ActiveUsers.php';
$tblnm='main_drcr';

$StudentID=isset($_POST['StudentID']) ? $_POST['StudentID'] : '';
$LedgerHeads=isset($_POST['LedgerHead']) ? $_POST['LedgerHead'] : '';	//Array
$FeesTypes=isset($_POST['FeesType']) ? $_POST['FeesType'] : '';	//Array
$DiscountRequest=isset($_POST['DiscountRequest']) ? $_POST['DiscountRequest'] : '';

if($DiscountRequest=='1')
{
	$sql=mysqli_query($con,"SELECT * FROM main_discount WHERE StudentID='$StudentID' AND stat=1") or die (mysqli_error());
	if(mysqli_num_rows($sql)==0)
	{
		mysqli_query($con,"INSERT INTO main_discount(StudentID, edt, edttm, eby) VALUES('$StudentID', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
	}
}

$sql=mysqli_query($con,"SELECT * FROM main_student_data WHERE StudentID='$StudentID' AND stat=1") or die (mysqli_error());
while($R=mysqli_fetch_array($sql))
{
	$Session=$R['CurrentSession'];
    $Class=$R['CurrentClass'];
	$StudentName=$R['StudentName'];
}

$increment=0;
$abbrev='G'.$Session;
$sql=mysqli_query($con,"SELECT VoucherNo FROM $tblnm WHERE Session='$Session' AND VoucherNo LIKE '$abbrev%' ORDER BY sl DESC LIMIT 0,1");
while($R=mysqli_fetch_array($sql))
{
	$VoucherNo=$R['VoucherNo'];
	$increment=substr($VoucherNo,5,5);
}

$count=1;
while($count>0)
{
	$increment+=1;
	$VoucherNo=$abbrev.str_pad($increment, 5, '0', STR_PAD_LEFT);
	$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE Session='$Session' AND VoucherNo='$VoucherNo' ORDER BY sl DESC LIMIT 0,1");
	$count=mysqli_num_rows($sql);
}
$ftyp=0;
$Month=0;
foreach($LedgerHeads as $LedgerHead)
{
	$FeesType=$FeesTypes[$ftyp];
	$Amnt=$_POST['amnt'.$LedgerHead];
	for($i=0;$i<count($Amnt);$i++)
	{
		$Month=$i+1;
		$TransactionAmount=$Amnt[$i];
		if($TransactionAmount>0)
		{
			if($FeesType=='1'&&$DiscountRequest=='1'){$stat=1;}else{$stat=0;}
			
			//echo "$Month - $TransactionAmount<br>";
			$PaymentDescription="Fees generated against $StudentName ($StudentID) for ".get_value('account_ledg','sl',$LedgerHead,'LedgerName','',$con);
			$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE Session='$Session' AND Month='$Month' AND StudentID='$StudentID' AND PaymentType='5' AND DebitLedger='16' AND CreditLedger='$LedgerHead'")or die (mysqli_error($con));
			if(mysqli_num_rows($sql)==0)
			{
				mysqli_query($con,"INSERT INTO $tblnm(Session, Month, StudentID, VoucherNo, PaymentDate, PayMode, PaymentDescription, PaymentType, FeesType, FeesLedger, DebitLedger, CreditLedger, TransactionAmount, Class, edt, edttm, eby, stat) VALUES('$Session', '$Month', '$StudentID', '$VoucherNo', '$edt', '0', '$PaymentDescription', '5', '$FeesType', '$LedgerHead', '16', '$LedgerHead', '$TransactionAmount', '$Class', '$edt', '$edttm', '$eby','$stat')") or die(mysqli_error($con));
				mysqli_query($con,"UPDATE main_student_data SET stat=2 WHERE StudentID='$StudentID'") or die(mysqli_error($con));
			}
			else
			{
				mysqli_query($con,"UPDATE $tblnm SET Session='$Session', PaymentDescription='$PaymentDescription', FeesLedger='$LedgerHead', CreditLedger='$LedgerHead', TransactionAmount='$TransactionAmount', Class='$Class', udt='$edt', udttm='$edttm', uby='$eby' WHERE Session='$Session' AND Month='$Month' AND StudentID='$StudentID' AND PaymentType='5' AND DebitLedger='16' AND CreditLedger='$LedgerHead'") or die(mysqli_error($con));
			}
		}
	}
	$ftyp++;
}
?>
<script>
alert('Fees Generated Successfully. . . ! ! !\nThank You. . . ! ! !');
document.location='AdmissionSlip.php?StudentID=<?=$StudentID?>';
</script>