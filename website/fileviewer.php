<?php

// Import the application classes
require_once('include/classes.php');

// Create an instance of the Application class
$app = new Application();
$app->setup();

// Get the name of the file to display the contents of
$name = $_GET["file"];

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

<!--1. Display Errors if any exists
	2. If no errors display things -->
	<body>
		<?php include 'include/header.php'; ?>
<div id=centhings>
			<img src="css/images/logo_full_lat_a.png" alt="Food Pantry Logo" class="center" id="logo">
			<br/>
				<h1>User Guide & </h1>
				<div>
					<?php echo $app->getFile($name); ?>
				</div>
					<?php include 'include/footer.php'; ?>
			</div>
	</body>
</html>
