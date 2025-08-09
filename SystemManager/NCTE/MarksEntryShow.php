<?php
$requirelevel=1;
include 'ActiveUsers.php';
if($userlevel==1){$User="AND eby='$eby'";}else{$User="";}
$sesn=$_REQUEST['sesn'];	if($sesn==""){$sesn1="";}else{$sesn1="AND sesn='$sesn'";}
$course=$_REQUEST['course'];	if($course==""){$course1="";}else{$course1="AND course='$course'";}
$CoursePackage=$_REQUEST['CoursePackage'];
$FullMarks=$_REQUEST['FullMarks'];

$sql=mysqli_query($con,"SELECT * FROM student_details WHERE sl>0 $sesn1 $course1 $User ORDER BY sl")or die(mysqli_error($con));
if(mysqli_num_rows($sql)>0)
{
	?>
    <div class="box box-success">
    <table class="table table-hover table-striped table-bordered">
    <tr>
        <td id="tblhed" style="width:5%;">Sl.</td>
        <td id="tblhed" style="width:10%;">Student ID</td>
        <td id="tblhed" style="width:10%;">Name</td>
        <td id="tblhed" style="width:25%;">Course</td>
        <td id="tblhed" style="width:15%;">Paper</td>
        <td id="tblhed" style="width:15%;">Marks</td>
    </tr>
    <?php
	$cnt=0;
	while($R=mysqli_fetch_array($sql))
	{
		$cnt++;
		$sid=$R['sid'];
		$snm=$R['snm'];
		?>
        <tr>
            <td id="tblbody"><?=$cnt;?></td>
            <td id="tblbody"><?=$sid;?></td>
            <td id="tblbody" width="20%"><?php echo $snm;?></td>
            <td id="tblbody" width="15%"><?=get_value('main_course','sl',$course,'course','',$con);?></td>
            <td id="tblbodynm"><?=get_value('coursepackage','sl',$CoursePackage,'PackageName','',$con);?></td>
            <td id="tblbodynm">
            <input type="text" name="ObtainMarks[]" id="ObtainMarks[]" value="" class="form-control" onclick="this.select()" onKeyPress="return check(event)" required />
            </td>
        </tr>
		<?php															
	}
	?>
    <tr>
        <td colspan="6" align="center"><input type="submit" value="Submit" class="btn btn-success" onclick="CheckObtainMarks()"></td>
    </tr>
    </table>
    </div>
	<?php
} else {?><center><b><h2><font color="#FF0000"><b>NO RECORD AVAILABLE</b></font></h2></b></center><?php }
?>