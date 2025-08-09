<?php
$requirelevel=0;
include 'ActiveUsers.php';
$sql=mysqli_query($con,"SELECT StudentID FROM main_discount WHERE stat='1' ORDER BY sl") or die(mysqli_error($con));
while($R=mysqli_fetch_array($sql))
{
	$StudentIDs[]=$R['StudentID'];
}

if(mysqli_num_rows($sql)>0)
{
	?><div class="box-body table-responsive no-padding">
		<table class="table table-hover">
		<tr>
			<td id="tblhed">Sl No.</td>
			<td id="tblhed">Student ID</td>
			<td id="tblhed">Name of the Sudent</td>
			<td id="tblhed">Father Name</td>
			<td id="tblhed" style="width:30%;">Address</td>
			<td id="tblhed">Clas</td>
			<td id="tblhed">Section</td>
			<td id="tblhed">Roll No.</td>
			<td id="tblhed">Actions</td>
		</tr>
		<?php
		//print_r($StudentIDs);
		$cnt=0;
		foreach ($StudentIDs as $StudentID)
		{
			$cnt++;
			$sql=mysqli_query($con,"SELECT * FROM main_student_data WHERE StudentID='$StudentID' AND stat=2") or die (mysqli_error($con));
			while($R=mysqli_fetch_array($sql))
			{
				$StudentName=$R['StudentName'];
				$FatherName=$R['FatherName'];
				
				$CurrentClass=$R['CurrentClass'];
				$CurrentSection=$R['CurrentSection'];
				$CurrentRollNo=$R['CurrentRollNo'];
				
				$ResidentVillage=$R['ResidentVillage'];
				$ResidentPostOffice=$R['ResidentPostOffice'];
				$ResidentPoliceStation=$R['ResidentPoliceStation'];
				$ResidentDistrict=$R['ResidentDistrict'];
				$ResidentState=$R['ResidentState'];
				$ResidentPin=$R['ResidentPin'];
				
				$PresentAddress="Vill-$ResidentVillage, PO-$ResidentPostOffice, PS-$ResidentPoliceStation, Dist-$ResidentDistrict, State-$ResidentState, Pin-$ResidentPin";
				?>
				<tr>
					<td id="tblbody"><?=$cnt?></td>
					<td id="tblbody"><?=$StudentID?></td>
					<td id="tblbody"><?=$StudentName?></td>
					<td id="tblbody"><?=$FatherName?></td>
					<td id="tblbody"><?=$PresentAddress?></td>
					<td id="tblbody"><?=get_value('main_class','sl',$CurrentClass,'ClassName','',$con)?></td>
					<td id="tblbody"><?=$CurrentSection?></td>
					<td id="tblbody"><?=$CurrentRollNo?></td>
					<td id="tblbody">
					<i class="fa fa-eye fa-lg" onclick="DiscountRequestShow('<?=$StudentID?>')" style="cursor:pointer;"></i>
					</td>
				</tr>
				<?php
			}
		}
		?>
		</table>
	</div>
	<hr />
	<div id="DiscountRequestShow"></div><?php
}
?>