<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Free Radicals
Description: A two-column, fixed-width design with dark color scheme background.
Version    : 1.0
Released   : 20081230

-->

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Open Game - Find Open Games in Your Area!</title>
		<link rel="stylesheet" type="text/css" href="/css/style.css" media="screen" />
	</head>
	<body>
		<div id="wrapper">
		<div id="header">
			<div id="logo">
				<!--<h1><a href="#">Open Game</a></h1>-->
				<a href="index.php"><img src="/images/opengame.png"></a>
				<p>Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></p>
			</div>
			<!-- end #logo -->
			<div id="menu">
				<ul>
					<li class="active"><a href="/">HOME</a></li>
					<li><a href="/latest/">LATEST</a></li>
					<li><a href="/search/">SEARCH</a></li>
					<li><a href="/create/">CREATE</a></li>
					<li><a href="/about/">ABOUT</a></li>
				</ul>
			</div>
			<!-- end #menu -->
		</div>
		<!-- end #header -->
		<?php
			include($VERSION_PATH . "core/functions/dbConn.php");
			include($VERSION_PATH . "core/functions/sql.php");
			include($VERSION_PATH . "core/functions/general_functions.php");
		?>

