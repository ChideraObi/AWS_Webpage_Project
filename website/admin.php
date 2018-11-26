<?php

// Import the application classes
require_once('include/classes.php');

// Create an instance of the Application class
$app = new Application();
$app->setup();

// Declare an empty array of error messages
$errors = array();

// Check for logged in admin user since this page is "isadmin" protected
// NOTE: passing optional parameter TRUE which indicates the user must be an admin
$app->protectPage($errors, TRUE);

// Attempt to obtain the list of users
$users = $app->getUsers($errors);


// If someone is adding a new attachment type
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['attachmenttype'] == "add") {

		$name = $_POST['name'];;
		$extension = $_POST['extension'];;

		$attachmenttypeid = $app->newAttachmentType($name, $extension, $errors);

		if ($attachmenttypeid != NULL) {
			$messages[] = "New attachment type added";
		}

	}

}

// Attempt to obtain the list of users
$attachmentTypes = $app->getAttachmentTypes($errors);

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
		<div id="centhings">
		<h2>Admin Functions</h2>
		<?php include 'include/messages.php'; ?>
			<div class="colad span_a_1_of_3">
				<h4>User List</h4>
				<ul class="users">
					<?php foreach($users as $user) { ?>
						<li><a href="editprofile.php?userid=<?php echo $user['userid']; ?>"><?php echo $user['username']; ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="colad span_a_1_of_3">
				<h4>Valid Attachment Types</h4>
				<ul class="attachmenttypes">
					<?php foreach($attachmentTypes as $attachmentType) { ?>
						<li><?php echo $attachmentType['name']; ?> [<?php echo $attachmentType['extension']; ?>]</li>
					<?php } ?>
					<?php if (sizeof($attachmentTypes) == 0) { ?>
						<li>No attachment types found in the database</li>
					<?php } ?>
				</ul>
			</div>
			<div class="colad span_a_2_of_3">
				<div class="newattachmenttype">
					<h5>Add Attachment Type</h5>
					<form enctype="multipart/form-data" method="post" action="admin.php">
						<label for="name">Name</label>
						<input id="name" name="name" type="text">
						<br/>
						<label for="extension">Extension</label>
						<input id="extension" name="extension" type="text">
						<br/>
						<input type="hidden" name="attachmenttype" value="add" />
						<input type="submit" name="addattachmenttype" value="Add type" />
					</form>
				</div>
			</div>
				<?php include 'include/footer.php'; ?>
		</div>
	</div>

	<script src="js/site.js"></script>
</body>
</html>
