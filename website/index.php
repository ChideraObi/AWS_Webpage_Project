<?php

// Import the application classes
require_once('include/classes.php');

// Create an instance of the Application class
$app = new Application();
$app->setup();

// Declare an empty array of error messages
$errors = array();

?>



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
			<?php include 'include/header.php';
			include 'include/bg.php'; ?>

<div class="section group">
	<div class="col span_1_of_2">

		</div>
		<div class="col span_1_of_2">
				<img src="css/images/logo_full_lat_a.png" alt="Food Pantry Logo" class="center" id="logo">
				<br/>
					<div class="center">
			<h1>WELCOME TO FEED ME! 🍽️</h1>
		<p>
			Tired of leftovers?<p/>
			Have a desire for something unique?<p/>
			Your partner bugging you to stop making grilled cheese?</p>

		<p>Then you've come to the right place! Feed Me  is a <b> recipe finder app </b> for those looking for a fun new dish with the touch of a food loving community.

			<br />	<br />If you wanna join, you may <a href="login.php">create an account</a>. To our senior chefs, proceed directly to the
			<a href="login.php">login page</a>.
		</p>

					<?php include 'include/footer.php'; ?>
	</div>
</div>
</div>
	<script src="js/site.js"></script>
</body>
</html>
