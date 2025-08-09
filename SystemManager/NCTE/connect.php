<?php
include 'ServerDetail.php';
$con=mysqli_connect($servername,$username,$password,$databasename) or die (mysqli_error);

if(mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
$Months=array('NA','JANUARY','FEBRUARY','MARCH','APRIL','MAY','JUNE','JULY','AUGUST','SEPTEMBER','OCTOBER','NOVEMBER','DECEMBER');
$Days=array('NA','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
$Eligibilitys=array('NA','Primary','Eight','Madhyamik','Higher Secondary','Under Graduate','Post Graduate');

$sesn=date('Y');
$mnth=date('m');
$edt=date("Y-m-d");
$edttm=date('d-m-Y h:i:s A');
include 'functions.php';

$strtyr=2021;
$calias='NCTE, Mayapur';
$msgstat=1;
$sql=mysqli_query($con,"SELECT * FROM main_cname WHERE sl='1'") or die(mysqli_query($con));
while($R=mysqli_fetch_array($sql))
{
	$cname=$R['cname'];
	$ctag=$R['ctag'];
	$caddr=$R['caddr'];
	$Cmob=$R['mob'];
	$Cemail=$R['email'];
	$Curl=$R['url'];
}

$logo='pic/logo.png';
mysqli_query ($con,"set character_set_client='utf8'");
mysqli_query ($con,"set character_set_results='utf8'");
mysqli_query ($con,"set collation_connection='ucs2_unicode_ci'");
?>