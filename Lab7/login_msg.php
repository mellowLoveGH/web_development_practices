<?php
function login_message($is_logged_in = false)
{
	global $user;
	if ($is_logged_in == true){
		return "<p>Welcome ".$user."<p>";
	}
	else {
		return "<p>Logged out<p>";
	}
}
?>