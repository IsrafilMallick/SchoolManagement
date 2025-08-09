<?php 
$requirelevel=-1;
include 'ActiveUsers.php';
$tblnm='main_drcr';

$sl=$_POST['sl']; if($sl!=''){$sl1="AND sl!='$sl'";}else{$sl1="";}
$paydt=$_POST['paydt'];	if($paydt==""||$paydt=="0000-00-00"){$paydt="";}else{$paydt=date('Y-m-d', strtotime($paydt));}
$ledgr=$_POST['ledgr'];
$amnt=$_POST['amnt'];
$paydesc=$_POST['paydesc'];
$paytyp=10; //Opening

$sql=mysqli_query($con,"SELECT * FROM account_ledg WHERE sl>0 AND sl='$ledgr'");
while($list=mysqli_fetch_array($sql))
{
	$psl=$list['psl'];
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

if($paydt==""||$ledgr==""||$amnt==""||$paydesc=="")
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
{
	$chk=mysqli_query($con,"SELECT * FROM $tblnm WHERE paytyp='$paytyp' AND drldgr='$drldgr' AND crldgr='$crldgr' AND paydt='$paydt' $sl1") or die(mysqli_error());
	if(mysqli_num_rows($chk)==0)
	{
		if($sl=="")
		{
			$abbrev='O'.$sesn;
			$increment=0;
			$sql=mysqli_query($con,"SELECT vno FROM $tblnm WHERE sesn='$sesn' AND vno LIKE '$abbrev%' ORDER BY sl DESC LIMIT 0,1");
			while($R=mysqli_fetch_array($sql))
			{
				$Vno=$R['vno'];
				$increment=substr($Vno,5,5);
			}
			
			$count=1;
			while($count>0)
			{
				$increment+=1;
				$vno=$abbrev.str_pad($increment, 5, '0', STR_PAD_LEFT);
				$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE sesn='$sesn' AND vno='$vno'");
				$count=mysqli_num_rows($sql);
			}

			mysqli_query($con,"INSERT INTO $tblnm(sesn, vno, paydt, paydesc, paytyp, drldgr, crldgr, amnt, eby, edt, edttm) VALUES('$sesn', '$vno', '$paydt', '$paydesc', '$paytyp', '$drldgr', '$crldgr', '$amnt', '$eby', '$edt', '$edttm')")or die(mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='opening_balence.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error());
			while($R=mysqli_fetch_array($sql))
			{
				$sesn1=$R['sesn'];
				$paydt1=$R['paydt'];
				$paydesc1=$R['paydesc'];
				$drldgr1=$R['drldgr'];
				$crldgr1=$R['crldgr'];
				$amnt1=$R['amnt'];
			}

			$tblsl=$sl;
			$ufnm='sl';
			if($sesn1!=$sesn)
			{
				$fldnm='sesn';
				$old_val=$sesn1;
				$new_val=$sesn;
				edit_log_ntry($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($paydt!=$paydt1)
			{
				$fldnm='paydt';
				$old_val=$paydt1;
				$new_val=$paydt;
				edit_log_ntry($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}

			if($paydesc1!=$paydesc)
			{
				$fldnm='paydesc';
				$old_val=$paydesc1;
				$new_val=$paydesc;
				edit_log_ntry($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($drldgr1!=$drldgr)
			{
				$fldnm='drldgr';
				$old_val=$drldgr1;
				$new_val=$drldgr;
				edit_log_ntry($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($crldgr1!=$crldgr)
			{
				$fldnm='crldgr';
				$old_val=$crldgr1;
				$new_val=$crldgr;
				edit_log_ntry($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
				
			if($amnt1!=$amnt)
			{
				$fldnm='amnt';
				$old_val=$amnt1;
				$new_val=$amnt;
				edit_log_ntry($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			$updt=mysqli_query($con,"UPDATE $tblnm SET sesn='$sesn', paydt='$paydt', paydesc='$paydesc', drldgr='$drldgr', crldgr='$crldgr', amnt='$amnt', uby='$eby', udt='$edt', udttm='$edttm' WHERE sl='$sl'")or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='opening_balence.php';";
		}
	}
	else
	{
		$msg="Sorry. . . Duplicate Entry. . . ! ! !";
		$returnpage="window.history.go(-1);";
	}
}
?>
<script>
alert('<?=$msg?>');
<?=$returnpage?>
</script>