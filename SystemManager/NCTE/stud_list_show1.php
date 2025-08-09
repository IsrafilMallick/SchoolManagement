<?php
$requirelevel=1;
include 'ActiveUsers.php';
if($userlevel==1){$User="AND eby='$eby'";}else{$User="";}



$sesn=$_REQUEST['sesn'];	if($sesn==""){$sesn1="";}else{$sesn1="AND sesn='$sesn'";}
$course=$_REQUEST['course'];	if($course==""){$course1="";}else{$course1="AND course='$course'";}
$gender=$_REQUEST['gender'];	if($gender==""){$gender1="";}else{$gender1="AND gender='$gender'";}
$caste=$_REQUEST['caste'];	if($caste==""){$caste1="";}else{$caste1="AND caste='$caste'";}
$religion=$_REQUEST['religion'];	if($religion==""){$religion1="";}else{$religion1="AND religion='$religion'";}
$srch=rawurldecode($_REQUEST['srch']);
$stat=$_REQUEST['stat'];
if($srch=="")
{
	$allsrch="";
}
else
{
	$allsrch="AND (asesn LIKE '%$srch%' OR adt LIKE '%$srch%' OR acourse LIKE '%$srch%' OR pdt LIKE '%$srch%' OR sesn LIKE '%$srch%' OR course LIKE '%$srch%' OR pmgid LIKE '%$srch%' OR sid LIKE '%$srch%' OR snm LIKE '%$srch%' OR dob LIKE '%$srch%' OR gender LIKE '%$srch%' OR caste LIKE '%$srch%' OR religion LIKE '%$srch%' OR quali LIKE '%$srch%' OR job LIKE '%$srch%' OR mob LIKE '%$srch%' OR email LIKE '%$srch%' OR aadharno LIKE '%$srch%' OR epicno LIKE '%$srch%' OR fnm LIKE '%$srch%' OR fql LIKE '%$srch%' OR fjob LIKE '%$srch%' OR fmob LIKE '%$srch%' OR mnm LIKE '%$srch%' OR mql LIKE '%$srch%' OR mjob LIKE '%$srch%' OR mmob LIKE '%$srch%' OR gnm LIKE '%$srch%' OR gql LIKE '%$srch%' OR gjob LIKE '%$srch%' OR gmob LIKE '%$srch%' OR reltn LIKE '%$srch%' OR vill LIKE '%$srch%' OR po LIKE '%$srch%' OR ps LIKE '%$srch%' OR dist LIKE '%$srch%' OR state LIKE '%$srch%' OR pin LIKE '%$srch%' OR vill1 LIKE '%$srch%' OR po1 LIKE '%$srch%' OR ps1 LIKE '%$srch%' OR dist1 LIKE '%$srch%' OR state1 LIKE '%$srch%' OR pin1 LIKE '%$srch%' OR school LIKE '%$srch%' OR cls LIKE '%$srch%' OR sec LIKE '%$srch%' OR roll LIKE '%$srch%' OR banknm LIKE '%$srch%' OR branchnm LIKE '%$srch%' OR branchaddr LIKE '%$srch%' OR ifsc LIKE '%$srch%' OR micr LIKE '%$srch%' OR acno LIKE '%$srch%' OR eby LIKE '%$srch%')";
}

$pno=isset($_REQUEST['pno']) ? $_REQUEST['pno'] : '';
$ps=isset($_REQUEST['ps']) ? $_REQUEST['ps'] : '';
if($ps==""){$ps=10;}
if($pno==""){$pno=1;}
$start=($pno-1)*$ps;

$sql=mysqli_query($con,"SELECT * FROM student_details WHERE stat='$stat' $sesn1 $course1 $gender1 $caste1 $religion1 $allsrch $User ORDER BY sl")or die(mysqli_error($con));
$rcntttl=mysqli_num_rows($sql);
$rcnt=$rcntttl;
$sql=mysqli_query($con,"SELECT * FROM student_details WHERE stat='$stat' $sesn1 $course1 $gender1 $caste1 $religion1 $allsrch $User ORDER BY sl LIMIT $start,$ps") or die(mysqli_error($con));
if(mysqli_num_rows($sql)>0)
{
?>
    <div align="left">
    <input type="text" name="ps" id="ps" value="<?=$ps;?>" class="form-control" onclick="this.select();" onblur="pagnt1()" style="width:80px;">
    </div>
    <div class="box box-success">
    <table class="table table-hover table-striped table-bordered">
    <tr id="tblhedrecord"><td colspan="6">Total Record : <?=$rcnt?></td></tr>
    <tr>
        <td id="tblhed">Sl.</td>
        <td id="tblhed" style="width:20%;">Student ID</td>
        <td id="tblhed" style="width:20%;">Name</td>
        <td id="tblhed" style="width:20%;">Contacts</td>
        <td id="tblhed" style="width:20%;">Category</td>
        <td id="tblhed" style="width:20%;">Course Detail</td>
    </tr>
    <?php
	$cnt=0;
    while($R=mysqli_fetch_array($sql))
    {
        $cnt++;
        $sl=$R['sl'];
        $asesn=$R['asesn'];
        $adt=$R['adt'];		if($adt==""||$adt=="0000-00-00"){$adt="";}else{$adt=date('d-m-Y', strtotime($adt));}
        $acourse=$R['acourse'];
        $pdt=$R['pdt'];	if($pdt==""||$pdt=="0000-00-00"){$pdt="";}else{$pdt=date('d-m-Y', strtotime($pdt));}
        $sesn=$R['sesn'];
        $course=$R['course'];
        $sid=$R['sid'];
        $snm=$R['snm'];
        $dob=$R['dob'];	if($dob==""||$dob=="0000-00-00"){$dob="";}else{$dob=date('d-m-Y', strtotime($dob));}
        $gender=$R['gender'];
        $caste=$R['caste'];
        $religion=$R['religion'];
        $quali=$R['quali'];
        $job=$R['job'];
        $mob=$R['mob'];
        $email=$R['email'];
        $aadharno=$R['aadharno'];
        $epicno=$R['epicno'];
        $fnm=$R['fnm'];
        $fql=$R['fql'];
        $fjob=$R['fjob'];
        $fmob=$R['fmob'];
        $mnm=$R['mnm'];
        $mql=$R['mql'];
        $mjob=$R['mjob'];
        $mmob=$R['mmob'];
        $gnm=$R['gnm'];
        $gql=$R['gql'];
        $gjob=$R['gjob'];
        $gmob=$R['gmob'];
        $reltn=$R['reltn'];
        $vill=$R['vill'];
        $po=$R['po'];
        $ps1=$R['ps'];
        $dist=$R['dist'];
        $state=$R['state'];
        $pin=$R['pin'];
        $school=$R['school'];
        $cls=$R['cls'];
        $sec=$R['sec'];
        $roll=$R['roll'];
        $banknm=$R['banknm'];
        $branchnm=$R['branchnm'];
        $branchaddr=$R['branchaddr'];
        $ifsc=$R['ifsc'];
        $micr=$R['micr'];
        $acno=$R['acno'];
        
        $img="StudImg/$sid.jpg";
        if(!file_exists($img)){$img="pic/blank_profile.png";}
        ?>
        <tr id="tblbodylink" onclick="show_id('<?=$sid;?>')">
            <td id="tblbody"><?=$cnt+$start;?></td>
            <td id="tblhed"><img src="<?=$img?>" height="81"><br><?=$sid;?></td>
            <td id="tblbody" width="20%"><b><?php echo $snm;?></b><br><?php echo $fnm;?><br><?php echo $mnm;?><br><?php echo $gnm;?></td>
            <td id="tblbody" width="15%">
            <?php echo $vill;?>, <?php echo $po;?>, <?php echo $ps1;?>, <?php echo $dist;?>, <?php echo $state;?>, <?php echo $pin;?><br>
            <b>Mob:</b> <?php echo $fmob;?>, <?php echo $mmob;?>
            </td>
            <td id="tblbodynm">
            <b>DOB:</b> <?php echo $dob;?><br>
            <b>Gender:</b> <?=get_value('main_gender','sl',$gender,'gender','',$con);?><br>
            <b>Caste:</b> <?=get_value('main_caste','sl',$caste,'caste','',$con);?><br>
            <b>Religion:</b> <?=get_value('main_religion','sl',$religion,'religion','',$con);?><br>
            </td>
            <td id="tblbodynm">
            <b>Course:</b> <?php echo get_value('main_course','sl',$course,'course','',$con);?><br>
            <b>Adm Dt:</b> <?php echo $adt;?><br>
            <b>Promo Dt:</b> <?php echo $pdt;?><br>
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