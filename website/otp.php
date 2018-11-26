
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Feed Me</title>
	<meta name="description" content="Chidera's Web App for IT 5233">
	<meta name="author" content="Chidera Obinali">
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<?php

	// Import the application classes
	require_once('include/classes.php');

	// Create an instance of the Application class
	$app = new Application();
	$app->setup();

	// Declare a set of variables to hold the username and password for the user
	$username = "";
	$password = "";

	// Declare an empty array of error messages
	$errors = array();

	// If someone has clicked their email validation link, then process the request
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

		if (isset($_GET['id'])) {

			$success = $app->processOTPEmail($_GET['id'], $errors);
			if ($success) {

					// Redirect the user to the topics page on success
					header("Location: recipes.php");
					exit();
			}

		}

	}

   require 'include/header.php'; ?>

	 			<?php include 'include/bg.php'; ?>
	 <div class="section group">
	 		<div class="col span_1_of_2">

	 		</div>
	 		<div class="col span_1_of_2">
	 			<img src="css/images/logo_reg_lat.png" alt="Food Pantry Logo" class="center" id="logo">
	 			<br/>
				<div class="center">
				<h2>One Time Password</h2>

			  <div>
			    <form method="GET" action="otp.php">

			      <input type="text" name="id" id="otp" placeholder="Please Enter Code" value="" />
			      <br/>

			      <input type="submit" value="send" name="Send" />
			    </form>
			  </div>
			  <a href="register.php">Need to create an account?</a>
			  <br/>
			  <a href="reset.php">Forgot your password?</a>
			</div>
		</div>
	</div>
  <?php include 'include/footer.php'; ?>
  <script src="js/site.js"></script>
  </body>
  </html>
