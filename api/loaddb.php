<?php

$connection = mysql_connect('localhost','root','rezound');

mysql_select_db('tutorial');

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

	$query = "INSERT INTO users VALUES $email,$title,$pword";
	mysql_query($query);
}

