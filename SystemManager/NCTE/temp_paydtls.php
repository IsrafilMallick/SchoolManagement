<?php
$requirelevel=0;
include 'ActiveUsers.php';

$sesn=isset($_REQUEST['sesn']) ? $_REQUEST['sesn'] : '';
$mnth=isset($_REQUEST['mnth']) ? $_REQUEST['mnth'] : '';
$sid=isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';
$refno=isset($_REQUEST['refno']) ? $_REQUEST['refno'] : '';
$billno=isset($_REQUEST['billno']) ? $_REQUEST['billno'] : '';
$fldgr=isset($_REQUEST['fldgr']) ? $_REQUEST['fldgr'] : '';
$drldgr=isset($_REQUEST['drldgr']) ? $_REQUEST['drldgr'] : '';
$crldgr=isset($_REQUEST['crldgr']) ? $_REQUEST['crldgr'] : '';
$amnt=isset($_REQUEST['amnt']) ? $_REQUEST['amnt'] : '';
$paytyp=isset($_REQUEST['paytyp']) ? $_REQUEST['paytyp'] : '';
$paymode=isset($_REQUEST['paymode']) ? $_REQUEST['paymode'] : '';
$paydesc=isset($_REQUEST['paydesc']) ? rawurldecode($_REQUEST['paydesc']) : '';
$paydt=isset($_REQUEST['paydt']) ? $_REQUEST['paydt'] : '';
$banknm=isset($_REQUEST['banknm']) ? rawurldecode($_REQUEST['banknm']) : '';
$branchnm=isset($_REQUEST['branchnm']) ? rawurldecode($_REQUEST['branchnm']) : '';
$cheqno=isset($_REQUEST['cheqno']) ? $_REQUEST['cheqno'] : '';
$cheqdt=isset($_REQUEST['cheqdt']) ? $_REQUEST['cheqdt'] : '';
$trnsno=isset($_REQUEST['trnsno']) ? $_REQUEST['trnsno'] : '';
$trnsdt=isset($_REQUEST['trnsdt']) ? $_REQUEST['trnsdt'] : '';

if($paydt==""||$paydt=="0000-00-00"){$paydt="0000-00-00";}else{$paydt=date('Y-m-d',strtotime($paydt));}
if($cheqdt!=""){$cheqdt=date('Y-m-d',strtotime($cheqdt));}
if($trnsdt!=""){$trnsdt=date('Y-m-d',strtotime($trnsdt));}
/* 
$paytyp=$_REQUEST['paytyp'];
$paydt=$_REQUEST['paydt'];
$paymode=$_REQUEST['paymode'];
$drldgr=$_REQUEST['drldgr'];
$crldgr=$_REQUEST['crldgr'];
$banknm=rawurldecode($_REQUEST['banknm']);
$branchnm=rawurldecode($_REQUEST['branchnm']);
$cheqno=$_REQUEST['cheqno'];
$cheqdt=$_REQUEST['cheqdt'];
$trnsno=$_REQUEST['trnsno'];
$trnsdt=$_REQUEST['trnsdt'];
$paydesc=rawurldecode($_REQUEST['paydesc']);
$amnt=$_REQUEST['amnt'];
$refno=$_REQUEST['refno'];
*/
if($paymode==2)
{
	if($cheqno==''||$cheqdt=='')
	{
		$cond='';
	}
	else
	{
		$cond=1;
	}
}
else if($paymode==3)
{
	if($trnsno==''||$trnsdt=='')
	{
		$cond='';
	}
	else
	{
		$cond=1;
	}
}
else
{
	$cond=1;
}

if($paydt==''||$paymode==''||$drldgr==''||$amnt==''||$cond=='')
{
	?><script>
	alert('Please Fill All The Field');
	</script><?php
}
else
{
	$sql=mysqli_query($con,"SELECT * FROM temp_paydtls WHERE sesn='$sesn' AND mnth='$mnth' AND sid='$sid' AND paymode='$paymode' AND drldgr='$drldgr' AND crldgr='$crldgr' AND amnt='$amnt' AND paytyp='$paytyp' AND paydt='$paydt' AND eby='$eby'"); 
	if(mysqli_num_rows($sql)==0)
	{
		if($paytyp=='6'||$paytyp=='7')
		{
			if($paytyp==6){$ledger=$fldgr;}else
			if($paytyp==7){$ledger=$crldgr;}
			$paydesc.=" against <b>".get_value('account_ledg','sl',$ledger,'ledgnm','',$con)."</b> from <b>";
			$paydesc.=ucwords(strtolower(get_value('student_details','sid',$sid,'snm','',$con)))." ($sid)</b>";
		}
		$billno='';
		mysqli_query($con,"INSERT INTO temp_paydtls(sesn, mnth, sid, refno, billno, fldgr, drldgr, crldgr, amnt, paytyp, paymode, paydesc, paydt, banknm, branchnm, cheqno, cheqdt, trnsno, trnsdt, edt, edttm, eby) VALUES('$sesn', '$mnth', '$sid', '$refno', '$billno', '$fldgr', '$drldgr', '$crldgr', '$amnt', '$paytyp', '$paymode', '$paydesc', '$paydt', '$banknm', '$branchnm', '$cheqno', '$cheqdt', '$trnsno', '$trnsdt', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
	}
}
include 'temp_paydtls_show.php';
?>