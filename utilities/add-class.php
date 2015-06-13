<?php

$response = array(
	"error" => true
);

if (!(isset($_POST["name"]) && $_POST["name"] && isset($_POST["description"]) && $_POST["description"])) {
	die(json_encode($response));
}

$response["error"] = false;

$name = $_POST["name"];
$description = $_POST["description"];

$response["error"] = $response["firstName"] || $response["lastName"];

if (!$response["error"]) {
	$mysqli = new mysqli("localhost", "progra71", "Asdf_195789", "progra71_data");
	$SQL = "INSERT INTO classes (name, description) VALUES (?, ?)";
	$statement = $mysqli->prepare($SQL);
	$statement->bind_param("ss", $name, $description);
	$statement->execute();
	$statement->close();
	$response["name"] = $name;
	
	$SQL = "SELECT id FROM classes WHERE name = '$name'";
	$statement = $mysqli->prepare($SQL);
	$statement->bind_result($id);
	$statement->execute();
	$statement->close();
	$response["id"] = $id;
}

echo json_encode($response);

?>