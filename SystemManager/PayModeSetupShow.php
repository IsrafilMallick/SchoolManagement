<?php
$requirelevel=0;
include 'ActiveUsers.php';
$table="main_paymode_setup";

$PayMode=$_REQUEST['PayMode'];
$GroupSerial=$_REQUEST['GroupSerial'];
$LedgerHead=$_REQUEST['LedgerHead'];
if($PayMode==""){$PayMode1='';}else{$PayMode1="AND PayMode LIKE '%$PayMode%'";}
if($GroupSerial==""){$GroupSerial1='';}else{$GroupSerial1="AND GroupSerial='$GroupSerial'";}
if($LedgerHead==""){$LedgerHead1='';}else{$LedgerHead1="AND LedgerHead='$LedgerHead'";}

$cnt=0;
$pno=isset($_REQUEST['pno']) ? $_REQUEST['pno'] : '';
$ps=isset($_REQUEST['ps']) ? $_REQUEST['ps'] : '';
if($ps==""){$ps=10;}
if($pno==""){$pno=1;}
$start=($pno-1)*$ps;

$sql=mysqli_query($con,"SELECT * FROM $table WHERE sl>0 $PayMode1 $GroupSerial1 $LedgerHead1 ORDER BY PayMode, sl") or die(mysqli_error($con));
$rcntttl=mysqli_num_rows($sql);
$rcnt=$rcntttl;
$sql=mysqli_query($con,"SELECT * FROM $table WHERE sl>0 $PayMode1 $GroupSerial1 $LedgerHead1 ORDER BY PayMode, sl limit $start,$ps") or die(mysqli_error($con));
if(mysqli_num_rows($sql)>0)
{
	?>
	<div align="left">
	<input type="text" name="ps" id="ps" value="<?=$ps;?>" class="form-control" onclick="this.select();" onblur="pagnt1(this.value)" style="width:80px;">
	</div>
    <table class="table table-hover table-striped table-bordered">
    <tr>
        <td colspan="5" id="tblhedrecord">Total Existing Heads : <?=$rcnt?></td>
    </tr>
    <tr>
        <td id="tblhed" style="width:5%;">Sl.</td>
        <td id="tblhed" style="width:25%;">Pay Mode</td>
        <td id="tblhed" style="width:25%;">Group Head</td>
        <td id="tblhed" style="width:30%;">Ledger Head</td>
        <td id="tblhed" style="width:15%;">Actions</td>
    </tr>
    <?php
    $cnt=0;
    while($R=mysqli_fetch_array ($sql))
    {
        $cnt+=1;
        $sl=$R['sl'];
        $PayMode=$R['PayMode'];
        $GroupSerial=$R['GroupSerial'];
        $LedgerHead=$R['LedgerHead'];
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
            <td id="tblbody"><?=get_value('main_paymode','sl',$PayMode,'PayMode','',$con);?></td>
            <td id="tblbody"><?=get_value('account_group','sl',$GroupSerial,'GroupName','',$con);?></td>
            <td id="tblbody"><?=get_value('account_ledg','sl',$LedgerHead,'LedgerName','',$con);?></td>
            <td id="tblbody">
            <a href="PayModeSetup.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
            <span id="show<?=$sl;?>">
            <a onclick="activation('<?=$sl;?>','show<?=$sl;?>','<?=$table?>','stat','<?=$class?>','<?=$btnnm?>','<?=$stat;?>','<?=$acttl;?>')" title="<?=$acttl;?>"><?=$actbtn;?></a>
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