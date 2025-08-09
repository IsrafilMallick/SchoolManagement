<?php
$requirelevel=3;
include 'ActiveUsers.php';
include "header.php";
$StudentID=isset($_REQUEST['StudentID']) ? $_REQUEST['StudentID'] : '';
$StudentImage="StudentImage/$StudentID.jpg";	if(!file_exists($StudentImage)){$StudentImage="pic/blank_profile.png";}
$FatherImage="FatherImage/$StudentID.jpg";	if(!file_exists($FatherImage)){$FatherImage="pic/blank_profile.png";}
$MotherImage="MotherImage/$StudentID.jpg";	if(!file_exists($MotherImage)){$MotherImage="pic/blank_profile.png";}
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1 align="center"><i class="fa fa-child fa-lg"></i> Document Upload</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Student Corner</li><li class="active"> Document Upload-</li>
                </ol>
			</section>
  			<section class="content">
    			<div class="box box-success">
                	<form name="form" id="form" method="post" action="UploadDocuments.php" enctype="multipart/form-data">
						<input type="hidden" name="StudentID" id="StudentID" value="<?=$StudentID;?>">
                        <div class="box-body">
                        	<div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                    	<div id="tblhed">Image of Student</div>
                                    	<label for="StudentImage">
                                        	<img id="StudentImageDisp" src="<?=$StudentImage?>" height="504" width="392" alt="Student Photo" title="Upload Student Photo" style="cursor:pointer; border:dotted;">
                                        </label>
                                        <input type="file" name="StudentImage" id="StudentImage" onChange="ImageUpload(this,'StudentImage','StudentImageDisp','504','392')" accept="image/*" style="display:none;"/>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                    	<div id="tblhed">Image of Father</div>
                                    	<label for="FatherImage">
                                        	<img id="FatherImageDisp" src="<?=$FatherImage?>" height="504" width="392" alt="Student Photo" title="Upload Father's Photo" style="cursor:pointer; border:dotted;">
                                        </label>
                                        <input type="file" name="FatherImage" id="FatherImage" onChange="ImageUpload(this,'FatherImage','FatherImageDisp','504','392')" accept="image/*" style="display:none;"/>
                                    </div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                    	<div id="tblhed">Image of Mother</div>
                                    	<label for="MotherImage">
                                        	<img id="MotherImageDisp" src="<?=$MotherImage?>" height="504" width="392" alt="Student Photo" title="Upload Mother's Photo" style="cursor:pointer; border:dotted;">
                                        </label>
                                        <input type="file" name="MotherImage" id="MotherImage" onChange="ImageUpload(this,'MotherImage','MotherImageDisp','504','392')" accept="image/*" style="display:none;"/>
                                    </div>
								</div>
							</div>
                            <hr />
                            <div class="card-footer">
                                <input type="submit" name="submtbtn" id="submtbtn" value="Upload" class="btn btn-success"></td>
                            </div>
                        </div>
					</form>
				</div>
			</section>
		</aside>
	</div>
	<?php include 'footer.php';?>
</body>
</html>