<?php

$mysqli = new mysqli("localhost", "progra71", "Asdf_195789", "progra71_data");
$SQL = "SELECT id, name FROM classes";
$statement = $mysqli->prepare($SQL);
$statement->bind_result($id, $name);
$statement->execute();
while ($statement->fetch()) {
	echo "			<a class=\"class-name\" class-id=\"$id\">$name</a><a class=\"delete\">Delete</a>\n";
}
$statement->close();

?>