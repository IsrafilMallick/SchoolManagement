<?php
$requirelevel=3;
include 'ActiveUsers.php';
$tblnm='main_fees_head';

$StudentID=isset($_REQUEST['StudentID']) ? $_REQUEST['StudentID'] : '';

$sql=mysqli_query($con,"SELECT * FROM main_student_data WHERE StudentID='$StudentID' AND stat=1") or die (mysqli_error($con));
if(mysqli_num_rows($sql)>0){
while($R=mysqli_fetch_array($sql))
{
    $StudentID=$R['StudentID'];
    $AdmissionSession=$R['AdmissionSession'];
    $AdmissionClass=$R['AdmissionClass'];
    $AdmissionSection=$R['AdmissionSection'];
    $AdmissionDate=$R['AdmissionDate'];
    $CurrentSession=$R['CurrentSession'];
    $CurrentClass=$R['CurrentClass'];
    $CurrentSection=$R['CurrentSection'];
    $CurrentRollNo=$R['CurrentRollNo'];
    $StudentName=$R['StudentName'];
    $BirthDate=$R['BirthDate'];
    $Gender=$R['Gender'];
    $Caste=$R['Caste'];
    $Religion=$R['Religion'];
    $AadharNo=$R['AadharNo'];
    $FatherName=$R['FatherName'];
    $FatherQualification=$R['FatherQualification'];
    $FatherOccupation=$R['FatherOccupation'];
    $FatherMobile=$R['FatherMobile'];
    $MotherName=$R['MotherName'];
    $MotherQualification=$R['MotherQualification'];
    $MotherOccupation=$R['MotherOccupation'];
    $MotherMobile=$R['MotherMobile'];
    $GuardianName=$R['GuardianName'];
    $GuardianQualification=$R['GuardianQualification'];
    $GuardianOccupation=$R['GuardianOccupation'];
    $GuardianMobile=$R['GuardianMobile'];
    $GuardianRelation=$R['GuardianRelation'];
    $PermanentVillage=$R['PermanentVillage'];
    $PermanentPostOffice=$R['PermanentPostOffice'];
    $PermanentPoliceStation=$R['PermanentPoliceStation'];
    $PermanentDistrict=$R['PermanentDistrict'];
    $PermanentState=$R['PermanentState'];
    $PermanentPin=$R['PermanentPin'];
    $ResidentVillage=$R['ResidentVillage'];
    $ResidentPostOffice=$R['ResidentPostOffice'];
    $ResidentPoliceStation=$R['ResidentPoliceStation'];
    $ResidentDistrict=$R['ResidentDistrict'];
    $ResidentState=$R['ResidentState'];
    $ResidentPin=$R['ResidentPin'];
    $BankName=$R['BankName'];
    $BranchName=$R['BranchName'];
    $BranchAddress=$R['BranchAddress'];
    $BranchIFSC=$R['BranchIFSC'];
    $BranchMICR=$R['BranchMICR'];
    $AccountNo=$R['AccountNo'];
}
if(empty($sl)){$sl='';}
if(empty($StudentID)){$StudentID='';}
if(empty($AdmissionSession)){$AdmissionSession=$CurrentSession;}
if(empty($AdmissionClass)){$AdmissionClass='';}
if(empty($AdmissionSection)){$AdmissionSection='';}
if(empty($AdmissionDate)){$AdmissionDate=date('d-m-Y', strtotime($edt));}
if(empty($CurrentSession)){$CurrentSession='';}
if(empty($CurrentClass)){$CurrentClass='';}
if(empty($CurrentSection)){$CurrentSection='';}
if(empty($CurrentRollNo)){$CurrentRollNo='';}
if(empty($StudentName)){$StudentName='';}
if(empty($BirthDate)){$BirthDate='';}
if(empty($Gender)){$Gender='';}
if(empty($Caste)){$Caste='';}
if(empty($Religion)){$Religion='';}
if(empty($AadharNo)){$AadharNo='';}
if(empty($FatherName)){$FatherName='';}
if(empty($FatherQualification)){$FatherQualification='';}
if(empty($FatherOccupation)){$FatherOccupation='';}
if(empty($FatherMobile)){$FatherMobile='';}
if(empty($MotherName)){$MotherName='';}
if(empty($MotherQualification)){$MotherQualification='';}
if(empty($MotherOccupation)){$MotherOccupation='';}
if(empty($MotherMobile)){$MotherMobile='';}
if(empty($GuardianName)){$GuardianName='';}
if(empty($GuardianQualification)){$GuardianQualification='';}
if(empty($GuardianOccupation)){$GuardianOccupation='';}
if(empty($GuardianMobile)){$GuardianMobile='';}
if(empty($GuardianRelation)){$GuardianRelation='';}
if(empty($PermanentVillage)){$PermanentVillage='';}
if(empty($PermanentPostOffice)){$PermanentPostOffice='';}
if(empty($PermanentPoliceStation)){$PermanentPoliceStation='';}
if(empty($PermanentDistrict)){$PermanentDistrict='';}
if(empty($PermanentState)){$PermanentState='';}
if(empty($PermanentPin)){$PermanentPin='';}
if(empty($ResidentVillage)){$ResidentVillage='';}
if(empty($ResidentPostOffice)){$ResidentPostOffice='';}
if(empty($ResidentPoliceStation)){$ResidentPoliceStation='';}
if(empty($ResidentDistrict)){$ResidentDistrict='';}
if(empty($ResidentState)){$ResidentState='';}
if(empty($ResidentPin)){$ResidentPin='';}
if(empty($BankName)){$BankName='';}
if(empty($BranchName)){$BranchName='';}
if(empty($BranchAddress)){$BranchAddress='';}
if(empty($BranchIFSC)){$BranchIFSC='';}
if(empty($BranchMICR)){$BranchMICR='';}
if(empty($AccountNo)){$AccountNo='';}

if(mysqli_num_rows($sql)>0){
?>
<table border="1" align="center" style="border:3px solid #000000;" width="100%">
<tr style="background-color:#FFCC99;">
    <td colspan="6" id="tblhed">Child Details</td>
</tr>
<tr>
    <td id="tblhed1">Session : </td>
    <td id="tblhed1"><?=$CurrentSession?> - <?=$CurrentSession+1?></td>
    <td id="tblhed1">Student ID : </td>
    <td id="tblhed1"><?=$StudentID?></td>
    <td id="tblhed1">Class : </td>
    <td id="tblhed1"><?=get_value('main_class','sl',$CurrentClass,'ClassName','',$con)?></td>
</tr>
<tr>
    <td id="tblhed1">Student's Name : </td>
    <td id="tblhed1"><?=$StudentName?></td>
    <td id="tblhed1">Father's Name : </td>
    <td id="tblhed1"><?=$FatherName?></td>
    <td id="tblhed1">Mother's Name : </td>
    <td id="tblhed1"><?=$MotherName?></td>
</tr>
<tr>
    <td id="tblhed1">Student's Address : </td>
    <td id="tblhed1" colspan="5"><?="$ResidentVillage, $ResidentPostOffice, $ResidentPoliceStation, $ResidentDistrict, $ResidentState - $ResidentPin"?></td>
</tr>
<tr>
	<td colspan="6">
    <hr />
        <table border="1" align="center" width="100%">
            <tr style="background-color:#FFCC99;"><td id="tblhed" colspan="13">Fees Details</td>
            <td id="tblhed"><??></td>
        </tr>
        <tr style="background-color:#FFEAB7;">
            <td id="tblhed">Months/Fees Heads</td>
            <?php
            for($i=1;$i<=12;$i++)
            {
				?><td id="tblhed"><?=date('M',strtotime("01-$i-$CurrentSession"));?></td><?php
            }
            ?>
            <td id="tblhed">Total</td>
        </tr>
    	<?php
		$AMNT=0;
		$cnt=0;
		$sql=mysqli_query($con,"SELECT * FROM main_fees_head WHERE stat=0 ORDER BY LedgerHead ASC");
		$tothed=mysqli_num_rows($sql);
		while($R=mysqli_fetch_array($sql))
		{
			$cnt++;
			$LedgerHead=$R['LedgerHead'];
			$FeesHead=$R['FeesHead'];
			$FeesType=$R['FeesType'];
			
			if($FeesType==1){$RowBackground='style="background-color:#FFFFDB;" title="Fees to be paid at the time of Admission"';}else
			if($FeesType==2){$RowBackground='style="background-color:#E8FFE8;" title="Fees to be paid in Every Month"';}else
			if($FeesType==3){$RowBackground='style="background-color:#FDE1FF;" title="Fees to be paid as necessary"';}else{$RowBackground='';}
			?>
            
			
			<tr <?=$RowBackground;?>>
            	<td id="tblhed1">
				<?=$FeesHead?>
                <input type="hidden" name="LedgerHead[]" id="LedgerHead[]" value="<?=$LedgerHead?>" />
                <input type="hidden" name="FeesType[]" id="FeesType[]" value="<?=$FeesType?>" />
                </td>
                <?php
				$Amnt=0;
				for($i=1;$i<=12;$i++)
				{
					$amnt=get_value('main_fees_setup','LedgerHead',$LedgerHead,'amnt',"AND Session='$CurrentSession' AND Month='$i' AND Class='$CurrentClass'",$con);
					if($amnt==''){$amnt=0;}
					$Amnt+=$amnt;
					?><td id="tblhed">
                    <input type="text" name="amnt<?=$LedgerHead?>[]" id="amnt<?=$LedgerHead?>[]" value="<?=$amnt?>" class="form-control" onclick="this.select();" onKeyPress="return NumberOnly(event);" onkeyup="get_amount1('<?=$cnt?>','<?=$LedgerHead?>','<?=$tothed?>')" style="width:68px;"/>
                    </td><?php
				}
				$AMNT+=$Amnt;
				?>
                <td id="tblhed"><span id="Amnt<?=$cnt?>"><?=$Amnt?></span></td>
            </tr>
			<?php
		}
		?>
		<tr style="background-color:#FFEAB7;">
			<td id="tblhedrow" colspan="13">Total Fees :</td>
            <td id="tblhed"><span id="AMNT"><?php echo $AMNT;?></span></td>
		</tr>
		<tr>
        	<td id="tblbody" colspan="14">
            	<hr />
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <select name="DiscountRequest" id="DiscountRequest" class="form-control" required>
                                <option value="0">Generate Now</option>
                                <option value="1">Request for Discount</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info"><b><i class="fa fa-credit-card"></i> Generate</b></button>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                            </div>
                        </div>
                    </div>
                </div>
			</td>
		</tr>
    	</table>
	</td>
</tr>
</table>
    <?php
}
?>
<?php } else {?><center><b><h2><font color="#FF0000"><b>Fees Doesnot Setup against the Class or Data of the Student doesnot exist</b></font></h2></b></center><?php }?>
