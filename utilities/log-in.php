<?php

session_start();

$response = array(
	"error" => true
);

if (!(isset($_POST["username"]) && $_POST["username"] && isset($_POST["password"]) && $_POST["password"])) {
	die(json_encode($response));
}

$username = $_POST["username"];
$password = hash("sha512", $_POST["password"] . $username);

$mysqli = new mysqli("localhost", "progra71", "Asdf_195789", "progra71_data");
$SQL = "SELECT username FROM users WHERE username=? && password=?";
$statement = $mysqli->prepare($SQL);
$statement->bind_param("ss", $username, $password);
$statement->execute();
if ($statement->fetch()) {
	$_SESSION["username"] = $username;
	$response["error"] = false;
}
$statement->close();

echo json_encode($response);

?>