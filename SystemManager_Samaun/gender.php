<?php
$requirelevel=-1;
include 'ActiveUsers.php';
include "header.php";
$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}
$sql=mysqli_query($con,"SELECT gender FROM main_gender WHERE sl='$sl'");
while($R=mysqli_fetch_array($sql))
{
	$gender=$R['gender'];
}
if(empty($gender)){$gender='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-edit"></i> Gender Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Entry</li><li class="active"> Gender Entry</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="form1" id="form1" method="post" action="genders.php">
<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
<table class="table table-hover table-striped table-bordered">
<tr>
    <td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Gender : </td>
    <td id="tblbodynm"><input type="text" name="gender" id="gender" value="<?php echo $gender;?>" class="form-control" onKeyUp="show()" required></td>
    <td id="tblbody"><input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
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
	var gender=$('#gender').val();
	$('#show').load('gender_show.php?gender='+gender).fadeIn('fast');
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