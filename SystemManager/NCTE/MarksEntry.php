<?php
$requirelevel=1;
include 'ActiveUsers.php';
include "header.php";
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-clipboard fa-lg"></i> Marks Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Examination</li><li class="active"> Marks Entry</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="frmnm" id="frmnm" method="post" action="MarksEntrys.php">
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered">
<tr><td colspan="8"></td></tr>
<tr>
	<td id="tblhedrow" style="width:8%;"><font color="#FF0000" size="+1">*</font> Session :</td>
    <td id="tblbodynm" style="width:15%;">
    <select  id="sesn" name="sesn" class="form-control" onChange="GetCourse('CurrentCourseDiv','course',this.value,4)">
    <option value="">--- Select ---</option>				
    <?php
    for($i=$sesn; $i>=2020;$i--)
    {
        ?><option value="<?=$i;?>" <?=$i==$sesn ? 'selected' : ''?>><?=$i;?> - <?=$i+1;?></option><?php
    }
    ?>					                
    </select>
    </td>
    <td id="tblhedrow" style="width:10%;"><font color="#FF0000" size="+1">*</font> Course :</td>
    <td id="tblbodynm" style="width:15%;">
    <div id="CurrentCourseDiv">
    <select name="course" id="course" class="form-control" onChange="GetCoursePackage(this.value)" required>
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
    <td id="tblhedrow" style="width:10%;"><font color="#FF0000" size="+1">*</font> Paper :</td>
    <td id="tblbodynm" style="width:15%;">
    <div id="CoursePackageDiv">
    <select name="CoursePackage" id="CoursePackage" class="form-control" required>
    <option value="">--- Select ---</option>
    </select>
    </div>
    </td>
    <td id="tblhedrow" style="width:12%;"><font color="#FF0000" size="+1">*</font> Full Mark :</td>
    <td id="tblbodynm" style="width:15%;">
    <input type="text" name="FullMarks" id="FullMarks" class="form-control" onclick="this.select()" onKeyPress="return check(event)" required />
    </td>
</tr>
<tr>
	<td colspan="8" align="right"><input type="button" value=" Go " class="btn btn-info" onclick="show()"></td>
</tr>
</table>
</div>
<hr />
<div id="show"></div>
</form>
				</div>
			</section>
		</aside>
	</div>
</body>
</html>
<script>
function GetCourse(FieldDiv,FieldName,FieldValue,FunctionType)
{
	$('#'+FieldDiv).load('GetCourse.php?FieldName='+FieldName+'&sesn='+FieldValue+'&FunctionType='+FunctionType).fadeIn('fast');
}

function GetCoursePackage(course)
{
	var sesn=$('#sesn').val();
	$('#CoursePackageDiv').load('GetCoursePackage.php?&sesn='+sesn+'&course='+course).fadeIn('fast');
}

function show()
{
	var sesn=$('#sesn').val();
	var course=$('#course').val();
	var CoursePackage=$('#CoursePackage').val();
	var FullMarks=$('#FullMarks').val();
	$('#show').load('MarksEntryShow.php?sesn='+sesn+'&course='+course+'&CoursePackage='+CoursePackage+'&FullMarks='+FullMarks).fadeIn('fast');
}

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

/*
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
*/
function CheckObtainMarks()
{
	var FullMarks=$('#FullMarks').val();
	var ObtainMarks=document.getElementsByName('ObtainMarks[]');
	NumberOfStudent=ObtainMarks.length;

	for(var i=0; i<NumberOfStudent;i++)
	{
		var dfd=ObtainMarks[i];
		//alert(dfd);
	}
	/*
	if(ObtainMarks>FullMarks)
	{
		alert(FullMarks+' => '+ObtainMarks+' The Obtain Marks must be lesser than Full Marks');
	}
	*/
}
</script>