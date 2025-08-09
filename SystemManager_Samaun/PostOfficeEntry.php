<?php
$requirelevel=-1;
include 'ActiveUsers.php';
include "header.php";
$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}
$sql=mysqli_query($con,"SELECT * FROM main_pincodedetails WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sl=$R['sl'];
    $PostOffice=$R['PostOffice'];
    $PoliceStation=$R['PoliceStation'];
    $District=$R['District'];
    $State=$R['State'];
    $PinCode=$R['PinCode'];
}
if(empty($sl)){$sl='';}
if(empty($PostOffice)){$PostOffice='';}
if(empty($PoliceStation)){$PoliceStation='';}
if(empty($District)){$District='';}
if(empty($State)){$State='';}
if(empty($PinCode)){$PinCode='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-envelope"></i> Post Office Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Entry</li><li class="active"> Post Office Entry</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="form" id="form" method="post" action="PostOfficeEntrys.php" enctype="multipart/form-data">
<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
<table class="table table-hover table-striped table-bordered">
<tr>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Post Office : </td>
	<td id="tblbodynm"><input type="text" name="PostOffice" id="PostOffice" value="<?=$PostOffice;?>" class="form-control" required="" onkeyup="show()"></td>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Police Station : </td>
	<td id="tblbodynm"><input type="text" name="PoliceStation" id="PoliceStation" value="<?=$PoliceStation;?>" class="form-control" required="" onkeyup="show()"></td>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> District : </td>
	<td id="tblbodynm"><input type="text" name="District" id="District" value="<?=$District;?>" class="form-control" required="" onkeyup="show()"></td>
</tr>
<tr>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> State : </td>
	<td id="tblbodynm"><input type="text" name="State" id="State" value="<?=$State;?>" class="form-control" required="" onkeyup="show()"></td>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Pin Code : </td>
	<td id="tblbodynm"><input type="text" name="PinCode" id="PinCode" value="<?=$PinCode;?>" class="form-control" required="" onkeyup="show()"></td>
</tr>
<tr>
	<td id="tblbody" colspan="6"><input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
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
$(document).ready(function(){show();});
function show()
{
	var PostOffice=$('#PostOffice').val();
	var PoliceStation=$('#PoliceStation').val();
	var District=$('#District').val();
	var State=$('#State').val();
	var PinCode=$('#PinCode').val();
	$('#show').load('PostOfficeEntryShow.php?PostOffice='+PostOffice+'&PoliceStation='+PoliceStation+'&District='+District+'&State='+State+'&PinCode='+PinCode).fadeIn('fast');
}

function pagnt(pno)
{
   	var ps=$('#ps').val();
	var PostOffice=$('#PostOffice').val();
	var PoliceStation=$('#PoliceStation').val();
	var District=$('#District').val();
	var State=$('#State').val();
	var PinCode=$('#PinCode').val();
	$('#show').load('PostOfficeEntryShow.php?pno='+pno+'&ps='+ps+'&PostOffice='+PostOffice+'&PoliceStation='+PoliceStation+'&District='+District+'&State='+State+'&PinCode='+PinCode).fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1()
{
	var pno=$('#pgn').val();
	pagnt(pno);
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