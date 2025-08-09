<?php
$requirelevel=3;
include 'ActiveUsers.php';
include 'header.php';
$TableName='ProductData';

$sl=isset($_REQUEST['sl']) ? $_REQUEST['sl'] : '';
if($sl==""){$btnval="Submit"; $btnclass="btn btn-success";}else{$btnval="Update"; $btnclass="btn btn-warning";}

$sql=mysqli_query($con,"SELECT * FROM $TableName WHERE sl='$sl'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
    $sl=$R['sl'];
    $CompanyType=$R['CompanyType'];
    $Company=$R['Company'];
    $ProductName=$R['ProductName'];
    $ProductConfiguration=$R['ProductConfiguration'];
    $PiecePerBox=$R['PiecePerBox'];
    $HsnSac=$R['HsnSac'];
    $GstRate=$R['GstRate'];
}
if(empty($sl)){$sl='';}
if(empty($CompanyType)){$CompanyType='';}
if(empty($Company)){$Company='';}
if(empty($ProductName)){$ProductName='';}
if(empty($ProductConfiguration)){$ProductConfiguration='';}
if(empty($PiecePerBox)){$PiecePerBox='';}
if(empty($HsnSac)){$HsnSac='';}
if(empty($GstRate)){$GstRate='';}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-edit fa-lg"></i> Product Entry</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Entry</li>
                    <li class="active"> Product Entry</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
                	<form name="form" id="form" method="post" action="ProductEntrys.php" enctype="multipart/form-data">
						<input type="hidden" name="sl" id="sl" value="<?=$sl;?>">
                        <div class="box-body">
                        	<div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Type of the Company</label>
                                        <select name="CompanyType" id="CompanyType" class="form-control" onchange="show(), GetCompany('CompanyDivision','Company',this.value,'1')" required>
                                        <option value="">--- Select ---</option>
                                        <?php
										$sql=mysqli_query($con,"SELECT * FROM CompanyType WHERE stat='0'") or die(mysqli_error($con));
										while($R=mysqli_fetch_array($sql))
										{
											$CompanyTypeSerial=$R['sl'];
											$CompanyTypeName=$R['CompanyType'];
											?><option value="<?=$CompanyTypeSerial?>" <?=$CompanyType==$CompanyTypeSerial ? 'selected' : ''?>><?=$CompanyTypeName;?></option><?php
										}
										?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Name of the Company</label>
                                        <div id="CompanyDivision">
                                            <select name="Company" id="Company" class="form-control" onchange="show()" required>
                                            <option value="">--- Select ---</option>
                                            <?php
                                            $sql=mysqli_query($con,"SELECT sl, CompanyName FROM main_company WHERE sl='$Company' AND stat='0'") or die(mysqli_error($con));
                                            while($R=mysqli_fetch_array($sql))
                                            {
                                                $Companysl=$R['sl'];
                                                $CompanyName=$R['CompanyName'];
                                                ?><option value="<?=$Companysl?>" <?=$Companysl==$Company ? 'selected' : ''?>><?=$CompanyName;?></option><?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Product Name</label>
                                        <input type="text" name="ProductName" id="ProductName" value="<?=$ProductName;?>" class="form-control" onkeyup="show()" required>
                                    </div>
								</div>
                        	</div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label id="tblhedrow">Product Configuration</label>
                                        <input type="text" name="ProductConfiguration" id="ProductConfiguration" value="<?=$ProductConfiguration;?>" class="form-control" onkeyup="show()" required>
                                    </div>
								</div>
                        	</div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">Pieces per Box</label>
                                        <input type="text" name="PiecePerBox" id="PiecePerBox" value="<?=$PiecePerBox;?>" class="form-control" onclick="this.select()" onkeypress="return NumberOnly(event)" onkeyup="show()" required>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">HSN/ SAC Code</label>
                                        <input type="text" name="HsnSac" id="HsnSac" value="<?=$HsnSac;?>" class="form-control" onkeypress="return NumberOnly(event)" required />
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label id="tblhedrow">GST Rate (%)</label>
                                        <input type="text" name="GstRate" id="GstRate" value="<?=$GstRate;?>" class="form-control" onkeypress="return NumberOnly(event)" required />
                                    </div>
								</div>
							</div>
                            <hr />
                            <div class="card-footer" style="text-align:center;">
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
$('#CompanyType').chosen({no_results_text: "Oops, nothing found!",});
$('#Company').chosen({no_results_text: "Oops, nothing found!",});
function GetCompany(TargetFieldDiv,TargetFieldName,SourceFieldValue,FunctionType)
{
	$('#'+TargetFieldDiv).load('GetCompany.php?TargetFieldName='+TargetFieldName+'&SourceFieldValue='+SourceFieldValue+'&FunctionType='+FunctionType).fadeIn('fast');
}

$(document).ready(function(){show();});
function show()
{	
	var CompanyType=$('#CompanyType').val();
	var Company=$('#Company').val();
	var ProductName=encodeURI($('#ProductName').val());
	var PiecePerBox=$('#PiecePerBox').val();
	var HsnSac=$('#HsnSac').val();
	var GstRate=$('#GstRate').val();
	$('#show').load('ProductEntryShow.php?CompanyType='+CompanyType+'&Company='+Company+'&ProductName='+ProductName+'&PiecePerBox='+PiecePerBox+'&HsnSac='+HsnSac+'&GstRate='+GstRate).fadeIn('fast');
}

function pagnt(pno)
{
   	var ps=$('#ps').val();
	var CompanyType=$('#CompanyType').val();
	var Company=$('#Company').val();
	var ProductName=encodeURI($('#ProductName').val());
	var PiecePerBox=$('#PiecePerBox').val();
	var HsnSac=$('#HsnSac').val();
	var GstRate=$('#GstRate').val();
	$('#show').load('ProductEntryShow.php?pno='+pno+'&ps='+ps+'&CompanyType='+CompanyType+'&Company='+Company+'&ProductName='+ProductName+'&PiecePerBox='+PiecePerBox+'&HsnSac='+HsnSac+'&GstRate='+GstRate).fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1()
{
	var pno=$('#pgn').val();
	pagnt(pno);
}
</script>
