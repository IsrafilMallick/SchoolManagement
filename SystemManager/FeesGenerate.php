<?php
$requirelevel=3;
include 'ActiveUsers.php';
include 'header.php';
$tblnm='main_fees_head';
$StudentID=isset($_REQUEST['StudentID']) ? $_REQUEST['StudentID'] : '';
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-credit-card"></i> Generate Fees</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Fees</li><li class="active">Generate Fees</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
                	<form name="frmnm" id="frmnm" method="post" action="FeesGenerates.php" enctype="multipart/form-data">
                    <table style="width:10%; border:none;" align="center">
                    <tr>
                        <td style="border:none;">
                        <div class="input-group margin">
                            <input type="text" id="StudentID" name="StudentID" value="<?=$StudentID;?>" class="form-control" style="text-align:center; width:200px;" onClick="this.select();" onBlur="FeesGenerateShow(this.value)" autofocus required>
                            <span class="input-group-btn">
                            	<button class="btn btn-warning" type="button" id="srchbtn" onClick="GetStudentID()"><i class="fa fa-search"></i>.</button>
                            </span>
                        </div>
                        </td>
                    </tr>
                    </table>
                    <hr>
                    <div id="ShowDiv"></div>
                    </form>
				</div>
			</section>
		</aside>
	</div>
	<?php include 'footer.php';?>
</body>
</html>
<script>
function DiscountRequest(StudentID)
{
	alert(StudentID);
	$('#DiscountButton').load('DiscountRequest.php?StudentID='+StudentID).fadeIn('fast');
}

$(document).ready(function(){FeesGenerateShow('<?=$StudentID?>');});
function GetStudentID()
{
	$('#page').load('stud_list1.php?stat=1').fadeIn("fast");
	$('#modal_box').modal('show');
	$('#ttl').html('Student Details');
}

function ShowStudentID(StudentID)
{
	$('#StudentID').val(StudentID);
	$('#modal_box').modal('hide');
	fees_generate_det(StudentID);
}

function FeesGenerateShow(StudentID)
{
	if(StudentID!="")
	{
		$('#ShowDiv').load('FeesGenerateShow.php?StudentID='+StudentID).fadeIn("fast");
	}
	srchbtn()
}

function srchbtn()
{
	StudentID=document.getElementById('StudentID').value;
	if(StudentID=="")
	{
		$('#srchbtn').attr('class','btn btn-warning');
		$('#ShowDiv').html('');
	}
	else
	{
		$('#srchbtn').attr('class','btn btn-success');
	}
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