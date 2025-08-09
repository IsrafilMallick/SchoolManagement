<?php
$requirelevel=0;
include 'ActiveUsers.php';
include "header.php";
$tblnm="main_section";

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
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
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-edit"></i> Section Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Entry</li>
                    <li class="active"> Class Management</li>
                    <li class="active"> Section Entry</li>
                </ol>
			</section>
  			<section class="content">
            	<div class="box box-success">
                	<div class="box-body">
                        <form name="form1" id="form1" method="post" action="SectionEntrys.php" enctype="multipart/form-data">
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
	var Session=$('#Session').val();
	var Class=$('#Class').val();
	var SectionName=$('#SectionName').val();
	$('#show').load('SectionEntryShow.php?Session='+Session+'&Class='+Class+'&SectionName='+SectionName).fadeIn('fast');
}

function pagnt(pno)
{
   	var ps=$('#ps').val();
	var Session=$('#Session').val();
	var Class=$('#Class').val();
	var SectionName=$('#SectionName').val();
	$('#show').load('SectionEntryShow.php?pno='+pno+'&ps='+ps+'&Session='+Session+'&Class='+Class+'&SectionName='+SectionName).fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1()
{
	var pno=$('#pgn').val();
	pagnt(pno);
}
</script>