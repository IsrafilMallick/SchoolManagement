<?php
$requirelevel=-1;
include 'ActiveUsers.php';
include "header.php";
$tblnm='main_relation';

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sl=$R['sl'];
    $relation=$R['relation'];
}
if(empty($sl)){$sl='';}
if(empty($relation)){$relation='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-edit"></i> Relation Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Entry</li><li class="active"> Relation Entry</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="form1" id="form1" method="post" action="RelationEntrys.php">
<input type="hidden" name="rollsl" id="rollsl" value="<?=$rollsl1?>">
<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
<table class="table table-hover table-striped table-bordered">
<tr>
    <td id="tblhedrow"><font color="#FF0000" size="+2">*</font> Relation : </td>
    <td id="tblbodynm"><input type="text" name="relation" id="relation" value="<?php echo $relation;?>" class="form-control" onKeyUp="show()" required></td>
    <td id="tblbody"><input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
</tr>
</table>
</form>
<hr />
<div id="show"></div>
				</div>
			</section>
		</aside>
	</div>
	<?php include 'footer.php';?>
</body>
</html>
<script>
$(document).ready(function(){show();});
function show()
{
	var relation=document.getElementById('relation').value;
	$('#show').load('RelationEntryShow.php?relation='+relation).fadeIn('fast');
}
</script>