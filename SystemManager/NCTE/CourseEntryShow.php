<?php
$requirelevel=0;
include 'ActiveUsers.php';
$table='main_course';

$course=$_REQUEST['course'];	
$eligibility=$_REQUEST['eligibility'];	
if($course==""){$course1="";}else{$course1="AND course LIKE '%$course%'";}
if($eligibility==""){$eligibility1="";}else{$eligibility1="AND eligibility='$eligibility'";}

$sql=mysqli_query($con,"SELECT * FROM $table WHERE sl>0 $course1 $eligibility1") or die(mysqli_error($con));
$rcnt=mysqli_num_rows($sql);
if($rcnt>0)
{
	?>
	<table class="table table-hover table-striped table-bordered">
    <tr>
    	<td colspan="5" id="tblhedrecord">Total Record : <?=$rcnt?></td>
	</tr>
	<tr>
		<td id="tblhed" style="width:5%;">Sl.</td>
		<td id="tblhed" style="width:40%;">Course</td>
		<td id="tblhed" style="width:15%;">Course Code</td>
		<td id="tblhed" style="width:20%;">Eligibility Criteria</td>
		<td id="tblhed" style="width:20%;">Actions</td>
	</tr>
	<?php
	$cnt=0;
	while($R=mysqli_fetch_array($sql))
	{
		$cnt++;
		$sl=$R['sl'];
		$course=$R['course'];
		$ccode=$R['ccode'];
		$eligibility=$R['eligibility'];
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
        	<td id="tblbody"><?=$cnt?></td>
        	<td id="tblbodynm"><?=$course?></td>
        	<td id="tblbody"><?=$ccode?></td>
        	<td id="tblbody"><?=$Eligibilitys[$eligibility];?></td>
        	<td id="tblbody">
            <a href="CourseEntry.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
            <span id="show<?=$sl;?>">
            <a onclick="activation('<?=$sl;?>','show<?=$sl;?>','<?=$table?>','stat','<?=$class?>','<?=$btnnm?>','<?=$stat;?>','<?=$acttl;?>')" title="<?=$acttl;?>"><?=$actbtn;?></a>
            </span>
            </td>
        </tr>
		<?php
	}
}
else
{
	?><center><b><h2><font color="#FF0000"><b>NO RECORD AVAILABLE</b></font></h2></b></center><?php
}
?>