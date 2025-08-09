<?php
$requirelevel=0;
include 'ActiveUsers.php';
include "header.php";
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
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-edit"></i> Class Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Entry</li>
                    <li class="active"> Class Management</li>
                    <li class="active"> Class Entry</li>
                </ol>
			</section>
  			<section class="content">
            	<div class="box box-success">
                	<div class="box-body">
                        <form name="form1" id="form1" method="post" action="ClassEntrys.php" enctype="multipart/form-data">
                            <input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
                            <div class="form-group">
                                <label>Class Name</label>
                                <input type="text" name="ClassName" id="ClassName" value="<?php echo $ClassName;?>" placeholder="Enter Class Name" class="form-control">
                            </div>
                            <div class="card-footer center">
                                <input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
                            </div>	
                        </form>
                    </div>
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
	var ClassName=$('#ClassName').val();	
	$('#show').load('ClassEntryShow.php?ClassName='+ClassName).fadeIn('fast');
}

function pagnt(pno)
{
   	var ps=$('#ps').val();
	var ClassName=$('#ClassName').val();
	$('#show').load('ClassEntryShow.php?pno='+pno+'&ps='+ps+'&ClassName='+ClassName).fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1()
{
	var pno=$('#pgn').val();
	pagnt(pno);
}
</script>