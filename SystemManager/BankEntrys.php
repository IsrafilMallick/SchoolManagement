<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$tblnm="main_bankdata";
$sl=isset($_POST['sl']) ? $_POST['sl'] : '';    //if($sl==''){$sl1="";}else{$sl1="AND sl!='$sl'";}
$BankName=isset($_POST['BankName']) ? $_POST['BankName'] : '';
$BranchName=isset($_POST['BranchName']) ? $_POST['BranchName'] : '';
$BranchAddress=isset($_POST['BranchAddress']) ? $_POST['BranchAddress'] : '';
$IfsCode=isset($_POST['IfsCode']) ? $_POST['IfsCode'] : '';
$MICRCode=isset($_POST['MICRCode']) ? $_POST['MICRCode'] : '';
$mob=isset($_POST['mob']) ? $_POST['mob'] : '';
$city=isset($_POST['city']) ? $_POST['city'] : '';
$dist=isset($_POST['dist']) ? $_POST['dist'] : '';
$state=isset($_POST['state']) ? $_POST['state'] : '';

if($BankName==''||$BranchName==''||$IfsCode=='')
{
    $msg='Please Fill all fields Correctly. . . .! ! !';
    $returnpage='window.history.go(-1)';
}
else
{
	$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE IfsCode='$IfsCode'");
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			mysqli_query($con,"INSERT INTO $tblnm(BankName, BranchName, BranchAddress, IfsCode, MICRCode, mob, city, dist, state, edt, edttm, eby) VALUES('$BankName', '$BranchName', '$BranchAddress', '$IfsCode', '$MICRCode', '$mob', '$city', '$dist', '$state', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='BankEntry.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM main_bankdata WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$BankName1=$R['BankName'];
				$BranchName1=$R['BranchName'];
				$BranchAddress1=$R['BranchAddress'];
				$IfsCode1=$R['IfsCode'];
				$MICRCode1=$R['MICRCode'];
				$mob1=$R['mob'];
				$city1=$R['city'];
				$dist1=$R['dist'];
				$state1=$R['state'];
			}
			
			$tblnm='main_bankdata';
			$tblsl=$sl;
			$ufnm='sl';
			if($BankName!=$BankName1)
			{
				$fldnm='BankName';
				$old_val=$BankName1;
				$new_val=$BankName;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($BranchName!=$BranchName1)
			{
				$fldnm='BranchName';
				$old_val=$BranchName1;
				$new_val=$BranchName;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($BranchAddress!=$BranchAddress1)
			{
				$fldnm='BranchAddress';
				$old_val=$BranchAddress1;
				$new_val=$BranchAddress;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($IfsCode!=$IfsCode1)
			{
				$fldnm='IfsCode';
				$old_val=$IfsCode1;
				$new_val=$IfsCode;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($MICRCode!=$MICRCode1)
			{
				$fldnm='MICRCode';
				$old_val=$MICRCode1;
				$new_val=$MICRCode;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($mob!=$mob1)
			{
				$fldnm='mob';
				$old_val=$mob1;
				$new_val=$mob;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($city!=$city1)
			{
				$fldnm='city';
				$old_val=$city1;
				$new_val=$city;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($dist!=$dist1)
			{
				$fldnm='dist';
				$old_val=$dist1;
				$new_val=$dist;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($state!=$state1)
			{
				$fldnm='state';
				$old_val=$state1;
				$new_val=$state;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			mysqli_query($con,"UPDATE main_bankdata SET BankName='$BankName', BranchName='$BranchName', BranchAddress='$BranchAddress', IfsCode='$IfsCode', MICRCode='$MICRCode', mob='$mob', city='$city', dist='$dist', state='$state', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='BankEntry.php';";
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