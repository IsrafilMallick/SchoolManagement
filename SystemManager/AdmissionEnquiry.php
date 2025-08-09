<?php
$requirelevel=3;
include 'ActiveUsers.php';
include "header.php";
$tblnm="amdission_enquery";

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
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
if(empty($EnquiryDate)){$EnquiryDate=date('d-m-Y', strtotime($edt));}else{$EnquiryDate=date('d-m-Y', strtotime($EnquiryDate));}
if(empty($EnquiryCalss)){$EnquiryCalss='';}
if(empty($AdmissionSession)){$AdmissionSession='';}
if(empty($AdmissionClass)){$AdmissionClass='';}
if(empty($AdmissionDate)){$AdmissionDate='';}
if(empty($CurrentSession)){$CurrentSession='';}
if(empty($CurrentClass)){$CurrentClass='';}
if(empty($CurrentSection)){$CurrentSection='';}
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
                <h1 align="center"><i class="fa fa-search"></i> Admission Enquery</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Admission</li><li class="active"> Admission Enquery</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
                	<form name="form" id="form" method="post" action="AdmissionEnquirys.php" enctype="multipart/form-data">
						<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
                        <!--
                        <div class="box-header with-border">
                            <h3 class="box-title">Enquery Class Details</h3>
                        </div>
                        -->
                        <div class="box-body">
                        	<div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> Enquiry Session</label>
                                        <select name="EnquirySession" id="EnquirySession" class="form-control" onChange="GetClass('EnquiryCalssDiv','EnquiryCalss',this.value,0)" required>
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> Enquiry Date</label>
                                        <input type="text" name="EnquiryDate" id="EnquiryDate" value="<?=$EnquiryDate;?>" class="form-control dt">
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> Enquiry Calss</label>
                                        <div id="EnquiryCalssDiv">
                                        <select name="EnquiryCalss" id="EnquiryCalss" class="form-control" required>
                                        <option value="">--- Select ---</option>
                                        <?php
										$sql=mysqli_query($con,"SELECT Class FROM main_section WHERE Session='$sesn' AND stat=0 GROUP BY Class ORDER BY Class") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
											$ClassSl=$R['Class'];
											$ClassName=get_value('main_class','sl',$ClassSl,'ClassName','',$con);
											?><option value="<?=$ClassSl?>" <?=$ClassSl==$EnquiryCalss ? 'selected' : ''?>><?=$ClassName?></option><?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> Name of the Student</label>
                                        <input type="text" name="StudentName" id="StudentName" value="<?=$StudentName;?>" class="form-control" required>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Date of Birth</label>
                                        <input type="text" name="BirthDate" id="BirthDate" value="<?=$BirthDate;?>" class="form-control dt">
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> Gender</label>
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
							</div>
                            <div class="row">
                                <div class="col-sm-4">
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
                                <div class="col-sm-4">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> Mobile No.</label>
                                        <input type="text" name="FatherMobile" id="FatherMobile" value="<?=$FatherMobile;?>" class="form-control" required>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> Father Name</label>
                                        <input type="text" name="FatherName" id="FatherName" value="<?=$FatherName;?>" class="form-control" onblur="GetGuardianName(this.value)" required>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Mother Name</label>
                                        <input type="text" name="MotherName" id="MotherName" value="<?=$MotherName;?>" class="form-control">
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Guardian Name</label>
                                        <input type="text" name="GuardianName" id="GuardianName" value="<?=$GuardianName;?>" class="form-control">
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> Village Name</label>
                                        <input type="text" name="ResidentVillage" id="ResidentVillage" value="<?=$ResidentVillage;?>" class="form-control Capitalize" required>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> Pin</label>
                                        <input type="text" name="ResidentPin" id="ResidentPin" value="<?=$ResidentPin;?>" class="form-control" onkeypress="return NumberOnly(event)" onblur="GetPostOffice(this.value,'PostOfficeDiv','ResidentPostOffice','ResidentPoliceStation','ResidentDistrict','ResidentState')" required>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> Post Office</label>
                                        <div id="PostOfficeDiv">
                                        	<input type="text" name="ResidentPostOffice" id="ResidentPostOffice" value="<?=$ResidentPostOffice;?>" class="form-control Capitalize" required>
                                        </div>
                                    </div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> Police Station</label>
                                        <input type="text" name="ResidentPoliceStation" id="ResidentPoliceStation" value="<?=$ResidentPoliceStation;?>" class="form-control" required>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> District</label>
                                        <input type="text" name="ResidentDistrict" id="ResidentDistrict" value="<?=$ResidentDistrict;?>" class="form-control" required>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow"><font color="#FF0000" size="+2">*</font> State</label>
                                        <input type="text" name="ResidentState" id="ResidentState" value="<?=$ResidentState;?>" class="form-control" required>
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
function GetGuardianName(Value)
{
	$('#GuardianName').val(Value);
}

function GetClass(TargetFieldDiv,TargetFieldName,SourceFieldValue,FunctionType)
{
	$('#'+TargetFieldDiv).load('GetClass.php?TargetFieldName='+TargetFieldName+'&SourceFieldValue='+SourceFieldValue+'&FunctionType='+FunctionType).fadeIn('fast');
}
</script>
