<?php
$requirelevel=3;
include 'ActiveUsers.php';
$tblnm="main_fees_setup";

$Session=isset($_REQUEST['Session']) ? $_REQUEST['Session'] : '';
$Class=isset($_REQUEST['Class']) ? $_REQUEST['Class'] : '';
if($Session==""){$Session1="";}else{$Session1="AND Session='$Session'";}
if($Class==""){$Class1="";}else{$Class1="AND Class='$Class'";}

$sql1=mysqli_query($con,"SELECT * FROM main_section WHERE stat=0 $Session1 $Class1 GROUP BY Class ORDER BY Class") or die (mysqli_error($con));
if(mysqli_num_rows($sql1)>0)
{
	while($R1=mysqli_fetch_array($sql1))
	{
		$Session=$R1['Session'];
		$Class=$R1['Class'];		
		?>
		<table border="1" align="center" width="100%">
		<tr style="background-color:#FFCC99;">
            <td id="tblhed" colspan="14">Class : <?=get_value('main_class','sl',$Class,'ClassName','',$con);?></td>
        </tr>
		<tr style="background-color:#FFEAB7;">
			<td id="tblhed">Months/Fees Heads</td>
			<?php
			for($i=1;$i<=12;$i++)
			{
				?><td id="tblhed"><?=date('M',strtotime("01-$i-$Session"));?></td><?php
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
			<input type="hidden" name="LedgerHead[]" id="LedgerHead[]" value="<?=$LedgerHead?>" />
			<input type="hidden" name="FeesType[]" id="FeesType[]" value="<?=$FeesType?>" />
			<tr <?=$RowBackground;?>>
				<td id="tblhed1"><?=$FeesHead?> (<?=$FeesTypes[$FeesType];?>)</td>
				<?php
				$Amnt=0;
				for($i=1;$i<=12;$i++)
				{
					$amnt=get_value('main_fees_setup','LedgerHead',$LedgerHead,'amnt',"AND Session='$Session' AND Month='$i' AND Class='$Class'",$con);
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
		</table>
		<hr />
		<?php
	}
?>
<center><button type="submit" id="Button1" name="Button1" class="btn btn-success">Submit</button></center>
<?php } else {?><center><b><h2><font color="#FF0000"><b>NO RECORD AVAILABLE</b></font></h2></b></center><?php }
