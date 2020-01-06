<?php 
	require_once(__DIR__ . '/includes/config.php');
	require_once(__DIR__ . '/includes/classes/Constants.php');
	require_once(__DIR__ . '/includes/classes/FormSanitizier.php');
	require_once(__DIR__ . '/includes/classes/Account.php');

	$account = new Account($con);


	if (isset($_POST["submitButton"])) {

		$firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
		$lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
		$email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
		$email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
		$username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
		$password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
		$password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);
		
		$success = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);  
		if ($success) {
			// Store session
			header("Location: index.php");

		}
	}

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register to Netflix</title>
	<link rel="stylesheet" type="text/css" href="assets/style/style.css">
</head>
<body>
	<div class="signInContainer">
		<div class="column">
			
			<div class="header">
				<img class="logo" src="assets/images/logo.png" alt="Netflix logo">
				<h3>Sign Up</h3>
				<span>to continue to Netflix </span>
			</div>
			<form method="POST">
				<?php echo $account->getError(Constants::$firstNameCharacters); ?>
				<input type="text" name="firstName" value="<?php getInputValue("firstName") ?>" placeholder="First Name" required>
				<?php echo $account->getError(Constants::$lastNameCharacters); ?>
				<input type="text" name="lastName" placeholder="Last Name" value="<?php getInputValue("lastName") ?>" required>
				<?php echo $account->getError(Constants::$usernameCharacters); ?>
				<?php echo $account->getError(Constants::$usernameTaken); ?>
				<input type="text" name="username" value="<?php getInputValue("username") ?>" placeholder="Username" required>
				<?php echo $account->getError(Constants::$emailsDontMatch); ?>
				<?php echo $account->getError(Constants::$emailInvalid); ?>
				<?php echo $account->getError(Constants::$emailTaken); ?>
				<input type="email" name="email" value="<?php getInputValue("email") ?>" placeholder="Email" required>

				<input type="email" name="email2" value="<?php getInputValue("email2") ?>" placeholder="Confirm Email" required>
				<?php echo $account->getError(Constants::$passwordsDontMatch); ?>
				<?php echo $account->getError(Constants::$passwordLength); ?>
				<input type="password" name="password" placeholder="Password" required>

				<input type="password" name="password2" placeholder="Confirm Password" required>

				<input type="submit" name="submitButton" value="Submit">

				<a href="login.php" class="signInMessage">Already have an account? Sign in here</a>
			</form>
		</div>
	</div>
</body>
</html>