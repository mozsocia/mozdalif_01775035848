<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // validate form data
    $errors = array();

    if (empty($email)) {
        $errors[] = 'Email address is required.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email address is not valid.';
    }

    if (empty($password)) {
        $errors[] = 'Password is required.';
    }

    // if no errors, check credentials and redirect to welcome page
    if (empty($errors)) {

        // get form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // load user data from file
        $userData = json_decode(file_get_contents('data.json'), true);

        // find user with matching email
        $matchingUser = null;
        foreach ($userData as $user) {
            if ($user['email'] == $email) {
                $matchingUser = $user;
                break;
            }
        }

        // check password against hashed password in file
        if ($matchingUser && ($password == $matchingUser['password'])) {
            // redirect to welcome page with first name parameter
            $firstName = $matchingUser['firstName'];
            header('Location: welcome.php?firstName=' . $firstName);
            exit();
        } else {
            $errors[] = 'Invalid email or password.';
        }

    }

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
    <?php
// if errors, display error messages
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
    echo '<br>';
    // echo "<button onclick=\"javascript:history.back()\">Go Back</button>";
}
?>
	<h1>Login Form</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="email">Email Address:</label>
		<input type="email" id="email" name="email">

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" ><br>

		<input type="submit" value="Login">
	</form>
</body>
</html>
