<?php
$requirelevel=0;
include 'ActiveUsers.php';
$tblnm="main_class";

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $ClassName=$R['ClassName'];
}
if(empty($ClassName)){$ClassName='';}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Class Entry</title>
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
						<h1 class="m-0">Class Entry</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Entry</li>
							<li class="breadcrumb-item active">Class Entry</li>
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
								<h3 class="card-title">Class Entry</h3>
							</div>
							<div class="card-body">
								<form name="form1" id="form1" method="post" action="ClassEntrys.php">
									<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
									<div class="form-group">
										<label>Class Name</label>
										<input type="text" name="ClassName" id="ClassName" value="<?php echo $ClassName;?>" placeholder="Enter Class Name" class="form-control">
									</div>
									<div class="card-footer">
										<input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
									</div>	
								</form>
							</div>
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
	var ClassName=$('#ClassName').val();
	$('#show').load('ClassEntryShow.php?ClassName='+ClassName).fadeIn('fast');
}
</script>