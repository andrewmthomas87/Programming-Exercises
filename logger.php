<?php

$mysqli = new mysqli("localhost", "progra71", "Asdf_195789", "progra71_data");
$SQL = "SELECT username FROM users";
$statement = $mysqli->prepare($SQL);
$statement->bind_param("s", $username);
$statement->execute();

die("Success");

?>