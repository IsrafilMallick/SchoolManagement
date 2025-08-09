<?php
include 'connect.php';
$BankName=rawurldecode($_REQUEST['BankName']);
$sql=mysqli_query($con,"SELECT BranchName FROM main_bankdata WHERE BankName='$BankName'") or die(mysql_error($con));
?>
<input type="text" name="BranchName" id="BranchName" value="" list="branchlist" class="form-control" autofocus="autofocus" onClick="this.select();" onChange="GetBankdetails('<?=$BankName?>',this.value,'')">
<datalist id="branchlist">
<?php
while($R=mysqli_fetch_array($sql))
{
	$BranchName=NameCase($R['BranchName']);
	?><option value="<?=$BranchName;?>"></option><?php
}
?>
</datalist>
