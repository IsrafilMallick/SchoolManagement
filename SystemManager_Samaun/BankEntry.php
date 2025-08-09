<?php
$requirelevel=-1;
include 'ActiveUsers.php';
include "header.php";
$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}
$sql=mysqli_query($con,"SELECT * FROM main_bankdata WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sl=$R['sl'];
    $BankName=$R['BankName'];
    $BranchName=$R['BranchName'];
    $BranchAddress=$R['BranchAddress'];
    $IfsCode=$R['IfsCode'];
    $MICRCode=$R['MICRCode'];
    $mob=$R['mob'];
    $city=$R['city'];
    $dist=$R['dist'];
    $state=$R['state'];
}
if(empty($sl)){$sl='';}
if(empty($BankName)){$BankName='';}
if(empty($BranchName)){$BranchName='';}
if(empty($BranchAddress)){$BranchAddress='';}
if(empty($IfsCode)){$IfsCode='';}
if(empty($MICRCode)){$MICRCode='';}
if(empty($mob)){$mob='';}
if(empty($city)){$city='';}
if(empty($dist)){$dist='';}
if(empty($state)){$state='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-university"></i> Bank Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Entry</li><li class="active"> Bank Entry</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="form" id="form" method="post" action="BankEntrys.php" enctype="multipart/form-data">
<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
<table class="table table-hover table-striped table-bordered">
<tr>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Bank Name : </td>
	<td id="tblbodynm"><input type="text" name="BankName" id="BankName" value="<?=$BankName;?>" class="form-control" required="" onkeyup="show()"></td>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Branch Name : </td>
	<td id="tblbodynm"><input type="text" name="BranchName" id="BranchName" value="<?=$BranchName;?>" class="form-control" required="" onkeyup="show()"></td>
	<td id="tblhedrow">Branch Address : </td>
	<td id="tblbodynm"><input type="text" name="BranchAddress" id="BranchAddress" value="<?=$BranchAddress;?>" class="form-control" onkeyup="show()"></td>
</tr>
<tr>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> IFS Code : </td>
	<td id="tblbodynm"><input type="text" name="IfsCode" id="IfsCode" value="<?=$IfsCode;?>" class="form-control" required="" onkeyup="show()"></td>
	<td id="tblhedrow">MICR Code : </td>
	<td id="tblbodynm"><input type="text" name="MICRCode" id="MICRCode" value="<?=$MICRCode;?>" class="form-control" onkeyup="show()"></td>
	<td id="tblhedrow">Contact No. : </td>
	<td id="tblbodynm"><input type="text" name="mob" id="mob" value="<?=$mob;?>" class="form-control" onkeyup="show()"></td>
</tr>
<tr>
	<td id="tblhedrow">City : </td>
	<td id="tblbodynm"><input type="text" name="city" id="city" value="<?=$city;?>" class="form-control" onkeyup="show()"></td>
	<td id="tblhedrow">District : </td>
	<td id="tblbodynm"><input type="text" name="dist" id="dist" value="<?=$dist;?>" class="form-control" onkeyup="show()"></td>
	<td id="tblhedrow">State : </td>
	<td id="tblbodynm"><input type="text" name="state" id="state" value="<?=$state;?>" class="form-control" onkeyup="show()"></td>
</tr>
<tr>
	<td id="tblbody" colspan="9"><input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
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
	var BankName=$('#BankName').val();
	var BranchName=$('#BranchName').val();
	var BranchAddress=$('#BranchAddress').val();
	var IfsCode=$('#IfsCode').val();
	var MICRCode=$('#MICRCode').val();
	var mob=$('#mob').val();
	var city=$('#city').val();
	var dist=$('#dist').val();
	var state=$('#state').val();
	$('#show').load('BankEntryShow.php?BankName='+BankName+'&BranchName='+BranchName+'&BranchAddress='+BranchAddress+'&IfsCode='+IfsCode+'&MICRCode='+MICRCode+'&mob='+mob+'&city='+city+'&dist='+dist+'&state='+state).fadeIn('fast');
}

function pagnt(pno)
{
   	var ps=$('#ps').val();
	var BankName=$('#BankName').val();
	var BranchName=$('#BranchName').val();
	var BranchAddress=$('#BranchAddress').val();
	var IfsCode=$('#IfsCode').val();
	var MICRCode=$('#MICRCode').val();
	var mob=$('#mob').val();
	var city=$('#city').val();
	var dist=$('#dist').val();
	var state=$('#state').val();
	$('#show').load('BankEntryShow.php?pno='+pno+'&ps='+ps+'&BankName='+BankName+'&BranchName='+BranchName+'&BranchAddress='+BranchAddress+'&IfsCode='+IfsCode+'&MICRCode='+MICRCode+'&mob='+mob+'&city='+city+'&dist='+dist+'&state='+state).fadeIn('fast');
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