<?php
$requirelevel=3;
include 'ActiveUsers.php';
include("Numbers/Words.php");
$new_ammount_in_word = new Numbers_Words();

$sid=isset($_REQUEST['sid']) ? $_REQUEST['sid'] : '';
$billno=isset($_REQUEST['billno']) ? $_REQUEST['billno'] : '';
$prntcopy=isset($_REQUEST['prntcopy']) ? $_REQUEST['prntcopy'] : 1;
?>
<link rel="stylesheet" paytype="text/css" href="css/mystyle.css" />
<link rel="stylesheet" paytype="text/css" href="css/font-awesome.css" />
<link rel="icon" href="<?php echo $logo?>" width="5" height="7" >
<style>
td
{
	border: 1px solid black;
}

table 
{
	border-collapse: collapse;
}
</style>
<?php
$data=mysqli_query($con,"SELECT * FROM student_details WHERE sid='$sid'") or die(mysqli_error($con));
while($R=mysqli_fetch_array($data))
{	
	$applno=$R['applno'];
    $asesn=$R['asesn'];
    $adt=$R['adt'];	if($adt==""||$adt=="0000-00-00"){$adt="";}else{$adt=date('d-m-Y', strtotime($adt));}
    $acourse=$R['acourse'];
    $sesn=$R['sesn'];
    $course=$R['course'];
    $batch=$R['batch'];
    $sid=$R['sid'];
    $snm=$R['snm'];
    $dob=$R['dob'];	if($dob==""||$dob=="0000-00-00"){$dob="";}else{$dob=date('d-m-Y', strtotime($dob));}
    $gender=$R['gender'];
    $caste=$R['caste'];
    $religion=$R['religion'];
    $quali=$R['quali'];
    $job=$R['job'];
    $mob=$R['mob'];
    $email=$R['email'];
    $aadharno=$R['aadharno'];
    $epicno=$R['epicno'];
    $fnm=$R['fnm'];
    $fql=$R['fql'];
    $fjob=$R['fjob'];
    $fmob=$R['fmob'];
    $mnm=$R['mnm'];
    $mql=$R['mql'];
    $mjob=$R['mjob'];
    $mmob=$R['mmob'];
    $gnm=$R['gnm'];
    $gql=$R['gql'];
    $gjob=$R['gjob'];
    $gmob=$R['gmob'];
    $reltn=$R['reltn'];
    $vill=$R['vill'];
    $po=$R['po'];
    $ps=$R['ps'];
    $dist=$R['dist'];
    $state=$R['state'];
    $pin=$R['pin'];
    $vill1=$R['vill1'];
    $po1=$R['po1'];
    $ps1=$R['ps1'];
    $dist1=$R['dist1'];
    $state1=$R['state1'];
    $pin1=$R['pin1'];
    $school=$R['school'];
    $cls=$R['cls'];
    $sec=$R['sec'];
    $roll=$R['roll'];
    $banknm=$R['banknm'];
    $branchnm=$R['branchnm'];
    $branchaddr=$R['branchaddr'];
    $ifsc=$R['ifsc'];
    $micr=$R['micr'];
    $acno=$R['acno'];
}
$Session=$sesn.' - '.($sesn+1);
$img="StudImg/$sid.jpg";
if(!file_exists($img)){$img="pic/blank_profile.jpg";}
if($adt=='0000-00-00'){$adt1=date('d-m-Y', strtotime($edt));}else{$adt1=date('d-m-Y', strtotime($adt));}
for($i=0; $i<$prntcopy; $i++)
{
	if($i%2==1)
	{
		?>
        <center style="padding:8px 0 10px 0;">
        ...............<i class="fa fa-scissors"></i>
        ........................................................................<i class="fa fa-scissors"></i>
        ........................................................................<i class="fa fa-scissors"></i>
        ...............
        </center>
        <?php 
	}
	else if($i>0&&$i<$prntcopy-2)
	{
		?><div style="page-break-before:always">&nbsp;</div><?php
	}
	?>
    <div style="position:relative;">
    <div class="watermark" style="top:18%; right:180px;"><img src="pic/logo.png" height="400" width="400"></div>
    <table border="1" width="800px" align="center" style="border: 3px solid #000000;">
    <tr>
    	<td colspan="3" id="tblhed" style="font-size:36px; border:none;"><?=$cname?></td>
    </tr>
    <tr>
    	<td colspan="3" id="tblhed" style="background-color:#686868; font-size:27px; color:#FFF;"><?=$ctag?></td>
    </tr>
    <tr>
		<td id="tblbody" style="width:15%; border:none;"><img src="pic/logo.png" style="width:100px;"><br></td>
        <td id="tblhed" style="width:70%; border:none;">
        <span style="font-size:20px;"><?=$caddr?></span><br />
        <span style="font-size:19px;">Contact No. : <?=$Cmob?></span><br />
        <span style="font-size:20px;">Email : <i><?=$Cemail?></i></span><br />
        <span style="font-size:20px;">Website : <i><?='www.'.ltrim($Curl,'http://')?></i></span>
        <div style="background-color:#000; color:#FFF; width:28%; margin:0 auto; border-radius:15px; font-size:16px;">MONEY RECEIPT</div>
        </td>
        <td style="width:15%; font-size:9px; text-align:center; border:none;">
        <div style="border:2px solid #000000; width:70px; height:90px; margin:0 auto;"><img src="<?=$img?>" width="70px" height="90px" /></div>
        <img src="barcode.php?text=<?=$billno;?>" alt="Barcode" style="width:120px; height:25px; padding-top:1px;">
        </td>
	</tr>
    <tr>
        <td colspan="3" style="border:none;">
            <table align="center" style="border:2px solid #000000;" width="100%">
            <tr style="background-color:#FFCC99;"><td colspan="6" id="tblhed">Student Details</td></tr>
            <tr>
                <td id="tblhed1" style="width:10%;">Session: </td>
                <td id="tblhed1" style="width:20%;"><?=$sesn?> - <?=$sesn+1?></td>
                <td id="tblhed1" style="width:10%;">Course: </td>
                <td id="tblhed1" style="width:20%;"><?=get_value('main_course','sl',$course,'ccode','',$con);?></td>
                <td id="tblhed1" style="width:10%;">Batch: </td>
                <td id="tblhed1" style="width:20%;"><?=get_value('main_batch','sl',$batch,'BatchName','',$con);?></td>
			</tr>
            <tr>
                <td id="tblhed1" style="width:10%;">Student ID: </td>
                <td id="tblhed1" style="width:20%;"><?=$sid?></td>
                <td id="tblhed1" style="width:10%;">Name: </td>
                <td id="tblhed1" style="width:20%;"><?=$snm?></td>
                <td colspan="2"></td>
            </tr>
            </table>
            <br />
            <?php
            $sql=mysqli_query($con,"SELECT paydt, SUM(amnt) AS amnt FROM main_drcr WHERE sesn='$sesn' AND sid='$sid' AND billno='$billno'");
            while($R=mysqli_fetch_array($sql))
            {
                $paydt=$R['paydt'];
                $amnt=$R['amnt'];
            }
            ?>
            <table align="center" style="border:2px solid #000000;" width="100%">
            <tr style="background-color:#FFCC99;"><td colspan="6" id="tblhed">Bill Details</td></tr>
            <tr>
                <td id="tblhed1">Bill Date : </td>
                <td id="tblhed1"><?=date('d-m-Y', strtotime($paydt))?></td>
                <td id="tblhed1">Bill No. : </td>
                <td id="tblhed1"><?=$billno?></td>
                <td id="tblhed1">Bill Amount : </td>
                <td id="tblhedrow"><i class="fa fa-inr"></i> <?=number_format($amnt,2)?></td>
            </tr>
            </table>
            <br />
            <table align="center" style="border:2px solid #000000;" width="100%">
            <tr style="background-color:#FFCC99;"><td colspan="6" id="tblhed">Mode Of Receipt</td></tr>
            <tr style="background-color:#FFEAB7;">
                <td id="tblhed">Sl.</td>
                <td id="tblhed">Fees Head</td>
                <td id="tblhed">Receipt Type</td>
                <td id="tblhed">Cheque/Transaction Date</td>
                <td id="tblhed">Cheque/Transaction No</td>
                <td id="tblhed">Amount</td>
            </tr>
            <?php
            $cnt=0;
            $Totamnt=0;
            $sql=mysqli_query($con,"SELECT * FROM main_drcr WHERE sesn='$sesn' AND sid='$sid' AND billno='$billno' AND paytyp='6'");
            while($R=mysqli_fetch_array($sql))
            {
                $cnt++;
				$mnth=$R['mnth'];
                $billno=$R['billno'];
                $paydt=$R['paydt'];
                $paymode=$R['paymode'];
                $paydesc=$R['paydesc'];            
                $fldgr=$R['fldgr'];            
                $amnt=$R['amnt'];
                $Totamnt+=$amnt;
                
                $cheqdt=$R['cheqdt'];
                $cheqno=$R['cheqno'];
                $paydt=$R['paydt'];
                $trnsno=$R['trnsno'];
                $trnsdt=$R['trnsdt'];
    
                if($paymode==1){$md=date('d-m-Y', strtotime($paydt));$fld="NA";}
                if($paymode==2){$md=date('d-m-Y', strtotime($cheqdt));$fld=$cheqno;}
                if($paymode==3){$md=date('d-m-Y', strtotime($trnsdt));$fld=$trnsno;}
                ?>
                <tr>
                    <td id="tblhed"><?=$cnt;?></td>
                    <td id="tblhed1"><?=get_value('account_ledg','sl',$fldgr,'ledgnm','',$con);?></td>
                    <td id="tblhed"><?=get_value('main_paymode','sl',$paymode,'paymode','',$con);?></td>
                    <td id="tblhed"><?=$md;?></td>
                    <td id="tblhed"><?=$fld;?></td>
                    <td id="tblhedrow" ><i class="fa fa-inr"></i> <?=number_format($amnt,2)?></td>
                </tr>
                <?php 
            }
            ?>
            <tr style="background-color:#FFEAB7; font-size:18px;">
                <td id="tblhed1" colspan="5">Amount (In Words) : <?=ucwords($new_ammount_in_word->toWords($Totamnt))?> Only</td>
                <td id="tblhedrow"><i class="fa fa-inr"></i> <?=number_format($Totamnt,2)?></td>
            </tr>
            </table>
    
            <table border="0" align="center" width="100%" style="border:none;">
            <tr style="height:68px;">
                <td id="tblhed1" style="border:none; vertical-align:bottom;">
                Place : Bamanpukur<br />
                Date : <?=date('d-m-Y', strtotime($paydt))?>
                </td>
                <td colspan="3" valign="top" align="right" style="font-size:16px; border:none; padding-top:5px;"><b>For, <?=$cname;?></b></td>
            </tr>
            </table>
        </td>
    </tr>
    </table>
    </div>
    <?php
}
?>