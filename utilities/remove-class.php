<?php

$response = array(
	"error" => true
);

if (!(isset($_POST["id"]) && $_POST["id"])) {
	die(json_encode($response));
}

$id = $_POST["id"];

$mysqli = new mysqli("localhost", "progra71", "Asdf_195789", "progra71_data");
$SQL = "DELETE FROM classes WHERE id = $id";
$statement = $mysqli->prepare($SQL);
$statement->execute();
$statement->close();

$response["error"] = false;

echo json_encode($response);

?>