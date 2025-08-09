<?php
include 'connect.php';
$sesn=isset($_REQUEST['sesn']) ? $_REQUEST['sesn'] : '';
$course=isset($_REQUEST['course']) ? $_REQUEST['course'] : '';
$batch=isset($_REQUEST['batch']) ? $_REQUEST['batch'] : '';
$Devider='';
$ReturnData='';
//echo "SELECT * FROM main_batch_setup WHERE sesn='$sesn' AND course='$course' AND batch='$batch' AND stat=0";
$sql=mysqli_query($con,"SELECT * FROM main_batch_setup WHERE sesn='$sesn' AND course='$course' AND batch='$batch' AND stat=0");
while($R=mysqli_fetch_array ($sql))
{
	if($ReturnData!=''){$Devider=' &nbsp;&nbsp;<i class="fa fa-users falg"></i>&nbsp;&nbsp; ';}
    $day=$R['day'];
    $time=$R['time'];
	
	$Time=date('h:i A', strtotime($time));
	$Day=$Days[$day];
	$ReturnData.="$Devider $Day => $Time";
}

echo $ReturnData;
?>