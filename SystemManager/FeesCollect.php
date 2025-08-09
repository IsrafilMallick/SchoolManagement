<?php
$requirelevel=0;
include 'ActiveUsers.php';
include 'header.php';
$StudentID=isset($_REQUEST['StudentID']) ? $_REQUEST['StudentID'] : '';
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-briefcase"></i> Collect Fees</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Fees</li><li class="active"> Collect Fees</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
<form name="frmnm" id="frmnm" method="post" action="FeesCollects.php" target="_blank">
<table style="width:10%; border:none;" align="center">
<tr>
    <td style="border:none;">
    <div class="input-group margin">
        <input type="text" id="StudentID" name="StudentID" value="<?=$StudentID;?>" class="form-control" style="text-align:center; width:200px;" onClick="this.select();" onBlur="FeesDetails(this.value)" autofocus required>
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

<div class="modal fade modal-lg" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="width:70%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="fa fa-list"></i> <span id="ttl">Processed Complain Details</span></h4>
			</div>
			<div class="modal-body">
				<div id="page"></div>
			</div>
		</div>
	</div>
</div>
<script>
<?php if($StudentID!=""){?>FeesDetails('<?=$StudentID?>');<?php }?>
function GetStudentID()
{
	$('#page').load('StudentList1.php?stat=0').fadeIn("fast");
	$('#modal_box').modal('show');
	$('#ttl').html('Student Details');
}

function ShowStudentID(StudentID)
{
	$('#StudentID').val(StudentID);
	$('#modal_box').modal('hide');
	FeesDetails(StudentID);
}

function FeesDetails(StudentID)
{
	if(StudentID!="")
	{
		$('#ShowDiv').load('FeesDetails.php?StudentID='+StudentID).fadeIn("fast");
	}
	SearchButton();
}

function SearchButton()
{
	var StudentID=$('#StudentID').val();
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

function GetPaymentLedger(PayMode)
{
	$('#DebitLedgr').load('GetPaymentLedger.php?PayMode='+PayMode+'&field=1&functiontyp=0').fadeIn("fast");
}

function TempPaymentDetail(StudentID)
{
	var CurrentSession=$('#CurrentSession').val();
	var FeesLedger=$('#FeesLedger').val();
	var Month=$('#Month').val();
	
	var PaymentType=$('#PaymentType').val();
	var PaymentDate=$('#PaymentDate').val();
	var PayMode=$('#PayMode').val();
	var DebitLedger=$('#DebitLedger').val();
	var CreditLedger=$('#CreditLedger').val();
	
	var BankName=encodeURI($('#BankName').val());
	var BranchName=encodeURI($('#BranchName').val());
	var ChequeNo=$('#ChequeNo').val();
	var ChequeDate=$('#ChequeDate').val();
	var TransactionNo=$('#TransactionNo').val();
	var TransactionDate=$('#TransactionDate').val();
	var PaymentDescription=encodeURI($('#PaymentDescription').val());
	
	var TransactionAmount=$('#TransactionAmount').val();
	var CurrentSession=$('#CurrentSession').val();

	$('#TempPaymentDiv').load('TempPaymentDetail.php?CurrentSession='+CurrentSession+'&FeesLedger='+FeesLedger+'&Month='+Month+'&PaymentType='+PaymentType+'&StudentID='+StudentID+'&PaymentDate='+PaymentDate+'&PayMode='+PayMode+'&DebitLedger='+DebitLedger+'&CreditLedger='+CreditLedger+'&BankName='+BankName+'&BranchName='+BranchName+'&ChequeNo='+ChequeNo+'&ChequeDate='+ChequeDate+'&TransactionNo='+TransactionNo+'&TransactionDate='+TransactionDate+'&PaymentDescription='+PaymentDescription+'&TransactionAmount='+TransactionAmount+'&CurrentSession='+CurrentSession).fadeIn("fast");
}

function del(tbl,fnm,sl,StudentID)
{
	if(confirm('Do you sure to delete this record...???'))
	{
		$('#TempPaymentDiv').load('fees_tmp_del.php?tbl='+tbl+'&fnm='+fnm+'&sl='+sl+'&StudentID='+StudentID).fadeIn('fast');
	}
}
/*
function get_amount1(fildno,StudentID,ftyp,TransactionAmount)
{
	var totTransactionAmount=0;
	var ldgr=document.getElementsByName('TransactionAmount[]');
	var frmlen=ldgr.length;
	for(i=0;i<frmlen;i++)
	{
		var recvTransactionAmount=ldgr[i].value;	if(recvTransactionAmount==""){recvTransactionAmount=0;}
		totTransactionAmount=parseInt(totTransactionAmount)+parseInt(recvTransactionAmount);
	}
	document.getElementById('TodayGreciv').innerHTML=totTransactionAmount;
	
	$.get('get_amount.php?table=main_stud_details&StudentID='+StudentID+'&ftyp='+ftyp+'&TransactionAmount='+TransactionAmount+'&Todayrec='+totTransactionAmount+'&adt='+'<?=$adt?>', function(value) 
	{
		var val=value.split("@");
		$('#Totreciv'+fildno).html(val.shift()+'.00');
		$('#Bal'+fildno).html(val.shift()+'.00');
		$('#TotGreciv').html(val.shift()+'.00');
		$('#TotGbal').html(val.shift()+'.00');
	});
}

function BankDetails(PayMode)
{
	if(PayMode==2)
	{
		$('.checkdtl').show();
		$('.bankdtl').show();
		$('.txnndtl').hide();
		$('#ChequeNo').attr('required', 'true');
		$('#ChequeDate').attr('required', 'true');

		$('#TransactionNo').val('');
		$('#TransactionDate').val('');
		$('#TransactionNo').removeAttr('required')
		$('#TransactionDate').removeAttr('required')
	}
	else
	if(PayMode==3)
	{
		$('.checkdtl').hide();
		$('.bankdtl').show();
		$('.txnndtl').show();
		$('#TransactionNo').attr('required', 'true');
		$('#TransactionDate').attr('required', 'true');

		$('#ChequeNo').val('');
		$('#ChequeDate').val('');
		$('#ChequeNo').removeAttr('required')
		$('#ChequeDate').removeAttr('required')
	}
	else
	{
		$('.checkdtl').hide();
		$('.bankdtl').hide();
		$('.txnndtl').hide();
		
		$('#BankName').val('');
		$('#BranchName').val('');
		$('#ChequeNo').val('');
		$('#ChequeDate').val('');
		$('#TransactionNo').val('');
		$('#TransactionDate').val('');

		$('#ChequeNo').removeAttr('required')
		$('#ChequeDate').removeAttr('required')
		$('#TransactionNo').removeAttr('required')
		$('#TransactionDate').removeAttr('required')
	}
}

*/
</script>