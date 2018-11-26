<?php

// Import the application classes
require_once('include/classes.php');

// Create an instance of the Application class
$app = new Application();
$app->setup();

// Declare an empty array of error messages
$errors = array();

// Check for logged in user since this page is protected
$app->protectPage($errors);

$name = "";

// Attempt to obtain the list of things
$things = $app->getThings($errors);

// Check for url flag indicating that there was a "no thing" error.
if (isset($_GET["error"]) && $_GET["error"] == "nothing") {
	$errors[] = "Things not found.";
}

// Check for url flag indicating that a new thing was created.
if (isset($_GET["newthing"]) && $_GET["newthing"] == "success") {
	$message = "Thing successfully created.";
}

// If someone is attempting to create a new thing, the process the request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Pull the title and thing text from the <form> POST
	$name = $_POST['name'];
	$attachment = $_FILES['attachment'];

	// Attempt to create the new thing and capture the result flag
	$result = $app->addThing($name, $attachment, $errors);

	// Check to see if the new thing attempt succeeded
	if ($result == TRUE) {

		// Redirect the user to the login page on success
	    header("Location: list.php?newthing=success");
		exit();

	}

}

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

	<div class="section group">
		<div class="col span_1_of_2">

						<img src="css/images/coming-soon.png" style="padding-left:250px;">
			</div>
		 <div class="col span_1_of_2">
			 <div class="center">
				 		<h2>Hungry? Great!</h2>
			 			<h3> Let's Find a Recipe</h3>
				 			<?php include('include/messages.php'); ?>
							<!-- section currently full of old stuff; to be classes as searchrecipes + form-->

			 		<div>
						<form enctype="multipart/form-data" method="post" action="recipes.php">
								<br/>
									<input type="text" name="name" id="name" size="81" placeholder="Enter Ingredients Separated by Commas" value="<?php echo $name; ?>" />
								<br/>
									<input type="text" name="name" id="name" size="81" placeholder="Enter the amount of recipes desired" value="<?php echo $name; ?>" />
								<br/>
								<input type="submit" name="start" value="Find Recipes" id="pantry"/>
							  <br/><br/>
							  <a href="fileviewer.php">Need a Guide?</a>
					</div>
				</div>
		</div>
	</div>
	<?php include 'include/footer.php'; ?>
	<script src="js/site.js"></script>
</body>
</html>
