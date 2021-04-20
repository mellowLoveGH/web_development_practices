<!DOCTYPE html>
<html>

<p>Here are some results:</p>

<?php
// validates the type of request method 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$firstname = validate_check( 'firstname' );
	$lastname = validate_check( 'lastname' );
	$uname = validate_check( 'username' );
	$email = validate_check( 'email' );
	$psw = validate_check( 'password' );
	
	
	// operation on database
	$host = "localhost";
	$database = "lab9";
	$user = "webuser";
	$password = "P@ssw0rd";
	// --------------on my computer
	$user = "root";
	$password = "1234";
	// --------------
	$connection = mysqli_connect($host, $user, $password, $database);
	$error = mysqli_connect_error();
	if($error != null)
	{
	  $output = "<p>Unable to connect to database!</p>";
	  exit($output);	  
	}
	//good connection, so do you thing
	else{
		
		$sql = "SELECT * FROM users;";
		$results = mysqli_query($connection, $sql);
		
		$flag = false;
		
		//and fetch requsults
		while ($row = mysqli_fetch_assoc($results))
		{
		  //echo $row['username']." ".$row['firstName']." ".$row['lastName']." ".$row['email']." ".$row['password']."<br/>";
		  
			// Check to see if the user already exists in the database 
			// based on username or email address
		  if($row['username']==$uname || $row['email']==$email){
			  $flag = true;
		  }		  
		}
		
		// If the user already exists
		if ($flag){
			echo 'User already exists with this name and/or email';
			echo '<br/>';
			echo "<a href='./lab9-1.html'>Return to user entry</a>";
		}
		// If the user does not exist
		else{
			// hashed with md5() function
			$en_psw = md5($psw);
			// 
			$sql = "insert into users values ('$firstname', '$lastname', '$uname', '$email', '$en_psw');";
			//echo $sql;
			$rtl = mysqli_query($connection, $sql);
			if($rtl){
				echo "An account for the user $uname has been created";
				echo '<br/>';
			}else{
				echo 'cannot write into database';
			}
		}
	
		
		// closing the database connection when complete
		mysqli_free_result($results);
		mysqli_close($connection);
	}
	
}else{
	// GET request
	echo 'you are not uploading data via POST method';	
}

// checking to ensure that all parameters are set
function validate_check($vName){
	if ( isset($_POST[$vName]) ){
		return $_POST[$vName];
	}	
	return "";
}





?>
</html>
