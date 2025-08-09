<?php
$requirelevel=0;
include 'ActiveUsers.php';
$refnm=rawurldecode($_REQUEST['refnm']);
$refmob=rawurldecode($_REQUEST['refmob']);
$refpan=rawurldecode($_REQUEST['refpan']);
$payamnt=rawurldecode($_REQUEST['payamnt']);

if($refnm==""){$refnm1="";}else{$refnm1="AND refnm LIKE '%$refnm%'";}
if($refmob==""){$refmob1="";}else{$refmob1="AND refmob LIKE '%$refmob%'";}
if($refpan==""){$refpan1="";}else{$refpan1="AND refpan LIKE '%$refpan%'";}
if($payamnt==""){$payamnt1="";}else{$payamnt1="AND payamnt LIKE '%$payamnt%'";}

$sql=mysqli_query($con,"SELECT * FROM main_reference WHERE sl>0 $refnm1 $refmob1 $refpan1 $payamnt1") or die(mysqli_error());
$count=mysqli_num_rows($sql);
if($count>0)
{
?>
<table class="table table-hover table-striped table-bordered">
<tr><td colspan="6" id="tblhedrecord">Total Record : <?=$count;?></td></tr>
<tr>
    <th id="tblbody" style="width:5%;">Sl.</th>
    <th id="tblbody">Referrer</th>
    <th id="tblbody">Mobile</th>
    <th id="tblbody">PAN No.</th>
    <th id="tblbody">Payout</th>
    <th id="tblbody" style="width:15%;">Action</th>
</tr>
<?php
$cnt=0;	  
while($R=mysqli_fetch_array($sql))
{
	$cnt++;
	$sl=$R['sl'];
	$refnm=$R['refnm'];
	$refmob=$R['refmob'];
    $refpan=$R['refpan'];
    $payamnt=$R['payamnt'];
	$stat=$R['stat'];
    $table="main_reference";
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
	?>
	<tr>
		<td id="tblbody"><?=$cnt;?></td>
		<td id="tblbody"><?=$refnm;?></td>
		<td id="tblbody"><?=$refmob;?></td>
		<td id="tblbody"><?=$refpan;?></td>
		<td id="tblbody"><i class="fa fa-inr"></i> <?=$payamnt;?>/-</td>
		<td id="tblbody">
		<a href="reference.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
		<span id="show<?=$sl;?>">
		<a onclick="activation('<?=$sl;?>','show<?=$sl;?>','<?=$table?>','stat','<?=$class?>','<?=$btnnm?>','<?=$stat;?>','<?=$acttl;?>')" title="<?=$acttl;?>"><?=$actbtn;?></a>
		</span>
		</td>
	
	</tr>
	<?php
}
?>
</table>
<?php
} else {?><center><b><h2><font color="#FF0000"><b>NO RECORD AVAILABLE</b></font></h2></b></center><?php }
?>