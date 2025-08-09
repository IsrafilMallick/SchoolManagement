<?php
$requirelevel=1;
include 'ActiveUsers.php';
include "header.php";
?>
<!--<script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>-->
	<div class="wrapper row-offcanvas row-offcanvas-left">
	<?php include "left_bar.php";?>
		<aside class="right-side">
			<section class="content-header">
                <h1><?php echo $cname?> <small>Dash Board</small></h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <!--<li class="active">Complain</li>-->
                </ol>
            </section>
			<section class="content">
				<div class="row">
					<section class="col-lg-6 connectedSortable"> 
					</section>
				</div>
			</section>
		</aside>
	</div>
</body>
</html>