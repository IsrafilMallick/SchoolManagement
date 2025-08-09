<?php
$requirelevel=1;
//header("refresh: 10;");
include 'ActiveUsers.php';
include "header.php";
 
$sql=mysqli_query($con,"SELECT COUNT(sl) FROM main_discount WHERE stat='1' GROUP BY StudentID") or die(mysqli_error($con));
$DisCountRequest=mysqli_num_rows($sql);
?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
	<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1><?php echo $cname?> <small>Dash Board</small></h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                </ol>
            </section>
			<section class="content">
				<div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><span id="GetDiscountRequestDiv"><?=$DisCountRequest;?></span></h3>
                                <p>Discounts Requests</p>
                            </div>
                            <div class="icon">
                            	<i class="fa fa-credit-card"></i>
                            </div>
                        	<a onclick="DiscountRequest()" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>
                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                            	<i class="ion ion-stats-bars"></i>
                            </div>
                        	<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>44</h3>
                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                            	<i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>65</h3>
                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
				</div>
			</section>
		</aside>
	</div>
    <div class="modal fade modal-lg" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="width:70%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="fa fa-credit-card"></i> <span id="ttl">Processed Complain Details</span></h4>
			</div>
			<div class="modal-body">
				<div id="page"></div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script>
$(function(){GetDiscountRequest();});
function GetDiscountRequest()
{
    setTimeout(GetDiscountRequest,1000);
    $.get('GetDiscountRequest.php', function(data){$('#GetDiscountRequestDiv').html(data);});
}

function DiscountRequest()
{
	$('#page').load('DiscountRequest.php').fadeIn("fast");
	$('#modal_box').modal('show');
	$('#ttl').html('Discount Details');
}

function DiscountRequestShow(StudentID)
{
	$('#DiscountRequestShow').load('DiscountRequestShow.php?StudentID='+StudentID).fadeIn('fast');
}
</script>