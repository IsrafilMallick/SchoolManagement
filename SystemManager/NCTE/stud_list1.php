<?php
$requirelevel=1;
include 'ActiveUsers.php';
$stat=isset($_REQUEST['stat']) ? $_REQUEST['stat'] : '';
?>
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered">
<tr><td colspan="6"></td></tr>
<tr>
	<td id="tblhedrow" style="width:10%;">Session :</td>
    <td id="tblbodynm" style="width:22%;">
    <select  id="sesn" name="sesn" class="form-control" onChange="GetCourse('CurrentCourseDiv','course',this.value,3);show()">
    <option value="">--- Select ---</option>				
    <?php
    for($i=$sesn+1; $i>=2020;$i--)
    {
        ?><option value="<?=$i;?>" <?=$i==$sesn ? 'selected' : ''?>><?=$i;?> - <?=$i+1;?></option><?php
    }
    ?>					                
    </select>
    </td>
    <td id="tblhedrow">Course :</td>
    <td id="tblbodynm">
    <div id="CurrentCourseDiv">
    <select name="course" id="course" class="form-control" required>
    <option value="">--- Select ---</option>
    <?php
	$sql=mysqli_query($con,"SELECT course FROM main_course_setup WHERE sesn='$sesn' AND stat=0") or die(mysqli_error($con));
	while($R=mysqli_fetch_array($sql))
	{
		$CourseSl=$R['course'];
		$CourseName=get_value('main_course','sl',$CourseSl,'course','',$con);
		?><option value="<?=$CourseSl?>"><?=$CourseName?></option><?php
	}
	?>
    </select>
    </div>
    </td>
    <td id="tblhedrow">Gender :</td>
	<td id="tblbodynm">
    <select name="gender" id="gender" class="form-control" onChange="show()">
    <option value="">--- Select ---</option>
    <?php
    $sql=mysqli_query($con,"SELECT * FROM main_gender WHERE stat=0") or die(mysqli_error($con));
    while($R=mysqli_fetch_array($sql))
    {
        $gendersl=$R['sl'];
        $gender1=$R['gender'];
        ?><option value="<?=$gendersl?>"><?=$gender1?></option><?php
    }
    ?>
    </select>
    </td>
</tr>
<tr>
    <td id="tblhedrow">Caste :</td>
    <td id="tblbodynm">
    <select name="caste" id="caste" class="form-control" onChange="show()">
    <option value="">--- Select ---</option>
    <?php
    $sql=mysqli_query($con,"SELECT * FROM main_caste WHERE stat=0") or die(mysqli_error($con));
    while($R=mysqli_fetch_array($sql))
    {
        $castesl=$R['sl'];
        $caste1=$R['caste'];
        ?><option value="<?=$castesl?>"><?=$caste1?></option><?php
    }
    ?>
    </select>
    </td>
    <td id="tblhedrow">Religion :</td>
    <td id="tblbodynm">
    <select name="religion" id="religion" class="form-control" onChange="show()">
    <option value="">--- Select ---</option>
    <?php
    $sql=mysqli_query($con,"SELECT * FROM main_religion WHERE stat=0") or die(mysqli_error($con));
    while($R=mysqli_fetch_array($sql))
    {
        $religionsl=$R['sl'];
        $religion1=$R['religion'];
        ?><option value="<?=$religionsl?>"><?=$religion1?></option><?php
    }
    ?>
    </select>
    </td>
    <td id="tblhedrow">Search :</td>
    <td id="tblbodynm"><input type="text" id="srch" name="srch" class="form-control" placeholder="Search all" onKeyUp="show()"></td>
</tr>
</table>
</div>
<div id="show"></div>
<script>
$(document).ready(function(){show();});
function show()
{
	var sesn=$('#sesn').val();
	var course=$('#course').val();
	var gender=$('#gender').val();
	var caste=$('#caste').val();
	var religion=$('#religion').val();
	var srch=encodeURIComponent($('#srch').val());
	$('#show').load('stud_list_show1.php?sesn='+sesn+'&course='+course+'&gender='+gender+'&caste='+caste+'&religion='+religion+'&srch='+srch+'&stat=<?=$stat?>').fadeIn('fast');
}

function pagnt(pno)
{
	var ps=document.getElementById('ps').value;
	var sesn=$('#sesn').val();
	var course=$('#course').val();
	var gender=$('#gender').val();
	var caste=$('#caste').val();
	var religion=$('#religion').val();
	var srch=encodeURIComponent($('#srch').val());
	$('#show').load('stud_list_show1.php?pno='+pno+'&ps='+ps+'&sesn='+sesn+'&course='+course+'&gender='+gender+'&caste='+caste+'&religion='+religion+'&srch='+srch+'&stat=<?=$stat?>').fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1()
{
	var pno=$('#pgn').val();
	pagnt(pno);
}

function checkall(val)
{
	var j="";
	var chk=document.getElementsByName('chk[]');
	frmlen=chk.length;
	for(i=0;i<frmlen;i++)
	{
		chk[i].checked=val;
		if(i==0)
		{
			j=chk[i].value;
		}
		else
		{
		 	j=j+','+chk[i].value;
		}
	}
	if(!val)
    {
        document.getElementById('abc').value ="";
    }
    else
    {
		 document.getElementById('abc').value =j;
    }
}

function check1()
{
	var j="";
	var chk=document.getElementsByName('chk[]');
	frmlen=chk.length;
	for(i=0;i<frmlen;i++)
	{
		if(i==0)
		{
			if(chk[i].checked){j=chk[i].value;}
		}
		else
		{
		 	if(chk[i].checked){j=j+','+chk[i].value;}
		}
	}
	document.getElementById('abc').value=j;
}
</script>