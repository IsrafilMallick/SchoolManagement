<?php
$requirelevel=0;
include 'ActiveUsers.php';

$GroupSerial=$_REQUEST['GroupSerial'];
$FunctionType=$_REQUEST['FunctionType'];
$Functions=array('','onchange="show()"');
?>
<select id="LedgerHead" name="LedgerHead" class="form-control" <?=$Functions[$FunctionType];?>>
<option value="">--- All ---</option>
<?php
$sql=mysqli_query($con,"SELECT * FROM account_ledg WHERE stat=0 AND GroupSerial='$GroupSerial' ORDER BY LedgerName");
while($R=mysqli_fetch_array($sql))
{
	$LedgerHead=$R['sl'];
	$LedgerName=$R['LedgerName'];
	?><option value="<?=$LedgerHead;?>"><?=$LedgerName?> (<?=GetDebitCreditRupees($LedgerHead,$edt,0,$con)?>/-)</option><?php
}
?>
</select>
<script>
$('#LedgerHead').chosen({no_results_text: "Oops, nothing found!",});
</script>