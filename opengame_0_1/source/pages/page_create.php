<?php
	include($VERSION_PATH . "core/header.php");
		
	if(isset($_POST['sport']) && $_SESSION['uid'] != 0){
		$sport = cleanInput($_POST['sport']);
		$location = cleanInput($_POST['location']);
		$street = cleanInput($_POST['street']);
		$city = cleanInput($_POST['city']);
		$state = cleanInput($_POST['state']);
		$zip = cleanInput($_POST['zip']);
		$day = cleanInput($_POST['day']);
		$month = cleanInput($_POST['month']);
		$year = cleanInput($_POST['year']);
		$startHour = cleanInput($_POST['startHour']);
		$startMin = cleanInput($_POST['startMin']);
		$startMeridian = cleanInput($_POST['startMeridian']);
		$stopHour = cleanInput($_POST['stopHour']);
		$stopMin = cleanInput($_POST['stopMin']);
		$stopMeridian = cleanInput($_POST['stopMeridian']);
		$min = cleanInput($_POST['min']);
		$max = cleanInput($_POST['max']);
		$description = cleanInput($_POST['description']);
		
		if( $sport && $location && $zip && $day && $month && $year && 
			$startHour && $startMin && $startMeridian){
			//echo "VALUES SET:" . $sport;
			$values = array(
				$sport . ", ",
				$_SESSION['uid'] . ", ",
				"'" . $location . "', ",
				"'" . $street . "', ",
				"'" . $city . "', ",
				"'" . $state . "', ",
				$zip . ", ",
				"'" . $year . "-" . $month . "-" . $day . "', ",
				"'" . $startHour . ":" . $startMin . " " . $startMeridian . "', ",
				"'" . $stopHour . ":" . $stopMin . " " . $stopMeridian . "', ",
				$min . ", ",
				$max . ", ",
				"'" . $description . "'"
			);
			//echo "LOCATION DIRTY: " . $_POST['location'] . " ::LOCATION CLEAN: " .  stripslashes($location);
			if(createEvent($values)){
				echo "EVENT SUCCESSFULLY CREATED";
			}else{
				echo "THERE WAS AN ERROR CREATING YOUR EVENT. PLEASE TRY AGAIN LATER.";
			}
		}else{
			echo "PLEASE FILL OUT ALL REQUIRED FIELDS.";
		}
	}
?>
<div id="page">
	<div id="content">
		<div class="post">
			<h1 class="title">Create an Open Game</h1>
			<div class="entry">
				<form name="input" action="/create/index.php" method="post">
				<table>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<td align="left"><b>SPORT</b></td>
						<td></td>
						<td></td>
					</tr>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<td></td>
						<td align="right">Choose Sport*</td>
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
					</tr>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<td align="left"><b>LOCATION</b></td>
						<td></td>
						<td></td>
					</tr>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<td></td>
						<td align="right">Location Name*</td>
						<td align="left"><input type="text" name="location" /></td>
					</tr>
					<tr>
						<td></td>
						<td align="right">Street Address</td>
						<td align="left"><input type="text" name="street" /></td>
					</tr>
					<tr>
						<td></td>
						<td align="right">City</td>
						<td align="left"><input type="text" name="city" /></td>
					</tr>
					<tr>
						<td></td>
						<td align="right">State</td>
						<td align="left"><input type="text" name="state" /></td>
					</tr>
					<tr>
						<td></td>
						<td align="right">Zip*</td>
						<td align="left"><input type="text" name="zip" /></td>
					</tr>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<td align="left"><b>TIME</b></td>
						<td></td>
						<td></td>
					</tr>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<td></td>
						<td align="right">Date*</td>
						<td align="left">
						<select name="day" >
							<?php
								for($i=1; $i<32; $i++){
									if($i < 10){
										echo "<option value=\"0" . $i . "\" default>0" . $i . "</option>\n";
									}else{
										echo "<option value=\"" . $i . "\">" . $i . "</option>\n";
									}
								}
							?>
						</select>
						<select name="month">
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
						<select name="year" >
							<?php
								for($i=date("Y"); $i<date("Y")+5; $i++){
									echo "<option value=\"" . $i . "\">" . $i . "</option>\n";
								}
							?>
						</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td align="right">Start Time*</td>
						<td align="left">
							<select name="startHour" >
								<?php
									for($i=1; $i<=12; $i++){
										echo "<option value=\"" . $i . "\">" . $i . "</option>\n";
									}
								?>
							</select>
							:
							<select name="startMin" >
								<option value="00">00</option>
								<option value="00">15</option>
								<option value="00">30</option>
								<option value="00">45</option>
							</select>
							<select name="startMeridian" >
								<option value="AM">AM</option>
								<option value="PM">PM</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td align="right">Stop Time</td>
						<td align="left">
						<select name="stopHour" >
							<?php
								for($i=1; $i<=12; $i++){
									echo "<option value=\"" . $i . "\">" . $i . "</option>\n";
								}
							?>
						</select>
						:
						<select name="stopMin" >
							<option value="00">00</option>
							<option value="00">15</option>
							<option value="00">30</option>
							<option value="00">45</option>
						</select>
						<select name="stopMeridian" >
							<option value="AM">AM</option>
							<option value="PM">PM</option>
						</select>
						</td>
					</tr>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<td align="left"><b>DETAILS</b></td>
						<td></td>
						<td></td>
					</tr>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<td></td>
						<td align="right">Min. Players</td>
						<td align="left">
							<select name="min" >
								<?php
									for($i=1; $i<=50; $i++){
										echo "<option value=\"" . $i . "\">" . $i . "</option>\n";
									}
								?>
							</select>
							Max. Players
							<select name="max" >
								<?php
									for($i=2; $i<=50; $i++){
										echo "<option value=\"" . $i . "\">" . $i . "</option>\n";
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td align="right">Event Description</td>
						<td align="left"><textarea name="description" rows="10" cols="50" /></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td align="right"></td><td align="left"><input type="submit" value="Submit" /></td>
					</tr>
				</table>
				</form> 
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
