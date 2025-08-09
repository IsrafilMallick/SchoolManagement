<?php
$requirelevel=0;
include 'ActiveUsers.php';
$qtyp=$_POST['qtyp'];
$method=$_POST['method'];
$tblnm=$_POST['tblnm'];
$fields=$_POST['fields'];
$Fields=explode("`, `",$fields);
$Methods=array('','$_POST[','$_REQUEST[','$_GET[');
//$Methods=array('','=$_POST[','=$_REQUEST[','=$_GET[');

$tab="&nbsp;&nbsp;&nbsp;&nbsp;";
$Query='$sql=mysqli_query($con,"';
$Fetch='mysqli_fetch_array($sql)';
$R='$R[';

$query='';
if($qtyp==1)
{
	//Receive Data from User
	for($i=0;$i<count($Fields)-7;$i++)
	{
		$cond="";
		$field=$Fields[$i];
		if($i==0)
		{
			$field=ltrim($field,'`');
			$cond=$tab.'if($sl==\'\'){$sl1="";}else{$sl1="AND sl!=\'$sl\'";}';
		}
		$query.="$$field=isset($Methods[$method]'$field']) ? $Methods[$method]'$field'] : '';$cond<br>";
		//$query.="$$field$Methods[$method]'$field'];$cond<br>";
	}
}
else
if($qtyp==2)
{
	//Fetch Data from Database
	$BlankField='';
	$tab="&nbsp;&nbsp;&nbsp;&nbsp;";
	$query=$Query."SELECT * FROM $tblnm WHERE sl=".'\'$sl\'") or die(mysqli_error($con));<br>';
	$query.='while($R=mysqli_fetch_array($sql))<br>{<br>';
	for($i=0;$i<count($Fields)-7;$i++)
	{
		$field=$Fields[$i];
		if($i==0)
		{
			$field=ltrim($field,'`');
		}
		$query.="$tab$$field=$R'$field'];<br>";
		$BlankField.='<br>if(empty($'.$field.')){$'.$field.'=\'\';}';
	}
	$query.='}'.$BlankField;
}
else
if($qtyp==3)
{
	//Insert Data into Database
	$Value='';
	$query=$Query."INSERT INTO $tblnm(";
	for($i=1;$i<count($Fields)-4;$i++)
	{
		$field=$Fields[$i];
		if($i==1)
		{
			$Attrbiute="$field";
			$Value.=") VALUES('$$field'";
		}
		else
		{
			$Attrbiute.=", $field";
			$Value.=", '$$field'";
		}
	}
	$query.=$Attrbiute.$Value.')") or die(mysqli_error($con));';
	$query.='<br>$msg=\'Submitted Successfully. . . ! ! ! \n Than you. . . ! ! !\';';
	$query.='<br>$returnpage="document.location=\'fees_generate.php?sid=$sid\';";';
}
else
if($qtyp==4)
{
	//Update Data at Database
	$update='';
	$query=$Query."SELECT * FROM $tblnm WHERE sl=".'\'$sl\'") or die(mysqli_error($con));<br>';
	$query.='while($R=mysqli_fetch_array($sql))<br>{<br>';
	$EditLog='$tblnm=\''.$tblnm.'\';<br>$tblsl=$sl;<br>$ufnm=\'sl\';<br>';
	$update.=$Query."UPDATE $tblnm SET ";
	for($i=1;$i<count($Fields)-7;$i++)
	{
		$field=$Fields[$i];
		$field1=$field.'1';
		
		$query.="$tab$$field1=$R'$field'];<br>";
		$EditLog.="if($$field!=$$field1)<br>{<br>";
		$EditLog.=$tab.'$fldnm=\''.$field.'\';<br>';
		$EditLog.=$tab.'$old_val='."$$field1;<br>";
		$EditLog.=$tab.'$new_val='."$$field;<br>";
		$EditLog.=$tab.'EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);<br>';
		$EditLog.='}<br><br>';
		if($i==1)
		{
			$update.="$field='$$field'";
		}
		else
		{
			$update.=", $field='$$field'";
		}
	}
	$query.='}<br><br>';
	$update.=', udt=\'$edt\', udttm=\'$edttm\', uby=\'$eby\' WHERE sl=\'$sl\'") or die(mysqli_error($con));';
	$query.=$EditLog.$update;
	$query.='<br>$msg=\'Updated Successfully. . . ! ! ! \n Than you. . . ! ! !\';';
	$query.='<br>$returnpage="document.location=\'fees_generate.php?sid=$sid\';";';
}
else
if($qtyp==5)
{
	//Delete Data from Database Table
	$query=$Query."DELETE FROM $tblnm WHERE sl=".'\'$sl\'") or die(mysqli_error($con));<br>';
}
else
if($qtyp==6)
{
	//Search
	$cond1='';
	$sql='<br><br>'.$Query."SELECT * FROM $tblnm WHERE sl>0";
	for($i=0;$i<count($Fields)-7;$i++)
	{
		$cond="";
		$tab="";
		$field=$Fields[$i];
		$field1=$field.'1';
		if($i==0)
		{
			$field=ltrim($field,'`');
			$cond='if($sl==""){$sl1="";}else{$sl1="AND sl!=\'$sl\'";}';
			$tab="&nbsp;&nbsp;&nbsp;&nbsp;";
			$allsrch='<br><br>$allsrch="'."AND (";
		}
		else
		{
			$cond1.="<br>if($$field==\"\"){"."$$field1=\"\";}else{"."$$field1=\"AND $field='$$field'\";}";
			$allsrch.="$field LIKE '%".'$srch'."%' OR ";
			$sql.=" $$field1";
		}
		$query.="$$field=isset($Methods[$method]'$field']) ? $Methods[$method]'$field'] : '';$cond<br>";
		//$query.="$$field$Methods[$method]'$field']; $tab $cond<br>";
	}
	$sql.=' $allsrch") or die(mysqli_error($con));';
	$srchall=rtrim($allsrch,' OR ').')";';
	$query.=$cond1.$srchall.$sql;
}
else
if($qtyp==7)
{
	//Blank Checking
	$query='if(';
	for($i=1;$i<count($Fields)-7;$i++)
	{
		$field=$Fields[$i];
		$query.="$$field==''||";
	}
	$query=rtrim($query,'||').")<br>{<br>$tab";
	$query.='$msg='."'Please Fill all fields Correctly. . . .! ! !';<br>$tab";
	$query.='$returnpage=\'window.history.go(-1)\';<br>}';
}
else
if($qtyp==8)
{
	//Create Form
	$query='$sl=isset($_REQUEST[\'sl\']) ? $_REQUEST[\'sl\'] : \'\';	if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}';
	//$query='$sl=$_REQUEST[\'sl\'];	if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}';
	$query.='
<form name="form" id="form" method="post" action="ActionPage.php" enctype="multipart/form-data">
<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
<table class="table table-hover table-striped table-bordered">
<tr>
	<td colspan="6" id="tblttl">Form Fields</td>
</tr>';
	for($i=1;$i<count($Fields)-7;$i++)
	{
		$field=$Fields[$i];
		if($i==1)
		{
$query.='
<tr>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> '.ucwords($field).' : </td>
	<!--<td id="tblbodynm"><input type="text" name="'.$field.'" id="'.$field.'" value="<?=(empty($'.$field.')) ? \'\' : $'.$field.';?>" class="form-control" required></td>-->
	<td id="tblbodynm"><input type="text" name="'.$field.'" id="'.$field.'" value="<?=$'.$field.';?>" class="form-control" required></td>';
		}
		else
		{
	$query.='
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> '.ucwords($field).' : </td>
	<td id="tblbodynm"><input type="text" name="'.$field.'" id="'.$field.'" value="<?=$'.$field.';?>" class="form-control" required></td>';
		if($i%3==0)
		{
$query.='
</tr>
<tr>';
		}
		}
	}
$query=rtrim($query,'
</<tr>');
$query.='
</tr>
<tr>
	<td id="tblbody" colspan="6"><input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
</tr>
</table>
</form>';
}
         
echo $query;
?>