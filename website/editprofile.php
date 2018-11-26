<?php

// Import the application classes
require_once('include/classes.php');

// Declare an empty array of error messages
$errors = array();

// Create an instance of the Application class
$app = new Application();
$app->setup();

// Check for logged in user since this page is protected
$app->protectPage($errors);

// Declare a set of variables to hold the details for the user
$userid = "";
$username = "";
$email = "";
$isadminFlag = FALSE;

$sessionid = $_COOKIE['sessionid'];
$user = $app->getSessionUser($sessionid, $errors);
$loggedinuserid = $user["userid"];

// If someone is accessing this page for the first time, try and grab the userid from the GET request
// then pull the user's details from the database
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	// Get the userid
	if (!isset($_GET['userid'])) {

		$userid = $loggedinuserid;

	} else {

		$userid = $_GET['userid'];

	}

	// Attempt to obtain the user information.
	$user = $app->getUser($userid, $errors);

	if ($user != NULL){
		$username = $user['username'];
		$email = $user['email'];
		$isadminFlag = ($user['isadmin'] == "1");
		$password = "";
	}

// If someone is attempting to edit their profile, process the request
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Get the form values
	$userid   = $_POST['userid'];
	$username = $_POST['username'];
	$email    = $_POST['email'];
	$password = $_POST['password'];
	if (isset($_POST['isadmin']) && $_POST['isadmin'] == "isadmin") {
		$isadminFlag = TRUE;
	} else {
		$isadminFlag = FALSE;
	}

	// Attempt to update the user information.
	$result = $app->updateUser($userid, $username, $email, $password, $isadminFlag, $errors);

	// Display message upon success.
	if ($result == TRUE){
		$message = "User successfully updated.";
		$user = $app->getUser($userid, $errors);
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
<body>
			<?php include 'include/header.php'; ?>

	<div class="section group">
	 <div class="left col span_1_of_2">
		 <div class="center">
		 <img src="css/images/blank_profile_icon.png" alt="Default Profile Image" class="center" id="profile">
		 <p />
			<label for="attachment">Update Profile</label>
			<input id="attachment" name="attachment" type="file">
		</div>
	 </div>
	 <div class="col span_1_of_2 right">
		 <div class="center">
				<h2>Edit Profile</h2>

				<?php include 'include/messages.php'; ?>

				<div>
					<form action="editprofile.php" method="post">
						<input type="hidden" name="userid" value="<?php echo $userid; ?>" />
						<input type="text" name="username" id="username" placeholder="Pick a username" value="<?php echo $username; ?>" />
						<br/>
						<input type="password" name="password" id="password" placeholder="(OPTIONAL) Enter a password" value="<?php echo $password; ?>" />
						<br/>
						<input type="text" name="email" id="email" placeholder="Enter your email" size="40" value="<?php echo $email; ?>" />
						<?php if ($loggedinuserid != $userid) { ?>
						<br/>
						<input type="checkbox" name="isadmin" id="isadmin" <?php echo ($isadminFlag ? "checked=checked" : ""); ?> value="isadmin" />
						<label for="isadmin">Grant admin rights</label>
						<?php } ?>
						<br/>
						<input type="submit" value="Update profile" />
					</form>
				</div>
					<?php include 'include/footer.php'; ?>
			</div>
		</div>
	</div>
	<script src="js/site.js"></script>
</body>
</html>
