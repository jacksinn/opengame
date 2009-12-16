<?php
	include($VERSION_PATH . "core/header.php");
?>
<div id="page">
	<div id="content">
		<div style="margin-bottom: 10px;">
			<?php include($VERSION_PATH . "core/functions/fpss.php"); ?>
		</div>
		<div class="post">
			<h1 class="title">About Open Game!</h1>
			<div class="entry">
				<p><b>Welcome to the Open Game community!</b> This site serves as a stomping ground you local athletes and leisurely participants to create or look for an exisiting pickup game in your area. Sign-up is free and confidential. We intend to always provide free and open access to events.</p>
				<p>We look forward to serving the community by promoting a healthy lifestyle and local camaraderie (and a bit of friendly rivalry!).</p>
				<p>See you on the pitch!</p>
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
