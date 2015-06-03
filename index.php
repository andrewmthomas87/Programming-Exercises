<?php

$title = "Home";

include "include/header.php";

echo <<<_END
		<nav class="active">
			<a class="active" href="/">Home</a>
			<a href="sign-up.php">Sign Up</a>
			<a href="log-in.php">Log In</a>
		</nav>
		<section id="main">
			<h1>Programming Exercises</h1>
			<h3><a href="sign-up.php">Sign Up</a> or <a href="log-in.php">Log In</a></h3>
		</section>
		<section id="bars">
			<div></div><div></div>
		</section>

_END;

$scripts = array(
	"home.js"
);

include "include/footer.php";

?>