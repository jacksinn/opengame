<?php
	include($VERSION_PATH . "core/header.php");
?>
<div id="page">
	<div id="content">
		<div class="post">
			<h1 class="title">My Events</h1>
			<hr />
			EVENTS I OWN
			<hr />
			<?php
				echo ownEvents($_SESSION['uid']);
			?>
			<hr />
			EVENTS I'M IN
			<hr />
			<?php
				echo inEvents($_SESSION['uid']);
			?>
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
