<?php
$requirelevel=-1;
include 'ActiveUsers.php';
include "header.php";
$TableName='account_ledg';

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}

$sql=mysqli_query($con,"SELECT * FROM $TableName WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sl=$R['sl'];
    $PrimarySerial=$R['PrimarySerial'];
    $GroupSerial=$R['GroupSerial'];
    $LedgerName=$R['LedgerName'];
    $CostStatus=$R['CostStatus'];
    $BranchName=$R['BranchName'];
    $BranchAddress=$R['BranchAddress'];
    $BranchIFSC=$R['BranchIFSC'];
    $AccountNo=$R['AccountNo'];
    $Address=$R['Address'];
    $MobileNo=$R['MobileNo'];
    $PanNo=$R['PanNo'];
    $GstNo=$R['GstNo'];
}
if(empty($sl)){$sl='';}
if(empty($PrimarySerial)){$PrimarySerial='';}
if(empty($GroupSerial)){$GroupSerial='';}
if(empty($LedgerName)){$LedgerName='';}
if(empty($CostStatus)){$CostStatus='';}
if(empty($BranchName)){$BranchName='';}
if(empty($BranchAddress)){$BranchAddress='';}
if(empty($BranchIFSC)){$BranchIFSC='';}
if(empty($AccountNo)){$AccountNo='';}
if(empty($Address)){$Address='';}
if(empty($MobileNo)){$MobileNo='';}
if(empty($PanNo)){$PanNo='';}
if(empty($GstNo)){$GstNo='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-database"></i> Ledger Head</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Accounts</li>
                    <li class="active">Setup</li>
                    <li class="active"> Ledger Head</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
                    <form name="form1" id="form1" method="post" action="LedgerHeads.php">
                    	<input type="hidden" name="sl" id="sl" value="<?=$PrimarySerial?>">
                    	<div class="box-body">
                        	<div class="row">
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Group Name</label>
                                        <select id="GroupSerial" name="GroupSerial" class="form-control" onChange="show();GetLedgDtl(this.value)">
                                        <option value="">---Select---</option>
                                        <?php
                                        $sql=mysqli_query($con,"SELECT * FROM account_group WHERE stat=0 ORDER BY GroupName");
                                        while($R=mysqli_fetch_array($sql))
                                        {
                                            $GroupSerial1=$R['sl'];
                                            $PrimarySerial=$R['PrimarySerial'];
                                            $GroupName=$R['GroupName'];
                                            $PrimaryName=get_value('account_primary','sl',$PrimarySerial,'PrimaryName','',$con);
                                            ?><option value="<?=$GroupSerial1; ?>"<?=$GroupSerial1==$GroupSerial ? 'selected' : '';?>><?="$GroupName ($PrimaryName)";?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Ledger Name</label>
                                        <input  type="text" name="LedgerName" id="LedgerName" value="<?=$LedgerName?>" class="form-control" onKeyUp="show()"/>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Avail Cost Centre?</label>
                                        <select id="CostStatus" name="CostStatus" class="form-control" onChange="show()">
                                            <option value="">---Select---</option>
                                            <option value="0"<?=$CostStatus==0||$CostStatus=="" ? 'selected' : '';?>>NO</option>
                                            <option value="1"<?=$CostStatus==1 ? 'selected' : '';?>>YES</option>
                                        </select>
                                    </div>
								</div>
                            </div>
                            
                            
                            
                            <hr />
                            <div id="tblbody" class="card-footer" style="text-align:center;">
                                <input type="submit" name="submtbtn" id="submtbtn" value="<?=$btnval?>" class="<?=$btnclass?>">
                            </div>
						</div>
                    
                    <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <td colspan="6">
                            <table id="bankdtl" class="table table-hover table-striped table-bordered" style="display:none;">
                            <tr><td id="tblttl" colspan="4">Bank Details</td></tr>
                            <tr>
                                <td id="tblhedrow">IFSC Code : </td>
                                <td id="tblbody"><input type="text" name="BranchIFSC" id="BranchIFSC" value="<?php echo $BranchIFSC;?>" maxlength="11" class="form-control UpperCase" onClick="this.select();" onBlur="get_bankdetails('','',this.value)"></td>
                                <td id="tblhedrow">Account No. : </td>
                                <td id="tblbody"><input type="text" name="AccountNo" id="AccountNo" value="<?=$AccountNo?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td id="tblhedrow">Branch Name : </td>
                                <td id="tblbody"><input type="text" name="BranchName" id="BranchName" value="<?=$BranchName?>" class="form-control"></td>
                                <td id="tblhedrow">Branch Address : </td>
                                <td id="tblbody"><input type="text" name="BranchAddress" id="BranchAddress" value="<?=$BranchAddress?>" class="form-control"></td>
                            </tr>
                            </table>
                            
                            <table id="ledgdtl" class="table table-hover table-striped table-bordered" style="display:none;">
                            <tr><td id="tblttl" colspan="4">Ledger Details</td></tr>
                            <tr>
                                <td id="tblhedrow">Address : </td>
                                <td id="tblbody"><input type="text" name="Address" id="Address" value="<?=$Address?>" class="form-control"></td>
                                <td id="tblhedrow">Contact No. : </td>
                                <td id="tblbody"><input type="text" name="MobileNo" id="MobileNo" value="<?=$MobileNo?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td id="tblhedrow">PAN No. : </td>
                                <td id="tblbody"><input type="text" name="PanNo" id="PanNo" value="<?=$PanNo?>" class="form-control"></td>
                                <td id="tblhedrow">GST No. : </td>
                                <td id="tblbody"><input type="text" name="GstNo" id="GstNo" value="<?=$GstNo?>" class="form-control"></td>
                            </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" id="tblbody"><input type="submit" name="sub" id="sub" value="<?=$btnval?>" class="<?=$btnclass?>"></td>
                    </tr>
                    </table>
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
	var LedgerName=document.getElementById('LedgerName').value;
	var CostStatus=document.getElementById('CostStatus').value;
	$('#show').load('LedgerHeadShow.php?GroupSerial='+GroupSerial+'&LedgerName='+encodeURI(LedgerName)+'&CostStatus='+CostStatus).fadeIn('fast');
}

function pagnt(pno)
{
	var ps=document.getElementById('ps').value;
	var GroupSerial=document.getElementById('GroupSerial').value;
	var LedgerName=document.getElementById('LedgerName').value;
	var CostStatus=document.getElementById('CostStatus').value;
	$('#show').load("LedgerHeadShow.php?pno="+pno+"&ps="+ps+"&GroupSerial="+GroupSerial+'&LedgerName='+encodeURI(LedgerName)+'&CostStatus='+CostStatus).fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1(pno)
{
	pno=document.getElementById('pgn').value;
	pagnt(pno);
}

GetLedgDtl('<?=$GroupSerial?>');
function GetLedgDtl(GroupSerial)
{
	$.get('GetLedgDtl.php?GroupSerial='+GroupSerial, function(flag) 
	{
		if(flag=='1')
		{
			$('#bankdtl').show();
			$('#ledgdtl').hide();
		}
		else
		if(flag=='2')
		{
			$('#ledgdtl').show();
			$('#bankdtl').hide();
		}
		else
		{
			$('#bankdtl').hide();
			$('#ledgdtl').hide();
		}
	});
}

function get_bankdetails(banknm,BranchName,BranchIFSC)
{
	//$('#banknm').val('');
	$('#BranchName').val('');
	$('#BranchIFSC').val('');
	//$('#micr').val('');
	$('#BranchAddress').val('');
	$('#AccountNo').val('');
	
	$.get('get_bankdetails.php?banknm='+encodeURI(banknm)+'&BranchName='+encodeURI(BranchName)+'&BranchIFSC='+BranchIFSC, function(data) 
	{
		var val=data.split("@@");
		var banknm=val.shift();
		var BranchName=val.shift();
		var BranchIFSC=val.shift();
		var micr=val.shift();
		var BranchAddress=val.shift();
		
		//if(banknm!=""){$('#banknm').val(banknm);$('#AccountNo').focus();}
		if(BranchName!=""){$('#BranchName').val(BranchName);}
		if(BranchIFSC!=""){$('#BranchIFSC').val(BranchIFSC);}
		//if(micr!=""){$('#micr').val(micr);}
		if(BranchAddress!=""){$('#BranchAddress').val(BranchAddress);}
	});
}
</script>