<?php
$requirelevel=3;
include 'ActiveUsers.php';
include "header.php";
$tblnm="main_student_data";

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
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
}
if(empty($sl)){$sl='';}
if(empty($StudentID)){$StudentID='';}
if(empty($AdmissionSession)){$AdmissionSession=$sesn;}
if(empty($AdmissionClass)){$AdmissionClass='';}
if(empty($AdmissionSection)){$AdmissionSection='';}
if(empty($AdmissionDate)){$AdmissionDate=date('d-m-Y', strtotime($edt));}else{$AdmissionDate=date('d-m-Y', strtotime($AdmissionDate));}
if(empty($CurrentSession)){$CurrentSession='';}
if(empty($CurrentClass)){$CurrentClass='';}
if(empty($CurrentSection)){$CurrentSection='';}
if(empty($CurrentRollNo)){$CurrentRollNo='';}
if(empty($StudentName)){$StudentName='';}
if(empty($BirthDate)){$BirthDate='';}else{$BirthDate=date('d-m-Y', strtotime($BirthDate));}
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
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-child fa-lg"></i> Student Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Student Corner</li><li class="active"> Student Entry</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
                	<form name="form" id="form" method="post" action="StudentEntrys.php" enctype="multipart/form-data">
						<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
                        <div class="box-body">
                        	<div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Admission Session</label>
                                        <select name="AdmissionSession" id="AdmissionSession" class="form-control" onChange="GetClass('AdmissionCalssDiv','AdmissionClass',this.value,'2')" required>
                                        <option value="">--- Select ---</option>
                                        <?php
                                        for($i=$sesn;$i>2015;$i--)
                                        {
                                            ?><option value="<?=$i?>" <?=$i==$AdmissionSession ? 'selected' : ''?>><?=$i?> - <?=$i+1?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Admission Calss</label>
                                        <div id="AdmissionCalssDiv">
                                        <select name="AdmissionClass" id="AdmissionClass" class="form-control" onChange="GetSection('<?=$sesn?>', 'AdmissionSectionDiv', 'AdmissionSection', this.value,'0')" required>
                                        <option value="">--- Select ---</option>
                                        <?php
										$sql=mysqli_query($con,"SELECT Class FROM main_section WHERE Session='$sesn' AND stat=0 GROUP BY Class ORDER BY Class") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
											$ClassSl=$R['Class'];
											$ClassName=get_value('main_class','sl',$ClassSl,'ClassName','',$con);
											?><option value="<?=$ClassSl?>" <?=$ClassSl==$AdmissionClass ? 'selected' : ''?>><?=$ClassName?></option><?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Admission Section</label>
                                        <div id="AdmissionSectionDiv">
                                        <select name="AdmissionSection" id="AdmissionSection" class="form-control" required>
                                        <option value="">--- Select ---</option>
                                        <?php
										$sql=mysqli_query($con,"SELECT sl, SectionName FROM main_section WHERE Session='$sesn' AND stat=0 GROUP BY SectionName ORDER BY SectionName") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
											$SectionName=$R['SectionName'];
											?><option value="<?=$SectionName?>" <?=$SectionName==$AdmissionSection ? 'selected' : ''?>><?=$SectionName?></option><?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Admission Date</label>
                                        <input type="text" name="AdmissionDate" id="AdmissionDate" value="<?=$AdmissionDate;?>" class="form-control dt" required>
                                    </div>
								</div>
							</div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Current Session</label>
										<select name="CurrentSession" id="CurrentSession" class="form-control" onChange="GetClass('CurrentCalssDiv','CurrentClass',this.value,'4')" required>
                                        <option value="">--- Select ---</option>
                                        <?php
                                        for($i=$sesn;$i>2015;$i--)
                                        {
                                            ?><option value="<?=$i?>" <?=$i==$sesn ? 'selected' : ''?>><?=$i?> - <?=$i+1?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Current Calss</label>
                                        <div id="CurrentCalssDiv">
                                        <select name="CurrentClass" id="CurrentClass" class="form-control" onChange="GetSection('<?=$sesn?>', 'CurrentSectionDiv', 'CurrentSection', this.value,'2')" required>
                                        <option value="">--- Select ---</option>
                                        <?php
										$sql=mysqli_query($con,"SELECT Class FROM main_section WHERE Session='$sesn' AND stat=0 GROUP BY Class ORDER BY Class") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
											$ClassSl=$R['Class'];
											$ClassName=get_value('main_class','sl',$ClassSl,'ClassName','',$con);
											?><option value="<?=$ClassSl?>" <?=$ClassSl==$CurrentClass ? 'selected' : ''?>><?=$ClassName?></option><?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Current Section</label>
                                        <div id="CurrentSectionDiv">
                                        <select name="CurrentSection" id="CurrentSection" class="form-control" onChange="GetRollNo()" required>
                                        <option value="">--- Select ---</option>
                                        <?php
										$sql=mysqli_query($con,"SELECT sl, SectionName FROM main_section WHERE Session='$sesn' AND stat=0 GROUP BY SectionName ORDER BY SectionName") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
											$SectionName=$R['SectionName'];
											?><option value="<?=$SectionName?>" <?=$SectionName==$CurrentSection ? 'selected' : ''?>><?=$SectionName?></option><?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Current Roll No.</label>
                                        <input type="text" name="CurrentRollNo" id="CurrentRollNo" value="<?=$CurrentRollNo;?>" class="form-control" onkeypress="return NumberOnly(event)" required>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Name of the Student</label>
                                        <input type="text" name="StudentName" id="StudentName" value="<?=$StudentName;?>" class="form-control" required>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Date of Birth</label>
                                        <input type="text" name="BirthDate" id="BirthDate" value="<?=$BirthDate;?>" class="form-control dt">
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Gender</label>
                                        <select name="Gender" id="Gender" class="form-control" required>
                                        <option value="">--- Select ---</option>
                                        <?php
                                        $sql=mysqli_query($con,"SELECT sl, gender FROM main_gender WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
                                            $Gendersl=$R['sl'];
                                            $GenderName=$R['gender'];
                                            ?><option value="<?php echo $Gendersl;?>" <?=$Gendersl==$Gender ? 'selected' : ''?>><?php echo $GenderName;?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Caste</label>
                                        <select name="Caste" id="Caste" class="form-control">
                                        <option value="">--- Select ---</option>
                                        <?php
                                        $sql=mysqli_query($con,"SELECT sl, caste FROM main_caste WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
                                            $Castesl=$R['sl'];
                                            $CasteName=$R['caste'];
                                            ?><option value="<?php echo $Castesl;?>" <?=$Castesl==$Caste ? 'selected' : ''?>><?php echo $CasteName;?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Religion</label>
                                        <select name="Religion" id="Religion" class="form-control">
                                        <option value="">--- Select ---</option>
                                        <?php
                                        $sql=mysqli_query($con,"SELECT sl, religion FROM main_religion WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
                                            $Religionsl=$R['sl'];
                                            $ReligionName=$R['religion'];
                                            ?><option value="<?php echo $Religionsl;?>" <?=$Religionsl==$Religion ? 'selected' : ''?>><?php echo $ReligionName;?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Aadhaar No.</label>
                                        <input type="text" name="AadharNo" id="AadharNo" value="<?=$AadharNo;?>" class="form-control" required>
                                    </div>
								</div>
							</div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Name of Father</label>
                                        <input type="text" name="FatherName" id="FatherName" value="<?=$FatherName;?>" class="form-control" required>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Qualification of Father</label>
                                        <input type="text" name="FatherQualification" id="FatherQualification" value="<?=$FatherQualification;?>" class="form-control" required>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Occupation of Father</label>
                                        <input type="text" name="FatherOccupation" id="FatherOccupation" value="<?=$FatherOccupation;?>" class="form-control" required>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Mobile No. of Father</label>
                                        <input type="text" name="FatherMobile" id="FatherMobile" value="<?=$FatherMobile;?>" class="form-control" maxlength="10" onkeypress="return NumberOnly(event)" required>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Name of Mother</label>
                                        <input type="text" name="MotherName" id="MotherName" value="<?=$MotherName;?>" class="form-control">
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Qualification of Mother</label>
                                        <input type="text" name="MotherQualification" id="MotherQualification" value="<?=$MotherQualification;?>" class="form-control">
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Occupation of Mother</label>
                                        <input type="text" name="MotherOccupation" id="MotherOccupation" value="<?=$MotherOccupation;?>" class="form-control">
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Mobile No. of Mother</label>
                                        <input type="text" name="MotherMobile" id="MotherMobile" value="<?=$MotherMobile;?>" class="form-control" maxlength="10" onkeypress="return NumberOnly(event)" required>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">Relation with Guardian</label>
                                        <select name="GuardianRelation" id="GuardianRelation" class="form-control" onchange="GetGuardianData(this.value)" required>
                                        <option value="">--- Select ---</option>
                                        <?php
                                        $sql=mysqli_query($con,"SELECT * FROM main_relation WHERE stat=0") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
                                            $relationsl=$R['sl'];
                                            $relationnm=$R['relation'];
                                            ?><option value="<?=$relationsl?>" <?=$relationsl==$GuardianRelation? 'selected' : ''?>><?=$relationnm?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Name of Guardian</label>
                                        <input type="text" name="GuardianName" id="GuardianName" value="<?=$GuardianName;?>" class="form-control">
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Qualification of Guardian</label>
                                        <input type="text" name="GuardianQualification" id="GuardianQualification" value="<?=$GuardianQualification;?>" class="form-control">
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Occupation of Guardian</label>
                                        <input type="text" name="GuardianOccupation" id="GuardianOccupation" value="<?=$GuardianOccupation;?>" class="form-control">
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Mobile No. of Guardian</label>
                                        <input type="text" name="GuardianMobile" id="GuardianMobile" value="<?=$GuardianMobile;?>" class="form-control" maxlength="10" onkeypress="return NumberOnly(event)" required>
                                    </div>
								</div>
							</div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">
                                        	<font color="#FF0000">Present</font> Village Name
                                        </label>
                                        <input type="text" name="ResidentVillage" id="ResidentVillage" value="<?=$ResidentVillage;?>" class="form-control Capitalize" required>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">Pin</label>
                                        <input type="text" name="ResidentPin" id="ResidentPin" value="<?=$ResidentPin;?>" class="form-control" onkeypress="return NumberOnly(event)" onblur="GetPostOffice(this.value,'ResidentPostOfficeDiv','ResidentPostOffice','ResidentPoliceStation','ResidentDistrict','ResidentState')" required>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">Post Office</label>
                                        <div id="ResidentPostOfficeDiv">
                                        	<input type="text" name="ResidentPostOffice" id="ResidentPostOffice" value="<?=$ResidentPostOffice;?>" class="form-control Capitalize" required>
                                        </div>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">Police Station</label>
                                        <input type="text" name="ResidentPoliceStation" id="ResidentPoliceStation" value="<?=$ResidentPoliceStation;?>" class="form-control" required>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">District</label>
                                        <input type="text" name="ResidentDistrict" id="ResidentDistrict" value="<?=$ResidentDistrict;?>" class="form-control" required>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">State</label>
                                        <input type="text" name="ResidentState" id="ResidentState" value="<?=$ResidentState;?>" class="form-control" required>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhed"><font color="#FF0000">Is the Present & Permanent Address same?</font></label>
                                        <select name="SameAddressFlag" id="SameAddressFlag" class="form-control" onchange="SameAddress(this.value)" required>
                                        <option value="">--- Select ---</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                        </select>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000">Permanent</font> Village Name</label>
                                        <input type="text" name="PermanentVillage" id="PermanentVillage" value="<?=$PermanentVillage;?>" class="form-control Capitalize" required>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">Pin</label>
                                        <input type="text" name="PermanentPin" id="PermanentPin" value="<?=$PermanentPin;?>" class="form-control" onkeypress="return NumberOnly(event)" onblur="GetPostOffice(this.value,'PermanentPostOfficeDiv','PermanentPostOffice','PermanentPoliceStation','PermanentDistrict','PermanentState')" required>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">Post Office</label>
                                        <div id="PermanentPostOfficeDiv">
                                        	<input type="text" name="PermanentPostOffice" id="PermanentPostOffice" value="<?=$PermanentPostOffice;?>" class="form-control Capitalize" required>
                                        </div>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">Police Station</label>
                                        <input type="text" name="PermanentPoliceStation" id="PermanentPoliceStation" value="<?=$PermanentPoliceStation;?>" class="form-control" required>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">District</label>
                                        <input type="text" name="PermanentDistrict" id="PermanentDistrict" value="<?=$PermanentDistrict;?>" class="form-control" required>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">State</label>
                                        <input type="text" name="PermanentState" id="PermanentState" value="<?=$PermanentState;?>" class="form-control" required>
                                    </div>
								</div>
							</div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000">Bank</font> IFSC</label>
                                        <input type="text" name="BranchIFSC" id="BranchIFSC" value="<?php echo $BranchIFSC;?>" maxlength="11" class="form-control UpperCase" onClick="this.select();" onBlur="GetBankdetails('','',this.value)">
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">Bank Name</label>
                                        <input type="text" name="BankName" id="BankName" value="<?php echo $BankName?>" list="banklist" class="form-control Capitalize" onClick="this.select();" onChange="GetBranch(this.value)">
                                        <datalist id="banklist">
                                        <?php
                                        $sql=mysqli_query($con,"SELECT BankName FROM main_bankdata GROUP BY BankName ORDER BY sl") or die(mysql_error());
                                        while($R=mysqli_fetch_array($sql))
                                        {
                                            $BankName=NameCase($R['BankName']);
                                            ?><option value="<?=$BankName;?>"></option><?php
                                        }
                                        ?>
                                        </datalist>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">Branch Name</label>
                                        <div id="branch">
                                        <input type="text" name="BranchName" id="BranchName" value="<?php echo $BranchName;?>" class="form-control Capitalize" onClick="this.select();">
                                        </div>
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">Branch Address</label>
                                        <input type="text" name="BranchAddress" id="BranchAddress" value="<?php echo $BranchAddress;?>" class="form-control Capitalize" onClick="this.select();">
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">MICR Code</label>
                                        <input type="text" name="BranchMICR" id="BranchMICR" value="<?php echo $BranchMICR;?>" class="form-control" onClick="this.select();">
                                    </div>
								</div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label id="tblhedrow">Account No.</label>
                                        <input type="text" name="AccountNo" id="AccountNo" value="<?php echo $AccountNo;?>" class="form-control" onClick="this.select();">
                                    </div>
								</div>
							</div>
                            <hr />
                            <div class="card-footer">
                                <input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
                            </div>
                        </div>
					</form>
				</div>
			</section>
		</aside>
	</div>
	<?php include 'footer.php';?>
</body>
</html>
<script>
function GetClass(TargetFieldDiv,TargetFieldName,SourceFieldValue,FunctionType)
{
	$('#'+TargetFieldDiv).load('GetClass.php?TargetFieldName='+TargetFieldName+'&SourceFieldValue='+SourceFieldValue+'&FunctionType='+FunctionType).fadeIn('fast');
}

function GetSection(Session,TargetFieldDiv,TargetFieldName,SourceFieldValue,FunctionType)
{
	$('#'+TargetFieldDiv).load('GetSection.php?Session='+Session+'&TargetFieldName='+TargetFieldName+'&SourceFieldValue='+SourceFieldValue+'&FunctionType='+FunctionType).fadeIn('fast');
}

function GetRollNo(Session, Class, Section)
{
	var Session=$('#CurrentSession').val();
	var Class=$('#CurrentClass').val();
	var Section=$('#CurrentSection').val();
	var CurrentRollNo=$('#CurrentRollNo').val();
	if(CurrentRollNo=='')
	{
		CurrentRollNo=0;
	}
	
	$.get('GetRollNo.php?Session='+Session+'&Class='+Class+'&Section='+Section, function(RollNo) 
	{
		if(confirm('As per Database, the Roll No for the student will be '+CurrentRollNo+' to '+RollNo))
		{
			$('#CurrentRollNo').val(RollNo);
		}
	});
}

function GetGuardianData(Relation)
{
	if(Relation=='1')
	{
		$('#GuardianName').val($('#FatherName').val());
		$('#GuardianQualification').val($('#FatherQualification').val());
		$('#GuardianOccupation').val($('#FatherOccupation').val());
		$('#GuardianMobile').val($('#FatherMobile').val());
	}
	else
	if(Relation=='2')
	{
		$('#GuardianName').val($('#MotherName').val());
		$('#GuardianQualification').val($('#MotherQualification').val());
		$('#GuardianOccupation').val($('#MotherOccupation').val());
		$('#GuardianMobile').val($('#MotherMobile').val());
	}
	else
	{
		$('#GuardianName').val('');
		$('#GuardianQualification').val('');
		$('#GuardianOccupation').val('');
		$('#GuardianMobile').val('');
	}
}

function SameAddress(flag)
{
	if(flag=='1')
	{
		$('#PermanentVillage').val($('#ResidentVillage').val());
		$('#PermanentPostOffice').val($('#ResidentPostOffice').val());
		$('#PermanentPoliceStation').val($('#ResidentPoliceStation').val());
		$('#PermanentDistrict').val($('#ResidentDistrict').val());
		$('#PermanentState').val($('#ResidentState').val());
		$('#PermanentPin').val($('#ResidentPin').val());
	}
	else
	{
		$('#PermanentVillage').val('');
		$('#PermanentPostOffice').val('');
		$('#PermanentPoliceStation').val('');
		$('#PermanentDistrict').val('');
		$('#PermanentState').val('');
		$('#PermanentPin').val('');
	}
}
</script>
