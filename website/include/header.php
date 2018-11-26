<?php

	// Assume the user is not logged in and not an admin
	$isadmin = FALSE;
	$loggedin = FALSE;
	$notindex = FALSE;

	// If we have a session ID cookie, we might have a session
	if (isset($_COOKIE['sessionid'])) {

		$user = $app->getSessionUser($errors);
		$loggedinuserid = $user["userid"];

		// Check to see if the user really is logged in and really is an admin
		if ($notindex != NULL) {
			$notindex = TRUE;
		}
		// Check to see if the user really is logged in and really is an admin
		if ($loggedinuserid != NULL) {
			$loggedin = TRUE;
			$isadmin = $app->isAdmin($errors, $loggedinuserid);
		}

	} else {

		$loggedinuserid = NULL;

	}


?>
<header>

	<?php if ($loggedin && $notindex) { ?>

	 <img src="css/images/logo_small_lat.png" alt="Feed Me Logo Small" style="
		 display: inline-block; position:relative; float:left;">
 		<?php } ?>

	<nav style="float: right;" class="nav">
	<ul>
		<li>
			<a href="index.php">Home</a>
			&nbsp;&nbsp;
		</li>
		<?php if (!$loggedin) { ?>
		<li>
			<a href="login.php">Login</a>
			&nbsp;&nbsp;
		</li>
		<li>
			<a href="register.php">Register</a>
			&nbsp;&nbsp;
		</li>
		<?php } ?>
		<?php if ($loggedin) { ?>
		<li>
			<a href="recipes.php">Find Recipes</a>
			&nbsp;&nbsp;
		</li>
		<li>
			<a href="list.php">Dicussion Board</a>
			&nbsp;&nbsp;
		</li>
		<li>
			<a href="editprofile.php">Profile</a>
			&nbsp;&nbsp;
		</li>
			<?php if ($isadmin) { ?>
		<li>
				<a href="admin.php">Admin</a>
				&nbsp;&nbsp;
		</li>
			<?php } ?>
		<li>
			<a href="fileviewer.php?file=include/help.txt">Help</a>
			&nbsp;&nbsp;
		</li>
		<li>
			<a href="logout.php">Logout</a>
			&nbsp;&nbsp;
			  </a>
		</li>
		<?php } ?>
	</ul>
	</nav>

<div style="clear:both;"></div>
</header>
