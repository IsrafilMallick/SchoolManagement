<?php
$requirelevel=3;
include 'ActiveUsers.php';
$tblnm="main_fees_head";

$GroupSerial=isset($_REQUEST['GroupSerial']) ? $_REQUEST['GroupSerial'] : '';
$FeesHead=isset($_REQUEST['FeesHead']) ? $_REQUEST['FeesHead'] : '';
$FeesType=isset($_REQUEST['FeesType']) ? $_REQUEST['FeesType'] : '';

if($GroupSerial==""){$GroupSerial1="";}else{$GroupSerial1="AND GroupSerial='$GroupSerial'";}
if($FeesType==""){$FeesType1="";}else{$FeesType1="AND FeesType='$FeesType'";}
if($FeesHead==""){$FeesHead1="";}else{$FeesHead1="AND FeesHead LIKE '%$FeesHead%'";}

$pno=isset($_REQUEST['pno']) ? $_REQUEST['pno'] : '';
$ps=isset($_REQUEST['ps']) ? $_REQUEST['ps'] : '';
if($ps==""){$ps=15;}
if($pno==""){$pno=1;}
$start=($pno-1)*$ps;

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $GroupSerial1 $FeesHead1 $FeesType1 ORDER BY GroupSerial, sl")or die(mysqli_error($con));
$rcntttl=mysqli_num_rows($sql);
$rcnt=$rcntttl;
$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $GroupSerial1 $FeesHead1 $FeesType1 ORDER BY GroupSerial, sl LIMIT $start,$ps")or die(mysqli_error($con));
$count=mysqli_num_rows($sql);
if($count>0)
{
	?>
	<div align="left">
		<input type="text" name="ps" id="ps" value="<?=$ps;?>" class="form-control" onclick="this.select();" onblur="pagnt1(this.value)" style="width:80px;">
	</div>
    <div class="box box-success">
    <table class="table table-hover table-striped table-bordered">
    <tr>
        <td colspan="6" id="tblhedrecord">Total Existing Heads : <?=$rcnt?></td>
    </tr>
    <tr>	
        <td id="tblhed">Sl.</td>
        <td id="tblhed">Primary Account</td>
        <td id="tblhed">Account Group</td>
        <td id="tblhed">Fees Type</td>
        <td id="tblhed">Fees Head</td>
        <td id="tblhed" style="width:20%;">Actions</td>
    </tr>
    <?php
    $cnt=0;
    while($R=mysqli_fetch_array($sql))
    {
        $cnt++;
        $sl=$R['sl'];
        $PrimarySerial=$R['PrimarySerial'];
        $GroupSerial=$R['GroupSerial'];
        $FeesHead=$R['FeesHead'];
        $FeesType=$R['FeesType'];
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
            <td id="tblbody"><?=get_value('account_primary','sl',$PrimarySerial,'PrimaryName','',$con);?></td>
            <td id="tblbody"><?=get_value('account_group','sl',$GroupSerial,'GroupName','',$con);?></td>
            <td id="tblbody"> <?=$FeesTypes[$FeesType];?></td>
            <td id="tblbody"> <?=$FeesHead;?></td>
            <td id="tblbody">
            <a href="FeesHeadSetup.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
            <span id="show<?=$sl;?>">
            <a onclick="activation('<?=$sl;?>','show<?=$sl;?>','<?=$tblnm?>','stat','<?=$class?>','<?=$btnnm;?>','<?=$stat;?>','<?=$acttl;?>')" title="<?=$acttl;?>"><?=$actbtn;?></a>
            </span>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
	</div>
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