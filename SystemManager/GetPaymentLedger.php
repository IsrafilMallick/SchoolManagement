<?php
include "connect.php";
$paymode=$_REQUEST['paymode'];
$field=$_REQUEST['field'];
$functiontyp=$_REQUEST['functiontyp'];
$functions=array('','onchange="show()"','onchange="get_ledger(this.value)"','onchange="get_ledger(this.value);show()"');
$FieldArray=array('','drldgr','crldgr');
$Fieldnm=$FieldArray[$field];
?>
<select name="<?=$Fieldnm?>" id="<?=$Fieldnm?>" class="form-control" <?=$functions[$functiontyp];?>>
<option value="">-- Select --</option>
<?php
$sql=mysqli_query($con,"SELECT * FROM main_paymode_setup WHERE paymode='$paymode' AND stat=0 ORDER BY ledgrsl");
while($R=mysqli_fetch_array($sql))
{
	$ledgrsl=$R['ledgrsl'];
	$psl=$R['psl'];
	$primary=get_value('account_primary','sl',$psl,'pnm','',$con);
	$ledgnm=get_value('account_ledg','sl',$ledgrsl,'ledgnm','',$con)
	?><option value="<?=$ledgrsl?>"><?=$ledgnm.'['.$primary.']';?> (<?=get_drcr_rs($ledgrsl,$edt,0,$con)?>/-)</option><?php
}
?>
</select>
<script>
$('#'+'<?=$Fieldnm?>').chosen({no_results_text: "Oops, nothing found!",});
</script>