<?php

$connection = mysql_connect('localhost','root','pword');

mysql_select_db('api');

//First find out what kind of request it is

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	//We recieved an ID that we are to return the user associated with that ID
	$id = $_GET["id"];

	//Query the DB

	$query = 'SELECT * FROM users WHERE id = ' . $id;
	$result = mysql_query($query);

	//Return the object

	$data = array();

	while($row = mysql_fetch_assoc($result)){
		$data['email'] = $row['email'];
		$data['title'] = $row['title'];
	}

	$json_data = json_encode($data);

	echo $json_data;


}else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
	//We recieved an ID and other fields and we are to update the information
	$id = $_GET["id"];

	//Go through our possible update fields
	if(isset($_GET["email"])){
		$newemail = $_GET["email"];
		$query = "UPDATE users SET email=$newemail WHERE id = $id";
		$result = mysql_query($query);

	}
	if(isset($_GET["pword"])){
		$newpword = $_GET["pword"];
		$query = "UPDATE users SET pword=$newpword WHERE id = $id";
		$result = mysql_query($query);
	}
	if(isset($_GET["title"])){
		$newtitle = $_GET["title"];
		$query = "UPDATE users SET title=$newtitle WHERE id = $id";
		$result = mysql_query($query);
	}


}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//We received a set of information and we are to insert a new entry into our database and return an id
	
	//Lets pull out of the post variables what we want to put into the entry
	$email = $_POST["email"];
	$password = $_POST["pword"];
	$title = $_POST["title"];

	$query = "INSERT INTO users VALUES($email,$pword,$title)";
	//Enter it into the DB

	mysql_query($query);
	//Query the DB for the id

	$query = "SELECT * FROM users WHERE email=$email,pword=$pword,title=$title";
	$result = mysql_query($query);
	//Reply with the id

	$data = array();
	while($row = mysql_fetch_assoc($result)){
		$data["id"] = $row["id"];
	}

	$json_data = json_encode($data);

	echo $json_data;

}else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
	//We recieved an ID and are to delete this from our database
	$id = $_GET["id"];

	$query = "DELETE FROM users WHERE id=$id";
	mysql_query($query);

	//Delete from the DB

}

