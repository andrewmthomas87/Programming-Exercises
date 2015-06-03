<?php

session_start();

if (isset($_SESSION["username"]) && $_SESSION["username"]) {
	header("classes.php");
}

$title = "Log In";

include "include/header.php";

echo <<<_END
		<nav class="active">
			<a href="/">Home</a>
			<a href="sign-up.php">Sign Up</a>
			<a class="active" href="log-in.php">Log In</a>
		</nav>
		<section id="main">
			<h1>Log In</h1>
			<form>
				<input type="username" placeholder="Username">
				<input type="password" placeholder="Password">
				<input type="submit" value="Submit">
			</form>
		</section>

_END;

$scripts = array(
	"log-in.js"
);

include "include/footer.php";

?>