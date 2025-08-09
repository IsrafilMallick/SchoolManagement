<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$tblnm="main_school";

$sl=$_POST['sl'];	if($sl==""){$sl1="";}else{$sl1="AND sl!='$sl'";}
$scoolnm=NameCase($_POST['scoolnm']);
$disecode=$_POST['disecode'];
$mpcode=$_POST['mpcode'];
$hscode=$_POST['hscode'];
$addr=NameCase($_POST['addr']);
$mob=$_POST['mob'];
$email=$_POST['email'];
$url=$_POST['url'];	if($url==""){$url='NA';}

if($scoolnm==""||$addr==""||$mob=="")
{
	$msg='Please Fill all fields Correctly. . . .! ! !';
	$returnpage="window.history.go(-1);";
}
else
{
	$check=mysqli_query($con,"SELECT * FROM main_school WHERE scoolnm='$scoolnm' AND addr='$addr' AND mob='$mob' AND url='$url' $sl1") or die(mysqli_error($con));
	if(mysqli_num_rows($check)==0)
	{
		if($sl=="")
		{
			mysqli_query($con,"INSERT INTO main_school (scoolnm, disecode, mpcode, hscode, addr, mob, email, url, edt, edttm, eby) VALUES('$scoolnm', '$disecode', '$mpcode', '$hscode', '$addr', '$mob', '$email', '$url', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
			$msg='Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='school_ntry.php';";
		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$scoolnm1=$R['scoolnm'];
				$disecode1=$R['disecode'];
				$mpcode1=$R['mpcode'];
				$hscode1=$R['hscode'];
				$addr1=$R['addr'];
				$mob1=$R['mob'];
				$email1=$R['email'];
				$url1=$R['url'];
			}
			
			$tblsl=$sl;
			$ufnm='sl';
			if($scoolnm!=$scoolnm1)
			{
				$fldnm='scoolnm';
				$old_val=$scoolnm1;
				$new_val=$scoolnm;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($disecode!=$disecode1)
			{
				$fldnm='disecode';
				$old_val=$disecode1;
				$new_val=$disecode;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($mpcode!=$mpcode1)
			{
				$fldnm='mpcode';
				$old_val=$mpcode1;
				$new_val=$mpcode;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($hscode!=$hscode1)
			{
				$fldnm='hscode';
				$old_val=$hscode1;
				$new_val=$hscode;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($addr!=$addr1)
			{
				$fldnm='addr';
				$old_val=$addr1;
				$new_val=$addr;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($mob!=$mob1)
			{
				$fldnm='mob';
				$old_val=$mob1;
				$new_val=$mob;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($email!=$email1)
			{
				$fldnm='email';
				$old_val=$email1;
				$new_val=$email;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($url!=$url1)
			{
				$fldnm='url';
				$old_val=$url1;
				$new_val=$url;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			mysqli_query($con,"UPDATE main_school SET scoolnm='$scoolnm', disecode='$disecode', mpcode='$mpcode', hscode='$hscode', addr='$addr', mob='$mob', email='$email', url='$url', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Than you. . . ! ! !';
			$returnpage="document.location='school_ntry.php';";
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