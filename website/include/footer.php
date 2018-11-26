<footer>
		<p>Copyright &copy; <?php echo date("Y"); ?> Russell Thackston & Chidera Obinali</p>

		</footer>
<?php

if (isset($_COOKIE['debug']) && $_COOKIE['debug'] == "true") {
	echo "<h3>Debug messages</h3>";
	echo "<pre>";
    foreach ($app->debugMessages as $msg) {
		var_dump($msg);
	}
	echo "</pre>";
}

?>
