<?php
$requirelevel=3;
include 'ActiveUsers.php';

$StudentID=isset($_POST['StudentID']) ? $_POST['StudentID'] : '';
$LedgerHeads=isset($_POST['LedgerHead']) ? $_POST['LedgerHead'] : '';	//Array
//$FeesTypes=isset($_POST['FeesType']) ? $_POST['FeesType'] : '';	//Array
$DiscountAmount=isset($_POST['DiscountAmount']) ? $_POST['DiscountAmount'] : '';
/*
$sql=mysqli_query($con,"SELECT * FROM main_student_data WHERE StudentID='$StudentID' AND stat=2") or die (mysqli_error());
while($R=mysqli_fetch_array($sql))
{
	$Session=$R['CurrentSession'];
    $Class=$R['CurrentClass'];
	$StudentName=$R['StudentName'];
}
$increment=0;
$abbrev='D'.$Session;
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
$PaymentDescription="Discount on Fees against $StudentName ($StudentID)";
mysqli_query($con,"INSERT INTO $tblnm(Session, Month, StudentID, VoucherNo, PaymentDate, PayMode, PaymentDescription, PaymentType, FeesType, FeesLedger, DebitLedger, CreditLedger, TransactionAmount, Class, edt, edttm, eby, stat) VALUES('$Session', '1', '$StudentID', '$VoucherNo', '$edt', '0', '$PaymentDescription', '8', '1', '17', '17', '16', '$TransactionAmount', '$Class', '$edt', '$edttm', '$eby','0')") or die(mysqli_error($con));
*/
mysqli_query($con,"UPDATE main_student_data SET stat=0 WHERE StudentID='$StudentID' AND stat='2'") or die(mysqli_error($con));
mysqli_query($con,"UPDATE main_discount SET DiscountAmount='$DiscountAmount', stat=0, udt='$edt', udttm='$edttm', uby='$eby' WHERE StudentID='$StudentID' AND stat='1'") or die(mysqli_error($con));

foreach($LedgerHeads as $LedgerHead)
{
	$tblsl=get_value('main_drcr','StudentID',$StudentID,'sl',"AND FeesType='1' AND stat='1' AND FeesLedger='$LedgerHead' AND PaymentType='5'",$con);
	$ufnm='sl';
	$fldnm='stat';
	$old_val=1;
	$new_val=0;
	EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
	mysqli_query($con,"UPDATE main_drcr SET stat='0', udt='$edt', udttm='$edttm', uby='$eby' WHERE StudentID='$StudentID' AND FeesType='1' AND stat='1' AND FeesLedger='$LedgerHead' AND PaymentType='5'") or die(mysqli_error($con));
}
?>
<script>
alert('Discount on Fees has been completedv Successfully. . . ! ! !\nThank You. . . ! ! !');
document.location='index.php';
</script>