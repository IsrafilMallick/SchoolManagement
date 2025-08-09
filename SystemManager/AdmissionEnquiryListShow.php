<?php
$requirelevel=3;
include 'ActiveUsers.php';
$tblnm="amdission_enquery";

$EnquirySession=$_REQUEST['EnquirySession'];
$EnquiryCalss=$_REQUEST['EnquiryCalss'];
$stat=$_REQUEST['stat'];
$srch=rawurldecode($_REQUEST['srch']);

if($EnquirySession!=""){$EnquirySession1="AND EnquirySession='$EnquirySession'";}else{$EnquirySession1="";}
if($EnquiryCalss!=""){$EnquiryCalss1="AND EnquiryCalss='$EnquiryCalss'";}else{$EnquiryCalss1="";}
if($stat!=""){$stat1="AND stat='$stat'";}else{$stat1="";}
if($srch=="")
{
	$allsrch="";
}
else
{
	$allsrch="AND (EnquiryID LIKE '%$srch%' OR EnquirySession LIKE '%$srch%' OR EnquiryDate LIKE '%$srch%' OR EnquiryCalss LIKE '%$srch%' OR AdmissionSession LIKE '%$srch%' OR AdmissionClass LIKE '%$srch%' OR AdmissionDate LIKE '%$srch%' OR CurrentSession LIKE '%$srch%' OR CurrentClass LIKE '%$srch%' OR CurrentSection LIKE '%$srch%' OR StudentName LIKE '%$srch%' OR BirthDate LIKE '%$srch%' OR Gender LIKE '%$srch%' OR Caste LIKE '%$srch%' OR Religion LIKE '%$srch%' OR AadharNo LIKE '%$srch%' OR FatherName LIKE '%$srch%' OR FatherQualification LIKE '%$srch%' OR FatherOccupation LIKE '%$srch%' OR FatherMobile LIKE '%$srch%' OR MotherName LIKE '%$srch%' OR MotherQualification LIKE '%$srch%' OR MotherOccupation LIKE '%$srch%' OR MotherMobile LIKE '%$srch%' OR GuardianName LIKE '%$srch%' OR GuardianQualification LIKE '%$srch%' OR GuardianOccupation LIKE '%$srch%' OR GuardianMobile LIKE '%$srch%' OR GuardianRelation LIKE '%$srch%' OR PermanentVillage LIKE '%$srch%' OR PermanentPostOffice LIKE '%$srch%' OR PermanentPoliceStation LIKE '%$srch%' OR PermanentDistrict LIKE '%$srch%' OR PermanentState LIKE '%$srch%' OR PermanentPin LIKE '%$srch%' OR ResidentVillage LIKE '%$srch%' OR ResidentPostOffice LIKE '%$srch%' OR ResidentPoliceStation LIKE '%$srch%' OR ResidentDistrict LIKE '%$srch%' OR ResidentState LIKE '%$srch%' OR ResidentPin LIKE '%$srch%' OR BankName LIKE '%$srch%' OR BranchName LIKE '%$srch%' OR BranchAddress LIKE '%$srch%' OR BranchIFSC LIKE '%$srch%' OR BranchMICR LIKE '%$srch%' OR AccountNo LIKE '%$srch%')";
}

$pno=isset($_REQUEST['pno']) ? $_REQUEST['pno'] : '';
$ps=isset($_REQUEST['ps']) ? $_REQUEST['ps'] : '';
if($ps==""){$ps=10;}
if($pno==""){$pno=1;}
$start=($pno-1)*$ps;

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $EnquirySession1 $EnquiryCalss1 $stat1 $allsrch") or die(mysqli_error($con));
$rcntttl=mysqli_num_rows($sql);
$rcnt=$rcntttl;
$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl>0 $EnquirySession1 $EnquiryCalss1 $stat1 $allsrch ORDER BY sl DESC LIMIT $start,$ps") or die(mysqli_error($con));
$count=mysqli_num_rows($sql);
if($count>0)
{
?>
<div align="left">
<input sesne="text" name="ps" id="ps" value="<?=$ps;?>" class="form-control" onclick="this.select();" onblur="pagnt1()" style="width:80px;">
</div>
<div class="box box-success">
<table class="table table-hover table-striped table-bordered">
<tr><td colspan="6" id="tblhedrecord">Total Record : <?php echo $rcnt;?></td></tr>
<tr>
    <th id="tblbody">Sl.</th>
    <th id="tblbody">Admission Details</th>
    <th id="tblbody">Student Details</th>
    <th id="tblbody">Parent /Guardian Data</th>
    <th id="tblbody">Present Address</th> 	
	<th id="tblbody">Action</th>
</tr>
<?php
$cnt=0;	  
while($R=mysqli_fetch_array($sql))
{
	$cnt++;
	$sl=$R['sl'];
    $EnquiryID=$R['EnquiryID'];
    $EnquirySession=$R['EnquirySession'];
    $EnquiryDate=$R['EnquiryDate'];
    $EnquiryCalss=$R['EnquiryCalss'];
    $AdmissionSession=$R['AdmissionSession'];
    $AdmissionClass=$R['AdmissionClass'];
    $AdmissionDate=$R['AdmissionDate'];
    $CurrentSession=$R['CurrentSession'];
    $CurrentClass=$R['CurrentClass'];
    $CurrentSection=$R['CurrentSection'];
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
	?>
    <tr>
        <td id="tblbody"><?php echo $start+$cnt;?></td>
        <td id="tblbodynm">
        <b>Session :</b> <?php echo $EnquirySession;?> - <?php echo $EnquirySession;?><br />
        <b>Class :</b> <?php echo get_value('main_class','sl',$EnquiryCalss,'ClassName','',$con);?><br />
        <b>Enquiry Date :</b> <?php echo $EnquiryDate;?><br />
        <b>Referrer :</b> <?php echo $EnquiryID;?>	
        </td>
        <td id="tblbodynm">
        <b>Student Name :</b> <?php echo $StudentName;?><br />
        <b>Gender :</b> <?php echo get_value('main_gender','sl',$Gender,'gender','',$con);?><br />
        <b>Date of Birth :</b> <?php echo $BirthDate;?><br />
        <b>Caste :</b> <?php echo get_value('main_caste','sl',$Caste,'caste','',$con);?><br />
        <b>Religion :</b> <?php echo get_value('main_religion','sl',$Religion,'religion','',$con);?>
        </td>
        <td id="tblbodynm">  
        <b>Father :</b> <?php echo $FatherName;?><br />
        <b>Mother :</b> <?php echo $MotherName;?><br />
        <b>Guardian :</b> <?php echo $GuardianName;?><br />
        <b>Mobile :</b> <?php echo $FatherMobile;?><br />
        </td>
        <td id="tblbodynm">
        <b>Village :</b> <?php echo $ResidentVillage;?><br />
        <b>Post Office :</b> <?php echo $ResidentPostOffice;?><br />
        <b>Police Station :</b> <?php echo $ResidentPoliceStation;?><br />
        <b>District :</b> <?php echo $ResidentDistrict;?><br />
        <b>Pin No. :</b> <?php echo $ResidentPin;?>
        </td>
        <td id="tblbody">
        <a href="AdmissionEnquiry.php?sl=<?=$sl;?>"><i class="fa fa-edit fa-2x" style="color:#F0F; cursor:pointer;"></i></a>
        <a href="AdmissionEnquiryPrint.php?EnquiryID=<?=$EnquiryID;?>" target="_blank"><i class="fa fa-print fa-2x" style="color:#F90; cursor:pointer;"></i></a>
		<a href="StudentEntry.php?EnquiryID=<?=$EnquiryID;?>"><i class="fa fa-sign-in fa-2x" style="color:#25a5c4; cursor:pointer;"></i></a>
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