<?php
$requirelevel=1;
include 'ActiveUsers.php';
$tblnm='main_student_data';
/*
var CurrentSession=$('#CurrentSession').val();
	var CurrentClass=$('#CurrentClass').val();
	var CurrentSection=$('#CurrentSection').val();
	var Gender=$('#Gender').val();
	var Caste=$('#Caste').val();
	var Religion=$('#Religion').val();
	*/


if($userlevel==1){$User="AND eby='$eby'";}else{$User="";}
$CurrentSession=$_REQUEST['CurrentSession'];	if($CurrentSession==""){$CurrentSession1="";}else{$CurrentSession1="AND CurrentSession='$CurrentSession'";}
$CurrentClass=$_REQUEST['CurrentClass'];	if($CurrentClass==""){$CurrentClass1="";}else{$CurrentClass1="AND CurrentClass='$CurrentClass'";}
$CurrentSection=$_REQUEST['CurrentSection'];	if($CurrentSection==""){$CurrentSection1="";}else{$CurrentSection1="AND CurrentSection='$CurrentSection'";}
$srch=rawurldecode($_REQUEST['Search']);
if($srch=="")
{
	$AllSearch="";
}
else
{
	$AllSearch="AND (StudentID LIKE '%$srch%' OR AdmissionSession LIKE '%$srch%' OR AdmissionClass LIKE '%$srch%' OR AdmissionSection LIKE '%$srch%' OR AdmissionDate LIKE '%$srch%' OR CurrentSession LIKE '%$srch%' OR CurrentClass LIKE '%$srch%' OR CurrentSection LIKE '%$srch%' OR CurrentRollNo LIKE '%$srch%' OR StudentName LIKE '%$srch%' OR BirthDate LIKE '%$srch%' OR Gender LIKE '%$srch%' OR Caste LIKE '%$srch%' OR Religion LIKE '%$srch%' OR AadharNo LIKE '%$srch%' OR FatherName LIKE '%$srch%' OR FatherQualification LIKE '%$srch%' OR FatherOccupation LIKE '%$srch%' OR FatherMobile LIKE '%$srch%' OR MotherName LIKE '%$srch%' OR MotherQualification LIKE '%$srch%' OR MotherOccupation LIKE '%$srch%' OR MotherMobile LIKE '%$srch%' OR GuardianName LIKE '%$srch%' OR GuardianQualification LIKE '%$srch%' OR GuardianOccupation LIKE '%$srch%' OR GuardianMobile LIKE '%$srch%' OR GuardianRelation LIKE '%$srch%' OR PermanentVillage LIKE '%$srch%' OR PermanentPostOffice LIKE '%$srch%' OR PermanentPoliceStation LIKE '%$srch%' OR PermanentDistrict LIKE '%$srch%' OR PermanentState LIKE '%$srch%' OR PermanentPin LIKE '%$srch%' OR ResidentVillage LIKE '%$srch%' OR ResidentPostOffice LIKE '%$srch%' OR ResidentPoliceStation LIKE '%$srch%' OR ResidentDistrict LIKE '%$srch%' OR ResidentState LIKE '%$srch%' OR ResidentPin LIKE '%$srch%' OR BankName LIKE '%$srch%' OR BranchName LIKE '%$srch%' OR BranchAddress LIKE '%$srch%' OR BranchIFSC LIKE '%$srch%' OR BranchMICR LIKE '%$srch%' OR AccountNo LIKE '%$srch%')";
}

$pno=isset($_REQUEST['pno']) ? $_REQUEST['pno'] : '';
$ps=isset($_REQUEST['ps']) ? $_REQUEST['ps'] : '';
if($ps==""){$ps=10;}
if($pno==""){$pno=1;}
$start=($pno-1)*$ps;

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $CurrentSession1 $CurrentClass1 $CurrentSection1 $AllSearch $User ORDER BY sl")or die(mysqli_error($con));
$rcntttl=mysqli_num_rows($sql);
$rcnt=$rcntttl;
$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $CurrentSession1 $CurrentClass1 $CurrentSection1 $AllSearch $User ORDER BY sl LIMIT $start,$ps") or die(mysqli_error($con));
if(mysqli_num_rows($sql)>0)
{
	?>
    <div align="left">
    <input type="text" name="ps" id="ps" value="<?=$ps;?>" class="form-control" onclick="this.select();" onblur="pagnt1()" style="width:80px;">
    </div>
    <div class="box box-success">
    <table class="table table-hover table-striped table-bordered">
    <tr id="tblhedrecord"><td colspan="7">Total Record : <?=$rcnt?></td></tr>
    <tr>
        <td id="tblhed" style="width:5%;">Sl.<br /><input type="checkbox" name="chkall" onchange="checkall(this.checked)"/></td>
        <td id="tblhed" style="width:10%;">Student ID</td>
        <td id="tblhed" style="width:10%;">Name</td>
        <td id="tblhed" style="width:25%;">Contacts</td>
        <td id="tblhed" style="width:15%;">Category</td>
        <td id="tblhed" style="width:15%;">Class Detail</td>
        <td id="tblhed" style="width:15%;">Action</td>
    </tr>
    <?php
	$cnt=0;
	while($R=mysqli_fetch_array($sql))
	{
		$cnt++;
		$sl=$R['sl'];
		$StudentID=$R['StudentID'];
		$AdmissionSession=$R['AdmissionSession'];
		$AdmissionClass=$R['AdmissionClass'];
		$AdmissionSection=$R['AdmissionSection'];
		$AdmissionDate=$R['AdmissionDate'];
		$CurrentSession=$R['CurrentSession'];
		$CurrentClass=$R['CurrentClass'];
		$CurrentSection=$R['CurrentSection'];
		$CurrentRollNo=$R['CurrentRollNo'];
		$StudentName=$R['StudentName'];
		$BirthDate=$R['BirthDate'];
		$Gender=$R['Gender'];
		$Caste=$R['Caste'];
		$Religion=$R['Religion'];
		$AadharNo=$R['AadharNo'];
		$FatherName=$R['FatherName'];
		$FatherQualification=$R['FatherQualification'];
		$FatherOccupation=$R['FatherOccupation'];
		$FatherMobile=$R['FatherMobile'];
		$MotherName=$R['MotherName'];
		$MotherQualification=$R['MotherQualification'];
		$MotherOccupation=$R['MotherOccupation'];
		$MotherMobile=$R['MotherMobile'];
		$GuardianName=$R['GuardianName'];
		$GuardianQualification=$R['GuardianQualification'];
		$GuardianOccupation=$R['GuardianOccupation'];
		$GuardianMobile=$R['GuardianMobile'];
		$GuardianRelation=$R['GuardianRelation'];
		$PermanentVillage=$R['PermanentVillage'];
		$PermanentPostOffice=$R['PermanentPostOffice'];
		$PermanentPoliceStation=$R['PermanentPoliceStation'];
		$PermanentDistrict=$R['PermanentDistrict'];
		$PermanentState=$R['PermanentState'];
		$PermanentPin=$R['PermanentPin'];
		$ResidentVillage=$R['ResidentVillage'];
		$ResidentPostOffice=$R['ResidentPostOffice'];
		$ResidentPoliceStation=$R['ResidentPoliceStation'];
		$ResidentDistrict=$R['ResidentDistrict'];
		$ResidentState=$R['ResidentState'];
		$ResidentPin=$R['ResidentPin'];
		$BankName=$R['BankName'];
		$BranchName=$R['BranchName'];
		$BranchAddress=$R['BranchAddress'];
		$BranchIFSC=$R['BranchIFSC'];
		$BranchMICR=$R['BranchMICR'];
		$AccountNo=$R['AccountNo'];
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
		
		$img="StudentImage/$StudentID.jpg";	if(!file_exists($img)){$img="pic/blank_profile.png";}
		$PresentAddress="Vill-$ResidentVillage, PO-$ResidentPostOffice, PS-$ResidentPoliceStation, Dist-$ResidentDistrict, Pin-$ResidentPin";
		?>
        <tr onclick="ShowStudentID('<?=$StudentID;?>')" style="cursor:pointer;">
            <td id="tblbody">
            <?=$cnt+$start;?><br /><input type="checkbox" name="chk[]" id="chk[]" value="<?=$sl;?>"  onclick="check1('<?=$sl;?>',this.checked)"/>
            </td>
            <td id="tblhed"><img src="<?=$img?>" height="81" class="tilt"><br><?=$StudentID;?></td>
            <td id="tblbody" width="20%"><b><?php echo $StudentName;?></b><br><?php echo $FatherName;?><br><?php echo $MotherName;?><br><?php echo $GuardianName;?></td>
            <td id="tblbody" width="15%">
            <?php echo $PresentAddress;?><br>
            <b>Mob:</b> <?php echo $FatherMobile;?>, <?php echo $MotherMobile;?>
            </td>
            <td id="tblbodynm">
            <b>DoB:</b> <?php echo date('d-m-Y', strtotime($BirthDate));?><br>
            <b>Gender:</b> <?=get_value('main_Gender','sl',$Gender,'gender','',$con);?><br>
            <b>Caste:</b> <?=get_value('main_Caste','sl',$Caste,'caste','',$con);?><br>
            <b>Religion:</b> <?=get_value('main_Religion','sl',$Religion,'religion','',$con);?><br>
            </td>
            <td id="tblbodynm">
            <b>Class :</b> <?=get_value('main_class','sl',$CurrentClass,'ClassName','',$con)?><br>
            <b>Section :</b> <?=$CurrentSection?><br>
            <b>Roll No. :</b> <?=$CurrentRollNo?><br>
            <b>Adm Dt:</b> <?php echo date('d-m-Y', strtotime($AdmissionDate));?><br>
            </td>   
            <td id="tblhed">
            <a href="StudentEntry.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-lg" title="Click to Edit" style="cursor:pointer;"></i></a>
            <span id="show<?=$sl;?>">
            <a onclick="activation('<?=$sl;?>','show<?=$sl;?>','<?=$tblnm?>','stat','<?=$class?>','<?=$btnnm;?>','<?=$stat;?>','<?=$acttl;?>')" title="<?=$acttl;?>"><?=$actbtn;?></a>
            </span>
            <a href="FeesCollect.php?StudentID=<?=$StudentID;?>"><i class="fa fa-credit-card fa-lg" title="Click to Collect Fees" style="cursor:pointer;"></i></a>
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
							<button class="btn btn-info" type="button" id="Searchbtn" onclick="pagnt1()"><b>Go</b></button>
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