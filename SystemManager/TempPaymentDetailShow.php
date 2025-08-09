<?php
$requirelevel=0;
$stat=isset($_REQUEST['stat']) ? $_REQUEST['stat'] : '';
$StudentID=isset($_REQUEST['StudentID']) ? $_REQUEST['StudentID'] : '';
$PaymentType=isset($_REQUEST['PaymentType']) ? $_REQUEST['PaymentType'] : '';

if($stat=='1'){include("ActiveUsers.php");}
if($StudentID==""){$StudentID1="";}else{$StudentID1="AND StudentID='$StudentID'";}
if($PaymentType==""){$PaymentType1="";}else{$PaymentType1="AND PaymentType IN ('$PaymentType','8')";}

$cnt=0;
$sql=mysqli_query($con,"SELECT * FROM temp_drcr WHERE sl>0 $StudentID1 $PaymentType1 AND eby='$eby' ORDER BY sl") or die(mysqli_error($con));
if(mysqli_num_rows($sql)>0){
?>
<table border="1" style="width:100%;">
<tr style="background-color:#FFCC99;">
<td id="tblhed">Sl</td>
<td id="tblhed">Session</td>
<td id="tblhed">Month</td>
<td id="tblhed">Pay Date</td>
<td id="tblhed">Pay Mode</td>
<td id="tblhed">Pay To (Dr.)</td>
<td id="tblhed">Bank Name</td>
<td id="tblhed">Branch Name</td>
<td id="tblhed">Cheque No.</td>
<td id="tblhed">Cheque Dated</td>
<td id="tblhed">Fees Head</td>
<td id="tblhed">Amount</td>
<td id="tblhed">Action</td>
</tr>
<?php
$Amnt=0;
while($R=mysqli_fetch_array($sql))
{
	$cnt++;
	$Session=$R['Session'];
	$Month=$R['Month'];
	$PaymentDate=$R['PaymentDate'];	if($PaymentDate=='0000-00-00'){$PaymentDate="";}else{$PaymentDate=date('d-m-Y',strtotime($PaymentDate));}
	$PayMode=$R['PayMode'];
	$FeesLedger=$R['FeesLedger'];
	$DebitLedger=$R['DebitLedger'];
	$CreditLedger=$R['CreditLedger'];
	$BankName=$R['BankName'];
	$BranchName=$R['BranchName'];
	$ChequeNo=$R['ChequeNo'];
	$ChequeDate=$R['ChequeDate'];	if($ChequeDate=='0000-00-00'){$ChequeDate="";}else{$ChequeDate=date('d-m-Y',strtotime($ChequeDate));}
	$PaymentDescription=$R['PaymentDescription'];
	$TransactionAmount=$R['TransactionAmount'];
	$stat=$R['stat'];
	
	$Amnt+=$TransactionAmount;
	
	if($PaymentDate==""){$PaymentDate='NA';}
	if($PayMode==""){$PayMode='NA';}
	if($DebitLedger==""){$DebitLedger='NA';}
	if($BankName==""){$BankName='NA';}
	if($BranchName==""){$BranchName='NA';}
	if($ChequeNo==""){$ChequeNo='NA';}
	if($ChequeDate==""){$ChequeDate='NA';}
	if($PaymentDescription==""){$PaymentDescription='NA';}
	if($TransactionAmount==""){$TransactionAmount='NA';}
	
	?>
	<tr>
	<td id="tblbody"><?php echo $cnt;?></td>
	<td id="tblbody"><?php echo $Session;?></td>
	<td id="tblbody"><?php echo $Months[$Month];?></td>
	<td id="tblbody"><?php echo $PaymentDate;?></td>
	<td id="tblbody"><?php echo get_value('main_paymode','sl',$PayMode,'PayMode','',$con);?></td>
	<td id="tblbody"><?php echo get_value('account_ledg','sl',$DebitLedger,'LedgerName','',$con);?></td>
	<td id="tblbody"><?php echo $BankName;?></td>
	<td id="tblbody"><?php echo $BranchName;?></td>
	<td id="tblbody"><?php echo $ChequeNo;?></td>
	<td id="tblbody"><?php echo $ChequeDate;?></td>
	<td id="tblbodynm"><?php echo get_value('account_ledg','sl',$FeesLedger,'LedgerName','',$con);;?></td>
	<td id="tblhedrow"><?php echo number_format($TransactionAmount,2);?></td>
	<td id="tblbody">
	<i class="fa fa-trash-o fa-lg" style="color:#F00; cursor:pointer;" onclick="del('temp_PaymentDatels','sl','<?=$PayModesl;?>','<?=$StudentID;?>')" title="Click to Delete"></i>
	</td>
	</tr>
	<?php
}
?>
<tr>
	<td colspan="11" id="tblhedrow">Total : </td>
	<td id="tblhedrow"><?php echo number_format($Amnt,2);?></td>
	<td id="tblhedrow">&nbsp;</td>
</tr>
</table>
<?php }?>