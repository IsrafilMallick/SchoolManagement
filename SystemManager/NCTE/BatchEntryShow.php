<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$BatchName=isset($_REQUEST['BatchName']) ? $_REQUEST['BatchName'] : '';
if($BatchName==""){$BatchName1="";}else{$BatchName1="AND BatchName LIKE '%$BatchName%'";}

$table='main_batch';
$sql=mysqli_query($con,"SELECT * FROM $table WHERE sl>0 $BatchName1");
$rcnt=mysqli_num_rows($sql);
if($rcnt>0)
{
	?>
	<table class="table table-hover table-striped table-bordered">
    <tr>
    	<td colspan="3" id="tblhedrecord">Total Record : <?=$rcnt?></td>
	</tr>
	<tr>
		<td id="tblhed" style="width:10%;">Sl.</td>
		<td id="tblhed" style="width:60%;">Batch Name</td>
		<td id="tblhed" style="width:30%;">Actions</td>
	</tr>
	<?php
	$cnt=0;
	while($R=mysqli_fetch_array($sql))
	{
		$cnt++;
		$sl=$R['sl'];
		$BatchName=$R['BatchName'];
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
        	<td id="tblbody"><?=$BatchName?></td>
        	<td id="tblbody">
        	<a href="BatchEntry.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
            <span id="show<?=$sl;?>">
            <a onclick="activation('<?=$sl;?>','show<?=$sl;?>','<?=$table?>','stat','<?=$class?>','<?=$btnnm;?>','<?=$stat;?>','<?=$acttl;?>')" title="<?=$acttl;?>"><?=$actbtn;?></a>
            
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