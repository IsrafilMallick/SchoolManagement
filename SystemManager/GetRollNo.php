<?php
include 'connect.php';
$tblnm="main_student_data";

$CurrentSession=isset($_REQUEST['Session']) ? $_REQUEST['Session'] : '';
$CurrentClass=isset($_REQUEST['Class']) ? $_REQUEST['Class'] : '';
$CurrentSection=isset($_REQUEST['Section']) ? $_REQUEST['Section'] : '';
$CurrentRollNo=0;

$sql=mysqli_query($con,"SELECT CurrentRollNo FROM $tblnm WHERE CurrentSession='$CurrentSession' AND CurrentClass='$CurrentClass' AND CurrentSection='$CurrentSection' ORDER BY CurrentRollNo DESC LIMIT 0,1") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $CurrentRollNo=$R['CurrentRollNo'];
}
$CurrentRollNo+=1;
echo $CurrentRollNo;
?>