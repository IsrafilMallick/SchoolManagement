<?php
include 'connect.php';
$BankName=rawurldecode($_REQUEST['BankName']);
$BranchName=rawurldecode($_REQUEST['BranchName']);
$BranchIFSC=isset($_REQUEST['BranchIFSC']) ? $_REQUEST['BranchIFSC'] : '';

if($BankName==""){$BankName1="";}else{$BankName1="AND BankName='$BankName'";}
if($BranchName==""){$BranchName1="";}else{$BranchName1="AND BranchName='$BranchName'";}
if($BranchIFSC==""){$BranchIFSC1="";}else{$BranchIFSC1="AND IfsCode='$BranchIFSC'";}

if($BankName==""&&$BranchName==""&&$BranchIFSC=="")
{
	$BankName='';
	$BranchName='';
	$BranchAddress='';
	$BranchIFSC='';
	$BranchMICR='';
}
else
{
	$sql=mysqli_query($con,"SELECT * FROM main_bankdata WHERE sl>0 $BankName1 $BranchName1 $BranchIFSC1") or die(mysql_error());
	while($R=mysqli_fetch_array($sql))
	{
		$BankName=NameCase($R['BankName']);
		$BranchName=NameCase($R['BranchName']);
		$BranchAddress=NameCase($R['BranchAddress']);
		$BranchIFSC=strtoupper($R['IfsCode']);
		$BranchMICR=$R['MICRCode'];
	}
	if(empty($BankName)){$BankName='';}
	if(empty($BranchName)){$BranchName='';}
	if(empty($BranchAddress)){$BranchAddress='';}
	if(empty($BranchIFSC)){$BranchIFSC='';}
	if(empty($BranchMICR)){$BranchMICR='';}
}
if($BranchIFSC!=""){$BranchIFSC=$BranchIFSC;}
echo "$BankName@@$BranchName@@$BranchIFSC@@$BranchMICR@@$BranchAddress";
?>