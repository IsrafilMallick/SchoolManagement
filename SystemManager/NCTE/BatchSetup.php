<?php
$requirelevel=0;
include 'ActiveUsers.php';
include "header.php";
$tblnm='main_batch_setup';

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}
$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sl=$R['sl'];
    $sesn=$R['sesn'];
    $course=$R['course'];
    $batch=$R['batch'];
    $day=$R['day'];
    $time=$R['time'];
}
if(empty($sl)){$sl='';}
if(empty($sesn)){$sesn='';}
if(empty($course)){$course='';}
if(empty($batch)){$batch='';}
if(empty($day)){$day='';}
if(empty($time)){$time='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-users"></i> Batch Setup</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Setup</li><li class="active"> Batch Setup</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="frmnm" id="frmnm" method="post" action="BatchSetups.php">
<input type="hidden" name="sl" id="sl" value="<?=$sl?>">
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered">
<tr>
	<td id="tblhedrow" style="width:12%;"><font color="#FF0000" size="+2">*</font> Session :</td>
    <td id="tblbodynm" style="width:20%;">
    <select id="sesn" name="sesn" class="form-control" onChange="TempShow(),show()" required>
    <option value="">--- Select ---</option>				
    <?php
    for($i=$sesn+1;$i>=2021;$i--)
    {
        ?><option value="<?=$i;?>" <?=$i==$sesn ? 'selected' : ''?>><?=$i;?> - <?=$i+1;?></option><?php
    }
    ?>					                
    </select>
    </td>
    <td id="tblhedrow" style="width:13%;"><font color="#FF0000" size="+2">*</font> Course Name :</td>
    <td id="tblbodynm" style="width:20%;">
    <select id="course" name="course" class="form-control" onChange="TempShow(),show()" required>
    <option value="">--- Select ---</option>
    <?php
    $sql=mysqli_query($con,"SELECT course FROM main_course_setup WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
    while($R=mysqli_fetch_array($sql))
    {
        $coursesl=$R['course'];
        $coursenm=get_value('main_course','sl',$coursesl,'course','',$con);
        ?><option value="<?php echo $coursesl;?>" <?=$coursesl==$course ? 'selected' : ''?>><?php echo $coursenm;?></option><?php
    }
    ?>
    </select>
	</td>
    <td id="tblhedrow" style="width:12%;"><font color="#FF0000" size="+2">*</font> Batch Name :</td>
    <td id="tblbodynm" style="width:23%;">
    <select name="batch" id="batch" class="form-control" onChange="TempShow(),show()" required>
    <option value="">--- Select ---</option>
    <?php
    $sql=mysqli_query($con,"SELECT sl, BatchName FROM main_batch WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
    while($R=mysqli_fetch_array($sql))
    {
        $batchsl=$R['sl'];
        $BatchName=$R['BatchName'];
        ?><option value="<?php echo $batchsl;?>" <?=$batchsl==$batch ? 'selected' : ''?>><?php echo $BatchName;?></option><?php
    }
    ?>
    </select>
    </td>
</tr>
<tr>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Day :</td>
    <td id="tblbodynm">
    <select id="day" name="day" class="form-control" onChange="show()" required>
    <option value="">--- Select ---</option>
    <?php
    for($i=1;$i<=7;$i++)
	{
		?><option value="<?=$i?>" <?=$i==$day ? 'selected' : ''?>><?=$Days[$i];?></option><?php
	}
	?>
    </select>
    </td>
	<td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Time :</td>
	<td id="tblbodynm"><input type="time" name="time" id="time" value="<?=$time?>" class="form-control" required></td>
    <td id="tblhed" colspan="2"><button type="button" name="add" id="add" onClick="TempBatchDetails()" class="btn btn-info"><b>Add</b></button></td>
</tr>
<tr style="height:100px;">
	<td colspan="6"><div id="TempBatchShow"></div></td>
</tr>
<tr>
    <td id="tblhed" colspan="6"><input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
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
function TempBatchDetails()
{
	var sesn=$('#sesn').val();
	var course=$('#course').val();
	var batch=$('#batch').val();
	var day=$('#day').val();
	var time=$('#time').val();
	$('#TempBatchShow').load('TempBatchDetails.php?sesn='+sesn+'&course='+course+'&batch='+batch+'&day='+day+'&time='+time).fadeIn("fast");
}

TempShow();
function TempShow()
{
	var sesn=$('#sesn').val();
	var course=$('#course').val();
	var batch=$('#batch').val();
	var day=$('#day').val();
	var time=$('#time').val();
	$('#TempBatchShow').load('TempBatchShow.php?stat=1&sesn='+sesn+'&course='+course+'&batch='+batch+'&day='+day+'&time='+time).fadeIn('fast');
}

function del(TableName,FieldName,FieldValue)
{
	if(confirm('Do you Sure to Delete....???'))
	{
		$('#TempBatchShow').load("TempBatchDelete.php?TableName="+TableName+"&FieldName="+FieldName+"&FieldValue="+FieldValue).fadeIn('fast');
	}
}

show();
function show()
{
	var sesn=$('#sesn').val();
	var course=$('#course').val();
	var batch=encodeURI($('#batch').val());
	var day=$('#day').val();
	var time=$('#time').val();
	$('#show').load('BatchSetupShow.php?sesn='+sesn+'&course='+course+'&batch='+batch+'&day='+day+'&time='+time).fadeIn('fast');
}

function pagnt(pno)
{
   	var ps=$('#ps').val();
   	var sesn=$('#sesn').val();
	var course=$('#course').val();
	var batch=encodeURI($('#batch').val());
	var day=$('#day').val();
	var time=$('#time').val();
	$('#show').load('BatchSetupShow.php?pno='+pno+'&ps='+ps+'&sesn='+sesn+'&course='+course+'&batch='+batch+'&day='+day+'&time='+time).fadeIn('fast');
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