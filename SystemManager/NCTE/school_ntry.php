<?php
$requirelevel=-1;
include 'ActiveUsers.php';
include "header.php";
$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}
$sql=mysqli_query($con,"SELECT * FROM main_school WHERE sl='$sl'") or die(mysqli_error($con));
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
if(empty($scoolnm1)){$scoolnm1='';}
if(empty($disecode1)){$disecode1='';}
if(empty($mpcode1)){$mpcode1='';}
if(empty($hscode1)){$hscode1='';}
if(empty($addr1)){$addr1='';}
if(empty($mob1)){$mob1='';}
if(empty($email1)){$email1='';}
if(empty($url1)){$url1='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-university"></i> Istitution Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Entry</li><li class="active"> Istitution Entry</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="form1" id="form1" method="post" action="school_ntrys.php">
<input type="hidden" name="rollsl" id="rollsl" value="<?=$rollsl1?>">
<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
<table class="table table-hover table-striped table-bordered">
<tr>
    <td id="tblhedrow"><font color="#FF0000" size="+2">*</font> School Name :</td>
    <td id="tblbody">
    <input type="text" name="scoolnm" id="scoolnm" value="<?=$scoolnm1?>" class="form-control Capitalize" onKeyUp="show()" required/>
    </td>
    <td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Address : </td>
    <td id="tblbody"><input type="text" name="addr" id="addr" value="<?=$addr1?>" class="form-control Capitalize" onKeyUp="show()" required/></td>
    <td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Contact No. : </td>
    <td id="tblbody">
    <input type="text" name="mob" id="mob" value="<?=$mob1?>" class="form-control" onKeyPress="return check(event)" onKeyUp="show()" required/>
    </td>
</tr>
<tr>
    <td id="tblhedrow">DISE Code :</td>
    <td id="tblbody"><input type="text" name="disecode" id="disecode" value="<?=$disecode1?>" class="form-control UpperCase" onKeyUp="upper(this.value,'disecode'),show()" /></td>
    <td id="tblhedrow">MP Code : </td>
    <td id="tblbody"><input type="text" name="mpcode" id="mpcode" value="<?=$mpcode1?>" class="form-control UpperCase" onKeyUp="show()" /></td>
    <td id="tblhedrow">HS Code : </td>
    <td id="tblbody"><input type="text" name="hscode" id="hscode" value="<?=$hscode1?>" class="form-control UpperCase" onKeyUp="show()" /></td>
</tr>
<tr>
    <td id="tblhedrow">Email ID : </td>
    <td id="tblbody"><input type="email" name="email" id="email" value="<?=$email1?>" class="form-control LowerCase" onKeyUp="show()" /></td>	
    <td id="tblhedrow">Website : </td>
    <td id="tblbody"><input type="text" name="url" id="url" value="<?=$url1?>" class="form-control LowerCase" onKeyUp="show()" /></td>
    <td colspan="2"></td>
</tr>
<tr>
  <td colspan="6" id="tblbody"><input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
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
	evt =(evt) ? evt : window.event;
	var charCode=(evt.which) ? evt.which : evt.keyCode;
	if(charCode > 31 && (charCode < 48 || charCode > 57))
	{
		return false;
	}
	else
	{
		return true;
	}
}

$(document).ready(function(){show();});
function show()
{
	var scoolnm=encodeURIComponent(document.getElementById('scoolnm').value);
	var addr=encodeURIComponent(document.getElementById('addr').value);
	var mob=document.getElementById('mob').value;
	var disecode=document.getElementById('disecode').value;
	var mpcode=document.getElementById('mpcode').value;
	var hscode=document.getElementById('hscode').value;
	var email=encodeURIComponent(document.getElementById('email').value);
	var url=encodeURIComponent(document.getElementById('url').value);
	$('#show').load('school_ntry_show.php?scoolnm='+scoolnm+'&addr='+addr+'&mob='+mob+'&disecode='+disecode+'&mpcode='+mpcode+'&hscode='+hscode+'&email='+email+'&url='+url).fadeIn('fast');
} 
 
function pagnt(pno)
{
	var ps=document.getElementById('ps').value;
	var scoolnm=encodeURIComponent(document.getElementById('scoolnm').value);
	var addr=encodeURIComponent(document.getElementById('addr').value);
	var mob=document.getElementById('mob').value;
	var disecode=document.getElementById('disecode').value;
	var mpcode=document.getElementById('mpcode').value;
	var hscode=document.getElementById('hscode').value;
	var email=encodeURIComponent(document.getElementById('email').value);
	var url=encodeURIComponent(document.getElementById('url').value);
    $('#show').load('school_ntry_show.php?scoolnm='+scoolnm+'&addr='+addr+'&mob='+mob+'&disecode='+disecode+'&mpcode='+mpcode+'&hscode='+hscode+'&email='+email+'&url='+url+'&ps='+ps+'&pno='+pno).fadeIn('fast');
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