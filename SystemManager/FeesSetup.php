<?php
$requirelevel=3;
include 'ActiveUsers.php';
include 'header.php';
$tblnm='main_fees_head';

$Session=isset($_REQUEST['Session']) ? $_REQUEST['Session'] : $sesn;
$Class=isset($_REQUEST['Class']) ? $_REQUEST['Class'] : '';
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-university"></i> Fees Setup</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Fees</li><li class="active"> Fees Setup</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
					<form name="Form1" id="Form1" method="post" action="FeesSetups.php">
						<div class="box-body">
							<div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="tblhedrow">Session</label>
										<select name="Session" id="Session" class="form-control" onChange="GetClass('CalssDiv','Class',this.value,'1');show()" required>
                                        <option value="">--- Select ---</option>
                                        <?php
                                        for($i=$sesn;$i>2015;$i--)
                                        {
                                            ?><option value="<?=$i?>" <?=$i==$Session ? 'selected' : ''?>><?=$i?> - <?=$i+1?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="tblhedrow">Calss</label>
                                        <div id="CalssDiv">
                                        <select name="Class" id="Class" class="form-control" onChange="show()" required>
                                        <option value="">--- Select ---</option>
                                        <?php
										$sql=mysqli_query($con,"SELECT Class FROM main_section WHERE Session='$Session' AND stat=0 GROUP BY Class ORDER BY Class") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
											$ClassSl=$R['Class'];
											$ClassName=get_value('main_class','sl',$ClassSl,'ClassName','',$con);
											?><option value="<?=$ClassSl?>" <?=$ClassSl==$Class ? 'selected' : ''?>><?=$ClassName?></option><?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
                        <hr />
                        <div id="show"></div>
					</form>
                    <hr />
					<div id="showdiv"></div>
				</div>
			</section>
		</aside>
	</div>
	<?php include 'footer.php';?>
</body>
</html>
<script>
function GetClass(TargetFieldDiv,TargetFieldName,SourceFieldValue,FunctionType)
{
	$('#'+TargetFieldDiv).load('GetClass.php?TargetFieldName='+TargetFieldName+'&SourceFieldValue='+SourceFieldValue+'&FunctionType='+FunctionType).fadeIn('fast');
}

$(document).ready(function(){show();});
function show()
{
	var Session=$('#Session').val();
	var Class=$('#Class').val();
	$('#show').load('FeesSetupShow.php?Session='+Session+'&Class='+Class).fadeIn('fast');
}

function get_amount1(cnt,ledghed,tothed)
{
	var totamnt=0;
	var ldgr=document.getElementsByName('amnt'+ledghed+'[]');
	var frmlen=ldgr.length;
	for(i=0;i<frmlen;i++)
	{
		var recvamnt=ldgr[i].value;	if(recvamnt==""){recvamnt=0;}
		totamnt=parseInt(totamnt)+parseInt(recvamnt);
	}
	document.getElementById('Amnt'+cnt).innerHTML=totamnt;
	
	get_amount(ledghed,tothed);
}

function get_amount(ledghed,tothed)
{
	var AMNT=0;
	for(i=1;i<=tothed;i++)
	{
		var amnt=document.getElementById('Amnt'+i).innerHTML;
		AMNT=parseInt(AMNT)+parseInt(amnt);
	}
	document.getElementById('AMNT').innerHTML=AMNT;
}
</script>