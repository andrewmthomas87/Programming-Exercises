<?php

$title = "Sign Up";

include "include/header.php";

echo <<<_END
		<nav class="active">
			<a href="/">Home</a>
			<a class="active" href="sign-up.php">Sign Up</a>
			<a href="log-in.php">Log In</a>
		</nav>
		<section id="main">
			<h1>Sign Up</h1>
			<form>
				<input type="text" placeholder="First name"><span>A-Z a-z</span>
				<input type="text" placeholder="Last name"><span>A-Z a-z</span>
				<input type="text" placeholder="Username"><span>A-Z a-z 0-9 _</span>
				<input type="password" placeholder="Password"><span>A-Z a-z 0-9 _</span>
				<input type="submit" value="Submit">
			</form>
		</section>

_END;

$scripts = array(
	"sign-up.js"
);

include "include/footer.php";

?>