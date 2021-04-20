<!DOCTYPE html>
<html>
<head></head>
<body>
	<?php
		// Part I: Apache, PHP and MySQL for Local Development
		echo "<p>Hello, world</p>";
	?>
	
	<?php
		// Part II: PHP variables, Data types and Constants
		define("THE_CONSTANT", "42");
		$first_name = "Arthur";
		$second_name = "Dent";
		echo "<p>Hello, world</p>";
		echo "<p>".$first_name." ".$second_name." pulls
		random letters from a bag, but only gets the
		sentence \"What do you get if you multiply six
		by nine?\"<p>";
		echo "<p>".THE_CONSTANT."</p>";
	?>
	
	
</body>
</html>