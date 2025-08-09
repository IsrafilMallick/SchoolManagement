<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$scoolnm=rawurldecode($_REQUEST['scoolnm']);
$addr=rawurldecode($_REQUEST['addr']);
$mob=isset($_REQUEST['mob']) ? $_REQUEST['mob'] : '';
$disecode=isset($_REQUEST['disecode']) ? $_REQUEST['disecode'] : '';
$mpcode=isset($_REQUEST['mpcode']) ? $_REQUEST['mpcode'] : '';
$hscode=isset($_REQUEST['hscode']) ? $_REQUEST['hscode'] : '';
$mob=isset($_REQUEST['mob']) ? $_REQUEST['mob'] : '';
$email=rawurldecode($_REQUEST['email']);
$url=rawurldecode($_REQUEST['url']);

if($scoolnm==""){$scoolnm1="";}else{$scoolnm1="AND scoolnm LIKE '%$scoolnm%'";}
if($addr==""){$addr1="";}else{$addr1="AND addr LIKE '%$addr%'";}
if($mob==""){$mob1="";}else{$mob1="AND mob LIKE '%$mob%'";}
if($disecode==""){$disecode1="";}else{$disecode1="AND disecode LIKE '%$disecode%'";}
if($mpcode==""){$mpcode1="";}else{$mpcode1="AND mpcode LIKE '%$mpcode%'";}
if($hscode==""){$hscode1="";}else{$hscode1="AND hscode LIKE '%$hscode%'";}
if($email==""){$email1="";}else{$email1="AND email LIKE '%$email%'";}
if($url==""){$url1="";}else{$url1="AND url LIKE '%$url%'";}

$pno=isset($_REQUEST['pno']) ? $_REQUEST['pno'] : '';
$ps=isset($_REQUEST['ps']) ? $_REQUEST['ps'] : '';
if($ps==""){$ps=10;}
if($pno==""){$pno=1;}
$start=($pno-1)*$ps;

$sql=mysqli_query($con,"SELECT * FROM main_school WHERE sl>0 $scoolnm1 $addr1 $mob1 $disecode1 $mpcode1 $hscode1 $email1 $url1") or die(mysqli_error($con));
$rcntttl=mysqli_num_rows($sql);
$rcnt=$rcntttl;
$sql=mysqli_query($con,"SELECT * FROM main_school WHERE sl>0 $scoolnm1 $addr1 $mob1 $disecode1 $mpcode1 $hscode1 $email1 $url1 ORDER BY sl DESC LIMIT $start,$ps") or die(mysqli_error($con));
$count=mysqli_num_rows($sql);
if($count>0)
{
?>
<div align="left">
<input type="text" name="ps" id="ps" value="<?=$ps;?>" class="form-control" style="width:60px;" onclick="this.select();" onblur="pagnt1()">
</div>
<table class="table table-hover table-striped table-bordered" >
<tr>
    <td colspan="8" id="tblhedrecord">Total Record : <?=$rcnt;?></td>
</tr>
<tr>
    <td id="tblhed" style="width:5%;">Sl.</td>
    <td id="tblhed" style="width:30%;">School Name</td>
    <td id="tblhed" style="width:35%;">School Address</td>
    <td id="tblhed" style="width:20%;">Contact Details</td>
    <td id="tblhed" style="width:10%;">Actions</td>
</tr>
<?php
$cnt=0;
while($R=mysqli_fetch_array($sql))
{	
	$cnt++;
	$sl=$R['sl'];
  	$scoolnm=NameCase($R['scoolnm']);
	$address=NameCase($R['addr']);
	$mob=$R['mob'];
	$email=$R['email'];
	$address=NameCase($R['addr']);
	$urll=$R['url'];
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
       	<td id="tblbody"><?=$start+$cnt;?></td>
        <td id="tblbody"><?=$scoolnm;?></td>
        <td id="tblbody"><?=$address;?></td>
        <td id="tblbodynm"><?="<b>Mob :</b> $mob<br><b>Email :</b> $email<br><b>URL :</b> $urll";?></td>
        <td style="vertical-align:middle; text-align:center;">
        <a href="school_ntry.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
        <span id="show<?=$sl;?>">
        <a onclick="activation('<?=$sl;?>','show<?=$sl;?>','main_school','stat','<?=$class?>','<?=$btnnm?>','<?=$stat;?>','<?=$acttl;?>')" title="<?=$acttl;?>"><?=$actbtn;?></a>
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