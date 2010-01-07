<?php
function cleanInput($dirty){
	addslashes($dirty);
	$blacklist = array(
		"'" => "&#39;",
		'"' => "&quot;",
		";" => "&#59;"
		);
	$clean = "";
	for($i=0; $i<strlen($dirty); $i++){
		$tmp = $dirty[$i];
		foreach($blacklist as $key => $value){
			if($dirty[$i] == $key){
				$tmp = $value;
			}
		}
		$clean .= $tmp;
	}
	return $clean;
}
?>
