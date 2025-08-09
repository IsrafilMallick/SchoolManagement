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

function CheckNumber(evt)
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
});