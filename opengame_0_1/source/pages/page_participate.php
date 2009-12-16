<?php
	include($VERSION_PATH . "core/header.php");
?>
<div id="page">
	<div id="content">
		<div class="post">
			<h1 class="title">Participate</h1>
			<?php 
				if(isset($_GET['eventid']) && $_SESSION['uid'] != 0){
					$eid = cleanInput($_GET['eventid']);
					if(participate($eid, $_SESSION['uid'])){	
						echo "WOOT! You have joined this event.";
					}else{
						echo "Joining this event failed. Please try again later.";
					}
				}else{
					echo "You need to be both logged in and have chosen a valid event to participate!";
				}
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
