<?php

$connection = mysql_connect('localhost','root','pword');

mysql_select_db('api');

for($i = 0;$i<100;$i++){
	$email="Jeff" . $i . "@imperial.emp";
	if($i%3 == 0){
		$title = "Inquisitor";
	}else if($i %3 == 1){
		$title = "Conciliator";
	}else{
		$title = "Breaker";
	}
	$pword = "Password".$i;

	$query = "INSERT INTO users VALUES '$i','$email','$title','$pword'";
	echo $query . "\n";

	mysql_query($query);
}

