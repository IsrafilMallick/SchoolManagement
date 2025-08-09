<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$tblnm='main_section';

$Session=isset($_REQUEST['Session']) ? $_REQUEST['Session'] : '';
$Class=isset($_REQUEST['Class']) ? $_REQUEST['Class'] : '';
$SectionName=isset($_REQUEST['SectionName']) ? $_REQUEST['SectionName'] : '';

if($Session==""){$Session1="";}else{$Session1="AND Session='$Session'";}
if($Class==""){$Class1="";}else{$Class1="AND Class='$Class'";}
if($SectionName==""){$SectionName1="";}else{$SectionName1="AND SectionName='$SectionName'";}

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $Session1 $Class1 $SectionName1") or die(mysqli_error($con));
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
                    <th id="tblhed">Session</th>
                    <th id="tblhed">Class</th>
                    <th id="tblhed">Section</th>
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
                $Session=$R['Session'];
				$Class=$R['Class'];
				$SectionName=$R['SectionName'];
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
                    <td id="tblbody"><?=$Session?></td>
                    <td id="tblbody"><?=get_value('main_class','sl',$Class,'ClassName','',$con);?></td>
					
                    <td id="tblbody"><?=$SectionName?></td>
                    <td id="tblbody">
                    <a href="SectionSetup.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
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