<?php
$requirelevel=0;
include 'ActiveUsers.php';

$Session=isset($_REQUEST['CurrentSession']) ? $_REQUEST['CurrentSession'] : '';
$Month=isset($_REQUEST['Month']) ? $_REQUEST['Month'] : '';
$StudentID=isset($_REQUEST['StudentID']) ? $_REQUEST['StudentID'] : '';
$Class=isset($_REQUEST['Class']) ? $_REQUEST['Class'] : '';
$BillNo=isset($_REQUEST['BillNo']) ? $_REQUEST['BillNo'] : '';
$PaymentDate=isset($_REQUEST['PaymentDate']) ? date('Y-m-d',strtotime($_REQUEST['PaymentDate'])) : '';
$PayMode=isset($_REQUEST['PayMode']) ? $_REQUEST['PayMode'] : '';
$PaymentType=isset($_REQUEST['PaymentType']) ? $_REQUEST['PaymentType'] : '';
$PaymentDescription=isset($_REQUEST['PaymentDescription']) ? rawurldecode($_REQUEST['PaymentDescription']) : '';
$PaymentType=isset($_REQUEST['PaymentType']) ? $_REQUEST['PaymentType'] : '';
$FeesLedger=isset($_REQUEST['FeesLedger']) ? $_REQUEST['FeesLedger'] : '';
$DebitLedger=isset($_REQUEST['DebitLedger']) ? $_REQUEST['DebitLedger'] : '';
$CreditLedger=isset($_REQUEST['CreditLedger']) ? $_REQUEST['CreditLedger'] : '';
$TransactionAmount=isset($_REQUEST['TransactionAmount']) ? $_REQUEST['TransactionAmount'] : '';
$BankName=isset($_REQUEST['BankName']) ? rawurldecode($_REQUEST['BankName']) : '';
$BranchName=isset($_REQUEST['BranchName']) ? rawurldecode($_REQUEST['BranchName']) : '';
$ChequeNo=isset($_REQUEST['ChequeNo']) ? $_REQUEST['ChequeNo'] : '';
$ChequeDate=isset($_REQUEST['ChequeDate']) ? $_REQUEST['ChequeDate'] : '';
$TransactionNo=isset($_REQUEST['TransactionNo']) ? $_REQUEST['TransactionNo'] : '';
$TransactionDate=isset($_REQUEST['TransactionDate']) ? date('Y-m-d',strtotime($_REQUEST['TransactionDate'])) : '';
$BillDate=isset($_REQUEST['BillDate']) ? date('Y-m-d',strtotime($_REQUEST['BillDate'])) : '';

if($PayMode==2)
{
	if($ChequeNo==''||$ChequeDate=='')
	{
		$Condition='';
	}
	else
	{
		$Condition=1;
		$ChequeDate=date('Y-m-d',strtotime($ChequeDate));
	}
}
else if($PayMode==3)
{
	if($TransactionNo==''||$TransactionDate=='')
	{
		$Condition='';
	}
	else
	{
		$Condition=1;
		$TransactionDate=date('Y-m-d',strtotime($TransactionDate));
	}
}
else
{
	$Condition=1;
}

$FeesType=get_value('main_fees_setup','LedgerHead',$FeesLedger,'FeesType','',$con);
if($FeesLedger=='17') //Discount on Student Fees
{
	$PaymentType=8;		//Doscount
	$DebitLedger=17;
	$FeesType=1;
	$PaymentDescription="<b> Discount on Student Fess </b> against <b>";
	$PaymentDescription.=ucwords(strtolower(get_value('main_student_data','StudentID',$StudentID,'StudentName','',$con)))." ($StudentID)</b>";
}

if($PaymentDate==''||$PayMode==''||$DebitLedger==''||$TransactionAmount==''||$Condition=='')
{
	?><script>
	alert('Please Fill All The Field');
	</script><?php
}
else
{
	$sql=mysqli_query($con,"SELECT * FROM temp_drcr WHERE Session='$Session' AND Month='$Month' AND StudentID='$StudentID' AND PayMode='$PayMode' AND FeesLedger='$FeesLedger' AND DebitLedger='$DebitLedger' AND CreditLedger='$CreditLedger' AND TransactionAmount='$TransactionAmount' AND PaymentType='$PaymentType' AND PaymentDate='$PaymentDate' AND eby='$eby'");
	if(mysqli_num_rows($sql)==0)
	{
		if($PaymentType=='6'||$PaymentType=='7')
		{
			if($PaymentType==6){$LedgerHead=$FeesLedger;}else
			if($PaymentType==7){$LedgerHead=$CreditLedger;}
			$PaymentDescription.=" against <b>".get_value('account_ledg','sl',$LedgerHead,'LedgerName','',$con)."</b> from <b>";
			$PaymentDescription.=ucwords(strtolower(get_value('main_student_data','StudentID',$StudentID,'StudentName','',$con)))." ($StudentID)</b>";
		}
		
		mysqli_query($con,"INSERT INTO temp_drcr(Session, Month, StudentID, PaymentDate, PayMode, PaymentDescription, PaymentType, FeesType, FeesLedger, DebitLedger, CreditLedger, TransactionAmount, Class, BankName, BranchName, ChequeNo, ChequeDate, TransactionNo, TransactionDate, edt, edttm, eby) VALUES('$Session', '$Month', '$StudentID', '$PaymentDate', '$PayMode', '$PaymentDescription', '$PaymentType', '$FeesType', '$FeesLedger', '$DebitLedger', '$CreditLedger', '$TransactionAmount', '$Class', '$BankName', '$BranchName', '$ChequeNo', '$ChequeDate', '$TransactionNo', '$TransactionDate', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
	}
	else
	{
		?><script>
		alert('Duplicate Entry');
		</script><?php
	}
}
include 'TempPaymentDetailShow.php';
?>