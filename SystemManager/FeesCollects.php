<?php
$requirelevel=0;
include 'ActiveUsers.php';
$sid=isset($_POST['sid']) ? $_POST['sid'] : '';
$prntcopy=isset($_POST['prntcopy']) ? $_POST['prntcopy'] : '';

$sql=mysqli_query($con,"SELECT * FROM student_details WHERE sid='$sid'") or die(mysqli_error());// AND fees_stat=0 AND stat=1
while($R=mysqli_fetch_array($sql))
{
	$sesn=$R['sesn'];
	$snm=$R['snm'];
	$gmob=$R['gmob'];
	//$ctyp=$R['ctyp'];
	$course=$R['course'];
	$sem=$R['sem'];
}

$vid=0;
$abbrev='FC'.$sesn.substr($sesn+1,2,4);
$sql=mysqli_query($con,"SELECT billno FROM main_drcr WHERE billno LIKE '$abbrev%' GROUP BY billno ORDER BY sl DESC LIMIT 0,1");
while($R=mysqli_fetch_array($sql))
{
	$Billno=$R['billno'];
	$vid=number_format(substr($Billno,9,4));
}

$count5=1;
while($count5>0)
{
	$vid+=1;
	$billno=$abbrev.str_pad($vid, 4, '0', STR_PAD_LEFT);
	$query6=mysqli_query($con,"SELECT sl FROM main_drcr WHERE billno='$billno' GROUP BY billno");
	$count5=mysqli_num_rows($query6);
}

$sql=mysqli_query($con,"INSERT INTO main_drcr(sesn, mnth, sid, cid, refno, vno, billno, paydt, paymode, paydesc, paytyp, fldgr, drldgr, crldgr, amnt, ctyp, course, sem, banknm, branchnm, cheqno, cheqdt, trnsno, trnsdt, edt, edttm, eby) SELECT sesn, mnth, sid, '', refno, '', '$billno', paydt, paymode, paydesc, paytyp, fldgr, drldgr, crldgr, amnt, '', '$course', '$sem', banknm, branchnm, cheqno, cheqdt, trnsno, trnsdt, edt, edttm, eby FROM temp_paydtls WHERE sid='$sid' AND eby='$eby' ORDER BY sl") or die(mysqli_error($con));
mysqli_query($con,"DELETE FROM temp_paydtls WHERE sid='$sid' AND eby='$eby' ORDER BY sl") or die(mysqli_error($con));
?><script>
alert('Payment Completed Successfully. . . ! ! !');
document.location='bill_rprints.php?sid=<?=$sid?>&billno=<?=$billno?>&prntcopy=<?=$prntcopy?>';
</script><?php
