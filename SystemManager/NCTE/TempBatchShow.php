<?php
$requirelevel=0;
$stat=isset($_REQUEST['stat']) ? $_REQUEST['stat'] : '';
if($stat=='1'){include("ActiveUsers.php");}
$tblnm='temp_batch_setup';

$sesn=isset($_REQUEST['sesn']) ? $_REQUEST['sesn'] : '';
$course=isset($_REQUEST['course']) ? $_REQUEST['course'] : '';
$batch=isset($_REQUEST['batch']) ? $_REQUEST['batch'] : '';
$day=isset($_REQUEST['day']) ? $_REQUEST['day'] : '';
$time=isset($_REQUEST['time']) ? $_REQUEST['time'] : '';

if($sesn==""){$sesn1="";}else{$sesn1="AND sesn='$sesn'";}
if($course==""){$course1="";}else{$course1="AND course='$course'";}
if($batch==""){$batch1="";}else{$batch1="AND batch='$batch'";}
if($day==""){$day1="";}else{$day1="AND day='$day'";}
if($time==""){$time1="";}else{$time1="AND time='$time'";}

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE eby='$eby' $sesn1 $course1 $batch1 ORDER BY sl") or die(mysqli_error($con));
if(mysqli_num_rows($sql)>0){
?>
<table border="1" style="width:100%;">
<tr style="background-color:#FFCC99;">
    <td id="tblhed">Sl</td>
    <td id="tblhed">Session</td>
    <td id="tblhed">Course Name</td>
    <td id="tblhed">Batch Name</td>
    <td id="tblhed">Day</td>
    <td id="tblhed">Time</td>
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
    $batch=$R['batch'];
    $day=$R['day'];
    $time=$R['time'];
	?>
	<tr>
    <td id="tblbody"><?php echo $cnt;?></td>
	<td id="tblbody"><?php echo $sesn;?> - <?php echo $sesn+1;?></td>
	<td id="tblbody"><?php echo get_value('main_course','sl',$course,'course','',$con);?></td>
	<td id="tblbody"><?php echo get_value('main_batch','sl',$batch,'BatchName','',$con);?></td>
	<td id="tblbody"><?php echo $Days[$day];?></td>
	<td id="tblbody"><?php echo $time;?></td>
	<td id="tblbody">
	<i class="fa fa-trash-o fa-lg" style="color:#F00; cursor:pointer;" onclick="del('<?=$tblnm;?>','sl','<?=$sl;?>')" title="Click to Delete"></i>
	</td>
	</tr>
	<?php
}
?>
</table>
<?php }?>