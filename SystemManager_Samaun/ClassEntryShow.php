<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$tblnm='main_class';

$ClassName=isset($_REQUEST['ClassName']) ? $_REQUEST['ClassName'] : '';
if($ClassName==""){$ClassName1="";}else{$ClassName1="AND ClassName LIKE '%$ClassName%'";}

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $ClassName1");
$rcnt=mysqli_num_rows($sql);
if($rcnt>0)
{
	?>
    <div class="card">
        <div class="card-header">
        	<h3 class="card-title" id="tblhedrecord">Total Records : <?=$rcnt?></h3>
        </div>
      	<div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed table-hover table-bordered text-nowrap">
            <thead>
                <tr>
                    <th id="tblhed">Sl No.</th>
                    <th id="tblhed">Class Name</th>
                    <th id="tblhed">Actions</th>
                </tr>
            </thead>
            <tbody>
			<?php
            $cnt=0;
            while($R=mysqli_fetch_array($sql))
            {
                $cnt++;
                $sl=$R['sl'];
                $ClassName=$R['ClassName'];
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
                    <td id="tblbody"><?=$ClassName?></td>
                    <td id="tblbody">
                    <a href="ClassEntry.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
                    <span id="show<?=$sl;?>">
                    <a onclick="activation('<?=$sl;?>','show<?=$sl;?>','<?=$tblnm?>','stat','<?=$class?>','<?=$btnnm;?>','<?=$stat;?>','<?=$acttl;?>')" title="<?=$acttl;?>" style="cursor:pointer;"><?=$actbtn;?></a>
                    </span>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        	</table>
    	</div>
	</div>
<?php
}
else
{
	?><center><b><h2><font color="#FF0000"><b>NO RECORD AVAILABLE</b></font></h2></b></center><?php
}
?>