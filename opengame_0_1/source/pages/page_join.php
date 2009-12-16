<?php
	include($VERSION_PATH . "core/header.php");
	$_SESSION['uid'] = 0;
	$_SESSION['uname'] = "";
	session_destroy();
	if(isset($_POST['username'])){
		$username = cleanInput($_POST['username']);
		$password = "";
		if($password1 == $password2){
			$password = md5(cleanInput($_POST['password1']));
		}else{
			echo "PASSWORDS DO NOT MATCH";
		}
		$fname = cleanInput($_POST['fname']);
		$lname = cleanInput($_POST['lname']);
		$street = cleanInput($_POST['street']);
		$city = cleanInput($_POST['city']);
		$state = cleanInput($_POST['state']);
		$zip = cleanInput($_POST['zip']);
		$phone1 = cleanInput($_POST['phone1']);
		$phone2 = cleanInput($_POST['phone2']);
		$phone3 = cleanInput($_POST['phone3']);
		if( $username && $password && $fname && $zip ){
			$values = array(
				"'" . $username . "', ",
				"'" . $password . "'"
			);
			//echo "LOCATION DIRTY: " . $_POST['location'] . " ::LOCATION CLEAN: " .  stripslashes($location);
			$result = createUserLogin($values);
			//if(TRUE){
			if($result){
				echo "USER LOGIN SUCCESSFULLY CREATED";
				$values = array(
					"'" . $fname . "', ",
					"'" . $lname . "', ",
					"'" . $city . "', ",
					"'" . $state . "', ",
					$zip . ", ",
					"'(" . $phone1 . ") " . $phone2 . "-" . $phone3 . "', "
				);
				createUserInfo($values);
			}else{
				echo "THERE WAS AN ERROR CREATING YOUR USER. PLEASE TRY AGAIN LATER.";
			}
		}else{
			echo "PLEASE FILL OUT ALL REQUIRED FIELDS.";
		}
	}
?>
<div id="page">
	<div id="content">
		<div class="post">
			<h1 class="title">Create a User Account</h1>
			<div class="entry">
				<form name="input" action="/join/index.php" method="post">
				<table>
					<tr><td colspan="3"><hr /></td></tr>
					<tr>
						<td align="right">Username*</td>
						<td align="left"><input type="text" name="username" /></td>
					</tr>
					<tr>
						<td align="right">Password*</td>
						<td align="left"><input type="password" name="password1" /></td>
					</tr>
					<tr>
						<td align="right">Retype Password*</td>
						<td align="left"><input type="password" name="password2" /></td>
					</tr>
					<tr>
						<td align="right">First Name*</td>
						<td align="left"><input type="text" name="fname" /></td>
					</tr>
					<tr>
						<td align="right">Last Name</td>
						<td align="left"><input type="text" name="lname" /></td>
					</tr>
					<tr>
						<td align="right">Street</td>
						<td align="left"><input type="text" name="street" /></td>
					</tr>
					<tr>
						<td align="right">City</td>
						<td align="left"><input type="text" name="city" /></td>
					</tr>
					<tr>
						<td align="right">State</td>
						<td align="left"><input type="text" name="state" /></td>
					</tr>
					<tr>
						<td align="right">Zip*</td>
						<td align="left"><input type="text" name="zip" /></td>
					</tr>
					<tr>
						<td align="right">Phone</td>
						<td align="left">
							<input type="text" name="phone1" size="5" maxlength="3"/>
							<input type="text" name="phone2" size="5" maxlength="3" />
							<input type="text" name="phone3" size="5" maxlength="4" />
						</td>
					</tr>
					<tr>
						<td align="right"></td>
						<td align="left"><input type="submit" value="Submit" /></td>
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
