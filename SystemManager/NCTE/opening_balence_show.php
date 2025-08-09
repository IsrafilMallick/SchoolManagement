<?php 
$requirelevel=-1;
include 'ActiveUsers.php';

$paydt=$_REQUEST['paydt'];
$ledgr=$_REQUEST['ledgr'];
$amnt=$_REQUEST['amnt'];
$paydesc=rawurldecode($_REQUEST['paydesc']);
$paytyp=10;

$psl='';
$drldgr='';
$crldgr='';
$sql=mysqli_query($con,"SELECT * FROM account_ledg WHERE sl>0 AND sl='$ledgr'");
while($R=mysqli_fetch_array($sql))
{
	$psl=$R['psl'];
}
if($psl==1)
{
	$drldgr=$ledgr;
	$crldgr=-1;
}
else if($psl==2)
{
	$drldgr=-1;
	$crldgr=$ledgr;
}
else if($psl==3)
{
	$drldgr=-1;
	$crldgr=$ledgr;
}
else if($psl==4)
{
	$drldgr=$ledgr;
	$crldgr=-1;
}

$paydt=date('Y-m-d', strtotime($paydt));
if($paydt==""){$paydt1="";}else{$paydt1="AND paydt='$paydt'";}
if($drldgr==""){$drldgr1="";}else{$drldgr1="AND drldgr='$drldgr'";}
if($crldgr==""){$crldgr1="";}else{$crldgr1="AND crldgr='$crldgr'";}
if($amnt==""){$amnt1="";}else{$amnt1="AND amnt='$amnt'";}
if($paydesc==""){$paydesc1="";}else{$paydesc1="AND paydesc LIKE '%$paydesc%'";}

$sql=mysqli_query($con,"SELECT * FROM main_drcr WHERE paytyp='$paytyp' $paydt1 $drldgr1 $crldgr1 $amnt1 $paydesc1 ORDER BY sl DESC") or die(mysqli_error());
if(mysqli_num_rows($sql)>0)
{
?>
<table class="table table-hover table-striped table-bordered">
<tr>
    <td colspan="8" id="tblhedrecord">Total Amount (<i class="fa fa-rupee"></i>) : <span id="amnt1"><?=$AMNT?></span></td>
</tr>
<tr>	
	<td id="tblhed">Sl.</td>
    <td id="tblhed" style="width:13%;">Transaction Date</td>
	<td id="tblhed" style="width:25%;">Description</td>
	<td id="tblhed" style="width:15%;">Voucher / Bill No.</td>
	<td id="tblhed">Debit</td>
	<td id="tblhed">Credit</td>
	<td id="tblhed">Amount ( <i class="fa fa-inr"></i> )</td>
    <td id="tblhed">Actions</td>
</tr>
<?php
$cnt=0;
$AMNT=0;
while($R=mysqli_fetch_array ($sql))
{
	$cnt++;
	$sl=$R['sl'];
	$dt=date('d-m-Y', strtotime($R['paydt']));
	$paydesc=rawurldecode($R['paydesc']);
	$vno=$R['vno'];
	$billno=$R['billno']; if($vno==""){$vno=$billno;}
	$drldgr=$R['drldgr'];
	$crldgr=$R['crldgr'];
	$amnt=$R['amnt'];
	$stat=$R['stat'];
	if($stat==1)
	{
		$btnnm="Active";
		$class="fa fa-eye-slash fa-lg";
		$acttl="Click to $btnnm";
		$actbtn="<i class='$class'></i>";
	}
	else
	{
		$btnnm="Deactive";
		$class="fa fa-eye fa-lg";
		$acttl="Click to $btnnm";
		$actbtn="<i class='$class'></i>";
	}
	$table="main_drcr";
	
	$AMNT=$AMNT+$amnt;
	if($drldgr>0){$ldgr=$drldgr;}else{$ldgr=$crldgr;}
	?>
	<tr>
	<td id="tblbody"><?=$cnt;?></td>
	<td id="tblbody"><?=$dt;?></td>
	<td id="tblbody"><?=$paydesc;?></td>
	<td id="tblbody"><?=$vno;?></td>
	<td id="tblbody"><?=get_value('account_ledg','sl',$drldgr,'ledgnm','',$con)?></td>
	<td id="tblbody"><?=get_value('account_ledg','sl',$crldgr,'ledgnm','',$con);?></td>
	<td id="tblbody"><?=$amnt;?>/-</td>
    <td id="tblbody"><a href="opening_balence.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a></td>
	</tr>
	<?php
}
?>
</table>
<?php }else{?><center><b><h2><font color="#FF0000"><b>NO RECORD AVAILABLE</b></font></h2></b></center><?php }?>
<script>
$('#amnt1').html('<?=$AMNT?>/-');
</script>