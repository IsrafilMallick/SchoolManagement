<?php
$requirelevel=1;
include 'ActiveUsers.php';
include "header.php";
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-list-ol"></i> Student List</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Student Corner</li><li class="active"> Student List</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
					<form name="frmnm" id="frmnm" method="post" action="stud_icard.php" target="_blank">
						<input type="hidden" id="abc" name="abc" value="" size="150">
                        <div class="box-body">
                        	<div class="row">
								<div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Current Session</label>
										<select name="CurrentSession" id="CurrentSession" class="form-control" onChange="show(); GetClass('CurrentCalssDiv','CurrentClass',this.value,'5')" required>
                                        <option value="">--- Select ---</option>
                                        <?php
                                        for($i=$sesn;$i>2015;$i--)
                                        {
                                            ?><option value="<?=$i?>" <?=$i==$sesn ? 'selected' : ''?>><?=$i?> - <?=$i+1?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Current Calss</label>
                                        <div id="CurrentCalssDiv">
                                        <select name="CurrentClass" id="CurrentClass" class="form-control" onChange="show(); GetSection('<?=$sesn?>', 'CurrentSectionDiv', 'CurrentSection', this.value,'0')" required>
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
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Current Section</label>
                                        <div id="CurrentSectionDiv">
                                        <select name="CurrentSection" id="CurrentSection" class="form-control" onChange="show()" required>
                                        <option value="">--- Select ---</option>
                                        <?php
										$sql=mysqli_query($con,"SELECT sl, SectionName FROM main_section WHERE Session='$sesn' AND stat=0 GROUP BY SectionName ORDER BY SectionName") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
											$SectionSl=$R['sl'];
											$SectionName=$R['SectionName'];
											?><option value="<?=$SectionSl?>"><?=$SectionName?></option><?php
                                        }
                                        ?>
                                        </select>
                                        </div>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Gender</label>
                                        <select name="Gender" id="Gender" class="form-control" onchange="Show()">
                                        <option value="">--- Select ---</option>
                                        <?php
                                        $sql=mysqli_query($con,"SELECT sl, gender FROM main_gender WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
                                            $Gendersl=$R['sl'];
                                            $GenderName=$R['gender'];
                                            ?><option value="<?php echo $Gendersl;?>"><?php echo $GenderName;?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
							</div>
                        	<div class="row">
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Caste</label>
                                        <select name="Caste" id="Caste" class="form-control" onchange="show()">
                                        <option value="">--- Select ---</option>
                                        <?php
                                        $sql=mysqli_query($con,"SELECT sl, caste FROM main_caste WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
                                            $Castesl=$R['sl'];
                                            $CasteName=$R['caste'];
                                            ?><option value="<?php echo $Castesl;?>"><?php echo $CasteName;?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label id="tblhedrow">Religion</label>
                                        <select name="Religion" id="Religion" class="form-control" onchange="show()">
                                        <option value="">--- Select ---</option>
                                        <?php
                                        $sql=mysqli_query($con,"SELECT sl, religion FROM main_religion WHERE stat='0' ORDER BY sl") or die(mysqli_error($con));
                                        while($R=mysqli_fetch_array($sql))
                                        {
                                            $Religionsl=$R['sl'];
                                            $ReligionName=$R['religion'];
                                            ?><option value="<?php echo $Religionsl;?>"><?php echo $ReligionName;?></option><?php
                                        }
                                        ?>
                                        </select>
                                    </div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="tblhedrow">Search</label>
                                        <input type="text" name="Search" id="Search" class="form-control" placeholder="Search....." onkeyup="show()">
                                    </div>
								</div>
							</div>
                            <hr />
                            <div class="card-footer" style="text-align:center;">
                                <input type="submit" value="Generate I-Card" class="btn btn-success"></td>
                            </div>
                            <hr />
							<div id="show"></div>
                        </div>
					</form>
                </div>        
			</section>
		</aside>
	</div>
</body>
</html>
<script>
function GetClass(TargetFieldDiv,TargetFieldName,SourceFieldValue,FunctionType)
{
	$('#'+TargetFieldDiv).load('GetClass.php?TargetFieldName='+TargetFieldName+'&SourceFieldValue='+SourceFieldValue+'&FunctionType='+FunctionType).fadeIn('fast');
}

function GetSection(Session,TargetFieldDiv,TargetFieldName,SourceFieldValue,FunctionType)
{
	$('#'+TargetFieldDiv).load('GetSection.php?Session='+Session+'&TargetFieldName='+TargetFieldName+'&SourceFieldValue='+SourceFieldValue+'&FunctionType='+FunctionType).fadeIn('fast');
}

show();
function show()
{
	var CurrentSession=$('#CurrentSession').val();
	var CurrentClass=$('#CurrentClass').val();
	var CurrentSection=$('#CurrentSection').val();
	var Gender=$('#Gender').val();
	var Caste=$('#Caste').val();
	var Religion=$('#Religion').val();
	var Search=encodeURIComponent($('#Search').val());
	$('#show').load('StudentListShow.php?CurrentSession='+CurrentSession+'&CurrentClass='+CurrentClass+'&CurrentSection='+CurrentSection+'&Gender='+Gender+'&Caste='+Caste+'&Religion='+Religion+'&Search='+Search).fadeIn('fast');
}

function pagnt(pno)
{
	var ps=$('#ps').val();
	var CurrentSession=$('#CurrentSession').val();
	var CurrentClass=$('#CurrentClass').val();
	var CurrentSection=$('#CurrentSection').val();
	var Gender=$('#Gender').val();
	var Caste=$('#Caste').val();
	var Religion=$('#Religion').val();
	var Search=encodeURIComponent($('#Search').val());
	$('#show').load('StudentListShow.php?pno='+pno+'&ps='+ps+'&CurrentSession='+CurrentSession+'&CurrentClass='+CurrentClass+'&CurrentSection='+CurrentSection+'&Gender='+Gender+'&Caste='+Caste+'&Religion='+Religion+'&Search='+Search).fadeIn('fast');
	$('#pgn').val=pno;
}

function pagnt1()
{
	var pno=$('#pgn').val();
	pagnt(pno);
}

function checkall(val)
{
	var j="";
	var chk=document.getElementsByName('chk[]');
	frmlen=chk.length;
	for(i=0;i<frmlen;i++)
	{
		chk[i].checked=val;
		if(i==0)
		{
			j=chk[i].value;
		}
		else
		{
		 	j=j+','+chk[i].value;
		}
	}
	if(!val)
    {
        document.getElementById('abc').value ="";
    }
    else
    {
		 document.getElementById('abc').value =j;
    }
}

function check1()
{
	var j="";
	var chk=document.getElementsByName('chk[]');
	frmlen=chk.length;
	for(i=0;i<frmlen;i++)
	{
		if(i==0)
		{
			if(chk[i].checked){j=chk[i].value;}
		}
		else
		{
		 	if(chk[i].checked){j=j+','+chk[i].value;}
		}
	}
	document.getElementById('abc').value=j;
}
</script>