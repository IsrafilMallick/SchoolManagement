<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$tblnm="main_caste";

$caste=$_REQUEST['caste'];	
if($caste==""){$caste1="";}else{$caste1="AND caste LIKE '%$caste%'";}

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $caste1");
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
		<td id="tblhed" style="width:60%;">Caste</td>
		<td id="tblhed" style="width:30%;">Actions</td>
	</tr>
	<?php
	$cnt=0;
	while($R=mysqli_fetch_array($sql))
	{
		$cnt++;
		$sl=$R['sl'];
		$caste=$R['caste'];
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
        	<td id="tblbody"><?=$caste?></td>
        	<td id="tblbody">
            <a href="CasteEntry.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
            <span id="show<?=$sl;?>">
            <a onclick="activation('<?=$sl;?>','show<?=$sl;?>','<?=$tblnm?>','stat','<?=$class?>','<?=$btnnm?>','<?=$stat;?>','<?=$acttl;?>')" title="<?=$acttl;?>"><?=$actbtn;?></a>
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