<?php
$requirelevel=0;
include 'ActiveUsers.php';
include "header.php";
$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}
$sql=mysqli_query($con,"SELECT * FROM main_reference WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
	$refnm=$R['refnm'];
	$refmob=$R['refmob'];
	$refpan=$R['refpan'];
	$payamnt=$R['payamnt'];
}
if(empty($refnm)){$refnm='';}
if(empty($refmob)){$refmob='';}
if(empty($refpan)){$refpan='';}
if(empty($payamnt)){$payamnt='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-edit"></i> Reference Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Entry</li><li class="active"> Reference Entry</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="Form1" id="Form1" method="post" action="references.php" enctype="multipart/form-data">
<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
<table class="table table-hover table-striped table-bordered">
<tr>
    <td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Referrer:</td>
	<td id="tblbodynm"><input type="text" name="refnm" id="refnm" value="<?=$refnm?>" class="form-control Capitalize" onKeyUp="srch()" required/></td>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Mobile:</td>
	<td id="tblbodynm">
    <input type="text" name="refmob" id="refmob" value="<?=$refmob?>" maxlength="10" class="form-control" onKeyPress="return check(event)" onKeyUp="srch()" required/>
    </td>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> PAN No:</td>
	<td id="tblbodynm" style="width:15%;">
    <input type="text" name="refpan" id="refpan" value="<?php echo $refpan;?>" class="form-control UpperCase" onKeyUp="srch()">
    </td>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Payout:</td>
	<td id="tblbodynm" style="width:10%;">
    <input type="text" name="payamnt" id="payamnt" value="<?php echo $payamnt;?>" maxlength="3" class="form-control" onKeyPress="return check(event)" onKeyUp="srch()">
    </td>
</tr>
<tr>
	<td id="tblbody" colspan="8"><input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
</tr>
</table>
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
function check(evt)
{
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

$(document).ready(function()
{
   	$("#refpan").inputmask("aaaaa9999a", '');
	srch();
});

function srch()
{
	var refnm=encodeURI(document.getElementById('refnm').value);
	var refmob=encodeURI(document.getElementById('refmob').value);
	var refpan=encodeURI(document.getElementById('refpan').value);
	var payamnt=encodeURI(document.getElementById('payamnt').value);
	$('#show').load('reference_show.php?refnm='+refnm+'&refmob='+refmob+'&refpan='+refpan+'&payamnt='+payamnt).fadeIn('fast'); 
}

function activation(sl,div,table,field,clas,btnnm,msg,acttl)
{
	if(msg==1)
	{
		msg1='Do you want to '+btnnm+' ? ';
	}
	else
	{
		msg1='Do you want to '+btnnm+' ? ';
	}
	
	if(confirm(msg1))
	{
		$('#'+div).load('activation.php?sl='+sl+'&div='+div+'&table='+table+'&field='+field+'&class='+encodeURI(clas)+'&btnnm='+encodeURI(btnnm)+'&acttl='+encodeURI(acttl)).fadeIn('fast');
	}
}
</script>