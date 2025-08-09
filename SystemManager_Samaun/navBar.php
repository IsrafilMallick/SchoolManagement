<?php
?>
<nav class="main-header navbar navbar-expand navbar-dark navbar-warning">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button">
				<i class="fas fa-bars"></i>
			</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="index" class="nav-link">Home</a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-bell"></i>
				<span class="badge badge-warning navbar-badge">15</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">15 Notifications</span>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-envelope mr-2"></i> 4 new messages
					<span class="float-right text-muted text-sm">3 mins</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-users mr-2"></i> 8 friend requests
					<span class="float-right text-muted text-sm">12 hours</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-file mr-2"></i> 3 new reports
					<span class="float-right text-muted text-sm">2 days</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
			</div>
		</li>
		<li class="nav-item">
			<a onclick="return confirm('Are you sure to Logout');" class="nav-link" href="logout.php" role="button">
				<i class="fas fa-sign-out-alt"></i>
			</a>
		</li>
	</ul>
</nav>
  
  
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="index3.html" class="brand-link navbar-warning">
		<img src="<?php echo $logo;?>" class="brand-image img-circle elevation-3" style="opacity: 10">
		<span class="brand-text "><font color="white"><b>St. Mary </b></font></span>
	</a>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="../Theme/images/<?php echo $username;?>.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?php echo $UserName;?></a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item menu-open">
					<a href="index.php" class="nav-link active">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-edit"></i>
						<p>Entry<i class="fas fa-angle-left right"></i></p>
					</a>
					<?php if($userlevel<0){?>
					<ul class="nav nav-treeview" style="display: none;">
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-user nav-icon"></i>
								<p>Super Admin<i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview" style="display: none;">
								<li class="nav-item">
									<a href="QueryMaker.php" target="_blank" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Make Query</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="gender.php" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Gender Entry</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="caste.php" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Caste Entry</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="religion.php" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Religion Entry</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="relation.php" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Relation Entry</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="reference.php" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Referance Entry</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="BankEntry.php" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Bank Entry</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="PostOfficeEntry.php" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Post Office Entry</p>
									</a>
								</li>
							</ul>
						</li>
					</ul>
					<?php }?>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="ClassEntry.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i><p>Class Entry</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>Student Management<i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview" style="display: none;">
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fa fa-cog nav-icon"></i>
								<p>Setup<i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview" style="display: none;">
								<li class="nav-item">
									<a href="SectionSetup.php" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Section Setup</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="caste.php" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Fees Setup</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fa fa-edit nav-icon"></i>
								<p>Entry<i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview" style="display: none;">
								<li class="nav-item">
									<a href="StudentEntry.php" class="nav-link">
										<i class="fa fa-edit nav-icon"></i>
										<p>Student Entry</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="fa fa-book nav-icon"></i>
								<p>Report<i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview" style="display: none;">
								<li class="nav-item">
									<a href="gender.php" class="nav-link">
										<i class="fa fa-edit nav-icon"></i>
										<p>Student List</p>
									</a>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="ClassEntry.php" class="nav-link">
								<i class="far fa-circle nav-icon"></i><p>Class Entry</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>Setup<i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="classSetup" class="nav-link">
								<i class="far fa-circle nav-icon"></i><p>Class</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>