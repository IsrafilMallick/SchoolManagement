<?php
$requirelevel=0;
include 'ActiveUsers.php';
include "header.php";
$tblnm='main_course_setup';

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}
$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sesn=$R['sesn'];
    $course=$R['course'];
    $duration=$R['duration'];
    $CourseFees=$R['CourseFees'];
    echo $CoursePackage=$R['CoursePackage'];
}
if(empty($sesn)){$sesn='';}
if(empty($course)){$course='';}
if(empty($duration)){$duration='';}
if(empty($CourseFees)){$CourseFees='';}
if(empty($CoursePackage)){$CoursePackage='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-cog"></i> Course Setup</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Setup</li><li class="active"> Course Setup</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="frmnm" id="frmnm" method="post" action="CourseSetups.php">
<input type="hidden" name="sl" id="sl" value="<?=$sl?>">
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered">
<tr>
	<td id="tblhedrow" style="width:15%;"><font color="#FF0000" size="+2">*</font> Session :</td>
    <td id="tblbodynm" style="width:35%;">
    <select id="sesn" name="sesn" class="form-control" onChange="show()" required>
    <option value="">--- Select ---</option>				
    <?php
    for($i=$sesn+1;$i>=2021;$i--)
    {
        ?><option value="<?=$i;?>" <?=$i==$sesn ? 'selected' : ''?>><?=$i;?> - <?=$i+1;?></option><?php
    }
    ?>					                
    </select>
    </td>
    <td id="tblhedrow" style="width:15%;"><font color="#FF0000" size="+2">*</font> Course Name :</td>
    <td id="tblbodynm" style="width:35%;">
    <select id="course" name="course" class="form-control" onChange="show()" required>
    <option value="">--- Select ---</option>
    <?php
    $sql=mysqli_query($con,"SELECT * FROM main_course WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
    while($R=mysqli_fetch_array($sql))
    {
        $coursesl=$R['sl'];
        $coursenm=$R['course'];
        ?><option value="<?php echo $coursesl;?>" <?=$coursesl==$course ? 'selected' : ''?>><?php echo $coursenm;?></option><?php
    }
    ?>
    </select>
	</td>
</tr>
<tr>
    <td id="tblhedrow">Course Duration: <br />(In Month)</td>
    <td id="tblbodynm">
    <input type="text" name="duration" id="duration" value="<?=$duration?>" class="form-control" maxlength="2" onKeyPress="return check(event)" onKeyUp="show()">
    </td>
    <td id="tblhedrow">Course Fees :</td>
    <td id="tblbodynm">
    <input type="text" name="CourseFees" id="CourseFees" value="<?=$CourseFees?>" class="form-control" onKeyPress="return check(event)" onKeyUp="show()">
    </td>
</tr>
<tr>
    <td id="tblhedrow">Course Package :</td>
    <td id="tblhed" colspan="3">
    <select name="CoursePackage[]" id="CoursePackage" class="form-control select2" multiple="multiple" data-placeholder="Select Course Package" style="width: 100%;">
    <?php
	$sql=mysqli_query($con,"SELECT * FROM coursepackage WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
    while($R=mysqli_fetch_array($sql))
    {
        $CoursePackagesl=$R['sl'];
        $PackageName=$R['PackageName'];
        ?><option value="<?=$CoursePackagesl?>"><?php echo $PackageName;?></option><?php
    }
    ?>
    </select>
    </td>
</tr>
<tr>
    <td id="tblhed" colspan="4"><input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
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
$(function (){$(".select2").select2();});
show();
function show()
{
    var sesn=document.getElementById('sesn').value;
    var course=document.getElementById('course').value;
    var duration=document.getElementById('duration').value;
    var CourseFees=document.getElementById('CourseFees').value;
    var CoursePackage=document.getElementById('CoursePackage').value;
	$('#show').load('CourseSetupShow.php?sesn='+sesn+'&course='+course+'&duration='+duration+'&CourseFees='+CourseFees+'&CoursePackage='+CoursePackage).fadeIn('fast');
}

function pagnt(pno)
{
	var ps=document.getElementById('ps').value;
    var sesn=document.getElementById('sesn').value;
    var course=document.getElementById('course').value;
    var duration=document.getElementById('duration').value;
    var CourseFees=document.getElementById('CourseFees').value;
    var CoursePackage=document.getElementById('CoursePackage').value;
	$('#show').load('CourseSetupShow.php?pno='+pno+'&ps='+ps+'&sesn='+sesn+'&course='+course+'&duration='+duration+'&CourseFees='+CourseFees+'&CoursePackage='+CoursePackage).fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1(pno)
{
	pagnt(pno);
}

function check(evt)
{
	evt =(evt) ? evt : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if(charCode > 31&&(charCode < 48 || charCode > 57)&&charCode!=44&&charCode!=32)
	{
		return false;
	}
	else
	{
		return true;	
	}
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