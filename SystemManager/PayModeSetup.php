<?php
$requirelevel=0;
include 'ActiveUsers.php';
include "header.php";
$tblnm="main_paymode_setup";

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sl=$R['sl'];
    $PrimarySerial=$R['PrimarySerial'];
    $GroupSerial=$R['GroupSerial'];
    $LedgerHead=$R['LedgerHead'];
    $PayMode=$R['PayMode'];
}
if(empty($sl)){$sl='';}
if(empty($PrimarySerial)){$PrimarySerial='';}
if(empty($GroupSerial)){$GroupSerial='';}
if(empty($LedgerHead)){$LedgerHead='';}
if(empty($PayMode)){$PayMode='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-cog"></i> Pay Mode Setup</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Fees</li><li class="active"> Pay Mode Setup</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="frmnm" id="frmnm" method="post" action="PayModeSetups.php" enctype="multipart/form-data">
<input type="hidden" name="sl" id="sl" value="<?=$sl?>">
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered" style="width:100%;" align="center">
<tr>
	<td id="tblhedrow" style="width:10%;"><font color="red">*</font> Pay Mode :</td>
	<td id="tblbodynm" style="width:20%;">
    <select id="PayMode" name="PayMode" class="form-control" onChange="show()">
    <option value="">---Select---</option>
    <?php
    $sql=mysqli_query($con,"SELECT * FROM main_paymode WHERE stat=0");
    while($R=mysqli_fetch_array($sql))
    {
		$PayModesl=$R['sl'];
		$PayMode1=$R['PayMode'];
		?><option value="<?=$PayModesl;?>"<?=$PayModesl==$PayMode ? 'selected' : '';?>><?=$PayMode1;?></option><?php
    }
    ?>
    </select>
    </td>
    <td id="tblhedrow" style="width:15%;"><font color="red">*</font> Group Head :</td>
    <td id="tblbodynm" style="width:20%;">
    <select name="GroupSerial" id="GroupSerial" class="form-control" onChange="GetLedgerHead(this.value);show()">
    <option value="">---Select---</option>
    <?php
    $sql=mysqli_query($con,"SELECT * FROM account_group WHERE stat=0 ORDER BY GroupName");
    while($list=mysqli_fetch_array($sql))
    {
		$GroupSerial1=$list['sl'];
		$PrimarySerial=$list['PrimarySerial'];
		$GroupName=$list['GroupName'];
		$PrimaryName=get_value('account_primary','sl',$PrimarySerial,'PrimaryName','',$con);
		?><option value="<?=$GroupSerial1;?>"<?=$GroupSerial1==$GroupSerial ? 'selected' : '';?>><?="$GroupName ($PrimaryName)";?></option><?php
    }
    ?>
    </select>
    </td>
	<td id="tblhedrow" style="width:15%;"><font color="red">*</font> Ledger Head :</td>
    <td id="tblbodynm" style="width:20%;">
    <span id="LedgerHeadDiv">
    <select name="LedgerHead" id="LedgerHead" class="form-control" onChange="show()">
    <option value="">--- All ---</option>
    <?php
    $sql=mysqli_query($con,"SELECT * FROM account_ledg WHERE stat=0 ORDER BY LedgerName");
    while($R=mysqli_fetch_array($sql))
    {
		$LedgerHead1=$R['sl'];
		$LedgerName=$R['LedgerName'];
		?><option value="<?=$LedgerHead1;?>"<?=$LedgerHead1==$LedgerHead ? 'selected' : '';?>><?=$LedgerName?> (<?=GetDebitCreditRupees($LedgerHead,$edt,0,$con)?>/-)</option><?php
    }
    ?>
    </select>
    </span>
    </td>
</tr>
<tr>
    <td id="tblbody" colspan="6"><input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
</tr>
</table>
</div>
</form>
<hr />
<div id="show"></div>
				</div>
			</section>
		</aside>
	</div>
</body>
</html>
<script>
$('#PayMode').chosen({no_results_text: "Oops, nothing found!",});
$('#GroupSerial').chosen({no_results_text: "Oops, nothing found!",});
$('#LedgerHead').chosen({no_results_text: "Oops, nothing found!",});

function GetLedgerHead(GroupSerial)
{
	$('#LedgerHeadDiv').load('GetLedgerHead.php?FunctionType=1&GroupSerial='+GroupSerial).fadeIn('fast');
}

show();
function show()
{
	var PayMode=document.getElementById('PayMode').value;
	var GroupSerial=document.getElementById('GroupSerial').value;
	var LedgerHead=document.getElementById('LedgerHead').value;
	$('#show').load('PayModeSetupShow.php?PayMode='+PayMode+'&GroupSerial='+GroupSerial+'&LedgerHead='+LedgerHead).fadeIn('fast');
}

function pagnt(pno)
{
	var ps=document.getElementById('ps').value;
	var PayMode=document.getElementById('PayMode').value;
	var GroupSerial=document.getElementById('GroupSerial').value;
	var LedgerHead=document.getElementById('LedgerHead').value;
    $('#show').load('PayModeSetupShow.php?ps='+ps+'&pno='+pno+'&PayMode='+PayMode+'&GroupSerial='+GroupSerial+'&LedgerHead='+LedgerHead).fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1()
{
	pno=document.getElementById('pgn').value;
	pagnt(pno);
}
</script>