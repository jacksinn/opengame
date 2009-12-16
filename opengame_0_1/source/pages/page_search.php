<?php
	include($VERSION_PATH . "core/header.php");
?>
<div id="page">
	<div id="content">
		<div class="post">
			<h1 class="title">Search for an Open Game</h1>
			<div class="entry">
				<table>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<form name="bysport" action="/search/index.php" method="get">
						<td align="right">Search By Sport</td>
						<td align="left">
							<select name="sport" />
								<option value="1">Soccer</option>
								<option value="2">Baseball</option>
								<option value="3">Softball</option>
								<option value="4">Football</option>
								<option value="5">Basketball</option>
								<option value="6">Ice Hockey</option>
								<option value="7">Field Hockey</option>
								<option value="8">Cricket</option>
								<option value="9">Lacrosse</option>
								<option value="10">Tennis</option>
								<option value="11">Golf</option>
								<option value="12">Disc Golf</option>
								<option value="13">Ultimate Frisbee</option>
								<option value="14">Rugby</option>
								<option value="15">Yoga</option>
								<option value="16">Pilates</option>
							</select>
						</td>
						<td><input type="submit" value="Search" /></td>
						</form>
					</tr>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<form name="byzip" action="/search/index.php" method="get">
						<td align="right">Search By Zip</td>
						<td align="left">
							<input type="text" name="zip" />
						</td>
						<td><input type="submit" value="Search" /></td>
						</form>
					</tr>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<form name="bylocation" action="/search/index.php" method="get">
						<td align="right">Search By Location</td>
						<td align="left">
							<input type="text" name="location" />
						</td>
						<td><input type="submit" value="Search" /></td>
						</form>
					</tr>
					<tr>
						<td colspan="3" align="left">
						<?php
							$bysport = cleanInput($_GET['sport']);
							$byzip = cleanInput($_GET['zip']);
							$bylocation = cleanInput($_GET['location']);
							if($bysport || $byzip || $bylocation){
								echo "<hr /><b><center>RESULTS</center></b><hr />";
								if($bysport){
									echo searchEvents("sport", $bysport);
								}else if($byzip){
									echo searchEvents("zip", $byzip);
								}else if($bylocation){
									echo searchEvents("location", $bylocation);
								}else{
									echo "<b>NO RESULTS</b>";
								}
							}
						?>
						</td>
					</tr>
				</table>
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
