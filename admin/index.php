<?php

if (!(isset($_POST["username"]) && $_POST["username"] == "admin" && isset($_POST["password"]) && $_POST["password"] == "robotsrcool")) {
	header("Location: log-in.html");
}

echo <<<_END

<!DOCTYPE html>

<html>

	<head>
		<title>Admin Panel</title>
		<link href="admin.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<section id="sidebar">
			<h1>Classes</h1>

_END;

$mysqli = new mysqli("localhost", "progra71", "Asdf_195789", "progra71_data");
$SQL = "SELECT name FROM classes";
$statement = $mysqli->prepare($SQL);
$statement->bind_result($name);
$statement->execute();
while ($statement->fetch()) {
	echo "			<a>$name</a>\n";
}
$statement->close();

echo <<<_END
			<span>+</span>
		</section><!--
		--><section id="main">
			
		</section>
		<div id="overlay">
			<a>x</a>
		</div>
		<form id="newClass">
			<input type="text" placeholder="Name">
			<input type="text" placeholder="Description">
			<input type="submit" value="Add class">
		</form>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="admin.js"></script>
	</body>

</html>

_END;



?>