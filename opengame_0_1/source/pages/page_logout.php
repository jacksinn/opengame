<?php
	include($VERSION_PATH . "core/header.php");
	$_SESSION['uid'] = 0;
	$_SESSION['uname'] = "";
	session_destroy();
?>
<div id="page">
	<div id="content">
		<div class="post">
			<h1 class="title">Logout</h1>
			You Have Been Suxccessfully Logged Out!
			<div class="entry">
			</div>
		</div>
	</div>
	<!-- end #content -->
	<div id="sidebar">
		<div id="sidebar-bgtop"></div>
		<div id="sidebar-content">
			<div id="sidebar-bgbtm">
			<ul>
				<li id="search">
					<h2>Login</h2>
					<?php include($VERSION_PATH . "core/functions/login.php"); ?>
				</li>
				<li>
					<h2>Lorem Ipsum</h2>
					<ul>
						<li><a href="#">Fusce dui neque fringilla</a></li>
						<li><a href="#">Eget tempor eget nonummy</a></li>
						<li><a href="#">Magna lacus bibendum mauris</a></li>
						<li><a href="#">Nec metus sed donec</a></li>
						<li><a href="#">Magna lacus bibendum mauris</a></li>
						<li><a href="#">Velit semper nisi molestie</a></li>
						<li><a href="#">Eget tempor eget nonummy</a></li>
					</ul>
				</li>
			</ul>
		</div>
		</div>
	</div>
	<!-- end #sidebar -->
	<div style="clear:both; margin:0;"></div>
</div>
<!-- end #page -->
<?php
	include($VERSION_PATH . "core/footer.php");
?>
