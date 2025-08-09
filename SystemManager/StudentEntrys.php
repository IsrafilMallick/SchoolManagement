<?php
$requirelevel=3;
include 'ActiveUsers.php';
$tblnm="main_student_data";

$sl=isset($_POST['sl']) ? $_POST['sl'] : '';    if($sl==''){$sl1="";}else{$sl1="AND sl!='$sl'";}
$AdmissionSession=isset($_POST['AdmissionSession']) ? $_POST['AdmissionSession'] : '';
$AdmissionClass=isset($_POST['AdmissionClass']) ? $_POST['AdmissionClass'] : '';
$AdmissionSection=isset($_POST['AdmissionSection']) ? $_POST['AdmissionSection'] : '';
$AdmissionDate=isset($_POST['AdmissionDate']) ? date('Y-m-d', strtotime($_POST['AdmissionDate'])) : $edt;
$CurrentSession=isset($_POST['CurrentSession']) ? $_POST['CurrentSession'] : '';
$CurrentClass=isset($_POST['CurrentClass']) ? $_POST['CurrentClass'] : '';
$CurrentSection=isset($_POST['CurrentSection']) ? $_POST['CurrentSection'] : '';
$CurrentRollNo=isset($_POST['CurrentRollNo']) ? $_POST['CurrentRollNo'] : '';
$StudentName=isset($_POST['StudentName']) ? $_POST['StudentName'] : '';
$BirthDate=isset($_POST['BirthDate']) ? date('Y-m-d', strtotime($_POST['BirthDate'])) : '';
$Gender=isset($_POST['Gender']) ? $_POST['Gender'] : '';
$Caste=isset($_POST['Caste']) ? $_POST['Caste'] : '';
$Religion=isset($_POST['Religion']) ? $_POST['Religion'] : '';
$AadharNo=isset($_POST['AadharNo']) ? $_POST['AadharNo'] : '';
$FatherName=isset($_POST['FatherName']) ? $_POST['FatherName'] : '';
$FatherQualification=isset($_POST['FatherQualification']) ? $_POST['FatherQualification'] : '';
$FatherOccupation=isset($_POST['FatherOccupation']) ? $_POST['FatherOccupation'] : '';
$FatherMobile=isset($_POST['FatherMobile']) ? $_POST['FatherMobile'] : '';
$MotherName=isset($_POST['MotherName']) ? $_POST['MotherName'] : '';
$MotherQualification=isset($_POST['MotherQualification']) ? $_POST['MotherQualification'] : '';
$MotherOccupation=isset($_POST['MotherOccupation']) ? $_POST['MotherOccupation'] : '';
$MotherMobile=isset($_POST['MotherMobile']) ? $_POST['MotherMobile'] : '';
$GuardianName=isset($_POST['GuardianName']) ? $_POST['GuardianName'] : '';
$GuardianQualification=isset($_POST['GuardianQualification']) ? $_POST['GuardianQualification'] : '';
$GuardianOccupation=isset($_POST['GuardianOccupation']) ? $_POST['GuardianOccupation'] : '';
$GuardianMobile=isset($_POST['GuardianMobile']) ? $_POST['GuardianMobile'] : '';
$GuardianRelation=isset($_POST['GuardianRelation']) ? $_POST['GuardianRelation'] : '';
$PermanentVillage=isset($_POST['PermanentVillage']) ? $_POST['PermanentVillage'] : '';
$PermanentPostOffice=isset($_POST['PermanentPostOffice']) ? $_POST['PermanentPostOffice'] : '';
$PermanentPoliceStation=isset($_POST['PermanentPoliceStation']) ? $_POST['PermanentPoliceStation'] : '';
$PermanentDistrict=isset($_POST['PermanentDistrict']) ? $_POST['PermanentDistrict'] : '';
$PermanentState=isset($_POST['PermanentState']) ? $_POST['PermanentState'] : '';
$PermanentPin=isset($_POST['PermanentPin']) ? $_POST['PermanentPin'] : '';
$ResidentVillage=isset($_POST['ResidentVillage']) ? $_POST['ResidentVillage'] : '';
$ResidentPostOffice=isset($_POST['ResidentPostOffice']) ? $_POST['ResidentPostOffice'] : '';
$ResidentPoliceStation=isset($_POST['ResidentPoliceStation']) ? $_POST['ResidentPoliceStation'] : '';
$ResidentDistrict=isset($_POST['ResidentDistrict']) ? $_POST['ResidentDistrict'] : '';
$ResidentState=isset($_POST['ResidentState']) ? $_POST['ResidentState'] : '';
$ResidentPin=isset($_POST['ResidentPin']) ? $_POST['ResidentPin'] : '';
$BankName=isset($_POST['BankName']) ? $_POST['BankName'] : '';
$BranchName=isset($_POST['BranchName']) ? $_POST['BranchName'] : '';
$BranchAddress=isset($_POST['BranchAddress']) ? $_POST['BranchAddress'] : '';
$BranchIFSC=isset($_POST['BranchIFSC']) ? $_POST['BranchIFSC'] : '';
$BranchMICR=isset($_POST['BranchMICR']) ? $_POST['BranchMICR'] : '';
$AccountNo=isset($_POST['AccountNo']) ? $_POST['AccountNo'] : '';

if($AdmissionSession==''||$AdmissionClass==''||$AdmissionSection==''||$AdmissionDate==''||$CurrentSession==''||$CurrentClass==''||$CurrentSection==''||$CurrentRollNo==''||$StudentName==''||$BirthDate==''||$Gender==''||$FatherName==''||$FatherMobile==''||$MotherName==''||$GuardianName==''||$GuardianMobile==''||$PermanentVillage==''||$PermanentPostOffice==''||$PermanentPoliceStation==''||$PermanentDistrict==''||$PermanentState==''||$PermanentPin==''||$ResidentVillage==''||$ResidentPostOffice==''||$ResidentPoliceStation==''||$ResidentDistrict==''||$ResidentState==''||$ResidentPin=='')
{
    $msg='Please Fill all mandatory fields Correctly. . . .! ! !';
    $returnpage='window.history.go(-1)';
}
else
{
	$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE StudentName='$StudentName' AND BirthDate='$BirthDate' AND FatherName='$FatherName' AND FatherMobile='$FatherMobile' AND MotherName='$MotherName' $sl1");
	if(mysqli_num_rows($sql)==0)
	{
		if($sl=="")
		{
			//20181901001 ---> Session(6)+Class(2)+Increment(3)
			$increment=0;
			$abbrev=$CurrentSession.substr($CurrentSession+1,2,4).str_pad($CurrentClass, 2, '0', STR_PAD_LEFT);
			$sql=mysqli_query($con,"SELECT StudentID FROM $tblnm WHERE CurrentSession='$CurrentSession' AND StudentID LIKE '$abbrev%' ORDER BY sl DESC LIMIT 0,1");
			while($R=mysqli_fetch_array($sql))
			{
				$StudentID=$R['StudentID'];
				$increment=substr($StudentID,8,3);
			}
			
			$count=1;
			while($count>0)
			{
				$increment+=1;
				$StudentID=$abbrev.str_pad($increment, 3, '0', STR_PAD_LEFT);
				$sql=mysqli_query($con,"SELECT sl FROM $tblnm WHERE StudentID='$StudentID'");
				$count=mysqli_num_rows($sql);
			}
			
			$sql=mysqli_query($con,"INSERT INTO $tblnm(StudentID, AdmissionSession, AdmissionClass, AdmissionSection, AdmissionDate, CurrentSession, CurrentClass, CurrentSection, CurrentRollNo, StudentName, BirthDate, Gender, Caste, Religion, AadharNo, FatherName, FatherQualification, FatherOccupation, FatherMobile, MotherName, MotherQualification, MotherOccupation, MotherMobile, GuardianName, GuardianQualification, GuardianOccupation, GuardianMobile, GuardianRelation, PermanentVillage, PermanentPostOffice, PermanentPoliceStation, PermanentDistrict, PermanentState, PermanentPin, ResidentVillage, ResidentPostOffice, ResidentPoliceStation, ResidentDistrict, ResidentState, ResidentPin, BankName, BranchName, BranchAddress, BranchIFSC, BranchMICR, AccountNo, edt, edttm, eby) VALUES('$StudentID', '$AdmissionSession', '$AdmissionClass', '$AdmissionSection', '$AdmissionDate', '$CurrentSession', '$CurrentClass', '$CurrentSection', '$CurrentRollNo', '$StudentName', '$BirthDate', '$Gender', '$Caste', '$Religion', '$AadharNo', '$FatherName', '$FatherQualification', '$FatherOccupation', '$FatherMobile', '$MotherName', '$MotherQualification', '$MotherOccupation', '$MotherMobile', '$GuardianName', '$GuardianQualification', '$GuardianOccupation', '$GuardianMobile', '$GuardianRelation', '$PermanentVillage', '$PermanentPostOffice', '$PermanentPoliceStation', '$PermanentDistrict', '$PermanentState', '$PermanentPin', '$ResidentVillage', '$ResidentPostOffice', '$ResidentPoliceStation', '$ResidentDistrict', '$ResidentState', '$ResidentPin', '$BankName', '$BranchName', '$BranchAddress', '$BranchIFSC', '$BranchMICR', '$AccountNo', '$edt', '$edttm', '$eby')") or die(mysqli_error($con));
			//if($EnquiryID!=""){mysqli_query($con,"UPDATE amdission_enquery SET stat=1 WHERE EnquiryID='$EnquiryID'") or die(mysqli_error($con));}
			$msg='Submitted Successfully. . . ! ! ! \n Thank you. . . ! ! !';
			$returnpage="document.location='UploadDocument.php?StudentID=$StudentID';";

		}
		else
		{
			$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$StudentID1=$R['StudentID'];
				$AdmissionSession1=$R['AdmissionSession'];
				$AdmissionClass1=$R['AdmissionClass'];
				$AdmissionSection1=$R['AdmissionSection'];
				$AdmissionDate1=$R['AdmissionDate'];
				$CurrentSession1=$R['CurrentSession'];
				$CurrentClass1=$R['CurrentClass'];
				$CurrentSection1=$R['CurrentSection'];
				$CurrentRollNo1=$R['CurrentRollNo'];
				$StudentName1=$R['StudentName'];
				$BirthDate1=$R['BirthDate'];
				$Gender1=$R['Gender'];
				$Caste1=$R['Caste'];
				$Religion1=$R['Religion'];
				$AadharNo1=$R['AadharNo'];
				$FatherName1=$R['FatherName'];
				$FatherQualification1=$R['FatherQualification'];
				$FatherOccupation1=$R['FatherOccupation'];
				$FatherMobile1=$R['FatherMobile'];
				$MotherName1=$R['MotherName'];
				$MotherQualification1=$R['MotherQualification'];
				$MotherOccupation1=$R['MotherOccupation'];
				$MotherMobile1=$R['MotherMobile'];
				$GuardianName1=$R['GuardianName'];
				$GuardianQualification1=$R['GuardianQualification'];
				$GuardianOccupation1=$R['GuardianOccupation'];
				$GuardianMobile1=$R['GuardianMobile'];
				$GuardianRelation1=$R['GuardianRelation'];
				$PermanentVillage1=$R['PermanentVillage'];
				$PermanentPostOffice1=$R['PermanentPostOffice'];
				$PermanentPoliceStation1=$R['PermanentPoliceStation'];
				$PermanentDistrict1=$R['PermanentDistrict'];
				$PermanentState1=$R['PermanentState'];
				$PermanentPin1=$R['PermanentPin'];
				$ResidentVillage1=$R['ResidentVillage'];
				$ResidentPostOffice1=$R['ResidentPostOffice'];
				$ResidentPoliceStation1=$R['ResidentPoliceStation'];
				$ResidentDistrict1=$R['ResidentDistrict'];
				$ResidentState1=$R['ResidentState'];
				$ResidentPin1=$R['ResidentPin'];
				$BankName1=$R['BankName'];
				$BranchName1=$R['BranchName'];
				$BranchAddress1=$R['BranchAddress'];
				$BranchIFSC1=$R['BranchIFSC'];
				$BranchMICR1=$R['BranchMICR'];
				$AccountNo1=$R['AccountNo'];
			}
			
			$tblsl=$sl;
			$ufnm='sl';
			
			if($AdmissionSession!=$AdmissionSession1)
			{
				$fldnm='AdmissionSession';
				$old_val=$AdmissionSession1;
				$new_val=$AdmissionSession;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($AdmissionClass!=$AdmissionClass1)
			{
				$fldnm='AdmissionClass';
				$old_val=$AdmissionClass1;
				$new_val=$AdmissionClass;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($AdmissionSection!=$AdmissionSection1)
			{
				$fldnm='AdmissionSection';
				$old_val=$AdmissionSection1;
				$new_val=$AdmissionSection;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($AdmissionDate!=$AdmissionDate1)
			{
				$fldnm='AdmissionDate';
				$old_val=$AdmissionDate1;
				$new_val=$AdmissionDate;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($CurrentSession!=$CurrentSession1)
			{
				$fldnm='CurrentSession';
				$old_val=$CurrentSession1;
				$new_val=$CurrentSession;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($CurrentClass!=$CurrentClass1)
			{
				$fldnm='CurrentClass';
				$old_val=$CurrentClass1;
				$new_val=$CurrentClass;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($CurrentSection!=$CurrentSection1)
			{
				$fldnm='CurrentSection';
				$old_val=$CurrentSection1;
				$new_val=$CurrentSection;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($CurrentRollNo!=$CurrentRollNo1)
			{
				$fldnm='CurrentRollNo';
				$old_val=$CurrentRollNo1;
				$new_val=$CurrentRollNo;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($StudentName!=$StudentName1)
			{
				$fldnm='StudentName';
				$old_val=$StudentName1;
				$new_val=$StudentName;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($BirthDate!=$BirthDate1)
			{
				$fldnm='BirthDate';
				$old_val=$BirthDate1;
				$new_val=$BirthDate;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($Gender!=$Gender1)
			{
				$fldnm='Gender';
				$old_val=$Gender1;
				$new_val=$Gender;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($Caste!=$Caste1)
			{
				$fldnm='Caste';
				$old_val=$Caste1;
				$new_val=$Caste;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($Religion!=$Religion1)
			{
				$fldnm='Religion';
				$old_val=$Religion1;
				$new_val=$Religion;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($AadharNo!=$AadharNo1)
			{
				$fldnm='AadharNo';
				$old_val=$AadharNo1;
				$new_val=$AadharNo;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($FatherName!=$FatherName1)
			{
				$fldnm='FatherName';
				$old_val=$FatherName1;
				$new_val=$FatherName;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($FatherQualification!=$FatherQualification1)
			{
				$fldnm='FatherQualification';
				$old_val=$FatherQualification1;
				$new_val=$FatherQualification;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($FatherOccupation!=$FatherOccupation1)
			{
				$fldnm='FatherOccupation';
				$old_val=$FatherOccupation1;
				$new_val=$FatherOccupation;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($FatherMobile!=$FatherMobile1)
			{
				$fldnm='FatherMobile';
				$old_val=$FatherMobile1;
				$new_val=$FatherMobile;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($MotherName!=$MotherName1)
			{
				$fldnm='MotherName';
				$old_val=$MotherName1;
				$new_val=$MotherName;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($MotherQualification!=$MotherQualification1)
			{
				$fldnm='MotherQualification';
				$old_val=$MotherQualification1;
				$new_val=$MotherQualification;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($MotherOccupation!=$MotherOccupation1)
			{
				$fldnm='MotherOccupation';
				$old_val=$MotherOccupation1;
				$new_val=$MotherOccupation;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($MotherMobile!=$MotherMobile1)
			{
				$fldnm='MotherMobile';
				$old_val=$MotherMobile1;
				$new_val=$MotherMobile;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($GuardianName!=$GuardianName1)
			{
				$fldnm='GuardianName';
				$old_val=$GuardianName1;
				$new_val=$GuardianName;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($GuardianQualification!=$GuardianQualification1)
			{
				$fldnm='GuardianQualification';
				$old_val=$GuardianQualification1;
				$new_val=$GuardianQualification;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($GuardianOccupation!=$GuardianOccupation1)
			{
				$fldnm='GuardianOccupation';
				$old_val=$GuardianOccupation1;
				$new_val=$GuardianOccupation;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($GuardianMobile!=$GuardianMobile1)
			{
				$fldnm='GuardianMobile';
				$old_val=$GuardianMobile1;
				$new_val=$GuardianMobile;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($GuardianRelation!=$GuardianRelation1)
			{
				$fldnm='GuardianRelation';
				$old_val=$GuardianRelation1;
				$new_val=$GuardianRelation;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($PermanentVillage!=$PermanentVillage1)
			{
				$fldnm='PermanentVillage';
				$old_val=$PermanentVillage1;
				$new_val=$PermanentVillage;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($PermanentPostOffice!=$PermanentPostOffice1)
			{
				$fldnm='PermanentPostOffice';
				$old_val=$PermanentPostOffice1;
				$new_val=$PermanentPostOffice;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($PermanentPoliceStation!=$PermanentPoliceStation1)
			{
				$fldnm='PermanentPoliceStation';
				$old_val=$PermanentPoliceStation1;
				$new_val=$PermanentPoliceStation;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($PermanentDistrict!=$PermanentDistrict1)
			{
				$fldnm='PermanentDistrict';
				$old_val=$PermanentDistrict1;
				$new_val=$PermanentDistrict;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($PermanentState!=$PermanentState1)
			{
				$fldnm='PermanentState';
				$old_val=$PermanentState1;
				$new_val=$PermanentState;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($PermanentPin!=$PermanentPin1)
			{
				$fldnm='PermanentPin';
				$old_val=$PermanentPin1;
				$new_val=$PermanentPin;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($ResidentVillage!=$ResidentVillage1)
			{
				$fldnm='ResidentVillage';
				$old_val=$ResidentVillage1;
				$new_val=$ResidentVillage;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($ResidentPostOffice!=$ResidentPostOffice1)
			{
				$fldnm='ResidentPostOffice';
				$old_val=$ResidentPostOffice1;
				$new_val=$ResidentPostOffice;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($ResidentPoliceStation!=$ResidentPoliceStation1)
			{
				$fldnm='ResidentPoliceStation';
				$old_val=$ResidentPoliceStation1;
				$new_val=$ResidentPoliceStation;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($ResidentDistrict!=$ResidentDistrict1)
			{
				$fldnm='ResidentDistrict';
				$old_val=$ResidentDistrict1;
				$new_val=$ResidentDistrict;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($ResidentState!=$ResidentState1)
			{
				$fldnm='ResidentState';
				$old_val=$ResidentState1;
				$new_val=$ResidentState;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($ResidentPin!=$ResidentPin1)
			{
				$fldnm='ResidentPin';
				$old_val=$ResidentPin1;
				$new_val=$ResidentPin;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($BankName!=$BankName1)
			{
				$fldnm='BankName';
				$old_val=$BankName1;
				$new_val=$BankName;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($BranchName!=$BranchName1)
			{
				$fldnm='BranchName';
				$old_val=$BranchName1;
				$new_val=$BranchName;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($BranchAddress!=$BranchAddress1)
			{
				$fldnm='BranchAddress';
				$old_val=$BranchAddress1;
				$new_val=$BranchAddress;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($BranchIFSC!=$BranchIFSC1)
			{
				$fldnm='BranchIFSC';
				$old_val=$BranchIFSC1;
				$new_val=$BranchIFSC;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($BranchMICR!=$BranchMICR1)
			{
				$fldnm='BranchMICR';
				$old_val=$BranchMICR1;
				$new_val=$BranchMICR;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			if($AccountNo!=$AccountNo1)
			{
				$fldnm='AccountNo';
				$old_val=$AccountNo1;
				$new_val=$AccountNo;
				EditLog($tblnm,$tblsl,$ufnm,$fldnm,$old_val,$new_val,$edt,$edttm,$eby,$con);
			}
			
			$sql=mysqli_query($con,"UPDATE $tblnm SET AdmissionSession='$AdmissionSession', AdmissionClass='$AdmissionClass', AdmissionSection='$AdmissionSection', AdmissionDate='$AdmissionDate', CurrentSession='$CurrentSession', CurrentClass='$CurrentClass', CurrentSection='$CurrentSection', CurrentRollNo='$CurrentRollNo', StudentName='$StudentName', BirthDate='$BirthDate', Gender='$Gender', Caste='$Caste', Religion='$Religion', AadharNo='$AadharNo', FatherName='$FatherName', FatherQualification='$FatherQualification', FatherOccupation='$FatherOccupation', FatherMobile='$FatherMobile', MotherName='$MotherName', MotherQualification='$MotherQualification', MotherOccupation='$MotherOccupation', MotherMobile='$MotherMobile', GuardianName='$GuardianName', GuardianQualification='$GuardianQualification', GuardianOccupation='$GuardianOccupation', GuardianMobile='$GuardianMobile', GuardianRelation='$GuardianRelation', PermanentVillage='$PermanentVillage', PermanentPostOffice='$PermanentPostOffice', PermanentPoliceStation='$PermanentPoliceStation', PermanentDistrict='$PermanentDistrict', PermanentState='$PermanentState', PermanentPin='$PermanentPin', ResidentVillage='$ResidentVillage', ResidentPostOffice='$ResidentPostOffice', ResidentPoliceStation='$ResidentPoliceStation', ResidentDistrict='$ResidentDistrict', ResidentState='$ResidentState', ResidentPin='$ResidentPin', BankName='$BankName', BranchName='$BranchName', BranchAddress='$BranchAddress', BranchIFSC='$BranchIFSC', BranchMICR='$BranchMICR', AccountNo='$AccountNo', udt='$edt', udttm='$edttm', uby='$eby' WHERE sl='$sl'") or die(mysqli_error($con));
			$msg='Updated Successfully. . . ! ! ! \n Thank you. . . ! ! !';
			$returnpage="document.location='StudentList.php';";
		}
	}
	else
	{
		$msg="Sorry. . . Duplicate Entry. . . ! ! !";
		$returnpage="window.history.go(-1);";
	}
}
?>
<script>
alert('<?=$msg?>');
<?=$returnpage?>
</script>