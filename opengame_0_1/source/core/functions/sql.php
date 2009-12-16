<?php
function createEvent($values){
	$queryString = "INSERT INTO EVENT ";
	$queryString .= "VALUES( '', ";
	foreach($values as $value){
		$queryString .= $value;
	}
	$queryString .= ")";
	
	$result = mysql_query($queryString);
	
	return $result;
}

function createUserLogin($values){
	$queryString = "INSERT INTO USER_LOGIN ";
	$queryString .= "VALUES( '', ";
	foreach($values as $value){
		$queryString .= $value;
	}
	$queryString .= ")";
	
	//echo $queryString . "<br />";
	
	$result = mysql_query($queryString);
	
	return $result;
}

function createUserInfo($values){
	$queryString = "INSERT INTO USER_INFO ";
	$queryString .= "VALUES( '', 0, ";
	foreach($values as $value){
		$queryString .= $value;
	}
	$queryString .= "0, 0 )";
	
	//echo $queryString . "<br />";

	$result = mysql_query($queryString);
	
	return $result;
}
function participate($eid, $uid){
	$queryString = "INSERT INTO PARTICIPANT_LOOKUP ";
	$queryString .= "VALUES( " . $uid . ", " . $eid . ", 0";
	$queryString .= ")";
	//echo $queryString;
	$result = mysql_query($queryString);
	
	return $result;
}

function ownEvents($uid){
	$html = "";
	$queryString =  "SELECT s.SPORTNAME as SPORT, e.LOCATION as LOC, e.DATE as DATE, e.START as START ";
	$queryString .= "FROM SPORTS s, EVENT e ";
	$queryString .= "WHERE e.SPORT_ID = s.SPORT_ID AND e.COORDINATOR_USER_ID = " . $uid . " ";
	$queryString .= "ORDER BY EVENT_ID DESC";

	//echo $queryString;
	$result = mysql_query($queryString);
	if($result){
		while($row = mysql_fetch_array($result)){
			$html .= $row['SPORT'] . " | " . $row['LOC'] . " | " . $row['DATE'] . " | " . $row['START'] . "<br />";
		}
	}else{
		$html = "YOU OWN NO EVENTS";
	}
	return $html;
}

function inEvents($uid){
	$html = "";
	$queryString =  "SELECT s.SPORTNAME as SPORT, e.LOCATION as LOC, e.DATE as DATE, e.START as START ";
	$queryString .= "FROM SPORTS s, EVENT e, PARTICIPANT_LOOKUP p ";
	$queryString .= "WHERE e.SPORT_ID = s.SPORT_ID AND p.USER_ID = " . $uid . " ";
	$queryString .= "AND p.EVENT_ID = e.EVENT_ID ";
	$queryString .= "ORDER BY e.EVENT_ID DESC";

	//echo $queryString;
	$result = mysql_query($queryString);
	if($result){
		while($row = mysql_fetch_array($result)){
			$html .= $row['SPORT'] . " | " . $row['LOC'] . " | " . $row['DATE'] . " | " . $row['START'] . "<br />";
		}
	}else{
		$html = "YOU PARTICIPATE IN NO EVENTS";
	}
	return $html;
}

function userLogin($username, $password){
	$queryString = "SELECT l.USER_ID as USER_ID, i.FNAME as FNAME ";
	$queryString .= "FROM USER_LOGIN l, USER_INFO i ";
	$queryString .= "WHERE l.UNAME = '" . $username . "' ";
	$queryString .= "AND l.UPW = '" . $password . "' ";
	$queryString .= "AND l.USER_ID = i.USER_ID ";
	
	//echo $queryString . "<br />";
	$result = mysql_query($queryString);
	
	if($result){
		$row = mysql_fetch_array($result);
		return array($row['USER_ID'], $row['FNAME']);
	}else{
		return array(0,0);
	}
}

function latestEvents(){
	$html = "";
	$queryString =  "SELECT u.UNAME as USER, s.SPORTNAME as SPORT, e.LOCATION as LOC, e.DATE as DATE, e.START as START, e.EVENT_ID as EID ";
	$queryString .= "FROM SPORTS s, EVENT e, USER_LOGIN u ";
	$queryString .= "WHERE e.SPORT_ID = s.SPORT_ID AND e.COORDINATOR_USER_ID = u.USER_ID ";
	$queryString .= "ORDER BY EVENT_ID DESC ";
	$queryString .= "LIMIT 10";

	//echo $queryString;
	$result = mysql_query($queryString);
	if($result){
		while($row = mysql_fetch_array($result)){
			$html .= $row['USER'] . " | " . $row['SPORT'] . " | " . $row['LOC'] . " | " . $row['DATE'] . " | " . $row['START'] . " | <a href=\"/participate/index.php?eventid=" . $row['EID'] . "\">JOIN GAME</a><br />";
		}
	}else{
		$html = "NO EVENTS AVAILABLE";
	}
	return $html;
}

function searchEvents($searchby, $searchString){
	$html = "";
	$queryString =  "SELECT u.UNAME as USER, s.SPORTNAME as SPORT, e.LOCATION as LOC, e.DATE as DATE, e.START as START, e.EVENT_ID as EID ";
	$queryString .= "FROM SPORTS s, EVENT e, USER_LOGIN u ";
	if($searchby == "zip"){
		$queryString .= "WHERE e.ZIP = " . $searchString . " ";
	}else if($searchby == "sport"){
		$queryString .= "WHERE e.SPORT_ID = " . $searchString . " ";
	}else{
		$queryString .= "WHERE e.LOCATION LIKE '%" . $searchString . "%' ";
	}
	$queryString .= "AND e.SPORT_ID = s.SPORT_ID ";
	$queryString .= "AND e.COORDINATOR_USER_ID = u.USER_ID ";
	$queryString .= "ORDER BY EVENT_ID DESC ";
	$queryString .= "LIMIT 10";

	//echo $queryString;
	$result = mysql_query($queryString);
	if($result){
		while($row = mysql_fetch_array($result)){
			$html .= $row['USER'] . " | " . $row['SPORT'] . " | " . $row['LOC'] . " | " . $row['DATE'] . " | " . $row['START'] . " | <a href=\"/participate/index.php?eventid=" . $row['EID'] . "\">JOIN GAME</a><br />";
		}
	}else{
		$html = "NO EVENTS AVAILABLE";
	}
	return $html;
}
?>
