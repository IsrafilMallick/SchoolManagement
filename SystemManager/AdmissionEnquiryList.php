<?php
$requirelevel=3;
include 'ActiveUsers.php';
include "header.php";
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-list-ol"></i> Admission Enquery List</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Admission</li><li class="active"> Admission Enquery List</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<table class="table table-hover table-striped table-bordered">
<tr>
	<td id="tblhedrow">Session:</td>
    <td id="tblbody">
    <select id="EnquirySession" name="EnquirySession" class="form-control" onChange="GetClass('EnquiryCalssDiv','EnquiryCalss',this.value,0);show()">
    <option value="">--- SELECT ---</option>
    <?php
	for($i=$sesn; $i>=2015; $i--)
	{
		?><option value="<?=$i;?>" <?=$i==$sesn? 'selected' : ''?>><?=$i;?>-<?=$i+1;?></option><?php
	}
    ?>
    </select>
    </td>
	<td id="tblhedrow"> Class :</td>
	<td id="tblbodynm">
    <div id="EnquiryCalssDiv">
    <select name="EnquiryCalss" id="EnquiryCalss" class="form-control" required>
    <option value="">--- Select ---</option>
    <?php
    $sql=mysqli_query($con,"SELECT Class FROM main_section WHERE Session='$sesn' AND stat=0 GROUP BY Class ORDER BY Class") or die(mysqli_error($con));
    while($R=mysqli_fetch_array($sql))
    {
        $ClassSl=$R['Class'];
        $ClassName=get_value('main_class','sl',$ClassSl,'ClassName','',$con);
        ?><option value="<?=$ClassSl?>"><?=$ClassName?></option><?php
    }
    ?>
    </select>
    </div>
	</td>
	<td id="tblhedrow"> Status:</td>
	<td id="tblbodynm">
    <select name="stat" id="stat" class="form-control" onChange="show()">
    <option value="">--- Select ---</option>
    <?php
	$sql=mysqli_query($con,"SELECT column_comment FROM information_schema.columns WHERE table_schema='$databasename' AND table_name='amdission_enquery' AND column_name='stat'") or die(mysqli_error($con));
	while($R=mysqli_fetch_array($sql))
	{
		$comment=$R['column_comment']; 
	}
	$Comment=explode(", ",$comment);
	foreach ($Comment as $comment)
	{
		$comments=explode("=",$comment);
		$comntsl=$comments[0];
		$comnt=$comments[1];
		?><option value="<?=$comntsl;?>"<?php if($comntsl==0){echo "selected";}?>><?=$comnt;?></option><?php
	}
	?>
    </select>
	</td>
	<td id="tblhed" >Search </td>
	<td id="tblhed"><input type="text" name="srch" id="srch" value="" class="form-control" onKeyUp="show()"/></td>
</tr>
</table>
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
function GetClass(TargetFieldDiv,TargetFieldName,SourceFieldValue,FunctionType)
{
	$('#'+TargetFieldDiv).load('GetClass.php?TargetFieldName='+TargetFieldName+'&SourceFieldValue='+SourceFieldValue+'&FunctionType='+FunctionType).fadeIn('fast');
}

$(document).ready(function(){show();});
function show()
{
    var EnquirySession=document.getElementById('EnquirySession').value;
    var EnquiryCalss=document.getElementById('EnquiryCalss').value;
    var stat=document.getElementById('stat').value;
    var srch=document.getElementById('srch').value;
	$('#show').load('AdmissionEnquiryListShow.php?EnquirySession='+EnquirySession+'&EnquiryCalss='+EnquiryCalss+'&stat='+stat+'&srch='+encodeURI(srch)).fadeIn('fast'); 
}


function pagnt(pno)
{
	var ps=document.getElementById('ps').value;	
	var EnquirySession=document.getElementById('EnquirySession').value;
    var EnquiryCalss=document.getElementById('EnquiryCalss').value;
    var stat=document.getElementById('stat').value;
    var srch=document.getElementById('srch').value;
	$('#show').load('AdmissionEnquiryListShow.php?pno='+pno+'&ps='+ps+'&EnquirySession='+EnquirySession+'&EnquiryCalss='+EnquiryCalss+'&stat='+stat+'&srch='+encodeURI(srch)).fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1()
{
	var pno=$('#pgn').val();
	pagnt(pno);
}
</script>