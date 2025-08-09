<?php
$requirelevel=3;
include 'ActiveUsers.php';
include "header.php";
$tblnm="main_fees_head";

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}

$sql=mysqli_query($con,"SELECT * FROM $tblnm WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sl=$R['sl'];
    $PrimarySerial=$R['PrimarySerial'];
    $GroupSerial=$R['GroupSerial'];
    $LedgerHead=$R['LedgerHead'];
    $FeesHead=$R['FeesHead'];
    $FeesType=$R['FeesType'];
}
if(empty($sl)){$sl='';}
if(empty($PrimarySerial)){$PrimarySerial='';}
if(empty($GroupSerial)){$GroupSerial='';}
if(empty($LedgerHead)){$LedgerHead='';}
if(empty($FeesHead)){$FeesHead='';}
if(empty($FeesType)){$FeesType='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-university"></i> Fees Head Setup</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Fees</li><li class="active"> Fees Head Setup</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
					<form name="form1" id="form1" method="post" action="FeesHeadSetups.php">
						<input type="hidden" name="sl" id="sl" value="<?=$sl?>">
                        <div class="box-body">
                        	<div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Group Name</label>
                                        <select id="GroupSerial" name="GroupSerial" class="form-control" onChange="show()">
                                        <option value="">---Select---</option>
                                        <?php
                                        $sql=mysqli_query($con,"SELECT * FROM account_group WHERE stat=0 ORDER BY GroupName") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
											$sl=$R['sl'];
                                            $PrimarySerial=$R['PrimarySerial'];
                                            $GroupName=$R['GroupName'];
                                            $PrimaryAccountName=get_value('account_primary','sl',$PrimarySerial,'PrimaryName','',$con);
                                            ?><option value="<?=$sl; ?>"<?=$sl==$GroupSerial ? 'selected' : '';?>><?="$GroupName ($PrimaryAccountName)";?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Fees Type</label>
                                        <select id="FeesType" name="FeesType" class="form-control" onChange="show()">
                                        <option value="">---Select---</option>
                                        <?php
										for($i=1;$i<count($FeesTypes);$i++)
										{
											?><option value="<?=$i;?>"<?=$FeesType==$i ? 'selected' : '';?>><?=$FeesTypes[$i];?></option><?php
										}
										?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Fees Head</label>
                                        <input  type="text" name="FeesHead" id="FeesHead" value="<?=$FeesHead?>" class="form-control" placeholder="Fees Head Name" onKeyUp="show()"/>
                                    </div>
								</div>
							</div>
                            <hr />
                            <div class="card-footer" style="text-align:center;">
                                <input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
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
$('#GroupSerial').chosen({no_results_text: "Oops, nothing found!",});
$(document).ready(function(){show();});
function show()
{
	var GroupSerial=document.getElementById('GroupSerial').value;
	var FeesHead=document.getElementById('FeesHead').value;
	var FeesType=document.getElementById('FeesType').value;
	$('#show').load('FeesHeadSetupShow.php?GroupSerial='+GroupSerial+'&FeesHead='+encodeURI(FeesHead)+'&FeesType='+FeesType).fadeIn('fast');
}

function pagnt(pno)
{
	var ps=document.getElementById('ps').value;
	var GroupSerial=document.getElementById('GroupSerial').value;
	var FeesHead=document.getElementById('FeesHead').value;
	var FeesType=document.getElementById('FeesType').value;
	$('#show').load("FeesHeadSetupShow.php?pno="+pno+"&ps="+ps+"&GroupSerial="+GroupSerial+"&FeesHead="+encodeURI(FeesHead)+'&FeesType='+FeesType).fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1(pno)
{
	pno=document.getElementById('pgn').value;
	pagnt(pno);
}
</script>