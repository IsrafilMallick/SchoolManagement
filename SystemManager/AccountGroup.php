<?php
$requirelevel=-1;
include 'ActiveUsers.php';
include "header.php";
$TableName='account_group';

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}
$sql=mysqli_query($con,"SELECT * FROM $TableName WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sl=$R['sl'];
    $PrimarySerial=$R['PrimarySerial'];
    $GroupName=$R['GroupName'];
}
if(empty($sl)){$sl='';}
if(empty($PrimarySerial)){$PrimarySerial='';}
if(empty($GroupName)){$GroupName='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-users"></i> Group Head</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Accounts</li>
                    <li class="active">Setup</li>
                    <li class="active"> Group Head</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
                    <form name="form1" id="form1" method="post" action="AccountGroups.php">
                    	<input type="hidden" name="sl" id="sl" value="<?=$sl?>">
                        <div class="box-body">
                        	<div class="row">
                            	<div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="tblhedrow">Primary Account</label>
                                        <select id="PrimarySerial" name="PrimarySerial" class="form-control" onChange="show()">
                                        <option value="">---Select---</option>
                                        <?php
                                        $sql=mysqli_query($con,"SELECT * FROM account_primary");
                                        while($R=mysqli_fetch_array($sql))
                                        {
                                            $PrimarySerial1=$R['sl'];
                                            $PrimaryName=$R['PrimaryName'];
                                            ?><option value="<?=$PrimarySerial1;?>" <?=$PrimarySerial==$PrimarySerial1? 'selected' : ''?>><?=$PrimaryName?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="tblhedrow">Group Name</label>
                                        <input type="text" name="GroupName" id="GroupName" value="<?=$GroupName?>" class="form-control" onKeyUp="show()"/>
                                    </div>
								</div>
                            </div>
                            <hr />
                            <div id="tblbody" class="card-footer" style="text-align:center;">
                                <input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>">
                            </div>
						</div>
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
$('#PrimarySerial').chosen({no_results_text: "Oops, nothing found!",});
$(document).ready(function(){show();});
function show()
{
	var PrimarySerial=document.getElementById('PrimarySerial').value;
	var GroupName=document.getElementById('GroupName').value;
	$('#show').load('AccountGroupShow.php?PrimarySerial='+PrimarySerial+'&GroupName='+encodeURI(GroupName)).fadeIn('fast');
}

function pagnt(pno)
{
	var ps=document.getElementById('ps').value;
	var PrimarySerial=document.getElementById('PrimarySerial').value;
	var GroupName=document.getElementById('GroupName').value;
	$('#show').load("AccountGroupShow.php?pno="+pno+"&ps="+ps+"&PrimarySerial="+PrimarySerial+'&GroupName='+encodeURI(GroupName)).fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1()
{
	pno=document.getElementById('pgn').value;
	pagnt(pno);
}
</script>