<?php
$requirelevel=0;
include 'ActiveUsers.php';
$tblnm='main_course_setup';
	
$sesn=isset($_REQUEST['sesn']) ? $_REQUEST['sesn'] : '';
$course=isset($_REQUEST['course']) ? $_REQUEST['course'] : '';
$duration=isset($_REQUEST['duration']) ? $_REQUEST['duration'] : '';
$CourseFees=isset($_REQUEST['CourseFees']) ? $_REQUEST['CourseFees'] : '';
$CoursePackage=isset($_REQUEST['CoursePackage']) ? $_REQUEST['CoursePackage'] : '';

if($sesn==""){$sesn1="";}else{$sesn1="AND sesn='$sesn'";}
if($course==""){$course1="";}else{$course1="AND course='$course'";}
if($duration==""){$duration1="";}else{$duration1="AND duration='$duration'";}
if($CourseFees==""){$CourseFees1="";}else{$CourseFees1="AND CourseFees='$CourseFees'";}
if($CoursePackage==""){$CoursePackage1="";}else{$CoursePackage1="AND CoursePackage='$CoursePackage'";}

$cnt=0;
$pno=isset($_REQUEST['pno']) ? $_REQUEST['pno'] : '';
$ps=isset($_REQUEST['ps']) ? $_REQUEST['ps'] : '';
if($ps==""){$ps=10;}
if($pno==""){$pno=1;}
$start=($pno-1)*$ps;

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $sesn1 $course1 $duration1 $CourseFees1 $CoursePackage1") or die(mysqli_error($con));
$rcntttl=mysqli_num_rows($sql);
$rcnt=$rcntttl;
$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $sesn1 $course1 $duration1 $CourseFees1 $CoursePackage1 ORDER BY sl DESC LIMIT $start,$ps") or die(mysqli_error($con));
$count=mysqli_num_rows($sql);
if($count>0)
{
?>
<div align="left">
<input sesne="text" name="ps" id="ps" value="<?=$ps;?>" class="form-control" onclick="this.select();" onblur="pagnt1(this.value)" style="width:80px;">
</div>
<div class="box box-success">
<table class="table table-hover table-striped table-bordered">
<tr id="tblhedrecord"><td colspan="7">Total Record : <?=$rcnt?></td></tr>
<tr>
    <td id="tblhed">Sl No</td>
    <td id="tblhed">Session</td>
    <td id="tblhed">Course Name</td>
    <td id="tblhed">Duration (In Month)</td>
    <td id="tblhed">Course Fees</td>
    <td id="tblhed">Course Package</td>
    <td id="tblhed">Action</td>
</tr>
<?php
$cnt=0;
while($R=mysqli_fetch_array($sql))
{
	$cnt++;
	$sl=$R['sl'];
    $sesn=$R['sesn'];
    $course=$R['course'];
    $duration=$R['duration'];
    $CourseFees=$R['CourseFees'];
    $CoursePackage=explode(',',$R['CoursePackage']);
	$stat=$R['stat'];
	if($stat==1)
	{
		$btnnm="Active";
		$class="fa fa-eye-slash fa-lg";
		$acttl="Click to $btnnm";
		$actbtn="<i class='$class'></i>";
	}
	else
	{
		$btnnm="Deactive";
		$class="fa fa-eye fa-lg";
		$acttl="Click to $btnnm";
		$actbtn="<i class='$class'></i>";
	}
	?>
	<tr>
		<td id="tblbody"><?php echo $start+$cnt;?></td>
		<td id="tblbody"><?php echo $sesn;?> - <?php echo $sesn+1;?></td>
		<td id="tblbody"><?php echo get_value('main_course','sl',$course,'course','',$con);?></td>
		<td id="tblbody"><?php echo $duration;?></td>
		<td id="tblbody"><i class="fa fa-inr"></i> <?php echo number_format($CourseFees,2);?>/-</td>
		<td id="tblbodynm">
		<?php
		$SerialNo=0;
		foreach($CoursePackage as $CoursePackageSerial)
		{
			$SerialNo++;
			echo "$SerialNo".". ".get_value('coursepackage','sl',$CoursePackageSerial,'PackageName','',$con)."<br>";
		}
		?>
        </td>
		<td id="tblbody">
        <a href="course_setup.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
        <span id="show<?=$sl;?>">
        <a onclick="activation('<?=$sl;?>','show<?=$sl;?>','<?=$tblnm?>','stat','<?=$class?>','<?=$btnnm?>','<?=$stat;?>','<?=$acttl;?>')" title="<?=$acttl;?>"><?=$actbtn;?></a>
        </span>
		</td>
	</tr>
	<?php															
}
?>
</table>
<?php
$tp=$rcnt/$ps;
if(($rcnt%$ps)>0)
{
    $tp=floor($tp)+1;
}
if($pno==1)
{
    $prev=1;
}
else
{
$prev=$pno-1;    
}
if($pno==$tp)
{
 $next=$tp;   
}
else
{
$next=$pno+1;
}
$flt="";
if($rcnt!=$rcntttl)
{
    $flt="(filtered from ".$rcntttl." total entries)";
}
$to=$start+$cnt;
if($rcnt<$ps)
{
	$to=$rcnt;
}
?>
<center>
	<div class="pagination pagination-centered" style="cursor:pointer;">
		<font color="#FF0000"><center><b>Showing <?=$start+1;?> to <?=$to;?> of <?=$rcnt;?> entries <?=$flt?></b></center></font>
		<table style="width:150px; border:none;">
        <tr>
            <td>
                <div class="input-group margin">
                    <input type="text" id="pgn" name="pgn" value="<?=$pno;?>" class="form-control" style="text-align:center;" onclick="this.select();">
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="button" id="srchbtn" onclick="pagnt1()"><b>Go</b></button>
                    </span>
                </div>
            </td>
        </tr>
        </table>
        <ul class="pagination pagination-sm inline">
            <li <?php if($pno==1){?>class="disabled"<?php }?>><a onclick="pagnt('1')"><i class="icon-circle-arrow-left"></i>First</a></li>
            <li <?php if($pno==1){?>class="disabled"<?php }?>><a onclick="pagnt('<?=$prev;?>')"><i class="icon-circle-arrow-left"></i>Previous</a></li>
            <?php
            if($tp<=5)
            {
                $n=1;  
                while($n<=$tp)
                {
                ?><li <?php if($pno==$n){?>class="active";<?php }?>><a onclick="pagnt('<?=$n;?>')"><?=$n;?></a></li><?php
                $n+=1;
                }  
            }
            else
            {
                if($pno<4)
                {
                    $n=1;
                    while($n<=5)
                    {
                        ?><li <?php if($pno==$n){?>class="active";<?php }?>><a onclick="pagnt('<?=$n;?>')"><?=$n;?></a></li><?php
                        $n+=1;
                    }     
                }
                else
                if($pno>$tp-3)
                {
                    $n=$tp-5;
                    while($n<=5)
                    {
                        ?><li <?php if($pno==$n){?>class="active";<?php }?>><a onclick="pagnt('<?=$n;?>')"><?=$n;?></a></li><?php
                        $n+=1;
                    }   
                }
                else
                {
                    $n=$pno-2; 
                    while($n<=$pno+2)
                    {
                        ?><li <?php if($pno==$n){?>class="active";<?php }?>><a onclick="pagnt('<?=$n;?>')"><?=$n;?></a></li><?php
                        $n+=1;
                    }     
                }
            }
            ?>
            <li <?php if($pno==$tp){?>class="disabled"<?php }?>><a onclick="pagnt('<?=$next;?>')">Next<i class="icon-circle-arrow-right"></i></a></li>
            <li <?php if($pno==$tp){?>class="disabled"<?php }?>><a onclick="pagnt('<?=$tp;?>')">Last<i class="icon-circle-arrow-right"></i></a></li>
        </ul>
	</div>
</center>
<?php
} else {?><center><b><h2><font color="#FF0000"><b>NO RECORD AVAILABLE</b></font></h2></b></center><?php }
?>