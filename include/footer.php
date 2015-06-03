<?php

echo "		<script src=\"/js/jquery-1.11.3.min.js\"></script>\n";

if (isset($scripts)) {
	foreach ($scripts as $script) {
		echo "		<script src=\"/js/$script\"></script>\n";
	}
}

echo <<<_END
	</body>

</html>

_END;

?>