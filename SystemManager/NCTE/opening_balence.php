<?php
$requirelevel=-1;
include 'ActiveUsers.php';
include 'header.php';

$paydt=date('01-04-Y');
$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}
$sql=mysqli_query($con,"SELECT * FROM main_drcr WHERE sl='$sl'") or die(mysqli_errno($con));
while($R=mysqli_fetch_array($sql))
{
    $paydt=$R['paydt'];	if($paydt==""||$paydt=="0000-00-00"){$paydt="";}else{$paydt=date('d-m-Y', strtotime($paydt));}
	$drldgr=$R['drldgr'];
	$crldgr=$R['crldgr'];
	$amnt=$R['amnt'];
	$paydesc=$R['paydesc'];
}
if(empty($paydt)){$paydt='';}
if(empty($drldgr)){$drldgr='';}
if(empty($crldgr)){$crldgr='';}
if(empty($amnt)){$amnt='';}
if(empty($paydesc)){$paydesc='';}

if($crldgr=='-1'){$ledgr=$drldgr;}else
if($drldgr=='-1'){$ledgr=$crldgr;}else{$ledgr='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-folder-open"></i> Group Head</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Accounts</li>
                    <li class="active">Setup</li>
                    <li class="active"> Opening Balence</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="form1" id="form1" method="post" action="opening_balences.php">
<input type="hidden" name="rollsl" id="rollsl" value="<?=$rollsl1?>">
<input type="hidden" name="sl" id="sl" value="<?=$sl?>">
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered">
<tr>
	<td id="tblhedrow">Transaction Date : </td>
    <td><input type="text" name="paydt" id="paydt" value="<?=$paydt?>" placeholder="DD-MM-YYYY" class="form-control dt" onBlur="show()"></td>
    <td id="tblhedrow">Ledger Name :</td>
    <td id="tblbodynm" style="width:35%;">
    <select id="ledgr" name="ledgr" class="form-control" onChange="show()">
    <option value="">---Select---</option>
    <?php 
    $sql=mysqli_query($con,"SELECT * FROM account_ledg WHERE stat=0 AND sl>0 AND (psl BETWEEN 1 AND 2)  ORDER BY ledgnm");
    while($R=mysqli_fetch_array($sql))
    {
		$ledgsl=$R['sl'];
		$psl=$R['psl'];
		$ledgnm=$R['ledgnm'];
		if($psl==1){$cldgr=" (Dr+)";}else
		if($psl==2){$cldgr=" (Cr-)";}
		?><option value="<?=$ledgsl;?>"<?=$ledgsl==$ledgr? 'selected' : ''?>><?=$ledgnm.$cldgr?>(<?=get_drcr_rs($ledgsl,$edt,0,$con)?>/-)</option><?php
    }
    ?>
    </select>
    </td>
</tr>
<tr>
    <td id="tblhedrow">Amount ( <i class="fa fa-inr"></i> ) :</td>
	<td id="tblbodynm"><input type="text" name="amnt" id="amnt" value="<?=$amnt?>" class="form-control" onKeyPress="return check(event)" onKeyUp="show()"></td>
    <td id="tblhedrow">Narration :</td>
	<td  id="tblbodynm"><input type="text" name="paydesc" id="paydesc" value="<?=$paydesc?>" class="form-control" onKeyUp="show()" /></td>
</tr>
<tr>
    <td colspan="4" id="tblbody"><input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
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
	<?php include 'footer.php';?>
</body>
</html>
<script>
$('#ledgr').chosen({no_results_text: "Oops, nothing found!",});
$(document).ready(function()
{
	show();
	var jQueryDatePicker2Opts =
	{
		dateFormat: 'dd-mm-yy',
		changeMonth: true,
		changeYear: true,
		yearRange: '1990:' + new Date().getFullYear().toString(),
		showButtonPanel: false,
		showAnim: 'show'
	};
	$(".dt").datepicker(jQueryDatePicker2Opts);
	$(".dt").inputmask("dd-mm-yyyy", {"placeholder": "DD-MM-YYYY"});
});

function show()
{
	var paydt=document.getElementById('paydt').value;
	var ledgr=document.getElementById('ledgr').value;
	var amnt=document.getElementById('amnt').value;
	var paydesc=encodeURI(document.getElementById('paydesc').value);
	$('#show').load('opening_balence_show.php?paydt='+paydt+'&ledgr='+ledgr+'&amnt='+amnt+'&paydesc='+paydesc).fadeIn('fast');
}

function check(evt)
{
	evt =(evt) ? evt : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if(charCode > 31 && (charCode < 48 || charCode > 57)&&charCode!=46)
	{
		return false;
	}
	else
	{
	 	return true;
	}
}
</script>