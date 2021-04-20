<!DOCTYPE html>
<html>
<head></head>
<body>
	
	<?php
		// Part III: Program Control
		$logged_in = false;
		echo "<p>Hello, world</p>";
		if ($logged_in == true){
			echo "<p>Welcome user!<p>";
		}
		else {
			echo "<p>Logged out<p>";
		}
	?>
	
	<?php
		/*
		// Part IV: Functions
		$logged_in = true;
		$user = "Arthur";
		echo "<p>Hello, world</p>";
		echo login_message($logged_in);
		function login_message($is_logged_in = false)
		{
			global $user;
			if ($is_logged_in == true){
				return "<p>Welcome ".$user."</p>";
			}
			else {
				return "<p>Logged out<p>";
			}
		}		
		*/
	?>
	
	<?php
		// Part V: Include Files
		include "login_msg.php";
		$logged_in = true;
		$user = 'Arthur';
		echo "<p>Hello, world</p>";
		echo login_message($logged_in);
	?>
	
</body>
</html>