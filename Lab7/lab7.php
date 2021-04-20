<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lab 7</title>

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="css/lab7.css" rel="stylesheet">

</head>

<body>

<?php
	// 2. include the file lab7-data.php 
	// $email, $password
	include "lab7-data.php";
	
?>

<div class="container">
   <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
         <div id="login">
            <div class="page-header">
               <h2>Login</h2>
            </div>
            <form role="form">
									<!-- 5. if $email is empty, Add the has-error CSS class -->
              <div class="form-group <?php if(empty($email)) echo "has-error"; else echo "";  ?>">
                <label for="exampleInputEmail1">Email address</label>
																		<!-- 4. values provided by the variables $email and $password -->	
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" >
                <p class="help-block">Enter an email</p>
              </div>
									<!-- 6. if $password is empty, Add the has-error CSS class -->
              <div class="form-group <?php if(empty($password)) echo "has-error"; else echo "";  ?>">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" >
                <p class="help-block">Enter a password</p>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Server</label>
                <select name="server" class="form-control">
                  <!--Replace the following elements with PHP
				  <option>Server 1</option>
                  <option>Server 2</option>
                  <option>Server 3</option>
                  <option>Server 4</option>
                  <option>Server 5</option>
				  -->
					<?php
						// 3. for loop in PHP, replace the <option> elements
						for($i = 0; $i<5; $i++){
							$num = $i + 1;
							echo "<option>Server $num</option>";				
						}
						
					?>
                  
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
      <div class="col-md-3">
      </div>
   </div>
</div>  <!-- end container -->

 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_defaultTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_defaultTheme/dist/js/bootstrap.min.js"></script>
</body>
</html>
