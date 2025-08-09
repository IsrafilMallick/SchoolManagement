function activation(sl,div,table,field,clas,btnnm,msg,acttl)
{
	if(msg==1)
	{
		msg1='Do you want to '+btnnm+' ? ';
	}
	else
	{
		msg1='Do you want to '+btnnm+' ? ';
	}
	
	if(confirm(msg1))
	{
		$('#'+div).load('activation.php?sl='+sl+'&div='+div+'&table='+table+'&field='+field+'&class='+encodeURI(clas)+'&btnnm='+encodeURI(btnnm)+'&acttl='+encodeURI(acttl)).fadeIn('fast');
	}
}

function UpperCase(text,fild)
{
	$('#'+fild).val(text.toUpperCase());
}

function LowerCase(text,fild)
{
	$('#'+fild).val(text.toLowerCase());
}

function NumberOnly(evt)
{
	evt =(evt) ? evt : window.event;
	var charCode=(evt.which) ? evt.which : evt.keyCode;
	if(charCode > 31&&(charCode < 48 || charCode > 57)&&charCode!=44&&charCode!=32)
	{
		return false;
	}
	else
	{
		return true;
	}
}

$(document).ready(function()
{
	var jQueryDatePicker2Opts=
	{
		dateFormat: 'dd-mm-yy',
		changeMonth: true,
		changeYear: true,
		yearRange: '1990:' + new Date().getFullYear().toString(),
		showButtonPanel: false,
		showAnim: 'show'
	};
	$(".dt").inputmask("dd-mm-yyyy", {"placeholder": "DD-MM-YYYY"});
	$(".dt").datepicker(jQueryDatePicker2Opts);
	$("#AadharNo").inputmask("9999/9999/9999", '');
});

function GetPostOffice(pin,podiv,ponm,psdiv,distdiv,statediv)
{
	$('#'+podiv).load('GetPostOffice.php?pin='+pin+'&podiv='+podiv+'&ponm='+ponm+'&psdiv='+psdiv+'&distdiv='+distdiv+'&statediv='+statediv).fadeIn('fast'); 
}

function GetDistrictDetails(pin,po,psdiv,distdiv,statediv)
{
	$.get('GetDistrictDetails.php?pin='+pin+'&po='+encodeURI(po), function(data) 
	{
		var val=data.split("@");
		$('#'+psdiv).val(val.shift());
		$('#'+distdiv).val(val.shift());
		$('#'+statediv).val(val.shift());
	});
	$('#SameAddressFlag').focus();
}

function GetBankdetails(BankName,BranchName,BranchIFSC)
{
	$('#BankName').val('');
	$('#BranchName').val('');
	$('#BranchIFSC').val('');
	$('#BranchMICR').val('');
	$('#BranchAddress').val('');
	$('#AccountNo').val('');
	
	$.get('GetBankdetails.php?BankName='+encodeURI(BankName)+'&BranchName='+encodeURI(BranchName)+'&BranchIFSC='+BranchIFSC, function(data) 
	{
		var val=data.split("@@");
		var BankName=val.shift();
		var BranchName=val.shift();
		var BranchIFSC=val.shift();
		var BranchMICR=val.shift();
		var BranchAddress=val.shift();
		
		if(BankName!=""){$('#BankName').val(BankName);}
		if(BranchName!=""){$('#BranchName').val(BranchName);}
		if(BranchIFSC!=""){$('#BranchIFSC').val(BranchIFSC);}
		if(BranchMICR!=""){$('#BranchMICR').val(BranchMICR);}
		if(BranchAddress!=""){$('#BranchAddress').val(BranchAddress);}
		$('#AccountNo').focus();
	});
}

function GetBranch(BankName)
{
	$('#branch').load('GetBranch.php?BankName='+encodeURI(BankName)).fadeIn('fast');
}

function ImageUpload(input,inputid,div,height,width) 
{
	var filesize=document.getElementById(inputid).files[0].size;
	if(filesize>10240000)
	{
		alert('Sorry File Size Exceeded to 100KB . . . ! ! !');
	}
	else
	{
		if (input.files && input.files[0])
		{
			var reader = new FileReader();
			reader.onload = function (e)
			{
				$('#'+div)
				.attr('src', e.target.result)
				.width(width)
				.height(height);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
}