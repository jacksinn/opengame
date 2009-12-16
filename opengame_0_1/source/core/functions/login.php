<?php
$loggedin = FALSE;
if(isset($_POST['user']) && isset($_POST['pass'])){
	$user = cleanInput($_POST['user']);
	$pass = md5(cleanInput($_POST['pass']));
	//echo $_POST['pass'] . "<br />";
	//echo $pass . "<br />";
	$userinfo = userLogin($user, $pass);
	
	if($userinfo[0] != 0){
		$_SESSION['uid'] = $userinfo[0];
		$_SESSION['uname'] = $userinfo[1];
	}else{
		$_SESSION['uid'] = 0;
		$_SESSION['uname'] = "";
		echo "Wrong Username or Password";
	}
	//echo "Hello, " . $_POST["verified_user"];
}

if($_SESSION['uid'] == 0){
	echo "<form name=\"input\" action=\"/index.php\" method=\"post\">\n";
	echo "<table>\n";
	echo "	<tr>\n";
	echo "		<td>Username:</td><td><input type=\"text\" name=\"user\" /></td>\n";
	echo "	</tr>\n";
	echo "	<tr>\n";
	echo "		<td>Password:</td><td><input type=\"password\" name=\"pass\" /></td>\n";
	echo "	</tr>\n";
	echo "	<tr>\n";
	echo "		<td></td><td><input type=\"submit\" value=\"Submit\" /></td>\n";
	echo "	</tr>\n";
	echo "</table>\n";
	echo "</form>\n";
	echo "<center><b><a href=\"/join/\">Not registered? Click here to join free!</a></b></center>\n";
}else{
	echo "Welcome Back, <b><a href=\"/my/\">" . $_SESSION['uname'] . "</a>!</b><br />"; 
	echo "<a href=\"/logout/\">Not you? Click here to switch users.</a><br />";
}
?>
