<?php
$requirelevel=3;
include 'ActiveUsers.php';
$tblnm="amdission_enquery";

$EnquiryID=isset($_REQUEST['EnquiryID']) ? $_REQUEST['EnquiryID'] : '';

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE EnquiryID='$EnquiryID'") or die(mysqli_query($con));
while($R=mysqli_fetch_array($sql))
{
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
}
if(empty($sl)){$sl='';}
if(empty($EnquiryID)){$EnquiryID='';}
if(empty($EnquirySession)){$EnquirySession='';}
if(empty($EnquiryDate)){$EnquiryDate=date('d-m-Y', strtotime($edt));}
if(empty($EnquiryCalss)){$EnquiryCalss='';}
if(empty($AdmissionSession)){$AdmissionSession='';}
if(empty($AdmissionClass)){$AdmissionClass='';}
if(empty($AdmissionDate)){$AdmissionDate='';}
if(empty($CurrentSession)){$CurrentSession='';}
if(empty($CurrentClass)){$CurrentClass='';}
if(empty($CurrentSection)){$CurrentSection='';}
if(empty($StudentName)){$StudentName='';}
if(empty($BirthDate)){$BirthDate='';}
if(empty($Gender)){$Gender='';}
if(empty($Caste)){$Caste='';}
if(empty($Religion)){$Religion='';}
if(empty($AadharNo)){$AadharNo='';}
if(empty($FatherName)){$FatherName='';}
if(empty($FatherQualification)){$FatherQualification='';}
if(empty($FatherOccupation)){$FatherOccupation='';}
if(empty($FatherMobile)){$FatherMobile='';}
if(empty($MotherName)){$MotherName='';}
if(empty($MotherQualification)){$MotherQualification='';}
if(empty($MotherOccupation)){$MotherOccupation='';}
if(empty($MotherMobile)){$MotherMobile='';}
if(empty($GuardianName)){$GuardianName='';}
if(empty($GuardianQualification)){$GuardianQualification='';}
if(empty($GuardianOccupation)){$GuardianOccupation='';}
if(empty($GuardianMobile)){$GuardianMobile='';}
if(empty($GuardianRelation)){$GuardianRelation='';}
if(empty($PermanentVillage)){$PermanentVillage='';}
if(empty($PermanentPostOffice)){$PermanentPostOffice='';}
if(empty($PermanentPoliceStation)){$PermanentPoliceStation='';}
if(empty($PermanentDistrict)){$PermanentDistrict='';}
if(empty($PermanentState)){$PermanentState='';}
if(empty($PermanentPin)){$PermanentPin='';}
if(empty($ResidentVillage)){$ResidentVillage='';}
if(empty($ResidentPostOffice)){$ResidentPostOffice='';}
if(empty($ResidentPoliceStation)){$ResidentPoliceStation='';}
if(empty($ResidentDistrict)){$ResidentDistrict='';}
if(empty($ResidentState)){$ResidentState='';}
if(empty($ResidentPin)){$ResidentPin='';}
if(empty($BankName)){$BankName='';}
if(empty($BranchName)){$BranchName='';}
if(empty($BranchAddress)){$BranchAddress='';}
if(empty($BranchIFSC)){$BranchIFSC='';}
if(empty($BranchMICR)){$BranchMICR='';}
if(empty($AccountNo)){$AccountNo='';}

$addr="Vill-$ResidentVillage PO-$ResidentPostOffice PS-$ResidentPoliceStation Dist-$ResidentDistrict";
$img="StudImg/$EnquiryID.jpg";
if(file_exists($img)){$pic='<img src="'.$img.'" width="91" height="117">';}else{$pic="<br />Paste Recent Passport size (Width:- 1.37 inches And Height:- 1.77 in )<br />OR<br />Aspect Ratio 0.78 (width to height), 1.29 (height to width)<br />Photograph of Student";}
?>
<html>
<head>
<link href="css/mystyle.css" rel="stylesheet">
<style>
.box{
	text-transform:uppercase;	
	font-family:"Times New Roman", Times, serif;
	font-size:12px;
	font-weight:bold;
	text-align:center;
	vertical-align:middle;
	border:1px solid black;
	border-radius:3px;
	box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
	width:15px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
}
</style>
<title>Print</title>
</head>
<body onLoad="window.print()">
<div class="watermark"><img src="<?=$logo;?>"></div>
<table align="center" border="0" style="border-collapse:collapse; width:713px; border: 3px solid black;">
<tr>
    <td>
        <table border="0" style="border-collapse:collapse; width:713px; border: 0px solid black;">
        <tr>
            <td colspan="3" id="tblhed" style="font-size:32px; border:none;"><?=strtoupper($cname)?></td>
		</tr>
        <tr>
            <td colspan="3" id="tblhed" style="background-color:#686868; font-size:27px; color:#FFF;"><?=$ctag?></td>
        </tr>
        <tr>
        	<td style="text-align:center; width:15%;"><img src="<?=$logo;?>" style="height:100px;"></td>
        	<td id="tblhed">
            <span style="font-size:20px;"><?=$caddr?></span><br />
            <span style="font-size:19px;">Mob : <?=$Cmob?></span><br />
            <span style="font-size:20px;">Email : <i><?=$Cemail?></i></span><br />
            <span style="font-size:20px;">Website : <i><?='www.'.ltrim($Curl,'http://')?></i></span>
            </td>
            <td style="width:15%; font-size:9px; text-align:center;">
            <div style="border:2px solid #000000; width:91px; height:117px; margin:0 auto;"><?=$pic?></div>
            </td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
        	<td id="tblhed">
            <span style="font-size:20px;">
            <div style="background-color:#000; color:#FFF; width:40%; margin:0 auto; border-radius:15px;">Session : <?=$EnquirySession;?>-<?=$EnquirySession+1;?></div>
            </span>
            </td>
            <!--<td style="text-align:center;"><iframe src="../../barcodegenerator/barcode.php?text=<?=$EnquiryID;?>" border="0" style="width:125px;height:30px;"></iframe></td>-->
            <td style="text-align:center;"><img src="BarCode.php?text=<?=$EnquiryID;?>" border="0" style="width:125px;height:30px;"></td>
        </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
        <table border="0" style="border-collapse:collapse; width:713px; border: 0px solid black;">
        <tr>
            <td colspan="5">
                <table border="0" align="center" style="width:100%;">
                <tr>
                	<td colspan="10" style="font-size:12px;"><b>Enquiry No. :</b></td>
                    <?php
                    $EnquiryID_array=str_split($EnquiryID);
                    for($i=0;$i<strlen($EnquiryID);$i++)
                    {
                        ?><td class="box"><?=$EnquiryID_array[$i];?></td><?php
                    }
                    ?>
                    <td colspan="5"></td>
                    <td colspan="2" style="font-size:12px;"><b>Date :</b></td>
                    <?php
                    $edtar=date('dmY',strtotime($edt));
                    $edt_array=str_split($edtar);
                    for($edti=0;$edti<8;$edti++)
                    {
                        $edt_val=$edt_array[$edti];
                        ?><td class="box"><?php if($edt_val!=""){echo $edt_val;}?></td><?php
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="39" style="height:10px;">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="12" style="font-size:12px;"><b>Seeking Admission for :</b></td>
                    <td colspan="10" class="box"><?php echo get_value('main_class','sl',$EnquiryCalss,'ClassName','',$con);?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="12" style="font-size:12px;"><b>Name of the Child :</b></td>
                    <?php
                    $snm_array=str_split($StudentName);
					for($i=0;$i<27;$i++)
					{
						if($i<strlen($StudentName))
						{
							?><td class="box"><?=$snm_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
					}
                    ?>
                </tr>
                <tr>
                    <td colspan="12" style="font-size:12px;"><b>Date of Birth :</b></td>
                    <?php
                    $dob_array=str_split($BirthDate);
                    for($dobi=0;$dobi<10;$dobi++)
                    {
                        $dob_val=$dob_array[$dobi];
						if($dob_val!="-"){?><td class="box"><?php if($dob_val!=""){echo $dob_val;}?></td><?php }
                    }
					$blodgrup='';
                    ?>
                    <td colspan="3">&nbsp;</td>
                    <td colspan="3" style="font-size:12px; text-align:center;"><b>Gender:</b> </td>
                    <td colspan="1">&nbsp;</td>
                    <td colspan="3" style="font-size:12px; text-align:center;"><b>Male:</b></td>
                    <td class="box"><?php if($Gender=='1'){echo '<b>&#10004;</b>';}else{?><font color="#FFFFFF">X</font><?php }?></td>
                    <td colspan="1">&nbsp;</td>
                    <td colspan="3" style="font-size:12px; text-align:center;"><b>Female:</b> </td>
                    <td class="box"><?php if($Gender=='2'){echo '<b>&#10004;</b>';}else{?><font color="#FFFFFF">X</font><?php }?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="12" style="font-size:12px;"><b>Father's Name :</b></td>
                    <?php
                    $fnm_array=str_split($FatherName);
					for($i=0;$i<27;$i++)
					{
						if($i<strlen($FatherName))
						{
							?><td class="box"><?=$fnm_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
					}
                    ?>
                </tr>
                <tr>
                    <td colspan="12" style="font-size:12px;"><b>Mother's Name :</b></td>
                    <?php
                    $mnm_array=str_split($MotherName);
					for($i=0;$i<27;$i++)
					{
						if($i<strlen($MotherName))
						{
							?><td class="box"><?=$mnm_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
					}
                    ?>
                </tr>
                <tr>
                    <td colspan="12" style="font-size:12px;"><b>Present Address :</b></td>
                    <?php
					$present1=substr($addr,0,27);
                    $present1_array=str_split($present1);
                    for($i=0;$i<27;$i++)
                    {
						if($i<strlen($present1))
						{
							?><td class="box"><?=$present1_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
                    }
                    ?>
                </tr>
                <tr>
                	<td colspan="12">&nbsp;</td>
                    <?php
					$present2=substr($addr,27,27);
                    $present2_array=str_split($present2);
					for($i=0;$i<27;$i++)
                    {
						if($i<strlen($present2))
						{
							?><td class="box"><?=$present2_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
                    }
                    ?>
                </tr>
                <tr>
                	<td colspan="12">&nbsp;</td>
                	<td colspan="2" style="font-size:12px;"><b>State :</b></td>
                    <?php
                    $state_array=str_split($ResidentState);
					for($i=0;$i<15;$i++)
                    {
						if($i<strlen($ResidentState))
						{
							?><td class="box"><?=$state_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
                    }
                    ?>
                    <td colspan="1">&nbsp;</td>
                    <td colspan="3" style="font-size:12px;"><b>PIN Code:</b></td>
                    <?php
                    $present_pin_array=str_split($ResidentPin);
					for($i=0;$i<6;$i++)
                    {
						if($i<strlen($ResidentPin))
						{
							?><td class="box"><?=$present_pin_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="12" style="font-size:12px;"><b>Permanent Address :</b></td>
                    <?php
					$present1=substr($addr,0,27);
                    $present1_array=str_split($present1);
                    for($i=0;$i<27;$i++)
                    {
						if($i<strlen($present1))
						{
							?><td class="box"><?=$present1_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
                    }
                    ?>
                </tr>
                <tr>
                	<td colspan="12">&nbsp;</td>
                    <?php
					$present2=substr($addr,27,27);
                    $present2_array=str_split($present2);
					for($i=0;$i<27;$i++)
                    {
						if($i<strlen($present2))
						{
							?><td class="box"><?=$present2_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
                    }
                    ?>
                </tr>
                <tr>
                	<td colspan="12">&nbsp;</td>
                	<td colspan="2" style="font-size:12px;"><b>State :</b></td>
                    <?php
                    $state_array=str_split($ResidentState);
					for($i=0;$i<15;$i++)
                    {
						if($i<strlen($ResidentState))
						{
							?><td class="box"><?=$state_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
                    }
                    ?>
                    <td colspan="1">&nbsp;</td>
                    <td colspan="3" style="font-size:12px;"><b>PIN Code:</b></td>
                    <?php
                    $present_pin_array=str_split($ResidentPin);
					for($i=0;$i<6;$i++)
                    {
						if($i<strlen($ResidentPin))
						{
							?><td class="box"><?=$present_pin_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="12" style="font-size:10px;"><b>E-mail:</b></td>
                    <?php
					$email='';
					if($email==""){$email=$Cemail;}
                    $email_array=str_split($email);
					for($i=0;$i<27;$i++)
                    {
						if($i<strlen($email))
						{
							?><td class="box"><?=$email_array[$i];?></td><?php
						}
						else
						{
							?><td class="box"><font color="#FFFFFF">X</font></td><?php
						}
                    }
                    ?>
                </tr>
				<tr><td><br></td></tr>
                <tr>
                    <td colspan="39" style="font-size:12px;"><b>How Did You Come to know of <?=strtoupper($cname)?> ?</b></td>
                </tr>
                <tr>
                	<td colspan="14" style="font-size:12px;"><b>NewsPaper Advertisement</b></td>
                    <td class="box">&nbsp;</td>
                    <td>&nbsp;</td>
                	<td colspan="2" style="font-size:12px;"><b>Banner</b></td>
                    <td class="box">&nbsp;</td>
                    <td>&nbsp;</td>
                	<td colspan="2" style="font-size:12px;"><b>Mailer</b></td>
                    <td class="box">&nbsp;</td>
                    <td>&nbsp;</td>
                	<td colspan="2" style="font-size:12px;"><b>Reference</b></td>
                    <td class="box">&nbsp;</td>
                    <td>&nbsp;</td>
                	<td colspan="3" style="font-size:12px;"><b>Cable TV</b></td>
                    <td class="box">&nbsp;</td>
                    <td>&nbsp;</td>
                	<td colspan="5" style="font-size:12px;"><b>TV Admission</b></td>
                    <td class="box">&nbsp;</td>
				</tr>
                <tr>
                    <td colspan="12" style="font-size:12px;"><b>Any Suggestions : </b></td>
                    <td colspan="27" style="border-bottom:1px solid #000000; height:20px;">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="39" style="border-bottom:1px solid #000000; height:20px;">&nbsp;</td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td colspan="12" style="font-size:12px;"><b>Centre's Remarks :</b></td>
                    <td colspan="27" style="border-bottom:1px solid #000000; height:20px;">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="39" style="border-bottom:1px solid #000000; height:20px;">&nbsp;</td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                	<td colspan="39">
                        <table>
                        <tr>
                            <td class="box">&nbsp;</td>
                            <td style="font-size:12px;">&nbsp;&nbsp;<b>I would like to Receive Parenting tips from <?=strtoupper($cname)?></b></td>
                        </tr>
                        </table>
                    </td>
                </tr>	
				</table>
			</td>
        </tr>
        <tr>
            <td colspan="4" style="width:80%; text-align:center; padding:10px 0px 10px 0px;"><img src="pic/qrcode.png" height="60"></td>
            <td id="tblhed" style="vertical-align:bottom; padding-bottom:10px;">
            <div style="padding-left:350px;">__________________________<br>
            Parent's Signature with Date</div>
            </td>
        </tr>
        </table>
    </td>
</tr>
</table>
<br>
<table align="center" border="0" style="border-collapse:collapse; width:723px; border: 3px solid black;">
<tr>
	<td colspan="2" style="font-size:14px; text-align:center;">
	<span style="font-size:20px;">
    <div style="background-color:#000; color:#FFF; width:40%; margin:0 auto; box-shadow: 4px 4px grey;">(FOR OFFICIAL USE ONLY)</div>
    </span>
    </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td id="tblhed1"><u>Child's Name :</u> <?php echo $StudentName;?></td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td id="tblhed1"><u>Contact No. :</u> <?php echo $FatherMobile;?></td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td id="tblhed1"><u>Course/Batch :</u> <?php echo get_value('main_class','sl',$EnquiryCalss,'ClassName','',$con);?></td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td id="tblhed1"><u>Referrer ID :</u> <?php echo $EnquiryID;?></td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td id="tblhed1"><u>Enquiry ID :</u> <?php echo $EnquiryID;?></td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td><b><u>Date of Enquiry :</u> <?=date('d-m-Y',strtotime($EnquiryDate))?></b></td>
    <td id="tblhed" style="padding-bottom:10px;"><u>Authorise Signature</u></td>
</tr>
</table>
</body>
</html>