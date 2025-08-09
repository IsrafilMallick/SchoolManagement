<?php
$requirelevel=0;
include 'ActiveUsers.php';
$sl=$_REQUEST['sl'];
$div=$_REQUEST['div'];
$table=$_REQUEST['table'];
$field=$_REQUEST['field'];

$btnnm=rawurldecode($_REQUEST['btnnm']);
$class=rawurldecode($_REQUEST['class']);
$acttl=rawurldecode($_REQUEST['acttl']);

if($btnnm=='Active'){$btnnm='Deactive';}else
if($btnnm=='Deactive'){$btnnm='Active';}else
if($btnnm=='Publish'){$btnnm='Revoke Publish';}else
if($btnnm=='Revoke Publish'){$btnnm='Publish';}

if($class=='fa fa-eye fa-lg'){$class='fa fa-eye-slash fa-lg';}else
if($class=='fa fa-eye-slash fa-lg'){$class='fa fa-eye fa-lg';}

if($acttl=='Click to Active'){$acttl='Click to Deactive';}else
if($acttl=='Click to Deactive'){$acttl='Click to Active';}else
if($acttl=='Click to Publish'){$acttl='Click to Revoke Publish';}else
if($acttl=='Click to Revoke Publish'){$acttl='Click to Publish';}

$query=mysqli_query($con,"SELECT * FROM $table WHERE sl='$sl'");
while($M=mysqli_fetch_array($query))
{
	$stat=$M[$field];
}

$actbtn="<i class='$class'></i>";
if($stat==0)
{
	$stat=1;
	$acttl='Click to Active';
}
else
{
	$stat=0;
	$acttl='Click to Deactive';
}
mysqli_query($con,"UPDATE $table SET $field='$stat' WHERE sl='$sl'") or die(mysqli_error());
?>
<a onclick="activation('<?=$sl?>','<?=$div?>','<?=$table?>','<?=$field?>','<?=$class?>','<?=$btnnm?>','<?=$stat?>','<?=$acttl?>')" title="<?=$acttl?>">
<?=$actbtn?>
</a>