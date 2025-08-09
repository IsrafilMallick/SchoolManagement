<?php
$reqlevel=3;
include 'connect.php';
$pin=$_REQUEST['pin'];
$podiv=$_REQUEST['podiv'];
$ponm=$_REQUEST['ponm'];
$psdiv=$_REQUEST['psdiv'];
$distdiv=$_REQUEST['distdiv'];
$statediv=$_REQUEST['statediv'];
$sql=mysqli_query($con,"SELECT PostOffice FROM main_pincodedetails WHERE PinCode='$pin'") or die(mysqli_error());
?>
<input type="text" id="<?=$ponm?>" name="<?=$ponm?>" list="polist<?=$pin?>" class="form-control Capitalize" onclick="this.select();" onchange="GetDistrictDetails('<?=$pin?>',this.value,'<?=$psdiv?>','<?=$distdiv?>','<?=$statediv?>')" autofocus="autofocus" required >
<datalist id="polist<?=$pin?>">
<?php
while($R=mysqli_fetch_array($sql))
{
	$PostOffice=NameCase($R['PostOffice']);
	?><option value="<?=$PostOffice;?>"></option><?php
}
?>
</datalist>