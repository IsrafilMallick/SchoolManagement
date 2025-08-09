<?php
$requirelevel=0;
include 'ActiveUsers.php';

$StudentID=isset($_REQUEST['StudentID']) ? $_REQUEST['StudentID'] : '';
$sql=mysqli_query($con,"SELECT * FROM main_student_data WHERE StudentID='$StudentID' AND stat=2") or die (mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
	$StudentName=$R['StudentName'];
	$FatherName=$R['FatherName'];
	
	$CurrentClass=$R['CurrentClass'];
	$CurrentSection=$R['CurrentSection'];
	$CurrentRollNo=$R['CurrentRollNo'];
}
?>
<form name="form1" id="form1" method="post" action="DiscountRequests.php">
    <table border="1" align="center" style="border:3px solid #000000;" width="50%">
    <tr>
        <td id="tblhedrow">Student ID :</td>
        <td id="tblbodynm"><?=$StudentID?></td>
        <td id="tblhedrow">Student Name :</td>
        <td id="tblbodynm"><?=$StudentName?></td>
    </tr>
    <tr>    
        <td id="tblhedrow">Clas :</td>
        <td id="tblbodynm"><?=get_value('main_class','sl',$CurrentClass,'ClassName','',$con)?></td>
        <td id="tblhedrow">Section :</td>
        <td id="tblbodynm"><?=$CurrentSection?></td>
    </tr>
    <tr style="background-color:#FC6">
         <td id="tblhed">Sl No.</td>
         <td id="tblhed" colspan="2">Descriptipn</td>
         <td id="tblhed">Bill Amount</td>
    </tr>
    <?php
    $cnt=0;
    $Amnt=0;
    $sql=mysqli_query($con,"SELECT * FROM main_drcr WHERE StudentID='$StudentID' AND FeesType='1' AND stat='1'") or die(mysqli_error($con));
    $TotalFeesHead=mysqli_num_rows($sql);
    while($R=mysqli_fetch_array($sql))
    {
        $cnt++;
        $VoucherNo=$R['VoucherNo'];
        $FeesLedger=$R['FeesLedger'];
        $TransactionAmount=$R['TransactionAmount'];
        $Amnt+=$TransactionAmount;
        ?>
        <input type="hidden" name="StudentID" id="StudentID" value="<?=$StudentID?>" />
        <input type="hidden" name="LedgerHead[]" id="LedgerHead[]" value="<?=$FeesLedger?>" />
        <tr>
             <td id="tblbody"><?=$cnt;?></td>
             <td id="tblbody" colspan="2"><?=get_value('account_ledg','sl',$FeesLedger,'LedgerName','',$con)?></td>
             <td id="tblbody"><?=$TransactionAmount?></td>
        </tr>
        <?php
    }
    ?>
    <tr style="background-color:#FFFFA2">
         <td id="tblbody"><?=$cnt+1;?></td>
         <td id="tblbody" colspan="2"><?=get_value('account_ledg','sl',17,'LedgerName','',$con)?></td>
         <td id="tblbody" style="margin:0;"><input type="text" name="DiscountAmount" id="DiscountAmount" value="" class="form-control" onclick="this.select();" onKeyPress="return NumberOnly(event);" onkeyup="GetAmount('<?=$Amnt?>',this.value)" style="width:100px; margin:0;"/></td>
    </tr>
    <tr>
        <td id="tblhed" colspan="3">Total : </td>
        <td id="tblhed"><span id="AMNT"><?=$Amnt?></span></td>
    </tr>
    <tr>
    	<td id="tblhed" colspan="4"><input type="submit" name="SubmitButton" id="SubmitButton" value="Submit" class="btn btn-success" /></td>
    </tr>
    </table>
</form>
<script>
function GetAmount(TotalAmount,DiscountAmount)
{
	var Amnt=TotalAmount-DiscountAmount;
	document.getElementById('AMNT').innerHTML=Amnt;
}
</script>