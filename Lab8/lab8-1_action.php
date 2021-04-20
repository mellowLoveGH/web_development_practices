<html>
<body>


<?php

// 6. Store the firstname and key in variables
// define variables and set to empty values
$firstname = $key = "";
$fn_exist = $k_exist = False;

// 3. 
// 5. handle the data being sent with either GET or POST
// get
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	//echo "<h1>GET method</h1>";
	
	// check whether it is existed
	$fn_exist = isExist("firstname", 'GET');
	$k_exist = isExist("key", 'GET');
	
	
	if($fn_exist)
		$firstname = test_input( $_GET["firstname"] );
	if($k_exist)
		$key = test_input( $_GET["key"] );
}
// post
else if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//echo "<h1>POST method</h1>";
	
	$fn_exist = isExist("firstname", 'POST');
	$k_exist = isExist("key", 'POST');
	
	
	if($fn_exist)
		$firstname = test_input( $_POST["firstname"] );
	if($k_exist)
		$key = test_input( $_POST["key"] );
}

// 4. only  print out the values if the values are set
// print out firstname & key for testing 
$testMode = False;
if($testMode){
	if($fn_exist){
		echo "First Name: ".$firstname;
		echo "<br/>";
	}else{
		echo "First Name is EMPTY.";
		echo "<br/>";
	}

	if($k_exist){
		echo "Unique Key: ".$key;
		echo "<br/>";
	}else{
		echo "Unique Key is EMPTY.";
		echo "<br/>";
	}	
}



// 6. read the file: data.txt into memory
// 0101,Bob,Bob's favorite coffee,images\coffee1.jpg
// 0102,Sally,Sally's favorite coffee,images\coffee2.jpg
$path = "data.txt";
$contents = file( $path );
$flag = False;
foreach ($contents as $line) {
	// echo $line;
	$arr = explode(",",$line);
	
	$k = $arr[0];
	$n = $arr[1];
	$cpn = $arr[2];
	$img = $arr[3];
	
    //echo $k.$n.$cpn.$img."<br/>";
	$flag = isCorrect($firstname, $n, $key, $k);
	if( $flag ) {
		// 7. The heading should be an <h1> element with the image a <figure> with <figcaption>.
		echo "<h1>$n's Coffee Choice</h1>";
		
		// 6.  display the image located at the indicated path formatted as a figure with caption.
		echo "<figure>";
		  echo "<img src='$img' alt='cannot access image'>";
		  echo "<figcaption>$cpn</figcaption>";
		echo "</figure>";
		
		break;
	}
}

if($flag){
		
}else{
	// 7. If the user and/or key is invalid or not provided, display a message indicating that.
	echo "<h2>the firstname and/or key is invalid or not provided</h2>";
}


// 7. how to compare strings with PHP
// case-insensitive match
// name is correct, key is present
function isCorrect($n1, $n2, $k1, $k2){
	$n1 = strtolower($n1);
	$n2 = strtolower($n2);
	
	$k1 = strtolower($k1);
	$k2 = strtolower($k2);
	if ($n1==$n2 and $k1==$k2)
		return True;
	return  False;
}


// check variable existed or not
function isExist($vName, $type){
	if($type == 'GET'){
		return isset($_GET[$vName]) && $_GET[$vName]!="";
	}else if($type == 'POST'){
		return isset($_POST[$vName]) && $_POST[$vName]!="";
	}
	return False;
}

// 
function Get($index, $defaultValue) {
    return isset($_GET[$index]) ? $_GET[$index] : $defaultValue;
}
// 
function Post($index, $defaultValue) {
    return isset($_POST[$index]) ? $_POST[$index] : $defaultValue;
}

// avoid injection hack
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


</body>
</html>