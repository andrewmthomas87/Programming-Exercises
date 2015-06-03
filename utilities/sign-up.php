<?php

$response = array(
	"error" => true
);

if (!(isset($_POST["firstName"]) && $_POST["firstName"] && isset($_POST["lastName"]) && $_POST["lastName"] && isset($_POST["username"]) && $_POST["username"] && isset($_POST["password"]) && $_POST["password"])) {
	die(json_encode($response));
}

$response["error"] = false;

$first_name = $_POST["firstName"];
$last_name = $_POST["lastName"];
$username = $_POST["username"];
$password = $_POST["password"];

$response["firstName"] = !preg_match("/^[a-z]+$/i", $first_name);
$response["lastName"] = !preg_match("/^[a-z]+$/i", $last_name);
$response["username"] = !preg_match("/^\w+$/", $username);
$response["password"] = !preg_match("/^\w+$/", $password);

$response["error"] = $response["firstName"] || $response["lastName"] || $response["username"] || $response["password"];

if (!$response["error"]) {
	$mysqli = new mysqli("localhost", "progra71", "Asdf_195789", "progra71_data");
	$SQL = "SELECT username FROM users WHERE username=?";
	$statement = $mysqli->prepare($SQL);
	$statement->bind_param("s", $username);
	$statement->execute();
	if ($statement->fetch()) {
			$response["error"] = $response["username"] = true;
	}
	$statement->close();
	if (!$response["error"]) {
		$password = hash("sha512", $password . $username);
		$SQL = "INSERT INTO users (firstName, lastName, username, password) VALUES (?, ?, ?, ?)";
		$statement = $mysqli->prepare($SQL);
		$statement->bind_param("ssss", $first_name, $last_name, $username, $password);
		$statement->execute();
		$statement->close();
		$mysqli->close();
	}
}

echo json_encode($response);

?>