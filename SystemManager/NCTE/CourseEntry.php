<?php
$requirelevel=0;
include 'ActiveUsers.php';
include "header.php";
$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}
$sql=mysqli_query($con,"SELECT * FROM main_course WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
	$course=$R['course'];
	$ccode=$R['ccode'];
	$eligibility=$R['eligibility'];
}
if(empty($course)){$course='';}
if(empty($ccode)){$ccode='';}
if(empty($eligibility)){$eligibility='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-edit"></i> Course Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Entry</li><li class="active"> Course Entry</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="form1" id="form1" method="post" action="CourseEntrys.php">
<input type="hidden" name="rollsl" id="rollsl" value="<?=$rollsl1?>">
<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
<table class="table table-hover table-striped table-bordered">
<tr>
    <td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Course : </td>
    <td id="tblbodynm"><input type="text" name="course" id="course" value="<?php echo $course;?>" class="form-control" onKeyUp="show()" required></td>
    <td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Course Code : </td>
    <td id="tblbodynm"><input type="text" name="ccode" id="ccode" value="<?php echo $ccode;?>" class="form-control UpperCase" onKeyUp="show()" required></td>
    <td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Eligibility Criteria : </td>
    <td id="tblbodynm">
    <select name="eligibility" id="eligibility" class="form-control" onChange="show()" required>
    <option value="">--- Select ---</option>
    <?php
	for($i=1;$i<count($Eligibilitys);$i++)
	{
    	?><option value="<?=$i?>"  <?=$i==$eligibility ? 'selected' : ''?>><?=$Eligibilitys[$i];?></option><?php
	}
	?>
    </select>
    </td>
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
	var course=document.getElementById('course').value;
	var ccode=document.getElementById('ccode').value;
	var eligibility=document.getElementById('eligibility').value;
	$('#show').load('CourseEntryShow.php?course='+course+'&ccode='+ccode+'&eligibility='+eligibility).fadeIn('fast');
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