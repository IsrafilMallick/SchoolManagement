<?php
$requirelevel=0;
include 'ActiveUsers.php';
$tblnm="main_student_data";

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}
$sql=mysqli_query($con,"SELECT * FROM main_student_data WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sl=$R['sl'];
    $StudentID=$R['StudentID'];
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
if(empty($StudentID)){$StudentID='';}
if(empty($AdmissionSession)){$AdmissionSession=$sesn;}
if(empty($AdmissionClass)){$AdmissionClass='';}
if(empty($AdmissionDate)){$AdmissionDate=date('d-m-Y', strtotime($edt));;}else{$AdmissionDate=date('d-m-Y', strtotime($AdmissionDate));}
if(empty($CurrentSession)){$CurrentSession=$sesn;}
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Entry</title>
	<link rel="icon" href="<?php echo $logo?>" width="5" height="5" >
	<?php include_once "templateCss.php";?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">
	<div class="preloader flex-column justify-content-center align-items-center">
		<img class="animation__shake" src="<?php echo $logo?>" alt="St. Mary Public School" height="25%">
	</div>
	<?php include_once "navBar.php";?>
	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Student Entry</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Student Management</li>
							<li class="breadcrumb-item active">Entry</li>
							<li class="breadcrumb-item active">Student Entry</li>
						</ol>
					</div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">				
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Student Entry</h3>
							</div>
							<div class="card-body">
								<form name="form1" id="form1" method="post" action="SectionSetups.php">
								<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label>Admission Session</label>
											<select name="AdmissionSession" id="AdmissionSession" class="form-control" required >
											<option value="">--- Select ---</option>				
											<?php
											for($i=$sesn+1;$i>=2021;$i--)
											{
												?><option value="<?=$i;?>" <?=$i==$AdmissionSession ? 'selected' : ''?>><?=$i;?> - <?=$i+1;?></option><?php
											}
											?>					                
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>Admission Class</label>
											<select name="AdmissionClass" id="AdmissionClass" class="form-control" required>
											<option value="">--- Select ---</option>
											<?php
											$sql=mysqli_query($con,"SELECT sl, ClassName FROM main_class WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
											while($R=mysqli_fetch_array($sql))
											{
												$Classsl=$R['sl'];
												$ClassName=$R['ClassName'];
												?><option value="<?php echo $Classsl;?>" <?=$Classsl==$AdmissionClass ? 'selected' : ''?>><?php echo $ClassName;?></option><?php
											}
											?>
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>Admission Date</label>
											<input type="text" name="AdmissionDate" id="AdmissionDate" value="<?php echo $AdmissionDate;?>" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label>Current Session</label>
											<select name="CurrentSession" id="CurrentSession" class="form-control" required >
											<option value="">--- Select ---</option>				
											<?php
											for($i=$sesn+1;$i>=2021;$i--)
											{
												?><option value="<?=$i;?>" <?=$i==$sesn ? 'selected' : ''?>><?=$i;?> - <?=$i+1;?></option><?php
											}
											?>					                
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>Current Class</label>
											<select name="CurrentClass" id="CurrentClass" class="form-control" required>
											<option value="">--- Select ---</option>
											<?php
											$sql=mysqli_query($con,"SELECT sl, ClassName FROM main_class WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
											while($R=mysqli_fetch_array($sql))
											{
												$Classsl=$R['sl'];
												$ClassName=$R['ClassName'];
												?><option value="<?php echo $Classsl;?>" <?=$Classsl==$Class ? 'selected' : ''?>><?php echo $ClassName;?></option><?php
											}
											?>
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>Current Section</label>
											<input type="text" name="CurrentSection" id="CurrentSection" value="<?php echo $AdmissionDate;?>" class="form-control">
										</div>
									</div>
								</div>
								<div class="card-footer">
									<input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
								</div>
							</form>
							<hr />
							<div id="show"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php include_once "footer.php";?>
	<aside class="control-sidebar control-sidebar-dark"></aside>
</div>
<?php include_once "templateJs.php";?>
</body>
</html>
<script>
$(document).ready(function(){show();});
function show()
{
	var Session=$('#Session').val();
	var Class=$('#Class').val();
	var SectionName=$('#SectionName').val();
	$('#show').load('SectionSetupShow.php?Session='+Session+'&Class='+Class+'&SectionName='+SectionName).fadeIn('fast');
}
</script>