<?php

// Import the application classes
require_once('include/classes.php');

// Create an instance of the Application class
$app = new Application();
$app->setup();

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Grab or initialize the input values
	$usernameOrEmail = $_POST['usernameOrEmail'];

	// Request a password reset email message
	$app->passwordReset($usernameOrEmail, $errors);

	$message = "An email has been sent to the specified account, if it exists. Please check your spam folder.";

}

?>

<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>russellthackston.me</title>
	<meta name="description" content="Russell Thackston's personal website for IT 5233">
	<meta name="author" content="Russell Thackston">
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php include 'include/header.php';
	 include 'include/bg.php'; ?>
<div class="section group">
		<div class="col span_1_of_2">

		</div>
		<div class="col span_1_of_2">
				<img src="css/images/logo_full_lat_a.png" alt="Food Pantry Logo" class="center" id="logo">
				<br/>
					<div class="center">
				<h2>Reset Password</h2>
				<?php include('include/messages.php'); ?>
			<div>
				<form method="post" action="reset.php">
					<input type="text" name="usernameOrEmail" id="usernameOrEmail" placeholder="Enter your username or email address" required="required"/>
					<br/>
					<input type="submit" value="Submit" />
				</form>
			</div>
				<br/>
				<a href="register.php">Need to create an account?</a>
					<?php include 'include/footer.php'; ?>
			</div>
		</div>
</div>
	<script src="js/site.js"></script>
</body>
</html>
