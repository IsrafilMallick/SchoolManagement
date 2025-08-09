<?php
$requirelevel=1;
include 'ActiveUsers.php';
$tblnm='main_student_data';

$StudentID=isset($_REQUEST['StudentID']) ? $_REQUEST['StudentID'] : '';
$data=mysqli_query($con,"SELECT * FROM $tblnm WHERE StudentID='$StudentID' AND stat=0") or die(mysqli_error());
while($R=mysqli_fetch_array($data))
{	
	$sl=$R['sl'];
	$StudentID=$R['StudentID'];
	$AdmissionSession=$R['AdmissionSession'];
	$AdmissionClass=$R['AdmissionClass'];
	$AdmissionSection=$R['AdmissionSection'];
	$AdmissionDate=$R['AdmissionDate'];
	$CurrentSession=$R['CurrentSession'];
	$CurrentClass=$R['CurrentClass'];
	$CurrentSection=$R['CurrentSection'];
	$CurrentRollNo=$R['CurrentRollNo'];
	$StudentName=$R['StudentName'];
	$BirthDate=$R['BirthDate'];
	$Gender=$R['Gender'];
	$Caste=$R['Caste'];
	$Religion=$R['Religion'];
	$AadharNo=$R['AadharNo'];
	$FatherName=$R['FatherName'];
	$FatherQualification=$R['FatherQualification'];
	$FatherOccupation=$R['FatherOccupation'];
	$FatherMobile=$R['FatherMobile'];
	$MotherName=$R['MotherName'];
	$MotherQualification=$R['MotherQualification'];
	$MotherOccupation=$R['MotherOccupation'];
	$MotherMobile=$R['MotherMobile'];
	$GuardianName=$R['GuardianName'];
	$GuardianQualification=$R['GuardianQualification'];
	$GuardianOccupation=$R['GuardianOccupation'];
	$GuardianMobile=$R['GuardianMobile'];
	$GuardianRelation=$R['GuardianRelation'];
	$PermanentVillage=$R['PermanentVillage'];
	$PermanentPostOffice=$R['PermanentPostOffice'];
	$PermanentPoliceStation=$R['PermanentPoliceStation'];
	$PermanentDistrict=$R['PermanentDistrict'];
	$PermanentState=$R['PermanentState'];
	$PermanentPin=$R['PermanentPin'];
	$ResidentVillage=$R['ResidentVillage'];
	$ResidentPostOffice=$R['ResidentPostOffice'];
	$ResidentPoliceStation=$R['ResidentPoliceStation'];
	$ResidentDistrict=$R['ResidentDistrict'];
	$ResidentState=$R['ResidentState'];
	$ResidentPin=$R['ResidentPin'];
	$BankName=$R['BankName'];
	$BranchName=$R['BranchName'];
	$BranchAddress=$R['BranchAddress'];
	$BranchIFSC=$R['BranchIFSC'];
	$BranchMICR=$R['BranchMICR'];
	$AccountNo=$R['AccountNo'];
	$stat=$R['stat'];
}

if(empty($sl)){$sl='';}
if(empty($StudentID)){$StudentID='';}
if(empty($AdmissionSession)){$AdmissionSession=$sesn;}
if(empty($AdmissionClass)){$AdmissionClass='';}
if(empty($AdmissionSection)){$AdmissionSection='';}
if(empty($AdmissionDate)){$AdmissionDate=date('d-m-Y', strtotime($edt));}else{$AdmissionDate=date('d-m-Y', strtotime($AdmissionDate));}
if(empty($CurrentSession)){$CurrentSession='';}
if(empty($CurrentClass)){$CurrentClass='';}
if(empty($CurrentSection)){$CurrentSection='';}
if(empty($CurrentRollNo)){$CurrentRollNo='';}
if(empty($StudentName)){$StudentName='';}
if(empty($BirthDate)){$BirthDate='';}else{$BirthDate=date('d-m-Y', strtotime($BirthDate));}
if(empty($Gender)){$Gender='';}
if(empty($Caste)){$Caste='';}
if(empty($Religion)){$Religion='';}
if(empty($AadharNo)){$AadharNo='';}
if(empty($FatherName)){$FatherName='';}
if(empty($FatherQualification)){$FatherQualification='';}
if(empty($FatherOccupation)){$FatherOccupation='';}
if(empty($FatherMobile)){$FatherMobile='';}
if(empty($MotherName)){$MotherName='';}
if(empty($MotherQualification)){$MotherQualification='';}
if(empty($MotherOccupation)){$MotherOccupation='';}
if(empty($MotherMobile)){$MotherMobile='';}
if(empty($GuardianName)){$GuardianName='';}
if(empty($GuardianQualification)){$GuardianQualification='';}
if(empty($GuardianOccupation)){$GuardianOccupation='';}
if(empty($GuardianMobile)){$GuardianMobile='';}
if(empty($GuardianRelation)){$GuardianRelation='';}
if(empty($PermanentVillage)){$PermanentVillage='';}
if(empty($PermanentPostOffice)){$PermanentPostOffice='';}
if(empty($PermanentPoliceStation)){$PermanentPoliceStation='';}
if(empty($PermanentDistrict)){$PermanentDistrict='';}
if(empty($PermanentState)){$PermanentState='';}
if(empty($PermanentPin)){$PermanentPin='';}
if(empty($ResidentVillage)){$ResidentVillage='';}
if(empty($ResidentPostOffice)){$ResidentPostOffice='';}
if(empty($ResidentPoliceStation)){$ResidentPoliceStation='';}
if(empty($ResidentDistrict)){$ResidentDistrict='';}
if(empty($ResidentState)){$ResidentState='';}
if(empty($ResidentPin)){$ResidentPin='';}
if(empty($BankName)){$BankName='';}
if(empty($BranchName)){$BranchName='';}
if(empty($BranchAddress)){$BranchAddress='';}
if(empty($BranchIFSC)){$BranchIFSC='';}
if(empty($BranchMICR)){$BranchMICR='';}
if(empty($AccountNo)){$AccountNo='';}

$PresentAddress="Vill-$ResidentVillage, PO-$ResidentPostOffice, PS-$ResidentPoliceStation, Dist-$ResidentDistrict, Pin-$ResidentPin";
if(mysqli_num_rows($data)>0)
{
	?>
    <input type="hidden" id="CurrentSession" name="CurrentSession" value="<?=$CurrentSession;?>">
    <input type="hidden" id="Class" name="Class" value="<?=$CurrentClass;?>">
    <input type="hidden" name="PaymentType" id="PaymentType" value="6">
    <input type="hidden" name="CreditLedger" id="CreditLedger" value="16">
    <table border="1" align="center" style="border:3px solid #000000;" width="100%">
    <tr style="background-color:#FFCC99;">
    	<td colspan="8" id="tblhed">Admission Details</td>
    </tr>
    <!--
    <tr>
        <td id="tblhed1">Session : </td>
        <td id="tblhed1"><?=$CurrentSession?> - <?=$CurrentSession+1?></td>
        <td id="tblhed1">Admission Date : </td>
        <td id="tblhed1"><?=date('d-m-Y', strtotime($AdmissionDate))?></td>
        <td id="tblhed1">Date Of Birth : </td>
        <td id="tblhed1"><?=date('d-m-Y', strtotime($BirthDate))?></td>
        <td id="tblhed1">Student ID : </td>
        <td id="tblhed1"><?=$StudentID?></td>
        <td id="tblhed1">Guardian's Name : </td>
        <td id="tblhed1"><?=$GuardianName?></td>
/    </tr>
    -->
    <tr>
    	<td id="tblhed1">Student's Name : </td>
        <td id="tblbodynm"><?=$StudentName?></td>
		<td id="tblhed1">Class : </td>
        <td id="tblbodynm"><?=get_value('main_class','sl',$CurrentClass,'ClassName','',$con)?></td>
        <td id="tblhed1">Section : </td>
        <td id="tblbodynm"><?=$CurrentSection?></td>
        <td id="tblhed1">Roll No. : </td>
        <td id="tblbodynm"><?=$CurrentRollNo?></td>
	</tr>
    <tr>
		<td id="tblhed1">Father's Name : </td>
        <td id="tblbodynm"><?=$FatherName?></td>
        <td id="tblhed1">Mother's Name : </td>
        <td id="tblbodynm"><?=$MotherName?></td>
		<td id="tblhed1">Student's Address : </td>
        <td id="tblbodynm" colspan="3"><?=$PresentAddress?></td>
    </tr>
  
    <tr>
    <td colspan="8">
    <hr />
    	<table align="center" border="1" width="100%">
        <tr style="background-color:#FFCC99;">
        	<td colspan="6" id="tblhed">Payment History</td>
        </tr>
        <tr style="background-color:#FFEAB7;">
        	<td id="tblhed">Sr. No </td>
            <td id="tblhed">Bill No.</td>
            <td id="tblhed">Payment Date</td>
            <td id="tblhed">Payment Description </td>
            <td id="tblhed">Payment Amount</td>
            <td id="tblhed">Print</td>
        </tr>
        <?php
		$cnt=0;
		$TotTransactionAmount=0;
		$sql=mysqli_query($con,"SELECT *, SUM(TransactionAmount) AS TransactionAmount FROM main_drcr WHERE StudentID='$StudentID' AND Session='$CurrentSession' AND PaymentType=6 AND stat=0 GROUP BY BillNo");
		while($R=mysqli_fetch_array($sql))
		{
			$cnt++;
			$BillNo=$R['BillNo'];
			$PaymentDate=$R['PaymentDate'];
			$PayMode=$R['PayMode'];
			$PaymentDescription=$R['PaymentDescription'];
			$TransactionAmount=$R['TransactionAmount'];
			$TotTransactionAmount+=$TransactionAmount;
			?>
            <tr>
                <td id="tblbody"><?=$cnt?></td>
                <td id="tblbody"><?=$BillNo?></td>
                <td id="tblbody"><?=date('d-m-Y', strtotime($PaymentDate))?></td>
                <td id="tblbodynm"><?=$PaymentDescription;?></td>
                <td id="tblbody"><?=number_format($TransactionAmount,2)?></td>
                <td id="tblbodylink">
                <a href="bill_rprints.php?StudentID=<?=$StudentID;?>&BillNo=<?=$BillNo;?>&prntcopy=2" target="_blank"><i class="fa fa-print fa-lg" title="Click to Print Bill" style="cursor:pointer; color:#F0F;"></i></a>
                </td>
            </tr>
			<?php
		}
		?>
        <tr>
        	<td colspan="4" id="tblhedrow">Total Paid : </td>
            <td id="tblbody"><?=number_format($TotTransactionAmount,2)?></td>
            <td id="tblbody"></td>
        </tr>
        </table>
    	<hr />
        <table align="center" border="1" width="100%">
        <tr style="background-color:#FFCC99;">
        	<td colspan="3" id="tblhed">Bill Details</td>
        </tr>
        <tr style="background-color:#FFEAB7;">
            <td id="tblhed">Sl. No.</td>
            <td id="tblhed">Particular's</td>
            <td id="tblhed">Fees Amount <br />(Rs.)</td>
        </tr>
        <?php
		$TotGTransactionAmount=0;
		$cnt=0;
		$sql=mysqli_query($con,"SELECT DebitLedger, CreditLedger, SUM(TransactionAmount) AS TransactionAmount FROM main_drcr WHERE Session='$CurrentSession' AND Month<'$Month' AND StudentID='$StudentID' AND PaymentType='5' AND stat=0 GROUP BY CreditLedger ORDER BY CreditLedger ASC") or die(mysqli_error());
		while($R=mysqli_fetch_array($sql))
		{
			$cnt++;
			$DebitLedger=$R['DebitLedger'];
			$CreditLedger=$R['CreditLedger'];
			$TransactionAmount=$R['TransactionAmount'];
			$TotGTransactionAmount+=$TransactionAmount;
			?>
			<tr>
				<td id="tblbody"><?=$cnt?></td>
				<td id="tblbodynm"><?=get_value('account_ledg','sl',$CreditLedger,'LedgerName','',$con);?></td>
				<td id="tblbodyrow">(+) <?=number_format($TransactionAmount,2)?></td>
			</tr>
			<?php 
		}
		$DebitLedger=17;
		$DiscountAmount=0;
		$sql=mysqli_query($con,"SELECT DiscountAmount FROM main_discount WHERE Session='$CurrentSession' AND StudentID='$StudentID' AND stat=0");
		while($R=mysqli_fetch_array($sql))
		{
			$DiscountAmount=$R['DiscountAmount'];
		}
		?>
        <tr>
            <td id="tblbody"><?=$cnt+1?></td>
            <td id="tblbodynm"><?=get_value('account_ledg','sl',$DebitLedger,'LedgerName','',$con);?></td>
            <td id="tblbodyrow">(-) <?=number_format($DiscountAmount,2)?></td>
        </tr>
        <tr style="background-color:#FFEAB7;">
            <td id="tblhedrow" colspan="2">Total Fees : </td>
            <td id="tblhedrow"><?=number_format($TotGTransactionAmount-$DiscountAmount,2)?></td>
        </tr>
        <tr style="background-color:#FFEAB7;">
            <td id="tblhedrow" colspan="2">Total Received : </td>
            <td id="tblhedrow"><?=number_format($TotTransactionAmount,2)?></td>
        </tr>
        <tr style="background-color:#FFEAB7;">
            <td id="tblhedrow" colspan="2">Net Receivable : </td>
            <td id="tblhedrow"><?=number_format($TotGTransactionAmount-$TotTransactionAmount-$DiscountAmount,2)?></td>
        </tr>
        </table>
        <hr />
        <table class="table table-hover table-striped table-bordered">
        <tr>
        	<td id="tblhed" colspan="6">Payment Details</td>
        </tr>
        <tr>
        	<td id="tblhedrow">Fees Head</td>
        	<td id="tblhedrow">
           	<select name="FeesLedger" id="FeesLedger" class="form-control">
            <?php
			$Tot[]='';
            $sql=mysqli_query($con,"SELECT CreditLedger, SUM(TransactionAmount) AS TransactionAmount FROM main_drcr WHERE StudentID='$StudentID' AND Session='$CurrentSession' AND PaymentType='5' AND Month<='$Month' AND TransactionAmount>0 AND stat=0 GROUP BY CreditLedger ORDER BY CreditLedger ASC") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$CreditLedger=$R['CreditLedger'];
				$sql1=mysqli_query($con,"SELECT (SUM(IF(CreditLedger='$CreditLedger' AND DebitLedger='16', TransactionAmount, 0)) - SUM(IF(CreditLedger='16' AND FeesLedger='$CreditLedger', TransactionAmount, 0))) AS TotAmnt FROM main_drcr WHERE Session='$CurrentSession' AND Month<'$Month' AND StudentID='$StudentID' AND stat=0");
				while($R1=mysqli_fetch_array($sql1))
				{
					$TotAmnt=$R1['TotAmnt'];
					$Tot[]=$TotAmnt;
				}
				if($TotAmnt>0){?><option value="<?=$CreditLedger?>"><?=get_value('account_ledg','sl',$CreditLedger,'LedgerName','',$con);?> (<?=$TotAmnt?>/-)</option><?php }
			}
			
			$DebitLedger=17;
			$DiscountAmount=0;
			$sql=mysqli_query($con,"SELECT DiscountAmount FROM main_discount WHERE Session='$CurrentSession' AND StudentID='$StudentID' AND stat=0");
			while($R=mysqli_fetch_array($sql))
			{
				$DiscountAmount=$R['DiscountAmount'];
			}
			if($DiscountAmount>0){?><option value="<?=$DebitLedger?>"><?=get_value('account_ledg','sl',$DebitLedger,'LedgerName','',$con);?> (<?=$DiscountAmount?>/-)</option><?php }
			if(array_sum($Tot)==0){?><option value="">--- NA ---</option><?php }
			?>
            </select>
            </td>
        	<td id="tblhedrow">Month</td>
        	<td id="tblhedrow">
            <select name="Month" id="Month" class="form-control">
             <?php
            for($i=1;$i<=12;$i++)
            {
				?><option value="<?=$i?>" <?=$i==$Month? 'selected' : ''?>><?=date('F',strtotime("01-$i-$CurrentSession"));?></option><?php
            }
            ?>
            </select>
            </td>
        	<td id="tblhedrow">Copy :</td>
        	<td id="tblhedrow">
            <select name="prntcopy" id="prntcopy" class="form-control">
            <option value="1">1 Copy</option>
            <option value="2" selected="selected">2 Copy</option>
            </select>
            </td>
        </tr>
        <tr>
        	<td id="tblhedrow" style="width:11.33%;">Pay Date : </td>
            <td id="tblbodynm" style="width:22%;">
            <input type="text" name="PaymentDate" id="PaymentDate" value="<?=date('d-m-Y');?>" class="form-control dt"/>
            </td>
            <td id="tblhedrow" style="width:11.33%;">Pay Mode : </td>
            <td id="tblbodynm" style="width:22%;">
            <select name="PayMode" id="PayMode" class="form-control" onchange="BankDetails(this.value);GetPaymentLedger(this.value)">
            <?php
            $sql=mysqli_query($con,"SELECT PayMode FROM main_paymode_setup WHERE stat=0 GROUP BY PayMode");
			while($R=mysqli_fetch_array($sql))
			{
				$PayModeSerial=$R['PayMode'];
				?><option value="<?=$PayModeSerial?>"><?=get_value('main_paymode','sl',$PayModeSerial,'PayMode','',$con);?></option><?php
			}
			?>
            </select>
            </td>
            <td id="tblhedrow" style="width:11.33%;">Pay To (Dr.) : </td>
            <td id="tblbodynm" style="width:22%;">
            <div id="DebitLedgr">
            <select name="DebitLedger" id="DebitLedger" class="form-control">
            <?php
            $sql=mysqli_query($con,"SELECT LedgerHead FROM main_paymode_setup WHERE stat=0");
			while($R=mysqli_fetch_array($sql))
			{
				$LedgerHead=$R['LedgerHead'];
				?><option value="<?=$LedgerHead?>"><?=get_value('account_ledg','sl',$LedgerHead,'LedgerName','',$con);?></option><?php
			}
			?>
            </select>
            </div>
            </td>
        </tr>
        <tr>
            <td id="tblhedrow" class="bankdtl" style="display:none;">Bank Name : </td>
            <td id="tblbodynm" class="bankdtl" style="display:none;"><input type="text" name="BankName" id="BankName" value="" class="form-control" /></td>
            <td id="tblhedrow" class="bankdtl" style="display:none;">Branch Name : </td>
            <td id="tblbodynm" class="bankdtl" style="display:none;"><input type="text" name="BranchName" id="BranchName" value="" class="form-control" /></td>
            <td id="tblhedrow" class="checkdtl" style="display:none;">Cheque No. : </td>
            <td id="tblbodynm" class="checkdtl" style="display:none;">
            <input type="text" name="ChequeNo" id="ChequeNo" maxlength="6" class="form-control" onKeyPress="return check(event)"/>
            </td>
            <td id="tblhedrow" class="txnndtl" style="display:none;">Transaction No. : </td>
            <td id="tblbodynm" class="txnndtl" style="display:none;"><input type="text" name="TransactionNo" id="TransactionNo" value="" class="form-control" /></td>
    	</tr>
        <tr>
            <td id="tblhedrow" class="checkdtl" style="display:none;">Cheque Date: </td>
            <td id="tblbodynm" class="checkdtl" style="display:none;"><input type="text" name="ChequeDate" id="ChequeDate" value="" class="form-control dt" /></td>
            <td id="tblhedrow" class="txnndtl" style="display:none;">Transaction Date: </td>
            <td id="tblbodynm" class="txnndtl" style="display:none;"><input type="text" name="TransactionDate" id="TransactionDate" value="" class="form-control dt" /></td>
			<td id="tblhedrow">Narration : </td>
            <td id="tblbodynm"><input type="text" name="PaymentDescription" id="PaymentDescription" value="Received" class="form-control" /></td>
			<td id="tblhedrow">Amount : </td>
            <td id="tblbodynm">
            <div class="input-group">
            	<input type="text" name="TransactionAmount" id="TransactionAmount" value="" class="form-control" onclick="this.select()" onKeyPress="return NumberOnly(event)" />
                <span class="input-group-btn">
                <button type="button" name="btn" id="btn" class="btn btn-info" onclick="TempPaymentDetail('<?=$StudentID?>')"><b>Add</b></button>
                </span>
            </div>
            </td>
		</tr>
        <tr>
        	<td colspan="6" style="height:100px;"><div id="TempPaymentDiv"><?php include 'TempPaymentDetailShow.php';?></div></td>
        </tr>
		<tr>
            <td id="tblhed" colspan="6"><input type="submit" name="btn1" id="btn1" value=" PAY " class="btn btn-warning" onclick="feesdtls('<?=$StudentID?>')"></td>
    	</tr>
        </table>
    </td>
    </tr>
	</table>
<?php } else {?><center><b><h2><font color="#FF0000"><b>NO RECORD AVAILABLE</b></font></h2></b></center><?php }?>