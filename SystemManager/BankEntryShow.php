<?php
$requirelevel=-1;
include 'ActiveUsers.php';
$tblnm='main_bankdata';

$BankName=isset($_REQUEST['BankName']) ? $_REQUEST['BankName'] : '';
$BranchName=isset($_REQUEST['BranchName']) ? $_REQUEST['BranchName'] : '';
$BranchAddress=isset($_REQUEST['BranchAddress']) ? $_REQUEST['BranchAddress'] : '';
$IfsCode=isset($_REQUEST['IfsCode']) ? $_REQUEST['IfsCode'] : '';
$MICRCode=isset($_REQUEST['MICRCode']) ? $_REQUEST['MICRCode'] : '';
$mob=isset($_REQUEST['mob']) ? $_REQUEST['mob'] : '';
$city=isset($_REQUEST['city']) ? $_REQUEST['city'] : '';
$dist=isset($_REQUEST['dist']) ? $_REQUEST['dist'] : '';
$state=isset($_REQUEST['state']) ? $_REQUEST['state'] : '';

if($BankName==""){$BankName1="";}else{$BankName1="AND BankName LIKE '%$BankName%'";}
if($BranchName==""){$BranchName1="";}else{$BranchName1="AND BranchName LIKE '%$BranchName%'";}
if($BranchAddress==""){$BranchAddress1="";}else{$BranchAddress1="AND BranchAddress LIKE '%$BranchAddress%'";}
if($IfsCode==""){$IfsCode1="";}else{$IfsCode1="AND IfsCode LIKE '%$IfsCode%'";}
if($MICRCode==""){$MICRCode1="";}else{$MICRCode1="AND MICRCode='$MICRCode'";}
if($mob==""){$mob1="";}else{$mob1="AND mob='$mob'";}
if($city==""){$city1="";}else{$city1="AND city LIKE '%$city%'";}
if($dist==""){$dist1="";}else{$dist1="AND dist LIKE '%$dist%'";}
if($state==""){$state1="";}else{$state1="AND state LIKE '%$state%'";}

$pno=isset($_REQUEST['pno']) ? $_REQUEST['pno'] : '';
$ps=isset($_REQUEST['ps']) ? $_REQUEST['ps'] : '';
if($ps==""){$ps=10;}
if($pno==""){$pno=1;}
$start=($pno-1)*$ps;

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $BankName1 $BranchName1 $BranchAddress1 $IfsCode1 $MICRCode1 $mob1 $city1 $dist1 $state1") or die(mysqli_error($con));
$rcntttl=mysqli_num_rows($sql);
$rcnt=$rcntttl;
$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $BankName1 $BranchName1 $BranchAddress1 $IfsCode1 $MICRCode1 $mob1 $city1 $dist1 $state1 ORDER BY sl ASC LIMIT $start,$ps") or die(mysqli_error($con));
$count=mysqli_num_rows($sql);
if($count>0)
{
	?>
	<div align="left">
    	<input sesne="text" name="ps" id="ps" value="<?=$ps;?>" class="form-control" onclick="this.select();" onblur="pagnt1()" style="width:80px;">
    </div>
    <div class="box box-success">
    <table class="table table-hover table-striped table-bordered">
    <tr id="tblhedrecord"><td colspan="8">Total Record : <?=$rcnt?></td></tr>
	<tr>
		<td id="tblhed">Sl.</td>
		<td id="tblhed">Bank Name</td>
		<td id="tblhed">Branch Name</td>
		<td id="tblhed">Branch Address</td>
		<td id="tblhed">IFS Code</td>
		<td id="tblhed">MICR Code</td>
		<td id="tblhed">Detail of City</td>
		<td id="tblhed">Action</td>
	</tr>
	<?php
	$cnt=0;
	while($R=mysqli_fetch_array($sql))
	{
		$cnt++;
		$sl=$R['sl'];
		$BankName=NameCase($R['BankName']);
		$BranchName=NameCase($R['BranchName']);
		$BranchAddress=NameCase($R['BranchAddress']);
		$IfsCode=$R['IfsCode'];
		$MICRCode=$R['MICRCode'];
		$mob=$R['mob'];
		$city=NameCase($R['city']);
		$dist=NameCase($R['dist']);
		$state=NameCase($R['state']);
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
        	<td id="tblbody"><?=$BankName?></td>
        	<td id="tblbody"><?=$BranchName?></td>
        	<td id="tblbody"><?=$BranchAddress?></td>
        	<td id="tblbody"><?=$IfsCode?></td>
        	<td id="tblbody"><?=$MICRCode?></td>
        	<td id="tblbody"><?="$city, $dist, $state, Contact No. - $mob";?></td>
        	<td id="tblbody">
        	<a href="BankEntry.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
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