<?php

$stylesheet = strtolower(str_replace(" ", "-", $title));

echo <<<_END

<!DOCTYPE html>

<html>

	<head>
		<title>$title</title>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/$stylesheet.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>

_END;

?>