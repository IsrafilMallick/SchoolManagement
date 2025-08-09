<?php
$requirelevel=0;
$stat=isset($_REQUEST['stat']) ? $_REQUEST['stat'] : '';
$sid=isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';
$paytype=isset($_REQUEST['paytype']) ? $_REQUEST['paytype'] : '';
$paytyp=isset($_REQUEST['paytyp']) ? $_REQUEST['paytyp'] : '';

if($stat=='1'){include("ActiveUsers.php");}
if($sid==""){$sid1="";}else{$sid1="AND sid='$sid'";}
if($paytype==""){$paytyp1="";}else{$paytyp1="AND paytyp='$paytype'";}
if($paytyp==""){$paytyp2="";}else{$paytyp2="AND paytyp='$paytyp'";}

$cnt=0;
$sql=mysqli_query($con,"SELECT * FROM temp_paydtls WHERE sl>0 $sid1 $paytyp1 $paytyp2 AND eby='$eby' ORDER BY sl") or die(mysqli_error($con));
if(mysqli_num_rows($sql)>0){
?>
<table border="1" style="width:100%;">
<tr style="background-color:#FFCC99;">
<td id="tblhed">Sl</td>
<td id="tblhed">Pay Date</td>
<td id="tblhed">Pay Mode</td>
<td id="tblhed">Pay To (Dr.)</td>
<td id="tblhed">Bank Name</td>
<td id="tblhed">Branch Name</td>
<td id="tblhed">Cheque No.</td>
<td id="tblhed">Cheque Dated</td>
<td id="tblhed" style="width:300px;">Description</td>
<td id="tblhed">Amount</td>
<td id="tblhed">Action</td>
</tr>
<?php
$Amnt=0;
while($R=mysqli_fetch_array($sql))
{
	$cnt++;
	$paymodesl=$R['sl'];
	$paydt=$R['paydt'];	if($paydt=='0000-00-00'){$paydt="";}else{$paydt=date('d-m-Y',strtotime($paydt));}
	$paymode=$R['paymode'];
	$drldgr=$R['drldgr'];
	$banknm=$R['banknm'];
	$branchnm=$R['branchnm'];
	$cheqno=$R['cheqno'];
	$cheqdt=$R['cheqdt'];	if($cheqdt=='0000-00-00'){$cheqdt="";}else{$cheqdt=date('d-m-Y',strtotime($cheqdt));}
	$paydesc=$R['paydesc'];
	$amnt=$R['amnt'];
	$stat=$R['stat'];
	
	$Amnt+=$amnt;
	
	if($paydt==""){$paydt='NA';}
	if($paymode==""){$paymode='NA';}
	if($drldgr==""){$drldgr='NA';}
	if($banknm==""){$banknm='NA';}
	if($branchnm==""){$branchnm='NA';}
	if($cheqno==""){$cheqno='NA';}
	if($cheqdt==""){$cheqdt='NA';}
	if($paydesc==""){$paydesc='NA';}
	if($amnt==""){$amnt='NA';}
	
	?>
	<tr>
	<td id="tblbody"><?php echo $cnt;?></td>
	<td id="tblbody"><?php echo $paydt;?></td>
	<td id="tblbody"><?php echo get_value('main_paymode','sl',$paymode,'paymode','',$con);?></td>
	<td id="tblbody"><?php echo get_value('account_ledg','sl',$drldgr,'ledgnm','',$con);?></td>
	<td id="tblbody"><?php echo $banknm;?></td>
	<td id="tblbody"><?php echo $branchnm;?></td>
	<td id="tblbody"><?php echo $cheqno;?></td>
	<td id="tblbody"><?php echo $cheqdt;?></td>
	<td id="tblbody"><?php echo $paydesc;?></td>
	<td id="tblhedrow"><?php echo number_format($amnt,2);?></td>
	<td id="tblbody">
	<i class="fa fa-trash-o fa-lg" style="color:#F00; cursor:pointer;" onclick="del('temp_paydtls','sl','<?=$paymodesl;?>','<?=$sid;?>')" title="Click to Delete"></i>
	</td>
	</tr>
	<?php
}
?>
<tr>
	<td colspan="9" id="tblhedrow">Total : </td>
	<td id="tblhedrow"><?php echo number_format($Amnt,2);?></td>
	<td id="tblhedrow">&nbsp;</td>
</tr>
</table>
<?php }?>