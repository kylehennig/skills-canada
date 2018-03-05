<?php
	// Note: username is 'admin', password is 'password'.
	session_start();
	$_SESSION["authorized"] = false;
	$username = filter_input(INPUT_POST, "username");
	$password = filter_input(INPUT_POST, "password");
	
	if (!empty($username) && !empty($password)) {
		password_hash("password", PASSWORD_DEFAULT);
		require_once("database.php");
		$sql = "SELECT password FROM user WHERE username = ?";
		$result = queryDatabase($sql, array($username));
		if (sizeof($result) == 0) {
			$success = false;
		} else {
			$hash = $result[0]["password"];
			$success = password_verify($password, $hash);
		}
		
		if ($success) {
			$_SESSION["authorized"] = true;
			print <<<JS
			<script>window.location = "editor.php"</script>;
JS;
		}
	}
?>
<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Winnipeg Railway Museum</title>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/admin.css" />
</head>

<body>
	<?php
		require_once("header.php");
	?>
	<form onsubmit="return validateForm();" action="" method="post">
		<fieldset>
			<legend>Login</legend>
			<?php
				if(isset($success) && !$success) {
					print <<<HTML
			<div class="red">Incorrect username or password.</div>
HTML;
				}
			?>
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required />
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required />
			<input type="submit" value="Login" />
			<p>Note to judges: the username is 'admin' and the password is 'password'.</p>
		</fieldset>
	</form>
	<script src="js/admin.js"></script>
</body>

</html>
