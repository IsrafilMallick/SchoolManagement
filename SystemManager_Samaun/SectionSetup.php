<?php
$requirelevel=0;
include 'ActiveUsers.php';
$tblnm="main_section";

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}

$sql=mysqli_query($con,"SELECT * FROM main_section WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sl=$R['sl'];
    $Session=$R['Session'];
    $Class=$R['Class'];
    $SectionName=$R['SectionName'];
}
if(empty($sl)){$sl='';}
if(empty($Session)){$Session='';}
if(empty($Class)){$Class='';}
if(empty($SectionName)){$SectionName='';}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Section Setup</title>
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
						<h1 class="m-0">Section Setup</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Student Management</li>
							<li class="breadcrumb-item active">Setup</li>
							<li class="breadcrumb-item active">Section Setup</li>
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
								<h3 class="card-title">Section Setup</h3>
							</div>
							<div class="card-body">
								<form name="form1" id="form1" method="post" action="SectionSetups.php">
								<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label>Session</label>
											<select name="Session" id="Session" class="form-control" onChange="show()" required >
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
											<label>Class</label>
											<select name="Class" id="Class" class="form-control" onChange="show()" required>
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
											<label>Section Name</label>
											<input type="text" name="SectionName" id="SectionName" value="<?php echo $SectionName;?>" placeholder="Enter Section Name" class="form-control" onKeyUp="show()">
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